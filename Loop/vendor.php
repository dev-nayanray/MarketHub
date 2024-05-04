<?php
// Query WooCommerce products
$args = array(
    'post_type' => 'product',
    'posts_per_page' => 8, // Number of products to display
);

$products = new WP_Query($args);

// Check if there are products
if ($products->have_posts()) :
?>
    <!-- Featured Products -->
    <section class="container mx-auto my-8">
        <h2 class="text-2xl font-semibold mb-4">Vendor Spotlight</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
            <?php while ($products->have_posts()) : $products->the_post(); global $product; ?>
                <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                    <a href="<?php the_permalink(); ?>">
                        <?php
                        if (has_post_thumbnail()) {
                            the_post_thumbnail('woocommerce_thumbnail', ['class' => 'p-8 rounded-t-lg']);
                        } else {
                            echo '<img class="p-8 rounded-t-lg" src="' . wc_placeholder_img_src() . '" alt="Placeholder image" />';
                        }
                        ?>
                    </a>
                    <div class="px-5 pb-5">
                        <a href="<?php the_permalink(); ?>">
                            <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white"><?php the_title(); ?></h5>
                        </a>
                        <?php if ($product->get_average_rating()) : ?>
                            <div class="flex items-center mt-2.5 mb-5">
                                <?php echo wc_get_rating_html($product->get_average_rating()); // WooCommerce function to display star ratings ?>
                                <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ml-3"><?php echo esc_html($product->get_average_rating()); ?></span>
                            </div>
                        <?php endif; ?>
                        <div class="flex items-center justify-between">
                            <span class="text-3xl font-bold text-gray-900 dark:text-white"><?php echo $product->get_price_html(); ?></span>
                            <a href="<?php echo esc_url($product->add_to_cart_url()); ?>" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add to cart</a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        </div>
    </section>
<?php else : ?>
    <p>No products found.</p>
<?php endif; ?>
