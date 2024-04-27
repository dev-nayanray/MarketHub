<?php
// Check if Redux class exists
if ( ! class_exists( 'Redux' ) ) {
    return;
}

// Replace 'mh_demo' with your actual option name
$opt_name = 'mh_demo';

// Get slider settings using Redux::get_option
$slider_settings = Redux::get_option( $opt_name, 'slider_settings', array() );

// Check if $slider_settings is an array
if ( ! is_array( $slider_settings ) ) {
    // If it's not an array, set it to an empty array to prevent warnings
    $slider_settings = array();
}
?>

<div id="indicators-carousel" class="relative w-full" data-carousel="static">
    <!-- Carousel wrapper -->
    <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
        <?php foreach ( $slider_settings as $key => $setting ) : ?>
            <?php // Check if $setting is an array
                if ( is_array( $setting ) ) :
                    $slider_image = isset( $setting['url'] ) ? $setting['url'] : '';
                    if ( ! empty( $slider_image ) ) : ?>
                        <div class="hidden duration-700 ease-in-out <?php echo $key === 0 ? 'opacity-100' : 'opacity-0'; ?>" data-carousel-item="<?php echo $key === 0 ? 'active' : ''; ?>">
                            <img src="<?php echo esc_url( $slider_image ); ?>" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="Slider Image <?php echo $key + 1; ?>">
                        </div>
                    <?php endif;
                endif;
            ?>
        <?php endforeach; ?>
    </div>
    <!-- Slider indicators -->
    <div class="absolute z-30 flex -translate-x-1/2 space-x-3 rtl:space-x-reverse bottom-5 left-1/2">
        <?php foreach ( $slider_settings as $key => $setting ) : ?>
            <?php // Check if $setting is an array
                if ( is_array( $setting ) ) : ?>
                    <button type="button" class="w-3 h-3 rounded-full <?php echo $key === 0 ? 'bg-blue-500' : 'bg-gray-300'; ?>" aria-current="<?php echo $key === 0 ? 'true' : 'false'; ?>" aria-label="Slide <?php echo $key + 1; ?>" data-carousel-slide-to="<?php echo $key; ?>"></button>
                <?php endif;
            ?>
        <?php endforeach; ?>
    </div>
    <!-- Slider controls -->
    <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev="">
        <!-- Previous button icon -->
    </button>
    <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next="">
        <!-- Next button icon -->
    </button>
</div>
