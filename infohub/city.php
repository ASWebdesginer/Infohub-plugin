<?php



/*-- Ajax --*/

function infohubCityAjax()
{



	$lang = pll_current_language();

	$output = "";

	$data = $_POST['data'];

	$paged = $_POST['paged'];



	$frtl = "";

	if ($lang == "ar") {

		$frtl = "force-ltr";
	}



	$getPaged = getCityPaged($paged);

	$output .= getCitiesHtml($getPaged);



	print $output;



	exit();
}

add_action("wp_ajax_infohubCityAjax", "infohubCityAjax");

add_action("wp_ajax_nopriv_infohubCityAjax", "infohubCityAjax");





function getSingleCity($id)
{



	$lang = pll_current_language();



	$getProj = get_post($id);



	$postId = $getProj->ID;



	$postId = $getProj->ID;

	$title = $getProj->post_title;



	$country = "";

	$getCountry = get_field("field_65aa214151992", $postId);

	if ($getCountry) {

		$country = $getCountry['label'];
	}



	$latitude = get_field("field_65070d9f2ac3e", $postId);

	$longtitude = get_field("field_65070d882ac3d", $postId);



	$city_page = get_field("field_65aa3abfea002", $postId);



	$city_markers = "";

	$getCityMarkers = get_field("field_65ad8f3c4f6ab", $postId);

	if ($getCityMarkers && $getCityMarkers != 0) {

		$city_markers = getTermName($getCityMarkers);
	}



	$name_authority = get_field("name_authority", $postId);



	$city_size = "";

	$getCitySize = get_field("field_65aa3ca620185", $postId);

	if ($getCitySize && $getCitySize != 0) {

		$city_size = getTermName($getCitySize);
	}



	$website = "";

	$getWebsite = get_field("field_65aa39b281ed3", $postId);

	if ($getWebsite) {

		$website = '<a class="fnt-gray" href="' . $getWebsite . '" target="_new">' . forceTranslate("Click here", "انقر هنا") . '</a>';
	}



	$scArray = array();

	$getSc = get_field("field_65aa3a34563e8", $postId);



	for ($x = 1; $x <= 5; $x++) {

		if ($getSc['social_media_link_' . $x . '']) {

			$getIcon = getSocialIcons($getSc['social_media_type_' . $x . '']);

			$scArray[] = '<span><a href="' . $getSc['social_media_link_' . $x . ''] . '" target="_new">' . $getIcon . '</a></span>';
		}
	}

	$sc = implode("", $scArray);



	$geo =  get_field("geo", $postId);

	$demographic =  get_field("demographic", $postId);

	$environmental =  get_field("environmental", $postId);

	$economic =  get_field("economic", $postId);

	$housing =  get_field("housing", $postId);

	$transport =  get_field("transport", $postId);



	$boundary = "";

	$getBoundary =  get_field("boundary", $postId);

	if ($getBoundary) {



		$boundary = '

				<div class="row">

					<div class="col-md-12 d-flex relThis">



						<img src="' . $getBoundary . '" class="img-fluid w-100 bordered-shadow">



						<div class="fig-details w-50">

							<p class="fnt-15 remMar "><b>' . forceTranslate("Title", "العنوان") . ':</b> ' . forceTranslate("Map shows the administrative boundary of", "Title: Map shows the administrative boundary of") . ' ' . $title . '</p>

						</div>



						<div class="spacer-20"></div>	



					</div>

				</div>

				<div class="spacer-20"></div>

			';
	}













	$photo1 = "";

	$photo2 = "";

	$photo3 = "";

	$photo4 = "";

	$getCityGallery =  get_field("city_gallery", $postId);



	if ($getCityGallery['city_photo_1']) {

		$photo1 = '



				<div class="col-md-6 d-flex relThis">



					<img src="' . $getCityGallery['city_photo_1'] . '" alt="" class="img-fluid w-100 fig-img">



					<div class="fig-details">



						<p class="fnt-15 remMar"><b>' . forceTranslate("Title", "العنوان") . ':</b> 

							' . $getCityGallery['city_photo_title_1'] . '

						</p>



						<p class="fnt-15 remMar"><b>' . forceTranslate("Source", "المصدر") . ':</b> 



							<a href="' . $getCityGallery['city_photo_link_1'] . '" target="_new" class="deepbluefademi">' . forceTranslate("Click Here", "اضغط هنا") . '</a>



						</p>



					</div>



					<div class="spacer-20"></div>	



				</div>



			';
	}



	if ($getCityGallery['city_photo_2']) {

		$photo2 = '



				<div class="col-md-6 d-flex relThis">



					<img src="' . $getCityGallery['city_photo_2'] . '" alt="" class="img-fluid w-100 fig-img">



					<div class="fig-details">



						<p class="fnt-15 remMar"><b>' . forceTranslate("Title", "العنوان") . ':</b> 

							' . $getCityGallery['city_photo_title_2'] . '

						</p>



						<p class="fnt-15 remMar"><b>' . forceTranslate("Source", "المصدر") . ':</b> 



							<a href="' . $getCityGallery['city_photo_link_2'] . '" target="_new" class="deepbluefademi">' . forceTranslate("Click Here", "اضغط هنا") . '</a>



						</p>



					</div>



					<div class="spacer-20"></div>	



				</div>



			';
	}



	if ($getCityGallery['city_photo_3']) {

		$photo3 = '



				<div class="col-md-6 d-flex relThis">



					<img src="' . $getCityGallery['city_photo_3'] . '" alt="" class="img-fluid w-100 fig-img">



					<div class="fig-details">



						<p class="fnt-15 remMar"><b>' . forceTranslate("Title", "العنوان") . ':</b> 

							' . $getCityGallery['city_photo_title_3'] . '

						</p>



						<p class="fnt-15 remMar"><b>' . forceTranslate("Source", "المصدر") . ':</b> 



							<a href="' . $getCityGallery['city_photo_link_3'] . '" target="_new" class="deepbluefademi">' . forceTranslate("Click Here", "اضغط هنا") . '</a>



						</p>



					</div>



					<div class="spacer-20"></div>	



				</div>



			';
	}



	if ($getCityGallery['city_photo_4']) {

		$photo4 = '



				<div class="col-md-6 d-flex relThis">



					<img src="' . $getCityGallery['city_photo_4'] . '" alt="" class="img-fluid w-100 fig-img">



					<div class="fig-details">



						<p class="fnt-15 remMar"><b>' . forceTranslate("Title", "العنوان") . ':</b> 

							' . $getCityGallery['city_photo_title_4'] . '

						</p>



						<p class="fnt-15 remMar"><b>' . forceTranslate("Source", "المصدر") . ':</b> 



							<a href="' . $getCityGallery['city_photo_link_4'] . '" target="_new" class="deepbluefademi">' . forceTranslate("Click Here", "اضغط هنا") . '</a>



						</p>



					</div>



					<div class="spacer-20"></div>	



				</div>



			';
	}





	$banner = getPluginDirectory() . 'img/sample-city.jpg';

	$getBanner = wp_get_attachment_url(get_post_thumbnail_id($postId), 'full');

	if ($getBanner) {

		$banner = $getBanner;
	}



	$arrayList = array(

		'ID' => $postId,

		'title' => $title,

		'banner' => $banner,

		'country' => $country,

		'latitude' => $latitude,

		'longtitude' => $longtitude,

		'city_page' => $city_page,

		'city_markers' => $city_markers,

		'name_authority' => $name_authority,

		'city_size' => $city_size,

		'website' => $website,

		'sc' => $sc,

		'geo' => $geo,

		'demographic' => $demographic,

		'environmental' => $environmental,

		'economic' => $economic,

		'housing' => $housing,

		'transport' => $transport,

		'boundary' => $boundary,

		'photo1' => $photo1,

		'photo2' => $photo2,

		'photo3' => $photo3,

		'photo4' => $photo4,

	);



	return $arrayList;
}



