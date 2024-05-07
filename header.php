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
            
                <!-- Cart Icon with Dropdown -->





 <form role="search" method="get" class="search-form" action="<?php echo home_url('/'); ?>">
                    <label class="flex border border-gray-300 rounded overflow-hidden">
                        <input type="search" class="px-4 py-1" placeholder="Search ..." value="<?php echo get_search_query(); ?>" name="s" />
                        <button type="submit" class="bg-500 hover:bg-600 text-white p-2">
                            <span class="sr-only">Search</span>
                            <i class="fas fa-search"></i> <!-- Ensure FontAwesome is loaded or replace with SVG/image -->
                        </button>
                    </label>
                </form>
                <button type="button" class="text-gray-900 bg-white hover:bg-gray-100 border border-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-gray-800 dark:bg-white dark:border-gray-700 dark:text-gray-900 dark:hover:bg-gray-200 me-2 mb-2">
<svg aria-hidden="true" class="w-10 h-3 me-2 -ms-1" viewBox="0 0 660 203" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M233.003 199.762L266.362 4.002H319.72L286.336 199.762H233.003V199.762ZM479.113 8.222C468.544 4.256 451.978 0 431.292 0C378.566 0 341.429 26.551 341.111 64.604C340.814 92.733 367.626 108.426 387.865 117.789C408.636 127.387 415.617 133.505 415.517 142.072C415.384 155.195 398.931 161.187 383.593 161.187C362.238 161.187 350.892 158.22 333.368 150.914L326.49 147.803L319.003 191.625C331.466 197.092 354.511 201.824 378.441 202.07C434.531 202.07 470.943 175.822 471.357 135.185C471.556 112.915 457.341 95.97 426.556 81.997C407.906 72.941 396.484 66.898 396.605 57.728C396.605 49.591 406.273 40.89 427.165 40.89C444.611 40.619 457.253 44.424 467.101 48.39L471.882 50.649L479.113 8.222V8.222ZM616.423 3.99899H575.193C562.421 3.99899 552.861 7.485 547.253 20.233L468.008 199.633H524.039C524.039 199.633 533.198 175.512 535.27 170.215C541.393 170.215 595.825 170.299 603.606 170.299C605.202 177.153 610.098 199.633 610.098 199.633H659.61L616.423 3.993V3.99899ZM551.006 130.409C555.42 119.13 572.266 75.685 572.266 75.685C571.952 76.206 576.647 64.351 579.34 57.001L582.946 73.879C582.946 73.879 593.163 120.608 595.299 130.406H551.006V130.409V130.409ZM187.706 3.99899L135.467 137.499L129.902 110.37C120.176 79.096 89.8774 45.213 56.0044 28.25L103.771 199.45L160.226 199.387L244.23 3.99699L187.706 3.996" fill="#0E4595"/><path d="M86.723 3.99219H0.682003L0 8.06519C66.939 24.2692 111.23 63.4282 129.62 110.485L110.911 20.5252C107.682 8.12918 98.314 4.42918 86.725 3.99718" fill="#F2AE14"/></svg>-
Wallet
</button><div class="relative">
    <a href="<?php echo wc_get_cart_url(); ?>" class="cart-icon-link flex items-center space-x-2 text-gray-800 hover:text-gray-600 dark:text-white">
        
        <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
<svg class="w-3.5 h-3.5 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 21">
<path d="M15 12a1 1 0 0 0 .962-.726l2-7A1 1 0 0 0 17 3H3.77L3.175.745A1 1 0 0 0 2.208 0H1a1 1 0 0 0 0 2h.438l.6 2.255v.019l2 7 .746 2.986A3 3 0 1 0 9 17a2.966 2.966 0 0 0-.184-1h2.368c-.118.32-.18.659-.184 1a3 3 0 1 0 3-3H6.78l-.5-2H15Z"/>
</svg>

        <span class="inline-flex items-center justify-center w-4 h-4 ms-2 text-xs font-semibold text-blue-800 bg-blue-200 rounded-full">(<?php echo WC()->cart->get_cart_contents_count(); ?>)

</span>
</button>
    </a>
    <div id="cart-dropdown" class="hidden absolute right-0 mt-2 w-72 bg-white rounded-md shadow-lg z-50">
        <div class="p-4">
            <p class="text-gray-900 dark:text-white">Quick Cart View</p>
            <ul>
                <?php
                $total_price = 0;
                foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                    $_product = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                    if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 ) {
                        $product_name = apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key );
                        $product_price = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
                        $product_quantity = apply_filters( 'woocommerce_cart_item_quantity', $cart_item['quantity'], $cart_item_key );
                        $product_total = apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key );
                        $total_price += $_product->get_price() * $cart_item['quantity'];
                        ?>
                        <li class="flex justify-between py-2 border-b">
                            <span><?php echo $product_name; ?> x <?php echo $product_quantity; ?></span>
                            <span><?php echo $product_total; ?></span>
                            <div class="flex items-center">
                                <a href="<?php echo wc_get_cart_remove_url($cart_item_key); ?>" class="text-red-500 hover:text-red-700 text-sm px-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </a>
                            </div>
                        </li>
                        <?php
                    }
                }
                ?>
            </ul>
            <p class="text-lg font-semibold text-right mr-4">Total: <?php echo wc_price($total_price); ?></p>
            <div class="flex items-center space-x-2">
                <a href="<?php echo wc_get_cart_url(); ?>" class="block mt-2 text-sm text-blue-700 hover:underline dark:text-blue-500">
                 <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
<svg class="w-3.5 h-3.5 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 21">
<path d="M15 12a1 1 0 0 0 .962-.726l2-7A1 1 0 0 0 17 3H3.77L3.175.745A1 1 0 0 0 2.208 0H1a1 1 0 0 0 0 2h.438l.6 2.255v.019l2 7 .746 2.986A3 3 0 1 0 9 17a2.966 2.966 0 0 0-.184-1h2.368c-.118.32-.18.659-.184 1a3 3 0 1 0 3-3H6.78l-.5-2H15Z"/>
</svg>View Cart</button>
                </a>
                <a href="<?php echo wc_get_checkout_url(); ?>" class="block text-sm text-blue-700 hover:underline dark:text-blue-500">
                    <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 mt-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Checkout
                        
                    </button>
                </a>
            </div>
        </div>
    </div>
</div>


<div class="flex items-center space-x-3">
                 <button id="dark-mode-toggle" class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-purple-600 to-blue-500 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800">
        <!-- Use an appropriate icon for dark mode and light mode -->
        <!-- For example, a moon for dark mode and a sun for light mode -->

        <i class="fas fa-moon"></i>Dark
    </button>
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
                                <li><a href="<?php echo esc_url(wp_logout_url()); ?>" class="block px-4 py-2 hover:bg-gray-100"><button type="button" class="text-gray-900 hover:text-white border border-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-gray-600 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-800">Sign Out</button>
</a></li>
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
    
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Targeting the anchor link directly for attaching the event listener
    var cartIconLink = document.querySelector('.cart-icon-link');
    var cartDropdown = document.getElementById('cart-dropdown');
    
    if (cartIconLink && cartDropdown) { // Check if both elements exist
        cartIconLink.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent default link action to ensure the page doesn't navigate away
            cartDropdown.classList.toggle('hidden'); // Toggle visibility of the cart dropdown
        });
    }
});
</script>
    <?php wp_body_open(); ?>
</body>

</html>

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
