<?php



/*-- Ajax --*/

function infohubOrgAjax()
{



	$lang = pll_current_language();

	$output = "";

	$data = $_POST['data'];

	$paged = $_POST['paged'];



	$getPaged = getOrgsPaged($paged);

	$output .= getOrgsHtml($getPaged);



	print $output;



	exit();
}

add_action("wp_ajax_infohubOrgAjax", "infohubOrgAjax");

add_action("wp_ajax_nopriv_infohubOrgAjax", "infohubOrgAjax");



function getOrgs()
{

	$is_mobile = wp_is_mobile();

	// Set the number of posts per page based on whether it's mobile or not
	$posts_per_page = $is_mobile ? 5 : 20;


	$lang = pll_current_language();



	$sortBy = 'org_name_en';

	if ($lang == "ar") {

		$sortBy = 'org_name_ar';
	}



	$args = array(

		'post_type' => 'organization',

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

		$name = get_field("org_name_en", $postId);

		$address = get_field("address_en", $postId);



		$country = "";

		$getCountry = get_field("organization_country", $postId);

		if ($getCountry) {

			$country = $getCountry['label'];
		}



		$cityName = "";

		$getCity = get_field("city", $postId);

		if ($getCity) {

			$cityName = getRelName($getCity[0]);
		}



		$orgType = "";

		$getOrgType = get_field("type_of_organization", $postId);

		if ($getOrgType) {

			$orgType = getTermName($getOrgType);
		}



		$phone = get_field("phone", $postId);

		$email = get_field("email", $postId);



		$website = "";

		$getWebsite = get_field("website", $postId);

		if ($getWebsite) {

			$website = '<a class="fnt-gray" href="' . $getWebsite . '" target="_new">' . forceTranslate("Click here", "انقر هنا") . '</a>';
		}



		$est = get_field("year_of_establishment", $postId);

		$employee = get_field("number_of_employees", $postId);

		$budget = get_field("total_budget_year", $postId);





		$arabCountry = "";

		$getArabCountry = get_field("field_65a920975550b", $postId);

		if ($getArabCountry) {

			$arabCountry = getTermName($getArabCountry);
		}



		$geoInt = "";

		$getGeoInt = get_field("geography_of_intervention", $postId);

		if ($getGeoInt) {

			$geoInt = getTermName($getGeoInt);
		}



		$areasIntArray = array();

		$getAreasInt = get_field("areas_intervention", $postId);

		if ($getAreasInt) {

			foreach ($getAreasInt as $rowAreasInt) {

				$areasIntArray[] = '<p class="fnt-15 remMar">' . getTermName($rowAreasInt) . '</p>';
			}
		}

		if (get_field("areas_of_intervention_others_en", $postId)) {

			$areasIntArray[] = '<p class="fnt-15 remMar">' . get_field("areas_of_intervention_others_en", $postId) . '</p>';
		}



		$typesIntArray = array();

		$getTypesInt = get_field("types_intervention", $postId);

		if ($getTypesInt) {

			foreach ($getTypesInt as $rowTypesInt) {

				$typesIntArray[] = '<p class="fnt-15 remMar">' . getTermName($rowTypesInt) . '</p>';
			}
		}

		if (get_field("types_of_intervention_others_en", $postId)) {

			$typesIntArray[] = '<p class="fnt-15 remMar">' . get_field("types_of_intervention_others_en", $postId) . '</p>';
		}





		if ($lang == "ar") {



			$name = get_field("org_name_ar", $postId);

			$address = get_field("address_ar", $postId);

			if (get_field("areas_of_intervention_others_ar", $postId)) {

				$areasIntArray[] = '<p class="fnt-15 remMar">' . get_field("areas_of_intervention_others_ar", $postId) . '</p>';
			}

			if (get_field("types_of_intervention_others_ar", $postId)) {

				$typesIntArray[] = '<p class="fnt-15 remMar">' . get_field("types_of_intervention_others_ar", $postId) . '</p>';
			}
		}



		$scArray = array();

		$getSc = get_field("social_media_pages", $postId);



		for ($x = 1; $x <= 5; $x++) {

			if ($getSc['social_media_link_' . $x . '']) {

				$getIcon = getSocialIcons($getSc['social_media_type_' . $x . '']);

				$scArray[] = '<span><a href="' . $getSc['social_media_link_' . $x . ''] . '" target="_new">' . $getIcon . '</a></span>';
			}
		}



		$areasInt = implode("", $areasIntArray);

		$typesInt = implode("", $typesIntArray);

		$sc = implode("", $scArray);



		$logo = "";

		// $logo = '

		// 	<img src="'.getPluginDirectory().'/img/sample-logo.svg" class="img-fluid w-100 bordered-shadow infohub-logo" data-bs-toggle="modal" data-bs-target="#logo-modal-'.$postId.'">

		// 	<div class="spacer-20"></div>

		// 	';



		$modal = '

			<div class="modal fade" id="logo-modal-' . $postId . '">

			  <div class="modal-dialog  modal-dialog-centered modal-lg modal-dialog-scrollable">

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

			'orgType' => $orgType,

			'country' => $country,

			'city' => $cityName,

			'address' => $address,

			'phone' => $phone,

			'email' => $email,

			'website' => $website,

			'est' => $est,

			'employee' => $employee,

			'budget' => $budget,

			'geoInt' => $geoInt,

			'arabCountry' => $arabCountry,

			'areasInt' => $areasInt,

			'typesInt' => $typesInt,

			'logo' => $logo,

			'modal' => $modal,

			'social' => $sc

		);
	}





	return $arrayList;
}



