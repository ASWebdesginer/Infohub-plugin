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

if (!isset($_GET['regId']) || $_GET['regId'] == "") {

    if (isset($_GET['status']) && $_GET['status'] == "success") {
        if($lang == 'en'){
            echo "<div class='successalert'><h2>Thank you for your contribution, well received!</h2></div>";
        }
        else{
            echo "<div class='successalert'><h2> شكرا لمساهمتك، استقبالا حسنا!</h2></div>";
        }
        ?>
        <script>
            setTimeout(function() {
                window.location.href = "<?php echo home_url(); ?>";
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

    .publication_main {
        color: #405561;
    }

    /* style for dropown styles */

    .dropdown.mi_dropdown_blue {
        min-width: 162px;
        width: auto;
        height: 53px;
        background-color: #1D7BAB;
        border-radius: 20px;
        box-shadow: 0px 4px 4px 0px #00000040;
    }

    .successalert {
        width: 100%;
        height: 100vh;
        position: fixed;
        background: rgba(0, 0, 0, 0.4);
        display: flex;
        justify-content: center;
        align-items: center;
        color: white;
        z-index: 9999;
    }

    .successalert h2 {
        color: black;
        padding: 50px 21px;
        background: white;
        border-radius: 20px;
        font-size: 18px;
        font-weight: 700;
        line-height: 27px;
        letter-spacing: -0.011em;
        text-align: center;
    }

    /* .publication_main .container-fluid{
    margin-left: 75px;
    margin-right: 75px  ;
    
} */
    .publication_main .backbtn {
        margin-top: 100px;
    }

    .publication_main .topMargin {
        margin-top: 62px;
    }

    .publication_main .dropdownMargin {
        margin-top: 94px;
    }

    .publication_main .textMargin {
        margin-top: 104px;
    }

    .publication_main .btn {
        background-color: #37A2DD;
        color: #fff;
    }

    .publication_main .btn:hover {
        color: #fff;
    }

    .publication_main .formMargin {
        margin-top: 116px;
    }

    .publication_main .form-check-input {
        color: #37A2DD;
    }

    .publication_main .portal-dropdown {
        background-color: #1D78AB;
    }

    .publication_main .portal-input {
        color: rgba(64, 85, 97, 0.50);
    }

    .publication_main .checkbox {
        margin-top: 28px;
    }

    .publication_main .label-questions {
        width: 40%;
        background-color: #405561;
    }

    .publication_main .labelSmallText {
        font-size: 10px;
    }

    .publication_main .label-response {
        width: 55%;
        background-color: #1D78AB;
    }

    .publication_main .labels {
        width: 40%;
        background-color: #7E9AAA;
        margin-top: 5px;
    }

    .publication_main span {
        font-size: 10px;
    }

    .publication_main .response-inputs {
        width: 55%;
        color: #405561;
        text-align: left;
        background-color: #F0F6F8;
        margin-top: 5px;
    }

    .publication_main .response-inputs:active {
        outline: none;
    }

    .publication_main input[type=text]:focus {
        outline: none;
    }

    .publication_main input[type=date]:focus {
        outline: none;
    }

    .publication_main input[type=text]::placeholder {
        color: #405561;
    }

    .publication_main select {
        width: 35%;
    }

    .publication_main select:focus {
        outline: none;
    }

    .publication_main select option:checked {
        outline: none;
        border: none;
    }

    .publication_main .sendbtn {
        width: 100px;
        background-color: #1D78AB;
    }

    /* ------------img upload input style */

    .publication_main .custom-file {
        width: 55%;
        margin-top: 5px;
        background-color: #F0F6F8;
        cursor: pointer;
    }

    .publication_main .custom-file-input {
        background-color: #F0F6F8;
    }

    .publication_main .custom-file-input::-webkit-file-upload-button {
        visibility: hidden;
    }

    .publication_main .custom-file-input::before {
        width: 100%;
        content: '( Maximum 1 MB file size/ picture)';
        display: inline-block;
        background-color: #F0F6F8;
        color: #405561;
        border-radius: 5px;
        outline: none;
        white-space: nowrap;
        cursor: pointer;
        font-size: 12pt;
    }

    .publication_main .custom-file-input2::before {
        width: 100%;
        content: '';
        display: inline-block;
        background-color: #F0F6F8;
        color: #405561;
        border-radius: 5px;
        cursor: pointer;
        outline: none;
        white-space: nowrap;
        cursor: pointer;
        font-size: 10pt;
    }

    .publication_main .custom-file-input+.custom-file-label {
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
    }

    .publication_main .custom-file-label {
        background-color: #7E9AAA;
        border-radius: 5px;
    }

    /* year select input style */

    .publication_main .yearSelect {
        background-color: #F0F6F8;
        color: #405561;
    }

    .publication_main .yearSelect select:focus {
        outline: none;
        border: none;
    }

    .publication_main #yearSelect {
        width: 30%;
        color: #405561;
        background-color: #F0F6F8;
    }

    .publication_main #yearSelect option:checked {
        outline: none;
        border: none;
    }

    /* selection dropdowns style */

    .publication_main .selectOption {
        margin-top: 5px;
        width: 55%;
        background-color: #F0F6F8;
    }

    .publication_main .selectOption select {
        background-color: #F0F6F8;
        color: #405561;
    }

    #organregioncity,
    #ocityfirstparent {
        background-color: #1D7BAB;
        color: white;
        border-radius: 20px;
    }

    .publication_main .projectchecker_mi {
        align-self: center;
        height: 27px;
        width: 25px;
        box-shadow: 0px 4px 4px 0px #00000040;
        border: none;
        margin-left: 17px;
    }

    .publication_main .input10 {
        padding: 16px 10px;
    }
    .publication_main .f_25_400_mi{
    font-size: 25px;
    font-weight: 400;
    line-height: 33px;
    letter-spacing: -0.011em;
    margin-bottom: 45px;
    }
    /* media queries */

    @media screen and (max-width: 560px) {

        .publication_main .label-questions,
        .publication_main .label-response {
            width: 100%;
            margin-top: 8px;
        }

        .publication_main .labels,
        .publication_main .response-inputs {
            width: 100%;
            margin-top: 8px;
        }

        .publication_main .selectOption {
            width: 100%;
            margin-top: 8px;
        }

        .publication_main .custom-file {
            width: 100%;
            margin-top: 8px;
        }

        .publication_main .custom-file-label {
            width: -webkit-fill-available;
            padding: 5px;
        }

        .publication_main .sendbtn {
            margin: 0px 15px;
        }
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
        <div class="maincontentdivmi publication_main">

            <div id="top"></div>

            <div class="spacer-40"></div>

            <div class="spacer-120"></div>
            <div class="main">
                <div class="container">
                    <form id="publicforms" method="post" action="" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col">
                                <div class="btn backbtn">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="mb-1" width="10" height="16" viewBox="0 0 10 20" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M9.70711 0.325437C10.0976 0.759353 10.0976 1.46287 9.70711 1.89679L2.41421 10L9.70711 18.1032C10.0976 18.5371 10.0976 19.2406 9.70711 19.6746C9.31658 20.1085 8.68342 20.1085 8.29289 19.6746L0.292893 10.7857C-0.097631 10.3518 -0.0976311 9.64824 0.292893 9.21433L8.29289 0.325437C8.68342 -0.108479 9.31658 -0.108479 9.70711 0.325437Z" fill="white" />
                                    </svg>
                                    Back
                                </div>
                                <h1 class="topMargin"> <?php print forceTranslate(" Arab Urban Development Portal", " البوابة العربية للتنمية الحضرية"); ?></h1>
                                <p> <?php print forceTranslate("Urban Development Organizations (UDOs)", " اسم المشروع منظمات التنمية الحضرية (UDOs)"); ?></p>
                                <p class="topMargin f_25_400_mi">
                                    <?php print forceTranslate(" City where the organization is based in the Arab region  ", " لمدينة التي يقع فيها مقر المنظمة في المنطقة العربية"); ?> ​
                                </p>
                                <div class="form-check d-flex align-content-center px-0">
                                    <?php $classesmargin= $lang == 'en' ? "me-4" : "me-4" ?>
                                    <input class="form-check-input mt-0 ms-0 projectchecker_mi <?php echo $classesmargin; ?>" type="checkbox" value="yes" id="projectyesaraban" />
                                    <div class="dropdown mi_dropdown_blue">
                                        <div class="selectOption  w-100  p-2" id="ocityfirstparent">
                                            <select id="organregioncity" name="organregioncity" class="border-0 w-100">
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
                                    <input type="text" id="nonregionurbanproject" name="nonregionurbanproject" class="rounded-5 p-2 ms-0" disabled>
                                </div>
                            </div>
                            <!-- question answer start -->
                            <div class="row from formMargin text-light ">

                                <div class="text-light d-sm-flex flex-row gap-sm-5 ">
                                    <div class=" label-questions rounded-3 p-2">
                                        <?php print forceTranslate("Question", "سؤال"); ?>
                                    </div>
                                    <div class=" label-response rounded-3 p-2">
                                        <?php print forceTranslate("Response", "إجابة"); ?>
                                    </div>
                                </div>
                                <div class="text-light d-sm-flex flex-row  gap-sm-5">
                                    <div class="labels rounded-3 p-2"><?php print forceTranslate("1. What is the name of your organization in English language? ", ". ما اسم مؤسستك باللغة الإنجليزية؟"); ?></div>
                                    <input id="organizationtitleenglish" name="organizationtitleenglish" type="text" placeholder="Lorem ipsum dolor sit amet" class="response-inputs p-2 rounded-3 border-0" required />
                                </div>
                                <div class="text-light d-sm-flex flex-row  gap-sm-5">
                                    <div class="labels rounded-3 p-2"> <?php print forceTranslate("2. What is the name of your organization in Arabic language?", "2. ما اسم مؤسستك باللغة العربية؟"); ?></div>
                                    <input id="organizationtitlearabic" name="organizationtitlearabic" type="text" placeholder="Lorem ipsum dolor sit amet" class="response-inputs p-2 rounded-3 border-0" required />
                                </div>
                                <div class="text-light d-sm-flex flex-row  gap-sm-5">
                                    <div class="labels rounded-3 p-2"> <?php print forceTranslate("3. Please upload the logo of your organization", "يرجى تحميل شعار مؤسستك"); ?></div>
                                    <div class="custom-file  rounded-3 p-1 d-flex">
                                        <label class="custom-file-label px-sm-4 imagefileslabel" for="customFile" id="imagefileslabel">Upload PNG / JPG File</label>
                                        <input id="imagefiles" type="file" class="custom-file-input" name="imagefiles" />
                                    </div>
                                </div>
                                <div class="text-light d-sm-flex flex-row  gap-sm-5">
                                    <div class="labels rounded-3 p-2"> <?php print forceTranslate("4. Full Address in English", "4. العنوان الكامل باللغة الإنجليزية"); ?></div>
                                    <input id="organenglishaddress" name="organenglishaddress" type="text" placeholder="Copy link" class="response-inputs p-2 rounded-3 border-0" />
                                </div>
                                <div class="text-light d-sm-flex flex-row  gap-sm-5">
                                    <div class="labels rounded-3 p-2"> <?php print forceTranslate("5. Full Address in Arabic", "5. العنوان الكامل باللغة العربية"); ?></div>
                                    <input id="organarabaddress" name="organarabaddress" type="text" placeholder="Copy link" class="response-inputs p-2 rounded-3 border-0" />
                                </div>
                                <div class="text-light d-sm-flex flex-row  gap-sm-5">
                                    <div class="labels rounded-3 p-2"> <?php print forceTranslate("6. Phone number", "6. رقم الهاتف"); ?></div>
                                    <input id="organiznumber" name="organiznumber" type="tel" placeholder="Symbol and Numerical entry only" class="response-inputs p-2 rounded-3 border-0" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" />
                                </div>
                                <div class="text-light d-sm-flex flex-row  gap-sm-5">
                                    <div class="labels rounded-3 p-2"> <?php print forceTranslate("7. Email address", "7. عنوان البريد الإلكتروني"); ?></div>
                                    <input type="email" name="organizationemail" id="organizationemail" placeholder="Lorem ipsum dolor sit amet" class="response-inputs p-2 rounded-3 border-0">

                                </div>
                                <div class="text-light d-sm-flex flex-row  gap-sm-5">
                                    <div class="labels rounded-3 p-2"><?php print forceTranslate("8. Official website", "8. الموقع الرسمي"); ?></div>
                                    <input type="text" name="organizwebsitelink" id="organizwebsitelink" placeholder="Copy link" class="response-inputs p-2 rounded-3 border-0">
                                </div>
                                <div class="text-light d-sm-flex flex-row  gap-sm-5">
                                    <div class="labels rounded-3 p-2"> <?php print forceTranslate("9. Social media pages(facebook)", "9. صفحات التواصل الاجتماعي"); ?></div>
                                    <input type="text" name="organizfacebook" id="organizfacebook" placeholder="Copy link" class="response-inputs p-2 rounded-3 border-0">
                                </div>
                                <div class="text-light d-sm-flex flex-row  gap-sm-5">
                                    <div class="labels rounded-3 p-2"> <?php print forceTranslate("10. Social media pages(Twitter)", "9. صفحات التواصل الاجتماعي"); ?></div>
                                    <input type="text" name="organiztwitter" id="organiztwitter" placeholder="Copy link" class="response-inputs p-2 rounded-3 border-0">
                                </div>
                                <div class="text-light d-sm-flex flex-row  gap-sm-5">
                                    <div class="labels rounded-3 p-2"> <?php print forceTranslate("11. Social media pages (Instagram)", "9. صفحات التواصل الاجتماعي"); ?></div>
                                    <input type="text" name="organizinstagram" id="organizinstagram" placeholder="Copy link" class="response-inputs p-2 rounded-3 border-0">
                                </div>
                                <div class="text-light d-sm-flex flex-row  gap-sm-5">
                                    <div class="labels rounded-3 p-2"> <?php print forceTranslate("12. Social media pages (LinkedIn)", "9. صفحات التواصل الاجتماعي"); ?></div>
                                    <input type="text" name="organizlinkedin" id="organizlinkedin" placeholder="Copy link" class="response-inputs p-2 rounded-3 border-0">
                                </div>
                                <div class="text-light d-sm-flex flex-row  gap-sm-5">
                                    <div class="labels rounded-3 p-2"> <?php print forceTranslate("13. Social media pages (Whatsapp)", "9. صفحات التواصل الاجتماعي"); ?></div>
                                    <input type="text" name="organizwhatsapp" id="organizwhatsapp" placeholder="Copy link" class="response-inputs p-2 rounded-3 border-0">
                                </div>
                                <div class="text-light d-sm-flex flex-row  gap-sm-5">
                                    <div class="labels rounded-3 p-2"><?php print forceTranslate("14. Type of Organization", "10. نوع المنظمة"); ?> </div>
                                    <div class="selectOption rounded-3 p-2">
                                        <select id="organizationtype" name="organizationtype" class="border-0">
                                            <?php $orgtype = get_field_object('field_65a91c579143a');
                                            if ($orgtype['choices']) {
                                                foreach ($orgtype['choices'] as $value => $label) {
                                                    echo "<option value='$value'>$label</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="text-light d-sm-flex flex-row  gap-sm-5">
                                    <div class="labels rounded-3 p-2"><?php print forceTranslate("15. Organization country ", "11. بلد المنظمة"); ?> </div>
                                    <div class="selectOption rounded-3 p-2">
                                        <select id="organizationcountry" name="organizationcountry" class="border-0">
                                            <?php $orgtype = get_field_object('field_65a91c8b9143b');
                                            if ($orgtype['choices']) {
                                                foreach ($orgtype['choices'] as $value => $label) {
                                                    echo "<option value='$value'>$label</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="text-light d-sm-flex flex-row  gap-sm-5">
                                    <div class="labels rounded-3 p-2"><?php print forceTranslate("16. Year of establishment ", "2. سنة التأسيس"); ?></div>
                                    <input type="number" name="yearofestaborgan" id="yearofestaborgan" placeholder="mention the year" class="response-inputs p-2 rounded-3 border-0">

                                </div>
                                <div class="text-light d-sm-flex flex-row  gap-sm-5">
                                    <div class="labels rounded-3 p-2"><?php print forceTranslate("17. Number of employees ", "13. عدد الموظفين"); ?></div>
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
                                    <div class="labels rounded-3 p-2"> <?php print forceTranslate("18. Total Budget ($) [Specify Year]", "14. إجمالي الميزانية ($) [حدد السنة]"); ?></div>
                                    <input type="text" name="organiztotalbudget" id="organiztotalbudget" placeholder="write budget with year" class="response-inputs p-2 rounded-3 border-0">
                                </div>
                                <div class="text-light d-sm-flex flex-row  gap-sm-5">
                                    <div class="labels rounded-3 p-2"> <?php print forceTranslate("19. Geography of intervention", "15. جغرافية التدخل"); ?></div>
                                    <div class="selectOption rounded-3 p-2">
                                        <select id="geoofinterv" name="geoofinterv" class="border-0">
                                            <?php $country = get_field_object('field_65a91fb55550a');
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
                                    <div class="labels rounded-3 p-2"><?php print forceTranslate("20. Areas of intervention (maximum 5) ", "16. مجالات التدخل (الحد الأقصى 5)"); ?></div>
                                    <div class="selectOption rounded-3 p-2">
                                        <select id="areaofinterv" name="areaofinterv" class="border-0">
                                            <?php $country = get_field_object('field_65a920b05550c');
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
                                    <div class="labels rounded-3 p-2"> <?php print forceTranslate("21. Types of intervention (maximum 3)", "17. أنواع التدخل (الحد الأقصى 3)"); ?></div>
                                    <div class="selectOption rounded-3 p-2">
                                        <select id="typeofinterv" name="typeofinterv" class="border-0">
                                            <?php $country = get_field_object('field_65a920d45550d');
                                            if ($country['choices']) {
                                                foreach ($country['choices'] as $value => $label) {
                                                    echo "<option value='$value'>$label</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <input type="submit" class="btn sendbtn my-3 rounded-3" value="Send">
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
                    if ($(this).val() == "yes") {
                        $("#organregioncity").removeAttr('disabled');
                        $("#nonregionurbanproject").attr('disabled', 'true');
                        $("#nonregionurbanproject").val('');
                        $("#projectnoaraban").removeAttr("checked");
                    } else {
                        $("#organregioncity").removeAttr('disabled');
                        $("#organregioncity").attr('disabled', 'true');
                        $("#organregioncity").val(0);
                        $("#projectyesaraban").removeAttr("checked");
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