<?php
/**
* Infohub Cities Page
**/

$lang = pll_current_language();

$getCity = getCity();

$frtl = "";
if($lang == "ar"){
	$frtl = "force-ltr";
}

$projUrl = home_url().'/infohub/cities/?id=';

if($lang == "ar"){

  $projUrl = home_url().'/infohub-ar/cities/?id=';

}

?>



<div id="city-list" class="infohub-list">
	
	<!--list view-->
	<div class="list-view">
		<div class="row ">

			<?php 	
				foreach($getCity as $row){ 

					$disabled = 'onClick="return false;"';
					$url = '#';
					if($row['city_page'] == 1){
						$disabled = '';
						$url =  $projUrl.$row['ID'];
					}

			  	$markers = "";
			  	$getmarkers = $row['city_markers'];
			  	if($getmarkers == 1867 || $getmarkers == 1873){ $markers = "m-blue";}
			  	if($getmarkers == 1865 || $getmarkers == 1871){ $markers = "m-black";}
			  	if($getmarkers == 1869 || $getmarkers == 1875){ $markers = "m-gray";}

			?>

				<div class="col-md-12">
					<a href="<?php print $url; ?>" <?php print $disabled; ?>>
						<div class="list <?php print $markers;?>">
							<p class="remMar"><b><?php print $row['title'];?></b>, <?php print $row['country'];?></p>
							<p class="remMar"><small><?php print $row['city_size'];?></small></p>
						</div>
					</a>
					<div class="spacer-10"></div>
				</div>

			<?php }?>

								

		</div>	
	</div>

	<!--map view-->
	<div class="map-view relThis">
		<div id="infohub-cities-map" class="infohub-map"></div>
		<div class="legends">
			<p class="d-flex align-items-center remMar">
				<i class="fa-solid fa-square fa-dark"></i> <?php print forceTranslate("Cities with a page in the Portal","المدن التي لها صفحة مدينة في البوابة");?>
			</p>
			<p class="d-flex align-items-center remMar">
				<i class="fa-solid fa-square fa-blue"></i> <?php print forceTranslate("AUDI member cities","المدن الأعضاء في AUDI");?>
			</p>
			<p class="d-flex align-items-center remMar">
				<i class="fa-solid fa-square fa-light"></i> <?php print forceTranslate("Other Arab cities","مدن عربية أخرى");?>
			</p>			
		</div>
	</div>

</div>






