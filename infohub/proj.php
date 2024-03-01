<?php



/*-- Ajax --*/

function infohubProjAjax()
{

	$lang = pll_current_language();
	$output = "";
	$data = $_POST['data'];
	$paged = $_POST['paged'];


	$getPaged = getProjPaged($paged);
	$output .= getProjHtml($getPaged);

	print $output;

	exit();
}

add_action("wp_ajax_infohubProjAjax", "infohubProjAjax");
add_action("wp_ajax_nopriv_infohubProjAjax", "infohubProjAjax");


function getSingleProj($id)
{

	$lang = pll_current_language();

	$getProj = get_post($id);



	$postId = $getProj->ID;

	$proj_name = "";



	$section_1 = get_field("section_1", $postId);



	if ($section_1['project_name_en'] || $section_1['project_name_ar']) {



		$proj_name = $section_1['project_name_en'];

		if ($lang == "ar") {

			$proj_name = $section_1['project_name_ar'];
		}
	} else {



		$proj_name = $getProj->post_title;
	}





	$project_code = $section_1['project_code'];

	$starting_date = date("Y", strtotime($section_1['starting_date']));

	$end_date = date("Y", strtotime($section_1['end_date']));

	$on_going = $section_1['on-going'];



	if ($on_going) {

		$end_date = forceTranslate("Ongoing", "العمل مستمر");
	}



	$country = "";

	$getCountry = $section_1['country'];

	if ($getCountry) {

		$country = $getCountry['label'];
	}



	$city = "";

	$getCity = $section_1['city'];

	if ($getCity) {

		$city = getRelName($getCity[0]) . ', ';
	}



	$section_2 = get_field("section_2", $postId);

	$topicWordsArray = array();

	$getTopicWords = $section_2['topic_words'];

	if ($getTopicWords) {

		foreach ($getTopicWords as $rowTopicWords) {

			$topicWordsArray[] = '<span class="btn btn-light shadowed">' . getTermName($rowTopicWords) . '</span>';
		}
	}

	$topic_words = implode("", $topicWordsArray);



	$approachWordsArray = array();

	$getApproacWords = $section_2['project_approaches'];

	if ($getApproacWords) {

		foreach ($getApproacWords as $rowApproachWords) {

			$approachWordsArray[] = getTermName($rowApproachWords);
		}
	}

	$project_approaches = implode(", ", $approachWordsArray);



	$policyInstArray = array();

	$getPolicyInst = $section_2['public_policy_instruments'];

	if ($getPolicyInst) {

		foreach ($getPolicyInst as $rowPolicyInst) {

			$policyInstArray[] = getTermName($rowPolicyInst);
		}
	}

	$public_policy_instruments = implode(", ", $policyInstArray);



	$summary_text_1 = $section_2['summary_text_1'];

	if ($lang == "ar") {

		$summary_text_1 = $section_2['summary_text_1_ar'];
	}



	$section_3 = get_field("section_3", $postId);

	$figure_1 = "";

	$figure_2 = "";

	$figure_3 = "";

	$figure_4 = "";

	if ($section_3['figure_image_1']) {


		$figure_1 = '

			<div class="col-md-6 d-flex relThis">

				<img src="' . $section_3['figure_image_1'] . '" alt="" class="img-fluid w-100 fig-img">

				<div class="fig-details">

					<p class="fnt-15 remMar"><b>' . forceTranslate("Title", "العنوان") . ':</b> ' . forceTranslate($section_3['figure_title_1'], $section_3['figure_title_1_ar']) . '</p>

					<p class="fnt-15 remMar"><b>' . forceTranslate("Source", "المصدر") . ':</b> 

						<a href="' . $section_3['figure_source_1'] . '" target="_new" class="deepbluefademi">' . forceTranslate("Click Here", "اضغط هنا") . '</a>

					</p>

				</div>

				<div class="spacer-20"></div>	

			</div>

		';
	}



	if ($section_3['figure_image_2']) {

		$figure_2 = '

			<div class="col-md-6 d-flex relThis">

				<img src="' . $section_3['figure_image_2'] . '" alt="" class="img-fluid w-100 fig-img">

				<div class="fig-details">

					<p class="fnt-15 remMar"><b>' . forceTranslate("Title", "العنوان") . ':</b> ' . forceTranslate($section_3['figure_title_2'], $section_3['figure_title_2_ar']) . '</p>

					<p class="fnt-15 remMar"><b>' . forceTranslate("Source", "المصدر") . ':</b> 

						<a href="' . $section_3['figure_source_2'] . '" target="_new" class="deepbluefademi">' . forceTranslate("Click Here", "اضغط هنا") . '</a>

					</p>

				</div>

				<div class="spacer-20"></div>

			</div>

		';
	}



	if ($section_3['figure_image_3']) {

		$figure_3 = '

			<div class="col-md-6 d-flex relThis">

				<img src="' . $section_3['figure_image_3'] . '" alt="" class="img-fluid w-100 fig-img">

				<div class="fig-details">

					<p class="fnt-15 remMar"><b>' . forceTranslate("Title", "العنوان") . ':</b> ' . forceTranslate($section_3['figure_title_3'], $section_3['figure_title_3_ar']) . '</p>

					<p class="fnt-15 remMar"><b>' . forceTranslate("Source", "المصدر") . ':</b> 

						<a href="' . $section_3['figure_source_3'] . '" target="_new" class="deepbluefademi">' . forceTranslate("Click Here", "اضغط هنا") . '</a>

					</p>

				</div>

				<div class="spacer-20"></div>

			</div>

		';
	}



	if ($section_3['figure_image_4']) {

		$figure_4 = '

			<div class="col-md-6 d-flex relThis">

				<img src="' . $section_3['figure_image_4'] . '" alt="" class="img-fluid w-100 fig-img">

				<div class="fig-details">

					<p class="fnt-15 remMar"><b>' . forceTranslate("Title", "العنوان") . ':</b> ' . forceTranslate($section_3['figure_title_4'], $section_3['figure_title_4_ar']) . '</p>

					<p class="fnt-15 remMar"><b>' . forceTranslate("Source", "المصدر") . ':</b> 

						<a href="' . $section_3['figure_source_4'] . '" target="_new" class="deepbluefademi">' . forceTranslate("Click Here", "اضغط هنا") . '</a>

					</p>

				</div>

				<div class="spacer-20"></div>

			</div>

		';
	}



	$summary_text_2 = $section_3['summary_text_2'];

	if ($lang == "ar") {

		$summary_text_2 = $section_3['summary_text_2_ar'];
	}



	$section_4 = get_field("section_4", $postId);
	// echo "<pre>";
	// var_dump($section_4);
	// echo " </pre>";
	$odp = "";

	$od = "";

	$cd = "";

	$fd = "";

	$ci = "";



	$checkOdp = array_filter($section_4['owner_developer_public']);

	$checkOd = array_filter($section_4['owner_developer']);

	$checkCd = array_filter($section_4['consultant_designer']);

	$checkFd = array_filter($section_4['funder']);

	$checkCi = array_filter($section_4['contractor_implementer']);



	if (count($checkOdp) != 0) {

		$arrayPepsOdp = array();

		for ($i = 1; $i <= 3; $i++) {

			if (!empty($section_4['owner_developer_public']['odp_name_' . $i . '']) && !empty($section_4['owner_developer_public']['odp_web_' . $i . ''])) {

				$arrayPepsOdp[] = '

					<p class="fnt-15 remMar">

						<a class="fnt-dark-gray" href="' . $section_4['owner_developer_public']['odp_web_' . $i . ''] . '" target="_blank">' . forceTranslate($section_4['owner_developer_public']['odp_name_' . $i . ''], $section_4['owner_developer_public']['name_' . $i . '_ar']) . '

						</a>

					</p>		

					<div class="spacer-5"></div>';
			}
		}

		$odp = '

		<div class="col-12 col-md min_height_300">

			<div class="row">

				<div class="col-md-3 remPad icon_mi_width">

					<center>

						<img src="' . getPluginDirectory() . '/img/owner-pub.svg" class="img-fluid w-100">

					</center>

				</div>

				<div class="col-md-9">

					<p class="fnt-18 remMar"><b>' . forceTranslate("Owner/Developer (Public)", "المالك / المطور [عام]") . '</b></p>

					<div class="spacer-10"></div>

					' . implode("", $arrayPepsOdp) . '

				</div>

			</div>

			<div class="spacer-20"></div>

		</div>

   	 	';
	}



	if (count($checkOd) != 0) {

		$arrayPepsOd = array();

		for ($i = 1; $i <= 3; $i++) {



			if (!empty($section_4['owner_developer']['od_name_' . $i . '']) && !empty($section_4['owner_developer']['od_web_' . $i . ''])) {

				$arrayPepsOd[] = '

					<p class="fnt-15 remMar">

						<a class="fnt-dark-gray" href="' . $section_4['owner_developer']['od_web_' . $i . ''] . '" target="_blank">' . forceTranslate($section_4['owner_developer']['od_name_' . $i . ''], $section_4['owner_developer']['name_' . $i . '_ar']) . '

						</a>

					</p>

					<div class="spacer-5"></div>';
			}
		}

		$od = '

		<div class="col-12 col-md min_height_300">

			<div class="row">

				<div class="col-md-3 remPad icon_mi_width">

					<center>

						<img src="' . getPluginDirectory() . '/img/owner-dev.svg" class="img-fluid w-100">

					</center>

				</div>

				<div class="col-md-9">

					<p class="fnt-18 remMar"><b>' . forceTranslate("Owner/Developer", "المالك / المطور") . '</b></p>

					<div class="spacer-10"></div>

					' . implode("", $arrayPepsOd) . '

				</div>

			</div>

			<div class="spacer-20"></div>

		</div>

   	 	';
	}



	if (count($checkCd) != 0) {

		$arrayPepsCd = array();

		for ($i = 1; $i <= 3; $i++) {



			if (!empty($section_4['consultant_designer']['cd_name_' . $i . '']) && !empty($section_4['consultant_designer']['cd_web_' . $i . ''])) {

				$arrayPepsCd[] = '

					<p class="fnt-15 remMar">

						<a class="fnt-dark-gray" href="' . $section_4['consultant_designer']['cd_web_' . $i . ''] . '" target="_blank">' . forceTranslate($section_4['consultant_designer']['cd_name_' . $i . ''], $section_4['consultant_designer']['name_' . $i . '_ar']) . '

						</a>

					</p>

					<div class="spacer-5"></div>';
			}
		}

		$cd = '

		<div class="col-12 col-md min_height_300">

			<div class="row">

				<div class="col-md-3 remPad icon_mi_width">

					<center>

						<img src="' . getPluginDirectory() . '/img/consultant.svg" class="img-fluid w-100">

					</center>

				</div>

				<div class="col-md-9">

					<p class="fnt-18 remMar"><b>' . forceTranslate("Consultant/Designer", "الاستشاري / المصمم") . '</b></p>

					<div class="spacer-10"></div>

					' . implode("", $arrayPepsCd) . '

				</div>

			</div>

			<div class="spacer-20"></div>

		</div>

   	 	';
	}



	if (count($checkFd) != 0) {

		$arrayPepsFd = array();

		for ($i = 1; $i <= 3; $i++) {



			if (!empty($section_4['funder']['fd_name_' . $i . '']) && !empty($section_4['funder']['fd_web_' . $i . ''])) {

				$arrayPepsFd[] = '

					<p class="fnt-15 remMar">

						<a class="fnt-dark-gray" href="' . $section_4['funder']['fd_web_' . $i . ''] . '" target="_blank">' . forceTranslate($section_4['funder']['fd_name_' . $i . ''], $section_4['funder']['name_' . $i . '_ar']) . '

						</a>

					</p>

					<div class="spacer-5"></div>';
			}
		}

		$fd = '

		<div class="col-12 col-md min_height_300">

			<div class="row">

				<div class="col-md-3 remPad icon_mi_width ">

					<center>

						<img src="' . getPluginDirectory() . '/img/funder.svg" class="img-fluid w-100">

					</center>

				</div>

				<div class="col-md-9">

					<p class="fnt-18 remMar"><b>' . forceTranslate("Funder", "الممول") . '</b></p>

					<div class="spacer-10"></div>

					' . implode("", $arrayPepsFd) . '

				</div>

			</div>

			<div class="spacer-20"></div>

		</div>

   	 	';
	}



	if (count($checkCi) != 0) {

		$arrayPepsCi = array();

		for ($i = 1; $i < 3; $i++) {



			if (!empty($section_4['contractor_implementer']['ci_name_' . $i . '']) && !empty($section_4['contractor_implementer']['ci_web_' . $i . ''])) {

				$arrayPepsCi[] = '

					<p class="fnt-15 remMar">

						<a class="fnt-dark-gray" href="' . $section_4['contractor_implementer']['ci_web_' . $i . ''] . '" target="_blank">' . forceTranslate($section_4['contractor_implementer']['ci_name_' . $i . ''], $section_4['contractor_implementer']['name_' . $i . '_ar']) . '

						</a>

					</p>

					<div class="spacer-5"></div>';
			}
		}

		$ci = '

		<div class="col-12 col-md min_height_300">

			<div class="row">

				<div class="col-md-3 remPad icon_mi_width">

					<center>

						<img src="' . getPluginDirectory() . '/img/contactor.svg" class="img-fluid w-100">

					</center>

				</div>

				<div class="col-md-9">

					<p class="fnt-18 remMar"><b>' . forceTranslate("Contractor/Implementer", "المقاول / المنفذ") . '</b></p>

					<div class="spacer-10"></div>

					' . implode("", $arrayPepsCi) . '

				</div>

			</div>

			<div class="spacer-20"></div>

		</div>

   	 	';
	}



	$summary_text_3 = $section_4['summary_text_3'];

	if ($lang == "ar") {

		$summary_text_3 = $section_4['summary_text_3_ar'];
	}



	$reference = get_field("reference", $postId);
	$curentlink = ($lang == "en") ? 'website_link' : 'project_website_link_ar';

	$website_link =  '<p><a href="' . $reference[$curentlink] . '" class="fnt-18" target="_new">' . $reference[$curentlink] . '</a></p>';



	$endnotes = ($lang == "en") ? $reference['endnotes'] : $reference['endnotes_ar'];

	$references = $reference['references'];

	$longitude = $reference['longitude'];

	$latitude = $reference['latitude'];

	$map_link = $reference['map_link'];



	$mapLang = "en";

	if ($lang == "ar") {

		$mapLang = "ar";
	}





	$map = '<a href="' . $map_link . '" target="_new"><img src="' . getPluginDirectory() . '/img/gmap-blur.jpg" class="img-fluid w-100"></a>';

	if ($longitude && $latitude) {

		$map = '<iframe style="width: 100%;height: 55%;"frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=' . $latitude . ',' . $longitude . '&hl=' . $mapLang . '&z=10&t=terrain&amp;output=embed" crossorigin="anonymous"></iframe>';
		// $map = '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d'.$latitude.'!2d'.$longitude.'!3d36.794882949999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12fd337f5e7ef543%3A0xd671924e714a0275!2s'.$city.'!5e0!3m2!1sen!2s!4v1706611121109!5m2!1sen!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
		// 	';
		// Call the runMap function with the specified mapId
	}



	$arrayList = array(

		'ID' => $postId,

		'proj_name' => $proj_name,

		'project_code' => $project_code,

		'starting_date' => $starting_date,

		'on_going' => $on_going,

		'end_date' => $end_date,

		'country' => $country,

		'city' => $city,

		'topic_words' => $topic_words,

		'project_approaches' => $project_approaches,

		'public_policy_instruments' => $public_policy_instruments,

		'summary_text_1' => $summary_text_1,

		'summary_text_2' => $summary_text_2,

		'figure_1' => $figure_1,

		'figure_2' => $figure_2,

		'figure_3' => $figure_3,

		'figure_4' => $figure_4,

		'odp' => $odp,

		'od' => $od,

		'cd' => $cd,

		'fd' => $fd,

		'ci' => $ci,

		'summary_text_3' => $summary_text_3,

		'website_link' => $website_link,

		'endnotes' => $endnotes,

		'references' => $references,

		'longitude' => $id,

		'longitude' => $longitude,

		'latitude' => $latitude,

		'map_link' => $map_link,

		'map' => $map,

	);



	return $arrayList;
}

