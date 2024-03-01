<?php



/*-- Ajax --*/

function infohubPubAjax()
{



	$lang = pll_current_language();

	$output = "";

	$data = $_POST['data'];

	$paged = $_POST['paged'];



	$getPaged = getPubsPaged($paged);

	$output .= getPubHtml($getPaged);



	print $output;



	exit();
}

add_action("wp_ajax_infohubPubAjax", "infohubPubAjax");

add_action("wp_ajax_nopriv_infohubPubAjax", "infohubPubAjax");



function getPubs()
{

	// Check if user is accessing from a mobile device
	$is_mobile = wp_is_mobile();

	// Set the number of posts per page based on whether it's mobile or not
	$posts_per_page = $is_mobile ? 5 : 20;

	$lang = pll_current_language();



	$sortBy = 'title_en';

	if ($lang == "ar") {

		$sortBy = 'title_ar';
	}



	$args = array(

		'post_type' => 'publication',

		'post_status' => 'publish',

		'numberposts' => $posts_per_page,

		'meta_key' => $sortBy,

		'orderby'  => 'meta_value',

		'order' => 'ASC'

	);

	$query = get_posts($args);



	$arrayList = array();



	foreach ($query as $row) {



		$postId = $row->ID;



		$name =  get_field("title_en", $postId);

		if ($lang == "ar") {

			$name =  get_field("title_ar", $postId);
		}



		$lang_version == "";

		$langVArray = array();

		$getLangV = get_field("language_version", $postId);

		if ($getLangV) {

			foreach ($getLangV as $rowLangV) {



				if ($rowLangV == 'ar') {
					$langV = forceTranslate("Arabic", "العربية");
				}

				if ($rowLangV == 'en') {
					$langV = forceTranslate("English", "إنجليزي");
				}

				if ($rowLangV == 'fr') {
					$langV = forceTranslate("French", "فرنسي");
				}





				$langVArray[] = '<p class="fnt-15 remMar">' . $langV . '</p>';
			}



			$lang_version = implode("", $langVArray);
		}



		$publisher = "";

		$getPublisher = get_field("publisher", $postId);

		if ($getPublisher == 1) {

			$publisher = forceTranslate("AUDI Publications", "منشورات اخرى");
		}

		if ($getPublisher == 2) {

			$publisher = forceTranslate("Other Publications", "منشورات المعهد");
		}



		$country = "";

		$getCountry = get_field("field_65aa214151992", $postId);

		if ($getCountry && $getCountry['value'] != 'NONE') {

			$country = $getCountry['label'];
		}



		$multiArabCountry = get_field("multiple_arab_city", $postId);



		$cityName = "";

		$getCity = get_field("field_65070bc2caeca", $postId);

		if ($getCity) {

			$cityName = getRelName($getCity[0]);
		}



		$pubDate = "";

		$pubYear = "";

		$getYear = get_field("field_65aa28811b7ce", $postId);

		if ($getYear) {

			$pubYear = date("Y", strtotime($getYear));

			$pubDate = $getYear;
		}





		$orgName =  get_field("organization_name_en", $postId);

		if ($lang == "ar") {

			$orgName =  get_field("organization_name_ar", $postId);
		}



		$orgType = "";

		$getOrgType = get_field("type_of_organization", $postId);

		if ($getOrgType) {

			$orgType = getTermName($getOrgType);
		}



		$pubType = "";

		$getPubType = get_field("publication_type", $postId);

		if ($getPubType) {

			$pubType = ' - ' . getTermName($getPubType);
		}



		$pubLinkEn = "";

		if (get_field("publication_link_en", $postId)) {

			$pubLinkEn = '<a class="btn btn-primary btn-blue" href="' . get_field("publication_link_en", $postId) . '" target="_new">' . forceTranslate("English", "إنجليزي") . '</a>';
		}



		$pubLinkAr = "";

		if (get_field("publication_link_ar", $postId)) {

			$pubLinkAr = '<a class="btn btn-primary btn-blue" href="' . get_field("publication_link_ar", $postId) . '" target="_new">' . forceTranslate("Arabic", "العربية") . '</a>';
		}



		$pubLinkFr = "";

		if (get_field("publication_link_fr", $postId)) {

			$pubLinkFr = '<a class="btn btn-primary btn-blue" href="' . get_field("publication_link_fr", $postId) . '" target="_new">' . forceTranslate("French", "فرنسي") . '</a>';
		}



		$theme = "";

		$themeArray = array();

		$getTheme = get_field("field_65aa29a3b255f", $postId);

		if ($getTheme) {

			foreach ($getTheme as $rowTheme) {

				$themeArray[] = '<p class="fnt-15 remMar">' . getTermName($rowTheme) . '</p>';
			}

			$theme = implode("", $themeArray);
		}



		$logo = "";

		// $logo = '

		// 	<img src="'.getPluginDirectory().'/img/sample-logo.svg" class="img-fluid w-100 bordered-shadow infohub-logo" data-bs-toggle="modal" data-bs-target="#logo-modal-'.$postId.'">

		// 	<div class="spacer-20"></div>

		// 	';



		$modal = '';
		$getLogo='';

		if($lang == 'en'){
			$getLogo = wp_get_attachment_image_url(get_post_thumbnail_id($postId), 'full');
		}else{
			$getLogo = get_field("publication_image_arabic", $postId);

		}


		if ($getLogo) {

			$logo = '

				<img src="' . $getLogo . '" class="img-fluid w-100 bordered-shadow infohub-logo">

				<div class="spacer-20"></div>



				';



			$modal = '

				<div class="mi_modal" id="logo-modal-' . $postId . '">

				  <div class="mi_modal-dialog ">

				    <div class="mi_modal-content">

				      <div class="mi_modal-body">

				        <center>

				        <img src="' . $getLogo . '" class="img-fluid w-100">

				        </center>

				      </div>

				  </div>

				</div>	
							
              </div>
		';
		}



		$arrayList[] = array(

			'ID' => $postId,

			'name' => $name,

			'lang_version' => $lang_version,

			'pubDate' => $pubDate,

			'pubYear' => $pubYear,

			'publisher' => $publisher,

			'pubCode' => $getPublisher,

			'country' => $country,

			'multiArabCountry' => $multiArabCountry,

			'cityName' => $cityName,

			'orgName' => $orgName,

			'orgType' => $orgType,

			'pubType' => $pubType,

			'pubLinkEn' => $pubLinkEn,

			'pubLinkAr' => $pubLinkAr,

			'pubLinkFr' => $pubLinkFr,

			'theme' => $theme,

			'logo' => $logo,

			'modal' => $modal,

		);
	}



	return $arrayList;
}



