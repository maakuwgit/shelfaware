<?php
  $superheader = get_field('superheader');
?>
<header class="hdg">

  <div class="container">

  <?php if( $superheader ) : ?>
    <h1 class="hdg__supertitle col col-md-8of12 col-lg-8of12 col-xl-8of12 col-xxl-8of12 end"><?php echo $superheader; ?></h1><!-- .hdg__supertitle.col -->
  <?php endif; ?>

    <h2 class="hdg__title col col-md-8of12 col-lg-8of12 col-xl-8of12 col-xxl-8of12 end"><?php the_title(); ?></h2><!-- .hdg__title.col -->

  <?php if( get_the_content() !== '' ) : ?>
    <div class="hdg__content col col-md-8of12 col-lg-6of12 col-xl-6of12 col-xxl-6of12">
      <?php the_content(); ?>
    </div><!-- .hdg__content -->
  <?php endif; ?>

  </div><!-- .container -->

</header><!-- .hdg -->