// project latitude and longitude array fetching

function getprojectslats()
{

	$lang = pll_current_language();



	$sortBy = 'section_1_project_name_en';
	$titleid = 'project_name_en';

	if ($lang == "ar") {

		$sortBy = 'section_1_project_name_ar';
		$titleid = 'project_name_ar';
	}



	$args = array(

		'post_type' => 'project',

		'post_status' => 'publish',

		'numberposts' => -1,

		'meta_key' => $sortBy,

		'orderby'  => 'meta_value',

		'order' => 'ASC'

	);
	$query = get_posts($args);
	$mapsarray = array();
	foreach ($query as $row) {

		$eachelement = [];

		$postId = $row->ID;
		if ($lang == 'en') {
			$posturl = "https://dev.araburban.org/infohub/projects/?id=$postId";
		} else {
			$posturl = "https://dev.araburban.org/infohub-ar/projects/?id=$postId";
		}
		$reference = get_field("reference", $postId);
		$getinfo = get_field("section_1", $postId);
		$staringdate = $getinfo["starting_date"];
		$dateObject = new DateTime($staringdate);
		$staringyear = $dateObject->format("Y");
		$enddate = $getinfo["end_date"];
		$dateObject = new DateTime($enddate);
		$endyear = $dateObject->format("Y");
		$ongoing = $getinfo["on-going"];
		$country = $getinfo["country"];
		$city = $getinfo["city"];
		if ($city) {
			$cityid = $city[0];
		}
		$post_type = 'city'; // Replace with the actual post type
		$post = get_post($cityid, OBJECT, $post_type);
		if ($post) {
			$post_title = $post->post_title;
		}
		$titles = $getinfo[$titleid];
		$longitude = $reference['longitude'];

		$latitude = $reference['latitude'];
		$eachelement = ["postid" => $postId, "title" => $titles, "long" => $longitude, "lati" => $latitude, "country" => $country["label"], "city" => $post->post_title, "startdate" => $staringyear, "enddate" => ($ongoing) ? "ongoing" : $endyear, "postlink" => $posturl];
		array_push($mapsarray, $eachelement);
	}
	return $mapsarray;
}


