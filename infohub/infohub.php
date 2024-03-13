<?php

/**

 * Plugin Name: Info Hub

 * Plugin URI: https://micro-details.com

 * Description: Custom Plugin for Infohub Portal

 * Version: 0.1

 * Author: Micro Details

 * Author URI: https://micro-details.com

 **/



function getPluginDirectory()
{

	$directory = plugin_dir_url(dirname(__FILE__)) . "infohub/";

	return $directory;
}



/*-- Page Templates --*/

class PageTemplater
{



	/**

	 * A reference to an instance of this class.

	 */

	private static $instance;



	/**

	 * The array of templates that this plugin tracks.

	 */

	protected $templates;



	/**

	 * Returns an instance of this class.

	 */

	public static function get_instance()
	{



		if (null == self::$instance) {

			self::$instance = new PageTemplater();
		}



		return self::$instance;
	}



	/**

	 * Initializes the plugin by setting filters and administration functions.

	 */

	private function __construct()
	{



		$this->templates = array();





		// Add a filter to the attributes metabox to inject template into the cache.

		if (version_compare(floatval(get_bloginfo('version')), '4.7', '<')) {



			// 4.6 and older

			add_filter(

				'page_attributes_dropdown_pages_args',

				array($this, 'register_project_templates')

			);
		} else {



			// Add a filter to the wp 4.7 version attributes metabox

			add_filter(

				'theme_page_templates',
				array($this, 'add_new_template')

			);
		}



		// Add a filter to the save post to inject out template into the page cache

		add_filter(

			'wp_insert_post_data',

			array($this, 'register_project_templates')

		);





		// Add a filter to the template include to determine if the page has our

		// template assigned and return it's path

		add_filter(

			'template_include',

			array($this, 'view_project_template')

		);





		// Add your templates to this array.

		$this->templates = array(

			'registration-cities.php' => 'Infohub Cities Registration',

			'infohub-default.php' => 'Infohub Default Error Page',

			'c-form.php' => 'Infohub Cities Form Page',

			'single-project.php' => 'Infohub Single Project Page',

			'single-city.php' => 'Infohub Single City Page',

			'infohub-form-test.php' => 'Infohub Form Test Page',

			'registration-publications.php' => 'Infohub Publications Registration',

			'registration-organization.php' => 'Infohub Organization Registration',

			'publication-posting.php' => 'Infohub Publication posting',

			'organization-posting.php' => 'Infohub Organization posting',

		);
	}



	/**

	 * Adds our template to the page dropdown for v4.7+
 
	 *

	 */

	public function add_new_template($posts_templates)
	{

		$posts_templates = array_merge($posts_templates, $this->templates);

		return $posts_templates;
	}



	/**

	 * Adds our template to the pages cache in order to trick WordPress

	 * into thinking the template file exists where it doens't really exist.

	 */

	public function register_project_templates($atts)
	{



		// Create the key used for the themes cache

		$cache_key = 'page_templates-' . md5(get_theme_root() . '/' . get_stylesheet());



		// Retrieve the cache list.

		// If it doesn't exist, or it's empty prepare an array

		$templates = wp_get_theme()->get_page_templates();

		if (empty($templates)) {

			$templates = array();
		}



		// New cache, therefore remove the old one

		wp_cache_delete($cache_key, 'themes');



		// Now add our template to the list of templates by merging our templates

		// with the existing templates array from the cache.

		$templates = array_merge($templates, $this->templates);



		// Add the modified cache to allow WordPress to pick it up for listing

		// available templates

		wp_cache_add($cache_key, $templates, 'themes', 1800);



		return $atts;
	}



	/**

	 * Checks if the template is assigned to the page

	 */