function getPubsPaged($pagedNum)
{

	// Check if user is accessing from a mobile device
	$is_mobile = wp_is_mobile();

	// Set the number of posts per page based on whether it's mobile or not
	$posts_per_page = $is_mobile ? 5 : 20;



	$lang = pll_current_language();



	$argsCount = array(

		'post_type' => 'publication',

		'post_status' => 'publish',

		'numberposts' => -1

	);

	$queryCount = count(get_posts($argsCount));

	$paged = $pagedNum + 1;

	//$posts_per_page = 20;

	$num_pages = ceil($queryCount / $posts_per_page);

	$offset = $posts_per_page * $paged;



	$sortBy = 'title_en';

	if ($lang == "ar") {

		$sortBy = 'title_ar';
	}



	$args = array(

		'post_type' => 'publication',

		'post_status' => 'publish',

		'posts_per_page' => $posts_per_page,

		'offset' => $offset,

		'meta_key' => $sortBy,

		'orderby'  => 'meta_value',

		'order' => 'ASC'

	);

	$query = get_posts($args);



	$arrayList = array();



	foreach ($query as $row) {



		$postId = $row->ID;



		$name =  get_field("title_en", $postId);

		if ($lang == "ar") {

			$name =  get_field("title_ar", $postId);
		}





		$lang_version == "";

		$langVArray = array();

		$getLangV = get_field("language_version", $postId);

		if ($getLangV) {

			foreach ($getLangV as $rowLangV) {



				if ($rowLangV == 'ar') {
					$langV = forceTranslate("Arabic", "العربية");
				}

				if ($rowLangV == 'en') {
					$langV = forceTranslate("English", "إنجليزي");
				}

				if ($rowLangV == 'fr') {
					$langV = forceTranslate("French", "فرنسي");
				}





				$langVArray[] = '<p class="fnt-15 remMar">' . $langV . '</p>';
			}



			$lang_version = implode("", $langVArray);
		}



		$publisher = "";

		$getPublisher = get_field("publisher", $postId);

		if ($getPublisher == 1) {

			$publisher = forceTranslate("AUDI Publications", "منشورات اخرى");
		}

		if ($getPublisher == 2) {

			$publisher = forceTranslate("Other Publications", "منشورات المعهد");
		}



		$country = "";

		$getCountry = get_field("field_65aa214151992", $postId);

		if ($getCountry && $getCountry != 'NONE') {

			$country = $getCountry['label'];
		}



		$multiArabCountry = get_field("multiple_arab_city", $postId);



		$cityName = "";

		$getCity = get_field("field_65070bc2caeca", $postId);

		if ($getCity) {

			$cityName = getRelName($getCity[0]);
		}



		$pubDate = "";

		$pubYear = "";

		$getYear = get_field("field_65aa28811b7ce", $postId);

		if ($getYear) {

			$pubYear = date("Y", $getYear);

			$pubDate = $getYear;
		}





		$orgName =  get_field("organization_name_en", $postId);

		if ($lang == "ar") {

			$orgName =  get_field("organization_name_ar", $postId);
		}



		$orgType = "";

		$getOrgType = get_field("type_of_organization", $postId);

		if ($getOrgType) {

			$orgType = getTermName($getOrgType);
		}



		$pubType = "";

		$getPubType = get_field("publication_type", $postId);

		if ($getPubType) {

			$pubType = ' - ' . getTermName($getPubType);
		}



		$pubLinkEn = "";

		if (get_field("publication_link_en", $postId)) {

			$pubLinkEn = '<a class="btn btn-primary btn-blue" href="' . get_field("publication_link_en", $postId) . '" target="_new">' . forceTranslate("English", "إنجليزي") . '</a>';
		}



		$pubLinkAr = "";

		if (get_field("publication_link_ar", $postId)) {

			$pubLinkAr = '<a class="btn btn-primary btn-blue" href="' . get_field("publication_link_ar", $postId) . '" target="_new">' . forceTranslate("Arabic", "العربية") . '</a>';
		}



		$pubLinkFr = "";

		if (get_field("publication_link_fr", $postId)) {

			$pubLinkFr = '<a class="btn btn-primary btn-blue" href="' . get_field("publication_link_fr", $postId) . '" target="_new">' . forceTranslate("French", "فرنسي") . '</a>';
		}



		$theme = "";

		$themeArray = array();

		$getTheme = get_field("field_65aa29a3b255f", $postId);

		if ($getTheme) {

			foreach ($getTheme as $rowTheme) {

				$themeArray[] = '<p class="fnt-15 remMar">' . getTermName($rowTheme) . '</p>';
			}

			$theme = implode("", $themeArray);
		}



		$logo = "";

		// $logo = '

		// 	<img src="'.getPluginDirectory().'/img/sample-logo.svg" class="img-fluid w-100 bordered-shadow infohub-logo" data-bs-toggle="modal" data-bs-target="#logo-modal-'.$postId.'">

		// 	<div class="spacer-20"></div>

		// 	';



		$modal = '

			<div class="modal fade" id="logo-modal-' . $postId . '">

			  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">

			    <div class="modal-content">

			      <div class="modal-header">

			        <h1 class="modal-title fs-5"></h1>

			        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

			      </div>

			      <div class="modal-body">

			        <center>

			        <img src="' . getPluginDirectory() . '/img/sample-logo.svg" class="img-fluid w-100">

			        </center>

			      </div>

			  </div>

			</div>		

		';

		$getLogo = wp_get_attachment_image_url(get_post_thumbnail_id($postId), 'full');

		if ($getLogo) {

			$logo = '

				<img src="' . $getLogo . '" class="img-fluid w-100 bordered-shadow infohub-logo">

				<div class="spacer-20"></div>



				';



			$modal = '

				<div class="mi_modal" id="logo-modal-' . $postId . '">

				  <div class="mi_modal-dialog ">

				    <div class="mi_modal-content">

				      <div class="mi_modal-body">

				        <center>

				        <img src="' . $getLogo . '" class="img-fluid w-100">

				        </center>

				      </div>

				  </div>

				</div>	
							
              </div>
		';
		}



		$arrayList[] = array(

			'ID' => $postId,

			'name' => $name,

			'lang_version' => $lang_version,

			'pubDate' => $pubDate,

			'pubYear' => $pubYear,

			'publisher' => $publisher,

			'pubCode' => $getPublisher,

			'country' => $country,

			'multiArabCountry' => $multiArabCountry,

			'cityName' => $cityName,

			'orgName' => $orgName,

			'orgType' => $orgType,

			'pubType' => $pubType,

			'pubLinkEn' => $pubLinkEn,

			'pubLinkAr' => $pubLinkAr,

			'pubLinkFr' => $pubLinkFr,

			'theme' => $theme,

			'logo' => $logo,

		);
	}



	return $arrayList;
}