function getCity()
{

	$ismobile=wp_is_mobile();
    

	$lang = pll_current_language();



	// $sortBy = 'title_en';

	// if($lang == "ar"){

	// 	$sortBy = 'title_ar';

	// }



	$args = array(

		'post_type' => 'city',

		'post_status' => 'publish',

		'numberposts' => $ismobile ? 5 : 20,

		'orderby'  => 'title',

		'order' => 'ASC'

	);

	$query = get_posts($args);



	$arrayList = array();







	foreach ($query as $row) {



		//print_r($row);



		$postId = $row->ID;

		$title = $row->post_title;



		$country = "";

		$getCountry = get_field("field_65aa214151992", $postId);

		if ($getCountry) {

			$country = $getCountry['label'];
		}



		$latitude = get_field("field_65070d9f2ac3e", $postId);

		$longtitude = get_field("field_65070d882ac3d", $postId);



		$city_page = get_field("field_65aa3abfea002", $postId);



		$city_markers = "";

		$getCityMarkers = get_field("field_65ad8f3c4f6ab", $postId);

		if ($getCityMarkers && $getCityMarkers != 0) {

			$city_markers = $getCityMarkers;
		}





		$name_authority = get_field("name_authority", $postId);



		$city_size = "";

		$getCitySize = get_field("field_65aa3ca620185", $postId);

		if ($getCitySize && $getCitySize != 0) {

			$city_size = getTermName($getCitySize);
		}



		$website = "";

		$getWebsite = get_field("field_65aa39b281ed3", $postId);

		if ($getWebsite) {

			$website = '<a class="fnt-gray" href="' . $getWebsite . '" target="_new">' . forceTranslate("Click here", "انقر هنا") . '</a>';
		}



		$scArray = array();

		$getSc = get_field("field_65aa3a34563e8", $postId);



		for ($x = 1; $x <= 5; $x++) {

			if ($getSc['social_media_link_' . $x . '']) {

				$getIcon = getSocialIcons($getSc['social_media_type_' . $x . '']);

				$scArray[] = '<span><a href="' . $getSc['social_media_link_' . $x . ''] . '" target="_new">' . $getIcon . '</a></span>';
			}
		}

		$sc = implode("", $scArray);



		$geo =  get_field("geo", $postId);

		$demographic =  get_field("demographic", $postId);

		$environmental =  get_field("environmental", $postId);

		$economic =  get_field("economic", $postId);

		$housing =  get_field("housing", $postId);

		$transport =  get_field("transport", $postId);



		$boundary = "";

		$getBoundary =  get_field("boundary", $postId);

		if ($getBoundary) {

			$boundary = '<img src="' . $getBoundary . '" class="img-fluid w-100">';
		}



		$city_gallery = "";

		$getCityGallery =  get_field("boundary", $postId);

		if ($getCityGallery) {

			$city_gallery = $getCityGallery;
		}



		$arrayList[] = array(

			'ID' => $postId,

			'title' => $title,

			'country' => $country,

			'latitude' => $latitude,

			'longtitude' => $longtitude,

			'city_page' => $city_page,

			'city_markers' => $city_markers,

			'name_authority' => $name_authority,

			'city_size' => $city_size,

			'website' => $website,

			'sc' => $sc,

			'geo' => $geo,

			'demographic' => $demographic,

			'economic' => $economic,

			'housing' => $housing,

			'transport' => $transport,

			'boundary' => $boundary,

			'city_gallery' => $city_gallery,

		);
	}



	return $arrayList;
}



