<?php /* Template Name:  Infohub Organization Registration */ ?>



<?php

/**

 * The template for displaying Pages

 *

 * This is the template that displays all pages by default.

 * Please note that this is the WordPress construct of pages

 * and that other 'pages' on your WordPress site may use a

 * different template.

 *

 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/

 *

 * @package jobs

 */



$lang = pll_current_language();

$postId = get_the_ID();

?>







<?php get_header(); ?>

<style>
  .form-check {
    display: flex;
    gap: 20px;
  }

  div#failedmessage {
    width: 370px;
    color: #405561;
    text-align: justify;
    font-family: Roboto;
    font-size: 20px;
    font-style: normal;
    font-weight: 700;
    line-height: 27px;
    letter-spacing: -0.22px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.4);
    padding: 20px 40px;
    border-radius: 20px;
    margin: auto;
  }
</style>

<header>

  <?php include("../wp-content/themes/audi/template-parts/navigation.php"); ?>

</header>



<div data-scroll-container>



  <div id="top"></div>



  <section class="non-vh">



    <div class="spacer-40"></div>

    <div class="spacer-120"></div>



    <div class="container">



      <h1 class="fnt-dark-gray d-flex align-items-center"><img class="img-fluid mar-right-5" src="<?php print get_theme_url(); ?>/img/icons/icon2-gray.svg" /> <?php print forceTranslate("Filling the Form", "تعبئة الاستمارة"); ?></h1>



      <?php if ($lang == "en") { ?>



        <!-- English -->



        <div class="spacer-40"></div>



        <a href="<?php print home_url(); ?>/our-programs/urban-policy-research/?tab=srd1-tab-pane" class="btn btn-primary btn-blue"><i class="fa-solid fa-angle-left"></i> Back</a>



        <div class="spacer-60"></div>



        <?php if (isset($_GET["lang"]) && $_GET["lang"] == "confirmed") { ?>



          <!--step1-->

          <div class="infohub-steps step1">



            <div class="row">

              <div class="col-md-2"></div>

              <div class="col-md-8">



                <center>

                  <p class="fnt-dark-gray fnt-20">If you are a public, private or non-governmental entity acting within the field of urban development in the Arab region and have offices in at least one of its countries, please contribute to our Portal by providing information about your ORGANIZATION by filling out <a href="#" data-step="step1" data-num="1" class="step-button fnt-blue-light" onClick="return false;">this form</a>.</p>

                </center>



              </div>

              <div class="col-md-2"></div>

            </div>



          </div>



          <!--step2-->

          <div class="infohub-steps step2">



            <div class="row">

              <div class="col-md-2"></div>

              <div class="col-md-8">



                <center>

                  <p class="fnt-dark-gray fnt-20">Information submitted to the portal may only be provided by authorized representatives on behalf of their respective organizations.</p>



                  <div class="spacer-20"></div>



                  <div class="form-check">

                    <input class="form-check-input step-button" type="checkbox" value="" data-step="step2" data-num="2" id="flexCheckDefault">

                    <label class="form-check-label fnt-20 fnt-dark-gray" for="flexCheckDefault">

                      I hereby confirm that I am authorized to provide information in the name of my organization.

                    </label>

                  </div>





                </center>



              </div>

              <div class="col-md-2"></div>

            </div>



          </div>
          <!--step3-->

          <div class="infohub-steps step3">



            <div class="row">

              <div class="col-md-2"></div>

              <div class="col-md-8">



                <center>

                  <p class="fnt-dark-gray fnt-20">Are your organization's headquarters located in the Arab region?​</p>



                  <div class="spacer-20"></div>



                  <div class="form-check">

                    <input class="form-check-input step-button" type="checkbox" value="yes" data-step="step3" data-num="3" id="flexCheckDefault" data-types="hqlocationmi">

                    <label class="form-check-label fnt-20 fnt-dark-gray" for="flexCheckDefault">
                      Yes
                    </label>

                  </div>
                  <div class="form-check">

                    <input class="form-check-input step-button" type="checkbox" value="no" data-step="step3" data-num="3" id="flexCheckDefault" data-types="hqlocationmi">

                    <label class="form-check-label fnt-20 fnt-dark-gray" for="flexCheckDefault">
                      No
                    </label>

                  </div>

                </center>



              </div>

              <div class="col-md-2"></div>

            </div>



          </div>

          <!--step4-->

          <div class="infohub-steps step4" data-step="4">



            <div class="row">

              <div class="col-md-2"></div>

              <div class="col-md-8">



                <center>

                  <p class="fnt-dark-gray fnt-20">In which country</p>



                  <div class="spacer-20"></div>



                  <div class="form-check">

                    <?php echo do_shortcode('[arab_countries_dropdown]'); ?>


                  </div>

                </center>



              </div>

              <div class="col-md-2"></div>

            </div>



          </div>

          <!--step5-->

          <div class="infohub-steps step5">



            <div class="row">

              <div class="col-md-2"></div>

              <div class="col-md-8">



                <center>

                  <p class="fnt-dark-gray fnt-20">Does it have offices in Arab countries?</p>



                  <div class="spacer-20"></div>



                  <div class="form-check">

                    <input class="form-check-input step-button" type="checkbox" value="yes" data-step="step5" data-num="5" id="flexCheckDefault" data-types="sublocationmi">

                    <label class="form-check-label fnt-20 fnt-dark-gray" for="flexCheckDefault">
                      Yes
                    </label>

                  </div>
                  <div class="form-check">

                    <input class="form-check-input step-button" type="checkbox" value="no" data-step="step5" data-num="5" id="flexCheckDefault" data-types="sublocationmi">

                    <label class="form-check-label fnt-20 fnt-dark-gray" for="flexCheckDefault">
                      No
                    </label>

                  </div>

                </center>



              </div>

              <div class="col-md-2"></div>

            </div>



          </div>
          <!--step6-->

          <div class="infohub-steps step6" data-step="6">



            <div class="row">

              <div class="col-md-2"></div>

              <div class="col-md-8">



                <center>

                  <p class="fnt-dark-gray fnt-20">In which country</p>



                  <div class="spacer-20"></div>



                  <div class="form-check">

                    <?php echo do_shortcode('[arab_countries_dropdown]'); ?>


                  </div>

                </center>



              </div>

              <div class="col-md-2"></div>

            </div>



          </div>

          <!--step7-->


          <div class="infohub-steps step7">



            <div class="row">

              <div class="col-md-1"></div>

              <div class="col-md-10">



                <div class="infohub-form-container-blue">


                  <?php echo do_shortcode('[contact-form-7 id="7503bf7" registration-id="' . hashThis() . '" title="Registration organizations- EN"]'); ?>


                </div>



              </div>

              <div class="col-md-1"></div>

            </div>



          </div>

          <div class="infohub-steps step8" id="failedmessage">
            <div class="message">
              <p class="fnt-dark-gray fnt-20">Thank you for your interest, however, this page is dedicated only to organizations with offices within the Arab region.</p>
            </div>
          </div>

          <?php //print hashThis();
          ?>







        <?php } else { ?>



          <div class="row">

            <div class="col-md-2"></div>

            <div class="col-md-8">



              <center>

                <p class="fnt-dark-gray fnt-20">Kindly choose the language of the form you would like to fill.</p>

                <div class="row">

                  <div class="col-12 col-md-2"></div>

                  <div class="col-6 col-md-4">

                    <a href="<?php print home_url(); ?>/infohub-ar/registration/organizations?lang=confirmed" class="btn btn-primary btn-blue w-100 fnt-20">Arabic</a>

                  </div>

                  <div class="col-6 col-md-4">

                    <a href="<?php print home_url(); ?>/infohub/registration/organizations?lang=confirmed" class="btn btn-primary btn-blue w-100 fnt-20">English</a>

                  </div>

                  <div class="col-12 col-md-2"></div>

                </div>



              </center>



            </div>

            <div class="col-md-2"></div>

          </div>



        <?php } ?>



      <?php } ?>





      <?php if ($lang == "ar") { ?>



        <!-- Arabic -->



        <div class="spacer-40"></div>



        <a href="<?php print home_url(); ?>/برامجنا/برنامج-السياسات-الحضرية/?tab=srd1-tab-pane" class="btn btn-primary btn-blue"><i class="fa-solid fa-angle-right"></i> الرجوع</a>



        <div class="spacer-60"></div>



        <?php if (isset($_GET["lang"]) && $_GET["lang"] == "confirmed") { ?>



          <!--step1-->

          <div class="infohub-steps step1">



            <div class="row">

              <div class="col-md-2"></div>

              <div class="col-md-8">



                <center>

                  <p class="fnt-dark-gray fnt-20">إذا كنتم مؤسسة عامة أو خاصة أو غير حكومية، تعمل في حقل التنمية الحضرية في المنطقة العربية، ولديكم على الأقل مكتب في إحدى الدول العربية، يرجى المساهمة في بوابتنا من خلال تزويدنا بمعلومات حول منظمتكم وذلك عبر ملء 
                    <a href="#" data-step="step1" data-num="1" class="step-button fnt-blue-light" onClick="return false;"> هذه الإستمارة</a>.
                  </p>

                </center>



              </div>

              <div class="col-md-2"></div>

            </div>



          </div>



          <!--step2-->

          <div class="infohub-steps step2">



            <div class="row">

              <div class="col-md-2"></div>

              <div class="col-md-8">



                <center>

                  <p class="fnt-dark-gray fnt-20"> ملاحظة: إن المعلومات المقدمة إلى البوابة يجب أن تُقدم من قِبل ممثلين مخولين نيابةً عن منظماتهم فقط.</p>



                  <div class="spacer-20"></div>



                  <div class="form-check mi6-w-50">

                    <input class="form-check-input step-button" type="checkbox" value="" data-step="step2" data-num="2" id="flexCheckDefault">

                    <label class="form-check-label fnt-20 fnt-dark-gray" for="flexCheckDefault">

                      أؤكد أنني مخول بتقديم المعلومات بإسم منظمتي.

                    </label>

                  </div>





                </center>



              </div>

              <div class="col-md-2"></div>

            </div>



          </div>


          <!--step3-->

          <div class="infohub-steps step3">



            <div class="row">

              <div class="col-md-2"></div>

              <div class="col-md-8">



                <center>

                  <p class="fnt-dark-gray fnt-20">هل يقع المقر الرئيسي لمؤسستك في المنطقة العربية؟</p>



                  <div class="spacer-20"></div>



                  <div class="form-check">

                    <input class="form-check-input step-button" type="checkbox" value="yes" data-step="step3" data-num="3" id="flexCheckDefault" data-types="hqlocationmi">

                    <label class="form-check-label fnt-20 fnt-dark-gray" for="flexCheckDefault">

                      نعم
                    </label>

                  </div>
                  <div class="form-check">

                    <input class="form-check-input step-button" type="checkbox" value="no" data-step="step3" data-num="3" id="flexCheckDefault" data-types="hqlocationmi">

                    <label class="form-check-label fnt-20 fnt-dark-gray" for="flexCheckDefault">
                      لا
                    </label>

                  </div>

                </center>



              </div>

              <div class="col-md-2"></div>

            </div>



          </div>
          <!--step4-->

          <div class="infohub-steps step4" data-step="4">



            <div class="row">

              <div class="col-md-2"></div>

              <div class="col-md-8">



                <center>

                  <p class="fnt-dark-gray fnt-20">في أي بلد</p>



                  <div class="spacer-20"></div>



                  <div class="form-check">

                    <?php echo do_shortcode('[arab_countries_dropdown]'); ?>

                  </div>

                </center>



              </div>

              <div class="col-md-2"></div>

            </div>



          </div>

          <!--step5-->
          <!--step5-->

          <div class="infohub-steps step5">



            <div class="row">

              <div class="col-md-2"></div>

              <div class="col-md-8">



                <center>

                  <p class="fnt-dark-gray fnt-20">هل لها مكاتب في الدول العربية؟​​</p>



                  <div class="spacer-20"></div>



                  <div class="form-check">

                    <input class="form-check-input step-button" type="checkbox" value="yes" data-step="step5" data-num="5" id="flexCheckDefault" data-types="sublocationmi">

                    <label class="form-check-label fnt-20 fnt-dark-gray" for="flexCheckDefault">
                      نعم

                    </label>

                  </div>
                  <div class="form-check">

                    <input class="form-check-input step-button" type="checkbox" value="no" data-step="step5" data-num="5" id="flexCheckDefault" data-types="sublocationmi">

                    <label class="form-check-label fnt-20 fnt-dark-gray" for="flexCheckDefault">
                      لا

                    </label>

                  </div>

                </center>



              </div>

              <div class="col-md-2"></div>

            </div>



          </div>
          <!--step6-->

          <div class="infohub-steps step6" data-step="6">



            <div class="row">

              <div class="col-md-2"></div>

              <div class="col-md-8">



                <center>

                  <p class="fnt-dark-gray fnt-20">في أي بلد</p>



                  <div class="spacer-20"></div>



                  <div class="form-check">

                    <?php echo do_shortcode('[arab_countries_dropdown]'); ?>


                  </div>

                </center>



              </div>

              <div class="col-md-2"></div>

            </div>



          </div>

          <!--step7-->
          <!--step5-->

          <div class="infohub-steps step7">



            <div class="row">

              <div class="col-md-1"></div>

              <div class="col-md-10">

                <div class="infohub-form-container-blue">

                  <?php echo do_shortcode('[contact-form-7 id="f5c49ad" registration-id="' . hashThis() . '" title="Registration organizations- AR"]'); ?>

                </div>

              </div>

              <div class="col-md-1"></div>

            </div>



          </div>

          <div class="infohub-steps step8" id="failedmessage">
            <div class="message">
              <p class="fnt-dark-gray fnt-20">نشكرك على اهتمامك، ولكن هذه الصفحة مخصصة فقط للمؤسسات التي لها مكاتب داخل المنطقة العربية
                .​</p>
            </div>
          </div>

          <?php //print hashThis();
          ?>







        <?php } else { ?>



          <div class="row">

            <div class="col-md-2"></div>

            <div class="col-md-8">



              <center>

                <p class="fnt-dark-gray fnt-20">يرجى اختيار لغة النموذج الذي ترغب في تعبئته.</p>

                <div class="row">

                  <div class="col-12 col-md-2"></div>

                  <div class="col-6 col-md-4">

                    <a href="<?php print home_url(); ?>/infohub-ar/registration/organizations?lang=confirmed" class="btn btn-primary btn-blue w-100 fnt-20">عربي</a>

                  </div>

                  <div class="col-6 col-md-4">

                    <a href="<?php print home_url(); ?>/infohub-ar/registration/organizations?lang=confirmed" class="btn btn-primary btn-blue w-100 fnt-20">إنجليزي</a>

                  </div>

                  <div class="col-12 col-md-2"></div>

                </div>



              </center>



            </div>

            <div class="col-md-2"></div>

          </div>



        <?php } ?>



      <?php } ?>







    </div>



    <div class="spacer-120"></div>

  </section>




  <?php
  $link = "";
  if ($lang == "en") {
    $link = home_url("en/our-programs/urban-policy-research/?tab=srd1-tab-pane");
  } else {
    $link = home_url("برامجنا/برنامج-السياسات-الحضرية");
  }
  ?>



  <?php get_footer(); ?>



  <script>
    jQuery(document).ready(function() {
      jQuery("body").on("click", '.btn-infohub-submit', function(e) {
        //  e.preventDefault();

        var url = "<?php echo $link; ?>";

        setTimeout(function() {
          window.location.href = url;
        }, 3000);

        // if (classlist[0].indexOf(clakos) !== -1) {
        //   window.location.href = url;
        //         }

      })

      jQuery(".step-button").each(function() {



        jQuery(this).on("click touch", function() {



          var getDataStep = jQuery(this).attr("data-step");

          var getNextStep = jQuery(this).attr("data-num");

          var nextStep = parseInt(getNextStep) + 1;



          if (jQuery(this).attr("data-types") == "sublocationmi") {
            if (jQuery(this).val() == "no") {
              nextStep = nextStep + 2;
              console.log(nextStep);
            }
          } else if (jQuery(this).attr("data-types") == "hqlocationmi") {
            if (jQuery(this).val() == "no") {
              nextStep = nextStep + 1;
              console.log(nextStep);
            }

          }

          console.log(nextStep);



          jQuery("." + getDataStep + "").fadeOut(400)

          jQuery(".step" + nextStep + "").delay(400).fadeIn(800);


        });



      });

      jQuery("select").on("change", function() {
        var currentindex = jQuery(this).closest(".infohub-steps").attr('data-step');
        var nextStep = parseInt(currentindex) + 1;
        var prev = parseInt(currentindex) - 1;
        console.log(nextStep);

        if (currentindex == 6) {
          console.log(jQuery(".step" + prev + "").find("input:checked").val());
          if (jQuery(".step" + prev + "").find("input:checked").val() == "no") {
            nextStep = nextStep + 1;
          }
        } else if (currentindex == 4) {
          if (jQuery(".step" + prev + "").find("input:checked").val() == "yes") {
            nextStep = nextStep + 2;
          }
        }
        jQuery(this).closest(".infohub-steps").fadeOut(400)
        jQuery(".step" + nextStep + "").delay(400).fadeIn(800);
      });

    });
  </script>