function getOrgsPaged($pagedNum)
{

	$is_mobile = wp_is_mobile();

	// Set the number of posts per page based on whether it's mobile or not
	$posts_per_page = $is_mobile ? 5 : 20;


	$lang = pll_current_language();



	$argsCount = array(

		'post_type' => 'organization',

		'post_status' => 'publish',

		'numberposts' => -1

	);

	$queryCount = count(get_posts($argsCount));

	$paged = $pagedNum + 1;

	//$posts_per_page = 20;

	$num_pages = ceil($queryCount / $posts_per_page);

	$offset = $posts_per_page * $paged;



	$sortBy = 'org_name_en';

	if ($lang == "ar") {

		$sortBy = 'org_name_ar';
	}

	$args = array(

		'post_type' => 'organization',

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

		$name = get_field("org_name_en", $postId);

		$address = get_field("address_en", $postId);



		$country = "";

		$getCountry = get_field("organization_country", $postId);

		if ($getCountry) {

			$country = $getCountry['label'];
		}



		$cityName = "";

		$getCity = get_field("city", $postId);

		if ($getCity) {

			$cityName = getRelName($getCity[0]);
		}



		$orgType = "";

		$getOrgType = get_field("type_of_organization", $postId);

		if ($getOrgType) {

			$orgType = getTermName($getOrgType);
		}



		$phone = get_field("phone", $postId);

		$email = get_field("email", $postId);



		$website = "";

		$getWebsite = get_field("website", $postId);

		if ($getWebsite) {

			$website = '<a class="fnt-gray" href="' . $getWebsite . '" target="_new">' . forceTranslate("Click here", "انقر هنا") . '</a>';
		}



		$est = get_field("year_of_establishment", $postId);

		$employee = get_field("number_of_employees", $postId);

		$budget = get_field("total_budget_year", $postId);



		$arabCountry = "";

		$getArabCountry = get_field("field_65a920975550b", $postId);

		if ($getArabCountry) {

			$arabCountry = getTermName($getArabCountry);
		}



		$geoInt = "";

		$getGeoInt = get_field("geography_of_intervention", $postId);

		if ($getGeoInt) {

			$geoInt = getTermName($getGeoInt);
		}



		$areasIntArray = array();

		$getAreasInt = get_field("areas_intervention", $postId);

		if ($getAreasInt) {

			foreach ($getAreasInt as $rowAreasInt) {

				$areasIntArray[] = '<p class="fnt-15 remMar">' . getTermName($rowAreasInt) . '</p>';
			}
		}

		if (get_field("areas_of_intervention_others_en", $postId)) {

			$areasIntArray[] = '<p class="fnt-15 remMar">' . get_field("areas_of_intervention_others_en", $postId) . '</p>';
		}







		$typesIntArray = array();

		$getTypesInt = get_field("types_intervention", $postId);

		if ($getTypesInt) {

			foreach ($getTypesInt as $rowTypesInt) {

				$typesIntArray[] = '<p class="fnt-15 remMar">' . getTermName($rowTypesInt) . '</p>';
			}
		}

		if (get_field("types_of_intervention_others_en", $postId)) {

			$typesIntArray[] = '<p class="fnt-15 remMar">' . get_field("types_of_intervention_others_en", $postId) . '</p>';
		}





		if ($lang == "ar") {



			$name = get_field("org_name_ar", $postId);

			$address = get_field("address_ar", $postId);

			if (get_field("areas_of_intervention_others_ar", $postId)) {

				$areasIntArray[] = '<p class="fnt-15 remMar">' . get_field("areas_of_intervention_others_ar", $postId) . '</p>';
			}

			if (get_field("types_of_intervention_others_ar", $postId)) {

				$typesIntArray[] = '<p class="fnt-15 remMar">' . get_field("types_of_intervention_others_ar", $postId) . '</p>';
			}
		}





		$scArray = array();

		$getSc = get_field("social_media_pages", $postId);



		for ($x = 1; $x <= 5; $x++) {

			if ($getSc['social_media_link_' . $x . '']) {

				$getIcon = getSocialIcons($getSc['social_media_type_' . $x . '']);

				$scArray[] = '<span><a href="' . $getSc['social_media_link_' . $x . ''] . '" target="_new">' . $getIcon . '</a></span>';
			}
		}



		$areasInt = implode("", $areasIntArray);

		$typesInt = implode("", $typesIntArray);

		$sc = implode("", $scArray);



		$logo = "";



		// $logo = '

		// 	<img src="'.getPluginDirectory().'/img/sample-logo.svg" class="img-fluid w-100 bordered-shadow infohub-logo" data-bs-toggle="modal" data-bs-target="#logo-modal-'.$postId.'">

		// 	<div class="spacer-20"></div>

		// 	';



		$modal = '

			<div class="modal fade" id="logo-modal-' . $postId . '">

			  <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">

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

			'orgType' => $orgType,

			'country' => $country,

			'city' => $cityName,

			'address' => $address,

			'phone' => $phone,

			'email' => $email,

			'website' => $website,

			'est' => $est,

			'employee' => $employee,

			'budget' => $budget,

			'geoInt' => $geoInt,

			'arabCountry' => $arabCountry,

			'areasInt' => $areasInt,

			'typesInt' => $typesInt,

			'logo' => $logo,

			'modal' => $modal,

			'social' => $sc,

		);
	}



	return $arrayList;
}