function getProj()
{

	$lang = pll_current_language();

	$sortBy = 'section_1_project_name_en';

	if ($lang == "ar") {

		$sortBy = 'section_1_project_name_ar';
	}


	$ismobile=wp_is_mobile();

	$args = array(

		'post_type' => 'project',

		'post_status' => 'publish',

		'numberposts' => $ismobile ? 5 : 20,

		'lang' => $lang,

		'meta_key' => $sortBy,

		'orderby'  => 'meta_value',

		'order' => 'ASC'

	);



	// $args = array(

	// 	'post_type' => 'project',

	// 	'post_status' => 'publish',

	// 	'numberposts' => 20,

	// 	'orderby' => 'section1',

	// 	'order' => 'ASC',

	// 	'meta_query' => array(

	// 		'section1' => array(

	// 			'key' => 'section_1_country',

	// 			'compare' => 'EXISTS'

	// 		)

	// 	)

	// );





	$query = get_posts($args);



	//print_r($query);



	$arrayList = array();



	foreach ($query as $row) {



		$postId = $row->ID;

		$proj_name = "";



		$section_1 = get_field("section_1", $postId);



		//print_r(get_field("section_1_country",$postId));



		if ($section_1['project_name_en'] || $section_1['project_name_ar']) {



			$proj_name = $section_1['project_name_en'];

			if ($lang == "ar") {

				$proj_name = $section_1['project_name_ar'];
			}
		} else {



			$proj_name = $getProj->post_title;
		}



		$project_code = $section_1['project_code'];

		$starting_date = date("Y", strtotime($section_1['starting_date']));

		$end_date = date("Y", strtotime($section_1['end_date']));

		$on_going = $section_1['on-going'];

		if ($on_going == 1) {

			$end_date = forceTranslate("Ongoing", "العمل مستمر");
		}



		$country = "";

		$getCountry = $section_1['country'];

		if ($getCountry) {

			$country = $getCountry['label'];
		}





		//$country = $section_1['country'];



		$city = "";

		$getCity = $section_1['city'];

		if ($getCity) {

			$city = getRelName($getCity[0]);
		}





		$arrayList[] = array(

			'ID' => $postId,

			'proj_name' => $proj_name,

			'project_code' => $project_code,

			'starting_date' => $starting_date,

			'end_date' => $end_date,

			'country' => $country,

			'city' => $city,

		);
	}



	return $arrayList;
}