	public function view_project_template($template)
	{

		// Return the search template if we're searching (instead of the template for the first result)

		if (is_search()) {

			return $template;
		}



		// Get global post

		global $post;



		// Return template if post is empty

		if (!$post) {

			return $template;
		}



		// Return default template if we don't have a custom one defined

		if (!isset($this->templates[get_post_meta(

			$post->ID,
			'_wp_page_template',
			true

		)])) {

			return $template;
		}



		// Allows filtering of file path

		$filepath = apply_filters('page_templater_plugin_dir_path', plugin_dir_path(__FILE__) . "/templates/");



		$file =  $filepath . get_post_meta(

			$post->ID,
			'_wp_page_template',
			true

		);



		// Just to be safe, we check if the file exist first

		if (file_exists($file)) {

			return $file;
		} else {

			echo $file;
		}



		// Return template

		return $template;
	}
}

add_action('plugins_loaded', array('PageTemplater', 'get_instance'));



/*-- Post Templates 

function get_custom_post_type_template($single_template) {

  global $post;



     if ($post->post_type == 'project') {

        $single_template = dirname( __FILE__ ) . '/templates/single-project.php';

     }

    

    return $single_template;

}

add_filter( 'single_template', 'get_custom_post_type_template' );

--*/


/*-- Ajax MI6--*/

function infohubpublicpost()
{

	echo "added successfully";

	exit();
}

add_action("wp_ajax_infohubpublicpost", "infohubpublicpost");
add_action("wp_ajax_nopriv_infohubpublicpost", "infohubpublicpost");



function getTermName($termId)
{

	$lang = pll_current_language();

	$trans = pll_get_term($termId, $lang);

	$term = get_term($trans);

	//print_r($term);

	return $term->name;
}

function getTermNameReverse($termId)
{

	$lang = pll_current_language();
    
	$trans = $termId;
	$arrayList='';
	if ($termId == 0) {
		if ($lang == "ar") {
			$arrayList = array(
				'term_id' => 0,
				'term_name' => "الرجاء التحديد"
			);
		} else {
			$arrayList = array(
				'term_id' => 0,
				'term_name' => "Please Select"
			);
		}
	} else {


		if ($lang == "ar") {
			$trans = pll_get_term($termId, "ar");
		}

		$term = get_term($trans);
		$name = "";
		if ($term->name) {
			$name = $term->name;
		}

		$arrayList = array(
			'term_id' => $termId,
			'term_name' => $name
		);
	}
	//print_r($arrayList);

	return $arrayList;
}



function getRelName($postId)
{



	$lang = pll_current_language();

	$trans = pll_get_post($postId, $lang);

	$post = get_post($trans);

	return $post->post_title;
}



function getSocialIcons($scId)
{



	$icon = "";



	switch ($scId) {

		case 1:

			$icon = '<i class="fa-brands fa-facebook-f"></i>';

			break;

		case 2:

			$icon = '<i class="fa-brands fa-x-twitter"></i>';

			break;

		case 3:

			$icon = '<i class="fa-brands fa-instagram"></i>';

			break;

		case 4:

			$icon = '<i class="fa-brands fa-snapchat"></i>';

			break;

		case 5:

			$icon = '<i class="fa-brands fa-whatsapp"></i>';

			break;

		case 6:

			$icon = '<i class="fa-brands fa-linkedin-in"></i>';

			break;

		case 7:

			$icon = '<i class="fa-brands fa-youtube"></i>';

			break;

		case 8:

			$icon = '<i class="fa-brands fa-vimeo-v"></i>';

			break;

		default:

			$icon = "";
	}



	return $icon;
}




/*-- Shortcodes --*/
include("sc_codes.php");

/*-- Registration --*/
include("reg.php");

/*-- CF7 to Post --*/
include("cf7_post.php");

/* Ajax Functions */
include("ajax.php");

/* ACF Functions */
include("acf.php");

/* Project Functions */
include("proj.php");

/* Organization Functions */
include("org.php");

/* Publication Functions */
include("pub.php");

/* City Functions */
include("city.php");

/* Search Functions */
include("search.php");


