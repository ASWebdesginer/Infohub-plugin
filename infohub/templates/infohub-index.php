<?php

/**

 * Infohub Landing Page

 **/



$lang = pll_current_language();


$projects = getprojectslats();



?>

<?php if ($lang == "en") { ?>

    <div class="csc bordered-shadow">
        <div class="">
            <div class="ratio ratio-16x9">
                <video id="background-video" autoplay="" playsinline="" loop="" controls="" muted="">
                    <source src="<?php print get_site_url(); ?>/wp-content/uploads/2024/02/بوابة-التنمية-الحضرية-العربية-جديد.mp4" type="video/mp4" />
                </video>
            </div>
        </div>
    </div>

    <div class="spacer-40"></div>

    <p class="fnt-20 fnt-dark-graynt text-center">
        The Arab Urban Development Portal is designed as a comprehensive data library for the benefit of institutions, professionals, and the public. It is populated through contributions by multiple institutions and serves as the central
        repository of all relevant data and literature regarding urban development practices in the Arab word.
    </p>

    <p class="fnt-20 fnt-dark-graynt text-center">
        It includes four main pages dedicated respectively to Arab CITIES, urban development PROJECTS, urban development ORGANIZATIONS and PUBLICATIONS related to urban development in the Arab region.
    </p>

    <div class="spacer-20"></div>
    <div class="mi_mobile_grey">

        <center>
            <p class="fnt-20 fnt-dark-graynt"><b>Contribute by providing information on</b></p>
        </center>

        <div class="spacer-20"></div>

        <div class="row">
            <?php if (is_user_logged_in()) { ?>

                <div class="col-12 col-md-3"></div>

                <div class="col-md-2 mi_w_22">
                    <a href="<?php print home_url(); ?>/infohub/registration/cities" class="btn btn-primary btn-blue w-100">Cities</a>
                </div>

                <div class="col-md-2 mi_w_36">
                    <a href="<?php print home_url(); ?>/infohub/registration/organizations" class="btn btn-primary btn-blue w-100">Organizations</a>
                </div>

                <div class="col-md-2 mi_w_36">
                    <a href="<?php print home_url(); ?>/infohub/registration/publications" class="btn btn-primary btn-blue w-100">Publications</a>
                </div>

                <div class="col-12 col-md-3"></div>

            <?php } else { ?>

                <div class="col-12 col-md-3"></div>

                <div class="col-md-2 mi_w_22">
                    <a href="<?php print home_url(); ?>/infohub/registration/cities" class="btn btn-primary btn-blue w-100">Cities</a>
                </div>

                <div class="col-md-2 mi_w_36">
                    <a href="<?php print home_url(); ?>/infohub/registration/organizations" class="btn btn-primary btn-blue w-100">Organizations</a>
                </div>

                <div class="col-md-2 mi_w_36">
                    <a href="<?php print home_url(); ?>/infohub/registration/publications" class="btn btn-primary btn-blue w-100">Publications</a>
                </div>

                <div class="col-12 col-md-3"></div>

            <?php } ?>
        </div>

        <div class="spacer-40"></div>

        <p class="fnt-20 fnt-dark-graynt text-center">You can read the methodology adopted for the Arab Urban Development Portal on <a href="" class="fnt-blue">this link</a>.</p>

        <p class="fnt-20 fnt-dark-graynt text-center">To provide any comment or any complementary information on any of the entries, please write to the following email address: <a href="mailto:infohub@araburban.org" class="fnt-blue">infohub@araburban.org</a></p>

    </div>
<?php } ?>

<?php if ($lang == "ar") { ?>

    <div class="csc bordered-shadow">
        <div class="">
            <div class="ratio ratio-16x9">
                <video id="background-video" autoplay="" playsinline="" loop="" controls="" muted="">
                    <source src="<?php print get_site_url(); ?>/wp-content/uploads/2024/02/audi-infohub-inst-2.mp4" type="video/mp4" />
                </video>
            </div>
        </div>
    </div>

    <div class="spacer-40"></div>

    <p class="fnt-20 fnt-dark-graynt text-center">
        بوابة التنمية الحضرية العربية هي منصة لجمع ومشاركة البيانات عن المدن والمشاريع والمنظمات والمنشورات الخاصة بالتنمية الحضرية في المنطقة العربية. يتم تأمين البيانات الخاصة بالمدن والمؤسسات والمنشورات من قبل البلديات والمؤسسات التنموية
        المعنية..
    </p>

    <p class="fnt-20 fnt-dark-graynt text-center">
        تتضمن البوابة أربع صفحات رئيسية مخصصة للمدن العربية، و مشاريع التنمية الحضرية، و منظمات التنمية الحضرية و المنشورات المتعلقة بالتنمية الحضرية في المنطقة العربية.
    </p>

    <div class="spacer-20"></div>
    <div class="mi_mobile_grey">

        <center>
            <p class="fnt-20 fnt-dark-graynt"><b>ساهم من خلال تقديم معلومات حول</b></p>
        </center>

        <div class="spacer-20"></div>

        <div class="row">
            <?php if (is_user_logged_in()) { ?>

                <div class="col-12 col-md-3"></div>

                <div class="col col-md-2">
                    <a href="<?php print home_url(); ?>/infohub/registration/cities" class="btn btn-primary btn-blue w-100">المدن</a>
                </div>

                <div class="col col-md-2">
                    <a href="<?php print home_url(); ?>/infohub/registration/organizations" class="btn btn-primary btn-blue w-100">المنظمات</a>
                </div>

                <div class="col col-md-2">
                    <a href="<?php print home_url(); ?>/infohub/registration/publications" class="btn btn-primary btn-blue w-100">المنشورات</a>
                </div>

                <div class="col-12 col-md-3"></div>

            <?php } else { ?>

                <div class="col-12 col-md-3"></div>

                <div class="col col-md-2">
                    <a href="<?php print home_url(); ?>/infohub-ar/registration/cities" class="btn btn-primary btn-blue w-100">المدن</a>
                </div>

                <div class="col col-md-2">
                    <a href="<?php print home_url(); ?>/infohub-ar/registration/organizations" class="btn btn-primary btn-blue w-100">المنظمات</a>
                </div>

                <div class="col col-md-2">
                    <a href="<?php print home_url(); ?>/infohub-ar/registration/publications" class="btn btn-primary btn-blue w-100">المنشورات</a>
                </div>

                <div class="col-12 col-md-3"></div>

            <?php } ?>
        </div>

        <div class="spacer-40"></div>

        <p class="fnt-20 fnt-dark-graynt text-center">المنهجية المعتمدة للبوابة العربية للتنمية الحضرية على هذا <a href="" class="fnt-blue">الرابط</a>.</p>

        <p class="fnt-20 fnt-dark-graynt text-center">لتقديم أي تعليق أو أية معلومات مكملة حول البيانات المعروضة على المنصة، يرجى الكتابة إلى عنوان البريد اإللكتروني التالي: <a href="mailto:infohub@araburban.org" class="fnt-blue">infohub@araburban.org</a></p>
    </div>
<?php } ?>