function getProjPaged($pagedNum)
{

	$lang = pll_current_language();

	$argsCount = array(

		'post_type' => 'project',

		'post_status' => 'publish',

		'numberposts' => -1

	);

	$queryCount = count(get_posts($argsCount));

	$paged = $pagedNum + 1;
	$ismobile=wp_is_mobile();

	$posts_per_page = $ismobile ? 5 : 20;

	$num_pages = ceil($queryCount / $posts_per_page);

	$offset = $posts_per_page * $paged;



	$sortBy = 'section_1_project_name_en';

	if ($lang == "ar") {

		$sortBy = 'section_1_project_name_ar';
	}



	$args = array(

		'post_type' => 'project',

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

		$proj_name = "";



		$section_1 = get_field("section_1", $postId);



		if ($section_1['project_name_en'] || $section_1['project_name_ar']) {



			$proj_name = $section_1['project_name_en'];

			if ($lang == "ar") {

				$proj_name = $section_1['project_name_ar'];
			}
		} else {



			$proj_name = $getProj->post_title;
		}

		$project_code = $section_1['project_code'];

		$starting_date = date("Y", strtotime($section_1['starting_date']));

		$end_date = date("Y", strtotime($section_1['end_date']));

		$on_going = $section_1['on-going'];

		if ($on_going == 1) {

			$end_date = forceTranslate("Ongoing", "العمل مستمر");
		}



		$country = "";

		$getCountry = $section_1['country'];

		if ($getCountry) {

			$country = $getCountry['label'];
		}



		$city = "";

		$getCity = $section_1['city'];

		if ($getCity) {

			$city = getRelName($getCity[0]);
		}





		$arrayList[] = array(

			'ID' => $postId,

			'proj_name' => $proj_name,

			'project_code' => $project_code,

			'starting_date' => $starting_date,

			'end_date' => $end_date,

			'country' => $country,

			'city' => $city,

		);
	}



	return $arrayList;
}