function handle_form_submission()
{
	if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['publictitlearabic'])) {
		publication_posting();
	} else if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['organizationtitleenglish']) && wp_verify_nonce( $_POST['my_organization_attachment_nonce'], 'my_organization_attachment_nonce' )) {
		organization_posting();
	}else if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name-authority']) && wp_verify_nonce( $_POST['my_update_attachment_nonce'], 'my_update_attachment_nonce' )){
		city_posting();
	}
}
add_action('init', 'handle_form_submission');
// Function to handle the file upload and set it as the featured image
function upload_featured_image($file, $post_id)
{
	require_once(ABSPATH . 'wp-admin/includes/admin.php');
	$attachment_id = media_handle_upload('imagefiles', $post_id);
	return $attachment_id;
}

function upload_featured_image_acf($file, $post_id)
{
	require_once(ABSPATH . 'wp-admin/includes/admin.php');
	$attachment_id = media_handle_upload($file, $post_id);
	return $attachment_id;
}



// // Function to handle the file upload and set it as the featured image
// function upload_featured_image( $file, $post_id ) {
// 	require_once( ABSPATH . 'wp-admin/includes/admin.php' );
// 	$attachment_id = media_handle_upload( 'imagefiles', $post_id );
// 	return $attachment_id;
//   }



function publication_posting()
{
	// Sanitize and save the submitted data
	$public_title_english = sanitize_text_field($_POST['publictitlefrance']);
	$public_city = '';
	$new_city = '';
	$project = '';
	$newproject = '';
	if (isset($_POST['regioncity']) && !empty($_POST['regioncity'])) {
		$public_city = sanitize_text_field($_POST['regioncity']);
	} elseif (isset($_POST['nonregioncity']) && !empty($_POST['nonregioncity'])) {
		$new_city = sanitize_text_field($_POST['nonregioncity']);
	}
	$public_title_arabic = sanitize_text_field($_POST['publictitlearabic']);
	$language_version = sanitize_text_field($_POST['langversion']);
	$publiclinkeng = sanitize_text_field($_POST['publiclinkeng']);
	$publiclinkar = sanitize_text_field($_POST['publiclinkar']);
	$publiclinkfr = sanitize_text_field($_POST['publiclinkfr']);
	$datepickerpost = sanitize_text_field($_POST['datepickerpost']);
	$publicationtype = sanitize_text_field($_POST['publicationtype']);
	$publicationtheme = $_POST['publicationtheme'];
	$puborganizationnameeng = sanitize_text_field($_POST['puborganizationnameeng']);
	$puborganizationnamear = sanitize_text_field($_POST['puborganizationnamear']);
	$puborganizationtype = sanitize_text_field($_POST['puborganizationtype']);
	if (isset($_POST['regionurban']) && !empty($_POST['regionurban']) && $_POST['regionurban'] != 0) {
		$project = sanitize_text_field($_POST['regionurban']);
	} else if (isset($_POST['nonregionurbanproject']) && !empty($_POST['nonregionurbanproject'])) {
		$newproject = sanitize_text_field($_POST['nonregionurbanproject']);
	}
	$pubcountry = sanitize_text_field($_POST['pubcountry']);
	$countryofcity = '';
	if ($public_city && $public_city !== 0) {
		$countryofcity = get_field("country", $public_city);
	}

	$post_data = array(
		'post_title' => $public_title_english,
		'post_content' => '', // You can add content here if needed
		'post_status' => 'draft',
		'post_type' => 'publication', // Change this to your custom post type if needed
	);

	// Insert the post into the database
	$post_id = wp_insert_post($post_data);
	$language_code = 'en'; // Replace 'fr' with the language code you want to assign (e.g., 'en', 'es', 'de')
	pll_set_post_language($post_id, $language_code);

	$post_data = array(
		'post_title' => $public_title_arabic,
		'post_content' => '', // You can add content here if needed
		'post_status' => 'draft',
		'post_type' => 'publication', // Change this to your custom post type if needed
	);
	$post_idAr = wp_insert_post($post_data);
	$language_code = 'ar'; // Replace 'fr' with the language code you want to assign (e.g., 'en', 'es', 'de')
	pll_set_post_language($post_idAr, $language_code);
	pll_save_post_translations(array('en' => $post_id, 'ar' => $post_idAr));



	if ($post_id) {
		// $relations = array('related_project' => $project);
		updatepostdata('title_en', $public_title_english, $post_id);
		updatepostdata('title_ar', $public_title_arabic, $post_id);
		updatepostdata('publication_link_en', $publiclinkeng, $post_id);
		updatepostdata('publication_link_ar', $publiclinkar, $post_id);
		updatepostdata('publication_link_fr', $publiclinkfr, $post_id);
		updatepostdata('organization_name_en', $puborganizationnameeng, $post_id);
		updatepostdata('organization_name_ar', $puborganizationnamear, $post_id);
		updatepostdata('publication_type', $publicationtype, $post_id);
		updatepostdata('type_of_organization', $puborganizationtype, $post_id);
		updatepostdata('publication_date', $datepickerpost, $post_id);
		updatepostdata('language_version', $language_version, $post_id);
		updatepostdata('project', $project, $post_id);




		if ($countryofcity && $countryofcity !== '') {
			update_field('country', $countryofcity['value'], $post_id);
		}
		updatepostdata('theme', $publicationtheme, $post_id);

		if ($public_city !== '') {
			$citylang = pll_get_post_language($public_city);
			if ($citylang == 'en') {
				update_field('city', $public_city, $post_id);
				$arabic_city = pll_get_post_translations($public_city);
				update_field('city', $arabic_city['ar'], $post_idAr);
			} else {
				update_field('city', $public_city, $post_idAr);
				$arabic_city = pll_get_post_translations($public_city);
				update_field('city', $arabic_city['en'], $post_id);
			}
		}
	}
	else{
		$redirect_url=home_url();
		wp_redirect($redirect_url);
		exit();
	}
	if (isset($_FILES['imagefiles'])) {
		$file = $_FILES['imagefiles'];
		$attachment_id = upload_featured_image($file, $post_id);
		set_post_thumbnail($post_id, $attachment_id);
	}

	if(isset($_FILES['image_ar'])) {
		$file = $_FILES['image_ar'];
		$attachment_id = upload_featured_image_acf($file, $post_id);
		update_field('field_65e0aa7664bac', $attachment_id,$post_id);
	 }

	if ($new_city && $new_city !== '') {
		$link = get_permalink($post_id);
		$to = get_option('admin_email');
		$subject = 'New City Requested';
		$message = "New City Requested $new_city for publication link of $link";
		$headers = array('Content-Type: text/html; charset=utf-8');
		$mymailstatus = wp_mail($to, $subject, $message, $headers);
	}

	// Add a status parameter to the URL
	$redirect_url = pll_current_language() == 'en' ? home_url("/publication-posting/?status=success") : home_url('/publication-posting-ar/?status=success');

	if ($newproject && $newproject != '') {
		$link = get_permalink($post_id);
		$to = get_option('admin_email');
		$subject = 'New Project Requested';
		$message = "New Project Requested $new_city for publication link of $link";
		$headers = array('Content-Type: text/html; charset=utf-8');
		$mymailstatus = wp_mail($to, $subject, $message, $headers);
	}

	// Optionally, redirect after submission
	wp_redirect($redirect_url);
	exit();
}