function getCityPaged($pagedNum)
{



	$lang = pll_current_language();



	$argsCount = array(

		'post_type' => 'city',

		'post_status' => 'publish',

		'numberposts' => -1

	);
    
	$ismobile=wp_is_mobile();
	$queryCount = count(get_posts($argsCount));

	$paged = $pagedNum + 1;

	$posts_per_page = $ismobile ? 5 : 20;

	$num_pages = ceil($queryCount / $posts_per_page);

	$offset = $posts_per_page * $paged;





	$args = array(

		'post_type' => 'city',

		'post_status' => 'publish',

		'posts_per_page' => $posts_per_page,

		'offset' => $offset,

		'orderby'  => 'title',

		'order' => 'ASC'

	);

	$query = get_posts($args);



	$arrayList = array();



	foreach ($query as $row) {



		$postId = $row->ID;

		$title = $row->post_title;



		$country = "";

		$getCountry = get_field("field_65aa214151992", $postId);

		if ($getCountry) {

			$country = $getCountry['label'];
		}



		$latitude = get_field("field_65070d9f2ac3e", $postId);

		$longtitude = get_field("field_65070d882ac3d", $postId);



		$city_page = get_field("field_65aa3abfea002", $postId);



		$city_markers = "";

		$getCityMarkers = get_field("field_65ad8f3c4f6ab", $postId);

		if ($getCityMarkers && $getCityMarkers != 0) {

			$city_markers = $getCityMarkers;
		}



		$name_authority = get_field("name_authority", $postId);



		$city_size = "";

		$getCitySize = get_field("field_65aa3ca620185", $postId);

		if ($getCitySize && $getCitySize != 0) {

			$city_size = getTermName($getCitySize);
		}



		$website = "";

		$getWebsite = get_field("field_65aa39b281ed3", $postId);

		if ($getWebsite) {

			$website = '<a class="fnt-gray" href="' . $getWebsite . '" target="_new">' . forceTranslate("Click here", "انقر هنا") . '</a>';
		}



		$scArray = array();

		$getSc = get_field("field_65aa3a34563e8", $postId);



		for ($x = 1; $x <= 5; $x++) {

			if ($getSc['social_media_link_' . $x . '']) {

				$getIcon = getSocialIcons($getSc['social_media_type_' . $x . '']);

				$scArray[] = '<span><a href="' . $getSc['social_media_link_' . $x . ''] . '" target="_new">' . $getIcon . '</a></span>';
			}
		}

		$sc = implode("", $scArray);



		$geo =  get_field("geo", $postId);

		$demographic =  get_field("demographic", $postId);

		$environmental =  get_field("environmental", $postId);

		$economic =  get_field("economic", $postId);

		$housing =  get_field("housing", $postId);

		$transport =  get_field("transport", $postId);



		$boundary = "";

		$getBoundary =  get_field("boundary", $postId);

		if ($getBoundary) {

			$boundary = '<img src="' . $getBoundary . '" class="img-fluid w-100">';
		}



		$city_gallery = "";

		$getCityGallery =  get_field("boundary", $postId);

		if ($getCityGallery) {

			$city_gallery = $getCityGallery;
		}



		$arrayList[] = array(

			'ID' => $postId,

			'title' => $title,

			'country' => $country,

			'latitude' => $latitude,

			'longtitude' => $longtitude,

			'city_page' => $city_page,

			'city_markers' => $city_markers,

			'name_authority' => $name_authority,

			'city_size' => $city_size,

			'website' => $website,

			'sc' => $sc,

			'geo' => $geo,

			'demographic' => $demographic,

			'economic' => $economic,

			'housing' => $housing,

			'transport' => $transport,

			'boundary' => $boundary,

			'city_gallery' => $city_gallery,

		);
	}



	return $arrayList;
}



