<?php
$args='posts_per_page=12&post_status=publish';

// The Query
$the_query = new WP_Query( $args );

// The Loop
if ( $the_query->have_posts() ) {
    while ( $the_query->have_posts() ) {
        $the_query->the_post();
        get_template_part('tpl/article','thumbnail');
    }
} else {
    // no posts found
}
/* Restore original Post Data */
wp_reset_postdata();
?>
