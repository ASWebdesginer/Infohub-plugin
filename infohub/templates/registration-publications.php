<?php /* Template Name:  Infohub Publications Registration */ ?>



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



<header>

  <?php include("../wp-content/themes/audi/template-parts/navigation.php"); ?>

</header>



<div data-scroll-container>



  <div id="top"></div>



  <section class="">



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

                  <p class="fnt-dark-gray fnt-20">If you are an urban development organization active in the Arab region and have reports, strategies, guides, toolkits, etc. addressing urban and municipal issues in Arab cities, please contribute to our Portal by providing information about your PUBLICATIONS. You can do so by filling out <a href="#" data-step="step1" data-num="1" class="step-button fnt-blue-light" onClick="return false;">this form</a>.</p>

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

              <div class="col-md-1"></div>

              <div class="col-md-10">



                <div class="infohub-form-container-blue">


                  <?php echo do_shortcode('[contact-form-7 id="13f0ead" registration-id="' . hashThis() . '" title="Registration publications- EN"]'); ?>


                </div>



              </div>

              <div class="col-md-1"></div>

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

                    <a href="<?php print home_url(); ?>/infohub-ar/registration/publications?lang=confirmed" class="btn btn-primary btn-blue w-100 fnt-20">Arabic</a>

                  </div>

                  <div class="col-6 col-md-4">

                    <a href="<?php print home_url(); ?>/infohub/registration/publications?lang=confirmed" class="btn btn-primary btn-blue w-100 fnt-20">English</a>

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

                  <p class="fnt-dark-gray fnt-20">إذا كنتم تمثلون منظمة عاملة في مجال التنمية الحضرية في المنطقة العربية، ولدى منظمتكم تقارير أو منشورات حول مشاريعها واستراتيجياتها أو أدلة وأدوات تتناول قضايا المدن والبلديات العربية، يرجى المساهمة في بوابتنا من خلال تقديم معلومات حول هذه المنشورات يمكنكم القيام بذلك من خلال ملء 
                    <a href="#" data-step="step1" data-num="1" class="step-button fnt-blue-light" onClick="return false;">هذه الإستمارة</a>.
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

                    <label class="form-check-label fnt-20 fnt-dark-gray mi_float_to_right" for="flexCheckDefault">

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

              <div class="col-md-1"></div>

              <div class="col-md-10">

                <div class="infohub-form-container-blue">

                  <?php echo do_shortcode('[contact-form-7 id="f5f7f21" registration-id="' . hashThis() . '" title="Registration Publication - AR"]'); ?>

                </div>

              </div>

              <div class="col-md-1"></div>

            </div>



          </div>



          <?php //print hashThis();
          ?>







        <?php } else { ?>



          <div class="row">

            <div class="col-md-2"></div>

            <div class="col-md-8">



              <center>

                <p class="fnt-dark-gray fnt-20">يرجى اختيار لغة النموذج الذي ترغب في تعبئته.
                </p>

                <div class="row">

                  <div class="col-12 col-md-2"></div>

                  <div class="col-6 col-md-4">

                    <a href="<?php print home_url(); ?>/infohub-ar/registration/publications?lang=confirmed" class="btn btn-primary btn-blue w-100 fnt-20">عربي
                    </a>

                  </div>

                  <div class="col-6 col-md-4">

                    <a href="<?php print home_url(); ?>/infohub/registration/publications?lang=confirmed" class="btn btn-primary btn-blue w-100 fnt-20">إنجليزي</a>

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
  $link="";
  if($lang == "en") {
    $link=home_url("en/our-programs/urban-policy-research/?tab=srd1-tab-pane");
  }else{
    $link=home_url("برامجنا/برنامج-السياسات-الحضرية");
  }
?>


  <?php get_footer(); ?>



  <script>
    jQuery(document).ready(function() {

      jQuery("body").on("click",'.btn-infohub-submit', function(e) {
        //  e.preventDefault();
     
        var url= "<?php echo $link;?>";

        setTimeout(function(){
          window.location.href = url;
        },3000);
     
        // if (classlist[0].indexOf(clakos) !== -1) {
        //   window.location.href = url;
        //         }

      })

      jQuery(".step-button").each(function() {



        jQuery(this).on("click touch", function() {



          var getDataStep = jQuery(this).attr("data-step");

          var getNextStep = jQuery(this).attr("data-num");

          var nextStep = parseInt(getNextStep) + 1;



          console.log(nextStep);



          jQuery("." + getDataStep + "").fadeOut(400)

          jQuery(".step" + nextStep + "").delay(400).fadeIn(800);



        });



      });



    });
  </script>