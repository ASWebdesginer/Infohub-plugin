<?php

/** Plugin Extention: ACF Codes **/



/* Organization Type */

function org_field($field) {



	$lang = pll_current_language();

	$termParent = 1003;

	if($lang == "ar"){

		$termParent = 1007;

	}



    $field['choices'] = array();

    $field['choices'][0] = 'Please Select';

    $choices = get_field('type_of_organization', 'option', false);

    $choices = explode("\n", $choices);

    $choices = array_map('trim', $choices);



    $args = array(

      'type' => 'post',

      'child_of' => $termParent,

      'parent' => '',

      'orderby' => 'name',

      'order' => 'ASC',

      'hide_empty' => 0,

      'hierarchical' => 1,

      'exclude' => '',

      'include' => '',

      'number' => '',

      'taxonomy' => 'category',

      'pad_counts' => false

    ); 



    $categories = get_categories($args);



    foreach ($categories as $category) {



        $id = $category->cat_ID;

        $name = $category->cat_name;

        $field['choices'][$id] = $name;

    }



    return $field;

}

add_filter('acf/load_field/name=type_of_organization', 'org_field');



/* Geography of Intervention */

function geo_field($field) {



	$lang = pll_current_language();

	$termParent = 1019;

	if($lang == "ar"){

		$termParent = 1023;

	}



    $field['choices'] = array();

    $field['choices'][0] = 'Please Select';

    $choices = get_field('geography_of_intervention', 'option', false);

    $choices = explode("\n", $choices);

    $choices = array_map('trim', $choices);



    $args = array(

      'type' => 'post',

      'child_of' => $termParent,

      'parent' => '',

      'orderby' => 'name',

      'order' => 'ASC',

      'hide_empty' => 0,

      'hierarchical' => 1,

      'exclude' => '',

      'include' => '',

      'number' => '',

      'taxonomy' => 'category',

      'pad_counts' => false

    ); 



    $categories = get_categories($args); 



    foreach ($categories as $category) {



        $id = $category->cat_ID;

        $name = $category->cat_name;

        $field['choices'][$id] = $name;

    }



    return $field;

}

add_filter('acf/load_field/name=geography_of_intervention', 'geo_field');



/* Arab Countries */

function arab_ctry_field($field) {



	$lang = pll_current_language();

	$termParent = 1051;

	if($lang == "ar"){

		$termParent = 1055;

	}



    $field['choices'] = array();

    $field['choices'][0] = 'Please Select';

    $choices = get_field('arab_countries', 'option', false);

    $choices = explode("\n", $choices);

    $choices = array_map('trim', $choices);



    $args = array(

      'type' => 'post',

      'child_of' => $termParent,

      'parent' => '',

      'orderby' => 'name',

      'order' => 'ASC',

      'hide_empty' => 0,

      'hierarchical' => 1,

      'exclude' => '',

      'include' => '',

      'number' => '',

      'taxonomy' => 'category',

      'pad_counts' => false

    ); 



    $categories = get_categories($args);



    foreach ($categories as $category) {



        $id = $category->cat_ID;

        $name = $category->cat_name;

        $field['choices'][$id] = $name;

    }



    return $field;

}

add_filter('acf/load_field/name=arab_countries', 'arab_ctry_field');



/* Areas of Intervention */

function areas_int_field($field) {



	$lang = pll_current_language();

	$termParent = 1849;

	if($lang == "ar"){

		$termParent = 1037;

	}



    $field['choices'] = array();

    $field['choices'][0] = 'Please Select';

    $choices = get_field('areas_intervention', 'option', false);

    $choices = explode("\n", $choices);

    $choices = array_map('trim', $choices);



    $args = array(

      'type' => 'post',

      'child_of' => $termParent,

      'parent' => '',

      'orderby' => 'name',

      'order' => 'ASC',

      'hide_empty' => 0,

      'hierarchical' => 1,

      'exclude' => '',

      'include' => '',

      'number' => '',

      'taxonomy' => 'category',

      'pad_counts' => false

    ); 



    $categories = get_categories($args);



    foreach ($categories as $category) {



        $id = $category->cat_ID;

        $name = $category->cat_name;

        $field['choices'][$id] = $name;

    }



    return $field;

}

add_filter('acf/load_field/name=areas_intervention', 'areas_int_field');



/* Types of Intervention*/

function types_int_field($field) {



	$lang = pll_current_language();

	$termParent = 1043;

	if($lang == "ar"){

		$termParent = 1047;

	}





    $field['choices'] = array();

    $field['choices'][0] = 'Please Select';

    $choices = get_field('types_intervention', 'option', false);

    $choices = explode("\n", $choices);

    $choices = array_map('trim', $choices);



    $args = array(

      'type' => 'post',

      'child_of' => $termParent,

      'parent' => '',

      'orderby' => 'name',

      'order' => 'ASC',

      'hide_empty' => 0,

      'hierarchical' => 1,

      'exclude' => '',

      'include' => '',

      'number' => '',

      'taxonomy' => 'category',

      'pad_counts' => false

    ); 



    $categories = get_categories($args);



    foreach ($categories as $category) {



        $id = $category->cat_ID;

        $name = $category->cat_name;

        $field['choices'][$id] = $name;

    }



    return $field;

}