function getCitiesInfohub()
{



	$lang = pll_current_language();



	$args = array(

		'post_type' => 'city',

		'lang' => $lang,

		'posts_per_page' => -1,

	);



	$posts = get_posts($args);



	$arrayList = array();



	foreach ($posts as $row) {



		$postId = $row->ID;

		$longtitude = preg_replace('/\s+/', '', get_field('longtitude', $postId));

		$latitude = preg_replace('/\s+/', '', get_field('latitude', $postId));

		$country = get_field('country', $postId);



		$markers = "";

		$getmarkers = get_field('city_markers', $postId);

		if ($getmarkers == 1867 || $getmarkers == 1873) {
			$markers = "m-blue";
		}

		if ($getmarkers == 1865 || $getmarkers == 1871) {
			$markers = "m-black";
		}

		if ($getmarkers == 1869 || $getmarkers == 1875) {
			$markers = "m-gray";
		}



		//print_r($country);



		$featImg = get_featured_image_url($postId);

		$content = $row->post_content;



		$img_url = site_url() . '/wp-content/uploads/2023/11/country-img.jpg';

		if ($featImg) {

			$img_url = $featImg;
		}



		$contentPost = "";

		if ($content) {

			$contentPost = $content;
		}



		$arrayList[] = array(

			'type' => 'Feature',

			'ccode' => $country['value'],

			'properties' => array(

				'Name' => $row->post_title,

				'Info' => $contentPost,

				'Marker' => $markers,

				'Image' => null,

				'x' => $longtitude,

				'y' => $latitude,

			),

			'geometry' => array(

				'type' => 'Point',

				'coordinates' => array($longtitude, $latitude)

			),

		);
	}

	//array_push($geojson['features'], $arrayList);



	$geojson = array(

		'type' => 'FeatureCollection',

		'name' => "test_points",

		'crs' => array(

			'type' => "name",

			'properties' => array(

				'name' => "urn:ogc:def:crs:OGC:1.3:CRS84"

			),

		),

		'features'  => $arrayList

	);



	//header('Content-type: application/json');

	//print_r($geojson);

	return json_encode($geojson, JSON_NUMERIC_CHECK);
}



