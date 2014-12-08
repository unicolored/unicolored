<?php
$args = array(
	'post_type' => 'attachment',
	'numberposts' => -1,
	'post_status' => null,
	'post_parent' => $post->ID,
	'orderby'         => 'menu_order',
	'order'           => 'ASC'
);

$attachments = get_posts( $args );
$nb_att=count($attachments);

    if ( $attachments ) {
        $i=0;
        foreach ( $attachments as $attachment ) {
            $attachment_posttitle = trim(strip_tags( $attachment->post_title ));
            
            $image_src=wp_get_attachment_image_src( $attachment->ID, 'thumb' );
            $image_src2=wp_get_attachment_image_src( $attachment->ID, 'large' );
			
			$media[$i] = '<a href="'.$image_src2[0].'" data-lightbox="image-'.$i.'" title="'.$attachment_posttitle.'"><img src="'.$image_src[0].'" class="img-responsive" width="'.$image_src2[1].'" height="'.$image_src2[2].'" alt="'.$attachment_posttitle.'"></a>';
			$media[$i] = '<img data-slide-to="'.$i.'" src="'.$image_src[0].'" class="img-responsive" width="'.$image_src2[1].'" height="'.$image_src2[2].'" alt="'.$attachment_posttitle.'">';
			?>
            <!-- Image -->	
                
                    
                        <!--<a href="<?php echo $image_src2[0] ?>" data-lightbox="image-<?php echo $i ?>" title="<?php echo $attachment_posttitle; ?>"><img src="<?php echo $image_src[0] ?>" class="img-responsive" width="200" height="200"></a>-->
                   
                
            <?php
            $i++;
        }
    }
//$i = $i>4 ? 4 : $i;
?>
<!--
<div class="playerimg">
    <h3>Album <?php echo $nb_att; ?> image<?php echo $nb_att>1?'s':false?> | <a class="playDiaporama" href="#">Lancer le diaporama</a></h3>
</div>-->
<!--
<div class="gallery_attachments">
	<?php
		for($j=1;$j<($i/2)&&isset($media[$j]);$j++) {
			echo $media[$j];
		}
	?>
	<?php
		for($j=($i/2);$j>=($i/2)&&$j<=4&&isset($media[$j]);$j++) {
			echo $media[$j];
		}
	?>
 </div>-->
 
 <div id="carousel-thumbs" class="carousel_thumbs slide">
 	<div class="col-lg-1">
                      <a class="left carousel-control" href="#carousel-thumbs" data-slide="prev">
                        <span class="glyphicon glyphicon-arrow-left"></span>
                      </a>
	</div>
                    <div class="col-lg-10">
                      <!-- Wrapper for slides -->
                      <div class="carousel-inner">
                        <?php
							$nombretotaldimages = $i;
							$nombreparaffichage = 4;
							$nombreditems = $nombretotaldimages/$nombreparaffichage;
						
							$k=$i/4;
							$m=1;

                            for ( $l=0;$l<$nombreditems;$l++) {
								//echo $l;
                                ?>
                                <!-- Image -->															
                                <div class="item <?php echo $m===1 ? 'active' : false ?>"> 
                                    
									<?php
									$p=0;
										
										for($o=$l*$nombreparaffichage;$o<=3+($l*$nombreparaffichage);$o++) {
											echo '<div class="col-lg-3">'.$media[$o].'</div>';
										}
										$p++;
									?>
									</div>
                                <?php
                                $m++;
                            }
                        ?>
                      </div>
                    </div>
                      <!-- Controls -->


 	<div class="col-lg-1">
                      <a class="right carousel-control" href="#carousel-thumbs" data-slide="next">
                        <span class="glyphicon glyphicon-arrow-right"></span>
                      </a>
	</div>
                    </div>
                        <hr class="clearfix">