function getorgsearch($arrays)
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

		'post_type' => 'organization',

		'post_status' => 'publish',

		'numberposts' => -1,



	);



	$query = get_posts($args);



	$arrayList = array();


	$output = "<div class='searchajax $title d-flex flex-column'>";
	//    var_dump($title);
	foreach ($query as $row) {



		$postId = $row->ID;

		$link = get_the_permalink($postId);
		$namear =  get_field("org_name_ar", $postId);

		$name =  get_field("org_name_en", $postId);
		$arrayitem = array(
			'link' => $link,
			'name' => $name,
			'name_ar' => $namear,
			'postid' => $postId
		);
		array_push($arrayList, $arrayitem);

		// if($lang == 'en'){
		// 	$titlespace=str_replace('_',' ',$title);
		// 	$titlenospace=explode(" ",$titlespace);
		// 	if(stripos($name,$titlespace,$titlenospace) !== false) {
		// 			$output .= "<a href='$link' target='_blank' class='p-2'>$name</a>";
		// 	}
		// }
		// else{
		// 	$titlespace=str_replace('_',' ',$title);
		// 	$titlenospace=explode(" ",$titlespace);
		// 	if(stripos($namear,$titlespace,$titlenospace) !== false) {
		// 			$output .= "<a href='$link' target='_blank' class='p-2'>$namear</a>";
		// 	}
		// }




	}

	$output .= "</div>";




	// $output .= getPubHtml($arrayList);



	return json_encode($arrayList);
}

