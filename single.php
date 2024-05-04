<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<main class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white dark:bg-gray-900 antialiased">
  <div class="flex justify-between px-4 mx-auto max-w-screen-xl">
      <article class="mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
          <header class="mb-4 lg:mb-6 not-format">
              <address class="flex items-center mb-6 not-italic">
                  <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                      <img class="mr-4 w-16 h-16 rounded-full" src="<?php echo get_avatar_url(get_the_author_meta('ID')); ?>" alt="<?php the_author(); ?>">
                      <div>
                          <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author" class="text-xl font-bold text-gray-900 dark:text-white"><?php the_author(); ?></a>
                          <p class="text-base text-gray-500 dark:text-gray-400"><?php the_author_meta('description'); ?></p>
                          <p class="text-base text-gray-500 dark:text-gray-400"><time pubdate datetime="<?php echo get_the_date('c'); ?>" title="<?php echo get_the_date('F jS, Y'); ?>"><?php echo get_the_date('M. j, Y'); ?></time></p>
                      </div>
                  </div>
              </address>
              <?php if ( has_post_thumbnail() ) : ?>
                  <div class="post-thumbnail">
                      <?php the_post_thumbnail('full', ['class' => 'img-responsive']); ?>
                  </div>
              <?php endif; ?>
              <h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white"><?php the_title(); ?></h1>
          </header>
          <?php the_content(); ?>
      </article>
  </div>
</main>
<!-- Place the PHP comment form within your existing HTML structure -->
<?php
// Prepare commenter variable and accessibility requirements
$commenter = wp_get_current_commenter();
$aria_req = ( get_option( 'require_name_email' ) ) ? " aria-required='true' required" : '';

// Get the number of comments for the current post
$comment_count = get_comments_number();

// Define the label for the submit button based on the comment count
$submit_label = ($comment_count === 0) ? 'Add the first comment' : 'Add a comment';

// Modify the comment form arguments

comment_form( array(
    'class_form' => 'mx-auto w-90 mb-4 py-2 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600 text-center', // Adjusted width and added 'mx-auto' to center-align
    'class_submit' => 'inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800',
    'title_reply_before' => '<h2 class="comments-title">',
    'title_reply_after' => '</h2>',
    'submit_button' => '<button type="button" class="button-svg focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900" id="add-comment">' . esc_html( $submit_label ) . '</button>',
    'comment_field' => '<div class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun' ) . '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" required="required" class="w-full px-0 text-sm text-gray-800 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400"></textarea></div>',
    'fields' => array(
        'author' => '<p class="comment-form-author"><input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>',
        'email'  => '<p class="comment-form-email"><input id="email" name="email" type="text" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p>',
    ),
));
?>



<!-- Existing HTML structure with other elements -->

<!-- Existing JavaScript code -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const buttons = document.querySelectorAll('.comment-form .button-svg');
    buttons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            // Define the actions for each button here
            console.log('Button clicked:', this.id);
            // For instance, open a file picker when the attach file button is clicked
            if (this.id === 'attach-file') {
                document.getElementById('file-input').click();
            }
        });
    });
});
</script>




<?php endwhile; endif; ?>
<?php get_footer(); ?>
