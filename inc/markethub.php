<?php
if ( ! class_exists( 'Redux' ) ) {
    return;
}

$opt_name = 'mh_demo';

$theme = wp_get_theme(); // For use with some settings. Not necessary.

$args = array(
    'display_name'    => $theme->get( 'Name' ),
    'display_version' => $theme->get( 'Version' ),
    'menu_title'      => esc_html__( 'MarketHub', 'markethub' ),
    'customizer'      => true,
);

Redux::set_args( $opt_name, $args );

Redux::set_section( 
    $opt_name, 
    array(
        'title'  => esc_html__( 'Slider Settings', 'markethub' ),
        'id'     => 'slider_settings',
        'desc'   => esc_html__( 'Settings for the homepage slider.', 'markethub' ),
        'icon'   => 'el el-picture',
        'fields' => array(
            array(
                'id'       => 'mh_slider_image_1',
                'type'     => 'media',
                'title'    => esc_html__( 'Slider Image 1', 'markethub' ),
                'desc'     => esc_html__( 'Upload or select an image for slide 1.', 'markethub' ),
            ),
            array(
                'id'       => 'mh_slider_image_2',
                'type'     => 'media',
                'title'    => esc_html__( 'Slider Image 2', 'markethub' ),
                'desc'     => esc_html__( 'Upload or select an image for slide 2.', 'markethub' ),
            ),
            array(
                'id'       => 'mh_slider_image_3',
                'type'     => 'media',
                'title'    => esc_html__( 'Slider Image 3', 'markethub' ),
                'desc'     => esc_html__( 'Upload or select an image for slide 3.', 'markethub' ),
            ),
            array(
                'id'       => 'mh_slider_image_4',
                'type'     => 'media',
                'title'    => esc_html__( 'Slider Image 4', 'markethub' ),
                'desc'     => esc_html__( 'Upload or select an image for slide 4.', 'markethub' ),
            ),
            array(
                'id'       => 'mh_slider_image_5',
                'type'     => 'media',
                'title'    => esc_html__( 'Slider Image 5', 'markethub' ),
                'desc'     => esc_html__( 'Upload or select an image for slide 5.', 'markethub' ),
            ),
        ),
    ) 
);
?>
