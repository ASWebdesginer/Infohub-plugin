<?php

/**

 * Infohub Projects Page

 **/



$lang = pll_current_language();



$getProj = getProj();



$projUrl = home_url() . '/infohub/projects/?id=';

if ($lang == "ar") {

	$projUrl = home_url() . '/infohub-ar /projects/?id=';
}





?>



<div id="project-list" class="infohub-list">



	<!--list view-->

	<div class="list-view">





		<div class="row">



			<div class="col-12 project-header desktop-view list equaltablemi">

				<div class="row align-items-center">

					<div class="col-md-3">
						<p><?php print forceTranslate("Project Name", "اسم المشروع"); ?></p>
					</div>

					<div class="col-md-3">
						<p><?php print forceTranslate("City", "المدينة"); ?></p>
					</div>

					<div class="col-md-2">
						<p><?php print forceTranslate("Country", "الدولة"); ?></p>
					</div>

					<div class="col-md-2">
						<p><?php print forceTranslate("Starting Date", "تاريخ"); ?></p>
					</div>

					<div class="col-md-2">
						<p><?php print forceTranslate("End Date", "تاريخ النهاية"); ?></p>
					</div>

				</div>

			</div>

		</div>



		<div class="spacer-20 desktop-view"></div>



		<div class="row project-body">

			<?php foreach ($getProj as $row) { ?>



				<div class="col-12 project-item">

					<a href="<?php print $projUrl . $row['ID']; ?>">

						<div class="row align-items-center list equaltablemi">

							<div class="col-md-3"><?php print $row['proj_name']; ?></div>

							<div class="col-md-3"><?php print $row['city']; ?></div>

							<div class="col-md-2"><?php print $row['country']; ?></div>

							<div class="col-md-2"><?php print $row['starting_date']; ?></div>

							<div class="col-md-2"><?php print $row['end_date']; ?></div>

						</div>

					</a>

				</div>

			<?php } ?>



		</div>





	</div>





	<!--map view-->

	<div class="map-view">

		<div id="infohub-projects-map" class="infohub-map"></div>

	</div>



</div>