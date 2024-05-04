<?php
/* Template Name: Custom Login Page */

// Redirect logged in users to the home page
if ( is_user_logged_in() ) {
    wp_redirect( home_url() );
    exit;
}

// Login redirect handling: to redirect back to the originating page or a specified page after login
$redirect_to = isset($_REQUEST['redirect_to']) ? $_REQUEST['redirect_to'] : home_url();

get_header(); ?>

<section class="bg-gray-50 dark:bg-gray-900">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
        <a href="<?php echo home_url(); ?>" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
            Welcome <?php bloginfo('name'); ?>
            <!-- Optionally replace with your own logo -->
            <!-- <img class="w-8 h-8 mr-2" src="<?php echo esc_url($logo_image_url); ?>" alt="logo"> -->
        </a>
        <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                    Sign in to your account
                </h1>
                <form class="space-y-4 md:space-y-6" action="<?php echo wp_login_url(); ?>" method="post">
                    <div>
                        <label for="user_login" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                        <input type="text" name="log" id="user_login" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@company.com" required="">
                    </div>
                    <div>
                        <label for="user_pass" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                        <input type="password" name="pwd" id="user_pass" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                    </div>
                    
                    <div class="flex items-center justify-between">
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="rememberme" name="rememberme" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800" value="forever">
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="rememberme" class="text-gray-500 dark:text-gray-300">Remember me</label>
                            </div>

                        </div>
                        <a href="<?php echo wp_lostpassword_url(); ?>" class="text-sm font-medium text-primary-600 hover:underline dark:text-primary-500">Forgot password?</a>
                    </div>
                    <button type="submit" name="wp-submit" class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Sign in</button>
                    <input type="hidden" name="redirect_to" value="<?php echo esc_attr($redirect_to); ?>">
                    <div class="flex justify-between items-center">
                    <hr class="w-1/3 border-gray-300">
                    <span class="text-sm text-gray-500">Or sign in with</span>
                    <hr class="w-1/3 border-gray-300">
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 w-full sm:max-w-md xl:p-0">
                 <a href="#" class="flex items-center justify-center space-x-2 bg-gray-100 rounded-lg p-2.5 border border-gray-300 text-gray-900 hover:bg-gray-200 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:bg-gray-600">
                        <i class="fab fa-google text-xl"></i>
                        <span>Google</span>
                    </a>
                    <!-- Facebook Sign-in button -->
                    <a href="#" class="flex items-center justify-center space-x-2 bg-blue-600 rounded-lg p-2.5 text-white hover:bg-blue-700 dark:bg-blue-700 dark:hover:bg-blue-800">
                        <i class="fab fa-facebook text-xl"></i>
                        <span>Facebook</span>
                    </a>
                </div>  
            </div>
                    <center><h3 class="text-sm font-light text-gray-800 dark:text-gray-800 p-2">
                        Don’t have an account yet? <a href="<?php echo home_url('/registration'); ?>" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Sign up</a>
                    </h3></center>
                </form>
                
        </div>
    </div>
</section>

<?php get_footer(); ?>