function organization_posting()
{
	// Sanitize and save the submitted data
	$organ_title_english = sanitize_text_field($_POST['organizationtitleenglish']);
	$organcity = '';
	$new_city = '';
	if (isset($_POST['organregioncity']) && !empty($_POST['organregioncity'])) {
		$organcity = $_POST['organregioncity'];
	} elseif (isset($_POST['nonregionurbanproject']) && !empty($_POST['nonregionurbanproject'])) {
		$new_city = sanitize_text_field($_POST['nonregionurbanproject']);
	}

	$organ_title_arabic = isset($_POST['organizationtitlearabic']) ? $_POST['organizationtitlearabic'] : '';
	$organenglishaddress =isset($_POST['organenglishaddress']) ? $_POST['organenglishaddress'] : '';
	$organarabaddress = isset($_POST['organarabaddress']) ? $_POST['organarabaddress'] : '';

	$organiznumber = isset($_POST['organiznumber']) ? $_POST['organiznumber'] : '';
	$organizationemail = isset($_POST['organizationemail']) ? $_POST['organizationemail'] : '';
	$organizwebsitelink =  isset($_POST['organizwebsitelink']) ? $_POST['organizwebsitelink'] : '';
	$organizationtype = isset($_POST['organizationtype']) ? $_POST['organizationtype'] : '';
	$organizationcountry = isset($_POST['organizationcountry']) ? $_POST['organizationcountry'] : '';
	$yearofestaborgan = isset($_POST['yearofestaborgan']) ? $_POST['yearofestaborgan'] : '';
	$numofemployee = isset($_POST['numofemployee']) ? $_POST['numofemployee'] : '';

	$organiztotalbudget = isset($_POST['organiztotalbudget']) ? $_POST['organiztotalbudget'] : '';
	$typeofinterv = isset($_POST['typeofinterv']) ? $_POST['typeofinterv'] : '';
	$areaofinterv = isset($_POST['areaofinterv']) ? $_POST['areaofinterv'] : '';
	$geoofinterv = isset($_POST['geoofinterv']) ? $_POST['geoofinterv'] : ''; 
	$facebooklink = isset($_POST['organizfacebook']) ? $_POST['organizfacebook'] : '';
	$twitterlink = isset($_POST['organiztwitter']) ? $_POST['organiztwitter'] : '';
	$instagramlink = isset($_POST['organizinstagram']) ? $_POST['organizinstagram'] : '';
	$linkedinlink = isset($_POST['organizlinkedin']) ? $_POST['organizlinkedin'] : '';
	$whatsapplink = isset($_POST['organizwhatsapp']) ? $_POST['organizwhatsapp'] : '';

	$post_data = array(
		'post_title' => $organ_title_english,
		'post_content' => '', // You can add content here if needed
		'post_status' => 'draft',
		'post_type' => 'organization', // Change this to your custom post type if needed
	);

	// Insert the post into the database
	$post_id = wp_insert_post($post_data);

	// $language_code = 'en'; // Replace 'fr' with the language code you want to assign (e.g., 'en', 'es', 'de')
	// pll_set_post_language($post_id, $language_code);

	$post_data = array(
		'post_title' => $organ_title_arabic,
		'post_content' => '', // You can add content here if needed
		'post_status' => 'draft',
		'post_type' => 'publication', // Change this to your custom post type if needed
	);
	$post_idAr = wp_insert_post($post_data);


	$language_code = 'ar'; // Replace 'fr' with the language code you want to assign (e.g., 'en', 'es', 'de')
	// pll_set_post_language($post_idAr, $language_code);
	// pll_save_post_translations(array('en' => $post_id, 'ar' => $post_idAr));

	if ($post_id) {
		updatepostdata('org_name_en', $organ_title_english, $post_id);
		updatepostdata('org_name_ar', $organ_title_arabic, $post_id);
		updatepostdata('address_en', $organenglishaddress, $post_id);
		updatepostdata('address_ar', $organarabaddress, $post_id);
		updatepostdata('organization_country', $organizationcountry, $post_id);
		// updatepostdata('city', $organcity, $post_id);

		// if ($organcity !== '') {
		// 	$citylang = pll_get_post_language($organcity);
		// 	if ($citylang == 'en') {
		// 		update_field('city', $organcity, $post_id);
		// 		$arabic_city = pll_get_post_translations($organcity);
		// 		update_field('city', $arabic_city['ar'], $post_idAr);
		// 	} else {
		// 		update_field('city', $organcity, $post_idAr);
		// 		$arabic_city = pll_get_post_translations($organcity);
		// 		update_field('city', $arabic_city['en'], $post_id);
		// 	}
		// }




		updatepostdata('phone', $organiznumber, $post_id);
		updatepostdata('email', $organizationemail, $post_id);
		updatepostdata('website', $organizwebsitelink, $post_id);
		updatepostdata('year_of_establishment', $yearofestaborgan, $post_id);
		updatepostdata('number_of_employees', $numofemployee, $post_id);
		updatepostdata('total_budget_year', $organiztotalbudget, $post_id);
		updatepostdata('type_of_organization', $organizationtype, $post_id);
		updatepostdata('areas_intervention', $areaofinterv, $post_id);
		updatepostdata('types_intervention', $typeofinterv, $post_id);
		updatesocailfields('social_media_type_1', 1, $post_id);
		updatesocailfields('social_media_link_1', $facebooklink, $post_id);

		updatesocailfields('social_media_type_2', 2, $post_id);
		updatesocailfields('social_media_link_2', $twitterlink, $post_id);

		updatesocailfields('social_media_type_3', 3, $post_id);
		updatesocailfields('social_media_link_3', $instagramlink, $post_id);

		updatesocailfields('social_media_type_4', 5, $post_id);
		updatesocailfields('social_media_link_4', $whatsapplink, $post_id);

		updatesocailfields('social_media_type_5', 6, $post_id);
		updatesocailfields('social_media_link_5', $linkedinlink, $post_id);

		updatepostdata('geography_of_intervention', $geoofinterv, $post_id);

		if (isset($_FILES['imagefiles'])) {
			$file = $_FILES['imagefiles'];
			$attachment_id = upload_featured_image($file, $post_id);
			set_post_thumbnail($post_id, $attachment_id);
		}
	}

	if ($new_city && $new_city !== '') {
		$link = get_permalink($post_id);
		$to = get_option('admin_email');
		$subject = 'New City Requested';
		$message = "New City Requested $new_city for Organization link of $link";
		$headers = array('Content-Type: text/html; charset=utf-8');
		$mymailstatus = wp_mail($to, $subject, $message, $headers);
	}
	// Add a status parameter to the URL
	if (pll_current_language() == 'en') {
		$redirect_url =  home_url('/organizations-en/organization-posting/?status=success');
	} else {
		$redirect_url =  home_url('/organizations-ar/organization-posting-ar/?status=success');
	}
	// Optionally, redirect after submission
	wp_redirect($redirect_url);
	exit();
}

