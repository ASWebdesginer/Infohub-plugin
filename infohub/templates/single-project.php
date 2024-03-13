 <?php /* Template Name: Infohub Single Project Page */ ?>

 <?php

	/**

	 * The template for displaying Front Page

	 *

	 * This is the template that displays all pages by default.

	 * Please note that this is the WordPress construct of pages

	 * and that other 'pages' on your WordPress site may use a

	 * different template.

	 *

	 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/

	 *

	 * @package infohub

	 */

	$lang = pll_current_language();

	$postId = get_the_ID();

	if (!isset($_GET['id']) || $_GET['id'] == "") {

		wp_redirect(home_url());

		exit;
	}

	$postId = $_GET['id'];

	$query = getSingleProj($postId);

	if (!$query) {

		wp_redirect(home_url());

		exit;
	}

	$frtl = "";

	if ($lang == "ar") {

		$frtl = "force-ltr";
	}

	$projUrl = home_url() . '/infohub/projects/?id=';
	if ($lang == "ar") {
		$projUrl = home_url() . '/infohub-ar/projects/?id=';
	}


	?>

 <?php get_header(); ?>

 <script>
 	<?php

		//print_r(get_field("section_2",$postId));

		// print_r($query);

		?>
 </script>

 <header>

 	<?php include("../wp-content/themes/audi/template-parts/navigation.php"); ?>

 </header>

 <div data-scroll-container id="hidememain_mi">
 	<div class="maincontentdivmi">
 		<div class="headerpdf hidepdfki">
 			<div class="innerheaderpdf">
 				<img src="https://dev.araburban.org/wp-content/uploads/2024/01/Group-1333.png" alt="">
 			</div>
 		</div>

 		<div id="top"></div>

 		<section class="non-vh">

 			<div class="spacer-40"></div>

 			<div class="spacer-120"></div>

 			<div class="container">

 				<!-- Header/Map-->

 				<div class="csc bordered-shadow">

 					<div class="csc-video">

 						<!-- <div class="ratio ratio-16x9"> -->

 						<div id="background-video">


 						</div>

 						<!-- </div> -->

 						<!-- <div class="mapsleaf" id="mainmapprojects">

 						</div> -->
 						<div id="vid-caption">

 							<h1 class="fnt-dark-gray d-flex align-items-center projectname"><?php print $query['proj_name']; ?></h1>

 							<h4 class="fnt-dark-gray d-flex align-items-center remMar projectloc"><?php print $query['city']; ?> <?php print $query['country']; ?></h4>

 							<h6 class="fnt-dark-gray d-flex align-items-center remMar projecpublish">

 								<?php print $query['starting_date']; ?> - <?php print $query['end_date']; ?>

 							</h6>

 							<div class="spacer-10"></div>

 							<div class="topic-words">

 								<?php print $query['topic_words']; ?>

 							</div>

 						</div>

 					</div>

 				</div>

 				<div class="spacer-20"></div>

 				<!-- Donwload/Share -->

 				<div class="row align-items-center">

 					<div class="col-md-9"></div>

 					<div class="col-md-3 text-end">

 						<a href="#" class="btn btn-secondary shadowed text-white" id="downloadpdfmi">

 							<i class="fa-solid fa-cloud-arrow-down mar-right-5"></i> <?php print forceTranslate("Download", "تحميل"); ?>

 						</a>
 						<?php  //echo do_shortcode('[save_as_pdf_pdfcrowd]'); 
							?>
 						<?php // echo do_shortcode('[wp_objects_pdf]'); 
							?>
 						<?php //echo do_shortcode('[html2pdf text="Save as PDF"]');
							?>
 						<div class="shareiconwrap_mi">
 							<a href="#" class="btn btn-primary btn-blue mainshare text-white">

 								<i class="fa-regular fa-share-from-square mar-right-5"></i> <?php print forceTranslate("Share", "مشاركة"); ?>

 							</a>
 							<div class="shareicon_mi">
 								<?php echo do_shortcode('[addtoany]'); ?>
 							</div>
 						</div>
 					</div>

 				</div>

 				<div class="spacer-20"></div>

 				<!-- Project Description -->

 				<h4 class="fnt-dark-gray"><?php print forceTranslate("Project Description", "وصف المشروع"); ?></h4>

 				<div class="spacer-20"></div>

 				<p class="remMar fnt-18">

 					<b><?php print forceTranslate("Approach Words", "القيم و الأفكار الموجهة للمشروع"); ?>:</b>

 					<?php print $query['project_approaches']; ?>

 				</p>

 				<p class="remMar fnt-18">

 					<b><?php print forceTranslate("Public Policy Instruments", "أدوات السياسات العامة المعتمدة في المشروع"); ?>:</b>

 					<?php print $query['public_policy_instruments']; ?>

 				</p>

 				<div class="spacer-20"></div>

 				<!-- Summary 1 -->

 				<div class="summary-text summary-text-1 fnt-18">

 					<?php print $query['summary_text_1']; ?>

 				</div>

 				<div class="spacer-20"></div>

 				<!-- Figures -->

 				<div class="figures d-none d-sm-block">

 					<div class="row">

 						<?php print $query['figure_1']; ?>

 						<?php print $query['figure_2']; ?>

 						<?php print $query['figure_3']; ?>

 						<?php print $query['figure_4']; ?>

 					</div>

 				</div>
 				<!-- Figures mobile -->

 				<div class="figures d-sm-none d-block">

 					<div class="row figuresslides">

 						<div class="owl-carousel" id="figuresslides">
 							<?php print $query['figure_1']; ?>

 							<?php print $query['figure_2']; ?>

 							<?php print $query['figure_3']; ?>

 							<?php print $query['figure_4']; ?>
 						</div>
 						<div class="btn-wrap">
 							<button class="prev-btn-fig"><img src="<?php echo  get_template_directory_uri() ?>/img/pubprev.svg" alt=""></button>
 							<button class="next-btn-fig"><img src="<?php echo  get_template_directory_uri() ?>/img/pubnext.svg" alt=""></button>
 						</div>


 					</div>

 				</div>

 				<div class="spacer-20"></div>

 				<!-- Summary 2 -->

 				<div class="summary-text summary-text-2 fnt-18">

 					<?php print $query['summary_text_2']; ?>

 				</div>

 				<div class="spacer-20"></div>

 				<!-- Stakeholders -->

 				<div class="stakesholders d-none d-sm-block">

 					<div class="row">

 						<?php print $query['odp']; ?>

 						<?php print $query['od']; ?>

 						<?php print $query['cd']; ?>

 						<?php print $query['fd']; ?>

 						<?php print $query['ci']; ?>

 					</div>

 				</div>

 				<!-- Stakeholders mobile -->

 				<div class="Stakeholders d-sm-none d-block">

 					<div class="row figuresslides w-100 mx-auto">

 						<div class="owl-carouseld text-center items_mi" id="stakeholders">


 							<?php print $query['odp']; ?>

 							<?php print $query['od']; ?>

 							<?php print $query['ci']; ?>

 							<?php print $query['fd']; ?>

 							<?php print $query['cd']; ?>


 						</div>
 						<div class="btn-wrap">
 							<button class="prev-btn-stk"><img src="<?php echo  get_template_directory_uri() ?>/img/pubprev.svg" alt=""></button>
 							<button class="next-btn-stk"><img src="<?php echo  get_template_directory_uri() ?>/img/pubnext.svg" alt=""></button>
 						</div>


 					</div>

 				</div>

 				<div class="spacer-20 mi6_mobile_none"></div>

 				<!-- Summary 3 -->

 				<div class="summary-text summary-text-3 fnt-18">

 					<?php print $query['summary_text_3']; ?>

 				</div>

 				<div class="spacer-20"></div>

 				<!-- Project Link -->

 				<h4 id="toggleRef" class="fnt-dark-gray">

 					<?php if ($lang == "en") { ?>

 						<i class="fa-solid fa-caret-down mar-right-5 fnt-blue"></i>

 					<?php } else { ?>

 						<i class="fa-solid fa-caret-down mar-right-5 fnt-blue"></i>

 					<?php } ?>

 					<?php print forceTranslate("Project Link, Endnotes and References", "رابط المشروع، ملاحظات ومراجع"); ?>

 				</h4>

 				<div class="spacer-20"></div>

 				<div id="projLink" class="">

 					<p class="fnt-dark-gray remMar"><b><?php print forceTranslate("Project Link", "موقع المشروع الإلكتروني"); ?></b></p>

 					<?php print $query['website_link']; ?>

 					<div class="spacer-20"></div>



 					<p class="fnt-dark-gray remMar"><b><?php print forceTranslate("Endnotes", "ملاحظات"); ?></b></p>

 					<div id="endnotes">

 						<?php print $query['endnotes']; ?>

 					</div>


 					<div class="spacer-20"></div>



 					<p class="fnt-dark-gray remMar"><b><?php print forceTranslate("References", "المراجع"); ?></b></p>

 					<?php print $query['references']; ?>

 					<div class="spacer-20"></div>

 				</div>

 			</div>

 			<!-- <div class="spacer-120"></div> -->

 		</section>
 		<!-- related project -->
 		<section id="relatedproject_mi" class="non-vh mb-5">
 			<?php
				$topicwordscurrent = get_field('section_2', $postId);
				$projectdetails = get_field('section_1', $postId);
				if (!empty($projectdetails['city'])) {
					$citypage = get_field("city_page", $projectdetails['city'][0]);
					if ($citypage) {

						$translatedcity = pll_get_post_translations($projectdetails['city'][0]);


						$citysize;
						$citylink = '';
						if ($lang == 'en') {
							$citysize = get_field('city_size', $translatedcity['en']);
							$citylink = get_the_permalink($translatedcity['en']);
						} else {
							$citysize = get_field('city_size', $translatedcity['ar']);
							$citylink = get_the_permalink($translatedcity['ar']);
						}
						$cityselect = get_field_object('field_65aa3ca620185');

						$featurecity = get_the_post_thumbnail_url($projectdetails['city'][0], 'full');
				?>


 					<div class="container">
 						<h2 class="relatedmain_mi"><?php print forceTranslate('Related City', 'مدن ذات صلة'); ?> </h2>
 						<div class="public_wraper_mi" id="citywrapper_id">
 							<div class="innercity_mi" style="background-image: url(<?php echo $featurecity != '' ? $featurecity : '' . get_template_directory_uri() . '/img/cityplace.jpg'; ?> );">
 								<a href="<?php echo $citylink ?>">
 									<div class="citydetailsarea_mi">
 										<div class="card_mi_content">
 											<h2 class="text-white"><?php print forceTranslate(get_the_title($projectdetails['city'][0]), get_the_title($translatedcity['ar'])); ?></h2>
 											<h3 class="text-white"><?php echo get_field('country', $projectdetails['city'][0])['label']; ?></h3>
 											<h6 class="text-white"><?php echo ($citysize[0] != "0") ? $cityselect['choices'][$citysize] : ''; ?></h6>
 										</div>
 									</div>
 								</a>
 							</div>

 						</div>
 					</div>

 				<?php
					}
				}
				$args = array(
					"post_type" => "project",
					"meta_query" => array(
						array(
							'key' => 'section_1_country',
							'value' => $projectdetails['country']['value'],
							'compare' => '=',
						)
					),
					"post__not_in" => array($postId),
					'posts_per_page' => -1
				);
				$args2 = array(
					"post_type" => "project",
					"post__not_in" => array($postId),
					'posts_per_page' => -1
				);
				$topicwords = $topicwordscurrent['topic_words'];
				$query = new WP_Query($args);
				$query2 = new WP_Query($args2);
				// $allrelatedposts=
				$wholedataarray = array();
				if ($query->have_posts()) {
					while ($query->have_posts()) {
						$query->the_post();
						$post_id = get_the_ID();
						array_push($wholedataarray, $post_id);
					}
					wp_reset_postdata();
				}
				if ($query2->have_posts()) {
					while ($query2->have_posts()) {
						$query2->the_post();

						$post_id = get_the_ID();
						$pubProject = get_field('section_2', $post_id);
						if (!empty($pubProject['topic_words'])) {
							$commonitem = array_intersect($topicwords, $pubProject['topic_words']);
							if (count($commonitem) > 0) {
								if (!in_array($post_id, $wholedataarray)) {
									array_push($wholedataarray, $post_id);
								}
							}
						}
					}
					wp_reset_postdata();
				}
				if (count($wholedataarray) > 0) {
					?>

 				<div class="container mi_mt_48">
 					<h2 class="relatedmain_mi"><?php print forceTranslate(' Related Projects', 'مشاريع ذات صلة'); ?></h2>
 					<div class="public_wraper_mi">
 						<div class="owl-carousels" id="mi6_projects_st">
 							<?php
								$colores = 0;
								$colorarray = array("mi_red", "mi_yellow", "mi_pink");
								foreach ($wholedataarray as  $whole) {

									if ($colores > 2) {
										$colores = 0;
									}

									// while ($query->have_posts()) {
									$post_id = $whole;
									$pubProject = get_field('section_2', $post_id);
									$title = get_the_title($post_id);
									$projectinfo = get_field('section_1', $post_id);
									$artitle = $projectinfo['project_name_ar'];

									// $field = get_field_object('publication_type');
									// $pubProject = get_field('project', $post_id);
									$type = $projectinfo['city'];
									$citytranslation = pll_get_post_translations($type[0]);
									if ($lang == 'en') {
										$type = $citytranslation['en'];
									} else {
										$type = $citytranslation['ar'];
									}
									$featured_img_url = get_the_post_thumbnail_url($post_id, 'full');

									$date = $projectinfo['starting_date'];
									$date = explode("/", $date);
									$date = $date[2];
									$enddate = '';
									if ($projectinfo['on-going']) {
										$enddate = $lang == 'en' ? "Ongoing" : "العمل مستمر";
									} else {
										$enddate = $projectinfo['end_date'];
										$enddate = explode("/", $enddate);
										$enddate = $enddate[2];
									}

								?>

 								<div class="item w-100">
 									<a href="<?php print $projUrl . $post_id; ?>">
 										<div class="card_mi <?php echo $colorarray[$colores]; ?>">
 											<div class="image_mi_sect <?php echo ($featured_img_url == '') ? 'image_mi_sect_min' : ''; ?>">
 												<?php if ($featured_img_url != '') {
													?>
 													<img src="<?php echo $featured_img_url; ?>" alt="featured image" class="img-fluid w-100">
 												<?php } ?>
 											</div>
 											<div class="card_mi_content">
 												<h2 class="restrict_to_two_mi"><?php print forceTranslate($title, $artitle); ?></h2>
 												<h3><?php echo get_the_title($type); ?></h3>
 												<h6><?php echo $date; ?>, <?php echo $enddate; ?></h6>
 											</div>
 										</div>
 									</a>
 								</div>
 							<?php
									$colores++;
									//   var_dump(get_field('project',$post_id));
								}
								?>
 						</div>
 						<div class="btn-wrap">
 							<button class="prev-btn-proj"><img src="<?php echo  get_template_directory_uri() ?>/img/pubprev.svg" alt=""></button>
 							<button class="next-btn-proj"><img src="<?php echo  get_template_directory_uri() ?>/img/pubnext.svg" alt=""></button>
 						</div>
 					</div>
 				</div>
 			<?php

				}
				?>



 			<?php

				$args = array(
					"post_type" => "publication",
					'posts_per_page' => -1
				);
				$query = new WP_Query($args);
				//    var_dump($query);
				if ($query->have_posts()) {
				?>
 				<div class="container mi_mt_48" id="publications_mi_project">
 					<h2 class="relatedmain_mi"><?php print forceTranslate("Related Publications", "منشورات ذات صلة"); ?></h2>
 					<div class="public_wraper_mi">
 						<div class="owl-carousel">
 							<?php
								while ($query->have_posts()) {
									$query->the_post();
									$post_id = get_the_ID();
									$pubProject = get_field('project', $post_id);
									if (is_array($pubProject) && !empty($pubProject) && $pubProject[0] == $postId) {
										$featured_img_url = get_the_post_thumbnail_url($post_id, 'full');
										$title = '';
										$translatedcity = pll_get_post_translations($post_id);
										$pubProject;
										$field;
										$type;
										$link = '';
										if ($lang == 'en') {
											// $type = get_field('publication_type', $post_id);
											// $field = get_field_object('publication_type', $post_id);
											$title = get_field('title_en', $post_id);
											$link = home_url("en/our-programs/urban-policy-research/?tab=srd1-tab-pane&pub=$post_id");
										} else {
											// $type = get_field('publication_type', $translatedcity['ar']);
											// $field = get_field_object('publication_type', $translatedcity['ar']);
											$title = get_field('title_ar', $post_id);
											$link = home_url(" برامجنا/برنامج-السياسات-الحضرية/?pub=$post_id");
										}
										$type = get_field('publication_type', $post_id);
										if (!empty($type)) {
											$lang = pll_current_language();

											$trans = pll_get_term($type, $lang);

											$term = get_term($trans);

											$type = $term->name;
										}
										$date = get_field('publication_date', $post_id);
										if (!empty($date)) {
											$date = explode("/", $date);
											$month = $date[1];
											$year = $date[2];
											$date = $year;
										}

								?>
 									<div class="item w-100">
 										<a href="<?php echo $link; ?>">
 											<div class="card_mi">
 												<div class="image_mi_sect <?php echo ($featured_img_url == '') ? 'image_mi_sect_min' : ''; ?>">
 													<?php if ($featured_img_url != '') {
														?>
 														<img src="<?php echo $featured_img_url; ?>" alt="featured image" class="img-fluid w-100">
 													<?php } ?>
 												</div>
 												<div class="card_mi_content">
 													<h2 class="restrict_to_two_mi"><?php echo $title == '' ? get_the_title() : $title; ?></h2>
 													<h3><?php echo  $type != "" ?  $type : ""; ?></h3>
 													<h6><?php echo $date; ?></h6>
 												</div>
 											</div>
 										</a>
 									</div>
 							<?php
									}
									//   var_dump(get_field('project',$post_id));
									wp_reset_postdata();
								}
								?>
 						</div>
 						<div class="btn-wrap">
 							<button class="prev-btn"><img src="<?php echo get_template_directory_uri() ?>/img/pubprev.svg" alt=""></button>
 							<button class="next-btn"><img src="<?php echo get_template_directory_uri() ?>/img/pubnext.svg" alt=""></button>
 						</div>
 					</div>
 				</div>
 			<?php
				}

				?>


 			<div class="spacer-40"></div>


 		</section>

 		<!--  publication related

 		</section> -->


 		<div class="footerpdf hidepdfki">
 			<div class="innerfooterdf">
 				<img src="https://dev.araburban.org/wp-content/uploads/2024/01/Group-1332.png" alt="footerpdf">
 			</div>
 		</div>
 	</div>
 	<?php
		$reference = get_field("reference", $postId);
		$longitude = $reference['longitude'];
		$latitude = $reference['latitude'];
		get_footer(); ?>


 	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.1/html2canvas.min.js"></script>
 	<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
 	<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.0/html2pdf.bundle.min.js"></script>
 	<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script> -->

 	<!-- <script src="https://cdn.jsdelivr.net/npm/pdfmake/build/pdfmake.min.js"></script>
 	<script src="https://cdn.jsdelivr.net/npm/pdfmake/build/vfs_fonts.js"></script> -->


 	<script>
 		// // Assuming you have a button with id "downloadBtn"
 		// document.getElementById('downloadpdfmi').addEventListener('click', function(e) {
 		// 	e.preventDefault();
 		// 	// document.getElementById("background-video").style.display = 'none';
 		// 	// document.getElementById("mainprojectshere").style.display = 'block';
 		// 	// Get the body element
 		// 	 html2pdf(document.body).from(document.body).save();
 		// });
 		// jQuery(document).ready(function($) {
 		// 	$('#downloadpdfmi').click(function(e) {
 		// 		e.preventDefault();
 		// 		$.ajax({
 		// 			type: 'POST',
 		// 			url: "/wp-admin/admin-ajax.php",
 		// 			data: {
 		// 				action: 'generate_pdf',
 		// 			},
 		// 			success: function(response) {
 		// 				// PDF generated successfully4
 		// 				// Download the PDF file
 		// 				var data = JSON.parse(response);
 		// 				console.log(data.pdfUrl);
 		// 				convertHTMLToPDF(data.pdfUrl);
 		// 				// Trigger the download using the PDF file URL
 		// 				// window.location.href = data.pdfUrl;
 		// 				// var blob = new Blob([response], {
 		// 				// 	type: 'application/pdf'
 		// 				// });
 		// 				// var link = document.createElement('a');
 		// 				// link.href = window.URL.createObjectURL(blob);
 		// 				// link.download = 'example_002.pdf';
 		// 				// document.body.appendChild(link);
 		// 				// link.click();
 		// 				// document.body.removeChild(link);
 		// 				console.log('PDF generated');
 		// 			},
 		// 			error: function(xhr, status, error) {
 		// 				// Handle error
 		// 				console.error('Error generating PDF');
 		// 			}
 		// 		});
 		// 	});

 		// 	function convertHTMLToPDF(htmlString) {
 		// 		const docDefinition = {
 		// 			// Define your PDF structure using JSON syntax
 		// 			content: [{
 		// 				// Convert your HTML to a format suitable for pdfmake
 		// 				html: htmlString
 		// 			}],
 		// 			// Add other options for styling, margins, etc. (optional)
 		// 		};

 		// 		pdfMake.createPdf(docDefinition).download("my_pdf.pdf"); // Download the PDF
 		// 	}

 		// });
 	</script>

 	<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAIaBC4J_-md4eDo47b0hG65GpfjdjfSBk&callback=initMap" async defer></script>
