<?php

function hashThis(){
	$str = substr(md5(time()), 0, 20);
	return $str;
}
add_filter( 'shortcode_atts_wpcf7', 'custom_shortcode_atts_wpcf7_filter', 10, 3 );
 
function custom_shortcode_atts_wpcf7_filter( $out, $pairs, $atts ) {
  $my_attr = 'registration-id';
 
  if (isset( $atts[$my_attr] ) ) {
    $out[$my_attr] = $atts[$my_attr];
  }
 
  return $out;
}

function verifyId($regid){
		$lang = pll_current_language();
    global $wpdb;

    $table = 'wp_vxcf_leads_detail';
    $query = $wpdb->get_results("SELECT * FROM $table WHERE `value` = '".$regid."';");

    if($query){
    	return 1;
    }else{
    	return 0;
    }
}