<div class="flex items-center justify-center py-4 md:py-8 flex-wrap">
    <?php
    // Get product categories
    $product_categories = get_terms( 'product_cat', array( 'hide_empty' => false ) );
    // Display buttons for each category
    foreach ( $product_categories as $category ) :
    ?>
        <button type="button" class="text-gray-900 border border-white hover:border-gray-200 dark:border-gray-900 dark:bg-gray-900 dark:hover:border-gray-700 bg-white focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3 dark:text-white dark:focus:ring-gray-800"><?php echo esc_html( $category->name ); ?></button>
    <?php endforeach; ?>
</div>
<div class="grid grid-cols-1 md:grid-cols-5 gap-4 justify-center">
    <?php
    // Query WooCommerce products
    $args = array(
        'post_type' => 'product',
        'posts_per_page' => 10, // Display 12 products
    );
    $products = new WP_Query( $args );
    // Display product images
    if ( $products->have_posts() ) :
        while ( $products->have_posts() ) :
            $products->the_post();
    ?>
            <div class="w-full md:w-auto">
                <?php
                if ( has_post_thumbnail() ) {
                    the_post_thumbnail( 'medium', array( 'class' => 'h-auto max-w-full rounded-lg mx-auto' ) );
                }
                ?>
            </div>
    <?php
        endwhile;
        wp_reset_postdata(); // Reset the query
    endif;
    ?>
</div>
