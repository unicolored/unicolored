<?php	
if ( wp_attachment_is_image() ) :
	$attachments = array_values( get_children( array( 'post_parent' => $post->post_parent, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID' ) ) );
	foreach ( $attachments as $k => $attachment ) { if ( $attachment->ID == $post->ID ) break; }
	$k++;
	
	// If there is more than 1 image attachment in a gallery
	if ( count( $attachments ) > 1 ) {
		if ( isset( $attachments[ $k ] ) ) $next_attachment_url = get_attachment_link( $attachments[ $k ]->ID );
		else $next_attachment_url = get_attachment_link( $attachments[ 0 ]->ID );
	}
	else { $next_attachment_url = wp_get_attachment_url(); }
endif; ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="entry">
        
        <div id="thumbnav">
            <a class="thumbnail" href="<?php echo $next_attachment_url; ?>" title="<?php echo esc_attr( get_the_title() ); ?>" rel="attachment"><?php echo wp_get_attachment_image( $post->ID , 'large' );?></a>
            <div class="left bg"><?php previous_image_link( false,  '<span class="hide">Previous</span>' ); ?><span class="icon iconleft"><b></b><?php previous_image_link(  ); ?></span></div>
            <div class="right bg"><a href="<?php echo $next_attachment_url; ?>"><span class="hide">Next</span></a><span class="icon iconright"><b></b><?php next_image_link(  ); ?></span></div>
        </div>
        
        <hr class="clearfix"/>
                           
    </div><!-- .entry- -->
</article>