<?php
require_once get_theme_file_path('/inc/plugins.php');
require_once get_theme_file_path('/inc/markethub.php');
// Add customizer options if the file exists
$customizer_file = get_template_directory() . '/inc/customizer.php';
if ( file_exists( $customizer_file ) ) {
    require $customizer_file;
}
// Enqueue styles and scripts
function markethub_enqueue_styles_scripts() {
    // Enqueue main stylesheet
    wp_enqueue_style( 'markethub-style', get_stylesheet_uri() );

    // Enqueue jQuery from Google CDN
    wp_enqueue_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js', array(), '3.5.1', true );

    // Enqueue custom script
    wp_enqueue_script( 'markethub-script', get_template_directory_uri() . '/js/script.js', array('jquery'), '1.0', true );
    wp_enqueue_script('my-ajax-search', get_template_directory_uri() . '/js/ajax-search.js', array('jquery'), null, true);
    wp_localize_script('my-ajax-search', 'my_ajax_obj', array('ajax_url' => admin_url('admin-ajax.php')));
    // Enqueue FontAwesome if needed
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css');
    wp_enqueue_style('tailwindcss', 'https://cdn.jsdelivr.net/npm/tailwindcss@^2.0/dist/tailwind.min.css');
    // Other stylesheets
    wp_enqueue_style('yourtheme-style', get_stylesheet_uri());
    wp_enqueue_script('custom-main-js', get_template_directory_uri() . '/assets/main.js', array(), '1.0', true);
}
add_action( 'wp_enqueue_scripts', 'markethub_enqueue_styles_scripts' );

// Register navigation menus
function markethub_register_menus() {
    register_nav_menus(
        array(
            'primary-menu' => esc_html__( 'Primary Menu', 'markethub' ),
            'footer-menu' => esc_html__( 'Footer Menu', 'markethub' )
        )
    );
}
add_action( 'after_setup_theme', 'markethub_register_menus' );

// Add theme support
function markethub_theme_support() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
    add_theme_support( 'custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-width'  => true,
        'flex-height' => true,
    ) );
    add_theme_support( 'customize-selective-refresh-widgets' );
}
add_action( 'after_setup_theme', 'markethub_theme_support' );

// Register widget areas
function markethub_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'markethub' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Add widgets here.', 'markethub' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'markethub_widgets_init' );

// Add excerpt support for pages
add_post_type_support( 'page', 'excerpt' );

// Add custom image sizes
add_image_size( 'markethub-thumb', 120, 120, true );

// Customize excerpt length
function markethub_custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'markethub_custom_excerpt_length', 999 );

// Step 1: Register Custom Post Type
function custom_register_testimonial_post_type() {
    $args = array(
        'labels' => array(
            'name' => 'Testimonials',
            'singular_name' => 'Testimonial',
        ),
        'public' => true,
        'has_archive' => false,
        'menu_icon' => 'dashicons-testimonial', // Choose appropriate icon
        'supports' => array('title', 'editor', 'thumbnail'),
    );
    register_post_type('testimonial', $args);
}
add_action('init', 'custom_register_testimonial_post_type');


class Walker_Nav_Menu_Extended extends Walker_Nav_Menu {
    function start_lvl(&$output, $depth = 0, $args = null) {
        if (isset($args->item_spacing) && 'discard' === $args->item_spacing) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }
        $indent = str_repeat($t, $depth);
        $classes = array('sub-menu');

        // Add class for depth
        $classes[] = 'depth-' . $depth;

        // Add mega menu class if this is the first level of a primary menu
        if ($depth === 0 && isset($args->theme_location) && $args->theme_location === 'primary-menu') {
            $classes[] = 'mega-menu';
        }

        $class_names = join(' ', apply_filters('nav_menu_submenu_css_class', $classes, $args, $depth));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        $output .= "{$n}{$indent}<ul$class_names>{$n}";
    }
}
function markethub_woocommerce_support() {
    add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'markethub_woocommerce_support');
function add_login_logout_link($items, $args) {
    if ($args->theme_location === 'primary-menu') {
        if (is_user_logged_in()) {
            $items .= '<li class="menu-item"><a href="' . esc_url(wp_logout_url()) . '">Logout</a></li>';
        } else {
            $items .= '<li class="menu-item"><a href="' . esc_url(wp_login_url()) . '">Login</a></li>';
        }
    }
    return $items;
}
add_filter('wp_nav_menu_items', 'add_login_logout_link', 10, 2);
function enqueue_cart_fragments() {
    if (function_exists('is_woocommerce')) {
        wp_enqueue_script('wc-cart-fragments');
    }
}
add_action('wp_enqueue_scripts', 'enqueue_cart_fragments');


function create_store_post_type() {
    register_post_type('stores',
        array(
            'labels' => array(
                'name' => __('Stores'),
                'singular_name' => __('Store')
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array('title', 'thumbnail'),  // Ensure thumbnails are supported
            'menu_icon' => 'dashicons-store',          // Icon for the custom post type
        )
    );
}
add_action('init', 'create_store_post_type');
function your_theme_widgets_init() {
    register_sidebar(array(
        'name'          => __('Homepage Banner', 'markethub'),
        'id'            => 'homepage-banner',
        'description'   => __('Add widgets here to appear in your banner section on the homepage.', 'markethub'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', 'your_theme_widgets_init');
    function ajax_search() {
    $query = sanitize_text_field($_POST['query']);
    $search_query = new WP_Query([
        'posts_per_page' => 10,
        's' => $query,
        'post_type' => 'any'
    ]);

    if ($search_query->have_posts()) {
        while ($search_query->have_posts()) {
            $search_query->the_post();
            echo '<div><a href="' . get_permalink() . '">' . get_the_title() . '</a></div>';
        }
    } else {
        echo '<div>No results found for "' . esc_html($query) . '"</div>';
    }
    die();
}

add_action('wp_ajax_perform_search', 'ajax_search');
add_action('wp_ajax_nopriv_perform_search', 'ajax_search');
function my_custom_account_scripts() {
    if ( is_page_template('my-account.php') ) {
        wp_enqueue_style('custom-account-style', get_template_directory_uri() . '/css/custom-account.css');
        wp_enqueue_script('custom-account-script', get_template_directory_uri() . '/js/custom-account.js', array('jquery'), false, true);
        wp_enqueue_script('custom-account-js', get_stylesheet_directory_uri() . '/js/custom-account.js', array('jquery'), '1.0', true);
        
    }
}

add_action('wp_enqueue_scripts', 'my_custom_account_scripts');
function add_custom_checkout_endpoint() {
    add_rewrite_endpoint('custom-checkout', EP_ROOT | EP_PAGES);
}
add_action('init', 'add_custom_checkout_endpoint');

function custom_checkout_template($template) {
    global $wp_query;
    
    if (isset($wp_query->query_vars['custom-checkout'])) {
        $template = get_theme_file_path('/woocommerce_checkout.php');
    }
    return $template;
}
add_filter('page_template', 'custom_checkout_template');