function city_posting()
{

	// Sanitize and save the submitted data
	$organ_country = sanitize_text_field($_POST['country']);
	$organcity = '';
	$new_city="";
	if (isset($_POST['city']) && !empty($_POST['city'])) {
		$organcity =get_the_title($_POST['city']);
	}else{
		$organcity = '';
	}
	if (isset($_POST['city-others']) && !empty($_POST['city-others'])) {
		$new_city = sanitize_text_field($_POST['city-others']);
	}else{
		$new_city="";
	}

	$name_authority = sanitize_text_field($_POST['name-authority']);
	$website = sanitize_text_field($_POST['website']);
	$geo_status = sanitize_text_field($_POST['geo-status']);

	$city_size = sanitize_text_field($_POST['city-size']);
	$demo_status = sanitize_text_field($_POST['demo-status']);
	$envi_status = sanitize_text_field($_POST['envi-status']);
	$econi_status = sanitize_text_field($_POST['econi-status']);
	$housing_status = sanitize_text_field($_POST['housing-status']);
	$mobil_status = sanitize_text_field($_POST['mobil-status']);
     
	$facebooklink = sanitize_text_field($_POST['social-link-1']);
	$twitterlink = sanitize_text_field($_POST['social-link-2']);
	$instagramlink = sanitize_text_field($_POST['social-link-3']);
	$youtubelink = sanitize_text_field($_POST['social-link-4']);
	$linkedinlink = sanitize_text_field($_POST['social-link-5']);

	$post_data = array(
		'post_title' => $organcity,
		'post_content' => '', // You can add content here if needed
		'post_status' => 'draft',
		'post_type' => 'city', // Change this to your custom post type if needed
	);

	// Insert the post into the database
	$post_id = wp_insert_post($post_data);
	$language_code = 'en'; // Replace 'fr' with the language code you want to assign (e.g., 'en', 'es', 'de')
	pll_set_post_language($post_id, $language_code);

	$post_data = array(
		'post_title' => $organcity,
		'post_content' => '', // You can add content here if needed
		'post_status' => 'draft',
		'post_type' => 'city', // Change this to your custom post type if needed
	);
	$post_idAr = wp_insert_post($post_data);
	$language_code = 'ar'; // Replace 'fr' with the language code you want to assign (e.g., 'en', 'es', 'de')
	pll_set_post_language($post_idAr, $language_code);
	pll_save_post_translations(array('en' => $post_id, 'ar' => $post_idAr));

	if ($post_id) {

		
		$uploaded_file = $_FILES['boundary'];

		for ($i = 1; $i < 5; $i++) {
			$file_key = 'city-img' . $i;
			if (isset($_FILES[$file_key])) {
				$file = $_FILES[$file_key];
				$attachment_id = upload_featured_image_acf($file_key, $post_id);
				$city_title = isset($_POST['city-title' . $i]) ? $_POST['city-title' . $i] : "";
				$city_source = isset($_POST['city-source' . $i]) ? $_POST['city-source' . $i] : "";
				$group_data = array(
					"city_photo_$i" => $attachment_id,
					"city_photo_title_$i" => $city_title,
					"city_photo_link_$i" => $city_source,
				);
				update_field("city_gallery", $group_data, $post_id);
				update_field("city_gallery", $group_data, $post_idAr);
			}
		}
		


		updatepostdata('country', $organ_country, $post_id);
		updatepostdata('name_authority', $name_authority, $post_id);
		updatepostdata('website', $website, $post_id);
		updatepostdata('demographic', $demo_status, $post_id);
		updatepostdata('environmental', $envi_status, $post_id);
		updatepostdata('economic', $econi_status, $post_id);
		updatepostdata('housing', $housing_status, $post_id);
		updatepostdata('geo', $geo_status, $post_id);
		updatepostdata('transport', $mobil_status, $post_id);
		updatepostdata('city_size', $city_size, $post_id);

		
		updatesocailfields('social_media_type_1', 1, $post_id);
		updatesocailfields('social_media_link_1', $facebooklink, $post_id);

		updatesocailfields('social_media_type_2', 2, $post_id);
		updatesocailfields('social_media_link_2', $twitterlink, $post_id);

		updatesocailfields('social_media_type_3', 3, $post_id);
		updatesocailfields('social_media_link_3', $instagramlink, $post_id);

		updatesocailfields('social_media_type_4', 7, $post_id);
		updatesocailfields('social_media_link_4', $youtubelink, $post_id);

		updatesocailfields('social_media_type_5', 6, $post_id);
		updatesocailfields('social_media_link_5', $linkedinlink, $post_id);
		// update_image_fields('boundary', $post_id);
		// updatepostdata('geography_of_intervention', $geoofinterv, $post_id);

		if (isset($_FILES['boundary'])) {
			$file = $_FILES['boundary'];
			$attachment_id = upload_featured_image_acf('boundary', $post_id);
			update_field('boundary', $attachment_id, $post_id);
			update_field('boundary', $attachment_id, $post_idAr);
		}

	}

	if ($new_city && $new_city !== '') {
		$link = get_permalink($post_id);
		$to = get_option('admin_email');
		$subject = 'New City Requested';
		$message = "New City Requested $new_city for Organization link of $link";
		$headers = array('Content-Type: text/html; charset=utf-8');
		$mymailstatus = wp_mail($to, $subject, $message, $headers);
	}
	// Add a status parameter to the URL
	if (pll_current_language() == 'en') {
		$redirect_url =  home_url('/en/infohub/c-form/?status=success');
	} else {
		$redirect_url =  home_url('/infohub-ar/c-form/?status=success');
	}
	// Optionally, redirect after submission
	wp_redirect($redirect_url);
	exit();
}


