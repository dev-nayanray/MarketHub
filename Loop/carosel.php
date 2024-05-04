<?php
// Retrieve slider settings
$slider_settings = get_option('mh_demo');

// Check if slider settings are found
if (!empty($slider_settings['slider_images'])) {
    ?>
    <div id="indicators-carousel" class="relative w-full" data-carousel="static">
        <!-- Carousel wrapper -->
        <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <?php
                    // Loop through each slider image setting
                    foreach ($slider_settings['slider_images'] as $key => $setting) {
                        // Check if the setting is not empty
                        if (isset($setting['url']) && !empty($setting['url'])) {
                            ?>
                            <div class="swiper-slide">
                                <img src="<?php echo esc_attr($setting['url']); ?>" class="block w-full h-full object-cover rounded-lg" alt="Slider Image <?php echo $key + 1; ?>">
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
                <!-- Add Pagination -->
                <div class="swiper-pagination"></div>
            </div>
            <!-- Slider controls -->

        <div class="hidden md:flex space-x-4">
       <div class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 md:px-0">
    <button type="button" class="flex items-center justify-center w-12 h-12 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none" data-carousel-prev>
        <svg class="w-6 h-6 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
        </svg>
        <span class="sr-only">Previous</span>
    </button>
</div>

        <div class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 md:px-0">
    <button type="button" class="flex items-center justify-center w-12 h-12 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none" data-carousel-next>
        <svg class="w-6 h-6 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
        </svg>
        <span class="sr-only">Next</span>
    </button>
</div>
    </div>
</div>

        </div>
    </div>
    <!-- Add the Swiper JavaScript file -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        // JavaScript for carousel functionality
        document.addEventListener("DOMContentLoaded", function () {
            const swiper = new Swiper('.swiper-container', {
                loop: true,
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '[data-carousel-next]',
                    prevEl: '[data-carousel-prev]',
                },
            });
        });
    </script>
<?php
} else {
    // Output a message if no slider settings are found
    echo 'No slider settings found.';
}
?>
