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

  $post_id = get_the_ID();
$verifiyRegId =0;

  $v = '';
  if (!isset($_GET['regId']) || $_GET['regId'] == "") {

    if (isset($_GET['status']) && $_GET['status'] == "success") {
      $link='';

        if($lang == 'en'){
            echo "<div class='successalert'><h2>Thank you for your contribution, well received!</h2></div>";
            $link=home_url("en/our-programs/urban-policy-research/?tab=srd1-tab-pane");
        }
        else{
            echo "<div class='successalert'><h2> شكرا لمساهمتك، استقبالا حسنا!</h2></div>";
            $link=home_url("/برامجنا/برنامج-السياسات-الحضرية/");
        }
        ?>
        <script>
            setTimeout(function() {
                window.location.href = "<?php echo $link; ?>";
            },5000);
        </script>
        <?php
    } else {
        wp_redirect(home_url());
        exit;
    }
} else {
    $verifiyRegId = verifyId($_GET['regId']);
}

  $arabCountries = array(
    array("name" => "Algeria", "abbreviation" => "DZ", "name_ar" => "الجزائر"),
    array("name" => "Bahrain", "abbreviation" => "BH", "name_ar" => "البحرين"),
    array("name" => "Comoros", "abbreviation" => "KM", "name_ar" => "جزر القمر"),
    array("name" => "Djibouti", "abbreviation" => "DJ", "name_ar" => "جيبوتي"),
    array("name" => "Egypt", "abbreviation" => "EG", "name_ar" => "مصر"),
    array("name" => "Iraq", "abbreviation" => "IQ", "name_ar" => "العراق"),
    array("name" => "Jordan", "abbreviation" => "JO", "name_ar" => "الأردن"),
    array("name" => "Kuwait", "abbreviation" => "KW", "name_ar" => "الكويت"),
    array("name" => "Lebanon", "abbreviation" => "LB", "name_ar" => "لبنان"),
    array("name" => "Libya", "abbreviation" => "LY", "name_ar" => "ليبيا"),
    array("name" => "Mauritania", "abbreviation" => "MR", "name_ar" => "موريتانيا"),
    array("name" => "Morocco", "abbreviation" => "MA", "name_ar" => "المغرب"),
    array("name" => "Oman", "abbreviation" => "OM", "name_ar" => "عمان"),
    array("name" => "Palestine", "abbreviation" => "PS", "name_ar" => "فلسطين"),
    array("name" => "Qatar", "abbreviation" => "QA", "name_ar" => "قطر"),
    array("name" => "Saudi Arabia", "abbreviation" => "SA", "name_ar" => "المملكة العربية السعودية"),
    array("name" => "Somalia", "abbreviation" => "SO", "name_ar" => "الصومال"),
    array("name" => "Sudan", "abbreviation" => "SD", "name_ar" => "السودان"),
    array("name" => "Syria", "abbreviation" => "SY", "name_ar" => "سوريا"),
    array("name" => "Tunisia", "abbreviation" => "TN", "name_ar" => "تونس"),
    array("name" => "United Arab Emirates", "abbreviation" => "AE", "name_ar" => "الإمارات العربية المتحدة"),
    array("name" => "Yemen", "abbreviation" => "YE", "name_ar" => "اليمن")
  );




  ?>



 <?php get_header(); ?>



 <header>

   <?php include("../wp-content/themes/audi/template-parts/navigation.php"); ?>

 </header>



 <div data-scroll-container>



   <div id="top"></div>



   <section class="non-vh">



     <div class="spacer-40"></div>

     <div class="spacer-120"></div>



     <div class="container">



       <h1 class="fnt-dark-gray d-flex align-items-center"><img class="img-fluid mar-right-5" src="<?php print get_theme_url(); ?>/img/icons/icon2-gray.svg" /> <?php print forceTranslate(get_field('page_heading', $post_id), get_field('page_heading_ar', $post_id)); ?></h1>

       <p class="fnt-30 fnt-dark-gray"><?php print forceTranslate("Cities", "مدن"); ?></p>



       <?php if ($v == "") { ?>



         <!--English-->

         <?php if ($verifiyRegId == 0) { ?>



           <div class="row">

             <div class="col-md-2"></div>

             <div class="col-md-8">



               <center>
<!-- 
                 <p class="fnt-dark-gray fnt-20">Your Registration Id cannot be verify. Kindly try to register again or contact us for assistance and support via email at <a href="mailto:info@araburban.org">info@araburban.org</a>.</p>

                 <div class="row">

                   <div class="col-2 col-md-4"></div>

                   <div class="col-8 col-md-4">

                     <a href="<?php // print home_url(); ?>/infohub/registration/cities" class="btn btn-primary btn-blue w-100 fnt-20">Register</a>

                   </div>

                   <div class="col-2 col-md-4">

                   </div>

                   <div class="col-12 col-md-2"></div>

                 </div> -->



               </center>



             </div>

             <div class="col-md-2"></div>

           </div>



         <?php } else { ?>





           <div class="infohub-steps">



             <center>

               <h2 class="fnt-dark-gray">FORM FOR FILLING CITY PAGE</h2>

             </center>



             <div class="spacer-20"></div>



             <p class="fnt-dark-gray fnt-20">This form aims to provide information about Arab cities, to be shared on a page dedicated to CITIES on AUDI’s Arab Urban Development Portal. Each city page is filled out by an authorized person on behalf of the municipality or local authority in charge of the city.</p>



             <div class="spacer-20"></div>



             <a href="#" class="btn btn-primary btn-blue fnt-20 step-button" data-step="step1" data-num="1" onClick="return false;">
             <?php print forceTranslate('Next','التالي'); ?></a>



           </div>



           <div class="step2">



             <ul class="nav nav-tabs nav-pills nav-fill" id="infohub-city-post-tabs">



               <?php for ($tabsBtn = 1; $tabsBtn < 8; $tabsBtn++) { ?>



                 <?php

                  $active = "";

                  $hrTransFirst = "";

                  $hrTransLast = "";



                  if ($tabsBtn == 1) {

                    $active = "active";

                    $hrTransFirst = "hrTrans";
                  }



                  if ($tabsBtn == 7) {

                    $hrTransLast = "hrTrans";
                  }

                  ?>



                 <li class="nav-item">

                   <button class="nav-link <?php print $active; ?>" data-bs-toggle="tab" data-bs-target="#city-step<?php print $tabsBtn; ?>">

                     <div class="d-flex align-items-center">

                       <hr class="<?php print $hrTransFirst; ?>">

                       <i class="fa-solid fa-square"></i>

                       <hr class="<?php print $hrTransLast; ?>">

                     </div>

                     <p><?php print $tabsBtn; ?></p>

                   </button>

                 </li>



               <?php } ?>



             </ul>



             <div class="spacer-40"></div>



             <form id="cityforms" method="post" action="" enctype="multipart/form-data">

               <?php wp_nonce_field('my_update_attachment_nonce', 'my_update_attachment_nonce'); ?>


               <div id="infohub-city-post-content" class="tab-content">



                 <!--step1-->

                 <div id="city-step1" class="tab-pane fade show active">



                   <h3 class="fnt-blue"><?php print forceTranslate(get_field('section_1_heading', $post_id), get_field('section_1_heading_ar', $post_id)); ?></h3>

                   <div class="spacer-40"></div>



                   <div class="infohub-city-form">



                     <label><?php print forceTranslate(get_field('label_country', $post_id), get_field('label_country_ar', $post_id)); ?></label>

                     <select name="country" id="country" class="form-control selectpicker" data-live-search="true" onchange="getCountryCity('country');" required>

                       <option value="0"> <?php print forceTranslate(get_field('country_input', $post_id), get_field('country_input_ar', $post_id)); ?></option>
                       <?php
                        foreach ($arabCountries as $arab) {
                        ?>

                         <option value="<?php echo $arab['abbreviation'] ?>"><?php echo $lang == 'en' ? $arab['name'] : $arab['name_ar']; ?></option>

                       <?php

                        }

                        ?>

                     </select>



                     <label><?php print forceTranslate("City","اسم المدينة")?></label>
                     <div class="d-flex">
                       <select name="city" id="city" class="form-control selectpicker" data-live-search="true" disabled>

                         <option value=""><?php print forceTranslate(get_field('city_labels', $post_id), get_field('city_labels_ar', $post_id)); ?></option>

                         <?php
                          // $args = array(
                          //   'post_type' => 'city', // Adjust post type as needed
                          //   'posts_per_page' => -1, // Set to -1 to retrieve all matching posts
                          // );
                          // $category_id = 1051; // Replace with your actual category ID
                          // $child_categories = get_terms(array(
                          //   'taxonomy' => 'category',
                          //   'parent' => $category_id,
                          //   'hide_empty' => false, // Set to false to include empty categories
                          // ));

                          // $category_names = array();

                          // foreach ($child_categories as $child_category) {
                          //   $category_names[] = $child_category->name;
                          // }
                          // $query = new WP_Query($args);
                          // if ($query->have_posts()) {
                          //   while ($query->have_posts()) {
                          //     $query->the_post();
                          //     // Your loop content goes here
                          //     $id = get_the_ID();
                          //     $country = get_field("country", $id);
                          //     $title = esc_html(get_the_title());
                          //     if (in_array($country["value"], array_column($arabCountries, "abbreviation"))) {
                          //       echo '<option value="' . $id . '">' . $title . '</option> ';
                          //     }
                          //     // Other post information...
                          //   }
                          //   wp_reset_postdata();
                          // }

                          // 
                          ?>

                       </select>

                       <input type="text" name="city-others" class="form-control" placeholder="<?php print forceTranslate("Other","اخرى");?>">
                     </div>






                     <label><?php print forceTranslate(get_field('label_official_name', $post_id), get_field('label_official_name_ar', $post_id)); ?></label>

                     <input type="text" name="name-authority" class="form-control" required>



                     <label><?php print forceTranslate(get_field('label_website', $post_id), get_field('label_website_AR', $post_id)); ?></label>

                     <input type="text" name="website" class="form-control">



                     <label><?php print forceTranslate(get_field('label_social_pages_heading', $post_id), get_field('label_social_pages_heading_ar', $post_id)); ?></label>

                     <div class="grp-social">



                       <div class="row grp-1">

                         <div class="col-md-4">


                           <label for="social-link-1"><?php print forceTranslate(get_field('label_facebook', $post_id), get_field('label_facebook_ar', $post_id)); ?></label>
                           <!-- <select name="social-media-1" id="social-media-1" class="form-control selectpicker" data-live-search="true">

                             <option value="">Please Select</option>

                             <option value="">Facebook</option>

                             <option value="">Instagram</option>

                             <option value="">Twitter-X</option>

                             <option value="">Youtube</option>

                             <option value="">Tiktok</option>

                           </select> -->

                         </div>

                         <div class="col-md-8">

                           <input type="text" id="social-link-1" name="social-link-1" class="form-control" placeholder="<?php print forceTranslate(get_field('input_facebook_link', $post_id), get_field('input_facebook_link_ar', $post_id)); ?>">

                         </div>

                       </div>



                       <div class="row grp-2">

                         <div class="col-md-4">

                           <label for="social-link-2"><?php print forceTranslate(get_field('label_twitter', $post_id), get_field('label_twitter_ar', $post_id)); ?></label>


                         </div>

                         <div class="col-md-8">

                           <input type="text" id="social-link-2" name="social-link-2" class="form-control" placeholder="<?php print forceTranslate(get_field('input_twitter_link', $post_id), get_field('input_twitter_link_ar', $post_id)); ?>">

                         </div>

                       </div>



                       <div class="row grp-3">

                         <div class="col-md-4">

                           <label for="social-link-3"> <?php print forceTranslate(get_field('label_instagram', $post_id), get_field('label_instagram_AR', $post_id)); ?></label>


                         </div>

                         <div class="col-md-8">

                           <input type="text" id="social-link-3" name="social-link-3" class="form-control" placeholder="<?php print forceTranslate(get_field('input_instagram_link', $post_id), get_field('input_instagram_link_ar', $post_id)); ?>">

                         </div>

                       </div>



                       <div class="row grp-4">

                         <div class="col-md-4">

                           <label for="social-link-4"> <?php print forceTranslate(get_field('label_youtube', $post_id), get_field('label_youtube_ar', $post_id)); ?></label>


                         </div>

                         <div class="col-md-8">

                           <input type="text" id="social-link-4" name="social-link-4" class="form-control" placeholder=" <?php print forceTranslate(get_field('input_youtube_link', $post_id), get_field('input_youtube_link_ar', $post_id)); ?>">

                         </div>

                       </div>



                       <div class="row grp-5">

                         <div class="col-md-4">

                           <label for="social-link-5"> <?php print forceTranslate(get_field('label_linkedin', $post_id), get_field('label_linkedin_ar', $post_id)); ?></label>


                         </div>

                         <div class="col-md-8">

                           <input type="text" id="social-link-5" name="social-link-5" class="form-control" placeholder="<?php print forceTranslate(get_field('input_linked_link', $post_id), get_field('input_linked_link_ar', $post_id)); ?>">

                         </div>

                       </div>



                     </div>



                     <div class="spacer-40"></div>



                     <a class="btn-nav-link btn btn-primary btn-blue fnt-20" onClick="return false;" data-info-target="#city-step2">
                     <?php print forceTranslate('Next','التالي'); ?></a></a>



                   </div>



                 </div>



                 <!--step2-->

                 <div id="city-step2" class="tab-pane fade">



                   <h3 class="fnt-blue"><?php print forceTranslate(get_field('section_2_heading', $post_id), get_field('section_2_heading_ar', $post_id)); ?></h3>

                   <div class="spacer-40"></div>



                   <div class="infohub-city-form">



                     <label>

                       <p><?php print forceTranslate(get_field('label_geo_situation_', $post_id), get_field('label_geo_situation_ar', $post_id)); ?></p>



                       <p><small><?php print forceTranslate(get_field('_geo_e-text', $post_id), get_field('lebel_explanation_text_ar', $post_id)); ?></small></p>



                       <p><small><?php print forceTranslate(get_field('_geo_note', $post_id), get_field('label_of_note_ar', $post_id)); ?></small></p>

                     </label>

                     <textarea name="geo-status" class="form-control" cols="30" rows="10" placeholder="<?php print forceTranslate(get_field('_geo_placeholder', $post_id), get_field('input_placeholder_geo_situation_ar', $post_id)); ?>"></textarea>



                     <label><?php print forceTranslate(get_field('label_attachment_map_file', $post_id), get_field('label_attachment_map_file_ar', $post_id)); ?>
                       <small class="fnt-12"><?php print forceTranslate("Upload PNG / JPEG (1mb file size)", "تحميل PNG / JPEG (حجم الملف 1 ميجابايت)"); ?></small></label>

                     <input class="form-control" name="boundary" type="file" id="boundary">



                     <label><?php print forceTranslate(get_field('label_attachment_photos', $post_id), get_field('label_attachment_photos_ar', $post_id)); ?>
                       <small class="fnt-12"><?php print forceTranslate("Upload PNG / JPEG (1mb file size)", "تحميل PNG / JPEG (حجم الملف 1 ميجابايت)"); ?></small></label>

                     <div class="grp-city-img">



                       <div class="row grp1">

                         <div class="col-md-4">

                           <input class="form-control" name="city-img1" type="file" id="city-img1">

                         </div>

                         <div class="col-md-4">

                           <input class="form-control" name="city-title1" type="text" id="city-title1" placeholder="<?php print forceTranslate(get_field('label_image_placeholder', $post_id), get_field('label_image_placeholder_ar', $post_id)); ?>">

                         </div>

                         <div class="col-md-4">

                           <input class="form-control" name="city-source1" type="text" id="city-source1" placeholder="<?php print forceTranslate(get_field('label_link_placeholder', $post_id), get_field('label_link_placeholder_ar', $post_id)); ?>">

                         </div>

                       </div>



                       <div class="row grp2">

                         <div class="col-md-4">

                           <input class="form-control" name="city-img2" type="file" id="city-img2">

                         </div>

                         <div class="col-md-4">

                           <input class="form-control" name="city-title2" type="text" id="city-title2" placeholder="<?php print forceTranslate(get_field('label_image_placeholder2', $post_id), get_field('label_image_placeholder2_ar', $post_id));?>">

                         </div>

                         <div class="col-md-4">

                           <input class="form-control" name="city-source2" type="text" id="city-source" 2 placeholder="<?php print forceTranslate(get_field('label_link_placeholder2', $post_id), get_field('label_link_placeholder2_ar', $post_id)); ?>">

                         </div>

                       </div>



                       <div class="row grp3">

                         <div class="col-md-4">

                           <input class="form-control" name="city-img3" type="file" id="city-img3">

                         </div>

                         <div class="col-md-4">

                           <input class="form-control" name="city-title3" type="text" id="city-title3" placeholder="<?php print forceTranslate(get_field('label_image_placeholder3', $post_id), get_field('label_image_placeholder3_ar', $post_id));?>">

                         </div>

                         <div class="col-md-4">

                           <input class="form-control" name="city-source3" type="text" id="city-source3" placeholder="<?php print forceTranslate(get_field('label_link_placeholder3', $post_id), get_field('label_link_placeholder3_ar', $post_id)); ?>">

                         </div>

                       </div>



                       <div class="row grp4">

                         <div class="col-md-4">

                           <input class="form-control" name="city-img4" type="file" id="city-img4">

                         </div>

                         <div class="col-md-4">

                           <input class="form-control" name="city-title4" type="text" id="city-title4" placeholder="<?php print forceTranslate(get_field('label_image_placeholder4', $post_id), get_field('label_image_placeholder4_ar', $post_id)); ?>">

                         </div>

                         <div class="col-md-4">

                           <input class="form-control" name="city-source4" type="text" id="city-source4" placeholder="<?php print forceTranslate(get_field('label_link_placeholder4', $post_id), get_field('label_link_placeholder4_ar', $post_id)); ?>">

                         </div>

                       </div>



                       <div class="row grp5">

                         <div class="col-md-4">

                           <input class="form-control" name="city-img5" type="file" id="city-img5">

                         </div>

                         <div class="col-md-4">

                           <input class="form-control" name="city-title5" type="text" id="city-title5" placeholder="<?php print forceTranslate(get_field('label_image_placeholder5', $post_id), get_field('label_image_placeholder5_ar', $post_id)); ?>">

                         </div>

                         <div class="col-md-4">

                           <input class="form-control" name="city-source5" type="text" id="city-source5" placeholder="<?php print forceTranslate(get_field('label_link_placeholder5', $post_id), get_field('label_link_placeholder5_ar', $post_id)); ?>">

                         </div>

                       </div>





                     </div>

                   </div>



                   <div class="spacer-40"></div>

                   <a class="btn-nav-link btn btn-primary btn-blue fnt-20" onClick="return false;" data-info-target="#city-step1">
                   <?php print forceTranslate('Back','رجوع'); ?></a>

                   <a class="btn-nav-link btn btn-primary btn-blue fnt-20" onClick="return false;" data-info-target="#city-step3">
                   <?php print forceTranslate('Next','التالي'); ?></a></a>



                 </div>



                 <!--step3-->

                 <div id="city-step3" class="tab-pane fade">



                   <h3 class="fnt-blue"><?php print forceTranslate(get_field('section_3_heading', $post_id), get_field('section_3_heading_ar', $post_id)); ?></h3>

                   <div class="spacer-40"></div>



                   <div class="infohub-city-form">

                     <label><?php print forceTranslate(get_field('label_city_size', $post_id), get_field('label_city_size_ar', $post_id));  ?></label>

                     <select name="city-size" id="city-size" class="form-control selectpicker" data-live-search="true">
                     <option value=""><?php print forceTranslate(get_field('city_input', $post_id), get_field('city_placeholder__ar', $post_id)) ?></option>


                       <?php $orgtype = get_field_object('field_65aa3ca620185');
                        if ($orgtype['choices']) {
                          
                          foreach ($orgtype['choices'] as $value => $label) {
                            if($value!=0){
                              echo "<option value='$value'>$label</option>";
                            
                            }
                            
                          }
                        }
                        ?>

                     </select>



                     <label>

                       <p><?php print forceTranslate(get_field('_label_demo_situation', $post_id), get_field('_label_demo_situation_ar', $post_id)); ?></p>



                       <p><small><?php print forceTranslate(get_field('demo_e-text', $post_id), get_field('demo_e-text_ar', $post_id)); ?></small></p>



                       <p><small><?php print forceTranslate(get_field('demo_note', $post_id), get_field('demo_note_ar', $post_id));?></small></p>

                     </label>

                     <textarea name="demo-status" class="form-control" cols="30" rows="10" placeholder="<?php print forceTranslate(get_field('d-placeholder', $post_id), get_field('d-placeholder_ar', $post_id)); ?>"></textarea>

                   </div>



                   <div class="spacer-40"></div>

                   <a class="btn-nav-link btn btn-primary btn-blue fnt-20" onClick="return false;" data-info-target="#city-step2">
                   <?php print forceTranslate('Back','رجوع'); ?></a>

                   <a class="btn-nav-link btn btn-primary btn-blue fnt-20" onClick="return false;" data-info-target="#city-step4">
                   <?php print forceTranslate('Next','التالي'); ?></a></a>



                 </div>



                 <!--step4-->

                 <div id="city-step4" class="tab-pane fade">



                   <h3 class="fnt-blue"><?php print forceTranslate(get_field('section_4_heading', $post_id), get_field('section_4_heading_ar', $post_id)); ?></h3>

                   <div class="spacer-40"></div>



                   <div class="infohub-city-form">

                     <label>

                       <p><?php print forceTranslate(get_field('label_env_situation', $post_id), get_field('label_env_situation_ar', $post_id)); ?></p>



                       <p><small><?php print forceTranslate(get_field('env_e-text', $post_id), get_field('env_e-text_ar', $post_id)); ?></small></p>



                       <p><small><?php print forceTranslate(get_field('env_note', $post_id), get_field('env_note_ar', $post_id));  ?></small></p>

                     </label>

                     <textarea name="envi-status" class="form-control" cols="30" rows="10" placeholder="<?php print forceTranslate(get_field('env_placeholder', $post_id), get_field('env_placeholder_ar', $post_id));  ?>"></textarea>



                   </div>



                   <div class="spacer-40"></div>

                   <a class="btn-nav-link btn btn-primary btn-blue fnt-20" onClick="return false;" data-info-target="#city-step3">
                   <?php print forceTranslate('Back','رجوع'); ?></a>

                   <a class="btn-nav-link btn btn-primary btn-blue fnt-20" onClick="return false;" data-info-target="#city-step5">
                   <?php print forceTranslate('Next','التالي'); ?></a></a>



                 </div>



                 <!--step5-->

                 <div id="city-step5" class="tab-pane fade">



                   <h3 class="fnt-blue"><?php print forceTranslate(get_field('section_5_heading_', $post_id), get_field('section_5_heading_ar', $post_id)); ?></h3>

                   <div class="spacer-40"></div>



                   <div class="infohub-city-form">



                     <label>

                       <p><?php print forceTranslate(get_field('label_eco_situation', $post_id), get_field('label_eco_situation_ar', $post_id)); ?></p>



                       <p><small><?php print forceTranslate(get_field('eco_e-text', $post_id), get_field('eco_e-text_ar', $post_id)); ?></small></p>



                       <p><small><?php print forceTranslate(get_field('eco_note', $post_id), get_field('eco_note_ar', $post_id)); ?></small></p>

                     </label>

                     <textarea name="econi-status" class="form-control" cols="30" rows="10" placeholder="<?php print forceTranslate(get_field('eco_placeholder', $post_id), get_field('eco_placeholder_ar', $post_id)); ?>"></textarea>



                   </div>



                   <div class="spacer-40"></div>

                   <a class="btn-nav-link btn btn-primary btn-blue fnt-20" onClick="return false;" data-info-target="#city-step4">
                   <?php print forceTranslate('Back','رجوع'); ?></a>

                   <a class="btn-nav-link btn btn-primary btn-blue fnt-20" onClick="return false;" data-info-target="#city-step6">
                   <?php print forceTranslate('Next','التالي'); ?></a></a>



                 </div>



                 <!--step6-->

                 <div id="city-step6" class="tab-pane fade">



                   <h3 class="fnt-blue"><?php print forceTranslate(get_field('section_6_heading_', $post_id), get_field('section_6_heading_ar', $post_id)); ?></h3>

                   <div class="spacer-40"></div>



                   <div class="infohub-city-form">



                     <label>

                       <p><?php print forceTranslate(get_field('label_hou_situation', $post_id), get_field('label_hou_situation_ar', $post_id)); ?></p>



                       <p><small><?php print forceTranslate(get_field('hou_e-text', $post_id), get_field('hou_e-text_ar', $post_id)); ?></small></p>



                       <p><small><?php print forceTranslate(get_field('hou_note', $post_id), get_field('hou_note_ar', $post_id)); ?></small></p>

                     </label>

                     <textarea name="housing-status" class="form-control" cols="30" rows="10" placeholder="<?php print forceTranslate(get_field('hou_placeholder', $post_id), get_field('hou_placeholder_ar', $post_id)); ?>"></textarea>



                   </div>



                   <div class="spacer-40"></div>

                   <a class="btn-nav-link btn btn-primary btn-blue fnt-20" onClick="return false;" data-info-target="#city-step5">
                   <?php print forceTranslate('Back','رجوع'); ?></a>

                   <a class="btn-nav-link btn btn-primary btn-blue fnt-20" onClick="return false;" data-info-target="#city-step7">
                   <?php print forceTranslate('Next','التالي'); ?></a></a>



                 </div>



                 <!--step7-->

                 <div id="city-step7" class="tab-pane fade">



                   <h3 class="fnt-blue"><?php print forceTranslate(get_field('section_7_heading', $post_id), get_field('section_7_heading_ar', $post_id));?></h3>

                   <div class="spacer-40"></div>



                   <div class="infohub-city-form">



                     <label>

                       <p><?php print forceTranslate(get_field('label_mob_situation', $post_id), get_field('label_for_mob_situation_ar', $post_id)); ?></p>



                       <p><small><?php print forceTranslate(get_field('mob_e-text', $post_id), get_field('mob_e-text_ar', $post_id)); ?></small></p>



                       <p><small><?php print forceTranslate(get_field('mob_note', $post_id), get_field('mob_note_ar', $post_id)); ?></small></p>

                     </label>

                     <textarea name="mobil-status" class="form-control" cols="30" rows="10" placeholder="<?php print forceTranslate(get_field('mob_placeholder', $post_id), get_field('mob_placeholder_ar_', $post_id)); ?>"></textarea>



                   </div>



                   <div class="spacer-40"></div>

                   <a class="btn-nav-link btn btn-primary btn-blue fnt-20" onClick="return false;" data-info-target="#city-step6">
                   <?php print forceTranslate('Back','رجوع'); ?>
                   </a>

                   <input type="submit" class="btn btn-primary btn-blue fnt-20" value="<?php print forceTranslate('Submit','إرسال'); ?>">




                 </div>



               </div>



             </form>



           <?php } ?>



         <?php } ?>













           </div>



           <div class="spacer-120"></div>

   </section>







   <?php get_footer(); ?>



   <script>
     function getCountryCity(selectId) {

       var getVal = jQuery("#" + selectId + "").val();
       console.log(getVal);
       var fd = new FormData();
       fd.append("action", "getCitySelect");
       fd.append("data", getVal);

       jQuery.ajax({
         type: "POST",
         url: "/wp-admin/admin-ajax.php",
         processData: false,
         contentType: false,
         data: fd,
         success: function(data) {

           //console.log(data);


           jQuery("#city").empty();
           jQuery("#city").removeAttr("disabled");
           jQuery("#city").append(data);
           jQuery('#city').selectpicker('refresh');


         }



       });

     }
     jQuery(document).ready(function() {



       jQuery(".step-button").each(function() {



         jQuery(this).on("click touch", function() {



           var getDataStep = jQuery(this).attr("data-step");

           var getNextStep = jQuery(this).attr("data-num");

           var nextStep = parseInt(getNextStep) + 1;



           console.log(nextStep);



           jQuery("." + getDataStep + "").fadeOut(400);

           jQuery(".step" + nextStep + "").delay(400).fadeIn(800);



         });



       });



       jQuery(".btn-nav-link").each(function() {



         jQuery(this).on("click touch", function() {



           var getDataId = jQuery(this).attr("data-info-target");



           jQuery(".nav-link[data-bs-target='" + getDataId + "']").trigger("click");

           jQuery("#gotop").trigger("click");



         });



       });







     });
   </script>