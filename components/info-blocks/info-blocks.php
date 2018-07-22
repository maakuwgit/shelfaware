<?php
/**
* info-blocks
* -----------------------------------------------------------------------------
*
* info-blocks component
*/

$defaults = [
  'superheading' => false,
  'heading'      => false,
  'content'      => false,
  'blocks'       => false,
];

$args = [
  'id'      => uniqid('info-block-'),
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
<section class="ll-info-blocks<?php echo implode( " ", $classes ); ?>" <?php echo $id; ?> data-component="info-blocks">

  <div class="container column text-center">

  <?php if( $superheading  ) : ?>
    <<?php echo $superheading['tag']; ?> class="col-md-10of12 col-lg-8of12 col-xl-8of12 col-xxl-8of12 info-block__supertitle"><?php echo $superheading['text']; ?></<?php echo $superheading['tag']; ?>><!-- .col-md-10of12.col-lg-8of12.col-xl-8of12.col-xxl-8of12.info-block__supertitle -->
  <?php endif; ?>

  <?php if( $heading  ) : ?>
    <<?php echo $heading['tag']; ?> class="col col-md-10of12 col-lg-8of12 col-xl-8of12 col-xxl-8of12 info-block__heading"><?php echo $heading['text']; ?></<?php echo $heading['tag']; ?>><!-- .col-md-10of12.col-lg-8of12.col-xl-8of12.col-xxl-8of12.info-block__heading -->
  <?php endif; ?>

  <?php if( $content  ) : ?>
    <div class="col col-md-10of12 col-lg-8of12 col-xl-8of12 col-xxl-8of12 info-block__content"><?php echo format_text($content); ?></div><!-- .col-md-10of12.col-lg-8of12.col-xl-8of12.col-xxl-8of12.info-block__content -->
  <?php endif; ?>

  </div><!-- .container.row.centered -->

<?php if( $blocks ) : ?>

  <div class="container">

    <ul class="info-block__blocks">

    <?php
      foreach( $blocks as $block ) :

        $icon      = $block['icon'];
        $title     = $block['title'];
        $caption   = $block['caption'];
        $use       = $block['infographic'];
        $image     = $block['image'];
        $svg       = $block['svg'];

        if( $use == 'img' && $image ) {
          $bg = ' data-backgrounder';
        }else{
          $bg = '';
        }

    ?>
      <li class="info-block__block row stretch">

      <?php if( $image || $svg ) : ?>
        <figure class="info-block__block__figure col col-md-6of12 col-lg-6of12 col-xl-6of12 col-xxl-6of12"<?php echo $bg;?>>

        <?php if( $use === 'img' && $image ) : ?>

          <div class="info-block__block__feature feature">
          <?php echo ll_format_image($image); ?>
          </div><!-- .info-block__feature.feature -->

        <?php elseif( $use === 'svg' && $svg ) : ?>

          <div class="info-block__block__svg">
          <?php echo $svg; ?>
          </div><!-- .info-block__svg -->

        <?php endif; ?>

        </figure><!-- .info-block__figure -->
      <?php endif; ?>

      <?php if( $title || $caption ) : ?>
        <div class="info-block__block__content col col-offset-md-1of12 col-md-5of12 col-offset-lg-1of12 col-lg-4of12 col-offset-xl-1of12 col-xl-4of12 col-offset-xxl-1of12 col-xxl-4of12">

        <?php if( $icon ) : ?>
          <div class="info-block__block__icon">
            <svg class="icon <?php echo $icon; ?>">
              <use xlink:href="#<?php echo $icon; ?>"></use>
            </svg><!-- .icon.icon-<?php echo $icon; ?> -->
          </div><!-- .info-block__block -->
        <?php endif; ?>

        <?php if( $title ) : ?>
          <div class="info-block__block__title">
            <h4><?php echo $title; ?></h4>
          </div>
          <!-- .info-block__block__title -->
        <?php endif; ?>

        <?php if( $caption ) : ?>
          <div class="info-block__block__caption">
            <?php echo format_text($caption); ?>
          </div>
          <!-- .info-block__block__caption -->
        <?php endif; ?>

        </div>
        <!-- .info-block__content -->
      <?php endif; ?>

      </li><!-- .info-block__item -->

    <?php endforeach; ?>

    </ul><!-- .info-block__items -->

  </div><!-- .container -->
<?php endif; ?>
</section>