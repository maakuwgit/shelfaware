<?php
  $video       = get_field('video_url');
  $superheader = get_field('superheader');

?>
<header class="post__hdg hdg" <?php if( has_post_thumbnail() ) echo 'data-backgrounder';?>>

  <?php if( $video ) : ?>
  <?php
    ll_include_component(
        'loop-video',
        array(
          'video' => $video
        )
    );
    ?>
  <?php elseif( has_post_thumbnail() ) : ?>
  <div class="hdg__feature feature">
    <?php the_post_thumbnail('full'); ?>
  </div><!-- .hdg__feature feature -->
  <?php endif; ?>

  <div class="container">

  <?php if( $superheader ) : ?>
    <h1 class="hdg__supertitle col col-md-8of12 col-lg-8of12 col-xl-8of12 col-xxl-8of12 end"><?php echo $superheader; ?></h1><!-- .hdg__supertitle.col -->
  <?php endif; ?>

    <h2 class="hdg__title col col-md-8of12 col-lg-8of12 col-xl-8of12 col-xxl-8of12 end"><?php the_title(); ?></h2><!-- .hdg__title.col -->

  <?php if( has_excerpt() !== '' ) : ?>
    <div class="hdg__content col col-md-8of12 col-lg-6of12 col-xl-6of12 col-xxl-6of12">
      <?php the_excerpt(); ?>
    </div><!-- .hdg__content -->
  <?php endif; ?>

  </div><!-- .container -->

</header><!-- .hdg -->