function getCityDetailsInfohub()
{



	$lang = pll_current_language();



	$args = array(

		'post_type' => 'city',

		'lang' => $lang,

		'posts_per_page' => -1,

	);



	$posts = get_posts($args);



	$arrayList = array();



	foreach ($posts as $row) {



		// print_r($row);



		$postId = $row->ID;

		$longtitude = get_field('longtitude', $postId);

		$latitude = get_field('latitude', $postId);

		$featImg = get_featured_image_url($postId);

		$content = $row->post_content;

		$country = get_field('country', $postId);

		$markers = "";



		$img_url = site_url() . '/wp-content/uploads/2023/11/country-img.jpg';

		if ($featImg) {

			$img_url = $featImg;
		}



		$contentPost = " ";

		if ($content) {

			$contentPost = $content;
		}



		$forceRtl = '';

		if ($lang == "ar") {

			$forceRtl = 'force-rtl';
		}



		$arrayList[] = '

         if (feature.properties.Name === "' . $row->post_title . '") {

            var popupContent = \'<div class="popup-content ' . $markers . ' ' . $forceRtl . '">\';

            popupContent += \'<h3 class="popup-name remMar">\' + feature.properties.Name + \'</h3>\';

            popupContent += \'<h5 class="popup-name">' . $country['label'] . '</h5>\';

            popupContent += \'<p class="popup-info">\' + feature.properties.Info + \'</p>\';

            popupContent += \'<div class="popup-image"><img src="' . $img_url . '" class="img-fluid"></div>\';

            popupContent += \'</div>\';



            var popupOptions = {

                className: \'custom-popup\' // Add custom class for styling

            };



            if (L.Browser.mobile) {

                // Use a different class for mobile devices to adjust styling

                popupOptions.className = \'custom-popup-mobile\';

            }



            marker.bindPopup(popupContent, popupOptions);

        }  		

  	';
	}



	$details = implode("", $arrayList);



	return $details;
}


// function getprojectDetailsInfohub(){

// 	$lang = pll_current_language();

// 	$args = array(
//    'post_type' => 'project',
//    'lang' => $lang, 
//    'posts_per_page' => -1, 
//   );

//   $posts = get_posts($args);

//   $arrayList = array();

//   foreach($posts as $row){

//   	// print_r($row);
// 	  $postId = $row->ID; 
// 	  if($lang== 'en'){
// 		  $posturl= "https://dev.araburban.org/infohub/projects/?id=$postId";
// 	  }
// 	  else{
// 		  $posturl= "https://dev.araburban.org/infohub-ar/projects/?id=$postId";
// 	  }
// 	  $reference = get_field("reference",$postId);
// 	  $getinfo = get_field("section_1",$postId);
// 	  $staringdate=$getinfo["starting_date"];
// 	  $dateObject = new DateTime($staringdate);
// 	  $staringyear = $dateObject->format("Y");
// 	  $enddate=$getinfo["end_date"];
// 	  $dateObject = new DateTime($enddate);
// 	  $endyear = $dateObject->format("Y");
// 	  $ongoing=$getinfo["on-going"];
// 	  $country=$getinfo["country"];
// 	  $city=$getinfo["city"];
// 	  if($city){
// 		  $cityid=$city[0];
// 	  }
// 	  $post_type = 'city'; // Replace with the actual post type
// 	  $post = get_post($cityid, OBJECT, $post_type);
// 	  if ($post) {
// 		  $post_title = $post->post_title;
// 	  }
// 	  $titles=$getinfo[$titleid];
// 	  $longitude = $reference['longitude'];

// 	   $latitude = $reference['latitude'];

