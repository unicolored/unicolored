
	
    <section class="article-media">
    
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
<!--
<div class="playerimg">
    <h3>Album <?php echo $nb_att; ?> image<?php echo $nb_att>1?'s':false?> | <a class="playDiaporama" href="#">Lancer le diaporama</a></h3>
</div>-->

<div class="text-center">
	<section>
    
	<?php
    if ( $attachments ) {
        $i=1;
        foreach ( $attachments as $attachment ) {
            $image_src2=wp_get_attachment_image_src( $attachment->ID, 'large' );
			echo '<img src="'.$image_src2[0].'"  class="img-responsive" />';
		}
	}
	?>
    	
    	        
    </section>
