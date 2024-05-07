<?php
/* Template Name: Custom Checkout */
get_header(); ?>

<section class="bg-white py-8 antialiased dark:bg-gray-900 md:py-16">
  <form name="checkout" method="post" class="checkout woocommerce-checkout mx-auto max-w-screen-xl px-4 2xl:px-0" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">
    
    <!-- Navigation Steps -->
    <div class="text-center">
        <ol class="flex justify-center space-x-8 mb-6">
            <li class="text-primary-500">Cart ></li>
            <li class="text-primary-500">Checkout ></li>
            <li class="text-gray-500">Order Summary</li>
        </ol>
    </div>
    
    <?php if ( WC()->cart->get_cart_contents_count() !== 0 ) : ?>

    <div class="lg:flex lg:items-start lg:gap-12 xl:gap-16">
      <div class="min-w-0 flex-1 space-y-8">
        <div class="space-y-4">
          <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Delivery Details</h2>
          <?php do_action( 'woocommerce_checkout_billing' ); ?>
        </div>

        <div class="space-y-4">
          <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Payment</h3>
          <?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>
          <?php do_action( 'woocommerce_checkout_payment' ); ?>
        </div>
      </div>

      <div class="mt-6 w-full space-y-6 sm:mt-8 lg:mt-0 lg:max-w-xs xl:max-w-md">
        <div class="flow-root">
          <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Your order</h3>
          <div class="divide-y divide-gray-200 dark:divide-gray-800">
            <?php do_action( 'woocommerce_checkout_order_review' ); ?>
          </div>
        </div>
      </div>
    </div>

    <?php else: ?>
        <div class="text-center">
            <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Your cart is empty!</h2>
            <p class="text-gray-600 dark:text-gray-400">Please add some products to your cart before checking out.</p>
        </div>
    <?php endif; ?>
  </form>
</section>

<?php get_footer(); ?>
