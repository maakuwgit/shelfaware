<?php
/**
* tabs
* -----------------------------------------------------------------------------
*
* tabs component
*/

$defaults = [
  'superheading' => false,
  'heading'      => false,
  'content'      => false,
  'tabs'       => false,
];

$args = [
  'id'      => uniqid('tabs-'),
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
$tabs          = $component_data['tabs'];

?>

<?php if ( ll_empty( $component_data ) ) return; ?>
<section class="ll-tabs<?php echo implode( " ", $classes ); ?>" <?php echo $id; ?> data-component="tabs">

  <div class="container column text-center">

  <?php if( $superheading  ) : ?>
    <<?php echo $superheading['tag']; ?> class="col-md-10of12 col-lg-8of12 col-xl-8of12 col-xxl-8of12 tab__supertitle"><?php echo $superheading['text']; ?></<?php echo $superheading['tag']; ?>><!-- .col-md-10of12.col-lg-8of12.col-xl-8of12.col-xxl-8of12.tab__supertitle -->
  <?php endif; ?>

  <?php if( $heading  ) : ?>
    <<?php echo $heading['tag']; ?> class="col col-md-10of12 col-lg-8of12 col-xl-8of12 col-xxl-8of12 tab__heading"><?php echo $heading['text']; ?></<?php echo $heading['tag']; ?>><!-- .col-md-10of12.col-lg-8of12.col-xl-8of12.col-xxl-8of12.tab__heading -->
  <?php endif; ?>

  <?php if( $content  ) : ?>
    <div class="col col-md-10of12 col-lg-8of12 col-xl-8of12 col-xxl-8of12 tab__content"><?php echo format_text($content); ?></div><!-- .col-md-10of12.col-lg-8of12.col-xl-8of12.col-xxl-8of12.tab__content -->
  <?php endif; ?>

  </div><!-- .container.row.centered -->

<?php if( $tabs ) : ?>

  <div class="container">

    <dl class="tab__definition">
    <?php $t = 0; ?>
    <?php foreach( $tabs as $tab ) : ?>

      <dt class="tab__tabs__tab__title<?php echo ( $t == 0 ? ' active' : '' ); ?>">
        <?php echo $tab['title']; ?>
      </dt>
      <dd class="tab__tabs__tab__description row stretch<?php echo ( $t == 0 ? ' active' : '' ); ?>">
      <?php
        foreach( $tab['column'] as $block) :
          $icon      = $block['icon'];
          $title     = $block['title'];
          $caption   = $block['caption'];
      ?>
        <div class="tab__tab col col-sm-6of12 col-md-4of12 col-lg-4of12 col-xl-4of12 col-xxl-4of12">

        <?php if( $title || $caption ) : ?>
          <div class="tab__tab__content">

          <?php if( $icon ) : ?>
            <div class="tab__tab__icon">
              <svg class="icon <?php echo $icon; ?>">
                <use xlink:href="#<?php echo $icon; ?>"></use>
              </svg><!-- .icon.icon-<?php echo $icon; ?> -->
            </div><!-- .tab__tab__icon -->
          <?php endif; ?>

          <?php if( $title ) : ?>
            <div class="tab__tab__title">
              <h4><?php echo $title; ?></h4>
            </div>
            <!-- .tab__tab__title -->
          <?php endif; ?>

          <?php if( $caption ) : ?>
            <div class="tab__tab__caption">
              <?php echo format_text($caption); ?>
            </div>
            <!-- .tab__tab__caption -->
          <?php endif; ?>

          </div>
          <!-- .tab__content -->
        <?php endif; ?>

        </div><!-- .tab__tab -->

      <?php endforeach; ?>
      </dd>
    <?php $t++; ?>
    <?php endforeach; ?>

    </dl><!-- .tab__definition -->

  </div><!-- .container -->
<?php endif; ?>
</section>