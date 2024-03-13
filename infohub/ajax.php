<?php



/*-- Ajax --*/



function infohubListAjax()
{

	$data = $_POST['data'];

	echo do_shortcode('[' . $data . ']');

	exit();
}

add_action("wp_ajax_infohubListAjax", "infohubListAjax");

add_action("wp_ajax_nopriv_infohubListAjax", "infohubListAjax");





function getCitySelect()
{



	$lang = pll_current_language();

	$output = "";

	$data = $_POST['data'];

	//$arrayCountry = serialize(explode(",",$data));

	$arrayCountry = explode(",", $data);



	//print_r($arrayCountry);



	$args = array(

		'post_type' => 'city',

		'post_status' => 'publish',

		'posts_per_page' => -1,

		'meta_query' => array(

			'relation' => 'AND',

			array(

				'key' => 'country',

				'value' => $arrayCountry,

				'compare' => 'IN'

			),

		),

	);



	$query = get_posts($args);



	$arrayOptGrp = array();

	$arrayList = array();

	foreach ($query as $rows) {



		//print_r($rows);



		$postId = $rows->ID;

		$getParentCountry = get_field("field_65070d4d2ac3c", $postId);

		$cvalue = $getParentCountry['value'];

		$clabel = $getParentCountry['label'];

		$cityName = getRelName($postId);



		$arrayList[$cvalue . ' - ' . $clabel][$postId] = $cityName;
	}



	$arrayOutput = array();

	foreach ($arrayList as $keys => $values) {



		$arrayOutput[] = '<option disabled>' . $keys . '</option>';



		foreach ($values as $childKey => $childVal) {

			$arrayOutput[] = '<option value="' . $childKey . '">' . $childVal . '</option>';
		}
	}



	$outputCities =  implode("", $arrayOutput);



	print $outputCities;



	exit();
}

add_action("wp_ajax_getCitySelect", "getCitySelect");

add_action("wp_ajax_nopriv_getCitySelect", "getCitySelect");



function filterProj()
{



	$lang = pll_current_language();

	$output = "";



	$jsonEncode = json_encode(parse_str($_POST['data'], $arr));



	if ($_POST['tabs'] == "cities") {

		$result = getCitiesFiltered($arr);
	}



	if ($_POST['tabs'] == "projects") {

		$result = getProjFiltered($arr);
	}



	if ($_POST['tabs'] == "organizations") {

		$result = getOrgsFiltered($arr);
	}



	if ($_POST['tabs'] == "publications") {

		$result = getPubsFiltered($arr);
	}





	print $result;



	exit();
}

add_action("wp_ajax_filterProj", "filterProj");

add_action("wp_ajax_nopriv_filterProj", "filterProj");


function searchProj()
{



	$lang = pll_current_language();

	$output = "";



	$jsonEncode = json_encode(parse_str($_POST['datas'], $arr));



	if ($_POST['tabs'] == "cities") {

		$result = getcitySearch($arr);
	}



	if ($_POST['tabs'] == "projects") {

		$result = getprojsearch($arr);
	}



	if ($_POST['tabs'] == "organizations") {

		$result = getorgsearch($arr);
	}



	if ($_POST['tabs'] == "publications") {

		$result = getPubsSearch($arr);
	}





	print $result;



	exit();
}

add_action("wp_ajax_searchProj", "searchProj");

add_action("wp_ajax_nopriv_searchProj", "searchProj");


function searchresultsposts()
{



	$lang = pll_current_language();

	$output = "";



	$jsonEncode = json_encode(parse_str($_POST['datas'], $arr));



	if ($_POST['tabs'] == "organizations") {

		$result = getorgsresults($arr);
	}



	if ($_POST['tabs'] == "publications") {

		$result = getpubresults($arr);
	}





	print $result;



	exit();
}

add_action("wp_ajax_searchresultsposts", "searchresultsposts");

add_action("wp_ajax_nopriv_searchresultsposts", "searchresultsposts");


// Include TCPDF library


// Function to generate PDF
function generate_pdf()
{
	require_once(plugin_dir_path(__FILE__) . 'templates/TCPDF-main/tcpdf.php');
	// Create new PDF instance
	try {
		// Create new PDF instance
		// $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

		// PDF generation code ...
		// (Add your PDF generation code here)

		// Create a new TCPDF object

		// Create a new TCPDF object
		$pdf = new TCPDF();

		// Set PDF properties
		$pdf->SetCreator('Your Name');
		$pdf->SetAuthor('Your Name');
		$pdf->SetTitle('Webpage to PDF');
		$pdf->SetSubject('Converting Webpage to PDF');
		$pdf->SetKeywords('TCPDF, PDF, webpage');

		// Add a page
		$pdf->AddPage();

		// Get the HTML content of the webpage
		$html = file_get_contents('https://dev.araburban.org/en/infohub/projects/?id=3814');

		$css = file_get_contents('https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css?ver=1.0');
		$css2 = file_get_contents('https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css?ver=1.0');
		$css3 = file_get_contents('https://dev.araburban.org/wp-content/themes/audi/css/locomotive-scroll.css?ver=1.0');
		$css4 = file_get_contents('https://dev.araburban.org/wp-content/themes/audi/css/main.css?ver=1.0');
		$css5 = file_get_contents('https://dev.araburban.org/wp-content/themes/audi/css/navigation.css?ver=1.0');
		$css6 = file_get_contents('https://dev.araburban.org/wp-content/themes/audi/css/responsive.css?ver=1.0');
		$css7 = file_get_contents('https://dev.araburban.org/wp-content/themes/audi/style.css?ver=1.0.0');

		// Open the file and read its content
		// $fileContent = file_get_contents($fileName);

		// Find the position of the <head> tag
		$headPos = strpos($html, "<head>");

		if ($headPos !== false) {
			// Create the style tag
			$styleTag = "<style>" . $css . $css2 . $css3 . $css4 . $css5 . $css6 . $css7 . "</style>";

			// Insert the style tag after the <head> tag
			$newContent = substr($html, 0, $headPos + strlen("<head>")) . $styleTag . substr($html, $headPos + strlen("<head>"));
		} else {
			// Handle case where no <head> tag is found (add style at the beginning)
			$styleTag = "<style>"  . $css . $css2 . $css3 . $css4 . $css5 . $css6 . $css7 . "</style>";
			$newContent = $styleTag . $html;
		}


		// Write the HTML content to the PDF
		$pdf->writeHTML($new, true, false, true, false, '');

		// Output the PDF to a file
		$pdfFilePath = WP_CONTENT_DIR . '/uploads/webpage_to_pdf.pdf';
		$pdf->Output($pdfFilePath, 'F');

		// Return the PDF file path in the AJAX response
		echo json_encode(array('pdfUrl' => $pdfFilePath));
	} catch (Exception $e) {
		// Handle any exceptions
		header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
		echo 'Error generating PDF: ' . $e->getMessage();
	}
	exit;
}

// Add AJAX action for PDF generation
add_action('wp_ajax_generate_pdf', 'generate_pdf');
add_action('wp_ajax_nopriv_generate_pdf', 'generate_pdf');



// fetching the organization data 


function showpublications(){
	$id=$_POST['pub'];
    $currenttype=get_post_type($id);
     $result='';
	if($currenttype == 'publication') {
     $result=returnpubresults($id);
	}
	echo $result;
	die();
}


add_action("wp_ajax_showpublications",'showpublications');
add_action("wp_ajax_nopriv_showpublications", 'showpublications');