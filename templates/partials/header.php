<header class="navbar top">

    <div class="navbar-header container">

      <?php $logo = get_field( 'global_logo', 'option' ); ?>

      <?php if ( $logo ) : ?>

        <a class="flex" href="<?php echo esc_url(home_url('/')); ?>">
          <img class="logo logo--header" src="<?php echo $logo['url']; ?>" alt="<?php bloginfo('name'); ?>">
        </a>

      <?php else : ?>

        <a class="logo__brand flex" href="<?php echo esc_url(home_url('/')); ?>">
          <?php echo ll_get_logo();?>
        </a>

      <?php endif; ?>

      <?php if (has_nav_menu('primary_navigation')) : ?>
        <nav class="primary-nav flex" id="primary-nav">
          <?php
          if ( has_nav_menu('primary_navigation') ) {
            wp_nav_menu( array(
              'theme_location'  => 'primary_navigation',
              'menu_class'      => 'nav navbar-nav'
            ) );
          }
          ?>
        </nav><!-- .primary-nav -->

        <button type="button" class="navbar-toggle" data-nav="collapse" data-target="#primary-nav">

          <span class="sr-only">Toggle navigation</span>
          <span class="navbar-toggle__box">
            <span class="navbar-toggle__inner"></span>
          </span><!-- .navbar-toggle__box -->

        </button><!-- .navbar-toggle -->
      <?php endif; ?>

    </div>

</header>