<div class="spacer-40"></div>

<!--search and tabs-->

<div class="search-tabs">
    <div class="row align-items-center">
        <div class="col-md-3">
            <div class="infohub-searchbar shadowed">
                <form id="searchform" action="" method="post">
                    <div class="infohub-search-bar">
                        <div class="input-group">
                            <input type="text" name="infohub-search" class="form-control" id="infohub-search" placeholder="<?php print forceTranslate("Search", "ابحث"); ?>">
                            <div class="input-group-text">
                                <i class="fa-solid fa-magnifying-glass infohub-search-btn"></i>
                            </div>
                            <input type="hidden" name="post_type" value="project" />
                            <div id="search-results" class="d-flex flex-column">
                                <div class="col-12" id="search_loader">
                                    <img src="<?php print getPluginDirectory(); ?>img/loader.gif" class="img-fluid" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="submit" value="Submit" class="d-none">
                </form>
            </div>

            <div class="spacer-20"></div>
        </div>

        <div class="col-md-8">
            <ul class="nav nav-tabs nav-pills nav-fill shadowed" id="infohub-tabs">
                <li class="nav-item">
                    <button class="nav-link" onClick="getTabsType('cities');" data-bs-toggle="tab" data-bs-target="#infohub-cities-tab">
                        <?php print forceTranslate("Cities", "المدن"); ?>
                    </button>
                </li>

                <li class="nav-item">
                    <button class="nav-link active" onClick="getTabsType('projects');" data-bs-toggle="tab" data-bs-target="#infohub-projects-tab">
                        <?php print forceTranslate("Projects", "المشاريع"); ?>
                    </button>
                </li>

                <li class="nav-item">
                    <button class="nav-link" onClick="getTabsType('organizations');" data-bs-toggle="tab" data-bs-target="#infohub-organizations-tab">
                        <?php print forceTranslate("Organizations", "المنظمات"); ?>
                    </button>
                </li>

                <li class="nav-item">
                    <button class="nav-link" onClick="getTabsType('publications');" data-bs-toggle="tab" data-bs-target="#infohub-publications-tab">
                        <?php print forceTranslate("Publications", "المنشورات"); ?>
                    </button>
                </li>
            </ul>

            <div class="spacer-20"></div>
        </div>

        <div class="col-md-1">
            <center>
                <div class="row">
                    <div class="col col-md-12 mobile-view">
                        <button id="infohub-mobile-filter" class="btn btn-light btn-none fnt-20 fnt-blue" data-bs-toggle="modal" data-bs-target="#infohub-filter-modal">
                            <i class="fa-solid fa-filter"></i>
                        </button>
                    </div>

                    <div class="col col-md-6">
                        <button id="infohub-view-map" class="btn btn-light btn-none fnt-20 fnt-blue">
                            <i class="fa-solid fa-map-location-dot"></i>
                        </button>
                    </div>

                    <div class="col col-md-6">
                        <button id="infohub-view-list" class="btn btn-light btn-none fnt-20 fnt-blue">
                            <i class="fa-solid fa-list"></i>
                        </button>
                    </div>
                </div>
            </center>

            <div class="spacer-20"></div>
        </div>
    </div>
</div>

<!-- <div class="spacer-40"></div> -->

<script>
    <?php //print getSelectOption('field_65070d4d2ac3c');
    ?>
</script>

<!--filter and contents-->

