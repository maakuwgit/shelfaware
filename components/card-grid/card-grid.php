<?php
/**
* card-grid
* -----------------------------------------------------------------------------
*
* card-grid component
*/

$defaults = [
  'superheading' => false,
  'heading'      => false,
  'content'      => false,
  'cards'        => false,
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
$superheading  = $component_data['superheading'];
$heading       = $component_data['heading'];
$content       = $component_data['content'];
$cards         = $component_data['cards'];

?>

<?php if ( ll_empty( $component_data ) ) return; ?>
<section class="ll-card-grid<?php echo implode( " ", $classes ); ?>" <?php echo $id; ?> data-component="card-grid">

 <?php if( $superheading || $heading || $content ) : ?>

  <?php if( $superheading['text'] || $heading['text'] || $content ) :?>

  <div class="container column text-center">

  <?php if( $superheading ) : ?>

    <?php if( $superheading['text'] ) :?>

    <<?php echo $superheading['tag']; ?> class="col-md-10of12 col-lg-8of12 col-xl-8of12 col-xxl-8of12 card-grid__supertitle"><?php echo $superheading['text']; ?></<?php echo $superheading['tag']; ?>><!-- .col-md-10of12.col-lg-8of12.col-xl-8of12.col-xxl-8of12.card-grid__supertitle -->

    <?php endif; ?>

  <?php endif; ?>

  <?php if( $heading ) : ?>

    <?php if( $heading['text'] ) :?>

    <<?php echo $heading['tag']; ?> class="col col-md-10of12 col-lg-8of12 col-xl-8of12 col-xxl-8of12 card-grid__heading"><?php echo $heading['text']; ?></<?php echo $heading['tag']; ?>><!-- .col-md-10of12.col-lg-8of12.col-xl-8of12.col-xxl-8of12.card-grid__heading -->

    <?php endif; ?>

  <?php endif; ?>

  <?php if( $content  ) : ?>
    <div class="col col-md-10of12 col-lg-8of12 col-xl-8of12 col-xxl-8of12 card-grid__content"><?php echo format_text($content); ?></div><!-- .col-md-10of12.col-lg-8of12.col-xl-8of12.col-xxl-8of12.card-grid__content -->
  <?php endif; ?>

  </div><!-- .container.row.centered -->

  <?php endif; ?>

<?php endif; ?>

<?php if( $cards ) : ?>

  <div class="container card-grid__cards_wrapper">

    <ul class="card-grid__cards row">

    <?php
      foreach( $cards as $card ) :

        $icon      = $card['icon'];
        $title     = $card['title'];
        $caption   = $card['caption'];

    ?>
      <li class="card-grid__card">

      <?php if( $icon ) : ?>
        <div class="card-grid__card__icon">
          <svg class="icon <?php echo $icon; ?>">
            <use xlink:href="#<?php echo $icon; ?>"></use>
          </svg><!-- .icon.icon-<?php echo $icon; ?> -->
        </div><!-- .card-grid__card -->
      <?php endif; ?>

      <?php if( $title || $caption ) : ?>
        <div class="card-grid__card__content">

        <?php if( $title ) : ?>
          <div class="card-grid__card__title">
            <h4><?php echo $title; ?></h4>
          </div>
          <!-- .card-grid__card__title -->
        <?php endif; ?>

        <?php if( $caption ) : ?>
          <div class="card-grid__card__caption">
            <?php echo $caption; ?>
          </div>
          <!-- .card-grid__card__caption -->
        <?php endif; ?>

        </div>
        <!-- .card-grid__content -->
      <?php endif; ?>

      </li><!-- .card-grid__item -->

    <?php endforeach; ?>

    </ul><!-- .card-grid__items -->

  </div><!-- .container -->
<?php endif; ?>

</section>