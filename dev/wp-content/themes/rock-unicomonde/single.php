<?php
get_header();

if (get_post_format()=='video') {
	// Spécifique aux formats video
	global $urlfinale, $videoType, $videoCode;
	
	$videoCode = get_post_meta(get_the_ID(), 'videoCode', true);
	$videoType = get_post_meta(get_the_ID(), 'videoType', true);
	
	$urlfinale = CDN_PATH.'images/videos/'.$videoType.'/'.$videoCode.br_getImgVideoSize('thumbnail').'.jpg';
}
/************** HTML START **************/

echo a('section.content.single');
	echo a('section.main');

			
		the_post();
		setPostViews(get_the_ID());
		$custom = get_post_custom(get_the_ID());
		
		echo a('article.mainsingle','#post-'.get_the_ID());
			echo a('header.art-header');
				echo '<h1>'.strip_tags(get_the_title()).'</h1>';
				$instance_footer['contenu_footer_masquer']='on';
				$instance_footer['contenu_footer_separateur']=" | ";
				$instance_footer['contenu_footer_date']=true;
				$instance_footer['contenu_footer_auteur']=true;
				$instance_footer['contenu_footer_vues']=false;
				echo a('div.col-d.hidden');
					echo Get_artfooter($instance_footer);
				echo z('div');
		
				// LIENS DE PARTAGE
				echo a('div.col-ff');
				get_template_part('tpl/parts/article', 'share');
				echo z('div');
				
				echo '<hr class="clearfix">';
		
			echo z('/header');
			
			// Chargement de la vignette de l'article
			if(get_post_format()=='image' OR  get_post_format()=='link') {
				$taille = 'large';
			}
			else {
				$taille = 'bigmedium';
			}
			echo '<section class="art-vignette">';
			echo br_getPostThumbnail($taille,true);
			echo '</section>';
		
		
			// Affichage du contenu générique
			echo a('section.art-content');		
				the_content(false,1);
			echo z('section');
			
			// Chargement de la spécificité du format d'article
			get_template_part(TPL_SINGULAR_PATH.'single', get_post_format());
			
			if(get_post_format()!='image' && get_post_format()!='link') {
			?>
		
			<div class="col-ff">
				<?php
				/*MODULE:: Affichage des attachments */
				$args = array(
				'post_type' => 'attachment',
				'numberposts' => -1,
				//'post__not_in' => array(get_post_thumbnail_id( get_the_ID() )),
				'post_status' => null,
				'post_parent' => $post->ID,
				'orderby'     => 'menu_order',
				'order'       => 'ASC'
				);
				
				$attachments = get_posts( $args );
				$nb_att=count($attachments);
				
				if ( $attachments ) {
					$post_attachment_infoshow = isset($custom["post_attachment_infoshow"][0]) ? $custom["post_attachment_infoshow"][0] : false;
					?>
					<section class="art-attachments">
						<?php
						foreach ( $attachments as $attachment ) {
							$image_src=wp_get_attachment_image_src( $attachment->ID, 'large' );
		
							echo '<section class="art-vignette">';
							echo '<img class="img-responsive" src="'.$image_src[0].'" alt="'.trim(strip_tags( $attachment->post_title )).'">';
							echo '</section>';							
							if($post_attachment_infoshow == 1) {
								echo '<header class="art-header">';
								echo '<h1>'.$attachment->post_title.' <small>'.$attachment->post_excerpt.'</small></h1>';
								echo '<p>'.$attachment->post_content.'</p>';
								echo '</header>';
							}		
							echo '<hr class="margin">';		
						}
						?>
						<hr class="clearfix" />
					</section>
					<?php
				}
				?> 
			</div>	
		
			<?php	
			}
			echo a('section.art-content');
				// Affichage de l'EXTRAIT
				echo ''.$post->post_excerpt.'';
				echo '<hr class="clearfix">';
				
				// Affichage de la SOURCE VIA si existante
				$post_source_name = isset($custom["post_source_name"][0]) ? $custom["post_source_name"][0] : false;
				$post_source_url = isset($custom["post_source_url"][0]) ? $custom["post_source_url"][0] : false;
				if (isset($post_source_name) && $post_source_name!=false) {				
					echo '<p>[ Via ';
					echo $post_source_name != false && $post_source_url != false ? '<a href="'.$post_source_url.'">' : false;
					echo $post_source_name != false ? $post_source_name : false;
					echo $post_source_name != false && $post_source_url != false ? '</a>' : false;
					echo ' ]</p>';
				}
				
				echo '<hr class="margin">';
			echo z('section');
				
			echo a('section.art-share');
				echo '<a class="addthis_button_facebook_like" fb:like:layout="button_count" style="position:relative; top:-3px;"></a>';
				echo ' &nbsp; &nbsp; ';
				echo '<a class="addthis_button_google_plusone" g:plusone:size="medium" ></a>';
				get_template_part('tpl/parts/article', 'share');
			echo z('section');
		
		echo z('article');
		
		echo '<div class="galaxie hide" role="navigation">';
			previous_post_link( '%link', __( '<div class="btn-group col-f"><button type="button" class="btn btn-default">'.br_getIcon('chevron-left').'</button></div>', 'bodyrock' ) );
			next_post_link( '%link', __( '<div class="btn-group col-f"><button type="button" class="btn btn-default pull-right">'.br_getIcon('chevron-right').'</button></div>', 'bodyrock' ) );
		echo '</div>';

		?>			
		<hr class="clearfix">
		<section class="art-comments">
			<h2 class="h-int"><?php br_Icon('comment') ?> Donnez votre avis</h2>
			<?php comments_template( '', true ); ?>
		</section>		
		<hr class="clearfix">

	<?php	
	echo '</section>';

get_template_part(TPL_SIDEBAR_PATH.'sidebar','right');

echo '</section>';

echo '<hr class="clearfix">';
echo '<hr>';

echo a('section.content.recents');
	echo '<h2 class="h-int">Ne manquez pas les articles les plus récents</h2>';
	/*Articles récents*/
	$instance_recents = array(
	'titre' => "Articles récents",
	'titre_icone' => 'list',
	'name' => 'articlesrecents',
	'class' => 'wrap-recents',
	'filtres_off' => "false",
	'filtres_combien' => 16,
	'contenu_footer_masquer' => false,
	'contenu_footer_separateur'=>" ",
	'contenu_footer_categories'=>"on",
	'vignette_dimensions' => "medium",
	'vignette_background' => "on",
	'affichage_modele' => 'affichage_modele_thumbnail',
	'ajax' => false
	);
	the_widget('br_widgetsBodyloop',$instance_recents);
echo z('section');	
get_footer();
?>