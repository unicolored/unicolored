<?php
global $urlfinale, $videoType, $videoCode, $post;



	// La hauteur de la vidéo est définie d'abord dans les options du thème
	// puis par article, il est possible de spécifier une taille distincte
	$custom = get_post_custom($post->ID);
	
	$videoCode = isset($custom["videoCode"][0]) ? $custom["videoCode"][0] : false;
	$videoType = isset($custom["videoType"][0]) ? $custom["videoType"][0] : false;
	$videoHeight = isset($custom["videoHeight"][0]) && $custom["videoHeight"][0]!=false ? $custom["videoHeight"][0] : BR_VIDEO_HEIGHT;
	$videoEmbed = isset($custom["videoEmbed"][0]) ? $custom["videoEmbed"][0] : false;
	?>
	<style>
	.embed-container {
		position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%; height: auto;
	}
	.embed-container iframe,
	.embed-container object,
	.embed-container embed {
		position: absolute; top: 0; left: 0; width: 100%; height: 100%;
	}
	</style>
	<hr class="margin">
	<div class='embed-container'>
		<?php echo $videoEmbed; ?>
	</div>
	<?php
	/*
	//$videoHeight = '600px';

	// Pour les vidéos Youtube, on charge le lecteur html5
	// Pour vimeo, il ne semble pas possible de trouver le lien du mp4 même via l'api.
	if($videoType=='you') {
		require(INC_PATH.'_libs/youtubedownloader/curl.php');
		require(INC_PATH.'_libs/youtubedownloader/youtube.php');
	  
		$tube = new youtube();
		
		$links = $tube->get('http://www.youtube.com/watch?v='.$videoCode);
	   	
			echo '<div id="singlevideo'.$videoType.'" class="code_'.$videoCode.'"></div>';
	  
		
	}
	elseif($videoType=='vim') {
		echo '<div id="singlevideo'.$videoType.'" class="code_'.$videoCode.'"></div>';
		
	}
	
		// Spécifique aux formats video
		// Chargement des objets vidéos
		echo "<script>\n";
		echo 'jQuery(document).ready(function(){'."\n";
		echo "// AFFICHAGE DES VIDEOS Si le conteneur identifié est trouvé\n"."\n"."\n";
		
		echo '
			if(jQuery(\'#singlevideoyou\').length>0) { // Youtube
				jQuery(\'#singlevideoyou\').html(\'<iframe width="100%" height="'.$videoHeight.'"  style="height:'.$videoHeight.';" src="//www.youtube.com/embed/\'+(jQuery(\'#singlevideoyou\').attr(\'class\').replace(\'code_\', \'\'))+\'?rel=0&amp;autoplay='.BR_VIDEO_AUTOPLAY.'&related=0" frameborder="0" allowfullscreen></iframe>\');
			}
			jQuery(\'#singlevideovim\').html(\'<iframe src="//player.vimeo.com/video/\'+(jQuery(\'#singlevideovim\').attr(\'class\').replace(\'code_\', \'\'))+\'?badge=0&amp;color=db0000&amp;autoplay='.BR_VIDEO_AUTOPLAY.'" width="100%" height="'.$videoHeight.'" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>\');
		';
		
		echo '});'."\n";
		echo "</script>\n";

*/
?>

