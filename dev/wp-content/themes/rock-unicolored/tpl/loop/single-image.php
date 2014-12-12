

<?php
global $is_gif;
if($is_gif==true) get_template_part('tpl/gifwonder');
else {

	if(has_post_thumbnail()) { ?>
	<section class="art-vignette">
		<?php
		$image_src1=wp_get_attachment_image_src( get_post_thumbnail_id(), 'original' );
//				the_post_thumbnail('large',array('class'=>'img-responsive'));
		echo '<img src="'.$image_src1[0].'" width="'.$image_src1[1].'" height="'.$image_src1[2].'"  class="img-responsive" itemprop="thumbnailUrl" />';
		?>
	</section>
	<?php } ?>	
	<hr class="margin" />
	<?php
}
?>


