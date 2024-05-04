<?php

$opt_name = 'mh_demo';

// Set up Redux framework arguments
$args = array(
    'display_name' => esc_html__( 'MarketHub', 'markethub' ),
    'menu_title'   => esc_html__( 'MarketHub', 'markethub' ),
    'customizer'   => true,
);

Redux::set_args( $opt_name, $args );

// Define theme options section
Redux::set_section( $opt_name, array(
    'title'      => __( 'MarketHub Options', 'markethub' ),
    'id'         => 'theme_options',
    'icon'       => 'el el-wrench', // Icon for the section (optional)
    'subsection' => false, // Not a subsection
    'fields'     => array(
        array(
            'id'      => 'site_title',
            'type'    => 'text',
            'title'   => __( 'Site Title', 'markethub' ),
            'default' => 'Your Site Title',
        ),
        array(
            'id'      => 'site_logo',
            'type'    => 'media',
            'title'   => __( 'Site Logo', 'markethub' ),
            'default' => array(
                'url' => 'URL_TO_DEFAULT_LOGO',
            ),
        ),
        array(
            'id'      => 'theme_color',
            'type'    => 'color',
            'title'   => __( 'Theme Color', 'markethub' ),
            'default' => '#ff0000', // Default color
        ),
    ),
));

Redux::set_section($opt_name, array(
    'title'      => __('Slider Settings', 'markethub'),
    'id'         => 'slider_settings',
    'icon'       => 'el el-wrench',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'       => 'slider_images',
            'type'     => 'slides',
            'title'    => __('Slider Images', 'markethub'),
            'subtitle' => __('Upload images for your slider', 'markethub'),
        ),
    ),
));