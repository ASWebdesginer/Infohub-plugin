<?php /* Template Name : Infohub Organization posting */
?>
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



$frtl = "";
$lang = pll_current_language();
if ($lang == "ar") {
    $frtl = "force-ltr";
}
$post_id = get_the_ID();
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

// List of Arab countries
// $arabCountries = array(
//     array("name" => "Algeria", "abbreviation" => "DZ"),
//     array("name" => "Bahrain", "abbreviation" => "BH"),
//     array("name" => "Comoros", "abbreviation" => "KM"),
//     array("name" => "Djibouti", "abbreviation" => "DJ"),
//     array("name" => "Egypt", "abbreviation" => "EG"),
//     array("name" => "Iraq", "abbreviation" => "IQ"),
//     array("name" => "Jordan", "abbreviation" => "JO"),
//     array("name" => "Kuwait", "abbreviation" => "KW"),
//     array("name" => "Lebanon", "abbreviation" => "LB"),
//     array("name" => "Libya", "abbreviation" => "LY"),
//     array("name" => "Mauritania", "abbreviation" => "MR"),
//     array("name" => "Morocco", "abbreviation" => "MA"),
//     array("name" => "Oman", "abbreviation" => "OM"),
//     array("name" => "Palestine", "abbreviation" => "PS"),
//     array("name" => "Qatar", "abbreviation" => "QA"),
//     array("name" => "Saudi Arabia", "abbreviation" => "SA"),
//     array("name" => "Somalia", "abbreviation" => "SO"),
//     array("name" => "Sudan", "abbreviation" => "SD"),
//     array("name" => "Syria", "abbreviation" => "SY"),
//     array("name" => "Tunisia", "abbreviation" => "TN"),
//     array("name" => "United Arab Emirates", "abbreviation" => "AE"),
//     array("name" => "Yemen", "abbreviation" => "YE")
// );

// if($lang == "ar"){

//     $arabCountries = array(
//         array("name" => "الجزائر", "abbreviation" => "DZ"),
//         array("name" => "البحرين", "abbreviation" => "BH"),
//         array("name" => "جزر القمر", "abbreviation" => "KM"),
//         array("name" => "جيبوتي", "abbreviation" => "DJ"),
//         array("name" => "مصر", "abbreviation" => "EG"),
//         array("name" => "العراق", "abbreviation" => "IQ"),
//         array("name" => "الأردن", "abbreviation" => "JO"),
//         array("name" => "الكويت", "abbreviation" => "KW"),
//         array("name" => "لبنان", "abbreviation" => "LB"),
//         array("name" => "ليبيا", "abbreviation" => "LY"),
//         array("name" => "موريتانيا", "abbreviation" => "MR"),
//         array("name" => "المغرب", "abbreviation" => "MA"),
//         array("name" => "عُمان", "abbreviation" => "OM"),
//         array("name" => "فلسطين", "abbreviation" => "PS"),
//         array("name" => "قطر", "abbreviation" => "QA"),
//         array("name" => "المملكة العربية السعودية", "abbreviation" => "SA"),
//         array("name" => "الصومال", "abbreviation" => "SO"),
//         array("name" => "السودان", "abbreviation" => "SD"),
//         array("name" => "سوريا", "abbreviation" => "SY"),
//         array("name" => "تونس", "abbreviation" => "TN"),
//         array("name" => "الإمارات العربية المتحدة", "abbreviation" => "AE"),
//         array("name" => "اليمن", "abbreviation" => "YE")
//     );

// }

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



<script>
    <?php

    //print_r(get_field("section_2",$postId));

    print_r($query);

    ?>
</script>


<style>
    /* publicationstyles */
    body {
        color: #405561;
    }


</style>
<header>

    <?php include("../wp-content/themes/audi/template-parts/navigation.php"); ?>

</header>




<!--English-->