function getPubsFiltered($arrays)
{



	$lang = pll_current_language();

	$output = "";



	$sortBy = 'title_en';

	if ($lang == "ar") {

		$sortBy = 'title_ar';
	}



	// $yearArray = "";

	// $countYearArray = count($arrays['filter-publications-year']);

	// if($countYearArray != 0){

	// 	$yearArray = array(

	// 		'key' => 'publication_date',

	// 		'value' => $arrays['filter-publications-year'],

	// 		'compare' => 'BETWEEN',

	// 		'type' => 'DATE'

	// 	);

	// }



	$yearArray = "";

	$countYearArray = count($arrays['filter-publications-year']);

	if ($countYearArray != 0) {

		$yearArray = $arrays['filter-publications-year'];
	}



	$typeArray = "";

	$countTypeArray = count($arrays['filter-publications-type']);

	if ($countTypeArray != 0) {

		$typeArray = array(

			'key' => 'publication_type',

			'value' => $arrays['filter-publications-type'],

			'compare' => 'IN',

		);
	}



	$themeArray = "";

	$countThemesArray = count($arrays['filter-publications-theme']);

	if ($countThemesArray != 0) {

		$themeArray = array(

			'key' => 'theme',

			'value' => $arrays['filter-publications-theme'],

			'compare' => 'IN',

		);
	}



	$langArray = "";

	$countLangArray = count($arrays['filter-publications-language']);

	if ($countLangArray != 0) {

		$langArray = array(

			'key' => 'language_version',

			'value' => $arrays['filter-publications-language'],

			'compare' => 'IN',

		);
	}



	$args = array(

		'post_type' => 'publication',

		'post_status' => 'publish',

		'numberposts' => -1,




	);



	$query = get_posts($args);



	$arrayList = array();



	foreach ($query as $row) {
		$pubtypemi = get_field("publication_type", $row->ID);
		$pubthemi = get_field("theme", $row->ID);
		$langver = get_field("language_version", $row->ID);

		if ((in_array($pubtypemi, $arrays['filter-publications-type']) || empty($arrays['filter-publications-type'])) && (count(array_intersect($pubthemi, $arrays['filter-publications-theme'])) > 0 || empty($arrays['filter-publications-theme'])) && (count(array_intersect($langver, $arrays['filter-publications-language'])) > 0 || empty($arrays['filter-publications-language']))) {


			$postId = $row->ID;



			$name =  get_field("title_en", $postId);

			if ($lang == "ar") {

				$name =  get_field("title_ar", $postId);
			}



			$lang_version == "";

			$langVArray = array();

			$getLangV = get_field("language_version", $postId);

			if ($getLangV) {

				foreach ($getLangV as $rowLangV) {



					if ($rowLangV == 'ar') {
						$langV = forceTranslate("Arabic", "العربية");
					}

					if ($rowLangV == 'en') {
						$langV = forceTranslate("English", "إنجليزي");
					}

					if ($rowLangV == 'fr') {
						$langV = forceTranslate("French", "فرنسي");
					}





					$langVArray[] = '<p class="fnt-15 remMar">' . $langV . '</p>';
				}



				$lang_version = implode("", $langVArray);
			}



			$publisher = "";

			$getPublisher = get_field("publisher", $postId);

			if ($getPublisher == 1) {

				$publisher = forceTranslate("AUDI Publications", "منشورات اخرى");
			}

			if ($getPublisher == 2) {

				$publisher = forceTranslate("Other Publications", "منشورات المعهد");
			}



			$country = "";

			$getCountry = get_field("field_65aa214151992", $postId);

			if ($getCountry && $getCountry['value'] != 'NONE') {

				$country = $getCountry['label'];
			}



			$multiArabCountry = get_field("multiple_arab_city", $postId);



			$cityName = "";

			$getCity = get_field("field_65070bc2caeca", $postId);

			if ($getCity) {

				$cityName = getRelName($getCity[0]);
			}



			$pubDate = "";

			$pubYear = "";

			$getYear = get_field("field_65aa28811b7ce", $postId);

			if ($getYear) {

				$pubYear = date("Y", strtotime($getYear));

				$pubDate = $getYear;
			}





			$orgName =  get_field("organization_name_en", $postId);

			if ($lang == "ar") {

				$orgName =  get_field("organization_name_ar", $postId);
			}



			$orgType = "";

			$getOrgType = get_field("type_of_organization", $postId);

			if ($getOrgType) {

				$orgType = getTermName($getOrgType);
			}



			$pubType = "";

			$getPubType = get_field("publication_type", $postId);

			if ($getPubType) {

				$pubType = ' - ' . getTermName($getPubType);
			}



			$pubLinkEn = "";

			if (get_field("publication_link_en", $postId)) {

				$pubLinkEn = '<a class="btn btn-primary btn-blue" href="' . get_field("publication_link_en", $postId) . '" target="_new">' . forceTranslate("English", "إنجليزي") . '</a>';
			}



			$pubLinkAr = "";

			if (get_field("publication_link_ar", $postId)) {

				$pubLinkAr = '<a class="btn btn-primary btn-blue" href="' . get_field("publication_link_ar", $postId) . '" target="_new">' . forceTranslate("Arabic", "العربية") . '</a>';
			}



			$pubLinkFr = "";

			if (get_field("publication_link_fr", $postId)) {

				$pubLinkFr = '<a class="btn btn-primary btn-blue" href="' . get_field("publication_link_fr", $postId) . '" target="_new">' . forceTranslate("French", "فرنسي") . '</a>';
			}



			$theme = "";

			$themeArray = array();

			$getTheme = get_field("field_65aa29a3b255f", $postId);

			if ($getTheme) {

				foreach ($getTheme as $rowTheme) {

					$themeArray[] = '<p class="fnt-15 remMar">' . getTermName($rowTheme) . '</p>';
				}

				$theme = implode("", $themeArray);
			}



			$logo = "";

			// $logo = '

			// 	<img src="'.getPluginDirectory().'/img/sample-logo.svg" class="img-fluid w-100 bordered-shadow infohub-logo" data-bs-toggle="modal" data-bs-target="#logo-modal-'.$postId.'">

			// 	<div class="spacer-20"></div>

			// 	';



			$modal = '

			<div class="modal fade" id="logo-modal-' . $postId . '">

			  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">

			    <div class="modal-content">

			      <div class="modal-header">

			        <h1 class="modal-title fs-5"></h1>

			        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

			      </div>

			      <div class="modal-body">

			        <center>

			        <img src="' . getPluginDirectory() . '/img/sample-logo.svg" class="img-fluid w-100">

			        </center>

			      </div>

			  </div>

			</div>		

		';

			$getLogo = wp_get_attachment_image_url(get_post_thumbnail_id($postId), 'full');

			if ($getLogo) {

				$logo = '

				<img src="' . $getLogo . '" class="img-fluid w-100 bordered-shadow infohub-logo">

				<div class="spacer-20"></div>



				';



				$modal = '

				<div class="mi_modal" id="logo-modal-' . $postId . '">

				  <div class="mi_modal-dialog ">

				    <div class="mi_modal-content">

				      <div class="mi_modal-body">

				        <center>

				        <img src="' . $getLogo . '" class="img-fluid w-100">

				        </center>

				      </div>

				  </div>

				</div>	
							
              </div>
		';
			}



			if (in_array($pubYear, $yearArray) || empty($yearArray)) {

				$arrayList[] = array(

					'ID' => $postId,

					'name' => $name,

					'lang_version' => $lang_version,

					'pubDate' => $pubDate,

					'pubYear' => $pubYear,

					'publisher' => $publisher,

					'pubCode' => $getPublisher,

					'country' => $country,

					'multiArabCountry' => $multiArabCountry,

					'cityName' => $cityName,

					'orgName' => $orgName,

					'orgType' => $orgType,

					'pubType' => $pubType,

					'pubLinkEn' => $pubLinkEn,

					'pubLinkAr' => $pubLinkAr,

					'pubLinkFr' => $pubLinkFr,

					'theme' => $theme,

					'logo' => $logo,

				);
			}
		}
	}



	$output .= getPubHtml($arrayList);



	return $output;
}

