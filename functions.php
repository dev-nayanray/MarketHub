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


