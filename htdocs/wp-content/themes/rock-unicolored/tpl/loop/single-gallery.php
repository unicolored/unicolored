<?php
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
$nb_att=count($attachments);
?>


<?php
global $is_gif, $image_src_thumbnail;

if($is_gif==true) get_template_part('tpl/gifwonder');
else {

	
	if ( $attachments ) { 
		$i=1;
		
			$custom = get_post_custom($post->ID);
	
	$post_attachment_infoshow = isset($custom["post_attachment_infoshow"][0]) ? $custom["post_attachment_infoshow"][0] : false;
		foreach ( $attachments as $attachment ) {
			//vardump($attachment);
			$image_src2=wp_get_attachment_image_src( $attachment->ID, 'large' );
            if($i===1) {
                $image_src_thumbnail = wp_get_attachment_image_src( $attachment->ID, 'large' );
            }
			echo $i>1 ? '<hr class="margin" />' : false;
			$caption = ($post_attachment_infoshow=="1" ? '<div class="caption">
						<p itemprop="caption"><span>'.$i.' /</span> '.$attachment->post_title.'</p>
					</div>' : false);
			echo '
				<div class="thumbnail">
					<img src="'.$image_src2[0].'" width="'.$image_src2[1].'" height="'.$image_src2[2].'"  class="img-responsive" itemprop="thumbnailUrl" />
					'.$caption.'
				</div>';
			$i++;
		}
	}
}
?>