function getPubsSearch($arrays)
{



	$lang = pll_current_language();




	$sortBy = 'title_en';

	if ($lang == "ar") {

		$sortBy = 'title_ar';
	}



	// $yearArray = "";

	// $countYearArray = count($arrays['filter-publications-year']);

	// if($countYearArray != 0){

	// 	$yearArray = array(

	// 		'key' => 'publication_date',

	// 		'value' => $arrays['filter-publications-year'],

	// 		'compare' => 'BETWEEN',

	// 		'type' => 'DATE'

	// 	);

	// }



	// $title = $arrays;

	$title = array_keys($arrays)[0];


	$args = array(

		'post_type' => 'publication',

		'post_status' => 'publish',

		'numberposts' => -1,
        
		's' => $title



	);



	$query = get_posts($args);



	$arrayList = array();


//    var_dump($title);
	foreach ($query as $row) {



		$postId = $row->ID;
        
       $link=get_the_permalink($postId);
	   $namear =  get_field("title_ar", $postId);

		$name =  get_field("title_en", $postId);

		$arrayitem=array( 
			'link' => $link,
			'name' => $name,
			'name_ar' => $namear
		);
		array_push($arrayList, $arrayitem);

		// if($lang == 'en'){
		// 	$titlespace=str_replace('_',' ',$title);
		// 	$titlenospace=explode(" ",$titlespace);
		// 	if(stripos($name,$titlespace,$titlenospace[0]) !== false) {
		// 			$output .= "<a href='$link' target='_blank' class='p-2'>$name</a>";
		// 	}
		// }
		// else{
		// 	$titlespace=str_replace('_',' ',$title);
		// 	$titlenospace=explode(" ",$titlespace);
		// 	if(stripos($namear,$titlespace,$titlenospace[0]) !== false) {
		// 			$output .= "<a href='$link' target='_blank' class='p-2'>$namear</a>";
		// 	}
		// }


		

	}
    




	// $output .= getPubHtml($arrayList);



	return json_encode($arrayList);
}