//   	$postId = $row->ID;
//   	$longtitude = get_field('longtitude', $postId);
//   	$latitude = get_field('latitude', $postId);
//   	$featImg = get_featured_image_url($postId);
//   	$content = $row->post_content;
//   	$country = get_field('country', $postId);
//   	$markers = "";

//   	$img_url = site_url().'/wp-content/uploads/2023/11/country-img.jpg';
//   	if($featImg){
//   		$img_url = $featImg;
//   	}

//   	$contentPost = " ";
//   	if($content){
//   		$contentPost = $content;
//   	}

//   	$forceRtl = '';
//   	if($lang == "ar"){
//   		$forceRtl = 'force-rtl';
//   	}

//   	$arrayList[] = '
//          if (feature.properties.Name === "'.$row->post_title.'") {
//             var popupContent = \'<div class="popup-content '.$markers.' '.$forceRtl.'">\';
//             popupContent += \'<h3 class="popup-name remMar">\' + feature.properties.Name + \'</h3>\';
//             popupContent += \'<h5 class="popup-name">'.$country['label'].'</h5>\';
//             popupContent += \'<p class="popup-info">\' + feature.properties.Info + \'</p>\';
//             popupContent += \'<div class="popup-image"><img src="'.$post->post_title.'" class="img-fluid"></div>\';
//             popupContent += \'</div>\';

//             var popupOptions = {
//                 className: \'custom-popup\' // Add custom class for styling
//             };

//             if (L.Browser.mobile) {
//                 // Use a different class for mobile devices to adjust styling
//                 popupOptions.className = \'custom-popup-mobile\';
//             }

//             marker.bindPopup(popupContent, popupOptions);
//         }  		
//   	';
//   }

//  $details = implode("",$arrayList); 

//  return $details;

// }

function getcitySearch($arrays)
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

		'post_type' => 'city',

		'post_status' => 'publish',

		'numberposts' => -1,
        


	);



	$query = get_posts($args);



	$arrayList = array();


   $output="<div class='searchajax $title d-flex flex-column'>";
//    var_dump($title);
	foreach ($query as $row) {



		$postId = $row->ID;
        
       $link=get_the_permalink($postId);

		$name =  $row->post_title;
        $arrayitem=array( 
			'link' => $link,
			'name' => $name,
		);
		array_push($arrayList, $arrayitem);

		

	}
    
	$output .= "</div>";




	// $output .= getPubHtml($arrayList);



	return json_encode($arrayList);
}

