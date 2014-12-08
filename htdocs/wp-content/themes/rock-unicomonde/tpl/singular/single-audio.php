<?php
global $urlfinale, $videoType, $videoCode, $post;


require_once INC_PATH.'_libs/soundcloudphp/Soundcloud.php';

// create a client object with your app credentials
$client = new Services_Soundcloud('5a725ad30c035ffa4003a2870f85aad2', 'cbe36c1104bf03e67f516885795910ff');
$client->setCurlOptions(array(CURLOPT_FOLLOWLOCATION => 1));



br_EmbedAudio(array('type' => 'soundcloud', 'track'=> get_post_meta(get_the_ID(), 'audioCode', true), 'class' => "col-ff",'autoplay' => "false", 'color' => "db0000", 'width' => "100%", 'height' => "450", 'show_artwork' => "true"));

?>


	