<script>

 

//    runMap('mainmapprojects',lati,long)
        // Initialize the map with specific coordinates (latitude, longitude) and zoom level
      // Function to initialize the map
      function initMap() {
        // Set the map options
        const mapOptions = {
          center: { lat:<?php echo $latitude; ?>, lng:<?php echo $longitude; ?> }, // New York coordinates
          zoom: 13
        };
        // Create a new map instance
        const map = new google.maps.Map(document.getElementById('mainmapprojects'), mapOptions);
        console.log(<?php echo $longitude; ?>);
        // You can add additional features and markers to the map here
        console.log(<?php echo $latitude; ?>)
      }



	 </script> -->
 	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDiobr35sghFc8lgmPtCQNnG1_jgl7ReVE&callback=initMap&libraries=geometry"></script>

 	<script>
 		// Create the script tag, set the appropriate attributes


 		// Append the 'script' element to 'head'
 		async function initMap() {
 			var center = {
 				lat: <?php echo $latitude; ?>,
 				lng: <?php echo $longitude; ?>
 			};

 			var map = new google.maps.Map(document.getElementById('background-video'), {
 				zoom: 10,
 				center: center,
 				disableDefaultUI: true, // Hides default UI elements
 				draggable: true, // Disables map dragging
 				scrollwheel: true, // Disables zoom on scroll
 				streetViewControl: false, // Hides street view control
 				language: "<?php echo $lang; ?>",
 				// mapTypeId: "terrain",
 				// styles: [{
 				// 		"featureType": "administrative",
 				// 		"elementType": "geometry",
 				// 		"stylers": [{
 				// 			"visibility": "off"
 				// 		}]
 				// 	},
 				// 	{
 				// 		"featureType": "poi",
 				// 		"stylers": [{
 				// 			"visibility": "off"
 				// 		}]
 				// 	},
 				// 	{
 				// 		"featureType": "road",
 				// 		"stylers": [{
 				// 			"visibility": "off"
 				// 		}]
 				// 	},
 				// 	{
 				// 		"featureType": "road",
 				// 		"elementType": "labels.icon",
 				// 		"stylers": [{
 				// 			"visibility": "off"
 				// 		}]
 				// 	},
 				// 	{
 				// 		"featureType": "transit",
 				// 		"stylers": [{
 				// 			"visibility": "off"
 				// 		}]
 				// 	}
 				// ]
 			});

 			var marker = new google.maps.Marker({
 				position: center,
 				map: map,
 				// Update marker options for style customization
 				icon: {
 					url: "https://dev.araburban.org/wp-content/uploads/2024/03/Group-1147.png", // Replace with path to your icon
 					scaledSize: new google.maps.Size(40, 45), // Adjust size as needed
 					anchor: new google.maps.Point(0, 70) // Adjust anchor point if needed
 				}
 			});

 			// Function to calculate offsets and create polygon
 			// function createPolygon(center, radius) {
 			// 	var numSides = 100; // Number of vertices to approximate circle
 			// 	var polygonCoords = [];

 			// 	for (var i = 0; i < numSides; i++) {
 			// 		var angle = (i / numSides) * 360;
 			// 		var offsetLat = center.lat + (radius / 111.32) * Math.cos(angle * Math.PI / 180);
 			// 		var offsetLng = center.lng + (radius / (111.32 * Math.cos(center.lat * Math.PI / 180))) * Math.sin(angle * Math.PI / 180);
 			// 		polygonCoords.push({
 			// 			lat: offsetLat,
 			// 			lng: offsetLng
 			// 		});
 			// 	}

 			// 	// Define polygon styling options
 			// 	var polygonOptions = {
 			// 		paths: polygonCoords,
 			// 		strokeColor: '#FF0000',
 			// 		strokeOpacity: 0.8,
 			// 		strokeWeight: 2,
 			// 		fillColor: '#FF0000',
 			// 		fillOpacity: 0.35
 			// 	};

 			// 	// Create and display the polygon on the map
 			// 	var polygon = new google.maps.Polygon(polygonOptions);
 			// 	polygon.setMap(map);
 			// }

 			// // Call the function to create a polygon with a 3 km radius
 			// createPolygon(center, 3); // Adjust radius in meters (1000 meters = 1 km)

 			// Center the map vertically
 			map.setCenter({
 				lat: center.lat,
 				lng: center.lng + 0.005
 			});
 		}


 		//  function initMap() {
 		// 	// Replace with your desired location coordinates
 		// 	var center = {
 		// 		lat: 10.1432776,
 		// 		lng: 36.7948829
 		// 	};

 		// 	var map = new google.maps.Map(document.getElementById('background-video'), {
 		// 		zoom: 10,
 		// 		center: center,
 		// 		disableDefaultUI: true, // Hides default UI elements
 		// 		draggable: false, // Disables map dragging
 		// 		scrollwheel: false, // Disables zoom on scroll
 		// 		streetViewControl: false // Hides street view control
 		// 	});

 		// 	var marker = new google.maps.Marker({
 		// 		position: center,
 		// 		map: map
 		// 	});

 		// 	// Center the map vertically
 		// 	map.setCenter({
 		// 		lat: center.lat,
 		// 		lng: center.lng + 0.005
 		// 	}); // Adjust the lng value to center the map vertically
 		// }
 		jQuery(document).ready(function($) {



 			owlcarouselmaker(".owl-carousel", ".next-btn", ".prev-btn", 1);
 			owlcarouselmaker(".owl-carousels", ".next-btn-proj", ".prev-btn-proj", 1);
 			owlcarouselmaker("#figuresslides", ".next-btn-fig", ".prev-btn-fig", 1);
 			owlcarouselmaker("#stakeholders", ".next-btn-stk", ".prev-btn-stk", 2);
 			// $(".owl-carousel").owlCarousel({
 			// loop: false,
 			// dots: false,
 			// nav: true,
 			// responsive: {
 			// 0: {
 			// items: 1
 			// },
 			// 600: {
 			// items: 3
 			// },
 			// 1000: {
 			// items: 3
 			// }
 			// }
 			// });
 			// var owl = $(".owl-carousel");
 			// owl.owlCarousel();
 			// $(".next-btn").click(function() {
 			// owl.trigger("next.owl.carousel");
 			// });
 			// $(".prev-btn").click(function() {
 			// owl.trigger("prev.owl.carousel");
 			// });
 			// $(".prev-btn").addClass("disabled");
 			// $(owl).on("translated.owl.carousel", function(event) {
 			// if ($(".owl-prev").hasClass("disabled")) {
 			// $(".prev-btn").addClass("disabled");
 			// } else {
 			// $(".prev-btn").removeClass("disabled");
 			// }
 			// if ($(".owl-next").hasClass("disabled")) {
 			// $(".next-btn").addClass("disabled");
 			// } else {
 			// $(".next-btn").removeClass("disabled");
 			// }
 			// });

 			// project carousel


 		});

 		function owlcarouselmaker(selector, nextbtn, prevbtn, slides) {
 			jQuery(selector).owlCarousel({
 				loop: false,
 				dots: false,
 				nav: true,
 				responsiveClass: true,
 				responsive: {
 					0: {
 						items: slides
 					},
 					600: {
 						items: 3
 					},
 					1000: {
 						items: 3
 					}
 				}
 			});
 			var owl = jQuery(selector);
 			owl.owlCarousel();
 			jQuery(nextbtn).click(function() {
 				owl.trigger("next.owl.carousel");
 			});
 			jQuery(prevbtn).click(function() {
 				owl.trigger("prev.owl.carousel");
 			});
 			jQuery(prevbtn).addClass("disabled");
 			jQuery(owl).on("translated.owl.carousel", function(event) {
 				if (jQuery(prevbtn).hasClass("disabled")) {
 					jQuery(prevbtn).addClass("disabled");
 				} else {
 					jQuery(prevbtn).removeClass("disabled");
 				}
 				if (jQuery(nextbtn).hasClass("disabled")) {
 					jQuery(nextbtn).addClass("disabled");
 				} else {
 					jQuery(nextbtn).removeClass("disabled");
 				}
 			});
 		}

 		function isValidCoordinates(latitude, longitude) {
 			return (latitude >= -90 && latitude <= 90) && (longitude >= -180 && longitude <= 180);
 		}
 		var getMapId = "mainmapprojects";
 		var lati = <?php echo $latitude; ?>;
 		var long = <?php echo $longitude; ?>; // runMapproject(getMapId, lati, long); // function runMapproject(mapId, latitude, longitude) { // var map=L.map(mapId).setView([latitude, longitude], 10); // L.tileLayer('https://{s}.basemaps.cartocdn.com/rastertiles/voyager/{z}/{x}/{y}.png', { // attribution: '' // }).addTo(map); // var isValid=isValidCoordinates(latitude, longitude); // if (isValid) { // var latlng=L.latLng(latitude, longitude); // var marker=L.marker(latlng, { // icon: L.divIcon({ // className: 'custom-marker' , // html: '<div class="cluster-icon">1</div>' , // iconSize: [20, 20] // }) // }); // marker.bindPopup('<h3>' + latitude + '</h3>
 		// <
 		// h6 > ' + latitude + ' < /h6>');

 		// map.addLayer(marker);
 		// map.setView(latlng, map.getZoom());

 		// } else {
 		// console.log("Invalid coordinates");
 		// }
 		// }

 		jQuery(document).ready(function($) {
 			jQuery("#downloadpdfmi").on("click", function(e) {
 				e.preventDefault();
 				$("#hidememain_mi").removeAttr("data-scroll-container");
 				$(".hidepdfki").show();
 				$("header").hide();
 				$("footer").hide();
 				$("#relatedproject_mi").hide();
 				console.log("download");
 				jQuery("body").printThis({
 					importCSS: true,
 					loadCSS: [
 						'https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css?ver=1.0', // Path to your first custom CSS file
 						'https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css?ver=1.0', // Path to your second custom CSS file
 						'https://dev.araburban.org/wp-content/themes/audi/css/locomotive-scroll.css?ver=1.0',
 						'https://dev.araburban.org/wp-content/themes/audi/css/main.css?ver=1.0',
 						'https://dev.araburban.org/wp-content/themes/audi/css/navigation.css?ver=1.0',
 						'https://dev.araburban.org/wp-content/themes/audi/css/responsive.css?ver=1.0',
 						'https://dev.araburban.org/wp-content/themes/audi/style.css?ver=1.0.0' // Path to your second custom CSS file
 						// Add more CSS files as needed
 					],
 					pageSize: 'A3',
 					output: {
 						destination: 'file', // Set the destination to 'file' for PDF
 						margin: { // Set margins
 							top: '0cm',
 							bottom: '0cm',
 							left: '0cm',
 							right: '0cm'
 						}
 					}, // Set the output format to PDF
 					outputSrc: 'download.pdf',
 				});

 				setTimeout(function() {
 					$(".hidepdfki").hide();
 					$("header").show();
 					$("footer").show();
 				}, 3000);

 			});
 			jQuery("#downloadpdfmi").on("click", function(e) {
 				html2pdf(document.body);
 			});

 			var getUrlTrans = jQuery('.lang-switcher').attr("href");

 			var getId = "?id=<?php print $_GET['id']; ?>";

 			jQuery('.lang-switcher').attr("href", getUrlTrans + getId);

 			jQuery("#toggleRef").on("click touch", function() {

 				if (jQuery("#projLink").hasClass("hideThis")) {

 					jQuery("#projLink").removeClass("hideThis");

 					<?php if ($lang == "en") { ?>

 						jQuery("#toggleRef .fa-solid").removeClass("fa-caret-right");

 					<?php } else { ?>

 						jQuery("#toggleRef .fa-solid").removeClass("fa-caret-left");

 					<?php } ?>

 					jQuery("#toggleRef .fa-solid").addClass("fa-caret-down");

 				} else {

 					jQuery("#projLink").addClass("hideThis");

 					jQuery("#toggleRef .fa-solid").removeClass("fa-caret-down");

 					<?php if ($lang == "en") { ?>

 						jQuery("#toggleRef .fa-solid").addClass("fa-caret-right");

 					<?php } else { ?>

 						jQuery("#toggleRef .fa-solid").addClass("fa-caret-left");

 					<?php } ?>

 				}

 			});

 		});
 	</script>