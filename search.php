<?php get_header(); ?>

<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-4">Search Results for: "<?php echo get_search_query(); ?>"</h1>
    <?php if ( have_posts() ) : ?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <?php while ( have_posts() ) : the_post(); ?>
                <div class="bg-white rounded-lg shadow p-4">
                    <h2 class="text-xl font-semibold mb-2">
                        <a href="<?php the_permalink(); ?>" class="hover:text-blue-700" rel="bookmark"><?php the_title(); ?></a>
                    </h2>
                    <div class="text-gray-600 text-sm mb-4"><?php the_excerpt(); ?></div>
                    <a href="<?php the_permalink(); ?>" class="text-blue-500 hover:text-blue-600 transition duration-300 ease-in-out">Read more &raquo;</a>
                </div>
            <?php endwhile; ?>
        </div>
        <div class="pagination mt-8">
            <?php
                the_posts_pagination(array(
                    'mid_size'  => 2,
                    'prev_text' => __('Back', 'markethub'),
                    'next_text' => __('Next', 'markethub'),
                    'screen_reader_text' => __('Posts navigation', 'markethub')
                ));
            ?>
        </div>
    <?php else : ?>
    <div class="text-center p-6 mt-6 border-t border-gray-200 dark:border-gray-700">
        <h2 class="text-xl text-gray-800 dark:text-white font-light">No results found.</h2>
        <p class="text-gray-600 dark:text-gray-400">We couldn't find any results for your search. Try again with different keywords?</p>
    </div>
    <?php
        // Redirect to 404.php after 10 seconds
        header("refresh:3;url=404.php");
        exit; // Ensure no further output is sent
    ?>
<?php endif; ?>

</div>

<?php get_footer(); ?>
