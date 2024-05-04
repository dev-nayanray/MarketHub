<?php
/* Template Name: Custom My Account Page */

get_header();

// Ensure WooCommerce and Dokan are active
if (!class_exists('WooCommerce') || !function_exists('dokan_is_user_seller')) {
    echo '<p>WooCommerce and Dokan need to be activated to use this page.</p>';
    get_footer();
    exit;
}

// Fetch the current user's details
$user_id = get_current_user_id();
$user = get_userdata($user_id);
$user_role = $user->roles[0];

?>
<div class="container mx-auto mt-12">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Sidebar for Navigation -->
        <div class="col-span-1 bg-white shadow-lg rounded-lg p-4">
            <h2 class="font-semibold text-xl mb-4">Account Navigation</h2>
            <?php do_action('woocommerce_account_navigation'); ?>
        </div>

        <!-- Main Content Area -->
        <div class="col-span-1 md:col-span-2 bg-white shadow-lg rounded-lg p-4">
            <h2 class="font-semibold text-xl mb-4">Welcome, <?php echo $user->display_name; ?></h2>
            <?php
                // Show WooCommerce My Account content
                do_action('woocommerce_account_content');
            ?>
        </div>
    </div>
</div>
<?php if (dokan_is_user_seller($user_id)): ?>
    <div class="mb-4">
        <h3 class="font-semibold text-lg">Vendor Dashboard</h3>
        <ul>
            <li><a href="<?php echo dokan_get_navigation_url('dashboard'); ?>">Dashboard</a></li>
            <li><a href="<?php echo dokan_get_navigation_url('products'); ?>">Products</a></li>
            <li><a href="<?php echo dokan_get_navigation_url('orders'); ?>">Orders</a></li>
            <li><a href="<?php echo dokan_get_navigation_url('settings/store'); ?>">Store Settings</a></li>
        </ul>
    </div>
<?php endif; ?>
