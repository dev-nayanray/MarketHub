<?php
/**
 * Template Name: Shop Page
 */

get_header();
?>


<div class="container mx-auto py-8">
    <?php if (class_exists('WooCommerce')) : // Check if WooCommerce is active ?>
        <!-- Filtering options -->
        <div class="flex flex-col sm:flex-row justify-between items-center mb-8">
            <div class="mb-4 sm:mb-0">
                <label for="sorting" class="text-sm font-medium text-gray-700">Sort by:</label>
                <select id="sorting" name="sorting" class="ml-2 border border-gray-300 rounded-md py-1 px-2 text-sm">
                    <option value="popularity">Popularity</option>
                    <option value="price-low-high">Price: Low to High</option>
                    <option value="price-high-low">Price: High to Low</option>
                    <option value="latest">Latest</option>
                </select>
            </div>
            <div>
                <label for="filter" class="text-sm font-medium text-gray-700">Filter by:</label>
                <select id="filter" name="filter" class="ml-2 border border-gray-300 rounded-md py-1 px-2 text-sm">
                    <option value="all">All</option>
                    <?php
                    $categories = get_terms('product_cat');
                    foreach ($categories as $category) :
                    ?>
                        <option value="<?php echo $category->slug; ?>"><?php echo $category->name; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <!-- Search bar -->
        <div class="mb-8">
            <form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
                <label for="search" class="sr-only"><?php echo __('Search for:', 'markethub'); ?></label>
                <input type="search" id="search" class="w-full border border-gray-300 rounded-md py-2 px-4 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="<?php echo __('Search products...', 'markethub'); ?>" value="<?php echo get_search_query(); ?>" name="s">
                <button type="submit" class="sr-only"><?php echo __('Search', 'markethub'); ?></button>
            </form>
        </div>

        <!-- Category menu -->
        <div class="flex flex-wrap justify-center sm:justify-start space-x-4 mb-8 overflow-x-auto">
            <a href="<?php echo get_permalink(get_option('woocommerce_shop_page_id')); ?>" class="py-2 px-4 text-sm font-medium text-gray-700 rounded-md hover:bg-gray-100">All</a>
            <?php
            foreach ($categories as $category) :
                $category_link = get_term_link($category);
            ?>
                <a href="<?php echo esc_url($category_link); ?>" class="py-2 px-4 text-sm font-medium text-gray-700 rounded-md hover:bg-gray-100"><?php echo $category->name; ?></a>
            <?php endforeach; ?>
        </div>
    <?php
    // Query WooCommerce products
    $args = array(
        'post_type' => 'product',
        'posts_per_page' => 12, // Number of products to display
    );

    $products = new WP_Query($args);

    // Check if there are products
    if ($products->have_posts()) :
    ?>
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
        </div>
    <?php endif; ?>
    <?php wp_reset_postdata(); ?>
    </div>

    <?php get_footer(); ?>
<?php endif; ?>
