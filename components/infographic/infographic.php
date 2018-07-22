<?php
/**
* infographic
* -----------------------------------------------------------------------------
*
* infographic component
*/

$defaults = [
  'superheading' => false,
  'heading'      => false,
  'content'      => false,
  'infographic'  => false,
  'image'        => false,
  'svg'          => false,
  'blurb0'       => false,
  'blurb1'       => false,
  'blurb2'       => false,
  'blurb3'       => false,
];

$args = [
  'id'      => uniqid('infographic-'),
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
$title         = $component_data['title'];
$use           = $component_data['infographic'];
$image         = $component_data['image'];
$svg           = $component_data['svg'];
$blurb0        = $component_data['blurb0'];
$blurb1        = $component_data['blurb1'];
$blurb2        = $component_data['blurb2'];
$blurb3        = $component_data['blurb3'];

if( $use == 'img' && $image ) {
  $bg = ' data-backgrounder';
}else{
  $bg = '';
}

?>

<?php if ( ll_empty( $component_data ) ) return; ?>
<section class="ll-infographic<?php echo implode( " ", $classes ); ?>" <?php echo $id; ?> data-component="infographic">

  <div class="container column text-center">

  <?php if( $superheading  ) : ?>
    <<?php echo $superheading['tag']; ?> class="col-md-10of12 col-lg-8of12 col-xl-8of12 col-xxl-8of12 info__supertitle"><?php echo $superheading['text']; ?></<?php echo $superheading['tag']; ?>><!-- .col-md-10of12.col-lg-8of12.col-xl-8of12.col-xxl-8of12.info__supertitle -->
  <?php endif; ?>

  <?php if( $heading  ) : ?>
    <<?php echo $heading['tag']; ?> class="col col-md-10of12 col-lg-8of12 col-xl-8of12 col-xxl-8of12 info__heading"><?php echo $heading['text']; ?></<?php echo $heading['tag']; ?>><!-- .col-md-10of12.col-lg-8of12.col-xl-8of12.col-xxl-8of12.info__heading -->
  <?php endif; ?>

  <?php if( $content  ) : ?>
    <div class="col col-md-10of12 col-lg-8of12 col-xl-8of12 col-xxl-8of12 info__content"><?php echo format_text($content); ?></div><!-- .col-md-10of12.col-lg-8of12.col-xl-8of12.col-xxl-8of12.info__content -->
  <?php endif; ?>

  </div><!-- .container.column.text-center -->

<?php if( $image || $svg || $blurb0 || $blurb1 || $blurb2 || $blurb3 ) : ?>

  <div class="container">

    <div class="info__infographic row stretch">

      <?php if( $blurb0 || $blurb2 ) : ?>

        <div class="info__infographic__blurbs col col-md-3of12 col-lg-3of12 col-offset-lg-1of12 col-xl-3of12 col-offset-xl-1of12 col-xxl-3of12 col-offset-xxl-1of12">

        <?php if( $blurb0 ) : ?>
          <div class="info__infographic__blurb info_blurb0">
            <?php echo format_text($blurb0); ?>
          </div>
          <!-- .info__infographic__blurb -->
        <?php endif; ?>

        <?php if( $blurb2 ) : ?>
          <div class="info__infographic__blurb info_blurb2">
            <?php echo format_text($blurb2); ?>
          </div>
          <!-- .info__infographic__blurb -->
        <?php endif; ?>

        </div><!-- .info__infographic__blurbs.col.col-3of12.col-offset-1of12 -->

      <?php endif; ?>

      <?php if( $image || $svg ) : ?>
        <figure class="info__infographic__figure col col-md-4of12 col-lg-4of12 col-xl-4of12 col-xxl-4of12"<?php echo $bg;?>>

        <?php if( $use === 'img' && $image ) : ?>

          <div class="info__infographic__feature feature">
          <?php echo ll_format_image($image); ?>
          </div><!-- .info__infographic__feature.feature -->

        <?php elseif( $use === 'svg' && $svg ) : ?>

          <div class="info__block__svg">
          <?php echo $svg; ?>
          </div><!-- .info__svg -->

        <?php endif; ?>

        </figure><!-- .info__figure -->
      <?php endif; ?>

      <?php if( $blurb1 || $blurb3 ) : ?>

        <div class="info__infographic__blurbs col col-md-3of12 col-lg-3of12 col-offset-lg-1of12 col-xl-3of12 col-offset-xl-1of12 col-xxl-3of12 col-offset-xxl-1of12 end">

        <?php if( $blurb1 ) : ?>
          <div class="info__infographic__blurb info_blurb1">
            <?php echo format_text($blurb1); ?>
          </div>
          <!-- .info__infographic__blurb -->
        <?php endif; ?>

        <?php if( $blurb3 ) : ?>
          <div class="info__infographic__blurb info_blurb3">
            <?php echo format_text($blurb3); ?>
          </div>
          <!-- .info__infographic__blurb -->
        <?php endif; ?>

        </div><!-- .info__infographic__blurbs.col.col-3of12.col-offset-1of12 -->

      <?php endif; ?>

    </div><!-- .info__infographic.row.stretch -->

  </div><!-- .container -->

<?php endif; ?>

</section>