<?php
/**
 * Template Name: Single Product Page
 */

get_header();

if ( have_posts() ) :
    while ( have_posts() ) : the_post();
?>

<section class="py-8 bg-white md:py-16 dark:bg-gray-900 antialiased">
    <div class="max-w-screen-xl px-4 mx-auto 2xl:px-0">
        <div class="lg:grid lg:grid-cols-2 lg:gap-8 xl:gap-16">
            <!-- Your existing product details section -->
            <div class="shrink-0 max-w-md lg:max-w-lg mx-auto">
                <?php the_post_thumbnail( 'large', array( 'class' => 'w-full dark:hidden' ) ); ?>
            </div>

            <div class="mt-6 sm:mt-8 lg:mt-0">
                <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white"><?php the_title(); ?></h1>
                <div class="mt-4 sm:items-center sm:gap-4 sm:flex">
                    <p class="text-2xl font-extrabold text-gray-900 sm:text-3xl dark:text-white"><?php echo wc_price( wc_get_product()->get_price() ); ?></p>
                </div>

                <div class="mt-6 sm:gap-4 sm:items-center sm:flex sm:mt-8">
                    <!-- Add to favorites button -->
                    <a href="#" title="" class="flex items-center justify-center py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700" role="button">
                        <svg class="w-5 h-5 -ms-2 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12.01 6.001C6.5 1 1 8 5.782 13.001L12.011 20l6.23-7C23 8 17.5 1 12.01 6.002Z"/>
                        </svg>
                        Add to favorites
                    </a>

                    <!-- Add to cart button -->
                    <a href="#" title="" class="text-black mt-4 sm:mt-0 bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800 flex items-center justify-center" role="button">
                        <svg class="w-5 h-5 -ms-2 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4h1.5L8 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm.75-3H7.5M11 7H6.312M17 4v6m-3-3h6"/>
                        </svg>
                        Add to cart
                    </a>
                </div>

                <hr class="my-6 md:my-8 border-gray-200 dark:border-gray-800" />

                <?php the_content(); ?>
            </div>
        </div>
    </div>

    <!-- Related products section -->
    <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8 mt-12 grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
        <?php
        $related_products = wc_get_related_products( get_the_ID(), 4 ); // Get related products IDs
        if ( !empty( $related_products ) ) {
            foreach ( $related_products as $related_product ) {
                $product = wc_get_product( $related_product ); // Get related product data
        ?>
        <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <a href="<?php echo get_permalink( $product->get_id() ); ?>">
                <?php echo $product->get_image( array( 'class' => 'p-8 rounded-t-lg' ) ); ?>
            </a>
            <div class="px-5 pb-5">
                <a href="<?php echo get_permalink( $product->get_id() ); ?>">
                    <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white"><?php echo $product->get_name(); ?></h5>
                </a>
                <!-- Rating stars -->
                <div class="flex items-center mt-2.5 mb-5">
                    <?php
                    $average_rating = $product->get_average_rating();
                    for ( $i = 1; $i <= 5; $i++ ) {
                        if ( $i <= $average_rating ) {
                            echo '<svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20"><path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/></svg>';
                        } else {
                            echo '<svg class="w-4 h-4 text-gray-200 dark:text-gray-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20"><path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/></svg>';
                        }
                    }
                    ?>
                    <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ms-3"><?php echo $average_rating; ?></span>
                </div>
                <!-- Product price -->
                <div class="flex items-center justify-between">
                    <span class="text-3xl font-bold text-gray-900 dark:text-white"><?php echo $product->get_price_html(); ?></span>
                    <a href="<?php echo esc_url( $product->add_to_cart_url() ); ?>" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add to cart</a>
                </div>
            </div>
        </div>
        <?php
            }
        }
        ?>
    </div>
</section>


<?php
    endwhile;
endif;

get_footer();
?>