function getPubHtml($arrays)
{



	$lang = pll_current_language();

	$output = "";



	$frtl = "";

	if ($lang == "ar") {

		$frtl = "force-ltr";
	}



	$arrayList = array();

	foreach ($arrays as $row) {



		$classPubCode = "";

		if ($row['pubCode'] == 1) {

			$classPubCode = "pub-ap";
		}

		if ($row['pubCode'] == 2) {

			$classPubCode = "pub-op";
		}


		$pathtoimag = get_template_directory_uri() . '/img/downarrowtab.svg';

		$arrayList[] = '

	         <div class="accordion-item ' . $classPubCode . '">

	            <h2 class="accordion-header" id="heading-' . $row['ID'] . '">

	              <button class="accordion-button collapsed d-flex align-items-center justify-content-between pr_23_mi" type="button" data-bs-toggle="collapse" data-bs-target="#body-' . $row['ID'] . '">
				  	<div class="mi_title_type">
	                	<p class="remMar mi_20_500"><b>' . $row['name'] . '</b> - <span class="hide_mitch">' . $row['pubType'] . '</span></p>

	                	<small>' . $row['pubYear'] . '</small>
					</div>

					<div class="icon">

					<img src="' . $pathtoimag . '" alt="">

					</div>
	              </button>

	            </h2>

	            <div id="body-' . $row['ID'] . '" class="accordion-collapse collapse" data-bs-parent="#infohub-accordion">

	              <div class="accordion-body">



	                <div class="row align-items-center">

	                    <div class="col-md-7">



	                        <div class="row infohub-accordion-details">

	                            <div class="col-md-5">

	                                <b>' . forceTranslate("Organization Name", "اسم المنظمة") . ':</b>

	                            </div>

	                            <div class="col-md-7">' . $row['orgName'] . '</div>

	                        </div>



	                        <div class="row infohub-accordion-details">

	                            <div class="col-md-5"><b>' . forceTranslate("Organization Type", "نوع المنظمة") . ':</b></div>

	                            <div class="col-md-7">' . $row['orgType'] . '</div>

	                        </div>



	                        <div class="row infohub-accordion-details">

	                            <div class="col-md-5"><b>' . forceTranslate("Publication Country", "بلد النشر") . ':</b></div>

	                            <div class="col-md-7">' . $row['country'] . '</div>

	                        </div>



	                        <div class="row infohub-accordion-details">

	                            <div class="col-md-5"><b>' . forceTranslate("Language", "اللغة") . ':</b></div>

	                            <div class="col-md-7">' . $row['lang_version'] . '</div>

	                        </div>



          		      			<div class="row infohub-accordion-details">

							      				<div class="col-md-5"><b>' . forceTranslate("Publication Date", "تاريخ النشر") . ':</b></div>

							      				<div class="col-md-7">' . $row['pubDate'] . '</div>

							      			</div>



	                        <div class="row infohub-accordion-details">

	                            <div class="col-md-5"><b>' . forceTranslate("Theme of the Publication", "نوع المنشور") . ':</b></div>

	                            <div class="col-md-7">' . $row['theme'] . '</div>

	                        </div>



	                        <div class="row infohub-accordion-details">

	                            <div class="col-md-5"><b>' . forceTranslate("Publication Link", "رابط المنشور") . ':</b></div>

	                            <div class="col-md-7">

	                                ' . $row['pubLinkEn'] . '

	                                ' . $row['pubLinkAr'] . '

	                                ' . $row['pubLinkFr'] . '

	                            </div>

	                        </div>                  



	                        <div class="spacer-20"></div>



	                    </div>

	                    <div class="col-md-5">

	                        <center>

	                            ' . $rows['logo'] . ' 

	                            ' . $rows['modal'] . ' 

	                        </center>

	                    </div>

	                </div>

	                



	              </div>

	            </div>

	          </div>

			';
	}



	$output .= implode("", $arrayList);



	return $output;
}