<?php if ($verifiyRegId == 0) { ?>



    <div class="row">

        <div class="col-md-2"></div>

        <div class="col-md-8">



            <center>

                <p class="fnt-dark-gray fnt-20">Your Registration Id cannot be verify. Kindly try to register again or contact us for assistance and support via email at <a href="mailto:info@araburban.org">info@araburban.org</a>.</p>

                <div class="row">

                    <div class="col-2 col-md-4"></div>

                    <div class="col-8 col-md-4">

                        <a href="<?php print home_url(); ?>/infohub/registration/cities" class="btn btn-primary btn-blue w-100 fnt-20">Register</a>

                    </div>

                    <div class="col-2 col-md-4">

                    </div>

                    <div class="col-12 col-md-2"></div>

                </div>



            </center>



        </div>

        <div class="col-md-2"></div>

    </div>



<?php } else { ?>


    <div data-scroll-container>
        <div class="maincontentdivmi organization_main">

            <div id="top"></div>

            <div class="spacer-40"></div>

            <div class="spacer-120"></div>
            <div class="main">
                <div class="container">
                    <form id="publicforms" method="post" action="" enctype="multipart/form-data">
                    <?php wp_nonce_field('my_organization_attachment_nonce', 'my_organization_attachment_nonce'); ?>

                        <div class="row">
                            <div class="col">
                                <div class="btn backbtn">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="mb-1 mi6_rotate_ar" width="10" height="16" viewBox="0 0 10 20" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M9.70711 0.325437C10.0976 0.759353 10.0976 1.46287 9.70711 1.89679L2.41421 10L9.70711 18.1032C10.0976 18.5371 10.0976 19.2406 9.70711 19.6746C9.31658 20.1085 8.68342 20.1085 8.29289 19.6746L0.292893 10.7857C-0.097631 10.3518 -0.0976311 9.64824 0.292893 9.21433L8.29289 0.325437C8.68342 -0.108479 9.31658 -0.108479 9.70711 0.325437Z" fill="white" />
                                    </svg>
                                    <?php print forceTranslate("Back", "خلف"); ?>
                                </div>
                                <h1 class="topMargin"> <?php print forceTranslate(get_field('page_heading_en', $post_id), get_field('page_heading_ar', $post_id)); ?></h1>
                                <p> <?php print forceTranslate(get_field('sub_heading_en', $post_id), get_field('sub_heading_ar', $post_id)); ?></p>
                                <p class="topMargin f_25_400_mi">
                                    <?php print forceTranslate(get_field('city_region_lebel_en', $post_id), get_field('city_region_lebel_ar', $post_id)); ?>
                                </p>
                                <div class="form-check d-flex align-content-center px-0">
                                    <?php $classesmargin= $lang == 'en' ? "me-4" : "me-4" ?>
                                    <input class="form-check-input mt-0 ms-0 projectchecker_mi <?php echo $classesmargin; ?>" type="checkbox" value="yes" id="projectyesaraban" checked />
                                    <div class="dropdown mi_dropdown_blue">
                                        <div class="selectOption  w-100  p-2" id="ocityfirstparent">
                                            <select id="organregioncity" name="organregioncity" class="border-0 w-100" required>
                                                <option value="0"><?php print forceTranslate("Select The City", "اختر المدينة") ?></option>
                                                <?php
                                                $args = array(
                                                    'post_type' => 'city', // Adjust post type as needed
                                                    'posts_per_page' => -1, // Set to -1 to retrieve all matching posts
                                                );
                                                $category_id = 1051; // Replace with your actual category ID
                                                $child_categories = get_terms(array(
                                                    'taxonomy' => 'category',
                                                    'parent' => $category_id,
                                                    'hide_empty' => false, // Set to false to include empty categories
                                                ));

                                                $category_names = array();

                                                foreach ($child_categories as $child_category) {
                                                    $category_names[] = $child_category->name;
                                                }
                                                $query = new WP_Query($args);
                                                if ($query->have_posts()) {
                                                    while ($query->have_posts()) {
                                                        $query->the_post();
                                                        // Your loop content goes here
                                                        $id = get_the_ID();
                                                        $country = get_field("country", $id);
                                                        $title = esc_html(get_the_title());
                                                        if (in_array($country["value"], array_column($arabCountries, "abbreviation"))) {
                                                            echo '<option value="' . $id . '">' . $title . '</option> ';
                                                        }
                                                        // Other post information...
                                                    }
                                                    wp_reset_postdata();
                                                }

                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-check mt-5 ps-0">
                                    <input class="form-check-input mt-2 projectchecker_mi ms-0 me-4" type="checkbox" value="no" id="projectnoaraban" />
                                    <label class="form-check-label" for="flexCheckDefault"><?php print forceTranslate("Other","اخرى");?></label>
                                    <input type="text" id="nonregionurbanproject" name="nonregionurbanproject" class="rounded-5 p-2 ms-0" placeholder="<?php print forceTranslate("City/Country","الدولة / المدينة");?>" disabled>
                                </div>
                            </div>
                            <!-- question answer start -->
                            <div class="row from formMargin text-light ">

                                <div class="text-light d-sm-flex flex-row gap-sm-5 ">
                                    <div class=" label-questions rounded-3 p-2">
                                        <?php print forceTranslate(get_field('question_heading_en', $post_id), get_field('question_heading_ar', $post_id)); ?>
                                    </div>
                                    <div class=" label-response rounded-3 p-2">
                                        <?php print forceTranslate(get_field('response_heading_en', $post_id), get_field('response_heading_ar', $post_id)); ?>
                                    </div>
                                </div>
                                <div class="text-light d-sm-flex flex-row  gap-sm-5">
                                    <div class="labels rounded-3 p-2"><?php print forceTranslate(get_field('english_language_question_en', $post_id), get_field('english_language_question_ar', $post_id)); ?></div>
                                    <input id="organizationtitleenglish" name="organizationtitleenglish" type="text" placeholder="<?php print forceTranslate(get_field('response_organization_english_language', $post_id), get_field('response_english_language_ar_', $post_id)); ?>" class="response-inputs p-2 rounded-3 border-0" required />
                                </div>
                                <div class="text-light d-sm-flex flex-row  gap-sm-5">
                                    <div class="labels rounded-3 p-2"> <?php print forceTranslate(get_field('arabic_language_question_en', $post_id), get_field('arabic_language_question_ar', $post_id)); ?></div>
                                    <input id="organizationtitlearabic" name="organizationtitlearabic" type="text" placeholder="<?php print forceTranslate(get_field('response_organization_arabic_language', $post_id), get_field('response_arabic_language_ar', $post_id)); ?>" class="response-inputs p-2 rounded-3 border-0" required />
                                </div>
                                <div class="text-light d-sm-flex flex-row  gap-sm-5">
                                    <div class="labels rounded-3 p-2"> <?php print forceTranslate(get_field('lebel_upload_logo_en', $post_id), get_field('lebel_upload_logo_ar', $post_id)); ?></div>
                                    <div class="custom-file  rounded-3 p-1 d-flex">
                                        <label class="custom-file-label px-sm-4 imagefileslabel" for="customFile" id="imagefileslabel"><?php print forceTranslate("Upload PNG / JPG File", "تحميل ملف PNG / JPG"); ?></label>
                                        <input id="imagefiles" type="file" class="custom-file-input" name="imagefiles" required/>
                                    </div>
                                </div>
                                <div class="text-light d-sm-flex flex-row  gap-sm-5">
                                    <div class="labels rounded-3 p-2"> <?php print forceTranslate(get_field('english_address_en', $post_id), get_field('english_address_ar', $post_id)); ?></div>
                                    <input id="organenglishaddress" name="organenglishaddress" type="text" placeholder="<?php print forceTranslate(get_field('response_english_address', $post_id), get_field('response_english_address_ar', $post_id)); ?>" class="response-inputs p-2 rounded-3 border-0" />
                                </div>
                                <div class="text-light d-sm-flex flex-row  gap-sm-5">
                                    <div class="labels rounded-3 p-2"> <?php print forceTranslate(get_field('arabic_address_en', $post_id), get_field('arabic_address_ar', $post_id)); ?></div>
                                    <input id="organarabaddress" name="organarabaddress" type="text" placeholder="<?php print forceTranslate(get_field('response_arabic_address', $post_id), get_field('response_arabic_address_ar', $post_id)); ?>" class="response-inputs p-2 rounded-3 border-0" />
                                </div>
                                <div class="text-light d-sm-flex flex-row  gap-sm-5">
                                    <div class="labels rounded-3 p-2"> <?php print forceTranslate(get_field('phone_number_en', $post_id), get_field('phone_number_ar', $post_id)); ?></div>
                                    <input id="organiznumber" name="organiznumber" type="tel" placeholder="<?php print forceTranslate(get_field('response_phone_number', $post_id), get_field('response_phone_number_ar', $post_id)); ?>" class="response-inputs p-2 rounded-3 border-0"  />
                                </div>
                                <div class="text-light d-sm-flex flex-row  gap-sm-5">
                                    <div class="labels rounded-3 p-2"> <?php print forceTranslate(get_field('email_en', $post_id), get_field('email_ar', $post_id)); ?></div>
                                    <input type="email" name="organizationemail" id="organizationemail" placeholder="<?php print forceTranslate(get_field('response_email_address', $post_id), get_field('response_email_ar', $post_id)); ?>" class="response-inputs p-2 rounded-3 border-0">

                                </div>
                                <div class="text-light d-sm-flex flex-row  gap-sm-5">
                                    <div class="labels rounded-3 p-2"><?php print forceTranslate(get_field('website_en', $post_id), get_field('website_ar', $post_id)); ?></div>
                                    <input type="text" name="organizwebsitelink" id="organizwebsitelink" placeholder="<?php print forceTranslate(get_field('response_website', $post_id), get_field('response_website_ar', $post_id)); ?>" class="response-inputs p-2 rounded-3 border-0">
                                </div>
                                <div class="text-light d-sm-flex flex-row  gap-sm-5">
                                    <div class="labels rounded-3 p-2"> <?php print forceTranslate(get_field('facebook_label_en', $post_id), get_field('facebook_label_ar', $post_id)); ?></div>
                                    <input type="text" name="organizfacebook" id="organizfacebook" placeholder="<?php print forceTranslate(get_field('response_facebook_page', $post_id), get_field('response_facebook_page_ar', $post_id)); ?>" class="response-inputs p-2 rounded-3 border-0">
                                </div>
                                <div class="text-light d-sm-flex flex-row  gap-sm-5">
                                    <div class="labels rounded-3 p-2"> <?php print forceTranslate(get_field('twitter_label_en', $post_id), get_field('twitter_label_ar', $post_id)); ?></div>
                                    <input type="text" name="organiztwitter" id="organiztwitter" placeholder="<?php print forceTranslate(get_field('response_twitter_page', $post_id), get_field('response_twitter_page_ar', $post_id)); ?>" class="response-inputs p-2 rounded-3 border-0">
                                </div>
                                <div class="text-light d-sm-flex flex-row  gap-sm-5">
                                    <div class="labels rounded-3 p-2"> <?php print forceTranslate(get_field('instagram_label_en', $post_id), get_field('instagram_label_ar', $post_id)); ?></div>
                                    <input type="text" name="organizinstagram" id="organizinstagram" placeholder="<?php print forceTranslate(get_field('response_instagram_page', $post_id), get_field('response_instagram_page_ar', $post_id)); ?>" class="response-inputs p-2 rounded-3 border-0">
                                </div>
                                <div class="text-light d-sm-flex flex-row  gap-sm-5">
                                    <div class="labels rounded-3 p-2"> <?php print forceTranslate(get_field('linkedin_label_en', $post_id), get_field('linkedin_label_ar', $post_id)); ?></div>
                                    <input type="text" name="organizlinkedin" id="organizlinkedin" placeholder="<?php print forceTranslate(get_field('response_linkedin_page', $post_id), get_field('response_linkedin_page_ar', $post_id)); ?>" class="response-inputs p-2 rounded-3 border-0">
                                </div>
                                <div class="text-light d-sm-flex flex-row  gap-sm-5">
                                    <div class="labels rounded-3 p-2"> <?php print forceTranslate(get_field('whatsapp_label_en', $post_id), get_field('whatsapp_label_ar', $post_id)); ?></div>
                                    <input type="text" name="organizwhatsapp" id="organizwhatsapp" placeholder="<?php print forceTranslate(get_field('response_whatsapp', $post_id), get_field('response_whatsapp_ar', $post_id)); ?>" class="response-inputs p-2 rounded-3 border-0">
                                </div>
                                <div class="text-light d-sm-flex flex-row  gap-sm-5">
                                    <div class="labels rounded-3 p-2"><?php print forceTranslate(get_field('lebel_organization_type_en', $post_id), get_field('lebel_organization_type_ar', $post_id)); ?> </div>
                                    <div class="selectOption rounded-3 p-2">
                                        <select id="organizationtype" name="organizationtype" class="border-0">
                                        <option value=""><?php print forceTranslate(get_field('response_organization_type', $post_id), get_field('response_organization_type_ar', $post_id)) ?></option>
                                            <?php
                                             $orgtype = get_field_object('field_65a91c579143a');
                                             $others = $orgtype['choices']['1659'];
                                             unset($orgtype['choices']['1659']);
                                             $orgtype['choices']['1659'] = $others;
                                            if ($orgtype['choices']) {
                                                    foreach ($orgtype['choices'] as $value => $label) {
                                                        if($value!= 0){
                                                            echo "<option value='$value'>$label</option>";
    
                                                        }
                                                    }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="text-light d-sm-flex flex-row  gap-sm-5">
                                    <div class="labels rounded-3 p-2"><?php print forceTranslate(get_field('lebel_organization_country_en', $post_id), get_field('lebel_organization_country_ar', $post_id)); ?> </div>
                                    <div class="selectOption rounded-3 p-2">
                                        <select id="organizationcountry" name="organizationcountry" class="border-0">
                                        <!--<option value=""><?php print forceTranslate(get_field('response_organization_type', $post_id), get_field('response_organization_type_ar', $post_id)) ?></option>-->
                                            <?php 

                                            //     $orgtype = get_field_object('field_65a91c8b9143b');
                                            //     if ($orgtype['choices']) {
                                                    
                                            //             foreach ($orgtype['choices'] as $value => $label) {
                                                        
                                            //                 echo "<option value='$value'>".getTransCountry($value)."</option>";
                                            //         }

                                                    

                                            //     }
                                            // ?>

                                          <option value="0"><?php print forceTranslate("Please Select", "الرجاء التحديد"); ?></option>
                                           <?php foreach ($arabCountries as $arab) { ?>

                                             <option value="<?php echo $arab['abbreviation'] ?>"><?php echo $lang == 'en' ? $arab['name'] : $arab['name_ar']; ?></option>

                                           <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="text-light d-sm-flex flex-row  gap-sm-5">
                                    <div class="labels rounded-3 p-2"><?php print forceTranslate(get_field('lebel_year_establish_en', $post_id), get_field('lebel_year_establish_ar', $post_id)); ?></div>
                                    <input type="number" name="yearofestaborgan" id="yearofestaborgan" placeholder="<?php print forceTranslate(get_field('response_year_establish', $post_id), get_field('response_establish_year_ar', $post_id)); ?>" class="response-inputs p-2 rounded-3 border-0">

                                </div>
                                <div class="text-light d-sm-flex flex-row  gap-sm-5">
                                    <div class="labels rounded-3 p-2"><?php print forceTranslate(get_field('lebel_number_employee_en', $post_id), get_field('lebel_number_employee_ar', $post_id)); ?></div>
                                    <div class="selectOption rounded-3 p-2">
                                        <select id="numofemployee" name="numofemployee" class="border-0">
                                            <?php $country = get_field_object('field_65a91cfbc015b');
                                            if ($country['choices']) {
                                                foreach ($country['choices'] as $value => $label) {
                                                    echo "<option value='$value'>$label</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="text-light d-sm-flex flex-row  gap-sm-5">
                                    <div class="labels rounded-3 p-2"> <?php print forceTranslate(get_field('lebel_total_budget_en', $post_id), get_field('lebel_total_budget_ar', $post_id)); ?></div>
                                    <input type="text" name="organiztotalbudget" id="organiztotalbudget" placeholder="<?php print forceTranslate(get_field('response_total_budget', $post_id), get_field('response_total_budget_ar', $post_id)); ?>" class="response-inputs p-2 rounded-3 border-0">
                                </div>
                                <div class="text-light d-sm-flex flex-row  gap-sm-5">
                                    <div class="labels rounded-3 p-2"> <?php print forceTranslate(get_field('lebel_geographic_en', $post_id), get_field('lebel_geographic_ar', $post_id)); ?></div>
                                    <div class="selectOption rounded-3 p-2">
                                        <select id="geoofinterv" name="geoofinterv" class="border-0">
                                        <option value=""><?php print forceTranslate(get_field('response_geo_intervention', $post_id), get_field('response_geo_intervention_ar', $post_id)) ?></option>
                                            <?php $country = get_field_object('field_65a91fb55550a');
                                            if ($country['choices']) {
                                                foreach ($country['choices'] as $value => $label) {
                                                    if($value!= 0){
                                                         echo "<option value='$value'>$label</option>";
                                                    }
                                                    // echo "<option value='$value'>$label</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="text-light d-sm-flex flex-row  gap-sm-5">
                                    <div class="labels rounded-3 p-2"><?php print forceTranslate(get_field('lebel_area_intervention_en', $post_id), get_field('lebel_area_intervention_ar', $post_id)); ?></div>
                                    <div class="selectOption rounded-3 p-2">
                                        <select id="areaofinterv" name="areaofinterv[]" class="border-0 form-control selectpicker" multiple placeholder="<?php print forceTranslate("Please Select", "الرجاء التحديد") ?>">
                                        <option value=""><?php print forceTranslate(get_field('response_area_interventions_max_5', $post_id), get_field('response_area_intervention_ar', $post_id)) ?></option>
                                            <?php $country = get_field_object('field_65a920b05550c');
                                            $others = $country['choices']['1537'];
                                            unset($country['choices']['1537']);
                                            $country['choices']['1537'] = $others;
                                            if ($country['choices']) {
                                                foreach ($country['choices'] as $value => $label) {
                                                    if($value!= 0){
                                                         echo "<option value='$value'>$label</option>";
                                                    }
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="text-light d-sm-flex flex-row  gap-sm-5">
                                    <div class="labels rounded-3 p-2"> <?php print forceTranslate(get_field('lebel_type_intervention_en', $post_id), get_field('lebel_type_intervention_ar', $post_id)); ?></div>
                                    <div class="selectOption rounded-3 p-2">
                                        <select id="typeofinterv" name="typeofinterv[]" class="border-0 form-control selectpicker" multiple placeholder="<?php print forceTranslate("Please Select", "الرجاء التحديد") ?>">
                                        <option value=""><?php print forceTranslate(get_field('response_type_intervention_max_3', $post_id), get_field('response_type_intervention_ar', $post_id)) ?></option>
                                            <?php $country = get_field_object('field_65a920d45550d');
                                            $others = $country['choices']['1467'];
                                            unset($country['choices']['1467']);
                                            $country['choices']['1467'] = $others;
                                            if ($country['choices']) {
                                                foreach ($country['choices'] as $value => $label) {
                                                    if($value!= 0){
                                                        echo "<option value='$value'>$label</option>";

                                                    }
                                                    
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <input type="submit" class="btn sendbtn my-3 rounded-3" value="<?php print forceTranslate(get_field('send_button_label', $post_id), get_field('send_button_label_ar', $post_id)) ?>">
                            </div>
                        </div>
                        <!-- question answer start -->
                    </form>
                </div>
            </div>
            <div class="spacer-120"></div>
        <?php }
    // echo "<pre>";
    // var_dump($child_categories);
    // echo "</pre>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<pre>";
    // var_dump($postIdwithcountry);
    echo "</pre>"; ?>
        <script>
            // // Get the select element
            // var selectElement = document.getElementById("yearSelect");

            // // Get the current year
            // var currentYear = new Date().getFullYear();

            // // Populate the select with years from 1900 to the current year
            // for (var year = currentYear; year >= 1900; year--) {
            //     var option = document.createElement("option");
            //     option.text = year;
            //     option.value = year;
            //     selectElement.add(option);
            // }
            jQuery(document).ready(function($) {

                $(".imagefileslabel").on("click", function() {
                    $(this).siblings('input').trigger('click');
                })
                $('.projectchecker_mi').on('click', function() {
                    $(".downlistcity").show();
                    console.log($(this).val());
                    console.log($(this).is(":checked"));
                    if ($(this).val() == "yes" && $(this).is(":checked") ) {
                        $("#organregioncity").removeAttr('disabled');
                        $("#nonregionurbanproject").attr('disabled', 'true');
                        $("#nonregionurbanproject").val('');
                        $("#projectnoaraban").removeAttr("checked");
                    }
                    else if($(this).val() == "no" && $(this).is(":checked") ){
                        $("#nonregionurbanproject").removeAttr('disabled');
                        $("#organregioncity").attr('disabled', 'true');
                        $("#organregioncity").val(0);
                        $("#projectyesaraban").removeAttr("checked");
                    }
                    else {
                       
                        $("#nonregionurbanproject").attr('disabled', 'true');
                        $("#organregioncity").attr('disabled', 'true');
                        $("#nonregionurbanproject").val('');
                        $("#organregioncity").val(0);
                    }
                })
            });
            
        </script>

        <!-- <script>
            // jQuery("#publicform").on("submit", function(e){
            //     e.preventDefault();
            //       var formData = new FormData(this);
            //     console.log(formData);
            // });
            jQuery(document).ready(function($) {
                $("#publicform").on("submit", function(e) {
                    e.preventDefault();

                    var formData = new FormData(this);

                    // Get the value of the 'security' field from the FormData object
                    var securityValue = formData.get('security');

                    $.ajax({
                        type: "POST",
                        url: "/wp-admin/admin-ajax.php", // Make sure to define this variable in your theme or plugin
                        data: {
                            action: 'infohubpublicpost',
                            security: securityValue,
                        },
                        processData: false, // Important: prevent jQuery from processing the FormData object
                        contentType: false, // Important: prevent jQuery from setting contentType
                        success: function(response) {
                            // Handle the response from the server
                            console.log(response);
                        },
                        error: function(error) {
                            console.log(error);
                        },
                    });

                    console.log(formData);
                });

            });
        </script> -->

        <?php get_footer(); ?>