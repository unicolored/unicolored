

	
	<div class="addthis_toolbox addthis_default_style addthis_32x32_style">
		<span class="pull-left"><?php br_Icon('share') ?> Partager &nbsp;</span>
		<a class="addthis_button_facebook"></a>
		<a class="addthis_button_twitter"></a>
		<a class="addthis_button_google_plusone_share"></a>
		<a class="addthis_button_pinterest_share"></a>
		<a class="addthis_button_linkedin"></a>
	</div>
	<?php
	/*
	$ch = curl_init('http://api.bitly.com/v3/shorten?login=unicolored&apiKey=R_8de9dc884a5f6e6ba8831909df65d03c&longUrl=' . get_permalink());
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	$result = curl_exec($ch);
	$R = json_decode($result);
	 */
	?>
	<!--
	<p>
		<?php br_Icon('link') ?>
		Permalien
		<input type="text" value="<?php echo $R->data->url ?>" class="form-control">
	</p>
	-->

<hr class="clearfix">