function getOrgsFiltered($arrays)
{



	$lang = pll_current_language();



	$frtl = "";



	if ($lang == "ar") {



		$frtl = "force-ltr";
	}



	$countryArray = "";

	$countCountryArray = count($arrays['filter-organizations-country']);

	if ($countCountryArray != 0) {

		$countryArray = array(

			'key' => 'organization_country',

			'value' => $arrays['filter-organizations-country'],

			'compare' => 'IN',

		);
	}



	$orgTypeArray = "";

	$countOrgTypeArray = count($arrays['filter-organizations-type']);

	if ($countOrgTypeArray != 0) {

		$orgTypeArray = array(

			'key' => 'type_of_organization',

			'value' => $arrays['filter-organizations-type'],

			'compare' => 'IN',

		);
	}



	$areasArray = "";

	$countAreasArray = count($arrays['filter-organizations-areas']);

	if ($countAreasArray != 0) {

		$areasArray = array(

			'key' => 'areas_intervention',

			'value' => $arrays['filter-organizations-areas'],

			'compare' => 'IN',

		);
	}





	$sizeArray = "";

	$countSizeArray = count($arrays['filter-organizations-size']);

	if ($countSizeArray != 0) {

		$sizeArray = array(

			'key' => 'number_of_employees',

			'value' => $arrays['filter-organizations-size'],

			'compare' => 'IN',

		);
	}





	$args = array(

		'post_type' => 'organization',

		'post_status' => 'publish',

		'numberposts' => -1,




	);



	$query = get_posts($args);



	$output = "";



	$arrayList = array();

	foreach ($query as $row) {

		$countrymi = get_field('organization_country', $row->ID);
		$words = get_field('type_of_organization', $row->ID);
		$area = get_field('areas_intervention', $row->ID);
		$noe = get_field('number_of_employees', $row->ID);
		if ((in_array($countrymi['value'], $arrays['filter-organizations-country']) || empty($arrays['filter-organizations-country'])) && (in_array($words, $arrays['filter-organizations-type']) || empty($arrays['filter-organizations-type'])) && ((count(array_intersect($area, $arrays['filter-organizations-areas'])) > 0) || empty($arrays['filter-organizations-areas'])) && ((in_array($noe, $arrays['filter-organizations-size'])) || empty($arrays['filter-organizations-size']))) {

			$postId = $row->ID;

			$name = get_field("org_name_en", $postId);

			$address = get_field("address_en", $postId);



			$country = "";

			$getCountry = get_field("organization_country", $postId);

			if ($getCountry) {

				$country = $getCountry['label'];
			}



			$cityName = "";

			$getCity = get_field("city", $postId);

			if ($getCity) {

				$cityName = getRelName($getCity[0]);
			}



			$orgType = "";

			$getOrgType = get_field("type_of_organization", $postId);

			if ($getOrgType) {

				$orgType = getTermName($getOrgType);
			}



			$phone = get_field("phone", $postId);

			$email = get_field("email", $postId);



			$website = "";

			$getWebsite = get_field("website", $postId);

			if ($getWebsite) {

				$website = '<a class="fnt-gray" href="' . $getWebsite . '" target="_new">' . forceTranslate("Click here", "انقر هنا") . '</a>';
			}



			$est = get_field("year_of_establishment", $postId);

			$employee = get_field("number_of_employees", $postId);

			$budget = get_field("total_budget_year", $postId);





			$arabCountry = "";

			$getArabCountry = get_field("field_65a920975550b", $postId);

			if ($getArabCountry) {

				$arabCountry = getTermName($getArabCountry);
			}



			$geoInt = "";

			$getGeoInt = get_field("geography_of_intervention", $postId);

			if ($getGeoInt) {

				$geoInt = getTermName($getGeoInt);
			}



			$areasIntArray = array();

			$getAreasInt = get_field("areas_intervention", $postId);

			if ($getAreasInt) {

				foreach ($getAreasInt as $rowAreasInt) {

					$areasIntArray[] = '<p class="fnt-15 remMar">' . getTermName($rowAreasInt) . '</p>';
				}
			}

			if (get_field("areas_of_intervention_others_en", $postId)) {

				$areasIntArray[] = '<p class="fnt-15 remMar">' . get_field("areas_of_intervention_others_en", $postId) . '</p>';
			}



			$typesIntArray = array();

			$getTypesInt = get_field("types_intervention", $postId);

			if ($getTypesInt) {

				foreach ($getTypesInt as $rowTypesInt) {

					$typesIntArray[] = '<p class="fnt-15 remMar">' . getTermName($rowTypesInt) . '</p>';
				}
			}

			if (get_field("types_of_intervention_others_en", $postId)) {

				$typesIntArray[] = '<p class="fnt-15 remMar">' . get_field("types_of_intervention_others_en", $postId) . '</p>';
			}





			if ($lang == "ar") {



				$name = get_field("org_name_ar", $postId);

				$address = get_field("address_ar", $postId);

				if (get_field("areas_of_intervention_others_ar", $postId)) {

					$areasIntArray[] = '<p class="fnt-15 remMar">' . get_field("areas_of_intervention_others_ar", $postId) . '</p>';
				}

				if (get_field("types_of_intervention_others_ar", $postId)) {

					$typesIntArray[] = '<p class="fnt-15 remMar">' . get_field("types_of_intervention_others_ar", $postId) . '</p>';
				}
			}



			$scArray = array();

			$getSc = get_field("social_media_pages", $postId);



			for ($x = 1; $x <= 5; $x++) {

				if ($getSc['social_media_link_' . $x . '']) {

					$getIcon = getSocialIcons($getSc['social_media_type_' . $x . '']);

					$scArray[] = '<span><a href="' . $getSc['social_media_link_' . $x . ''] . '" target="_new">' . $getIcon . '</a></span>';
				}
			}



			$areasInt = implode("", $areasIntArray);

			$typesInt = implode("", $typesIntArray);

			$sc = implode("", $scArray);



			$logo = "";

			// $logo = '

			// 	<img src="'.getPluginDirectory().'/img/sample-logo.svg" class="img-fluid w-100 bordered-shadow infohub-logo" data-bs-toggle="modal" data-bs-target="#logo-modal-'.$postId.'">

			// 	<div class="spacer-20"></div>

			// 	';



			$modal = '

			<div class="modal fade" id="logo-modal-' . $postId . '">

			  <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">

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

				'orgType' => $orgType,

				'country' => $country,

				'city' => $cityName,

				'address' => $address,

				'phone' => $phone,

				'email' => $email,

				'website' => $website,

				'est' => $est,

				'employee' => $employee,

				'budget' => $budget,

				'geoInt' => $geoInt,

				'arabCountry' => $arabCountry,

				'areasInt' => $areasInt,

				'typesInt' => $typesInt,

				'logo' => $logo,

				'modal' => $modal,

				'social' => $sc

			);
		}
	}


	$output .= getOrgsHtml($arrayList);



	return $output;
}