<div class="filter-content">
    <div class="row">
        <div class="col-md-3">
            <div class="infohub-filter desktop-view">

                <div id="infohub-cities-tab-filter" class="filterCont hideThis">
                    <div class="infohub-filter-head">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <p class="fnt-white fnt-18 remMar"><?php print forceTranslate("Filter", "التصنيف"); ?></p>
                            </div>

                            <div class="col-6">
                                <center>
                                    <button onClick="resetThis('#infohub-cities-tab-filter-form','cities');" class="btn btn-primary btn-small w-100 btn-blue">
                                        <?php print forceTranslate("Reset", "إعادة ضبط"); ?>
                                    </button>
                                </center>
                            </div>
                        </div>
                    </div>

                    <div class="infohub-filter-body">
                        <form id="infohub-cities-tab-filter-form" action="" method="post">
                            <select name="filter-cities-country[]" id="filter-cities-country" onchange="getCountry('filter-cities-country');" class="form-control selectpicker" data-live-search="true" multiple title="<?php print forceTranslate("Country", "الدولة"); ?>">
                                <?php print getSelectOptionList("city", "country", "country", "field_65070d4d2ac3c"); ?>
                            </select>

                            <select name="filter-cities-city[]" id="filter-cities-city" class="form-control selectpicker" data-live-search="true" multiple disabled title="<?php print forceTranslate("City", "المدينة"); ?>">
                            </select>

                            <select name="filter-cities-size[]" id="filter-cities-size" class="form-control selectpicker" data-live-search="true" multiple title="<?php print forceTranslate("City Size", "حجم المدينة"); ?>">
                                <?php print getSelectOptionList("city", "city_size", "city_size", "field_65aa3ca620185"); ?>
                            </select>

                            <div class="spacer-10"></div>

                            <button onClick="getFilter('#infohub-cities-tab-filter-form','cities');" class="btn btn-primary btn-small w-100 btn-blue btn-submit-filter">
                                <?php print forceTranslate("Submit", "إرسال"); ?>
                            </button>
                        </form>
                    </div>
                </div>

                <div id="infohub-projects-tab-filter" class="filterCont">
                    <div class="infohub-filter-head">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <p class="fnt-white fnt-18 remMar"><?php print forceTranslate("Filter", "التصنيف"); ?></p>
                            </div>

                            <div class="col-6">
                                <button onClick="resetThis('#infohub-projects-tab-filter-form','projects');" class="btn btn-primary btn-small w-100 btn-blue">
                                    <?php print forceTranslate("Reset", "إعادة ضبط"); ?>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="infohub-filter-body">
                        <form id="infohub-projects-tab-filter-form" action="" method="post">
                            <select name="filter-projects-country[]" id="filter-projects-country" onchange="getCountry('filter-projects-country');" class="form-control selectpicker" data-live-search="true" title="<?php print forceTranslate("Country", "الدولة"); ?>" multiple>
                                <?php print getSelectOptionList("project", "section_1", "country", "field_65a8f63a545a8"); ?>
                            </select>

                            <select name="filter-projects-city[]" id="filter-projects-city" class="form-control selectpicker" data-live-search="true" multiple disabled title="<?php print forceTranslate("City", "المدينة"); ?>">

                            </select>

                            <select name="filter-projects-topics[]" id="filter-projects-topics" class="form-control selectpicker" data-live-search="true" multiple title="<?php print forceTranslate("Topics", "الكلمات المفتاحية"); ?>">
                                <?php print getSelectOptionList("project", "section_2", "topic_words", "field_65a94601c269b"); ?>
                            </select>

                            <div class="spacer-10"></div>

                            <button onClick="getFilter('#infohub-projects-tab-filter-form','projects');" class="btn btn-primary btn-small w-100 btn-blue btn-submit-filter">
                                <?php print forceTranslate("Submit", "إرسال"); ?>
                            </button>
                        </form>
                    </div>
                </div>

                <div id="infohub-organizations-tab-filter" class="filterCont hideThis">
                    <div class="infohub-filter-head">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <p class="fnt-white fnt-18 remMar"><?php print forceTranslate("Filter", "التصنيف"); ?></p>
                            </div>

                            <div class="col-6">
                                <center>
                                    <button onClick="resetThis('#infohub-organizations-tab-filter-form','organizations');" class="btn btn-primary btn-small w-100 btn-blue">
                                        <?php print forceTranslate("Reset", "إعادة ضبط"); ?>
                                    </button>
                                </center>
                            </div>
                        </div>
                    </div>

                    <div class="infohub-filter-body">
                        <form id="infohub-organizations-tab-filter-form" action="" method="post">
                            <select name="filter-organizations-country[]" id="filter-organizations-country" onchange="getCountry('filter-organizations-country');" class="form-control selectpicker" data-live-search="true" multiple title="<?php print forceTranslate("Country", "بلد المنظمة"); ?>">
                                <?php print getSelectOptionList("organization", "organization_country", "country", "field_65a91c8b9143b"); ?>
                            </select>

                            <select name="filter-organizations-type[]" id="filter-organizations-type" class="form-control selectpicker" data-live-search="true" multiple title="<?php print forceTranslate("Organization Type", "نوع المنظمة"); ?>">
                                <?php print getSelectOptionList("organization", "type_of_organization", "type_of_organization", "field_65a91c579143a"); ?>
                            </select>

                            <select name="filter-organizations-areas[]" id="filter-organizations-areas" class="form-control selectpicker" data-live-search="true" multiple title="<?php print forceTranslate("Areas of Intervention", "مجالات التدخل"); ?>">
                                <?php print getSelectOptionList("organization", "areas_intervention", "areas_intervention", "field_65a920b05550c"); ?>
                            </select>

                            <select name="filter-organizations-size[]" id="filter-organizations-size" class="form-control selectpicker" data-live-search="true" multiple title="<?php print forceTranslate("Organization Size", "حجم المنظمة"); ?>">
                                <?php print getSelectOptionList("organization", "number_of_employees", "number_of_employees", "field_65a91cfbc015b"); ?>
                            </select>

                            <div class="spacer-10"></div>

                            <button onClick="getFilter('#infohub-organizations-tab-filter-form','organizations');" class="btn btn-primary btn-small w-100 btn-blue btn-submit-filter">
                                <?php print forceTranslate("Submit", "إرسال"); ?>
                            </button>
                        </form>
                    </div>
                </div>

                <div id="infohub-publications-tab-filter" class="filterCont hideThis">
                    <div class="infohub-filter-head">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <p class="fnt-white fnt-18 remMar"><?php print forceTranslate("Filter", "التصنيف"); ?></p>
                            </div>

                            <div class="col-6">
                                <center>
                                    <button onClick="resetThis('#infohub-publications-tab-filter-form','publications');" class="btn btn-primary btn-small w-100 btn-blue">
                                        <?php print forceTranslate("Reset", "إعادة ضبط"); ?>
                                    </button>
                                </center>
                            </div>
                        </div>
                    </div>

                    <div class="infohub-filter-body">
                        <form id="infohub-publications-tab-filter-form" action="" method="post">
                            <select name="filter-publications-year[]" id="filter-publications-year" class="form-control selectpicker" multiple data-live-search="true" title="<?php print forceTranslate("Year of Publication", "تاريخ النشر"); ?>">
                                <?php
                                $starting_year  = date("Y");
                                $ending_year    = 2022;

                                for ($i = $starting_year; $i >= $ending_year; $i--) {
                                    $years[] = '<option value="' . $i . '">' . $i . '</option>';
                                }

                                ?>

                                <?php print implode("", $years);  ?>
                            </select>

                            <select name="filter-publications-type[]" id="filter-publications-type" class="form-control selectpicker" data-live-search="true" multiple title="<?php print forceTranslate("Publication Type", "نوع المنشور"); ?>">
                                <?php print getSelectOptionList("publication", "publication_type", "publication_type", "field_65aa28cb6c1c1"); ?>
                            </select>

                            <select name="filter-publications-theme[]" id="filter-publications-theme" class="form-control selectpicker" data-live-search="true" multiple title="<?php print forceTranslate("Theme", "الموضوع"); ?>">
                                <?php print getSelectOptionList("publication", "theme", "theme", "field_65aa29a3b255f"); ?>
                            </select>

                            <select name="filter-publications-language[]" id="filter-publications-language" class="form-control selectpicker" data-live-search="true" multiple title="<?php print forceTranslate("Language", "لغة المنشور"); ?>">
                                <?php print getSelectOptionList("publication", "language_version", "language_version", "field_65aa2726e1809"); ?>
                            </select>

                            <div class="spacer-10"></div>

                            <button onClick="getFilter('#infohub-publications-tab-filter-form','publications');" class="btn btn-primary btn-small w-100 btn-blue btn-submit-filter">
                                <?php print forceTranslate("Submit", "إرسال"); ?>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="spacer-20"></div>
        </div>

        <div class="col-md-9">
            <div id="infohub-content" class="tab-content">
                <div id="infohub-cities-tab" class="tab-pane fade">
                    <div class="infohub-loader hideThis">
                        <div class="row">
                            <div class="col-5"></div>

                            <div class="col-2">
                                <img src="<?php print getPluginDirectory(); ?>img/loader.gif" class="img-fluid" />
                            </div>

                            <div class="col-5"></div>
                        </div>

                        <center></center>
                    </div>

                    <!-- <div class="alert alert-info" role="alert">

                        <?php print forceTranslate("No data found...", "لم يتم العثور على بيانات..."); ?>

                    </div> -->

                    <div class="infohub-list">
                        <?php //echo do_shortcode("[cities]");
                        ?>
                    </div>

                    <div class="spacer-40"></div>

                    <div class="row">
                        <div class="col-md4"></div>

                        <div class="col-md4">
                            <center>
                                <div class="infohub-loader-more hideThis">
                                    <div class="row">
                                        <div class="col-5"></div>

                                        <div class="col-2">
                                            <img src="<?php print getPluginDirectory(); ?>img/loader.gif" class="img-fluid" />
                                        </div>

                                        <div class="col-5"></div>
                                    </div>

                                    <center></center>
                                </div>

                                <a class="btn btn-primary btn-blue hideThis loadMore" onClick="getPaged('cities');" data-bs-target="#infohub-cities-tab" data-paged="1">
                                    <?php print forceTranslate("Load More", "المزيد"); ?>
                                </a>
                            </center>
                        </div>

                        <div class="col-md4"></div>
                    </div>
                </div>

                <div id="infohub-projects-tab" class="tab-pane fade show active">
                    <div class="infohub-loader hideThis">
                        <div class="row">
                            <div class="col-5"></div>

                            <div class="col-2">
                                <img src="<?php print getPluginDirectory(); ?>img/loader.gif" class="img-fluid" />
                            </div>

                            <div class="col-5"></div>
                        </div>

                        <center></center>
                    </div>

                    <div class="infohub-list">
                        <?php echo do_shortcode("[projects]"); ?>
                    </div>

                    <div class="spacer-40"></div>

                    <div class="row">
                        <div class="col-md-4"></div>

                        <div class="col-md-4">
                            <center>
                                <div class="infohub-loader-more hideThis">
                                    <div class="row">
                                        <div class="col-5"></div>

                                        <div class="col-2">
                                            <img src="<?php print getPluginDirectory(); ?>img/loader.gif" class="img-fluid" />
                                        </div>

                                        <div class="col-5"></div>
                                    </div>

                                    <center></center>
                                </div>

                                <a class="btn btn-primary btn-blue hideThis loadMore" onClick="getPaged('projects');" data-paged="0">
                                    <?php print forceTranslate("Load More", "المزيد"); ?>
                                </a>
                            </center>
                        </div>

                        <div class="col-md4"></div>
                    </div>
                </div>

                <div id="infohub-organizations-tab" class="tab-pane fade">
                    <div class="infohub-loader hideThis">
                        <div class="row">
                            <div class="col-5"></div>

                            <div class="col-2">
                                <img src="<?php print getPluginDirectory(); ?>img/loader.gif" class="img-fluid" />
                            </div>

                            <div class="col-5"></div>
                        </div>

                        <center></center>
                    </div>

                    <div class="infohub-list"></div>

                    <div class="spacer-40"></div>

                    <div class="row">
                        <div class="col-md4"></div>

                        <div class="col-md4">
                            <center>
                                <div class="infohub-loader-more hideThis">
                                    <div class="row">
                                        <div class="col-5"></div>

                                        <div class="col-2">
                                            <img src="<?php print getPluginDirectory(); ?>img/loader.gif" class="img-fluid" />
                                        </div>

                                        <div class="col-5"></div>
                                    </div>

                                    <center></center>
                                </div>

                                <a class="btn btn-primary btn-blue hideThis loadMore" onClick="getPaged('organizations');" data-paged="0">
                                    <?php print forceTranslate("Load More", "المزيد"); ?>
                                </a>
                            </center>
                        </div>

                        <div class="col-md4"></div>
                    </div>
                </div>

                <div id="infohub-publications-tab" class="tab-pane fade">
                    <div class="infohub-loader hideThis">
                        <div class="row">
                            <div class="col-5"></div>

                            <div class="col-2">
                                <img src="<?php print getPluginDirectory(); ?>img/loader.gif" class="img-fluid" />
                            </div>

                            <div class="col-5"></div>
                        </div>

                        <center></center>
                    </div>

                    <!-- <div class="alert alert-info" role="alert">

                        <?php print forceTranslate("No data found...", "لم يتم العثور على بيانات..."); ?>

                    </div> -->

                    <div class="infohub-list"></div>

                    <div class="spacer-40"></div>

                    <div class="row">
                        <div class="col-md4"></div>

                        <div class="col-md4">
                            <center>
                                <div class="infohub-loader-more hideThis">
                                    <div class="row">
                                        <div class="col-5"></div>

                                        <div class="col-2">
                                            <img src="<?php print getPluginDirectory(); ?>img/loader.gif" class="img-fluid" />
                                        </div>

                                        <div class="col-5"></div>
                                    </div>

                                    <center></center>
                                </div>

                                <a class="btn btn-primary btn-blue loadMore" onClick="getPaged('publications');" data-bs-target="#infohub-publications-tab" data-paged="1">

                                    <?php print forceTranslate("Load More", "المزيد"); ?>

                                </a>

                            </center>
                        </div>

                        <div class="col-md4"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--filter modal-->
