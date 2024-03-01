<?php

/**

 * Infohub Organizations Page

 **/



$lang = pll_current_language();



$getOrgs = getOrgs();

$accorNumHead = 1;

$accorNumBody = 1;

$accorNumTarget = 1;



$frtl = "";

if ($lang == "ar") {

  $frtl = "force-ltr";
}



?>



<style>
  <?php print_r($getOrgs); ?>
</style>



<div id="organization-list" class="infohub-list">



  <div class="accordion accordion-flush" id="infohub-accordion">



    <?php foreach ($getOrgs as $rows) { ?>







      <?php

      $socialTitle = "";

      if ($rows['social']) {

        $socialTitle = '<p class="fnt-15 fnt-dark-gray remMar"><b>' . forceTranslate("Social Media", "Social Media") . '</b></p>';
      }

      ?>



      <div class="accordion-item">

        <h2 class="accordion-header d-flex align-items-center" id="heading-<?php print $rows['ID']; ?>">

          <button class="accordion-button collapsed  d-flex align-items-center justify-content-between pr_23_mi" type="button" data-bs-toggle="collapse" data-bs-target="#body-<?php print $rows['ID']; ?>">

            <div class="mi_title_type">

              <p class="remMar mi_20_500"><b><?php print $rows['name']; ?></b> <span class="hide_mitch"> - <?php print $rows['orgType']; ?> </span></p>

              <small><?php print $rows['country']; ?></small>

            </div>

            <div class="icon">

              <img src="<?php echo get_template_directory_uri() . '/img/downarrowtab.svg'; ?>" alt="">

            </div>

          </button>

        </h2>

        <div id="body-<?php print $rows['ID']; ?>" class="accordion-collapse collapse" data-bs-parent="#infohub-accordion">

          <div class="accordion-body">



            <div class="row align-items-center">

              <div class="col-md-7">



                <div class="row infohub-accordion-details">

                  <div class="col-md-5"><b><?php print forceTranslate("Location Address", "العنوان"); ?>:</b></div>

                  <div class="col-md-7"><?php print $rows['address']; ?></div>

                </div>



                <div class="row infohub-accordion-details">

                  <div class="col-md-5"><b><?php print forceTranslate("Phone Number", "رقم الهاتف"); ?>:</b></div>

                  <div class="col-md-7">
                    <font class="<?php print $frtl; ?>"><?php print $rows['phone']; ?></font>
                  </div>

                </div>



                <div class="row infohub-accordion-details">

                  <div class="col-md-5"><b><?php print forceTranslate("E-mail Address", "العنوان البريدي"); ?>:</b></div>

                  <div class="col-md-7"><?php print $rows['email']; ?></div>

                </div>



                <div class="row infohub-accordion-details">

                  <div class="col-md-5"><b><?php print forceTranslate("Official Website", "عنوان البريد الإلكتروني"); ?>:</b></div>

                  <div class="col-md-7"><?php print $rows['website']; ?></div>

                </div>





                <div class="row infohub-accordion-details">

                  <div class="col-md-5"><b><?php print forceTranslate("Type of Organization", "الموقع الإلكتروني٬"); ?>:</b></div>

                  <div class="col-md-7"><?php print $rows['orgType']; ?></div>

                </div>



                <div class="row infohub-accordion-details">

                  <div class="col-md-5"><b><?php print forceTranslate("Year of Establishment", "سنة التأسيس"); ?>:</b></div>

                  <div class="col-md-7">
                    <font class="<?php print $frtl; ?>"><?php print $rows['est']; ?></font>
                  </div>

                </div>



                <div class="row infohub-accordion-details">

                  <div class="col-md-5"><b><?php print forceTranslate("Number of Employees", "عدد الموظفين"); ?>:</b></div>

                  <div class="col-md-7">
                    <font class="<?php print $frtl; ?>"><?php print $rows['employee']; ?></font>
                  </div>

                </div>



                <div class="row infohub-accordion-details">

                  <div class="col-md-5"><b><?php print forceTranslate("Total Budget $ / Year", "إجمالية الميزانية $ ( السنة )"); ?>:</b></div>

                  <div class="col-md-7">
                    <font class="<?php print $frtl; ?>"><?php print $rows['budget']; ?></font>
                  </div>

                </div>



                <div class="row infohub-accordion-details">

                  <div class="col-md-5"><b><?php print forceTranslate("Geography of Intervention", "مناطق التدخل"); ?>:</b></div>

                  <div class="col-md-7"><?php print $rows['geoInt']; ?> <?php print $rows['arabCountry']; ?></div>

                </div>



                <div class="row infohub-accordion-details">

                  <div class="col-md-5"><b><?php print forceTranslate("Areas of Intervention", "مجالات التدخل"); ?>:</b></div>

                  <div class="col-md-7"><?php print $rows['areasInt']; ?></div>

                </div>



                <div class="row infohub-accordion-details">

                  <div class="col-md-5"><b><?php print forceTranslate("Types of Intervention", "نوع التدخل"); ?>:</b></div>

                  <div class="col-md-7"><?php print $rows['typesInt']; ?></div>

                </div>



                <div class="spacer-20"></div>



              </div>

              <div class="col-md-5">

                <center>

                  <?php print $rows['logo']; ?>

                  <?php print $rows['modal']; ?>



                  <div class="infohub-social">

                    <?php print $socialTitle; ?>

                    <div class="spacer-10"></div>

                    <?php print $rows['social']; ?>

                  </div>



                </center>



              </div>

            </div>





          </div>

        </div>

      </div>



    <?php } ?>



  </div>





</div>