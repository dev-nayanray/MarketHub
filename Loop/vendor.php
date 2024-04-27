<?php
// Query WooCommerce products
$args = array(
    'post_type' => 'product',
    'posts_per_page' => 4, // Number of products to display
);

$products = new WP_Query($args);

// Check if there are products
if ($products->have_posts()) :
?>
    <!-- Featured Products -->
    <section class="container mx-auto my-8">
        <h2 class="text-2xl font-semibold mb-4">Vendor Spotlight</h2>
        <!-- Vendor Carousel -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
            <!-- Product Carousel -->
            <?php while ($products->have_posts()) : $products->the_post(); ?>
                <!-- Product Card -->
                <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                    <a href="<?php the_permalink(); ?>">
                        <?php
                        if (has_post_thumbnail()) {
                            the_post_thumbnail('thumbnail', array('class' => 'p-8 rounded-t-lg'));
                        } else {
                            // Placeholder image if product doesn't have a thumbnail
                            echo '<img class="p-8 rounded-t-lg" src="' . get_template_directory_uri() . '/images/placeholder.jpg" alt="Placeholder image" />';
                        }
                        ?>
                    </a>
                    <div class="px-5 pb-5">
                        <a href="<?php the_permalink(); ?>">
                            <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white"><?php the_title(); ?></h5>
                        </a>
                        <!-- Add other product details here -->
                        <!-- Add to cart button -->
                        <?php woocommerce_template_loop_add_to_cart(); ?>
                    </div>
                </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        </div>
    </section>
<?php else : ?>
    <p>No products found</p>
<?php endif; ?>