<div class="modal fade" id="infohub-filter-modal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="col-md-3">
                    <div class="infohub-filter">

                        <div id="infohub-cities-tab-filter-mobiles" class="filterCont hideThis">
                            <div class="infohub-filter-head">
                                <div class="row align-items-center">
                                    <div class="col-6">
                                        <p class="fnt-white fnt-18 remMar"><?php print forceTranslate("Filter", "التصنيف"); ?></p>
                                    </div>

                                    <div class="col-6">
                                        <center>
                                            <button onClick="resetThis('#infohub-cities-tab-filter-form','cities');" class="btn btn-primary btn-small w-100 btn-blue">
                                                <?php print forceTranslate("Reset", "إعادة ضبط"); ?>
                                            </button>
                                        </center>
                                    </div>
                                </div>
                            </div>

                            <div class="infohub-filter-body">
                                <form id="infohub-cities-tab-filter-form-mobile " action="" method="post">
                                    <select name="filter-cities-country[]" id="filter-cities-country" onchange="getCountry('filter-cities-country');" class="form-control selectpicker" data-live-search="true" multiple title="<?php print forceTranslate("Country", "الدولة"); ?>">
                                        <?php print getSelectOptionList("city", "country", "country", "field_65070d4d2ac3c"); ?>
                                    </select>

                                    <select name="filter-cities-city[]" id="filter-cities-city" class="form-control selectpicker" data-live-search="true" multiple disabled title="<?php print forceTranslate("City", "المدينة"); ?>">
                                    </select>

                                    <select name="filter-cities-size[]" id="filter-cities-size" class="form-control selectpicker" data-live-search="true" multiple title="<?php print forceTranslate("City Size", "حجم المدينة"); ?>">
                                        <?php print getSelectOptionList("city", "city_size", "city_size", "field_65aa3ca620185"); ?>
                                    </select>

                                    <div class="spacer-10"></div>

                                    <button onClick="getFilter('#infohub-cities-tab-filter-form-mobile','cities');" class="btn btn-primary btn-small w-100 btn-blue btn-submit-filter">
                                        <?php print forceTranslate("Submit", "إرسال"); ?>
                                    </button>
                                </form>
                            </div>
                        </div>

                        <div id="infohub-projects-tab-filter-mobiles" class="filterCont">
                            <div class="infohub-filter-head">
                                <div class="row align-items-center">
                                    <div class="col-6">
                                        <p class="fnt-white fnt-18 remMar"><?php print forceTranslate("Filter", "التصنيف"); ?></p>
                                    </div>

                                    <div class="col-6">
                                        <button onClick="resetThis('#infohub-projects-tab-filter-form','projects');" class="btn btn-primary btn-small w-100 btn-blue">
                                            <?php print forceTranslate("Reset", "إعادة ضبط"); ?>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="infohub-filter-body">
                                <form id="infohub-projects-tab-filter-form-mobile" action="" method="post">
                                    <select name="filter-projects-country[]" id="filter-projects-country" onchange="getCountry('filter-projects-country');" class="form-control selectpicker" data-live-search="true" title="<?php print forceTranslate("Country", "الدولة"); ?>" multiple>
                                        <?php print getSelectOptionList("project", "section_1", "country", "field_65a8f63a545a8"); ?>
                                    </select>

                                    <select name="filter-projects-city[]" id="filter-projects-city" class="form-control selectpicker" data-live-search="true" multiple disabled title="<?php print forceTranslate("City", "المدينة"); ?>">

                                    </select>

                                    <select name="filter-projects-topics[]" id="filter-projects-topics" class="form-control selectpicker" data-live-search="true" multiple title="<?php print forceTranslate("Topics", "الكلمات المفتاحية"); ?>">
                                        <?php print getSelectOptionList("project", "section_2", "topic_words", "field_65a94601c269b"); ?>
                                    </select>

                                    <div class="spacer-10"></div>

                                    <button onClick="getFilter('#infohub-projects-tab-filter-form-mobile','projects');" class="btn btn-primary btn-small w-100 btn-blue btn-submit-filter">
                                        <?php print forceTranslate("Submit", "إرسال"); ?>
                                    </button>
                                </form>
                            </div>
                        </div>

                        <div id="infohub-organizations-tab-filter-mobiles" class="filterCont hideThis">
                            <div class="infohub-filter-head">
                                <div class="row align-items-center">
                                    <div class="col-6">
                                        <p class="fnt-white fnt-18 remMar"><?php print forceTranslate("Filter", "التصنيف"); ?></p>
                                    </div>

                                    <div class="col-6">
                                        <center>
                                            <button onClick="resetThis('#infohub-organizations-tab-filter-form','organizations');" class="btn btn-primary btn-small w-100 btn-blue">
                                                <?php print forceTranslate("Reset", "إعادة ضبط"); ?>
                                            </button>
                                        </center>
                                    </div>
                                </div>
                            </div>

                            <div class="infohub-filter-body">
                                <form id="infohub-organizations-tab-filter-form-mobile" action="" method="post">
                                    <select name="filter-organizations-country[]" id="filter-organizations-country" onchange="getCountry('filter-organizations-country');" class="form-control selectpicker" data-live-search="true" multiple title="<?php print forceTranslate("Country", "بلد المنظمة"); ?>">
                                        <?php print getSelectOptionList("organization", "organization_country", "country", "field_65a91c8b9143b"); ?>
                                    </select>

                                    <select name="filter-organizations-type[]" id="filter-organizations-type" class="form-control selectpicker" data-live-search="true" multiple title="<?php print forceTranslate("Organization Type", "نوع المنظمة"); ?>">
                                        <?php print getSelectOptionList("organization", "type_of_organization", "type_of_organization", "field_65a91c579143a"); ?>
                                    </select>

                                    <select name="filter-organizations-areas[]" id="filter-organizations-areas" class="form-control selectpicker" data-live-search="true" multiple title="<?php print forceTranslate("Areas of Intervention", "مجالات التدخل"); ?>">
                                        <?php print getSelectOptionList("organization", "areas_intervention", "areas_intervention", "field_65a920b05550c"); ?>
                                    </select>

                                    <select name="filter-organizations-size[]" id="filter-organizations-size" class="form-control selectpicker" data-live-search="true" multiple title="<?php print forceTranslate("Organization Size", "حجم المنظمة"); ?>">
                                        <?php print getSelectOptionList("organization", "number_of_employees", "number_of_employees", "field_65a91cfbc015b"); ?>
                                    </select>

                                    <div class="spacer-10"></div>

                                    <button onClick="getFilter('#infohub-organizations-tab-filter-form-mobile','organizations');" class="btn btn-primary btn-small w-100 btn-blue btn-submit-filter">
                                        <?php print forceTranslate("Submit", "إرسال"); ?>
                                    </button>
                                </form>
                            </div>
                        </div>

                        <div id="infohub-publications-tab-filter-mobiles" class="filterCont hideThis">
                            <div class="infohub-filter-head">
                                <div class="row align-items-center">
                                    <div class="col-6">
                                        <p class="fnt-white fnt-18 remMar"><?php print forceTranslate("Filter", "التصنيف"); ?></p>
                                    </div>

                                    <div class="col-6">
                                        <center>
                                            <button onClick="resetThis('#infohub-publications-tab-filter-form','publications');" class="btn btn-primary btn-small w-100 btn-blue">
                                                <?php print forceTranslate("Reset", "إعادة ضبط"); ?>
                                            </button>
                                        </center>
                                    </div>
                                </div>
                            </div>

                            <div class="infohub-filter-body">
                                <form id="infohub-publications-tab-filter-form-mobile" action="" method="post">
                                    <select name="filter-publications-year[]" id="filter-publications-year" class="form-control selectpicker" multiple data-live-search="true" title="<?php print forceTranslate("Year of Publication", "تاريخ النشر"); ?>">
                                        <?php
                                        $starting_year  = date("Y");
                                        $ending_year    = 2022;

                                        for ($i = $starting_year; $i >= $ending_year; $i--) {
                                            $years[] = '<option value="' . $i . '">' . $i . '</option>';
                                        }
                                        $uniqueArray = array_unique($years);
                                        // var_dump($uniqueArray);
                                        ?>

                                        <?php print implode("", $uniqueArray);  ?>
                                    </select>

                                    <select name="filter-publications-type[]" id="filter-publications-type" class="form-control selectpicker" data-live-search="true" multiple title="<?php print forceTranslate("Publication Type", "نوع المنشور"); ?>">
                                        <?php print getSelectOptionList("publication", "publication_type", "publication_type", "field_65aa28cb6c1c1"); ?>
                                    </select>

                                    <select name="filter-publications-theme[]" id="filter-publications-theme" class="form-control selectpicker" data-live-search="true" multiple title="<?php print forceTranslate("Theme", "الموضوع"); ?>">
                                        <?php print getSelectOptionList("publication", "theme", "theme", "field_65aa29a3b255f"); ?>
                                    </select>

                                    <select name="filter-publications-language[]" id="filter-publications-language" class="form-control selectpicker" data-live-search="true" multiple title="<?php print forceTranslate("Language", "لغة المنشور"); ?>">
                                        <?php print getSelectOptionList("publication", "language_version", "language_version", "field_65aa2726e1809"); ?>
                                    </select>

                                    <div class="spacer-10"></div>

                                    <button onClick="getFilter('#infohub-publications-tab-filter-form-mobile','publications');" class="btn btn-primary btn-small w-100 btn-blue btn-submit-filter">
                                        <?php print forceTranslate("Submit", "إرسال"); ?>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="spacer-20"></div>
                </div>
            </div>
        </div>
    </div>
