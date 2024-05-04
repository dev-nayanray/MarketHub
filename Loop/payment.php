<div class=" w-full max-w-sm mx-auto p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 dark:bg-gray-800 dark:border-gray-700 payment-methods-background">
    <h5 class="mb-3 text-base font-semibold text-gray-900 md:text-xl dark:text-white">Available Payment Methods</h5>
    <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Choose a payment method to proceed.</p>
    <ul class="my-4 space-y-3">
        <?php
        if (class_exists('WC_Payment_Gateways')) {
            $available_gateways = WC()->payment_gateways->get_available_payment_gateways();
            if (!empty($available_gateways)) {
                foreach ($available_gateways as $gateway) {
                    if ($gateway->enabled == 'yes') {
                        ?>
                        <li class="flex items-center p-3 bg-gray-50 hover:bg-gray-100 rounded-lg group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500">
                            <?php if ($gateway->get_icon()) { ?>
                                <img class="h-8 mr-3" src="<?php echo esc_url($gateway->get_icon()); ?>" alt="<?php echo esc_attr($gateway->get_title() . ' icon'); ?>" />
                            <?php } ?>
                            <span class="text-base font-bold text-gray-900 dark:text-white"><?php echo esc_html($gateway->get_title()); ?></span>
                        </li>
                        <?php
                    }
                }
            } else {
                echo '<li class="text-gray-900 dark:text-white">No payment methods are available.</li>';
            }
        } else {
            echo '<li class="text-gray-900 dark:text-white">WooCommerce payment gateways are not initialized.</li>';
        }
        ?>
    </ul>
</div>
