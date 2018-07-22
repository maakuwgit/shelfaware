<?php
if( have_rows( 'components' ) ) {
  //We're gonna dump it into a string, so let's define it
  $components = '';

  while( have_rows( 'components' ) ) {
    the_row();

    switch( get_row_layout() ) {
      case 'card-grid' :
        //Home, Vendors, Manufacturing
        $cards = array(
          'superheading' => get_sub_field('card-grid_superheading'),
          'heading'      => get_sub_field('card-grid_heading'),
          'content'      => get_sub_field('card-grid_content'),
          'cards'        => get_sub_field('card-grid_cards')
        );

        $components .= ll_include_component(
          'card-grid',
          $cards,
          array(),
          true
        );
      break;
      case 'image-w-caption' :
        //About Us
        $image = array(
          'image'   => get_sub_field('image_w_caption_image'),
          'caption' => get_sub_field('image_w_caption_caption')
        );

        $components .= ll_include_component(
          'image-w-caption',
          $image,
          array(),
          true
        );
      break;
      case 'info-block' :
        //Home
        $blocks = array(
          'superheading' => get_sub_field('info-blocks_superheading'),
          'heading'      => get_sub_field('info-blocks_heading'),
          'content'      => get_sub_field('info-blocks_content'),
          'blocks'       => get_sub_field('info-blocks_block')
        );

        $components .= ll_include_component(
          'info-blocks',
          $blocks,
          array(),
          true
        );
      break;
      case 'infographic' :
        //Home
        $infographic = array(
          'superheading' => get_sub_field('info_superheading'),
          'heading'      => get_sub_field('info_heading'),
          'content'      => get_sub_field('info_content'),
          'infographic'  => get_sub_field('info_infographic'),
          'image'        => get_sub_field('info_image'),
          'svg'          => get_sub_field('info_svg'),
          'blurb0'       => get_sub_field('info_blurb_1'),
          'blurb1'       => get_sub_field('info_blurb_2'),
          'blurb2'       => get_sub_field('info_blurb_3'),
          'blurb3'       => get_sub_field('info_blurb_4')
        );

        $components .= ll_include_component(
          'infographic',
          $infographic,
          array(),
          true
        );
      break;
      case 'lr-block' :
        //About Us, all Portfolio
        $block = array(
          'content'  => get_sub_field('lr_blocks_content'),
          'image'    => get_sub_field('lr_blocks_image'),
          'style'    => get_sub_field('lr_blocks_style')
        );

        $components .= ll_include_component(
          'lr-blocks',
          $block,
          array(),
          true
        );
      break;
      case 'post-grid' :
        //Home, Blog Roll
        $posts = array(
          'superheading' => get_sub_field('post-grid_superheading'),
          'heading'      => get_sub_field('post-grid_heading'),
          'content'      => get_sub_field('post-grid_content'),
          'posts'        => get_sub_field('post-grid_posts')
        );

        $components .= ll_include_component(
          'post-grid',
          $posts,
          array(),
          true
        );
      break;
      case 'synopsis' :
        //Vendors, Manufacturers, All Portfolio
        $synopsis = array(
          'headline'     => get_sub_field('synopsis_headline'),
          'l_content'    => get_sub_field('synopsis_l_content'),
          'r_content'    => get_sub_field('synopsis_r_content')
        );

        $components .= ll_include_component(
          'synopsis',
          $synopsis,
          array(),
          true
        );
      break;
      case 'testimonial' :
        //Home, All Portfolio
        $testimonials = array(
          'supertitle'       => get_sub_field('testimonials_superheading'),
          'heading'          => get_sub_field('testimonials_heading'),
          'content'          => get_sub_field('testimonials_content'),
          'num_testimonials' => get_sub_field('num_testimonials')
        );

        $components .= ll_include_component(
          'testimonials',
          $testimonials,
          array(),
          true
        );
      break;
      case 'three-col-block' :
        //Home
        $columns = array(
          'columns' => get_sub_field('three_col_block')
        );

        $components .= ll_include_component(
          'three-col-block',
          $columns,
          array(),
          true
        );
      break;
      case 'tabs' :
        //Home
        $tabs = array(
          'superheading'  => get_sub_field('tabs_superheading'),
          'heading'       => get_sub_field('tabs_heading'),
          'content'       => get_sub_field('tabs_content'),
          'tabs'          => get_sub_field('tabs_tab')
        );

        $components .= ll_include_component(
          'tabs',
          $tabs,
          array(),
          true
        );
      break;
      case 'vertical-timeline' :
        //Home, Vendors, Manufacturing
        $blocks = array(
          'superheading' => get_sub_field('vert-timeline_superheading'),
          'heading'      => get_sub_field('vert-timeline_heading'),
          'content'      => get_sub_field('vert-timeline_content'),
          'blocks'       => get_sub_field('vert-timeline_block')
        );

        $components .= ll_include_component(
          'vertical-timeline',
          $blocks,
          array(),
          true
        );
      break;
      default:
        //the_content();
      break;
    }
  }
  echo $components;
}
?>
<?php // wp_link_pages(array('before' => '<nav class="pagination">', 'after' => '</nav>')); ?>
