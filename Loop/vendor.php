<!-- Vendor Spotlight -->
<section class="container mx-auto my-8">
    <h2 class="text-2xl font-semibold mb-4">Vendor Spotlight</h2>
    <!-- Vendor Carousel -->
    <div class="grid grid-cols-4 gap-4">
        <?php
        // Array of vendors with their details
        $vendors = array(
            array(
                'image' => 'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-11.jpg',
                'name' => 'Apple Watch Series 7 GPS, Aluminium Case, Starlight Sport',
                'rating' => '5.0',
                'price' => '$599',
                'link' => '#',
            ),
            // Add more vendors here with their details
        );

        // Loop through vendors and generate vendor cards dynamically
        foreach ($vendors as $vendor) {
        ?>
            <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <a href="<?php echo $vendor['link']; ?>">
                    <img class="p-8 rounded-t-lg" src="<?php echo $vendor['image']; ?>" alt="product image" />
                </a>
                <div class="px-5 pb-5">
                    <a href="<?php echo $vendor['link']; ?>">
                        <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white"><?php echo $vendor['name']; ?></h5>
                    </a>
                    <div class="flex items-center mt-2.5 mb-5">
                        <div class="flex items-center space-x-1 rtl:space-x-reverse">
                            <?php
                            // Output star rating dynamically
                            for ($i = 0; $i < 5; $i++) {
                                if ($i < (float)$vendor['rating']) {
                                    echo '<svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                            <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                        </svg>';
                                } else {
                                    echo '<svg class="w-4 h-4 text-gray-200 dark:text-gray-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                            <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                        </svg>';
                                }
                            }
                            ?>
                            <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ms-3"><?php echo $vendor['rating']; ?></span>
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-3xl font-bold text-gray-900 dark:text-white"><?php echo $vendor['price']; ?></span>
                        <button class="px-4 py-2 bg-blue-500 text-white text-xs font-semibold rounded hover:bg-blue-600 focus:outline-none focus:bg-blue-600 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:bg-blue-700">Add to Cart</button>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</section>
