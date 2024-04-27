<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?></title>
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <?php wp_head(); ?>
</head>

<body <?php body_class( 'bg-gray-100' ); ?>>
    <!-- Navigation Bar -->
    <nav class="bg-white border-gray-200 dark:bg-gray-900">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="flex items-center space-x-3 rtl:space-x-reverse">
                <!-- Logo -->
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/logo.svg" class="h-8" alt="<?php bloginfo( 'name' ); ?> Logo" />
                <!-- Title -->
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white"><?php bloginfo( 'name' ); ?></span>
            </a>
            <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                <button type="button" class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                    <span class="sr-only">Open user menu</span>
                    <img class="w-8 h-8 rounded-full" src="/docs/images/people/profile-picture-3.jpg" alt="user photo">
                </button>
                <!-- Dropdown menu -->
                <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600" id="user-dropdown">
                    <div class="px-4 py-3">
                        <span class="block text-sm text-gray-900 dark:text-white">Bonnie Green</span>
                        <span class="block text-sm text-gray-500 truncate dark:text-gray-400">name@flowbite.com</span>
                    </div>
                    <ul class="py-2" aria-labelledby="user-menu-button">
                        <li>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Dashboard</a>
                        </li>
                        <li>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Settings</a>
                        </li>
                        <li>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Earnings</a>
                        </li>
                        <li>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign out</a>
                        </li>
                    </ul>
                </div>
                <button data-collapse-toggle="navbar-user" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-user" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                    </svg>
                </button>
            </div>
            <?php
                // Output WordPress navigation menu with a limit of 6 items
                wp_nav_menu( array(
                    'theme_location' => 'primary',
                    'container_class' => 'items-center justify-between hidden w-full md:flex md:w-auto md:order-1',
                    'menu_class' => 'flex flex-row font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700',
                    'link_before' => '<span class="block py-2 px-3">',
                    'link_after' => '</span>',
                    'depth' => 1,
                    'items_wrap' => '%3$s', // Removing any additional wrappers
                    'fallback_cb' => false, // Do not fall back to a default menu
                    'walker' => new Walker_Nav_Menu_Limit_Items(6), // Custom walker to limit menu items
                ) );

            ?>
            <?php class Walker_Nav_Menu_Limit_Items extends Walker_Nav_Menu {
    private $counter = 0;
    private $limit;

    public function __construct($limit) {
        $this->limit = $limit;
    }

    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        if ($this->counter >= $this->limit) {
            return;
        }

        parent::start_el($output, $item, $depth, $args, $id);
        $this->counter++;
    }
}
 ?>
        </div>
    </nav>
    <?php wp_body_open(); ?>
</body>

</html>