function getprojsearch($arrays)
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

		'post_type' => 'project',

		'post_status' => 'publish',

		'numberposts' => -1,
        



	);



	$query = get_posts($args);



	$arrayList = array();
    
    
   $output="<div class='searchajax $title d-flex flex-column'>";
   if(!empty($title)){

//    var_dump($title);
	foreach ($query as $row) {

		$postId = $row->ID;
		$section_1 = get_field("section_1", $postId);

       $link=get_the_permalink($postId);
	   $namear =  $section_1['project_name_ar'];

		$name =  $section_1['project_name_en'];
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
} else{
	$output .= "<p class='p-2'>".forceTranslate("No results found", "لا توجد نتائج")."</p>";
}
	$output .= "</div>";




	// $output .= getPubHtml($arrayList);

   ;

	return  json_encode($arrayList);
}
function getProjFiltered($arrays)
{

	$lang = pll_current_language();

	$sortBy = 'section_1_project_name_en';
	if ($lang == "ar") {
		$sortBy = 'section_1_project_name_ar';
	}

	$countryArray = "";
	$countCountryArray = count($arrays['filter-projects-country']);
	if ($countCountryArray != 0) {
		$countryArray=$arrays['filter-projects-country'];
	}

	$cityArray = "";
	$countCityArray = count($arrays['filter-projects-city']);
	if ($countCityArray != 0) {
		$cityArray=$arrays['filter-projects-city'];
	}

	$topicsArray = "";
	$countTopicsArray = count($arrays['filter-projects-topics']);
	if ($countTopicsArray != 0) {
	      $topicsArray = $arrays['filter-projects-topics'];
	}

	$args = array(
		'post_type' => 'project',
		'post_status' => 'publish',
		'numberposts' => -1,
	);

	$query = get_posts($args);

	$arrayList = array();
	$output = "";



	foreach ($query as $row) {

		//print_r(print_r);
		$countrymi = get_field('section_1', $row->ID);
		$words = get_field('section_2', $row->ID);

		if ((in_array($countrymi['country']['value'], $arrays['filter-projects-country']) || empty($arrays['filter-projects-country'])) && (in_array($countrymi['city'][0], $arrays['filter-projects-city']) || empty($arrays['filter-projects-city'])) && ((count(array_intersect($words['topic_words'], $arrays['filter-projects-topics'])) > 0) || empty($arrays['filter-projects-topics']))) {

			$postId = $row->ID;
			$proj_name = "";

			$section_1 = get_field("section_1", $postId);

			//print_r(get_field("section_1_country",$postId));

			if ($section_1['project_name_en'] || $section_1['project_name_ar']) {

				$proj_name = $section_1['project_name_en'];

				if ($lang == "ar") {

					$proj_name = $section_1['project_name_ar'];
				}
			} else {

				$proj_name = $getProj->post_title;
			}



			$project_code = $section_1['project_code'];
			$starting_date = date("Y", strtotime($section_1['starting_date']));
			$end_date = date("Y", strtotime($section_1['end_date']));
			$on_going = $section_1['on-going'];

			if ($on_going == 1) {

				$end_date = forceTranslate("Ongoing", "العمل مستمر");
			}

			$country = "";
			$getCountry = $section_1['country'];

			if ($getCountry) {
				$country = $getCountry['label'];
			}

			//$country = $section_1['country'];

			$city = "";
			$getCity = $section_1['city'];
			if ($getCity) {
				$city = getRelName($getCity[0]);
			}

			$arrayList[] = array(
				'ID' => $postId,
				'proj_name' => $proj_name,
				'project_code' => $project_code,
				'starting_date' => $starting_date,
				'end_date' => $end_date,
				'country' => $country,
				'city' => $city,
			);
		}
	}


	$output .= getProjHtml($arrayList);

	return $output;
}

function getProjHtml($arrays)
{

	$lang = pll_current_language();
	$output = "";

	$frtl = "";
	if ($lang == "ar") {
		$frtl = "force-ltr";
	}

	$projUrl = home_url() . '/infohub/projects/?id=';
	if ($lang == "ar") {
		$projUrl = home_url() . '/infohub-ar/projects/?id=';
	}

	$arrayList = array();
	foreach ($arrays as $row) {

		$arrayList[] = '

	        <div class="col-12 project-item">
	          <a href="' . $projUrl . $row['ID'] . '">
	            <div class="row align-items-center list equaltablemi" id="equaltablemid"">
	              <div class="col-md-3">' . $row['proj_name'] . '</div>
	              <div class="col-md-3">' . $row['city'] . '</div>
	              <div class="col-md-2">' . $row['country'] . '</div>
	              <div class="col-md-2">' . $row['starting_date'] . '</div>
	              <div class="col-md-2">' . $row['end_date'] . '</div>
	            </div>          
	          </a>
	        </div>
			';
	}

	$output .= implode("", $arrayList);

	return $output;
}
