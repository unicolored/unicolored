
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
global $urlfinale, $videoType, $videoCode, $post, $post_thumb;
// La hauteur de la vidéo est définie d'abord dans les options du thème
	// puis par article, il est possible de spécifier une taille distincte
	$custom = get_post_custom($post->ID);
	
	$videoCode = isset($custom["videoCode"][0]) ? $custom["videoCode"][0] : false;
	$videoType = isset($custom["videoType"][0]) ? $custom["videoType"][0] : false;
	$videoHeight = isset($custom["videoHeight"][0]) && $custom["videoHeight"][0]!=false ? $custom["videoHeight"][0] : BR_VIDEO_HEIGHT;
	$videoEmbed = isset($custom["videoEmbed"][0]) ? $custom["videoEmbed"][0] : false;
	$post_attachment_infoshow = isset($custom["post_attachment_infoshow"][0]) ? $custom["post_attachment_infoshow"][0] : false;
	

	if ( $attachments && $nb_att>1) { 
		$i=1;
		foreach ( $attachments as $attachment ) {
			//vardump($attachment);
			$image_src2=wp_get_attachment_image_src( $attachment->ID, 'large' );
			echo $i>1 ? '<hr class="margin" />' : false;
			$caption = ($post_attachment_infoshow=="1" ? '<div class="caption">
						<p><span>'.$i.' /</span> '.$attachment->post_title.'</p>
					</div>' : false);
			echo '
				<div class="thumbnail">
					<img src="'.$image_src2[0].'" width="'.$image_src2[1].'" height="'.$image_src2[2].'"  class="img-responsive" />
					
					'.$caption.'
				</div>';
			$i++;
		}
	}

	
	?>
	<style>
	.embed-container {
		position: relative; margin-top:2em; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%; height: auto;
	}
	.embed-container iframe,
	.embed-container object,
	.embed-container embed {
		position: absolute; top: 0; left: 0; width: 100%; height: 100%;
	}
	.regardez {
		color:#222;
		margin:0 3em;
		text-align:center;
		.clearfix();
	}
	</style>
	<hr class="clearfix">
	<hr class="margin">
	<h3 class="regardez">Cliquez ci-dessous pour voir la vidéo :</h3>
	<div class='embed-container' itemscope itemtype="http://schema.org/VideoObject">
		<?php echo $videoEmbed; ?>
		<meta itemprop="author" content="Gilles Hoarau">
		<meta itemprop="thumbnailUrl" content="<?php echo $post_thumb->src ?>" />
	</div>
<hr class="margin">