/** search results */
function getorgsresults($arrays)
{



	$lang = pll_current_language();



	$frtl = "";



	if ($lang == "ar") {



		$frtl = "force-ltr";
	}

	$title = array_keys($arrays)[0];


	$countryArray = "";




	$orgTypeArray = "";





	$areasArray = "";







	$sizeArray = "";


	$title = array_keys($arrays)[0];




	$args = array(

		'post_type' => 'organization',

		'post_status' => 'publish',

		'post__in' => array($title),

		'numberposts' => -1,




	);



	$query = get_posts($args);



	$output = "";



	$arrayList = array();

	foreach ($query as $row) {

		$countrymi = get_field('organization_country', $row->ID);
		$words = get_field('type_of_organization', $row->ID);
		$area = get_field('areas_intervention', $row->ID);
		$noe = get_field('number_of_employees', $row->ID);

		$postId = $row->ID;

		$name = get_field("org_name_en", $postId);

		$address = get_field("address_en", $postId);



		$country = "";

		$getCountry = get_field("organization_country", $postId);

		if ($getCountry) {

			$country = $getCountry['label'];
		}



		$cityName = "";

		$getCity = get_field("city", $postId);

		if ($getCity) {

			$cityName = getRelName($getCity[0]);
		}



		$orgType = "";

		$getOrgType = get_field("type_of_organization", $postId);

		if ($getOrgType) {

			$orgType = getTermName($getOrgType);
		}



		$phone = get_field("phone", $postId);

		$email = get_field("email", $postId);



		$website = "";

		$getWebsite = get_field("website", $postId);

		if ($getWebsite) {

			$website = '<a class="fnt-gray" href="' . $getWebsite . '" target="_new">' . forceTranslate("Click here", "انقر هنا") . '</a>';
		}



		$est = get_field("year_of_establishment", $postId);

		$employee = get_field("number_of_employees", $postId);

		$budget = get_field("total_budget_year", $postId);





		$arabCountry = "";

		$getArabCountry = get_field("field_65a920975550b", $postId);

		if ($getArabCountry) {

			$arabCountry = getTermName($getArabCountry);
		}



		$geoInt = "";

		$getGeoInt = get_field("geography_of_intervention", $postId);

		if ($getGeoInt) {

			$geoInt = getTermName($getGeoInt);
		}



		$areasIntArray = array();

		$getAreasInt = get_field("areas_intervention", $postId);

		if ($getAreasInt) {

			foreach ($getAreasInt as $rowAreasInt) {

				$areasIntArray[] = '<p class="fnt-15 remMar">' . getTermName($rowAreasInt) . '</p>';
			}
		}

		if (get_field("areas_of_intervention_others_en", $postId)) {

			$areasIntArray[] = '<p class="fnt-15 remMar">' . get_field("areas_of_intervention_others_en", $postId) . '</p>';
		}



		$typesIntArray = array();

		$getTypesInt = get_field("types_intervention", $postId);

		if ($getTypesInt) {

			foreach ($getTypesInt as $rowTypesInt) {

				$typesIntArray[] = '<p class="fnt-15 remMar">' . getTermName($rowTypesInt) . '</p>';
			}
		}

		if (get_field("types_of_intervention_others_en", $postId)) {

			$typesIntArray[] = '<p class="fnt-15 remMar">' . get_field("types_of_intervention_others_en", $postId) . '</p>';
		}





		if ($lang == "ar") {



			$name = get_field("org_name_ar", $postId);

			$address = get_field("address_ar", $postId);

			if (get_field("areas_of_intervention_others_ar", $postId)) {

				$areasIntArray[] = '<p class="fnt-15 remMar">' . get_field("areas_of_intervention_others_ar", $postId) . '</p>';
			}

			if (get_field("types_of_intervention_others_ar", $postId)) {

				$typesIntArray[] = '<p class="fnt-15 remMar">' . get_field("types_of_intervention_others_ar", $postId) . '</p>';
			}
		}



		$scArray = array();

		$getSc = get_field("social_media_pages", $postId);



		for ($x = 1; $x <= 5; $x++) {

			if ($getSc['social_media_link_' . $x . '']) {

				$getIcon = getSocialIcons($getSc['social_media_type_' . $x . '']);

				$scArray[] = '<span><a href="' . $getSc['social_media_link_' . $x . ''] . '" target="_new">' . $getIcon . '</a></span>';
			}
		}



		$areasInt = implode("", $areasIntArray);

		$typesInt = implode("", $typesIntArray);

		$sc = implode("", $scArray);



		$logo = "";

		// $logo = '

		// 	<img src="'.getPluginDirectory().'/img/sample-logo.svg" class="img-fluid w-100 bordered-shadow infohub-logo" data-bs-toggle="modal" data-bs-target="#logo-modal-'.$postId.'">

		// 	<div class="spacer-20"></div>

		// 	';

		$modal = "";

		// $modal = '

		// 	<div class="modal fade" id="logo-modal-' . $postId . '">

		// 	  <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">

		// 	    <div class="modal-content">

		// 	      <div class="modal-header">

		// 	        <h1 class="modal-title fs-5"></h1>

		// 	        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

		// 	      </div>

		// 	      <div class="modal-body">

		// 	        <center>

		// 	        <img src="' . getPluginDirectory() . '/img/sample-logo.svg" class="img-fluid w-100">

		// 	        </center>

		// 	      </div>

		// 	  </div>

		// 	</div>		

		// ';

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

			'orgType' => $orgType,

			'country' => $country,

			'city' => $cityName,

			'address' => $address,

			'phone' => $phone,

			'email' => $email,

			'website' => $website,

			'est' => $est,

			'employee' => $employee,

			'budget' => $budget,

			'geoInt' => $geoInt,

			'arabCountry' => $arabCountry,

			'areasInt' => $areasInt,

			'typesInt' => $typesInt,

			'logo' => $logo,

			'modal' => $modal,

			'social' => $sc

		);
	}


	$output .= getOrgsHtml($arrayList);



	return $output;
}
/** search results */
function returnfromprojectorgs($arrays)
{



	$lang = pll_current_language();



	$frtl = "";



	if ($lang == "ar") {



		$frtl = "force-ltr";
	}

	// $title = array_keys($arrays)[0];


	$countryArray = "";




	$orgTypeArray = "";





	$areasArray = "";







	$sizeArray = "";


	// $title = array_keys($arrays)[0];




	$args = array(

		'post_type' => 'organization',

		'post_status' => 'publish',

		'post__in' => array($arrays),

		'numberposts' => -1,




	);



	$query = get_posts($args);



	$output = "";



	$arrayList = array();

	foreach ($query as $row) {

		$countrymi = get_field('organization_country', $row->ID);
		$words = get_field('type_of_organization', $row->ID);
		$area = get_field('areas_intervention', $row->ID);
		$noe = get_field('number_of_employees', $row->ID);

		$postId = $row->ID;

		$name = get_field("org_name_en", $postId);

		$address = get_field("address_en", $postId);



		$country = "";

		$getCountry = get_field("organization_country", $postId);

		if ($getCountry) {

			$country = $getCountry['label'];
		}



		$cityName = "";

		$getCity = get_field("city", $postId);

		if ($getCity) {

			$cityName = getRelName($getCity[0]);
		}



		$orgType = "";

		$getOrgType = get_field("type_of_organization", $postId);

		if ($getOrgType) {

			$orgType = getTermName($getOrgType);
		}



		$phone = get_field("phone", $postId);

		$email = get_field("email", $postId);



		$website = "";

		$getWebsite = get_field("website", $postId);

		if ($getWebsite) {

			$website = '<a class="fnt-gray" href="' . $getWebsite . '" target="_new">' . forceTranslate("Click here", "انقر هنا") . '</a>';
		}



		$est = get_field("year_of_establishment", $postId);

		$employee = get_field("number_of_employees", $postId);

		$budget = get_field("total_budget_year", $postId);





		$arabCountry = "";

		$getArabCountry = get_field("field_65a920975550b", $postId);

		if ($getArabCountry) {

			$arabCountry = getTermName($getArabCountry);
		}



		$geoInt = "";

		$getGeoInt = get_field("geography_of_intervention", $postId);

		if ($getGeoInt) {

			$geoInt = getTermName($getGeoInt);
		}



		$areasIntArray = array();

		$getAreasInt = get_field("areas_intervention", $postId);

		if ($getAreasInt) {

			foreach ($getAreasInt as $rowAreasInt) {

				$areasIntArray[] = '<p class="fnt-15 remMar">' . getTermName($rowAreasInt) . '</p>';
			}
		}

		if (get_field("areas_of_intervention_others_en", $postId)) {

			$areasIntArray[] = '<p class="fnt-15 remMar">' . get_field("areas_of_intervention_others_en", $postId) . '</p>';
		}



		$typesIntArray = array();

		$getTypesInt = get_field("types_intervention", $postId);

		if ($getTypesInt) {

			foreach ($getTypesInt as $rowTypesInt) {

				$typesIntArray[] = '<p class="fnt-15 remMar">' . getTermName($rowTypesInt) . '</p>';
			}
		}

		if (get_field("types_of_intervention_others_en", $postId)) {

			$typesIntArray[] = '<p class="fnt-15 remMar">' . get_field("types_of_intervention_others_en", $postId) . '</p>';
		}





		if ($lang == "ar") {



			$name = get_field("org_name_ar", $postId);

			$address = get_field("address_ar", $postId);

			if (get_field("areas_of_intervention_others_ar", $postId)) {

				$areasIntArray[] = '<p class="fnt-15 remMar">' . get_field("areas_of_intervention_others_ar", $postId) . '</p>';
			}

			if (get_field("types_of_intervention_others_ar", $postId)) {

				$typesIntArray[] = '<p class="fnt-15 remMar">' . get_field("types_of_intervention_others_ar", $postId) . '</p>';
			}
		}



		$scArray = array();

		$getSc = get_field("social_media_pages", $postId);



		for ($x = 1; $x <= 5; $x++) {

			if ($getSc['social_media_link_' . $x . '']) {

				$getIcon = getSocialIcons($getSc['social_media_type_' . $x . '']);

				$scArray[] = '<span><a href="' . $getSc['social_media_link_' . $x . ''] . '" target="_new">' . $getIcon . '</a></span>';
			}
		}



		$areasInt = implode("", $areasIntArray);

		$typesInt = implode("", $typesIntArray);

		$sc = implode("", $scArray);



		$logo = "";

		// $logo = '

		// 	<img src="'.getPluginDirectory().'/img/sample-logo.svg" class="img-fluid w-100 bordered-shadow infohub-logo" data-bs-toggle="modal" data-bs-target="#logo-modal-'.$postId.'">

		// 	<div class="spacer-20"></div>

		// 	';

		$modal = "";

		// $modal = '

		// 	<div class="modal fade" id="logo-modal-' . $postId . '">

		// 	  <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">

		// 	    <div class="modal-content">

		// 	      <div class="modal-header">

		// 	        <h1 class="modal-title fs-5"></h1>

		// 	        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

		// 	      </div>

		// 	      <div class="modal-body">

		// 	        <center>

		// 	        <img src="' . getPluginDirectory() . '/img/sample-logo.svg" class="img-fluid w-100">

		// 	        </center>

		// 	      </div>

		// 	  </div>

		// 	</div>		

		// ';

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

			'orgType' => $orgType,

			'country' => $country,

			'city' => $cityName,

			'address' => $address,

			'phone' => $phone,

			'email' => $email,

			'website' => $website,

			'est' => $est,

			'employee' => $employee,

			'budget' => $budget,

			'geoInt' => $geoInt,

			'arabCountry' => $arabCountry,

			'areasInt' => $areasInt,

			'typesInt' => $typesInt,

			'logo' => $logo,

			'modal' => $modal,

			'social' => $sc

		);
	}


	$output .= getOrgsHtml($arrayList);



	return $output;
}




