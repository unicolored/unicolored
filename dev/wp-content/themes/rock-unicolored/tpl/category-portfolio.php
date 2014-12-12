<?php
$the_query = new WP_Query( array('cat'=>get_category_by_slug( 'portfolio-graphic-web-design-professionnel' )->term_id,'orderby'=>'title','order'=>'ASC' ));

$id_current = get_the_ID();
// The Loop
if ( $the_query->have_posts() ) {
	global $images;
	while ( $the_query->have_posts() ) {
		$the_query->the_post();

		$images[get_the_ID()]['url'] = relativeUrl(wp_get_attachment_url( get_post_thumbnail_id()));

		get_template_part('tpl/article','portfolio');
	}

}
// Passage du tableau d'images au javascript
//wp_localize_script( 'scriptsglobaux', 'imagesportfolio', $images );

/* Restore original Post Data */
wp_reset_postdata();
wp_reset_query();
?>
