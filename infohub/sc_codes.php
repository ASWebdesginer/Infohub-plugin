<?php



/*-- Index - Shortcode --*/

function get_index()
{



	$lang = pll_current_language();

	ob_start();

	include(plugin_dir_path(__FILE__) . "templates/infohub-index.php");

	$shorcode_php_function = ob_get_clean();



	return $shorcode_php_function;
}

add_shortcode("getindex", "get_index");



/*-- Cities - Shortcode --*/

function get_infohub_cities(/*$atts*/)
{



	$lang = pll_current_language();

	ob_start();

	include(plugin_dir_path(__FILE__) . "templates/infohub-cities.php");

	$shorcode_php_function = ob_get_clean();



	return $shorcode_php_function;
}

add_shortcode("cities", "get_infohub_cities");



/*-- Projects - Shortcode --*/

function infohub_projects($atts)
{



	$lang = pll_current_language();

	ob_start();

	include(plugin_dir_path(__FILE__) . "templates/infohub-projects.php");

	$shorcode_php_function = ob_get_clean();



	return $shorcode_php_function;
}

add_shortcode("projects", "infohub_projects");



/*-- Organizations - Shortcode --*/

function infohub_organizations($atts)
{



	$lang = pll_current_language();

	ob_start();

	include(plugin_dir_path(__FILE__) . "templates/infohub-organizations.php");

	$shorcode_php_function = ob_get_clean();



	return $shorcode_php_function;
}

add_shortcode("organizations", "infohub_organizations");



/*-- Publications - Shortcode --*/

function infohub_publications($atts)
{



	$lang = pll_current_language();

	ob_start();



	// $arrays = array(

	// 	'test-1' => 1,

	// 	'test-2' => 2

	// );

	include(plugin_dir_path(__FILE__) . "templates/infohub-publications.php");

	$shorcode_php_function = ob_get_clean();



	return $shorcode_php_function;
}

add_shortcode("publications", "infohub_publications");


function infohub_publications_research_shortcode($atts)
{
	// Extract shortcode attributes
	$atts = shortcode_atts(
		array(
			'id' => '0'
		),
		$atts
	);

	// Get current language
	$lang = pll_current_language();

	// Start output buffering
	ob_start();

	// Call function to retrieve publication results
	print returnpubresults($atts['id']);
	// Get the buffered content and clean the output buffer
	$shortcoderesu = ob_get_clean();

	// Return the shortcode result
	return $shortcoderesu;
}

add_shortcode("publications_research", "infohub_publications_research_shortcode");


function infohub_organization_research_shortcode($atts)
{
	// Extract shortcode attributes
	$atts = shortcode_atts(
		array(
			'id' => '0'
		),
		$atts
	);

	// Get current language
	$lang = pll_current_language();

	// Start output buffering
	ob_start();

	// Call function to retrieve publication results
	print returnfromprojectorgs($atts['id']);
	// Get the buffered content and clean the output buffer
	$shortcoderesu = ob_get_clean();

	// Return the shortcode result
	return $shortcoderesu;
}

add_shortcode("organization_research", "infohub_organization_research_shortcode");