</div>



<!--scripts-->

<script>
    jQuery(document).ready(function() {

        jQuery("#infohub-view-map").on("click touch", function() {

            jQuery(".list-view").fadeOut(600);
            jQuery(".map-view").fadeIn(600);
            jQuery(".loadMore").addClass("hideThis");

            var getMapId = jQuery(".tab-pane.active .infohub-map").attr("id");

            if (getMapId == "infohub-projects-map") {
                var markerarray = <?php echo json_encode($projects); ?>;
                runMap(getMapId, markerarray);
            }

            if (getMapId == "infohub-cities-map") {
                runCityMap(getMapId);
            }

        });

        jQuery("#infohub-view-list").on("click touch", function() {

            jQuery(".list-view").fadeIn(600);
            jQuery(".map-view").fadeOut(600);
            jQuery(".loadMore").removeClass("hideThis");
            //map.off();
            //map.remove();

        });
        jQuery("#search_loader").hide();
        jQuery("#infohub-search").keyup(function(e) {
            e.preventDefault();
            jQuery("#search_loader").show();

            var form = jQuery(this).val();
            var tabsr = jQuery("#infohub-tabs").find(".active").text().toLowerCase().trim();
            // var fd = new FormData(form[0]);
            // fd.append("tabs", tabs);
            // fd.append("action", "searchProj");
            const outputElement = document.getElementById("search-results"); // Replace with the ID of your output element
            console.log(form);

            jQuery.ajax({
                type: "POST",
                url: "/wp-admin/admin-ajax.php",
                data: {
                    action: 'searchProj',
                    datas: form,
                    tabs: tabsr
                },
                success: function(projects) {
                    console.log(JSON.parse(projects)); 
                    jQuery("#search_loader").hide();

                    const inputText = form.toLowerCase();
                    const filteredProjects = JSON.parse(projects).filter(project => {
                        const projectName = project.name.toLowerCase();
                        return projectName.includes(inputText);
                    });

                    console.log(filteredProjects);
                    outputElement.innerHTML = ''; // Clear the output element
                    filteredProjects.forEach(project => {
                        outputElement.insertAdjacentHTML('beforeend', `<a href="${project.link}" class="p-2 searchitem">${project.name}</a>`); // Replace 'project.name' with the property you want to display
                    });

                },
                error: function(xhr, status, error) {
                    console.error("AJAX Error:", status, error);
                }
            });
        });

    });

    function filterData(inputValue, data, outputElement) {
        const filteredData = data.filter((item) =>
            item.name.toLowerCase().includes(inputValue.toLowerCase())
        );
        outputElement.textContent = filteredData.map((item) => item.name).join("\n");
    }

    function getTabsType(id) {

        jQuery("#infohub-" + id + "-tab .infohub-loader").removeClass("hideThis");

        //console.log(id);

        var fd = new FormData();
        fd.append("action", "infohubListAjax");
        fd.append("data", id);

        jQuery.ajax({

            type: "POST",
            url: "/wp-admin/admin-ajax.php",
            processData: false,
            contentType: false,
            data: fd,
            success: function(data) {

                if (id == "organizations" || id == "publications") {

                    jQuery("#infohub-view-map").fadeOut(400);
                    jQuery("#infohub-view-list").fadeOut(400);

                } else {

                    jQuery("#infohub-view-map").fadeIn(400);
                    jQuery("#infohub-view-list").fadeIn(400);

                }

                jQuery("#infohub-" + id + "-tab .infohub-loader").addClass(" hideThis");
                jQuery(".infohub-list").html("");
                jQuery("#infohub-" + id + "-tab .infohub-list").html(data);
                jQuery("#infohub-" + id + "-tab .loadMore").removeClass("hideThis");
                jQuery("#infohub-" + id + "-tab .loadMore").attr("data-paged", 0);
                jQuery(".infohub-filter .filterCont").addClass("hideThis");
                jQuery("#infohub-" + id + "-tab-filter").removeClass("hideThis");
                jQuery("#infohub-" + id + "-tab-filter-mobiles").removeClass("hideThis");

                // jQuery('#postLoad-modal').html("");
                // jQuery("#preLoad-modals").clone().appendTo("#postLoad-modal");
                // jQuery('#preLoad-modal').html("");

            }



        });

    }

    function getPaged(id) {

        jQuery("#infohub-" + id + "-tab .infohub-loader-more").removeClass("hideThis");
        jQuery("#infohub-" + id + "-tab .loadMore").addClass("hideThis").fadeOut(400);

        var getPagedCount = jQuery("#infohub-" + id + "-tab .loadMore").attr("data-paged");
        var sumPaged = parseInt(getPagedCount) + 1;

        if (id == "cities") {
            var ajaxAction = "infohubCityAjax";
        }

        if (id == "organizations") {
            var ajaxAction = "infohubOrgAjax";
        }

        if (id == "projects") {
            var ajaxAction = "infohubProjAjax";
        }

        if (id == "publications") {
            var ajaxAction = "infohubPubAjax";
        }

        var fd = new FormData();
        fd.append("action", ajaxAction);
        fd.append("data", id);
        fd.append("paged", getPagedCount);

        jQuery.ajax({

            type: "POST",
            url: "/wp-admin/admin-ajax.php",
            processData: false,
            contentType: false,
            data: fd,
            success: function(data) {

                if (id == "cities") {
                    jQuery("#infohub-" + id + "-tab .infohub-list .list-view .row").append(data).children(':last').hide().fadeIn(600);
                }

                jQuery("#infohub-" + id + "-tab .infohub-loader-more").addClass(" hideThis");

                if (id == "organizations") {
                    jQuery("#infohub-" + id + "-tab .infohub-list .accordion").append(data).children(':last').hide().fadeIn(600);
                }

                if (id == "projects") {
                    jQuery("#infohub-" + id + "-tab .infohub-list .project-body").append(data).children(':last').hide().fadeIn(600);
                }

                if (id == "publications") {
                    jQuery("#infohub-" + id + "-tab .infohub-list .accordion").append(data).children(':last').hide().fadeIn(600);
                }

                jQuery("#infohub-" + id + "-tab .loadMore").removeClass("hideThis").fadeIn(400);
                jQuery("#infohub-" + id + "-tab .loadMore").attr("data-paged", sumPaged);



            }



        });

    }


    function getCountry(selectId) {

        var getVal = jQuery("#" + selectId + "").val();
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


                if (selectId == "filter-cities-country") {
                    jQuery("#filter-cities-city").empty();
                    jQuery("#filter-cities-city").removeAttr("disabled");
                    jQuery("#filter-cities-city").append(data);
                    jQuery('#filter-cities-city.selectpicker').selectpicker('refresh');
                }

                if (selectId == "filter-projects-country") {
                    jQuery("#filter-projects-city").empty();
                    jQuery("#filter-projects-city").removeAttr("disabled");
                    jQuery("#filter-projects-city").append(data);
                    jQuery('#filter-projects-city.selectpicker').selectpicker('refresh');
                }


            }



        });

    }

    function getFilter(id, tabs) {



        jQuery(id).submit(function(e) {

            e.preventDefault();

            if (jQuery(this).closest(".modal-body").length > 0) {
                jQuery(this).closest(".modal-body").siblings('.modal-header').find("button").trigger("click");
            }

            jQuery("#infohub-" + tabs + "-tab .infohub-loader").removeClass("hideThis");

            var filterPost = jQuery(this).serialize();
            var fd = new FormData();
            fd.append("tabs", tabs);
            fd.append("action", "filterProj");
            fd.append("data", filterPost);



            jQuery.ajax({
                type: "POST",
                url: "/wp-admin/admin-ajax.php",
                processData: false,
                contentType: false,
                data: fd,
                success: function(data) {

                    console.log(data);

                    jQuery("#infohub-view-list").trigger("click");
                    jQuery("#infohub-" + tabs + "-tab .loadMore").removeClass("hideThis");
                    //map.off();
                    //map.remove();

                    if (tabs == "cities") {
                        jQuery("#infohub-cities-tab .infohub-list .list-view .row").html("");
                        jQuery("#infohub-cities-tab .infohub-list .list-view .row").html(data);
                    }

                    if (tabs == "projects") {

                        jQuery("#infohub-projects-tab .infohub-list .project-body").html("");
                        jQuery("#infohub-projects-tab .infohub-list .project-body").html(data);
                    }

                    if (tabs == "organizations") {
                        jQuery("#infohub-organizations-tab .infohub-list .accordion").html("");
                        jQuery("#infohub-organizations-tab .infohub-list .accordion").html(data);
                    }

                    if (tabs == "publications") {

                        console.log(data);

                        jQuery("#infohub-publications-tab .infohub-list .accordion").html("");
                        jQuery("#infohub-publications-tab .infohub-list .accordion").html(data);

                    }

                    jQuery("#infohub-" + tabs + "-tab .infohub-loader").addClass("hideThis");
                    jQuery("#infohub-" + tabs + "-tab .loadMore").addClass("hideThis");

                }
            });

        });


    }








    function resetThis(formId, type) {

        jQuery("" + formId + " .selectpicker").val([]).selectpicker('refresh');
        getTabsType(type);
    }

    function filterAuthor(type, elem) {

        var getId = jQuery(elem).attr("id");

        //console.log(getId);

        jQuery(".filter-author").removeClass("btn-primary btn-blue");
        jQuery(".filter-author").addClass("btn-secondary btn-gray");
        jQuery('#' + getId + '').removeClass("btn-secondary btn-gray");
        jQuery('#' + getId + '').addClass("btn-primary btn-blue");

        if (type == "pub-ap") {
            jQuery(".accordion-item").hide().fadeOut(600);
            jQuery(".accordion-item.pub-ap").show().fadeIn(600);
        }

        if (type == "pub-op") {
            jQuery(".accordion-item").hide().fadeOut(600);
            jQuery(".accordion-item.pub-op").show().fadeIn(600);
        }

    }
