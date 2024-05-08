<?php
// Start by checking if WooCommerce is active.
if ( ! class_exists( 'WooCommerce' ) ) {
  return;
}
get_header();

// Enqueue necessary styles or scripts
wp_enqueue_script('custom-checkout-js');
?>

<section class="bg-white py-8 antialiased dark:bg-gray-900 md:py-16">
  <form method="post" class="checkout woocommerce-checkout mx-auto max-w-screen-xl px-4 2xl:px-0" action="<?php echo esc_url( wc_get_checkout_url() ); ?>">
    <div class="mt-6 sm:mt-8 lg:flex lg:items-start lg:gap-12 xl:gap-16">
      <div class="min-w-0 flex-1 space-y-8">
        <?php if ( $checkout->get_checkout_fields() ) : ?>
          <?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

          <!-- Customer Details -->
          <div class="space-y-4">
            <?php do_action( 'woocommerce_checkout_billing' ); ?>
            <?php do_action( 'woocommerce_checkout_shipping' ); ?>
          </div>

          <?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>
        <?php endif; ?>

        <!-- Payment Methods -->
        <div class="space-y-4">
          <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Payment</h3>
          <?php do_action( 'woocommerce_checkout_before_order_review_heading' ); ?>
          <h4 id="order_review_heading"><?php esc_html_e( 'Your order', 'woocommerce' ); ?></h4>

          <?php do_action( 'woocommerce_checkout_before_order_review' ); ?>
          <div id="order_review" class="woocommerce-checkout-review-order">
            <?php do_action( 'woocommerce_checkout_order_review' ); ?>
          </div>
          <?php do_action( 'woocommerce_checkout_after_order_review' ); ?>
        </div>
      </div>

      <!-- Order Summary -->
      <div class="mt-6 w-full space-y-6 sm:mt-8 lg:mt-0 lg:max-w-xs xl:max-w-md">
        <div class="flow-root">
          <div class="-my-3 divide-y divide-gray-200 dark:divide-gray-800">
            <?php woocommerce_order_review(); ?>
          </div>
        </div>

        <!-- Checkout Actions -->
        <div class="space-y-3">
          <?php do_action( 'woocommerce_review_order_before_submit' ); ?>

          <!-- Submit Button -->
          <?php echo apply_filters( 'woocommerce_order_button_html', '<button type="submit" class="button alt">' . esc_html( $order_button_text ) . '</button>' ); ?>

          <?php do_action( 'woocommerce_review_order_after_submit' ); ?>
          <p class="text-sm font-normal text-gray-500 dark:text-gray-400">
            One or more items in your cart require an account. <a href="#" title="" class="font-medium text-primary-700 underline hover:no-underline dark:text-primary-500">Sign in or create an account now.</a>
          </p>
        </div>
      </div>
    </div>
  </form>
</section>

<?php get_footer(); ?>