add_filter('acf/load_field/name=types_intervention', 'types_int_field');



/* Topic Words */

function topic_word_field($field) {



	$lang = pll_current_language();

	$termParent = 763;

	if($lang == "ar"){

		$termParent = 765;

	}



    $field['choices'] = array();

    $field['choices'][0] = 'Please Select';

    $choices = get_field('topic_words', 'option', false);

    $choices = explode("\n", $choices);

    $choices = array_map('trim', $choices); 



    $args = array(

      'type' => 'post',

      'child_of' => $termParent,

      'parent' => '',

      'orderby' => 'name',

      'order' => 'ASC',

      'hide_empty' => 0,

      'hierarchical' => 1,

      'exclude' => '',

      'include' => '',

      'number' => '',

      'taxonomy' => 'category',

      'pad_counts' => false

    ); 



    $categories = get_categories($args);



    foreach ($categories as $category) {



        $id = $category->cat_ID;

        $name = $category->cat_name;

        $field['choices'][$id] = $name;

    }



    return $field;

}

add_filter('acf/load_field/name=topic_words', 'topic_word_field');



/* Project Approaches */

function project_approaches_field($field) {



	$lang = pll_current_language();

	$termParent = 767;

	if($lang == "ar"){

		$termParent = 769;

	}



    $field['choices'] = array();

    $field['choices'][0] = 'Please Select';

    $choices = get_field('project_approaches', 'option', false);

    $choices = explode("\n", $choices);

    $choices = array_map('trim', $choices); 



    $args = array(

      'type' => 'post',

      'child_of' => $termParent,

      'parent' => '',

      'orderby' => 'name',

      'order' => 'ASC',

      'hide_empty' => 0,

      'hierarchical' => 1,

      'exclude' => '',

      'include' => '',

      'number' => '',

      'taxonomy' => 'category', 

      'pad_counts' => false

    ); 



    $categories = get_categories($args);



    foreach ($categories as $category) {



        $id = $category->cat_ID;

        $name = $category->cat_name;

        $field['choices'][$id] = $name;

    }



    return $field;

}

add_filter('acf/load_field/name=project_approaches', 'project_approaches_field');



/* Public Policy Instruments */

function policy_ints_field($field) {



	$lang = pll_current_language();

	$termParent = 771;

	if($lang == "ar"){

		$termParent = 773;

	}



    $field['choices'] = array();

    $field['choices'][0] = 'Please Select';

    $choices = get_field('public_policy_instruments', 'option', false);

    $choices = explode("\n", $choices);

    $choices = array_map('trim', $choices); 



    $args = array(

      'type' => 'post',

      'child_of' => $termParent,

      'parent' => '',

      'orderby' => 'name',

      'order' => 'ASC',

      'hide_empty' => 0,

      'hierarchical' => 1,

      'exclude' => '',

      'include' => '',

      'number' => '',

      'taxonomy' => 'category', 

      'pad_counts' => false

    ); 



    $categories = get_categories($args);



    foreach ($categories as $category) {



        $id = $category->cat_ID;

        $name = $category->cat_name;

        $field['choices'][$id] = $name;

    }



    return $field;

}

add_filter('acf/load_field/name=public_policy_instruments', 'policy_ints_field');



/* Multiple Arab City */

function multi_arab_field($field) {



    $lang = pll_current_language();

    $termParent = 1697;

    if($lang == "ar"){

        $termParent = 1699;

    }



    $field['choices'] = array();

    $field['choices'][0] = 'Please Select';

    $choices = get_field('multiple_arab_city', 'option', false);

    $choices = explode("\n", $choices);

    $choices = array_map('trim', $choices); 



    $args = array(

      'type' => 'post',

      'child_of' => $termParent,

      'parent' => '',

      'orderby' => 'name',

      'order' => 'ASC',

      'hide_empty' => 0,

      'hierarchical' => 1,

      'exclude' => '',

      'include' => '',

      'number' => '',

      'taxonomy' => 'category', 

      'pad_counts' => false

    ); 



    $categories = get_categories($args);



    foreach ($categories as $category) {



        $id = $category->cat_ID;

        $name = $category->cat_name;

        $field['choices'][$id] = $name;

    }



    return $field;

}

add_filter('acf/load_field/name=multiple_arab_city', 'multi_arab_field');



/* Publication Type */

function pub_type_field($field) {



    $lang = pll_current_language();

    $termParent = 1693;

    if($lang == "ar"){

        $termParent = 1695;

    }



    $field['choices'] = array();

    $field['choices'][0] = 'Please Select';

    $choices = get_field('publication_type', 'option', false);

    $choices = explode("\n", $choices);

    $choices = array_map('trim', $choices); 



    $args = array(

      'type' => 'post',

      'child_of' => $termParent,

      'parent' => '',

      'orderby' => 'name',

      'order' => 'ASC',

      'hide_empty' => 0,

      'hierarchical' => 1,

      'exclude' => '',

      'include' => '',

      'number' => '',

      'taxonomy' => 'category', 

      'pad_counts' => false

    ); 



    $categories = get_categories($args);



    foreach ($categories as $category) {



        $id = $category->cat_ID;

        $name = $category->cat_name;

        $field['choices'][$id] = $name;

    }



    return $field;

}

