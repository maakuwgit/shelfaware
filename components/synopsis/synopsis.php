<?php
/**
* synopsis
* -----------------------------------------------------------------------------
*
* synopsis component
*/

$defaults = [
  'headline'     => false,
  'l_content'      => false,
  'r_content'      => false
];

$args = [
  'id'      => uniqid('card-grid-'),
  'classes' => false,
];

$component_data = ll_parse_args( $component_data, $defaults );
$component_args = ll_parse_args( $component_args, $args );

/**
 * Any additional classes to apply to the main component container.
 *
 * @var array
 * @see args['classes']
 */
$classes  = $component_args['classes'] ?: array();

/**
 * ID to apply to the main component container.
 *
 * @var array
 * @see args['id']
 */
$id            = ' id="' . $component_args['id'] . '"';

/**
 * ACF values pulled into the component from the components.php partial.
 */
$headline      = $component_data['headline'];
$l_content     = $component_data['l_content'];
$r_content     = $component_data['r_content'];
?>

<?php if ( ll_empty( $component_data ) ) return; ?>
<header class="ll-synopsis<?php echo implode( " ", $classes ); ?>"<?php echo $id; ?> data-component="synopsis">

  <div class="container">

    <div class="row synopsis__wrapper">

      <div class="synopsis__col col">

      <?php if( $headline ) : ?>
        <h2 class="synopsis__header"><?php echo $headline; ?></h2>
        <!-- .synopsis__header -->
      <?php endif; ?>

      </div>

      <div class="synopsis__description col col-md-6of12 col-lg-5of12 col-xl-5of12 col-xxl-5of12">

      <?php if( $l_content ) : ?>
        <?php echo $l_content; ?>
      <?php endif; ?>

      </div><!-- .synopsis__description.col -->

      <div class="synopsis__description col col-md-6of12 col-lg-7of12 col-xl-7of12 col-xxl-7of12">

      <?php if( $r_content ) : ?>
        <?php echo $r_content; ?>
      <?php endif; ?>

      </div><!-- .synopsis__description.col -->

    </div><!-- .row.synopsis__wrapper -->

  </div><!-- .container -->

</header>