 <?php /* Template Name: Infohub Default Error Page */ ?>

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
$postId = get_the_ID();

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

        
          <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
              <center>
                <img src="<?php print get_theme_url();?>/img/error-404.png" class="img-fluid">
              </center>
            </div>
            <div class="col-md-2"></div>
          </div>
        
        
        

      </div>

      <div class="spacer-120"></div>
    </section>



  <?php get_footer();?>