add_filter('acf/load_field/name=publication_type', 'pub_type_field');



/* Publication Theme*/

function pub_theme_field($field) {



    $lang = pll_current_language();

    $termParent = 1689;

    if($lang == "ar"){

        $termParent = 1691;

    }



    $field['choices'] = array();

    $field['choices'][0] = 'Please Select';

    $choices = get_field('theme', 'option', false);

    $choices = explode("\n", $choices);

    $choices = array_map('trim', $choices); 



    $args = array(

      'type' => 'post',

      'child_of' => $termParent,

      'parent' => '',

      'orderby' => 'name',

      'order' => 'ASC',

      'hide_empty' => 0,

      'hierarchical' => 1,

      'exclude' => '',

      'include' => '',

      'number' => '',

      'taxonomy' => 'category', 

      'pad_counts' => false

    ); 



    $categories = get_categories($args);



    foreach ($categories as $category) {



        $id = $category->cat_ID;

        $name = $category->cat_name;

        $field['choices'][$id] = $name;

    }



    return $field;

}

add_filter('acf/load_field/name=theme', 'pub_theme_field');



/* City Size*/

function city_size_field($field) {



    $lang = pll_current_language();

    $termParent = 1701;

    if($lang == "ar"){

        $termParent = 1703;

    }



    $field['choices'] = array();

    $field['choices'][0] = 'Please Select';

    $choices = get_field('city_size', 'option', false);

    $choices = explode("\n", $choices);

    $choices = array_map('trim', $choices); 



    $args = array(

      'type' => 'post',

      'child_of' => $termParent,

      'parent' => '',

      'orderby' => 'name',

      'order' => 'ASC',

      'hide_empty' => 0,

      'hierarchical' => 1,

      'exclude' => '',

      'include' => '',

      'number' => '',

      'taxonomy' => 'category', 

      'pad_counts' => false

    ); 



    $categories = get_categories($args);



    foreach ($categories as $category) {



        $id = $category->cat_ID;

        $name = $category->cat_name;

        $field['choices'][$id] = $name;

    }



    return $field;

}

add_filter('acf/load_field/name=city_size', 'city_size_field');



/* City Markers*/

function city_marker_field($field) {



    $lang = pll_current_language();

    $termParent = 1861;

    if($lang == "ar"){

        $termParent = 1863;

    }



    $field['choices'] = array();

    $field['choices'][0] = 'Please Select';

    $choices = get_field('city_markers', 'option', false);

    $choices = explode("\n", $choices);

    $choices = array_map('trim', $choices); 



    $args = array(

      'type' => 'post',

      'child_of' => $termParent,

      'parent' => '',

      'orderby' => 'name',

      'order' => 'ASC',

      'hide_empty' => 0,

      'hierarchical' => 1,

      'exclude' => '',

      'include' => '',

      'number' => '',

      'taxonomy' => 'category', 

      'pad_counts' => false

    ); 



    $categories = get_categories($args);



    foreach ($categories as $category) {



        $id = $category->cat_ID;

        $name = $category->cat_name;

        $field['choices'][$id] = $name;

    }



    return $field;

}

add_filter('acf/load_field/name=city_markers', 'city_marker_field');



// function acf_apply_content_filter_for_api($value, $post_id, $field){

//      return str_replace( ']]>', ']]>', apply_filters( 'the_content', $value) );

// }

// function add_content_filter_ACF(){

//    if(!is_admin()){

//       remove_all_filters('acf/format_value/type=wysiwyg');

//       add_filter('acf/format_value/type=wysiwyg', 'acf_apply_content_filter_for_api', 10, 3);

//    }

// }

// add_action('init', 'add_content_filter_ACF');





function getSelectOption($fieldId,$fLabel){



    $postType = "projects";



    $lang = pll_current_language();



    $field = get_field_object($fieldId);

    $label = $field['label'];

    if($fLabel != null){

        $label = $fLabel;

    }



    $arrayList = array();

    // $arrayList[] = '<option value="" disabled >'.$label.'</option>';



    foreach($field['choices'] as $key=>$value){

        $arrayList[] = '<option value="'.$key.'">'.$value.'</option>';

    }



    $optionVal = implode("",$arrayList);



    return $optionVal;



}