function updatepostdata($field, $value, $postid)
{
	if (!empty($value)) {
		
		update_field($field, $value, $postid);
		$arabic_city = pll_get_post_translations($postid);
		if(!empty($arabic_city['ar'])){
			update_field($field, $value, $arabic_city['ar']);
		}
		
	}
}

function updatesocailfields($field, $value, $postid)
{
	if (!empty($value) || $value == 0) {
		update_field('social_media_pages', array($field => $value), $postid);
		$arabic_city = pll_get_post_translations($postid);
		if(!empty($arabic_city['ar'])){

			update_field('social_media_pages', array($field => $value), $arabic_city['ar']);
		 }
	}
}


function update_image_fields($file,$postid){
	if(isset($_POST['my_update_attachment_nonce_field']) && wp_verify_nonce($_POST['my_update_attachment_nonce_field'], 'my_update_attachment_nonce')){

	$files=my_update_attachment($file,$postid);
	$arabic_city = pll_get_post_translations($postid);
	$filesar=my_update_attachment($file,$arabic_city);
	if(is_wp_error($files) || is_wp_error($filesar)){
		updatepostdata('environmental', $files->get_error_message(), $postid);

	}else{
		update_field('field_65aa401ca3226',$files['attach_id'],$postid);
		update_field('field_65aa401ca3226',$filesar['attach_id'],$postid);
	}
} else{
	updatepostdata('environmental', "nonsence", $postid);

}




}


