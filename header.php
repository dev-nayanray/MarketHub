<?php
    ob_start(); // Start output buffering
?>
<!-- Your HTML and PHP code here -->



<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?> - <?php bloginfo('description'); ?></title>
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <?php wp_head(); ?>
</head>

<body <?php body_class('bg-gray-100'); ?>>
    <!-- Navigation Bar -->
    <nav class="bg-white border-gray-200 dark:bg-gray-900">
        <div class="max-w-screen-xl mx-auto px-4 flex justify-between items-center">
            <!-- Logo -->
            <a href="<?php echo esc_url(home_url('/')); ?>" class="shrink-0">
                <?php
                $custom_logo_id = get_theme_mod('custom_logo');
                $logo_image_url = wp_get_attachment_image_url($custom_logo_id, 'full');
                if ($logo_image_url) :
                ?>
                    <img src="<?php echo esc_url($logo_image_url); ?>" class="h-10" alt="<?php bloginfo('name'); ?> Logo" />
                <?php else : ?>
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/default-logo.png" class="h-10" alt="Default Logo" />
                <?php endif; ?>
            </a>

            <!-- Centered Navigation Menu -->
            <div class="hidden md:flex md:items-center md:space-x-4 lg:space-x-6">
                <?php if (has_nav_menu('primary-menu')) : ?>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary-menu',
                        'menu_class' => 'flex space-x-4',
                        'container' => false,
                    ));
                    ?>
                <?php else : ?>
                    <p>No primary menu set. Set it in WP Admin > Appearance > Menus.</p>
                <?php endif; ?>
            </div>

            <!-- Right-aligned Search and User Menu -->
            <div class="flex items-center space-x-3">
                 <button id="dark-mode-toggle" class="text-gray-800 dark:text-white">
        <!-- Use an appropriate icon for dark mode and light mode -->
        <!-- For example, a moon for dark mode and a sun for light mode -->
        <i class="fas fa-moon"></i>
    </button>
                <!-- Cart Icon with Dropdown -->