function getSelectOptionList($type,$fieldParent,$fieldChild,$fieldId){



    $lang = pll_current_language();



    $args = array(

        'post_type' => $type,

        'post_status' => 'publish',

        'numberposts' => -1,

    );



    $query = get_posts($args);



    $countQueries = count($query);

    $i = 0;



    $arrayListCheck = array();



    /*--Cities--*/

    if($type == "city"){



        if($fieldChild == "country"){

            foreach($query as $row){



                $getAcfKey = get_field($fieldParent,$row->ID);

                $arrayListCheck[] = $getAcfKey['value'];

                

            }

        }



        if($fieldChild == "city_size"){

            foreach($query as $row){



                $getAcfKey = get_field($fieldParent,$row->ID);

                $arrayListCheck[] = $getAcfKey;



            }



        }         



    }



    /*--Projects--*/

    if($type == "project"){



        if($fieldChild == "country"){

            foreach($query as $row){



                $getAcfKey = get_field($fieldParent,$row->ID);

                $arrayListCheck[] = $getAcfKey[$fieldChild]['value'];

                

            }

        }



        if($fieldChild == "topic_words"){

            $topicArrays = array();

            foreach($query as $row){



                $getAcfKey = get_field($fieldParent,$row->ID);

                $topicArrays[] = $getAcfKey[$fieldChild];



                foreach($topicArrays[$i] as $rowTw){

                  $arrayListCheck[] = $rowTw;

                }



                if (++$i == $countQueries) break;



            }



        }



    }



    /*--Organizations--*/

    if($type == "organization"){



        if($fieldChild == "country"){

            foreach($query as $row){



                $getAcfKey = get_field($fieldParent,$row->ID);

                $arrayListCheck[] = $getAcfKey['value'];

                

            }

        }



        if($fieldChild == "type_of_organization"){

            foreach($query as $row){



                $getAcfKey = get_field($fieldParent,$row->ID);

                $arrayListCheck[] = $getAcfKey;



            }



        }  



        if($fieldChild == "areas_intervention"){

            $topicArrays = array();

            foreach($query as $row){



                $getAcfKey = get_field($fieldParent,$row->ID);

                $topicArrays[] = $getAcfKey;



                foreach($topicArrays[$i] as $rowTw){

                  $arrayListCheck[] = $rowTw;

                }



                if (++$i == $countQueries) break;



            }



        } 



        if($fieldChild == "number_of_employees"){

            foreach($query as $row){



                $getAcfKey = get_field($fieldParent,$row->ID);

                $arrayListCheck[] = $getAcfKey;



            }



        }                        



    }



    /*--Publications--*/

    if($type == "publication"){



        if($fieldChild == "publication_type"){

            foreach($query as $row){



                $getAcfKey = get_field($fieldParent,$row->ID);

                $arrayListCheck[] = $getAcfKey;



            }



        } 



        if($fieldChild == "theme"){

            $topicArrays = array();

            foreach($query as $row){



                $getAcfKey = get_field($fieldParent,$row->ID);

                $topicArrays[] = $getAcfKey;



                foreach($topicArrays[$i] as $rowTw){

                  $arrayListCheck[] = $rowTw;

                }



                if (++$i == $countQueries) break;



            }



        }  

        

        if($fieldChild == "language_version"){

            $topicArrays = array();

            foreach($query as $row){



                $getAcfKey = get_field($fieldParent,$row->ID);

                $topicArrays[] = $getAcfKey;



                foreach($topicArrays[$i] as $rowTw){

                  $arrayListCheck[] = $rowTw;

                }



                if (++$i == $countQueries) break;



            }



        }                       



    }    



    $uniArray = array_unique($arrayListCheck);



    $field = get_field_object($fieldId);

    $arrayListOptions = array();



   



    foreach($field['choices'] as $key=>$value){





        if($fieldChild == "country"){

             if(in_array($key, $uniArray)){

                $getPllName = getTransCountry($key);

                $pllkey = $key;

                $pllValue = $getPllName;



                 $arrayListOptions[] = '<option value="'.$pllkey.'">'.$pllValue.'</option>';

             }



        }elseif($fieldChild == "number_of_employees" || $fieldChild == "language_version"){

             $language_array=array(
                'ar' => 'العربية',
                'en' => 'الانجليزية',
                '0' => 'الرجاء التحديد',
             );

             if(in_array($key, $uniArray)){
                 if($lang == "ar" && array_key_exists($key,$language_array) && $fieldChild == "language_version"){
                    $arrayListOptions[] = '<option value="'.$key.'">'.$language_array[$key].'</option>';
                 }
                 else{
                    $arrayListOptions[] = '<option value="'.$key.'">'.$value.'</option>';
                 }

             }
             


        }else{



            $transKey = $key;

            if($lang == "ar"){

                $transKey = pll_get_term($key,"en");

            }





            if(in_array($transKey, $uniArray) ){

                $getPllName = getTermNameReverse($transKey);



                $pllkey = $getPllName['term_id'];

                $pllValue = $getPllName['term_name'];



                 $arrayListOptions[] = '<option value="'.$pllkey.'">'.$pllValue.'</option>';



            }



        }



        // if(in_array($key, $uniArray)){



        //     

        //     $pllkey = $getPllName['term_id'];

        //     $pllValue = $getPllName['name'];



        //      // if($fieldChild == "country"){

        //      //    $getPllName = getTransCountry($key);

        //      //    $pllkey = $key;

        //      //    $pllValue = $getPllName;



        //      // }



            

        // }





        

    }



    $optionVal = implode("",$arrayListOptions);

    return $optionVal;

}