function getOrgsHtml($arrays)
{



	$lang = pll_current_language();

	$output = "";



	$frtl = "";

	if ($lang == "ar") {

		$frtl = "force-ltr";
	}



	$arrayList = array();

	foreach ($arrays as $rows) {



		$socialTitle = "";

		if ($rows['social']) {

			$socialTitle = '<p class="fnt-15 fnt-dark-gray remMar"><b>' . forceTranslate("Social Media", "Social Media") . '</b></p>';
		}

		$pathtoimag = get_template_directory_uri() . '/img/downarrowtab.svg';

		$arrayList[] = '

	      <div class="accordion-item">

	        <h2 class="accordion-header d-flex align-items-center" id="heading-' . $rows['ID'] . '">

	          <button class="accordion-button collapsed d-flex align-items-center justify-content-between pr_23_mi" type="button" data-bs-toggle="collapse" data-bs-target="#body-' . $rows['ID'] . '">

			  	<div class="mi_title_type">
	            	<p class="remMar mi_20_500"><b>' . $rows['name'] . '</b> - <span class="hide_mitch">' . $rows['orgType'] . '</span></p>

	            	<small>' . $rows['country'] . '</small>
				</div>

				<div class="icon">

				<img src="' . $pathtoimag . '" alt="">

				</div>
	          </button>

	        </h2>

	        <div id="body-' . $rows['ID'] . '" class="accordion-collapse collapse" data-bs-parent="#infohub-accordion">

	          <div class="accordion-body">



	            <div class="row align-items-center">

	              <div class="col-md-7">



	                <div class="row infohub-accordion-details">

	                  <div class="col-md-5"><b>' . forceTranslate("Location Address", "العنوان") . ':</b></div>

	                  <div class="col-md-7">' . $rows['address'] . '</div>

	                </div>



	                <div class="row infohub-accordion-details">

	                  <div class="col-md-5"><b>' . forceTranslate("Phone Number", "رقم الهاتف") . ':</b></div>

	                  <div class="col-md-7"><font class="' . $frtl . '">' . $rows['phone'] . '</font></div>

	                </div>



	                <div class="row infohub-accordion-details">

	                  <div class="col-md-5"><b>' . forceTranslate("E-mail Address", "العنوان البريدي") . ':</b></div>

	                  <div class="col-md-7">' . $rows['email'] . '</div>

	                </div>



	                <div class="row infohub-accordion-details">

	                  <div class="col-md-5"><b>' . forceTranslate("Official Website", "عنوان البريد الإلكتروني") . ':</b></div>

	                  <div class="col-md-7">' . $rows['website'] . '</div>       

	                </div>





	                <div class="row infohub-accordion-details">

	                  <div class="col-md-5"><b>' . forceTranslate("Type of Organization", "الموقع الإلكتروني٬") . ':</b></div>

	                  <div class="col-md-7">' . $rows['orgType'] . '</div>

	                </div>



	                <div class="row infohub-accordion-details">

	                  <div class="col-md-5"><b>' . forceTranslate("Year of Establishment", "سنة التأسيس") . ':</b></div>

	                  <div class="col-md-7"><font class="' . $frtl . '">' . $rows['est'] . '</font></div>

	                </div>



	                <div class="row infohub-accordion-details">

	                  <div class="col-md-5"><b>' . forceTranslate("Number of Employees", "عدد الموظفين") . ':</b></div>

	                  <div class="col-md-7"><font class="' . $frtl . '">' . $rows['employee'] . '</font></div>

	                </div>



	                <div class="row infohub-accordion-details">

	                  <div class="col-md-5"><b>' . forceTranslate("Total Budget $ / Year", "إجمالية الميزانية $ ( السنة )") . ':</b></div>

	                  <div class="col-md-7"><font class="' . $frtl . '">' . $rows['budget'] . '</font></div>

	                </div>                                          



	                <div class="row infohub-accordion-details">

	                  <div class="col-md-5"><b>' . forceTranslate("Geography of Intervention", "مناطق التدخل") . ':</b></div>

	                  <div class="col-md-7">' . $rows['geoInt'] . ' ' . $rows['arabCountry'] . '</div>

	                </div>  



	                <div class="row infohub-accordion-details">

	                  <div class="col-md-5"><b>' . forceTranslate("Areas of Intervention", "مجالات التدخل") . ':</b></div>

	                  <div class="col-md-7">' . $rows['areasInt'] . '</div>

	                </div>



	                <div class="row infohub-accordion-details">

	                  <div class="col-md-5"><b>' . forceTranslate("Types of Intervention", "نوع التدخل") . ':</b></div>

	                  <div class="col-md-7">' . $rows['typesInt'] . '</div>

	                </div>                                   



	                <div class="spacer-20"></div>



	              </div>

	              <div class="col-md-5">

	                <center>

	            		' . $rows['logo'] . '                  

	            		' . $rows['modal'] . '

	              	  <div class="infohub-social">

	              	  ' . $socialTitle . '

	            		' . $rows['social'] . '

	            	  </div>



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
