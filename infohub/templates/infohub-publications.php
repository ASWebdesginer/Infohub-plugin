<?php

/**

 * Infohub Publications Page

 **/



$lang = pll_current_language();



$getPubs = getPubs();

$accorNumHead = 1;

$accorNumBody = 1;

$accorNumTarget = 1;



$frtl = "";

if ($lang == "ar") {

	$frtl = "force-ltr";
}





?>



<?php //print_r($getPubs);
?>



<style>



</style>





<div class="publication-type">

	<div class="row">

		<div class="col-6 col-md-3">

			<button id="audi-publications" onClick="filterAuthor('pub-ap',this);" class="btn btn-secondary btn-lg btn-gray w-100 filter-author">

				<?php print forceTranslate("AUDI Publications", "منشورات المعهد"); ?>

			</button>

		</div>

		<div class="col-6 col-md-3">

			<button id="other-publications" onClick="filterAuthor('pub-op',this);" class="btn btn-secondary btn-lg btn-gray w-100 filter-author">

				<?php print forceTranslate("Other Publications", "منشورات اخرى"); ?>

			</button>

		</div>

		<div class="col-12 col-md-6"></div>

	</div>

</div>



<div class="spacer-40"></div>





<div id="publication-list" class="infohub-list">



	<div class="accordion accordion-flush" id="infohub-accordion">



		<?php

		$arrayModals = array();

		foreach ($getPubs as $row) {



			$arrayModals[] = $row['modal'];



			$classPubCode = "";

			if ($row['pubCode'] == 1) {

				$classPubCode = "pub-ap";
			}

			if ($row['pubCode'] == 2) {

				$classPubCode = "pub-op";
			}



		?>





			<div class="accordion-item <?php print $classPubCode; ?>">

				<h2 class="accordion-header" id="heading-<?php print $row['ID']; ?>">

					<button class="accordion-button collapsed d-flex align-items-center justify-content-between pr_23_mi" type="button" data-bs-toggle="collapse" data-bs-target="#body-<?php print $row['ID']; ?>">
						<div class="mi_title_type">
							<p class="remMar mi_20_500"><b><?php print $row['name']; ?></b> <span class="hide_mitch"> <?php print $row['pubType']; ?> </span></p>

							<small><?php print $row['pubYear']; ?></small>
						</div>
						<div class="icon">
							<img src="<?php echo get_template_directory_uri() . '/img/downarrowtab.svg'; ?>" alt="">
						</div>

					</button>

				</h2>

				<div id="body-<?php print $row['ID']; ?>" class="accordion-collapse collapse" data-bs-parent="#infohub-accordion">

					<div class="accordion-body">



						<div class="row align-items-center">

							<div class="col-md-7">



								<div class="row infohub-accordion-details">

									<div class="col-md-5">

										<b><?php print forceTranslate("Organization Name", "اسم المنظمة"); ?>:</b>

									</div>

									<div class="col-md-7"><?php print $row['orgName']; ?></div>

								</div>



								<div class="row infohub-accordion-details">

									<div class="col-md-5"><b><?php print forceTranslate("Organization Type", "نوع المنظمة"); ?>:</b></div>

									<div class="col-md-7"><?php print $row['orgType']; ?></div>

								</div>



								<div class="row infohub-accordion-details">

									<div class="col-md-5"><b><?php print forceTranslate("Publication Country", "بلد النشر"); ?>:</b></div>

									<div class="col-md-7"><?php print $row['country']; ?></div>

								</div>



								<div class="row infohub-accordion-details">

									<div class="col-md-5"><b><?php print forceTranslate("Language", "اللغة"); ?>:</b></div>

									<div class="col-md-7"><?php print $row['lang_version']; ?></div>

								</div>



								<div class="row infohub-accordion-details">

									<div class="col-md-5"><b><?php print forceTranslate("Publication Date", "تاريخ النشر"); ?>:</b></div>

									<div class="col-md-7"><?php print $row['pubDate']; ?></div>

								</div>

								<div class="row infohub-accordion-details">

									<div class="col-md-5"><b><?php print forceTranslate("Publication Type", "  نوع المنشور:"); ?>:</b></div>

									<div class="col-md-7"><?php print $row['pubType']; ?></div>

								</div>



								<div class="row infohub-accordion-details">

									<div class="col-md-5"><b><?php print forceTranslate("Theme of the Publication", " موضوع المنشور:"); ?>:</b></div>

									<div class="col-md-7"><?php print $row['theme']; ?></div>

								</div>



								<div class="row infohub-accordion-details">

									<div class="col-md-5"><b><?php print forceTranslate("Publication Link", "رابط المنشور"); ?>:</b></div>

									<div class="col-md-7">

										<?php print $row['pubLinkEn']; ?>

										<?php print $row['pubLinkAr']; ?>

										<?php print $row['pubLinkFr']; ?>

									</div>

								</div>



								<div class="spacer-20"></div>



							</div>

							<div class="col-md-5">

								<center>

									<?php print $row['logo']; ?>

									<?php print $row['modal']; ?>

								</center>

							</div>

						</div>





					</div>

				</div>

			</div>



		<?php } ?>





	</div>



</div>



<div id="preLoad-modals">

	<?php //print implode("",$arrayModals);
	?>

</div>