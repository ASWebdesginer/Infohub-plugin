<?php 



/*-- Ajax --*/



function infohubListAjax(){

	$data = $_POST['data'];

	echo do_shortcode('[' . $data . ']');

	exit();

}

add_action("wp_ajax_infohubListAjax", "infohubListAjax");

add_action("wp_ajax_nopriv_infohubListAjax", "infohubListAjax");





function getCitySelect(){



	$lang = pll_current_language();

	$output = "";

	$data = $_POST['data'];

	//$arrayCountry = serialize(explode(",",$data));

	$arrayCountry = explode(",", $data);



	//print_r($arrayCountry);



	$args = array(

		'post_type' => 'city',

		'post_status' => 'publish',

		'posts_per_page' => -1,

		'meta_query' => array(

			'relation' => 'AND',

			array(

				'key' => 'country',

				'value' => $arrayCountry,

				'compare' => 'IN'

			),

		),

	);



	$query = get_posts($args);



	$arrayOptGrp = array();

	$arrayList = array();

	foreach ($query as $rows) {



		//print_r($rows);



		$postId = $rows->ID;

		$getParentCountry = get_field("field_65070d4d2ac3c", $postId);

		$cvalue = $getParentCountry['value'];

		$clabel = $getParentCountry['label'];

		$cityName = getRelName($postId);



		$arrayList[$cvalue . ' - ' . $clabel][$postId] = $cityName;

	}



	$arrayOutput = array();

	foreach ($arrayList as $keys => $values) {



		$arrayOutput[] = '<option disabled>' . $keys . '</option>';



		foreach ($values as $childKey => $childVal) {

			$arrayOutput[] = '<option value="' . $childKey . '">' . $childVal . '</option>';

		}

	}



	$outputCities =  implode("", $arrayOutput);



	print $outputCities;



	exit();

}

add_action("wp_ajax_getCitySelect", "getCitySelect");

add_action("wp_ajax_nopriv_getCitySelect", "getCitySelect");



function filterProj(){



	$lang = pll_current_language();

	$output = "";



	$jsonEncode = json_encode(parse_str($_POST['data'], $arr));



	if($_POST['tabs'] == "cities"){

		$result = getCitiesFiltered($arr);

	}	



	if($_POST['tabs'] == "projects"){

		$result = getProjFiltered($arr);

	}



	if($_POST['tabs'] == "organizations"){

		$result = getOrgsFiltered($arr);

	}



	if($_POST['tabs'] == "publications"){

		$result = getPubsFiltered($arr);

	}	

	



	print $result;



	exit();



}

add_action("wp_ajax_filterProj", "filterProj");

add_action("wp_ajax_nopriv_filterProj", "filterProj");


function searchProj(){



	$lang = pll_current_language();

	$output = "";



	$jsonEncode = json_encode(parse_str($_POST['datas'], $arr));



	if($_POST['tabs'] == "cities"){

		$result = getcitySearch($arr);

	}	



	if($_POST['tabs'] == "projects"){

		$result = getprojsearch($arr);

	}



	if($_POST['tabs'] == "organizations"){

		$result = getorgsearch($arr);

	}



	if($_POST['tabs'] == "publications"){

		$result = getPubsSearch($arr);

	}	

	



	print $result;



	exit();



}

add_action("wp_ajax_searchProj", "searchProj");

add_action("wp_ajax_nopriv_searchProj", "searchProj");