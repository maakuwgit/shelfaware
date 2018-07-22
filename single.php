<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/partials/header', 'single'); ?>
  <?php get_template_part('templates/contents/content', 'single'); ?>
<?php endwhile; ?>
