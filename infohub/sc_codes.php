<?php

/*-- Index - Shortcode --*/
function get_index(){

	$lang = pll_current_language();
	ob_start();
	include(plugin_dir_path(__FILE__)."templates/infohub-index.php");
	$shorcode_php_function = ob_get_clean();

	return $shorcode_php_function;
}
add_shortcode("getindex","get_index");

/*-- Cities - Shortcode --*/
function get_infohub_cities(/*$atts*/){

	$lang = pll_current_language();
	ob_start();
	include(plugin_dir_path(__FILE__)."templates/infohub-cities.php");
	$shorcode_php_function = ob_get_clean();

	return $shorcode_php_function;
}
add_shortcode("cities","get_infohub_cities");

/*-- Projects - Shortcode --*/
function infohub_projects($atts){

	$lang = pll_current_language();
	ob_start();
	include(plugin_dir_path(__FILE__)."templates/infohub-projects.php");
	$shorcode_php_function = ob_get_clean();

	return $shorcode_php_function;
}
add_shortcode("projects","infohub_projects");

/*-- Organizations - Shortcode --*/
function infohub_organizations($atts){

	$lang = pll_current_language();
	ob_start();
	include(plugin_dir_path(__FILE__)."templates/infohub-organizations.php");
	$shorcode_php_function = ob_get_clean();

	return $shorcode_php_function;
}
add_shortcode("organizations","infohub_organizations");

/*-- Publications - Shortcode --*/
function infohub_publications($atts){

	$lang = pll_current_language();
	ob_start();

	// $arrays = array(
	// 	'test-1' => 1,
	// 	'test-2' => 2
	// );
	include(plugin_dir_path(__FILE__)."templates/infohub-publications.php");
	$shorcode_php_function = ob_get_clean();

	return $shorcode_php_function;
}
add_shortcode("publications","infohub_publications");
