<section class="bg-white dark:bg-gray-900">
  <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 lg:px-6">
      <div class="mx-auto max-w-screen-sm">
          <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Testimonials</h2>
          <p class="mb-8 font-light text-gray-500 lg:mb-16 sm:text-xl dark:text-gray-400">Explore the whole collection of open-source web components and elements built with the utility classes from Tailwind</p>
      </div> 
      <div class="grid mb-8 lg:mb-12 lg:grid-cols-2">

        <?php
        $args = array(
            'post_type' => 'testimonial',
            'posts_per_page' => -1,
        );
        $testimonial_query = new WP_Query($args);

        if ($testimonial_query->have_posts()) :
            while ($testimonial_query->have_posts()) : $testimonial_query->the_post();
        ?>
            <figure class="flex flex-col justify-center items-center p-8 text-center bg-gray-50 border-b border-gray-200 md:p-12 lg:border-r dark:bg-gray-800 dark:border-gray-700">
                <blockquote class="mx-auto mb-8 max-w-2xl text-gray-500 dark:text-gray-400">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white"><?php the_title(); ?></h3>
                    <p class="my-4"><?php the_content(); ?></p>
                </blockquote>
                <figcaption class="flex justify-center items-center space-x-3">
                    <?php if (has_post_thumbnail()) : ?>
                        <img class="w-9 h-9 rounded-full" src="<?php the_post_thumbnail_url('thumbnail'); ?>" alt="profile picture">
                    <?php endif; ?>
                    <div class="space-y-0.5 font-medium dark:text-white text-left">
                        <div><?php the_author(); ?></div>
                        <div class="text-sm font-light text-gray-500 dark:text-gray-400"><?php the_author_meta('description'); ?></div>
                    </div>
                </figcaption>    
            </figure>
        <?php
            endwhile;
            wp_reset_postdata(); // Reset the post data query
        endif;
        ?>

      </div>
      <div class="text-center">
          <a href="#" class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Show more...</a> 
      </div>
</section>