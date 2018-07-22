<?php
/**
* three-col-block, also known as a Shadowbox
* -----------------------------------------------------------------------------
*
* three-col-block component
*/

$defaults = [
  'columns'     => false
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
$id = ( $component_args['id'] ? $component_args['id'] : uniqid('three-col-block-') );

/**
 * ACF values pulled into the component from the components.php partial.
 */
$columns      = $component_data['columns'];
?>

<?php if ( ll_empty( $component_data ) ) return; ?>
<section class="ll-three-col-block<?php echo implode( " ", $classes ); ?>" <?php echo ( $component_id ? 'id="'.$component_id.'"' : '' ) ?> data-component="three-col-block">

  <div class="container">

    <div class="three-col-block__blocks row start">

    <?php if( $columns ) : ?>
      <?php
        foreach( $columns as $column ) :
          $icon      = $column['icon'];
          $title     = $column['title'];
          $caption   = $column['caption'];
      ?>

      <div class="three-col-block__block col col-sm-6of12 col-md-4of12 col-lg-4of12 col-xl-4of12">
        <?php if( $icon ) : ?>
          <div class="three-col-block__block__icon">
            <svg class="icon <?php echo $icon; ?>">
              <use xlink:href="#<?php echo $icon; ?>"></use>
            </svg><!-- .icon.icon-<?php echo $icon; ?> -->
          </div><!-- .three-col-block__card -->
        <?php endif; ?>

        <?php if( $title || $caption ) : ?>
          <div class="three-col-block__block__content">

          <?php if( $title ) : ?>
            <div class="three-col-block__block__title">
              <h4><?php echo $title; ?></h4>
            </div>
            <!-- .three-col-block__block__title -->
          <?php endif; ?>

          <?php if( $caption ) : ?>
            <div class="three-col-block__block__caption">
              <?php echo format_text($caption); ?>
            </div>
            <!-- .three-col-block__block__caption -->
          <?php endif; ?>

          </div>
          <!-- .three-col-block__content -->
        <?php endif; ?>
      </div>
      <!-- .three-col-block__block -->

      <?php endforeach; ?>
    <?php endif; ?>

    </div><!-- .three-col-block__block -->

  </div><!-- .container.row.start -->

</section>