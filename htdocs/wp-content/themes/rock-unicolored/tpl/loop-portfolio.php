<?php
// The Query
$the_query = new WP_Query( array('cat'=>get_category_by_slug( 'portfolio-graphic-web-design-professionnel' )->term_id,'orderby'=>'title','order'=>'ASC' ));

// The Loop
//global $query_string;
//query_posts( $query_string . '&orderby=title&order=ASC' );
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
		$image_src2=wp_get_attachment_image_src( $attachments[0]->ID, 'large' );
		//the_ID()
		?>

		<article class="article projet <?php echo $id_current==get_the_ID() ? 'currentpost' : false ?>" id="post-<?php echo get_the_ID() ?>" itemscope="" itemtype="http://schema.org/CreativeWork">
			<div class="thumbnail">
				<a class="link-vignette" href="<?php the_permalink() ?>">
                    <img src="<?php echo str_replace('http://','https://',$thumb[0]) ?>" class="img-responsive" itemprop="thumbnailUrl">
                </a>
				<div class="caption">
					<h5 itemprop="name"><a href="<?php the_permalink() ?>"><?php echo get_the_title() ?></a></h5>
				</div>
			</div>
		</article>
	<?php
    }
    } else {
    // no posts found
    }
    /* Restore original Post Data */
    wp_reset_postdata();

    // Reset Query
    wp_reset_query();
?>
<hr class="clearfix">
