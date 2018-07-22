<?php
/**
* post-grid
* -----------------------------------------------------------------------------
*
* post-grid component
*/

$defaults = [
  'superheading' => false,
  'heading'      => false,
  'content'      => false,
  'posts'        => false
];

$args = [
  'id'      => uniqid('post-grid-'),
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
$id = $component_args['id'];

/**
 * ACF values pulled into the component from the components.php partial.
 */
$heading    = $component_data['heading'];
$supertitle = $component_data['superheading'];
$content    = $component_data['content'];
$entries    = $component_data['posts'];
?>

<?php if ( is_array( $entries ) ) : ?>
<section class="ll-post-grid<?php echo implode( " ", $classes ); ?>"<?php echo ' id="'.$id.'"'; ?> data-component="post-grid">

  <div class="container row centered">

    <header class="post-grid__heading col col-md-10of12 col-lg-9of12 col-xl-8of12 col-xxl-8of12 text-center">

    <?php if( $supertitle ) : ?>
      <<?php echo $supertitle['tag']; ?> class="post-grid__supertitle"><?php echo $supertitle['text']; ?></<?php echo $supertitle['tag']; ?>><!-- .post-grid__supertitle -->
    <?php endif; ?>

    <?php if( $heading ) : ?>
      <<?php echo $heading['tag']; ?> class="post-grid__title"><?php echo $heading['text']; ?></<?php echo $heading['tag']; ?>><!-- .post-grid__title -->
    <?php endif; ?>

    <?php if( $content ) : ?>
      <div class="post-grid__content">
        <?php echo format_text($content); ?>
      </div>
      <!-- .post-grid__content -->
    <?php endif; ?>

    </header><!-- .testimonials__heading -->

  </div>

  <div class="container">

    <div class="post-grid__posts row centered start">

  <?php
  foreach( $entries as $entry ) :
    $image = get_the_post_thumbnail($entry);
  ?>

      <div class="post-grid__post_wrapper col col-sm-6of12 col-md-3of12 col-lg-4of12 col-xl-4of12">

        <div class="post-grid__post" data-clickthrough>

        <?php if( $image ) : ?>
          <figure class="post-grid__post__feature__wrapper" data-backgrounder>

            <div class="post-grid__post__feature feature">

            <?php echo $image; ?>

            </div><!-- .post-grid__post__feature.feature -->

          </figure>
        <?php endif; ?>

          <h4 class="post-grid__post__title">
            <a href="<?php echo get_the_permalink($entry); ?>"><?php echo get_the_title($entry); ?></a>
          </h4>
          <!-- .post-grid__post__title -->

          <div class="post-grid__post__body">
            <?php echo get_the_excerpt($entry); ?>
          </div>
          <!-- .post-grid__post__body -->

        </div>

      </div><!-- .post-grid__post -->

  <?php endforeach; ?>
    </div><!-- .post-grid__posts -->

  </div><!-- .container.row.centered.between -->
</section>
<?php endif; ?>
