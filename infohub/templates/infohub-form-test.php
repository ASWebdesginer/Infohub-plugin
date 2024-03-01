 <?php /* Template Name: Infohub Form Test Page */ ?>

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

$lang = pll_current_language();
$post_Id = get_the_ID();

$getProj = getProj();

$projUrl = home_url().'/infohub/projects/?id=';
if($lang == "ar"){
  $projUrl = home_url().'/infohub-ar /projects/?id=';
}



?>

<?php get_header(); ?>

<header>
  <?php include ("../wp-content/themes/audi/template-parts/navigation.php");?>
</header>

  <div data-scroll-container>

    <div id="top"></div>

    <section class="non-vh filter-100" >

      <div class="spacer-40"></div>
      <div class="spacer-120"></div>

      <div class="container">

        <?php print getSelectOptionList("project","section_2","topic_words","field_65a94601c269b");?>
        <?php //getTermNameReverse(775);?>

      </div>
        
        

      </div>

      <div class="spacer-120"></div>
    </section>



  <?php get_footer();?>








