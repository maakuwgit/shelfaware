<?php
/**
* vertical-timeline
* -----------------------------------------------------------------------------
*
* vertical-timeline component
*/

$defaults = [
  'superheading' => false,
  'heading'      => false,
  'content'      => false,
  'blocks'       => false,
];

$args = [
  'id'      => uniqid('vert-timeline-'),
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
$superheading  = $component_data['superheading'];
$heading       = $component_data['heading'];
$content       = $component_data['content'];
$blocks        = $component_data['blocks'];
?>

<?php if ( ll_empty( $component_data ) ) return; ?>
<section class="ll-vertical-timeline<?php echo implode( " ", $classes ); ?>" <?php echo $id; ?> data-component="vertical-timeline">

  <div class="container column text-center">

  <?php if( $superheading  ) : ?>
    <<?php echo $superheading['tag']; ?> class="col-md-10of12 col-lg-8of12 col-xl-8of12 col-xxl-8of12 vert-timeline__supertitle"><?php echo $superheading['text']; ?></<?php echo $superheading['tag']; ?>><!-- .col-md-10of12.col-lg-8of12.col-xl-8of12.col-xxl-8of12.vert-timeline__supertitle -->
  <?php endif; ?>

  <?php if( $heading  ) : ?>
    <<?php echo $heading['tag']; ?> class="col col-md-10of12 col-lg-8of12 col-xl-8of12 col-xxl-8of12 vert-timeline__heading"><?php echo $heading['text']; ?></<?php echo $heading['tag']; ?>><!-- .col-md-10of12.col-lg-8of12.col-xl-8of12.col-xxl-8of12.vert-timeline__heading -->
  <?php endif; ?>

  <?php if( $content  ) : ?>
    <div class="col col-md-10of12 col-lg-8of12 col-xl-8of12 col-xxl-8of12 vert-timeline__content"><?php echo format_text($content); ?></div><!-- .col-md-10of12.col-lg-8of12.col-xl-8of12.col-xxl-8of12.vert-timeline__content -->
  <?php endif; ?>

  </div><!-- .container.row.centered -->


<?php if( $blocks ) : ?>

  <div class="container">

    <ul class="vert-timeline__blocks row">

    <?php
      foreach( $blocks as $block ) :

        $icon      = $block['icon'];
        $title     = $block['title'];
        $caption   = $block['caption'];

    ?>
      <li class="vert-timeline__block">

      <?php if( $icon ) : ?>
        <div class="vert-timeline__block__icon">
          <svg class="icon <?php echo $icon; ?>">
            <use xlink:href="#<?php echo $icon; ?>"></use>
          </svg><!-- .icon.icon-<?php echo $icon; ?> -->
        </div><!-- .vert-timeline__block -->
      <?php endif; ?>

      <?php if( $title || $caption ) : ?>
        <div class="vert-timeline__block__content">

        <?php if( $title ) : ?>
          <div class="vert-timeline__block__title">
            <h4><?php echo $title; ?></h4>
          </div>
          <!-- .vert-timeline__block__title -->
        <?php endif; ?>

        <?php if( $caption ) : ?>
          <div class="vert-timeline__block__caption">
            <?php echo format_text($caption); ?>
          </div>
          <!-- .vert-timeline__block__caption -->
        <?php endif; ?>

        </div>
        <!-- .vert-timeline__content -->
      <?php endif; ?>

      </li><!-- .vert-timeline__item -->

    <?php endforeach; ?>

    </ul><!-- .vert-timeline__items -->

  </div><!-- .container -->
<?php endif; ?>

</section>