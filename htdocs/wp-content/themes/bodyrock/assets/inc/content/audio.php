<?php

// AUDIO Content /////////////////////////////////////////////

/*//**//**//**//*//**//**//**//*//**//**//**//*//**//**//**/


// GET EMBED AUDIO /////////////////////////////////////////////
// Afficher l'iframe correspondant au code d'un post audio
function br_getEmbedAudio($array) {
	switch($array['type']) {
		default:
			// Soundcloud
//			return '<iframe src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/'.$array['track'].'&amp;color='.$array['color'].'&amp;auto_play='.$array['autoplay'].'&amp;show_artwork='.$array['visual'].'" width="'.$array['width'].'" height="'.$array['height'].'" scrolling="no" frameborder="no"></iframe>';
return '<iframe width="100%" height="450" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/'.$array['track'].'&amp;auto_play=false&amp;hide_related=false&amp;visual=true"></iframe>';
//			return '<iframe width="100%" height="166" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/'.$array['track'].'&amp;color='.$array['color'].'&amp;auto_play='.$array['autoplay'].'&amp;hide_related=false&amp;show_artwork='.$array['show_artwork'].'"></iframe>';
		break;		
	}
}
function br_EmbedAudio($array) { echo br_getEmbedAudio($array); }