<?php
/**
* image-w-caption
* -----------------------------------------------------------------------------
*
* image-w-caption component
*/

$defaults = [
  'image'   => false,
  'caption' => false
];

$args = [
  'id'      => uniqid('image-w-caption-'),
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
$image              = $component_data['image'];
$caption            = $component_data['caption'];

if( $image ) {
  $bg = ' data-backgrounder';
}else{
  $bg = '';
}
?>

<?php if ( ll_empty( $component_data ) ) return; ?>
<section class="ll-image-w-caption <?php echo implode( " ", $classes ); ?>"<?php echo ' id="'.$id.'"'; ?> data-component="image-w-caption">

  <?php if( $image ) : ?>

  <figure class="image-w-caption__wrap container"<?php echo $bg; ?>>

    <div class="image-w-caption__feature feature">

    <?php echo ll_format_image($image); ?>

    </div><!-- .image-w-caption__feature.feature -->

  </figure><!-- .container -->
  <?php endif; ?>

  <?php if ( $caption ) : ?>

  <div class="image-w-caption__caption_wrap container">

    <div class="image-w-caption__caption col col-md-10of12 col-offset-md-1of12 col-offset-lg-2of12 col-lg-8of12 col-offset-xl-2of12 col-xl-8of12">
      <?php echo $caption; ?>
    </div>
    <!-- .image-w-caption__caption -->

  </div>
  <?php endif; ?>

</section>
