<?php
// The Query
$the_query = new WP_Query( array('cat'=>'-'.get_category_by_slug( 'portfolio-graphic-web-design-professionnel' )->term_id));
// TOFIX: Les images ne s'affichent pas
// The Loop
$id_current = get_the_ID();
if ( $the_query->have_posts() ) {
  while ( $the_query->have_posts() ) {
    $the_query->the_post();
    $thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'vignette');
    $thumb_large = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large');

    $args = array(
      'post_type' => 'attachment',
      'numberposts' => -1,
      'post_status' => null,
      'post_parent' => get_the_ID(),
      'orderby'         => 'menu_order',
      'order'           => 'ASC',
      'exclude' => get_post_thumbnail_id()
    );
    $attachments = get_posts( $args );
    //$images[get_the_ID()]['url'] = relativeUrl(wp_get_attachment_url( get_post_thumbnail_id()));
    //$image_src2=wp_get_attachment_image_src( $attachments[0]->ID, 'large' );
    get_template_part('tpl/article','thumbnail');
  }
} else {
  // no posts found
}
/* Restore original Post Data */
wp_reset_postdata();

// Reset Query
wp_reset_query();
?>
