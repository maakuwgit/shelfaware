<?php
/**
* prefooter
* -----------------------------------------------------------------------------
*
* prefooter component
*/

$defaults = [
  'title'     => false,
  'content'   => false
];

$component_data = ll_parse_args( $component_data, $defaults );
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
$id = ( $component_args['id'] ? $component_args['id'] : uniqid('prefooter-') );

/**
 * ACF values pulled into the component from the components.php partial.
 */
$title          = $component_data['title'];
$content        = $component_data['content'];

if ( !$title && !$content ) return;
?>

<?php if ( ll_empty( $component_data ) ) return; ?>
<aside class="ll-prefooter <?php echo implode( " ", $classes ); ?>"<?php echo ' id="'.$id.'"'; ?> data-component="prefooter">

  <div class="container row">

  <?php if( $title ) : ?>
    <h2 class="prefooter__title text-center col col-md-7of12 col-lg-8of12 col-xl-10of12"><?php echo $title; ?></h2>
    <!-- .prefooter__section -->
  <?php endif; ?>

  <?php if( $content ) : ?>

    <div class="prefooter__content text-center col col-md-7of12 col-lg-8of12 col-xl-10of12">
      <?php echo format_text($content); ?>
    </div><!-- .prefooter__content -->

  <?php endif; ?>

  </div><!-- .container -->

</aside>