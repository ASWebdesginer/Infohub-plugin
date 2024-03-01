 <?php /* Template Name: Infohub Cities Form Page */ ?>

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
 * @package jobs
 */

$lang = pll_current_language();
$postId = get_the_ID();

if(!isset($_GET['regId']) || $_GET['regId'] == ""){
  wp_redirect(home_url());
  exit;

}else{

  $verifiyRegId = verifyId($_GET['regId']);

}


?>

<?php get_header(); ?>

<header>
  <?php include ("../wp-content/themes/audi/template-parts/navigation.php");?>
</header>

  <div data-scroll-container>

    <div id="top"></div>

    <section class="non-vh">

      <div class="spacer-40"></div>
      <div class="spacer-120"></div>

      <div class="container">

        <h1 class="fnt-dark-gray d-flex align-items-center"><img class="img-fluid mar-right-5" src="<?php print get_theme_url();?>/img/icons/icon2-gray.svg" /> <?php print forceTranslate("Arab Urban Development Portal","Arab Urban Development Portal");?></h1>
        <p class="fnt-30 fnt-dark-gray">Cities</p>

        <?php if($lang == "en"){ ?>

          <!--English-->
          <?php if($verifiyRegId == 0){ ?>

            <div class="row">
              <div class="col-md-2"></div>
              <div class="col-md-8">
                
                <center>
                  <p class="fnt-dark-gray fnt-20">Your Registration Id cannot be verify. Kindly try to register again or contact us for assistance and support via email at <a href="mailto:info@araburban.org">info@araburban.org</a>.</p>
                  <div class="row">
                    <div class="col-2 col-md-4"></div>
                    <div class="col-8 col-md-4">
                      <a href="<?php print home_url();?>/infohub/registration/cities" class="btn btn-primary btn-blue w-100 fnt-20">Register</a>
                    </div>
                    <div class="col-2 col-md-4">
                    </div>
                    <div class="col-12 col-md-2"></div>
                  </div>

                </center>

              </div>
              <div class="col-md-2"></div>
            </div>             

          <?php }else{ ?>


          <div class="infohub-steps">

              <center>
                <h2 class="fnt-dark-gray">FORM FOR FILLING CITY PAGE</h2>
              </center>

              <div class="spacer-20"></div>

              <p class="fnt-dark-gray fnt-20">This form aims to provide information about Arab cities, to be shared on a page dedicated to CITIES on AUDI’s Arab Urban Development Portal. Each city page is filled out by an authorized person on behalf of the municipality or local authority in charge of the city.</p>

              <div class="spacer-20"></div>

              <a href="#" class="btn btn-primary btn-blue fnt-20 step-button" data-step="step1" data-num="1" onClick="return false;">Next</a>               
              
          </div>

          <div class="step2">

              <ul class="nav nav-tabs nav-pills nav-fill" id="infohub-city-post-tabs">

                <?php for ($tabsBtn=1; $tabsBtn<8; $tabsBtn++) { ?>

                  <?php 
                    $active = "";
                    $hrTransFirst = "";
                    $hrTransLast = "";

                    if($tabsBtn == 1){
                      $active = "active";
                      $hrTransFirst = "hrTrans";
                    }

                    if($tabsBtn == 7){
                      $hrTransLast = "hrTrans";
                    }
                  ?>

                    <li class="nav-item">
                      <button class="nav-link <?php print $active;?>" data-bs-toggle="tab" data-bs-target="#city-step<?php print $tabsBtn;?>">
                        <div class="d-flex align-items-center">
                          <hr class="<?php print $hrTransFirst;?>">
                          <i class="fa-solid fa-square"></i>
                          <hr class="<?php print $hrTransLast;?>">
                        </div>
                         <p><?php print $tabsBtn;?></p>
                      </button>
                    </li>

                <?php }?>
                                                                                              
              </ul>  

              <div class="spacer-40"></div> 
              
              <form action="">

                <div id="infohub-city-post-content" class="tab-content">

                  <!--step1-->
                  <div id="city-step1" class="tab-pane fade show active">

                    <h3 class="fnt-blue">General Information About the City</h3>
                    <div class="spacer-40"></div>

                    <div class="infohub-city-form">

                      <label>1. Country Name</label>
                      <select name="country" id="country" class="form-control selectpicker" data-live-search="true">
                        <option value="">Please Select</option>
                        <option value="">ertert</option>
                        <option value="">ghjghj</option>
                      </select>

                      <label>2. City Name</label>
                      <select name="city" id="city" class="form-control selectpicker" data-live-search="true">
                        <option value="">Please Select</option>
                        <option value="">ertert</option>
                        <option value="">ghjghj</option>
                      </select>
                      <input type="text" name="city-others" class="form-control hideThis"> 


                      <label>3. Official Name of the Local Authority</label>
                      <input type="text" name="name-authority" class="form-control"> 

                      <label>4. Website</label>
                      <input type="text" name="website" class="form-control"> 

                      <label>5. Social Media Pages</label>
                      <div class="grp-social">

                        <div class="row grp-1">
                          <div class="col-md-4">
                            <select name="social-media-1" id="social-media-1" class="form-control selectpicker" data-live-search="true">
                              <option value="">Please Select</option>
                              <option value="">Facebook</option>
                              <option value="">Instagram</option>
                              <option value="">Twitter-X</option>
                              <option value="">Youtube</option>
                              <option value="">Tiktok</option>
                            </select>                           
                          </div>
                          <div class="col-md-8">
                            <input type="text" id="social-link-1" name="social-link-1" class="form-control" placeholder="Link of selected Social Media Page">
                          </div>
                        </div>

                        <div class="row grp-2">
                          <div class="col-md-4">
                            <select name="social-media-2" id="social-media-2" class="form-control selectpicker" data-live-search="true">
                              <option value="">Please Select</option>
                              <option value="">Facebook</option>
                              <option value="">Instagram</option>
                              <option value="">Twitter-X</option>
                              <option value="">Youtube</option>
                              <option value="">Tiktok</option>
                            </select>                           
                          </div>
                          <div class="col-md-8">
                            <input type="text" id="social-link-2" name="social-link1" class="form-control" placeholder="Link of selected Social Media Page">
                          </div>
                        </div> 

                        <div class="row grp-3">
                          <div class="col-md-4">
                            <select name="social-media-3" id="social-media-3" class="form-control selectpicker" data-live-search="true">
                              <option value="">Please Select</option>
                              <option value="">Facebook</option>
                              <option value="">Instagram</option>
                              <option value="">Twitter-X</option>
                              <option value="">Youtube</option>
                              <option value="">Tiktok</option>
                            </select>                           
                          </div>
                          <div class="col-md-8">
                            <input type="text" id="social-link-3" name="social-link1" class="form-control" placeholder="Link of selected Social Media Page">
                          </div>
                        </div>

                        <div class="row grp-4">
                          <div class="col-md-4">
                            <select name="social-media-4" id="social-media-4" class="form-control selectpicker" data-live-search="true">
                              <option value="">Please Select</option>
                              <option value="">Facebook</option>
                              <option value="">Instagram</option>
                              <option value="">Twitter-X</option>
                              <option value="">Youtube</option>
                              <option value="">Tiktok</option>
                            </select>                           
                          </div>
                          <div class="col-md-8">
                            <input type="text" id="social-link-4" name="social-link1" class="form-control" placeholder="Link of selected Social Media Page">
                          </div>
                        </div> 

                        <div class="row grp-5">
                          <div class="col-md-4">
                            <select name="social-media-5" id="social-media-5" class="form-control selectpicker" data-live-search="true">
                              <option value="">Please Select</option>
                              <option value="">Facebook</option>
                              <option value="">Instagram</option>
                              <option value="">Twitter-X</option>
                              <option value="">Youtube</option>
                              <option value="">Tiktok</option>
                            </select>                           
                          </div>
                          <div class="col-md-8">
                            <input type="text" id="social-link-5" name="social-link1" class="form-control" placeholder="Link of selected Social Media Page">
                          </div>
                        </div>                                                                                               
                                          
                      </div>

                      <div class="spacer-40"></div>

                      <a class="btn-nav-link btn btn-primary btn-blue fnt-20" onClick="return false;" data-info-target="#city-step2">Next</a>

                    </div> 

                  </div> 

                  <!--step2-->
                  <div id="city-step2" class="tab-pane fade">
                    
                    <h3 class="fnt-blue">Geographic Location and Area</h3>
                    <div class="spacer-40"></div>

                    <div class="infohub-city-form">

                      <label>
                        <p>6. Kindly provide information about the geographical situation of the city.</p>

                        <p><small>(This information may include: the area of the city, the name of the geographical region where the city is located, the most prominent neighborhoods in the city, its most prominent landmarks, and anything else you deem appropriate).</small></p>

                        <p><small>Note: Kindly specify the date and source of the information if possible.</small></p>
                      </label>
                      <textarea name="geo-status" class="form-control" cols="30" rows="10" placeholder="Answer (Approx. 250 words)"></textarea>

                      <label>7. Share a map showing the administrative boundary of your city | <small class="fnt-12">Upload PNG / JPEG (1mb file size)</small></label>
                      <input class="form-control" name="boundary" type="file" id="boundary">

                      <label>8. Attach Photos of your city | <small class="fnt-12">Upload PNG / JPEG (1mb file size)</small></label>
                      <div class="grp-city-img">

                        <div class="row grp1">
                          <div class="col-md-4">
                            <input class="form-control" name="city-img1" type="file" id="city-img1">
                          </div>
                          <div class="col-md-4">
                            <input class="form-control" name="city-title1" type="text" id="city-title1" placeholder="Write a title for the image here">
                          </div>
                          <div class="col-md-4">
                            <input class="form-control" name="city-source1" type="text" id="city-source1" placeholder="Write the source for the image (link | optional)">
                          </div>
                        </div>

                        <div class="row grp2">
                          <div class="col-md-4">
                            <input class="form-control" name="city-img1" type="file" id="city-img">
                          </div>
                          <div class="col-md-4">
                            <input class="form-control" name="city-title2" type="text" id="city-title2" placeholder="Write a title for the image here">
                          </div>
                          <div class="col-md-4">
                            <input class="form-control" name="city-source2" type="text" id="city-source"2 placeholder="Write the source for the image (link | optional)">
                          </div>
                        </div>

                        <div class="row grp3">
                          <div class="col-md-4">
                            <input class="form-control" name="city-img3" type="file" id="city-img3">
                          </div>
                          <div class="col-md-4">
                            <input class="form-control" name="city-title3" type="text" id="city-title3" placeholder="Write a title for the image here">
                          </div>
                          <div class="col-md-4">
                            <input class="form-control" name="city-source3" type="text" id="city-source3" placeholder="Write the source for the image (link | optional)">
                          </div>
                        </div>

                        <div class="row grp4">
                          <div class="col-md-4">
                            <input class="form-control" name="city-img4" type="file" id="city-img4">
                          </div>
                          <div class="col-md-4">
                            <input class="form-control" name="city-title4" type="text" id="city-title4" placeholder="Write a title for the image here">
                          </div>
                          <div class="col-md-4">
                            <input class="form-control" name="city-source4" type="text" id="city-source4" placeholder="Write the source for the image (link | optional)">
                          </div>
                        </div>

                        <div class="row grp5">
                          <div class="col-md-4">
                            <input class="form-control" name="city-img5" type="file" id="city-img5">
                          </div>
                          <div class="col-md-4">
                            <input class="form-control" name="city-title5" type="text" id="city-title5" placeholder="Write a title for the image here">
                          </div>
                          <div class="col-md-4">
                            <input class="form-control" name="city-source5" type="text" id="city-source5" placeholder="Write the source for the image (link | optional)">
                          </div>
                        </div>                                                                          


                      </div>
                    </div>

                    <div class="spacer-40"></div>
                    <a class="btn-nav-link btn btn-primary btn-blue fnt-20" onClick="return false;" data-info-target="#city-step1">Back</a>
                    <a class="btn-nav-link btn btn-primary btn-blue fnt-20" onClick="return false;" data-info-target="#city-step3">Next</a>

                  </div> 

                  <!--step3-->
                  <div id="city-step3" class="tab-pane fade">
                    
                    <h3 class="fnt-blue">City Demographics</h3>
                    <div class="spacer-40"></div>

                    <div class="infohub-city-form">
                      <label>9. What is the city’s size?</label>
                      <select name="city-size" id="city-size" class="form-control selectpicker" data-live-search="true">
                        <option value="">Please Select</option>
                        <option value="">ertert</option>
                        <option value="">ghjghj</option>
                      </select>  

                      <label>
                        <p>6. Kindly provide information about the demographic situation of the city.</p>

                        <p><small>(This information may include: the annual percentage of population growth, expected population number in 2030, population distribution by gender, population distribution by age group, population distribution by income, percentage of foreigners among residents, and anything else you deem appropriate.)</small></p>

                        <p><small>Note: Kindly specify the date and source of the information if possible</small></p>
                      </label>
                      <textarea name="demo-status" class="form-control" cols="30" rows="10" placeholder="Answer (Approx. 250 words)"></textarea>
                    </div>

                    <div class="spacer-40"></div>
                    <a class="btn-nav-link btn btn-primary btn-blue fnt-20" onClick="return false;" data-info-target="#city-step2">Back</a>
                    <a class="btn-nav-link btn btn-primary btn-blue fnt-20" onClick="return false;" data-info-target="#city-step4">Next</a> 

                  </div>  

                  <!--step4-->             
                  <div id="city-step4" class="tab-pane fade">

                    <h3 class="fnt-blue">Environmental Situation</h3>
                    <div class="spacer-40"></div>

                    <div class="infohub-city-form">
                      <label>
                        <p>11. Kindly provide information about the environmental situation of the city.</p>

                        <p><small>(This information may include: topographical characteristics, nature of the climate, water situation, green spaces situation, most prominent environmental projects, and anything else you deem appropriate.)</small></p>

                        <p><small>Note: Kindly specify the date and source of the information if possible</small></p>
                      </label>
                      <textarea name="envi-status" class="form-control" cols="30" rows="10" placeholder="Answer (Approx. 250 words)"></textarea>

                    </div>

                    <div class="spacer-40"></div>
                    <a class="btn-nav-link btn btn-primary btn-blue fnt-20" onClick="return false;" data-info-target="#city-step3">Back</a>
                    <a class="btn-nav-link btn btn-primary btn-blue fnt-20" onClick="return false;" data-info-target="#city-step5">Next</a>                                         

                  </div> 

                  <!--step5-->
                  <div id="city-step5" class="tab-pane fade">
                    
                    <h3 class="fnt-blue">City Economy</h3>
                    <div class="spacer-40"></div>

                    <div class="infohub-city-form">

                    <label>
                      <p>12. Kindly provide information about the economic situation of the city.</p>

                      <p><small>(This information may include: the most prominent economic activities and their distribution across sectors, the most prominent initiatives and projects to drive local economic development in the city, and anything else you deem appropriate.)</small></p>

                      <p><small>Note: Kindly specify the date and source of the information if possible</small></p>
                      </label>
                      <textarea name="envi-status" class="form-control" cols="30" rows="10" placeholder="Answer (Approx. 250 words)"></textarea>

                    </div>

                    <div class="spacer-40"></div>
                    <a class="btn-nav-link btn btn-primary btn-blue fnt-20" onClick="return false;" data-info-target="#city-step4">Back</a>
                    <a class="btn-nav-link btn btn-primary btn-blue fnt-20" onClick="return false;" data-info-target="#city-step6">Next</a>

                  </div> 

                  <!--step6-->
                  <div id="city-step6" class="tab-pane fade">

                    <h3 class="fnt-blue">Housing in the City</h3>
                    <div class="spacer-40"></div>

                    <div class="infohub-city-form">

                    <label>
                      <p>13. Kindly provide information about the housing situation in the city.</p>

                      <p><small>(This information may include: total number of dwellings, percentage of rented units, percentage of informal housing, most prominent housing initiatives and projects in the city, and anything else you deem appropriate.)</small></p>

                      <p><small>Note: Kindly specify the date and source of the information if possible</small></p>
                    </label>
                    <textarea name="housing-status" class="form-control" cols="30" rows="10" placeholder="Answer (Approx. 250 words)"></textarea>

                    </div>

                    <div class="spacer-40"></div>
                    <a href="#" class="btn-nav-link btn btn-primary btn-blue fnt-20" onClick="return false;" data-info-target="#city-step5">Back</a>
                    <a href="#" class="btn-nav-link btn btn-primary btn-blue fnt-20" onClick="return false;" data-info-target="#city-step7">Next</a>                    

                  </div> 

                  <!--step7-->
                  <div id="city-step7" class="tab-pane fade">
                    
                    <h3 class="fnt-blue">Transportation and Mobility in the City</h3>
                    <div class="spacer-40"></div>

                    <div class="infohub-city-form">

                    <label>
                      <p>14. Kindly provide information about the transport and mobility situation in the city.</p>

                      <p><small>(This may include information on: major roads, total length of the road network, prominent transportation facilities (airports, seaports, train stations etc.) and information about them, the percentages of transportation modes in the city in terms of the number of users (private car, taxi, buses, metro, tram, bicycles, walking, etc.), major transport and mobility projects in the city, and anything else you deem relevant.)</small></p>

                      <p><small>Note: Kindly specify the date and source of the information if possible</small></p>
                      </label>
                      <textarea name="housing-status" class="form-control" cols="30" rows="10" placeholder="Answer (Approx. 250 words)"></textarea>

                    </div>

                    <div class="spacer-40"></div>
                     <a class="btn-nav-link btn btn-primary btn-blue fnt-20" onClick="return false;" data-info-target="#city-step6">Back</a>
                     <a class="btn btn-primary btn-blue fnt-20">Submit</a>    

                  </div> 
            
                </div>         

              </form>

          <?php } ?>

        <?php } ?>

        

        
        

      </div>

      <div class="spacer-120"></div>
    </section>



  <?php get_footer();?>

  <script>
    jQuery(document).ready(function(){

      jQuery(".step-button").each(function(){

          jQuery(this).on("click touch",function(){

            var getDataStep = jQuery(this).attr("data-step");
            var getNextStep = jQuery(this).attr("data-num");
            var nextStep = parseInt(getNextStep) + 1;

            console.log(nextStep);

            jQuery("."+getDataStep+"").fadeOut(400);
            jQuery(".step"+nextStep+"").delay(400).fadeIn(800);

          });

      });

      jQuery(".btn-nav-link").each(function(){

          jQuery(this).on("click touch",function(){

            var getDataId = jQuery(this).attr("data-info-target");

            jQuery(".nav-link[data-bs-target='"+getDataId+"']").trigger("click");
            jQuery("#gotop").trigger("click");

          });

      });

      

    });
  </script>








