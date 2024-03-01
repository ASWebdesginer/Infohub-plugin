 <?php /* Template Name: Infohub Single City Page */ ?>



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
	if($lang == "ar"){
		$postId = pll_get_post_translations($post_id);
	}

	$query = getSingleCity($postId);

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

			//print_r($query);

		?>
 </script>


 <header>

 	<?php include("../wp-content/themes/audi/template-parts/navigation.php"); ?>

 </header>



 <div data-scroll-container>

 	<div id="top"></div>

 	<section class="non-vh">

 		<div class="spacer-40"></div>
 		<div class="spacer-120"></div>

 		<div class="container">

 			<!-- Header/Map-->
 			<div id="city-banner" class="csc bordered-shadow">

 				<div class="csc-video">

 					<div class="ratio ratio-16x9" id="mainmapprojects">

 						<div id="background-video">

 							<div id="city-banner-img" style="background-image:url('<?php print $query['banner'];?>');"></div>

 						</div>

 					</div>

 					<div id="vid-caption">

 						<h1 class="fnt-white projectname remMar">
 							<?php print $query['title']; ?>, 
 							<font class="fnt-25"> <?php print $query['country'];?></font>
 						</h1>
 						<h4 class="fnt-white d-flex align-items-center remMar fnt-18 projectloc">
 							<?php print $query['city_size'];?>
 						</h4>

 						<div class="spacer-20"></div>
 						
 						<div class="infohub-social">
 							<?php print $query['sc'];?>
 						</div>

 						<div class="spacer-10"></div>

 					</div>

 				</div>

 			</div> 	

 			<div class="spacer-20"></div>


 			<!-- Donwload/Share -->
 			<div class="row align-items-center">

 				<div class="col-md-9"></div>

 				<div class="col-md-3 text-end">
 			
 					<!-- <a href="#" class="btn btn-secondary shadowed" id="downloadpdfmi">

 						<i class="fa-solid fa-cloud-arrow-down mar-right-5"></i> <?php print forceTranslate("Download", "تحميل"); ?>

 					</a> -->
 				 <?php echo do_shortcode('[save_as_pdf_pdfcrowd]'); ?>
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

 			<!-- Geo -->
 			<h4 class="fnt-dark-gray"><?php print forceTranslate("Geographic Location and Area", "Geographic Location and Area"); ?></h4>		
 			<div class="spacer-20"></div>

 			<?php print $query['geo'];?>
 			<div class="spacer-20"></div>


 			<!-- Boundary -->
 			<div class="figures">
 				<?php print $query['boundary'];?>
 			</div>
 			<div class="spacer-20"></div>


 			<!-- Demographics -->
 			<h4 class="fnt-dark-gray"><?php print forceTranslate("City Demographics", "City Demographics"); ?></h4>		
 			<div class="spacer-20"></div>

 			<?php print $query['demographic'];?>
 			<div class="spacer-20"></div>


 				<!-- Photo Gallery -->
 			<div class="figures">
 				<div class="row">
 					<?php print $query['photo1'];?>
 					<?php print $query['photo2'];?>
 					<?php print $query['photo3'];?>
 					<?php print $query['photo4'];?>
 				</div>
 			</div>
 			<div class="spacer-40"></div>

 			<!-- Environmental -->
 			<h4 class="fnt-dark-gray"><?php print forceTranslate("Environmental Situation", "Environmental Situation"); ?></h4>		
 			<div class="spacer-20"></div>

 			<?php print $query['environmental'];?>
 			<div class="spacer-20"></div>


 			<!-- Economy -->
 			<h4 class="fnt-dark-gray"><?php print forceTranslate("City Economy", "City Economy"); ?></h4>		
 			<div class="spacer-20"></div>

 			<?php print $query['economic'];?>
 			<div class="spacer-20"></div> 

 			<!-- Housing -->
 			<h4 class="fnt-dark-gray"><?php print forceTranslate("Housing in the City", "Housing in the City"); ?></h4>		
 			<div class="spacer-20"></div>

 			<?php print $query['housing'];?>
 			<div class="spacer-20"></div> 


 			<!-- Transportation -->
 			<h4 class="fnt-dark-gray"><?php print forceTranslate("Transportation and Mobility in the City", "Transportation and Mobility in the City"); ?></h4>		
 			<div class="spacer-20"></div>

 			<?php print $query['transport'];?>
 			<div class="spacer-20"></div>  											
 			
 		</div>

 		<div class="spacer-120"></div>

 	</section>


 	<?php get_footer(); ?>


 	<script>
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



 					jQuery("#toggleRef .fa-solid").addClass("fa-sort-down");



 				} else {



 					jQuery("#projLink").addClass("hideThis");

 					jQuery("#toggleRef .fa-solid").removeClass("fa-sort-down");



 				}



 			});



 		});
 	</script>