</script>

<!--map-->
<script>
    function isValidCoordinates(latitude, longitude) {
        return latitude >= -90 && latitude <= 90 && longitude >= -180 && longitude <= 180;
    }

    function runMap(mapId, staticMarkers) {
        var map = L.map(mapId).setView([20, 20], 3.5);

        L.tileLayer("https://{s}.basemaps.cartocdn.com/rastertiles/voyager/{z}/{x}/{y}.png", {
            attribution: "",
        }).addTo(map);

        // Load and style GeoJSON data (Arab countries)

        fetch("<?php print get_theme_url(); ?>/arab_conn.geojson")
            .then((response) => response.json())

            .then((data) => {
                //var turquoiseColors = ['#1D78AB', '#37A2DD', '#6DA6BC', '#7E9AAA', '#405561'];

                var turquoiseColors = ["#37A2DD"];

                var index = 0;

                L.geoJSON(data, {
                    style: function() {
                        var color = turquoiseColors[index];

                        index = (index + 1) % turquoiseColors.length;

                        return {
                            fillColor: color,

                            fillOpacity: 0.5, // Set transparency to 60%

                            color: "white",

                            weight: 1,
                        };
                    },
                }).addTo(map);
            });
        // // Define an array of markers with coordinates and properties
        // var staticMarkers = [
        //     { lat: 36.7948829, lng: 10.1432776, name: 'tunis', description: 'Description 1' },
        //     { lat: 22, lng: 23, name: 'Marker 2', description: 'Description 2' },
        //     // Add more markers as needed
        // ];

        var markers = L.markerClusterGroup({
            spiderLegPolylineOptions: {
                opacity: 0,
            },
            showCoverageOnHover: false,
            iconCreateFunction: function(cluster) {
                var childCount = cluster.getChildCount();

                // Customize the cluster icon based on the number of markers
                if (childCount === 1) {
                    return L.divIcon({
                        html: '<div class="cluster-icons city-cluster">1</div>',
                        className: "cluster single-marker",
                        iconSize: L.point(40, 40),
                    });
                } else {
                    return L.divIcon({
                        html: '<div class="cluster-icon city-cluster">' + childCount + "</div>",
                        className: "cluster",
                        iconSize: L.point(40, 40),
                    });
                }
            },
        });

        // Add static markers to the markers layer
        staticMarkers.forEach(function(markerData) {
            const isValid = isValidCoordinates(markerData.lati, markerData.long);
            if (isValid) {
                var latlng = L.latLng(markerData.lati, markerData.long);

                var marker = L.marker(latlng, {
                    icon: L.divIcon({
                        className: "custom-marker",
                        html: '<div class="cluster-icon city-cluster">1</div>',
                        iconSize: [20, 20],
                    }),
                });
                marker.bindPopup(
                    '<a href="' + markerData.postlink + '" target="_blank"><h3>' + markerData.title + "</h3> <h6>" + markerData.city + "," + markerData.country + "</h6><p>" + markerData.startdate + "-" + markerData.enddate + "</p></a>"
                );

                markers.addLayer(marker);
            } else {
                //console.log(markerData.postlink);
            }
        });

        map.addLayer(markers);
    }