function getCitiesFiltered($arrays)
{



	$lang = pll_current_language();



	$countryArray = "";

	$countCountryArray = count($arrays['filter-cities-country']);

	if ($countCountryArray != 0) {

		$countryArray = array(

			'key' => 'country',

			'value' => $arrays['filter-cities-country'],

			'compare' => 'IN',

		);
	}





	$sizeArray = "";

	$countSizeArray = count($arrays['filter-cities-size']);

	if ($countSizeArray != 0) {

		$sizeArray = array(

			'key' => 'city_size',

			'value' => $arrays['filter-cities-size'],

			'compare' => 'IN',

		);
	}



	$args = array(

		'post_type' => 'city',

		'post_status' => 'publish',

		'numberposts' => -1,

		'orderby'  => 'title',

		'order' => 'ASC'



	);

	if (!empty($arrays['filter-cities-city'])) {
		$args['post__in'] = $arrays['filter-cities-city'];
	}

	$query = get_posts($args);

	//    var_dump($args);
	//    var_dump($arrays['filter-cities-size']);

	$output = "";



	$arrayList = array();

	foreach ($query as $row) {

		$countrymi = get_field('country', $row->ID);
		$words = get_field('city_size', $row->ID);

		// var_dump($countrymi);
		// var_dump($words);
		if ((in_array($countrymi['value'], $arrays['filter-cities-country']) || empty($arrays['filter-cities-country'])) && (in_array($words, $arrays['filter-cities-size']) || empty($arrays['filter-cities-size']))) {

			$postId = $row->ID;

			$title = $row->post_title;



			$country = "";

			$getCountry = get_field("field_65aa214151992", $postId);

			if ($getCountry) {

				$country = $getCountry['label'];
			}



			$latitude = get_field("field_65070d9f2ac3e", $postId);

			$longtitude = get_field("field_65070d882ac3d", $postId);



			$city_page = get_field("field_65aa3abfea002", $postId);



			$city_markers = "";

			$getCityMarkers = get_field("field_65ad8f3c4f6ab", $postId);

			if ($getCityMarkers && $getCityMarkers != 0) {

				$city_markers = $getCityMarkers;
			}



			$name_authority = get_field("name_authority", $postId);



			$city_size = "";

			$getCitySize = get_field("field_65aa3ca620185", $postId);

			if ($getCitySize && $getCitySize != 0) {

				$city_size = getTermName($getCitySize);
			}



			$website = "";

			$getWebsite = get_field("field_65aa39b281ed3", $postId);

			if ($getWebsite) {

				$website = '<a class="fnt-gray" href="' . $getWebsite . '" target="_new">' . forceTranslate("Click here", "انقر هنا") . '</a>';
			}



			$scArray = array();

			$getSc = get_field("field_65aa3a34563e8", $postId);



			for ($x = 1; $x <= 5; $x++) {

				if ($getSc['social_media_link_' . $x . '']) {

					$getIcon = getSocialIcons($getSc['social_media_type_' . $x . '']);

					$scArray[] = '<span><a href="' . $getSc['social_media_link_' . $x . ''] . '" target="_new">' . $getIcon . '</a></span>';
				}
			}

			$sc = implode("", $scArray);



			$geo =  get_field("geo", $postId);

			$demographic =  get_field("demographic", $postId);

			$environmental =  get_field("environmental", $postId);

			$economic =  get_field("economic", $postId);

			$housing =  get_field("housing", $postId);

			$transport =  get_field("transport", $postId);



			$boundary = "";

			$getBoundary =  get_field("boundary", $postId);

			if ($getBoundary) {

				$boundary = '<img src="' . $getBoundary . '" class="img-fluid w-100">';
			}



			$city_gallery = "";

			$getCityGallery =  get_field("boundary", $postId);

			if ($getCityGallery) {

				$city_gallery = $getCityGallery;
			}



			$arrayList[] = array(

				'ID' => $postId,

				'title' => $title,

				'country' => $country,

				'latitude' => $latitude,

				'longtitude' => $longtitude,

				'city_page' => $city_page,

				'city_markers' => $city_markers,

				'name_authority' => $name_authority,

				'city_size' => $city_size,

				'website' => $website,

				'sc' => $sc,

				'geo' => $geo,

				'demographic' => $demographic,

				'economic' => $economic,

				'housing' => $housing,

				'transport' => $transport,

				'boundary' => $boundary,

				'city_gallery' => $city_gallery,

			);
		}
	}



	$output .= getCitiesHtml($arrayList);



	return $output;
}



function getCitiesHtml($arrays)
{



	$lang = pll_current_language();

	$output = "";



	$projUrl = home_url() . '/infohub/cities/?id=';

	if ($lang == "ar") {

		$projUrl = home_url() . '/infohub-ar /cities/?id=';
	}



	$frtl = "";

	if ($lang == "ar") {

		$frtl = "force-ltr";
	}



	$arrayList = array();

	foreach ($arrays as $row) {



		$disabled = 'onClick="return false;"';

		$url = '#';

		if ($row['city_page'] == 1) {

			$disabled = '';

			$url =  $projUrl . $row['ID'];
		}



		$markers = "";

		$getmarkers = $row['city_markers'];

		if ($getmarkers == 1867 || $getmarkers == 1873) {
			$markers = "m-blue";
		}

		if ($getmarkers == 1865 || $getmarkers == 1871) {
			$markers = "m-black";
		}

		if ($getmarkers == 1869 || $getmarkers == 1875) {
			$markers = "m-gray";
		}



		$arrayList[] = '

 				<div class="col-md-12">

					<a href="' . $url . '" ' . $disabled . '>

						<div class="list ' . $markers . '">

							<p class="remMar"><b>' . $row['title'] . '</b>, ' . $row['country'] . '</p>

							<p class="remMar"><small>' . $row['city_size'] . '</small></p>

						</div>

					</a>

					<div class="spacer-10"></div>

				</div>

		';
	}



	$output .= implode("", $arrayList);



	return $output;
}
