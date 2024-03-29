<?php /* Template Name : Infohub Publication posting */
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
$verifiyRegId = 1;
if (!isset($_GET['regId']) || $_GET['regId'] == "") {
    if (isset($_GET['status'])) {
        // var_dump(acf_get_field('field_65cc8463ce136', $_GET['status']));
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
$arabCountries = array(
    array("name" => "Algeria", "abbreviation" => "DZ"),
    array("name" => "Bahrain", "abbreviation" => "BH"),
    array("name" => "Comoros", "abbreviation" => "KM"),
    array("name" => "Djibouti", "abbreviation" => "DJ"),
    array("name" => "Egypt", "abbreviation" => "EG"),
    array("name" => "Iraq", "abbreviation" => "IQ"),
    array("name" => "Jordan", "abbreviation" => "JO"),
    array("name" => "Kuwait", "abbreviation" => "KW"),
    array("name" => "Lebanon", "abbreviation" => "LB"),
    array("name" => "Libya", "abbreviation" => "LY"),
    array("name" => "Mauritania", "abbreviation" => "MR"),
    array("name" => "Morocco", "abbreviation" => "MA"),
    array("name" => "Oman", "abbreviation" => "OM"),
    array("name" => "Palestine", "abbreviation" => "PS"),
    array("name" => "Qatar", "abbreviation" => "QA"),
    array("name" => "Saudi Arabia", "abbreviation" => "SA"),
    array("name" => "Somalia", "abbreviation" => "SO"),
    array("name" => "Sudan", "abbreviation" => "SD"),
    array("name" => "Syria", "abbreviation" => "SY"),
    array("name" => "Tunisia", "abbreviation" => "TN"),
    array("name" => "United Arab Emirates", "abbreviation" => "AE"),
    array("name" => "Yemen", "abbreviation" => "YE")
);

if($lang == "ar"){

    $arabCountries = array(
        array("name" => "الجزائر", "abbreviation" => "DZ"),
        array("name" => "البحرين", "abbreviation" => "BH"),
        array("name" => "جزر القمر", "abbreviation" => "KM"),
        array("name" => "جيبوتي", "abbreviation" => "DJ"),
        array("name" => "مصر", "abbreviation" => "EG"),
        array("name" => "العراق", "abbreviation" => "IQ"),
        array("name" => "الأردن", "abbreviation" => "JO"),
        array("name" => "الكويت", "abbreviation" => "KW"),
        array("name" => "لبنان", "abbreviation" => "LB"),
        array("name" => "ليبيا", "abbreviation" => "LY"),
        array("name" => "موريتانيا", "abbreviation" => "MR"),
        array("name" => "المغرب", "abbreviation" => "MA"),
        array("name" => "عُمان", "abbreviation" => "OM"),
        array("name" => "فلسطين", "abbreviation" => "PS"),
        array("name" => "قطر", "abbreviation" => "QA"),
        array("name" => "المملكة العربية السعودية", "abbreviation" => "SA"),
        array("name" => "الصومال", "abbreviation" => "SO"),
        array("name" => "السودان", "abbreviation" => "SD"),
        array("name" => "سوريا", "abbreviation" => "SY"),
        array("name" => "تونس", "abbreviation" => "TN"),
        array("name" => "الإمارات العربية المتحدة", "abbreviation" => "AE"),
        array("name" => "اليمن", "abbreviation" => "YE")
    );

}


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

                <p class="fnt-dark-gray fnt-20"><?php print forceTranslate("Project Name   Your Registration Id cannot be verify. Kindly try to register again or contact us for assistance and support via email at", " ا يمكن التحقق من معرف التسجيل الخاص بك. يرجى محاولة التسجيل مرة أخرى أو الاتصال بنا للحصول على المساعدة والدعم عبر البريد الإلكتروني على اسم المشروع"); ?><a href="mailto:info@araburban.org">info@araburban.org</a>.</p>

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
        <div class="maincontentdivmi publication_main">

            <div id="top"></div>

            <div class="spacer-40"></div>

            <div class="spacer-120"></div>
            <div class="main">
                <div class="container">
                    <form id="publicform" method="post" action="" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col">
                                <div class="btn backbtn">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="mb-1 mi6_rotate_ar" width="10" height="16" viewBox="0 0 10 20" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M9.70711 0.325437C10.0976 0.759353 10.0976 1.46287 9.70711 1.89679L2.41421 10L9.70711 18.1032C10.0976 18.5371 10.0976 19.2406 9.70711 19.6746C9.31658 20.1085 8.68342 20.1085 8.29289 19.6746L0.292893 10.7857C-0.097631 10.3518 -0.0976311 9.64824 0.292893 9.21433L8.29289 0.325437C8.68342 -0.108479 9.31658 -0.108479 9.70711 0.325437Z" fill="white" />
                                    </svg>
                                    <?php print forceTranslate("Back", "خلف"); ?>
                                </div>

                                <h1 class="topMargin"><?php print forceTranslate(get_field('page_heading_en', $post_id), get_field('page_heading_ar', $post_id)); ?></h1>

                                <p><?php print forceTranslate(get_field('sub_heading_en', $post_id), get_field('sub_heading_ar', $post_id)); ?></p>


                                <p class="topMargin">
                                    <?php print forceTranslate(get_field('city_region_en', $post_id), get_field('page_heading_ar', $post_id)); ?>
                                
                                </p>
                                <div class="form-check">
                                    <input class="form-check-input particularcityarab" type="checkbox" value="yes" id="particularcityarab" name="particularcityarab" />
                                    <label class="form-check-label" for="particularcityarab"> <?php print forceTranslate("Yes", "نعم"); ?> </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input particularcityarab" type="checkbox" value="no" id="particularcityarabno" name="particularcityarabno" />
                                    <label class="form-check-label" for="particularcityarab"> <?php print forceTranslate("No", "لا"); ?> </label>
                                </div>
                                <div class="dropdown dropdownMargin downlistcity mi6_pub_dropdown">
                                    <div class="selectOption rounded-3 p-2 mi6_pub_select_dropdown">
                                        <select id="regioncity" name="regioncity" class="border-0 p-2 mi6_pub_options">
                                        <option value="0"><?php print forceTranslate("Select A city", "اختر مدينة") ?></option>
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
                                        <input type="text" id="nonregioncity" name="nonregioncity" class="rounded-5 p-2 mi6_w_100">
                                        <!-- <select id="nonregioncity" name="nonregioncity" class="border-0 p-2">
                                            
                                            // $args = array(
                                            //     'post_type' => 'city', // Adjust post type as needed
                                            //     'posts_per_page' => -1, // Set to -1 to retrieve all matching posts
                                            // );
                                            // $query = new WP_Query($args);
                                            // if ($query->have_posts()) {
                                            //     while ($query->have_posts()) {
                                            //         $query->the_post();
                                            //         // Your loop content goes here
                                            //         $id = get_the_ID();
                                            //         $title = esc_html(get_the_title());
                                            //         echo '<option value="' . $id . '">' . $title . '</option> ';
                                            //         // Other post information...
                                            //     }
                                            //     wp_reset_postdata();
                                            // }
                                            ?>
                                        </select> -->
                                    </div>
                                </div>


                                <p class="textMargin">
                                    <?php print forceTranslate(get_field('project_region_en', $post_id), get_field('project_region_ar', $post_id)); ?>

                                </p>
                                <div class="form-check">
                                    <input class="form-check-input mt-2 mi6_pub_checker" type="checkbox" value="yes" id="projectyesaraban" />
                                    <div class="dropdown mi_dropdown_blue">
                                        <div class="selectOption rounded-3 p-2 mi6_pub_dropdown" id="ocityfirstparent">
                                            <select class="mi6_pub_options" id="regionurban" name="regionurban" class="border-0">
                                                <option value="0"><?php print forceTranslate("Select A Project", "حدد مشروع") ?></option>
                                                <?php
                                                $args = array(
                                                    'post_type' => 'project',
                                                    'posts_per_page' => -1,
                                                );
                                                $query = new WP_Query($args);
                                                $postIdwithcountry = array();
                                                if ($query->have_posts()) {
                                                    while ($query->have_posts()) {
                                                        $query->the_post();
                                                        $post_id = get_the_ID();
                                                        $country = get_field('section_1', $post_id);
                                                        $title='';
                                                        if($lang == 'en'){
                                                            $title=$country['project_name_en'];
                                                        }else{
                                                            $title=$country['project_name_ar'];
                                                        }
                                                        if (in_array($country["country"]["value"], array_column($arabCountries, "abbreviation"))) {
                                                            echo '<option value="' . $post_id . '">' . $title . '</option> ';
                                                        }
                                                    }
                                                }
                                                wp_reset_postdata();
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-check mt-5">
                                    <input class="form-check-input mt-2 mi6_pub_checker mar-right-15" type="checkbox" value="no" id="projectnoaraban" />
                                    <label class="form-check-label" for="projectnoaraban"><?php print forceTranslate("Other","اخرى");?></label>
                                    <input type="text" id="nonregionurbanproject" name="nonregionurbanproject" class="rounded-5 p-2 ms-2 mi6_m_15 mi6_w_15" placeholder="<?php print forceTranslate("Specify name of project","حدد اسم المشروع الاخر");?>">
                                </div>

                                <!-- <div class="form-check mt-2">
                                            <input class="form-check-input checkbox mt-2" type="checkbox" value="" id="nameofproject" />
                                            <div class="dropdown">
                                                <div class="selectOption rounded-3 p-2">
                                                    <select id="nonregionurbanproject" name="nonregionurbanproject" class="border-0">
                                                        <?php
                                                        // $args = array(
                                                        //     'post_type' => 'project',
                                                        //     'posts_per_page' => -1,
                                                        // );
                                                        // $query = new WP_Query($args);
                                                        // $postIdwithcountry = array();
                                                        // if ($query->have_posts()) {
                                                        //     while ($query->have_posts()) {
                                                        //         $query->the_post();
                                                        //         $post_id = get_the_ID();
                                                        //         $country = get_field('section_1', $post_id);
                                                        //         $title = esc_html(get_the_title());
                                                        //         echo '<option value="' . $post_id . '">' . $title . '</option> ';
                                                        //     }
                                                        // }
                                                        // wp_reset_postdata();
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div> -->

                            </div>
                            <!-- question answer start -->
                            <div class="row from formMargin text-light ">

                                <div class="text-light d-sm-flex flex-row gap-sm-5 ">
                                    <div class=" label-questions rounded-3 p-2">
                                        <?php print forceTranslate(get_field('question_heading_en'), get_field('question_heading_ar')); ?>
                                    </div>
                                    <div class=" label-response rounded-3 p-2">
                                        <?php print forceTranslate(get_field('answer_heading_ar'), get_field('answer__heading_ar')); ?>
                                    </div>
                                </div>
                                <div class="text-light d-sm-flex flex-row  gap-sm-5">
                                    <div class="labels rounded-3 p-2"><?php print forceTranslate(get_field('publication_title_en_fr'), get_field('publication_title_ar_fr')); ?></div>
                                    <input id="publictitlefrance" name="publictitlefrance" type="text" placeholder=" <?php print forceTranslate(get_field('response_publication_title_enfr'), get_field('response_publication_title_enfr_ar')); ?>" class="response-inputs p-2 rounded-3 border-0" required />
                                </div>
                                <div class="text-light d-sm-flex flex-row  gap-sm-5">
                                    <div class="labels rounded-3 p-2"> <?php print forceTranslate(get_field('_publication_title_en'), get_field('_publication_title-ar')); ?></div>
                                    <input id="publictitlearabic" name="publictitlearabic" type="text" placeholder="<?php print forceTranslate(get_field('response_publication_title_ar'), get_field('response_publication_title_ar_ar')); ?>" class="response-inputs p-2 rounded-3 border-0" required />
                                </div>
                                <div class="text-light d-sm-flex flex-row  gap-sm-5">
                                    <div class="labels rounded-3 p-2"><?php print forceTranslate(get_field('_language_versions_en'), get_field('_language_versions_ar')); ?></div>
                                    <div class="selectOption rounded-3 p-2 rounded-3">
                                        <select id="langversion" name="langversion" class="border-0">
                                            <?php $field = get_field_object('field_65aa2726e1809');

                                            $language_array=array(
                                                'fr'=>'فرنسي',
                                                'ar' => 'العربية',
                                                'en' => 'الانجليزية',
                                                '0' => 'الرجاء التحديد',
                                            );
                                            if ($field['choices']) {
                                                foreach ($field['choices'] as $value => $label) {
                                                
                                                    if($lang == "en"){
                                                        echo "<option value='$value'>$label</option>";
                                                    }else{
                                                        echo "<option value='$value'>$language_array[$value]</option>";
                                                    }                                                              
                                            }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="text-light d-sm-flex flex-row  gap-sm-5">
                                    <div class="labels rounded-3 p-2"><?php print forceTranslate(get_field('publication_link_eng_en'), get_field('publication_link_eng_ar')); ?></div>
                                    <input id="publiclinkeng" name="publiclinkeng" type="text" placeholder="<?php print forceTranslate(get_field('response_publication_link_en'), get_field('response_publication_link_en_ar')); ?> " class="response-inputs p-2 rounded-3 border-0" />
                                </div>
                                <div class="text-light d-sm-flex flex-row  gap-sm-5">
                                    <div class="labels rounded-3 p-2"><?php print forceTranslate(get_field('publication_link_arb_en'), get_field('publication_link_arb_ar')); ?></div>
                                    <input id="publiclinkar" name="publiclinkar" type="text" placeholder="<?php print forceTranslate(get_field('response_publication_link_ar'), get_field('response_publication_link_ar_ar')); ?>" class="response-inputs p-2 rounded-3 border-0" />
                                </div>
                                <div class="text-light d-sm-flex flex-row  gap-sm-5">
                                    <div class="labels rounded-3 p-2"> <?php print forceTranslate(get_field('_publication_link_frn_en'), get_field('_publication_link_frn_ar')); ?></div>
                                    <input id="publiclinkfr" name="publiclinkfr" type="text" placeholder="<?php print forceTranslate(get_field('response_publication_link_fr'), get_field('response_publication_link_fr_ar')); ?>" class="response-inputs p-2 rounded-3 border-0" />
                                </div>
                                <div class="text-light d-sm-flex flex-row  gap-sm-5">
                                    <div class="labels rounded-3 p-2"><?php print forceTranslate(get_field('publication_date'), get_field('date_of_publication_ar')); ?></div>
                                    <div class="yearSelect response-inputs d-flex align-items-center  rounded-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="ms-2" width="20" height="20" viewBox="0 0 21 21" fill="none">
                                            <path d="M16.9615 20.9998H4.03846C2.96739 20.9998 1.9402 20.5743 1.18284 19.8169C0.42548 19.0596 0 18.0324 0 16.9613V5.65364C0 4.58257 0.42548 3.55537 1.18284 2.79801C1.9402 2.04065 2.96739 1.61517 4.03846 1.61517H16.9615C18.0326 1.61517 19.0598 2.04065 19.8172 2.79801C20.5745 3.55537 21 4.58257 21 5.65364V16.9613C21 18.0324 20.5745 19.0596 19.8172 19.8169C19.0598 20.5743 18.0326 20.9998 16.9615 20.9998ZM4.03846 3.23056C3.39582 3.23056 2.7795 3.48585 2.32509 3.94026C1.87067 4.39468 1.61538 5.01099 1.61538 5.65364V16.9613C1.61538 17.604 1.87067 18.2203 2.32509 18.6747C2.7795 19.1291 3.39582 19.3844 4.03846 19.3844H16.9615C17.6042 19.3844 18.2205 19.1291 18.6749 18.6747C19.1293 18.2203 19.3846 17.604 19.3846 16.9613V5.65364C19.3846 5.01099 19.1293 4.39468 18.6749 3.94026C18.2205 3.48585 17.6042 3.23056 16.9615 3.23056H4.03846Z" fill="#405561" />
                                            <path d="M16.9613 17.7689H13.7305C13.5163 17.7689 13.3109 17.6838 13.1594 17.5323C13.0079 17.3808 12.9229 17.1754 12.9229 16.9612V13.7304C12.9229 13.5162 13.0079 13.3108 13.1594 13.1593C13.3109 13.0078 13.5163 12.9227 13.7305 12.9227H16.9613C17.1755 12.9227 17.381 13.0078 17.5324 13.1593C17.6839 13.3108 17.769 13.5162 17.769 13.7304V16.9612C17.769 17.1754 17.6839 17.3808 17.5324 17.5323C17.381 17.6838 17.1755 17.7689 16.9613 17.7689ZM14.5382 16.1535H16.1536V14.5381H14.5382V16.1535Z" fill="#405561" />
                                            <path d="M20.1923 8.07675H0.807692C0.593479 8.07675 0.388039 7.99165 0.236568 7.84018C0.0850959 7.68871 0 7.48327 0 7.26906C0 7.05484 0.0850959 6.8494 0.236568 6.69793C0.388039 6.54646 0.593479 6.46136 0.807692 6.46136H20.1923C20.4065 6.46136 20.612 6.54646 20.7634 6.69793C20.9149 6.8494 21 7.05484 21 7.26906C21 7.48327 20.9149 7.68871 20.7634 7.84018C20.612 7.99165 20.4065 8.07675 20.1923 8.07675Z" fill="#405561" />
                                            <path d="M6.4615 4.84615C6.24729 4.84615 6.04185 4.76106 5.89038 4.60959C5.7389 4.45811 5.65381 4.25267 5.65381 4.03846V0.807692C5.65381 0.593479 5.7389 0.388039 5.89038 0.236568C6.04185 0.0850959 6.24729 0 6.4615 0C6.67571 0 6.88115 0.0850959 7.03263 0.236568C7.1841 0.388039 7.26919 0.593479 7.26919 0.807692V4.03846C7.26919 4.25267 7.1841 4.45811 7.03263 4.60959C6.88115 4.76106 6.67571 4.84615 6.4615 4.84615Z" fill="#405561" />
                                            <path d="M14.5386 4.84615C14.3244 4.84615 14.119 4.76106 13.9675 4.60959C13.8161 4.45811 13.731 4.25267 13.731 4.03846V0.807692C13.731 0.593479 13.8161 0.388039 13.9675 0.236568C14.119 0.0850959 14.3244 0 14.5386 0C14.7529 0 14.9583 0.0850959 15.1098 0.236568C15.2612 0.388039 15.3463 0.593479 15.3463 0.807692V4.03846C15.3463 4.25267 15.2612 4.45811 15.1098 4.60959C14.9583 4.76106 14.7529 4.84615 14.5386 4.84615Z" fill="#405561" />
                                        </svg>
                                        <input type="date" name="datepickerpost" id="datepickerpost">
                                    </div>

                                </div>
                                <div class="text-light d-sm-flex flex-row  gap-sm-5">
                                    <div class="labels rounded-3 p-2"><?php print forceTranslate(get_field('publication_type_en'), get_field('publication_type_ar')); ?></div>
                                    <div class="selectOption rounded-3 p-2">

                                        <select id="publicationtype" name="publicationtype" class="border-0">
                                        <option value="0"><?php print forceTranslate("Please Select", "الرجاء التحديد") ?></option>
                                            <?php $field = get_field_object('field_65aa28cb6c1c1');

                                            if ($field['choices']) {
                                                foreach ($field['choices'] as $value => $label) :
                                                    if($value != 0){

                                                        echo "<option value='$value'>$label</option>";

                                                    }
                                                    
                                                endforeach;
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="text-light d-sm-flex flex-row  gap-sm-5">
                                    <div class="labels rounded-3 p-2"><?php print forceTranslate(get_field('theme_maximum_5_en'), get_field('theme_maximum_5_ar')); ?></div>
                                    <div class="selectOption rounded-3 p-2">

                                        <select id="publicationtheme" name="publicationtheme[]" class="border-0 form-control selectpicker" multiple placeholder="<?php print forceTranslate("Please Select", "الرجاء التحديد") ?>" >
                                            <?php $field = get_field_object('field_65aa29a3b255f');
                                            $others = $field['choices']['1837'];
                                            unset($field['choices']['1837']);
                                            $field['choices']['1837'] = $others;

                                            if ($field['choices']) {
                                                foreach ($field['choices'] as $value => $label) :
                                                    if($value != 0){
                                                        
                                                        echo "<option value='$value'>$label</option>";
                                                    }
                                                endforeach;
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="text-light d-sm-flex flex-row  gap-sm-5">
                                    <div class="labels rounded-3 p-2"><?php print forceTranslate(get_field('_organization_name_english_or_french_en'), get_field('_organization_name_english_or_french_ar')); ?>
                                        <p class="labelSmallText ms-4 mb-0"> <?php print forceTranslate("(that authored/ published the document)", " (الذي قام بتأليف/نشر الوثيقة)"); ?></p>
                                    </div>
                                    <input id="puborganizationnameeng" name="puborganizationnameeng" type="text" placeholder="<?php print forceTranslate(get_field('response_organization_name_enfr'), get_field('response_organization_name_enfr_ar')); ?>" class="response-inputs input10 rounded-3 border-0" />
                                </div>
                                <div class="text-light d-sm-flex flex-row  gap-sm-5">
                                    <div class="labels rounded-3 p-2"> <?php print forceTranslate(get_field('organization_name_arabic_en'), get_field('organization_name_arabic_ar')); ?>
                                        <p class="labelSmallText ms-3 mb-0"> <?php print forceTranslate("(that authored/ published the document)", " (الذي قام بتأليف/نشر الوثيقة)"); ?></p>
                                    </div>
                                    <input id="puborganizationnamear" name="puborganizationnamear" type="text" placeholder="<?php print forceTranslate(get_field('response_organization_name_ar'), get_field('response_organization_name_ar_ar')); ?>" class="response-inputs p-2 input10 rounded-3 border-0" />
                                </div>
                                <div class="text-light d-sm-flex flex-row  gap-sm-5">
                                    <div class="labels rounded-3 p-2"> <?php print forceTranslate(get_field('organization_type_en'), get_field('organization_type_ar')); ?></div>
                                    <div class="selectOption rounded-3 p-2">
                                        <select id="puborganizationtype" name="puborganizationtype" class="border-0">
                                        <option value="0"><?php print forceTranslate("Please Select", "الرجاء التحديد") ?></option>
                                            <?php $orgtype = get_field_object('field_65aa2b592f74f');
                                            $others = $orgtype['choices']['1659'];
                                            unset($orgtype['choices']['1659']);
                                            $orgtype['choices']['1659'] = $others;
                                            if ($orgtype['choices']) {
                                                foreach ($orgtype['choices'] as $value => $label) {
                                                    if($value != 0){

                                                        echo "<option value='$value'>$label</option>";

                                                    }
                                                    
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="text-light d-sm-flex flex-row  gap-sm-5">
                                    <div class="labels rounded-3 p-2"> <?php print forceTranslate(get_field('publication_country_en'), get_field('publication_country_ar')); ?>

                                    </div>
                                    <div class="selectOption rounded-3 p-2">
                                        <select id="pubcountry" name="pubcountry" class="border-0">
                                            <?php $country = get_field_object('field_65aa214151992');
                                            if ($country['choices']) {
                                                foreach ($country['choices'] as $value => $label) {
                                                    echo "<option value='$value'>".getTransCountry($value)."</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="text-light d-sm-flex flex-row  gap-sm-5">
                                    <div class="labels rounded-3 p-2"><?php print forceTranslate(get_field('publication_image_en'), get_field('publication_image_ar')); ?>





                                    </div>
                                    <div class="custom-file  rounded-3 p-1 d-flex">
                                        <label class="custom-file-label px-sm-4 imagefileslabel" for="customFile" id="imagefileslabel"> <?php print forceTranslate("Project Name Upload PNG / JPG File", " تحميل ملف PNG / JPGاسم المشروع"); ?>





                                        </label>
                                        <input id="imagefiles" type="file" class="custom-file-input" name="imagefiles" />
                                    </div>
                                </div>
                                <div class="text-light d-sm-flex flex-row  gap-sm-5">
                                    <div class="labels rounded-3 p-2"> <?php print forceTranslate(get_field('upload_publication_optional_en'), get_field('upload_publication_optional_ar')); ?>





                                    </div>
                                    <div class="custom-file rounded-3 p-1 d-flex">
                                        <label class="custom-file-label px-sm-5 imagefileslabel" for="customFile"><?php print forceTranslate(" Upload PDF File ", " تحميل ملف PDF"); ?>





                                        </label>
                                        <input id="imagepdf" type="file" class="custom-file-input2" name="imagepdf" />
                                    </div>
                                </div>
                                <div class="text-light d-sm-flex flex-row  gap-sm-5">
                                    <div class="labels rounded-3 p-2"> <?php print forceTranslate(get_field('upload_publication_optional_en'), get_field('upload_publication_optional_ar')); ?>





                                    </div>
                                    <div class="custom-file rounded-3 p-1 d-flex">
                                        <label class="custom-file-label px-sm-5 imagefileslabel" for="customFile"><?php print forceTranslate(" Upload PDF File ", " تحميل ملف PDF"); ?>





                                        </label>
                                        <input id="imagear" type="file" class="custom-file-input2" name="imagear" />
                                    </div>
                                </div>
                                <input type="submit" class="btn sendbtn my-3 rounded-3" value="<?php print forceTranslate("Send", "إرسال"); ?>">
                            </div>
                        </div>
                        <!-- question answer start -->
                    </form>
                </div>
            </div>
            <div class="spacer-120"></div>
        <?php
    }
    // echo "<pre>";
    // var_dump($child_categories);
    // echo "</pre>";
    // echo "<br>";
    // echo "<br>";
    // echo "<br>";
    // echo "<pre>";
    // var_dump($postIdwithcountry);
    // echo "</pre>"; 
        ?>
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
                $(".downlistcity").hide();
                $('.particularcityarab').on('click', function() {
                    $(".downlistcity").show();
                    if ($(this).val() == "yes") {
                        $("#regioncity").show();
                        $("#nonregioncity").hide();
                        $("#nonregioncity").val('');
                        $("#particularcityarabno").removeAttr("checked");
                    } else {
                        $("#regioncity").hide();
                        $("#nonregioncity").show();
                        $("#regioncity").val('');
                        $("#particularcityarab").removeAttr("checked");

                    }
                })
                $('.projectchecker_mi').on('click', function() {
                    $(".downlistcity").show();
                    if ($(this).val() == "yes") {
                        $("#regionurban").removeAttr('disabled');
                        $("#nonregionurbanproject").attr('disabled', 'true');
                        $("#nonregionurbanproject").val('');
                        $("#projectnoaraban").removeAttr("checked");
                    } else {
                        $("#nonregionurbanproject").removeAttr('disabled');
                        $("#regionurban").attr('disabled', 'true');
                        $("#regionurban").val(0);
                        $("#projectyesaraban").removeAttr("checked");
                    }
                })
                $(".imagefileslabel").on("click", function() {
                    $(this).siblings('input').trigger('click');
                });
                var paramName = 'status'; // Replace with your parameter name
                if (doesParamExist(paramName)) {
                    $(".successalert").on("click", function() {
                        $(".successalert").hide();
                        window.location.assign('<?php echo home_url(); ?>');
                    })
                }
            });

            function doesParamExist(paramName) {
                return new URLSearchParams(window.location.search).has(paramName);
            }
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