function getTransCountry($ccode){



    $lang = pll_current_language();



    if($lang == "en"){



        $arrayList = array(

        'AF' => 'Afghanistan',

        'AX' => 'Åland Islands',

        'AL' => 'Albania',

        'DZ' => 'Algeria',

        'AS' => 'American Samoa',

        'AD' => 'Andorra',

        'AO' => 'Angola',

        'AI' => 'Anguilla',

        'AQ' => 'Antarctica',

        'AG' => 'Antigua & Barbuda',

        'AR' => 'Argentina',

        'AM' => 'Armenia',

        'AW' => 'Aruba',

        'AU' => 'Australia',

        'AT' => 'Austria',

        'AZ' => 'Azerbaijan',

        'BS' => 'Bahamas',

        'BH' => 'Bahrain',

        'BD' => 'Bangladesh',

        'BB' => 'Barbados',

        'BY' => 'Belarus',

        'BE' => 'Belgium',

        'BZ' => 'Belize',

        'BJ' => 'Benin',

        'BM' => 'Bermuda',

        'BT' => 'Bhutan',

        'BO' => 'Bolivia',

        'BA' => 'Bosnia & Herzegovina',

        'BW' => 'Botswana',

        'BV' => 'Bouvet Island',

        'BR' => 'Brazil',

        'IO' => 'British Indian Ocean Territory',

        'VG' => 'British Virgin Islands',

        'BN' => 'Brunei',

        'BG' => 'Bulgaria',

        'BF' => 'Burkina Faso',

        'BI' => 'Burundi',

        'KH' => 'Cambodia',

        'CM' => 'Cameroon',

        'CA' => 'Canada',

        'CV' => 'Cape Verde',

        'BQ' => 'Caribbean Netherlands',

        'KY' => 'Cayman Islands',

        'CF' => 'Central African Republic',

        'TD' => 'Chad',

        'CL' => 'Chile',

        'CN' => 'China',

        'CX' => 'Christmas Island',

        'CC' => 'Cocos (Keeling) Islands',

        'CO' => 'Colombia',

        'KM' => 'Comoros',

        'CG' => 'Congo - Brazzaville',

        'CD' => 'Congo - Kinshasa',

        'CK' => 'Cook Islands',

        'CR' => 'Costa Rica',

        'CI' => 'Côte d’Ivoire',

        'HR' => 'Croatia',

        'CU' => 'Cuba',

        'CW' => 'Curaçao',

        'CY' => 'Cyprus',

        'CZ' => 'Czechia',

        'DK' => 'Denmark',

        'DJ' => 'Djibouti',

        'DM' => 'Dominica',

        'DO' => 'Dominican Republic',

        'EC' => 'Ecuador',

        'EG' => 'Egypt',

        'SV' => 'El Salvador',

        'GQ' => 'Equatorial Guinea',

        'ER' => 'Eritrea',

        'EE' => 'Estonia',

        'SZ' => 'Eswatini',

        'ET' => 'Ethiopia',

        'FK' => 'Falkland Islands',

        'FO' => 'Faroe Islands',

        'FJ' => 'Fiji',

        'FI' => 'Finland',

        'FR' => 'France',

        'GF' => 'French Guiana',

        'PF' => 'French Polynesia',

        'TF' => 'French Southern Territories',

        'GA' => 'Gabon',

        'GM' => 'Gambia',

        'GE' => 'Georgia',

        'DE' => 'Germany',

        'GH' => 'Ghana',

        'GI' => 'Gibraltar',

        'GR' => 'Greece',

        'GL' => 'Greenland',

        'GD' => 'Grenada',

        'GP' => 'Guadeloupe',

        'GU' => 'Guam',

        'GT' => 'Guatemala',

        'GG' => 'Guernsey',

        'GN' => 'Guinea',

        'GW' => 'Guinea-Bissau',

        'GY' => 'Guyana',

        'HT' => 'Haiti',

        'HM' => 'Heard & McDonald Islands',

        'HN' => 'Honduras',

        'HK' => 'Hong Kong SAR China',

        'HU' => 'Hungary',

        'IS' => 'Iceland',

        'IN' => 'India',

        'ID' => 'Indonesia',

        'IR' => 'Iran',

        'IQ' => 'Iraq',

        'IE' => 'Ireland',

        'IM' => 'Isle of Man',

        'IL' => 'Israel',

        'IT' => 'Italy',

        'JM' => 'Jamaica',

        'JP' => 'Japan',

        'JE' => 'Jersey',

        'JO' => 'Jordan',

        'KZ' => 'Kazakhstan',

        'KE' => 'Kenya',

        'KI' => 'Kiribati',

        'KW' => 'Kuwait',

        'KG' => 'Kyrgyzstan',

        'LA' => 'Laos',

        'LV' => 'Latvia',

        'LB' => 'Lebanon',

        'LS' => 'Lesotho',

        'LR' => 'Liberia',

        'LY' => 'Libya',

        'LI' => 'Liechtenstein',

        'LT' => 'Lithuania',

        'LU' => 'Luxembourg',

        'MO' => 'Macao SAR China',

        'MG' => 'Madagascar',

        'MW' => 'Malawi',

        'MY' => 'Malaysia',

        'MV' => 'Maldives',

        'ML' => 'Mali',

        'MT' => 'Malta',

        'MH' => 'Marshall Islands',

        'MQ' => 'Martinique',

        'MR' => 'Mauritania',

        'MU' => 'Mauritius',

        'YT' => 'Mayotte',

        'MX' => 'Mexico',

        'FM' => 'Micronesia',

        'MD' => 'Moldova',

        'MC' => 'Monaco',

        'MN' => 'Mongolia',

        'ME' => 'Montenegro',

        'MS' => 'Montserrat',

        'MA' => 'Morocco',

        'MZ' => 'Mozambique',

        'MM' => 'Myanmar (Burma)',

        'NA' => 'Namibia',

        'NR' => 'Nauru',

        'NP' => 'Nepal',

        'NL' => 'Netherlands',

        'NC' => 'New Caledonia',

        'NZ' => 'New Zealand',

        'NI' => 'Nicaragua',

        'NE' => 'Niger',

        'NG' => 'Nigeria',

        'NU' => 'Niue',

        'NF' => 'Norfolk Island',

        'KP' => 'North Korea',

        'MK' => 'North Macedonia',

        'MP' => 'Northern Mariana Islands',

        'NO' => 'Norway',

        'OM' => 'Oman',

        'PK' => 'Pakistan',

        'PW' => 'Palau',

        'PS' => 'Palestinian Territories',

        'PA' => 'Panama',

        'PG' => 'Papua New Guinea',

        'PY' => 'Paraguay',

        'PE' => 'Peru',

        'PH' => 'Philippines',

        'PN' => 'Pitcairn Islands',

        'PL' => 'Poland',

        'PT' => 'Portugal',

        'PR' => 'Puerto Rico',

        'QA' => 'Qatar',

        'RE' => 'Réunion',

        'RO' => 'Romania',

        'RU' => 'Russia',

        'RW' => 'Rwanda',

        'WS' => 'Samoa',

        'SM' => 'San Marino',

        'ST' => 'São Tomé & Príncipe',

        'SA' => 'Saudi Arabia',

        'SN' => 'Senegal',

        'RS' => 'Serbia',

        'SC' => 'Seychelles',

        'SL' => 'Sierra Leone',

        'SG' => 'Singapore',

        'SX' => 'Sint Maarten',

        'SK' => 'Slovakia',

        'SI' => 'Slovenia',

        'SB' => 'Solomon Islands',

        'SO' => 'Somalia',

        'ZA' => 'South Africa',

        'GS' => 'South Georgia & South Sandwich Islands',

        'KR' => 'South Korea',

        'SS' => 'South Sudan',

        'ES' => 'Spain',

        'LK' => 'Sri Lanka',

        'BL' => 'St. Barthélemy',

        'SH' => 'St. Helena',

        'KN' => 'St. Kitts & Nevis',

        'LC' => 'St. Lucia',

        'MF' => 'St. Martin',

        'PM' => 'St. Pierre & Miquelon',

        'VC' => 'St. Vincent & Grenadines',

        'SD' => 'Sudan',

        'SR' => 'Suriname',

        'SJ' => 'Svalbard & Jan Mayen',

        'SE' => 'Sweden',

        'CH' => 'Switzerland',

        'SY' => 'Syria',

        'TW' => 'Taiwan',

        'TJ' => 'Tajikistan',

        'TZ' => 'Tanzania',

        'TH' => 'Thailand',

        'TL' => 'Timor-Leste',

        'TG' => 'Togo',

        'TK' => 'Tokelau',

        'TO' => 'Tonga',

        'TT' => 'Trinidad & Tobago',

        'TN' => 'Tunisia',

        'TR' => 'Turkey',

        'TM' => 'Turkmenistan',

        'TC' => 'Turks & Caicos Islands',

        'TV' => 'Tuvalu',

        'UM' => 'U.S. Outlying Islands',

        'VI' => 'U.S. Virgin Islands',

        'UG' => 'Uganda',

        'UA' => 'Ukraine',

        'AE' => 'United Arab Emirates',

        'GB' => 'United Kingdom',

        'US' => 'United States',

        'UY' => 'Uruguay',

        'UZ' => 'Uzbekistan',

        'VU' => 'Vanuatu',

        'VA' => 'Vatican City',

        'VE' => 'Venezuela',

        'VN' => 'Vietnam',

        'WF' => 'Wallis & Futuna',

        'EH' => 'Western Sahara',

        'YE' => 'Yemen',

        'ZM' => 'Zambia',

        'ZW' => 'Zimbabwe',

        );

    

    }

    

    if($lang == "ar"){



        $arrayList = array(

        'AF' => 'أفغانستان',

        'AX' => 'جزر أوكلاند',

        'AL' => 'ألبانيا',

        'DZ' => 'الجزائر',

        'AS' => 'ساموا الأمريكية',

        'AD' => 'أندورا',

        'AO' => 'أنغولا',

        'AI' => 'أنغيلا',

        'AQ' => 'أنتاركتيكا',

        'AG' => 'أنتيغوا وبربودا',

        'AR' => 'الأرجنتين',

        'AM' => 'أرمينيا',

        'AW' => 'أروبا',

        'AU' => 'أستراليا',

        'AT' => 'النمسا',

        'AZ' => 'أذربيجان',

        'BS' => 'جزر البهاما',

        'BH' => 'البحرين',

        'BD' => 'بنغلاديش',

        'BB' => 'بربادوس',

        'BY' => 'بيلاروس',

        'BE' => 'بلجيكا',

        'BZ' => 'بليز',

        'BJ' => 'بنن',

        'BM' => 'برمودا',

        'BT' => 'بوتان',

        'BO' => 'بوليفيا',

        'BA' => 'البوسنة والهرسك',

        'BW' => 'بوتسوانا',

        'BV' => 'جزيرة بوفيت',

        'BR' => 'البرازيل',

        'IO' => 'إقليم المحيط الهندي البريطاني',

        'VG' => 'جزر فرجن البريطانية',

        'BN' => 'بروني',

        'BG' => 'بلغاريا',

        'BF' => 'بوركينا فاسو',

        'BI' => 'بوروندي',

        'KH' => 'كمبوديا',

        'CM' => 'الكاميرون',

        'CA' => 'الكاميرون',

        'CV' => 'الرأس الأخضر',

        'BQ' => 'الكاريبي هولندا',

        'KY' => 'جزر كايمان',

        'CF' => 'جمهورية أفريقيا الوسطى',

        'TD' => 'تشاد',

        'CL' => 'شيلي',

        'CN' => 'الصين',

        'CX' => 'جزيرة الكريسماس',

        'CC' => 'جزر كوكوس (كيلينغ)',

        'CO' => 'كولومبيا',

        'KM' => 'جزر القمر',

        'CG' => 'الكونغو-برازافيل',

        'CD' => 'الكونغو-كينشاسا',

        'CK' => 'جزر كوك',

        'CR' => 'كوستاريكا',

        'CI' => 'ساحل العاج',

        'HR' => 'كرواتيا',

        'CU' => 'كوبا',

        'CW' => 'كوراكاو',

        'CY' => 'قبرص',

        'CZ' => 'التشيكية',

        'DK' => 'الدانمرك',

        'DJ' => 'جيبوتي',

        'DM' => 'جيبوتي',

        'DO' => 'الجمهورية الدومينيكية',

        'EC' => 'إكوادور',

        'EG' => 'مصر',

        'SV' => 'السلفادور',

        'GQ' => 'غينيا الاستوائية',

        'ER' => 'إريتريا',

        'EE' => 'إستونيا',

        'SZ' => 'إيسواتيني',

        'ET' => 'إثيوبيا',

        'FK' => 'جزر فوكلاند',

        'FO' => 'جزر فارو',

        'FJ' => 'فيجي',

        'FI' => 'فنلندا',

        'FR' => 'فرنسا',

        'GF' => 'غيانا الفرنسية',

        'PF' => 'بولينيزيا الفرنسية',

        'TF' => 'الأقاليم الجنوبية الفرنسية',

        'GA' => 'غابون',

        'GM' => 'غامبيا',

        'GE' => 'جورجيا',

        'DE' => 'ألمانيا',

        'GH' => 'غانا',

        'GI' => 'جبل طارق',

        'GR' => 'اليونان',

        'GL' => 'غرينلاند',

        'GD' => 'غرينادا',

        'GP' => 'غوادلوب',

        'GU' => 'غوام',

        'GT' => 'غواتيمالا',

        'GG' => 'غيرنسي',

        'GN' => 'غينيا',

        'GW' => 'غينيا-بيساو',

        'GY' => 'غيانا',

        'HT' => 'هايتي',

        'HM' => 'جزر هيرد وماكدونالد',

        'HN' => 'هندوراس',

        'HK' => 'منطقة هونغ كونغ الإدارية الخاصة الصين',

        'HU' => 'هنغاريا',

        'IS' => 'آيسلندا',

        'IN' => 'الهند',

        'ID' => 'إندونيسيا',

        'IR' => 'إيران',

        'IQ' => 'العراق',

        'IE' => 'أيرلندا',

        'IM' => 'جزيرة مان',

        'IL' => 'إسرائيل',

        'IT' => 'إيطاليا',

        'JM' => 'جامايكا',

        'JP' => 'اليابان',

        'JE' => 'جيرسي',

        'JO' => 'الأردن',

        'KZ' => 'كازاخستان',

        'KE' => 'كازاخستان',

        'KI' => 'كيريباس',

        'KW' => 'الكويت',

        'KG' => 'قيرغيزستان',

        'LA' => 'لاوس',

        'LV' => 'لاتفيا',

        'LB' => 'لبنان',

        'LS' => 'ليسوتو',

        'LR' => 'ليبريا',

        'LY' => 'ليبيا',

        'LI' => 'ليختنشتاين',

        'LT' => 'ليتوانيا',

        'LU' => 'لكسمبرغ',

        'MO' => 'منطقة ماكاو الإدارية الخاصة الصين',

        'MG' => 'مدغشقر',

        'MW' => 'ملاوي',

        'MY' => 'ماليزيا',

        'MV' => 'مالديف',

        'ML' => 'مالي',

        'MT' => 'مالطا',

        'MH' => 'جزر مارشال',

        'MQ' => 'مارتينيك',

        'MR' => 'موريتانيا',

        'MU' => 'موريشيوس',

        'YT' => 'مايوت',

        'MX' => 'المكسيك',

        'FM' => 'ميكرونيسيا ',

        'MD' => 'مولدوفا',

        'MC' => 'موناكو',

        'MN' => 'منغوليا',

        'ME' => 'الجبل الأسود',

        'MS' => 'مونتسيرات',

        'MA' => 'المغرب',

        'MZ' => 'موزامبيق',

        'MM' => 'ميانمار (بورما)',

        'NA' => 'ناميبيا',

        'NR' => 'ناورو',

        'NP' => 'نيبال',

        'NL' => 'هولندا',

        'NC' => 'كاليدونيا الجديدة',

        'NZ' => 'نيوزيلندا',

        'NI' => 'نيكاراغوا',

        'NE' => 'النيجر',

        'NG' => 'نيجيريا',

        'NU' => 'نيوي',

        'NF' => 'جزيرة نورفولك',

        'KP' => 'كوريا الشمالية',

        'MK' => 'مقدونيا الشمالية',

        'MP' => 'جزر ماريانا الشمالية',

        'NO' => 'النرويج',

        'OM' => 'عمان',

        'PK' => 'باكستان',

        'PW' => 'بالاو',

        'PS' => 'الأراضي الفلسطينية',

        'PA' => 'بنما',

        'PG' => 'بابوا غينيا الجديدة',

        'PY' => 'باراغواي',

        'PE' => 'بيرو',

        'PH' => 'الفلبين',

        'PN' => 'جزر بيتكيرن',

        'PL' => 'بولندا',

        'PT' => 'البرتغال',

        'PR' => 'بورتوريكو',

        'QA' => 'قطر',

        'RE' => 'رمونيون',

        'RO' => 'رومانيا',

        'RU' => 'روسيا',

        'RW' => 'رواندا',

        'WS' => 'ساموا',

        'SM' => 'سان مارينو',

        'ST' => ' ساو تومي وبرينسيب',

        'SA' => 'المملكة العربية السعودية',

        'SN' => 'السنغال',

        'RS' => 'صربيا',

        'SC' => 'سيشيل',

        'SL' => 'سيراليون',

        'SG' => 'سنغافورة',

        'SX' => 'سانت مارتن',

        'SK' => 'سلوفاكيا',

        'SI' => 'سلوفينيا',

        'SB' => 'جزر سليمان',

        'SO' => 'الصومال',

        'ZA' => 'جنوب أفريقيا',

        'GS' => 'جورجيا الجنوبية وجزر ساندويتش الجنوبية',

        'KR' => 'كوريا الجنوبية',

        'SS' => 'جنوب السودان',

        'ES' => 'إسبانيا',

        'LK' => 'سري لانكا',

        'BL' => 'سانت بارثولوميو',

        'SH' => 'سانت هيلانة',

        'KN' => 'سانت كيتس ونيفيس',

        'LC' => 'سانت لوسيا',

        'MF' => 'سانت مارتن',

        'PM' => 'سانت بيير وميكلون',

        'VC' => 'سانت فنسنت وجزر غرينادين',

        'SD' => 'السودان',

        'SR' => 'سورينام',

        'SJ' => 'سفالبارد وجان ماين',

        'SE' => 'السويد',

        'CH' => 'سويسرا',

        'SY' => 'سوريا',

        'TW' => 'تايوان',

        'TJ' => 'طاجيكستان',

        'TZ' => 'تنزانيا',

        'TH' => 'تايلند',

        'TL' => 'تيمور-ليشتي',

        'TG' => 'توغو',

        'TK' => 'توكيلاو',

        'TO' => 'تونغا',

        'TT' => 'ترينيداد وتوباغو',

        'TN' => 'تونس',

        'TR' => 'تركيا',

        'TM' => 'تركمانستان',

        'TC' => 'جزر تركس وكايكوس',

        'TV' => 'توفالو',

        'UM' => 'جزر الولايات المتحدة النائية',

        'VI' => 'جزر فيرجن الأمريكية',

        'UG' => 'أوغندا',

        'UA' => 'أوكرانيا',

        'AE' => 'الإمارات العربية المتحدة',

        'GB' => 'المملكة المتحدة',

        'US' => 'الولايات المتحدة',

        'UY' => 'أوروغواي',

        'UZ' => 'أوزبكستان',

        'VU' => 'فانواتو',

        'VA' => 'مدينة الفاتيكان',

        'VE' => 'فنزويلا',

        'VN' => 'فيتنام',

        'WF' => 'واليس وفوتونا',

        'EH' => 'الصحراء الغربية',

        'YE' => 'اليمن',

        'ZM' => 'زامبيا',

        'ZW' => 'زمبابوي',      

        );

        

    }



    $trans = $arrayList[$ccode];



    return $trans;

}