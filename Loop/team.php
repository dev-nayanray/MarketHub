<section class="bg-white dark:bg-gray-900">
  <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
      <div class="mx-auto max-w-screen-sm text-center mb-8 lg:mb-16">
          <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Our Team</h2>
          <p class="font-light text-gray-500 lg:mb-16 sm:text-xl dark:text-gray-400">Explore the whole collection of open-source web components and elements built with the utility classes from Tailwind</p>
      </div> 
      <div class="grid gap-8 mb-6 lg:mb-16 md:grid-cols-2">
          <?php
          $args = array(
              'role'    => 'shop_manager',
              'orderby' => 'user_nicename',
              'order'   => 'ASC'
          );
          $shop_managers = get_users($args);
          foreach ($shop_managers as $user) {
              $avatar_url = get_avatar_url($user->ID);
              $user_info = get_userdata($user->ID);
              $user_description = get_user_meta($user->ID, 'description', true); // Assuming you store user descriptions in user meta
          ?>
          <div class="items-center bg-gray-50 rounded-lg shadow sm:flex dark:bg-gray-800 dark:border-gray-700">
              <a href="#">
                  <img class="w-full rounded-lg sm:rounded-none sm:rounded-l-lg" src="<?php echo esc_url($avatar_url); ?>" alt="<?php echo esc_attr($user_info->display_name); ?>">
              </a>
              <div class="p-5">
                  <h3 class="text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                      <a href="#"><?php echo esc_html($user_info->display_name); ?></a>
                  </h3>
                  <span class="text-gray-500 dark:text-gray-400"><?php echo esc_html($user_info->roles[0]); ?></span>
                  <p class="mt-3 mb-4 font-light text-gray-500 dark:text-gray-400"><?php echo esc_html($user_description); ?></p>
                  <!-- Social Icons Placeholder if needed -->
              </div>
          </div>
          <?php
          }
          ?>
      </div>  
  </div>
</section>