<?php
// Ensure WooCommerce is active
if ( ! class_exists( 'WooCommerce' ) ) {
  return;
}
get_header();
?>

<section class="bg-white py-8 antialiased dark:bg-gray-900 md:py-16">
  <form class="checkout woocommerce-checkout mx-auto max-w-screen-xl px-4 2xl:px-0" method="post" action="<?php echo esc_url( wc_get_checkout_url() ); ?>">

    <!-- Step indicators (Cart, Checkout, Order Summary) -->
    <ol class="items-center flex w-full max-w-2xl text-center text-sm font-medium text-gray-500 dark:text-gray-400 sm:text-base">
      <?php if ( WC()->cart->get_cart_contents_count() !== 0 ) : ?>
        <li class="flex items-center text-primary-700 dark:text-primary-500">
          <span class="flex items-center">
            <svg class="me-2 h-4 w-4 sm:h-5 sm:w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
            Cart
          </span>
        </li>
        <li class="flex items-center text-primary-700 dark:text-primary-500">
          <span class="flex items-center">
            <svg class="me-2 h-4 w-4 sm:h-5 sm:w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
            Checkout
          </span>
        </li>
        <li class="flex items-center">
          <svg class="me-2 h-4 w-4 sm:h-5 sm:w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
          </svg>
          Order summary
        </li>
      <?php endif; ?>
    </ol>

    <!-- Delivery and Payment Details Section -->
    <?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

    <div class="mt-6 sm:mt-8 lg:flex lg:items-start lg:gap-12 xl:gap-16">
      <div class="min-w-0 flex-1 space-y-8">
        <!-- Billing and Shipping Forms -->
        <div class="space-y-4">
          <?php do_action( 'woocommerce_checkout_billing' ); ?>
        </div>

        <!-- Payment Methods -->
        <div class="space-y-4">
          <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Payment</h3>
          <?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>
          <div id="payment" class="woocommerce-checkout-payment">
            <?php if ( WC()->cart->needs_payment() ) : ?>
              <ul class="wc_payment_methods payment_methods methods">
                <?php
                  if ( ! empty( $available_gateways ) ) {
                    foreach ( $available_gateways as $gateway ) {
                      wc_get_template( 'checkout/payment-method.php', array( 'gateway' => $gateway ) );
                    }
                  } else {
                    echo '<li>' . apply_filters( 'woocommerce_no_available_payment_methods_message', __( 'Sorry, it seems that no payment methods are available. Please contact us if you require assistance or wish to make alternate arrangements.', 'woocommerce' ) ) . '</li>';
                  }
                ?>
              </ul>
            <?php endif; ?>
            <div class="form-row place-order">
              <?php wc_get_template( 'checkout/terms.php' ); ?>
              <?php do_action( 'woocommerce_checkout_order_review' ); ?>
            </div>
          </div>
        </div>
      </div>

      <!-- Order Review Section -->
      <?php do_action( 'woocommerce_checkout_before_order_review' ); ?>
      <div class="mt-6 w-full space-y-6 sm:mt-8 lg:mt-0 lg:max-w-xs xl:max-w-md">
        <div id="order_review" class="woocommerce-checkout-review-order">
          <?php woocommerce_order_review(); ?>
        </div>
        <?php do_action( 'woocommerce_checkout_after_order_review' ); ?>
      </div>
    </div>

    <?php do_action( 'woocommerce_checkout_after_order_review' ); ?>
  </form>
</section>

<?php get_footer(); ?>
