<?php
/* Template Name: Shopping Cart */

get_header(); // Gets the header.php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

// Ensure WooCommerce is active
if ( function_exists('is_woocommerce') ) {
?>

<section class="bg-white py-8 antialiased dark:bg-gray-900 md:py-16">
  <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
    <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">Shopping Cart</h2>

    <div class="mt-6 sm:mt-8 md:gap-6 lg:flex lg:items-start xl:gap-8">
      <div class="mx-auto w-full flex-none lg:max-w-2xl xl:max-w-4xl">
        <?php woocommerce_content(); ?>
      </div>

      <div class="mx-auto mt-6 max-w-4xl flex-1 space-y-6 lg:mt-0 lg:w-full">
        <!-- Cart Totals -->
        <?php do_action( 'woocommerce_cart_totals' ); ?>
      </div>
    </div>
  </div>
</section>

<?php
} else {
    echo '<p>WooCommerce must be installed and activated!</p>';
}

get_footer(); // Gets the footer.php
?>
