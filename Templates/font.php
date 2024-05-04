<?php
/*
Template Name: Home Page
*/

get_header(); ?>

<?php get_template_part('loop/carosel'); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

        <?php
        // Query for products
        // Example: $products = new WP_Query('post_type=product');
        // Loop through products
        // Example:
        // if ($products->have_posts()) :
        //     while ($products->have_posts()) : $products->the_post();
        //         // Output product content
        //     endwhile;
        // endif;
        ?>

    </main><!-- #main -->
</div><!-- #primary -->

<?php get_template_part('loop/cata-tab'); ?>

<?php get_template_part('loop/vendor'); ?>

<?php get_footer(); ?>