</script>


<script>
    function runCityMap(mapId) {

        var map = L.map(mapId).setView([20, 20], 3.5); // Adjust the view center and zoom level

        L.tileLayer('https://{s}.basemaps.cartocdn.com/rastertiles/voyager/{z}/{x}/{y}.png', {
            attribution: ''
        }).addTo(map);

        fetch('<?php print get_theme_url(); ?>/arab_conn.geojson')
            .then(response => response.json())
            .then(data => {
                //var turquoiseColors = ['#1D78AB', '#37A2DD', '#6DA6BC', '#7E9AAA', '#405561'];
                var turquoiseColors = ['#37A2DD'];
                var index = 0;

                L.geoJSON(data, {
                    style: function() {
                        var color = turquoiseColors[index];
                        index = (index + 1) % turquoiseColors.length;

                        return {
                            fillColor: color,
                            fillOpacity: 0.5, // Set transparency to 60%
                            color: 'white',
                            weight: 1
                        };
                    }
                }).addTo(map);
            });

        fetch('<?php print site_url(); ?>/geojson-city-infohub.php')
            .then(response => response.json())
            .then(data => {


                var markers = L.markerClusterGroup({
                    spiderLegPolylineOptions: {
                        opacity: 0
                    },
                    showCoverageOnHover: false,
                    iconCreateFunction: function(cluster) {
                        var childCount = cluster.getChildCount();

                        // var alterCount = childCount;
                        // if(childCount > 50){
                        //   alterCount = " 50+ ";
                        // }


                        return L.divIcon({
                            html: '<div class="cluster-icon city-cluster">' + childCount + '</div>',
                            className: 'cluster',
                            iconSize: L.point(40, 40)
                        });
                    }
                });

                L.geoJSON(data, {
                    pointToLayer: function(feature, latlng) {
                        var marker = L.marker(latlng, {
                            icon: L.divIcon({
                                className: 'custom-marker',
                                html: '<div class="marker-dot ' + feature.properties.Marker + '"></div>',
                                iconSize: [20, 20] // Double the size
                            })
                        });

                        <?php print getCityDetailsInfohub(); ?>

                        return marker;
                    }
                }).addTo(markers);

                map.addLayer(markers);
            });

    }
</script>