<div class="relative">
    <a href="<?php echo wc_get_cart_url(); ?>" class="flex items-center space-x-2 text-gray-800 hover:text-gray-600 dark:text-white">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h18v2a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V3zm2 6h14l2 9H3l2-9zm6 6a2 2 0 1 0 0-4 2 2 0 0 0 0 4z" />
        </svg>
        <span class="cart-contents-count text-sm font-semibold">(<?php echo WC()->cart->get_cart_contents_count(); ?>)</span>
    </a>
    <div id="cart-dropdown" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg z-50">
        <?php if ( ! WC()->cart->is_empty() ) : ?>
            <?php foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) :
                $_product = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                $product_name = apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key );
                $product_price = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
            ?>
            <div class="cart-item">
                <p><?php echo $product_name; ?> - <?php echo $product_price; ?></p>
            </div>
            <?php endforeach; ?>
        <?php else : ?>
            <p class="text-gray-600 dark:text-gray-400">Your cart is empty.</p>
        <?php endif; ?>

        <div class="p-4">
            <p class="text-gray-900 dark:text-white">Quick Cart View</p>
            <!-- List a few items here -->
            <a href="<?php echo wc_get_cart_url(); ?>" class="block mt-2 text-sm text-blue-700 hover:underline dark:text-blue-500">View Cart</a>
            <a href="<?php echo wc_get_checkout_url(); ?>" class="block text-sm text-blue-700 hover:underline dark:text-blue-500">Checkout</a>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var cartIcon = document.querySelector('.cart-contents-count');
    var cartDropdown = document.getElementById('cart-dropdown');

    cartIcon.addEventListener('click', function() {
        cartDropdown.classList.toggle('hidden');
    });
});
</script>



                <form role="search" method="get" class="search-form" action="<?php echo home_url('/'); ?>">
                    <label class="flex border border-gray-300 rounded overflow-hidden">
                        <input type="search" class="px-4 py-1" placeholder="Search ..." value="<?php echo get_search_query(); ?>" name="s" />
                        <button type="submit" class="bg-500 hover:bg-600 text-white p-2">
                            <span class="sr-only">Search</span>
                            <i class="fas fa-search"></i> <!-- Ensure FontAwesome is loaded or replace with SVG/image -->
                        </button>
                    </label>
                </form>
                <!-- User Menu and Login -->
                <?php if (is_user_logged_in()) : ?>
                    <div class="relative">
                        <button type="button" class="flex items-center bg-gray-800 text-white rounded-full p-1 focus:outline-none focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" aria-haspopup="true" onclick="toggleDropdown()">
                            <span class="sr-only">Open user menu</span>
                            <img class="w-8 h-8 rounded-full" src="<?php echo get_avatar_url(get_current_user_id()); ?>" alt="User photo">
                        </button>
                        <div id="user-dropdown" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg z-50">
                            <div class="py-3 px-4 text-sm text-gray-900">
                                <?php $current_user = wp_get_current_user(); ?>
                                <div><?php echo $current_user->display_name; ?></div>
                                <div class="text-gray-500"><?php echo $current_user->user_email; ?></div>
                            </div>
                            <ul class="text-gray-700">
                                <li><a href="<?php echo esc_url(home_url('/dashboard')); ?>" class="block px-4 py-2 hover:bg-gray-100">Dashboard</a></li>
                                <li><a href="<?php echo esc_url(wp_logout_url()); ?>" class="block px-4 py-2 hover:bg-gray-100">Sign out</a></li>
                            </ul>
                        </div>
                    </div>

                <?php else : ?>
                    <a href="<?php echo home_url('/login'); ?>" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login</a>
                <?php endif; ?>
            </div>
        </div>
    </nav>

   <script>
        function toggleDropdown() {
            var dropdown = document.getElementById('user-dropdown');
            if (dropdown.classList.contains('hidden')) {
                dropdown.classList.remove('hidden');
                dropdown.classList.add('block');
            } else {
                dropdown.classList.add('hidden');
                dropdown.classList.remove('block');
            }
        }
        document.getElementById('ajax-search-form').addEventListener('submit', function(event) {
    event.preventDefault();
    var searchInput = document.getElementById('search-input').value;

    var xhr = new XMLHttpRequest();
    xhr.open('POST', '<?php echo admin_url('admin-ajax.php'); ?>', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
        if (this.status === 200) {
            document.getElementById('search-results').innerHTML = this.responseText;
        }
    };
    xhr.send('action=perform_search&query=' + encodeURIComponent(searchInput));
});

    </script>
    

    <?php wp_body_open(); ?>
</body>

</html>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var cartIcon = document.querySelector('.cart-contents-count');
    var cartDropdown = document.getElementById('cart-dropdown');

    cartIcon.addEventListener('click', function() {
        cartDropdown.classList.toggle('hidden');
    });
});
</script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const darkModeToggle = document.getElementById('dark-mode-toggle');
    const body = document.body;

    // Check if dark mode preference is stored in local storage
    const isDarkMode = localStorage.getItem('darkMode') === 'true';

    // Function to enable dark mode
    function enableDarkMode() {
        body.classList.add('dark');
        localStorage.setItem('darkMode', true);
    }

    // Function to disable dark mode
    function disableDarkMode() {
        body.classList.remove('dark');
        localStorage.setItem('darkMode', false);
    }

    // Toggle dark mode based on current state
    function toggleDarkMode() {
        if (isDarkMode) {
            disableDarkMode();
        } else {
            enableDarkMode();
        }
    }

    // Set initial mode based on user preference
    if (isDarkMode) {
        enableDarkMode();
    }

    // Event listener for dark mode toggle
    darkModeToggle.addEventListener('click', function() {
        toggleDarkMode();
    });
});

</script>
