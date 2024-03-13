<?php /* Template Name : NEW Publication posting */
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

if ($lang == "ar") {

    $frtl = "force-ltr";
}





?>



<?php get_header(); ?>



<script>
    <?php

    //print_r(get_field("section_2",$postId));

    print_r($query);

    ?>
</script>



<header>

    <?php include("../wp-content/themes/audi/template-parts/navigation.php"); ?>

</header>

<style>
    .divs{
        display: flex;
    }
    .divs h3,.divs p{
        color: red;
        font-size: 32px;;
    }
    .spacer-40{
        min-height: 100px;
    }
</style>
<div class="spacer-40"></div>
<div class="spacer-40"></div>
<div class="spacer-40"></div>
<div class="divs">
    <div class="lop">
        <h3>KIOLOO</h3>
    </div>
    <div class="lopss">
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iste cupiditate, hic illum non id repudiandae error eum, culpa, dolorem dolorum nobis libero. Excepturi eligendi quae, delectus optio officiis iste eum!</p>
    </div>
</div>
<div class="spacer-40"></div>
<div class="spacer-40"></div>
<div class="spacer-40"></div>

        <?php get_footer(); ?>