function my_update_attachment($file_input_name, $post_id, $title = '', $content = '') {
  // Update attachment metadata
  wp_update_attachment_metadata($post_id, $file_input_name);

  if (!empty($_FILES[$file_input_name]['name'])) { // New upload
    require_once(ABSPATH . 'wp-admin/includes/file.php');

    $override['action'] = 'editpost';
    $file = wp_handle_upload($_FILES[$file_input_name], $override);

    if (isset($file['error'])) {
      return new WP_Error('upload_error', $file['error']);
    }

    // Check file type
    $file_type = wp_check_filetype($_FILES[$file_input_name]['name'], array(
      'jpg|jpeg' => 'image/jpeg',
      'gif' => 'image/gif',
      'png' => 'image/png',
    ));

    if ($file_type['type']) {
      $name_parts = pathinfo($file['file']);
      $name = $file['filename'];
      $type = $file['type'];
      $title = $title ? $title : $name;
      $attachment_content = $content;

      $attachment = array(
        'post_title' => $title,
        'post_type' => 'attachment',
        'post_content' => $attachment_content,
        'post_parent' => $post_id,
        'post_mime_type' => $type,
        'guid' => $file['url'],
      );

      // Generate intermediate image sizes
      $sizes = array();
      foreach (get_intermediate_image_sizes() as $s) {
        $sizes[$s] = array(
          'width' => get_option("{$s}_size_w"),
          'height' => get_option("{$s}_size_h"),
          'crop' => get_option("{$s}_crop"),
        );
      }

      $sizes = apply_filters('intermediate_image_sizes_advanced', $sizes);

      foreach ($sizes as $size => $size_data) {
        $resized = image_make_intermediate_size($file['file'], $size_data['width'], $size_data['height'], $size_data['crop']);
        if ($resized) {
          $attachment['sizes'][$size] = $resized;
        }
      }

      // Insert the attachment
      $attach_id = wp_insert_attachment($attachment, $file['file']);

      if (!is_wp_error($attach_id)) {
        // Update attachment metadata again
        $attach_meta = wp_generate_attachment_metadata($attach_id, $file['file']);
        wp_update_attachment_metadata($attach_id, $attach_meta);

        return array(
          'pid' => $post_id,
          'url' => $file['url'],
        );
      }
    }
  }

  // If there are no new files or if an error occurred
  return new WP_Error('upload_error', 'No valid file uploaded.');
}
