<?php
  /*
   * Blog Header
   * This header is a bit unique in that the title
   * will differ as the queried category changes.
   * It will also handle any assigned post page
   */
  $cat = get_queried_object();

  //Post Pages and Archive pages will have a slightly different syntax so...
  $title = $cat->post_title;//This is our standard Blog
  if( !$title ) {
    $title = $cat->label;//This is any custom post type or taxonomy
  }

  $superheader = get_field('superheader');
?>
<header class="hdg">

  <div class="container">

  <?php if( $superheader ) : ?>
    <h1 class="hdg__supertitle col col-md-8of12 col-lg-8of12 col-xl-8of12 col-xxl-8of12 end"><?php echo $superheader; ?></h1><!-- .hdg__supertitle.col.col-md-8of12.col-lg-8of12.col-xl-8of12.col-xxl-8of12.end -->
  <?php endif; ?>

    <h2 class="hdg__title col col-md-8of12 col-lg-8of12 col-xl-8of12 col-xxl-8of12 end"><?php echo $title; ?></h2><!-- .hdg__title.col.col-md-8of12.col-lg-8of12.col-xl-8of12.col-xxl-8of12.end -->

  <?php if( $cat->post_content !== '' ) : ?>
    <div class="hdg__content col col-md-8of12 col-lg-6of12 col-xl-6of12 col-xxl-6of12">
      <?php echo format_text($cat->post_content); ?>
    </div><!-- .hdg__content -->
  <?php endif; ?>

  </div><!-- .container -->

</header><!-- .hdg -->