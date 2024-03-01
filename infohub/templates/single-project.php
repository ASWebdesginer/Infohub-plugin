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

 <div data-scroll-container>
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

 						<div class="ratio ratio-16x9">

 							<div id="background-video">
 								<?php print $query['map']; ?>

 							</div>

 						</div>

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

 						<a href="#" class="btn btn-secondary shadowed" id="downloadpdfmi">

 							<i class="fa-solid fa-cloud-arrow-down mar-right-5"></i> <?php print forceTranslate("Download", "تحميل"); ?>

 						</a>
 						<?php //echo do_shortcode('[save_as_pdf_pdfcrowd]'); 
							?>
 						<?php //echo do_shortcode('[html2pdf text="Save as PDF"]');
							?>
 						<div class="shareiconwrap_mi">
 							<a href="#" class="btn btn-primary btn-blue mainshare">

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

 						<div class="owl-carouseld text-center px-3 items_mi" id="stakeholders">

						   
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

 			<div class="spacer-20"></div>

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

 	<div class="spacer-120"></div>

 	</section>
 	<!-- related project -->
 	<?php
		$topicwordscurrent = get_field('section_2', $postId);
		$projectdetails = get_field('section_1', $postId);
		$translatedcity = pll_get_post_translations($projectdetails['city'][0]);
		$citysize;
		if ($lang == 'en') {
			$citysize = get_field('city_size', $translatedcity['en']);
		} else {
			$citysize = get_field('city_size', $translatedcity['ar']);
		}
		$cityselect = get_field_object('field_65aa3ca620185');

		$featurecity = get_the_post_thumbnail_url($projectdetails['city'][0], 'full');
		?>
 	<section id="relatedproject_mi" class="non-vh mb-5">
 		<div class="container">
 			<h2 class="relatedmain_mi"><?php print forceTranslate('Related City', 'مدن ذات صلة'); ?> </h2>
 			<div class="public_wraper_mi" id="citywrapper_id">
 				<div class="innercity_mi" style="background-image: url(<?php echo $featurecity != '' ? $featurecity : '' . get_template_directory_uri() . '/img/cityplace.jpg'; ?> );">
 					<div class="citydetailsarea_mi">
 						<div class="card_mi_content">
 							<h2 class="text-white"><?php print forceTranslate(get_the_title($projectdetails['city'][0]), get_the_title($translatedcity['ar'])); ?></h2>
 							<h3 class="text-white"><?php echo get_field('country', $projectdetails['city'][0])['label']; ?></h3>
 							<h6 class="text-white"><?php echo ($citysize[0] != "0") ? $cityselect['choices'][$citysize] : ''; ?></h6>
 						</div>
 					</div>
 				</div>

 			</div>
 		</div>

 		<?php
			$args = array(
				"post_type" => "project",
				'posts_per_page' => -1
			);
			$topicwords = $topicwordscurrent['topic_words'];
			$query = new WP_Query($args);
			if ($query->have_posts()) {
			?>
 			<div class="container mi_mt_48">
 				<h2 class="relatedmain_mi"><?php print forceTranslate(' Related Projects', 'مشاريع ذات صلة'); ?></h2>
 				<div class="public_wraper_mi">
 					<div class="owl-carousels" id="mi6_projects_st">
 						<?php
							while ($query->have_posts()) {
								$query->the_post();
								$post_id = get_the_ID();
								$pubProject = get_field('section_2', $post_id);
								$commonitem = array_intersect($topicwords, $pubProject['topic_words']);
								if (count($commonitem) > 0) {
									$title = get_the_title();
									$projectinfo = get_field('section_1', $post_id);
									$artitle = $projectinfo['project_name_ar'];

									// $field = get_field_object('publication_type');
									// $pubProject = get_field('project', $post_id);
									$type = $projectinfo['city'];
									$featured_img_url = get_the_post_thumbnail_url($post_id, 'full');

									$date = $projectinfo['starting_date'];
									$enddate = '';
									if ($projectinfo['on-going']) {
										$enddate = "Ongoing";
									} else {
										$enddate = $projectinfo['end_date'];
									}

							?>
 								<div class="item w-100">
 									<div class="card_mi">
 										<div class="image_mi_sect">
 											<img src="<?php echo ($featured_img_url == '') ? '' . get_template_directory_uri() . '/img/placeholder.svg' : $featured_img_url; ?>" alt="featured image" class="img-fluid w-100">
 										</div>
 										<div class="card_mi_content">
 											<h2 class="restrict_to_two_mi"><?php print forceTranslate($title, $artitle); ?></h2>
 											<h3><?php echo get_the_title($type[0]); ?></h3>
 											<h6><?php echo $date; ?>,<?php echo $enddate; ?></h6>
 										</div>
 									</div>
 								</div>
 						<?php
								}
								//   var_dump(get_field('project',$post_id));
								wp_reset_postdata();
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
				"lang" => $lang,
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
									$title = get_the_title();
									$translatedcity = pll_get_post_translations($post_id);
									$pubProject;
									$field;
									$type;
									if ($lang == 'en') {
										$type = get_field('publication_type', $post_id);
										$field = get_field_object('publication_type', $post_id);
									} else {
										$type = get_field('publication_type', $translatedcity['ar']);
										$field = get_field_object('publication_type', $translatedcity['ar']);
									}
									$date = get_field('publication_date', $post_id);
							?>
 								<div class="item w-100">
 									<div class="card_mi">
 										<div class="image_mi_sect">
 											<img src="<?php echo $featured_img_url; ?>" alt="featured image" class="img-fluid w-100">
 										</div>
 										<div class="card_mi_content">
 											<h2 class="restrict_to_two_mi"><?php echo $title; ?></h2>
 											<h3><?php echo $field['choices'][$type]; ?></h3>
 											<h6><?php echo $date; ?></h6>
 										</div>
 									</div>
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


 	</section>

 	<!-- <!-- publication related

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

 	<script>
 		// Assuming you have a button with id "downloadBtn"
 		document.getElementById('downloadpdfmi').addEventListener('click', function(e) {
 			e.preventDefault();
 			document.getElementById("background-video").style.display = 'none';
 			document.getElementById("mainprojectshere").style.display = 'block';
 			// Get the body element
 			var body = document.body;

 			// Get the height of the body
 			var bodyHeight = body.offsetHeight;

 			// Display the body height
 			console.log("Body Height: " + bodyHeight + "px");
 			// Use html2canvas to capture the whole page as an image
 			html2canvas(document.body).then(function(canvas) {
 				// Convert the captured image to a PDF using jsPDF
 				// Calculate page height
 				var imgWidth = 210; // A4 size
 				var pageHeight = canvas.height * imgWidth / canvas.width;
 				var imgData = canvas.toDataURL('image/png');
 				var pdf = new jsPDF('p', 'mm', 'a4');
 				var position = 0;

 				// Add the first page
 				pdf.addImage(imgData, 'PNG', 0, position, imgWidth, pageHeight);
 				position = pageHeight - 10; // adjust position
                 console.log(pageHeight);
				 console.log(canvas.width)
 				// Add subsequent pages if the content overflows
 				while (position < canvas.height) {
 					pdf.addPage();
 					pdf.addImage(imgData, 'PNG', 0, -position, imgWidth, pageHeight);
 					position = position + pageHeight - 10; // adjust position
 				}

 				// Save the PDF
 				pdf.save('full-page.pdf');
 				console.log("yes!!");

 			});
 		});
 	</script> -->

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
 <script>
 	jQuery(document).ready(function($) {
 		owlcarouselmaker(".owl-carousel", ".next-btn", ".prev-btn",1);
 		owlcarouselmaker(".owl-carousels", ".next-btn-proj", ".prev-btn-proj",1);
 		owlcarouselmaker("#figuresslides", ".next-btn-fig", ".prev-btn-fig",1);
 		owlcarouselmaker("#stakeholders", ".next-btn-stk", ".prev-btn-stk",2);
 		// $(".owl-carousel").owlCarousel({
 		// 	loop: false,
 		// 	dots: false,
 		// 	nav: true,
 		// 	responsive: {
 		// 		0: {
 		// 			items: 1
 		// 		},
 		// 		600: {
 		// 			items: 3
 		// 		},
 		// 		1000: {
 		// 			items: 3
 		// 		}
 		// 	}
 		// });
 		// var owl = $(".owl-carousel");
 		// owl.owlCarousel();
 		// $(".next-btn").click(function() {
 		// 	owl.trigger("next.owl.carousel");
 		// });
 		// $(".prev-btn").click(function() {
 		// 	owl.trigger("prev.owl.carousel");
 		// });
 		// $(".prev-btn").addClass("disabled");
 		// $(owl).on("translated.owl.carousel", function(event) {
 		// 	if ($(".owl-prev").hasClass("disabled")) {
 		// 		$(".prev-btn").addClass("disabled");
 		// 	} else {
 		// 		$(".prev-btn").removeClass("disabled");
 		// 	}
 		// 	if ($(".owl-next").hasClass("disabled")) {
 		// 		$(".next-btn").addClass("disabled");
 		// 	} else {
 		// 		$(".next-btn").removeClass("disabled");
 		// 	}
 		// });

 		// project carousel 


 	});

 	function owlcarouselmaker(selector, nextbtn, prevbtn,slides) {
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
 	var long = <?php echo $longitude; ?>;
 	// runMapproject(getMapId, lati, long);

 	// function runMapproject(mapId, latitude, longitude) {
 	// 	var map = L.map(mapId).setView([latitude, longitude], 10);

 	// 	L.tileLayer('https://{s}.basemaps.cartocdn.com/rastertiles/voyager/{z}/{x}/{y}.png', {
 	// 		attribution: ''
 	// 	}).addTo(map);

 	// 	var isValid = isValidCoordinates(latitude, longitude);

 	// 	if (isValid) {
 	// 		var latlng = L.latLng(latitude, longitude);

 	// 		var marker = L.marker(latlng, {
 	// 			icon: L.divIcon({
 	// 				className: 'custom-marker',
 	// 				html: '<div class="cluster-icon">1</div>',
 	// 				iconSize: [20, 20]
 	// 			})
 	// 		});

 	// 		marker.bindPopup('<h3>' + latitude + '</h3> <h6>' + latitude + '</h6>');

 	// 		map.addLayer(marker);
 	// 		map.setView(latlng, map.getZoom());

 	// 	} else {
 	// 		console.log("Invalid coordinates");
 	// 	}
 	// }

 	jQuery(document).ready(function() {
 		// jQuery("#downloadpdfmi").on("click", function(e) {
 		// 	e.preventDefault();
 		// 	console.log("download");
 		// 	jQuery("body").printThis({
 		// 		importCSS: true,
 		// 		loadCSS: [
 		// 			'https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css?ver=1.0', // Path to your first custom CSS file
 		// 			'https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css?ver=1.0', // Path to your second custom CSS file
 		// 			'https://dev.araburban.org/wp-content/themes/audi/css/locomotive-scroll.css?ver=1.0',
 		// 			'https://dev.araburban.org/wp-content/themes/audi/css/main.css?ver=1.0',
 		// 			'https://dev.araburban.org/wp-content/themes/audi/css/navigation.css?ver=1.0',
 		// 			'https://dev.araburban.org/wp-content/themes/audi/css/responsive.css?ver=1.0',
 		// 			'https://dev.araburban.org/wp-content/themes/audi/style.css?ver=1.0.0' // Path to your second custom CSS file
 		// 			// Add more CSS files as needed
 		// 		],
 		// 		 output: 'pdf', // Set the output format to PDF
 		//     outputSrc: 'download.pdf',
 		// 	})
 		// });
 		// jQuery("#downloadpdfmi").on("click", function(e) {
 		// 	html2pdf(document.body);
 		// });

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