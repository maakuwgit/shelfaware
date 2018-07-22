<?php
/**
* testimonials
* -----------------------------------------------------------------------------
*
* testimonials component
*/

$defaults = [
  'supertitle'       => false,
  'heading'          => false,
  'content'          => false,
  'num_testimonials' => 1
];

$args = [
  'id'      => uniqid('testimonials-'),
  'classes' => false,
];

$component_data = ll_parse_args( $component_data, $defaults );
$component_args = ll_parse_args( $component_args, $args );
?>

<?php
/**
 * Any additional classes to apply to the main component container.
 *
 * @var array
 * @see args['classes']
 */
$classes        = $component_args['classes'] ?: array();

/**
 * ID to apply to the main component container.
 *
 * @var array
 * @see args['id']
 */
$component_id   = $component_args['id'];

/**
 * ACF values pulled into the component from the components.php partial.
 */
$showposts      = $component_data['num_testimonials'];
$supertitle     = $component_data['supertitle'];
$heading        = $component_data['heading'];
$content        = $component_data['content'];

$args = array(
          'post_type'     => 'testimonial',
          'post_status'   => 'publish',
          'order'         => 'ASC',
          'showposts'     => $showposts
        );

$testimonials     = new WP_Query( $args );
$num_testimonials = wp_count_posts('testimonial');
$num_testimonials = $num_testimonials->publish;

?>

<?php if ( $testimonials->have_posts() ) : ?>
<section class="ll-testimonials<?php echo implode( " ", $classes ); ?>" <?php echo ( $component_id ? 'id="'.$component_id.'"' : '' ) ?> data-component="testimonials">

  <div class="container row centered">

      <header class="testimonials__heading col col-md-10of12 col-lg-8of12 col-xl-8of12 col-xxl-8of12 text-center">

      <?php if( $supertitle ) : ?>
        <<?php echo $supertitle['tag']; ?> class="testimonials__supertitle"><?php echo $supertitle['text']; ?></<?php echo $supertitle['tag']; ?>><!-- .testimonials__supertitle -->
      <?php endif; ?>

      <?php if( $heading ) : ?>
        <<?php echo $heading['tag']; ?> class="testimonials__title"><?php echo $heading['text']; ?></<?php echo $heading['tag']; ?>><!-- .testimonials__title -->
      <?php endif; ?>

      <?php echo format_text($content); ?>

      </header><!-- .testimonials__heading -->

      <div class="testimonials__list col col-md-10of12 col-lg-8of12 col-xl-8of12 col-xxl-8of12">

        <?php
        $first_css = ' active';
        while( $testimonials->have_posts() ) :

          $testimonials->the_post();
          $image = get_the_post_thumbnail();
          $description = get_field('author_info');
        ?>

        <div class="testimonials__testimonial flex<?php echo $first_css; ?>">

          <div id="testimonials__author-<?php the_ID(); ?>" class="testimonials__description">
            <blockquote><?php the_excerpt(); ?></blockquote>
          </div><!-- .testimonials__description -->

          <div class="testimonials__author row centered<?php echo $first_css; ?>" data-testimonial="testimonials__author-<?php the_ID(); ?>">

          <?php if( $image ) : ?>
            <figure class="testimonials__thumbnail thumbnail" data-backgrounder>

              <div class="testimonials__feature feature">

              <?php echo $image; ?>

              </div><!-- .testimonials__feature.feature -->

            </figure><!-- .testimonials__thumbnail -->
          <?php endif; ?>

            <p class="testimonials__author">
              <span class="testimonials__author_name">
                <?php the_title(); ?>
              </span><!-- .testimonials__author_name -->

            <?php if( $description ) : ?>
              <span class="testimonials__author_description">
                <?php echo $description; ?>
              </span><!-- .testimonials__author_description -->
            <?php endif; ?>
            </p>

            <?php $first_css = ''; ?>
        </div><!-- .testimonials__testimonial -->
          <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
        </div><!-- .testimonials__testimonials -->

      </div><!-- .testimonials__list -->

  </div><!-- .container.row.centered -->

</section>
<?php endif; ?>