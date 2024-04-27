<section class="bg-white dark:bg-gray-900">
  <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
    <div class="mx-auto max-w-screen-sm text-center lg:mb-16 mb-8">
      <h2 class="mb-4 text-3xl lg:text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Our Blog</h2>
      <p class="font-light text-gray-500 sm:text-xl dark:text-gray-400">We use an agile approach to test assumptions and connect with the needs of your audience early and often.</p>
    </div> 
    <div class="grid gap-8 lg:grid-cols-2">

    <?php
    // WordPress Loop to fetch and display posts
    $args = array(
        'post_type' => 'post', // Change post type if needed
        'posts_per_page' => 2, // Limit the number of posts displayed
    );
    $query = new WP_Query($args);

    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();
    ?>
        <article class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
            <div class="flex justify-between items-center mb-5 text-gray-500">
                <span class="bg-primary-100 text-primary-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                    <svg class="mr-1 w-3 h-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z"></path></svg>
                    <?php echo get_the_category_list(', '); ?>
                </span>
                <span class="text-sm"><?php echo get_the_date(); ?></span>
            </div>
            <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <p class="mb-5 font-light text-gray-500 dark:text-gray-400"><?php echo wp_trim_words(get_the_content(), 20); ?></p>
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-4">
                    <?php echo get_avatar(get_the_author_meta('ID'), 48); ?>
                    <span class="font-medium dark:text-white"><?php the_author(); ?></span>
                </div>
                <a href="<?php the_permalink(); ?>" class="inline-flex items-center font-medium text-primary-600 dark:text-primary-500 hover:underline">
                    Read more
                    <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </a>
            </div>
        </article>
    <?php
        endwhile;
        wp_reset_postdata(); // Reset the post data query
    else :
    ?>
        <p><?php esc_html_e('Sorry, no posts matched your criteria.'); ?></p>
    <?php endif; ?>

    </div>  
  </div>
</section>
