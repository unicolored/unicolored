<?php
// Si le visiteur a vu un post avant d'arriver sur cette page,
// je récupère par SESSIONS via single.php, les tags et les catégories de ce post pour faire des recommandations ici-même.
// $_SESSION['lastpost_id'] contient l'id, il ne reste plus qu'à récupérer la catégorie du post et/ou ses tags pour les injecter dans le widget

get_header();

$cat = get_query_var('cat');
$active_categorie = get_category ($cat);
$titre_content = ucfirst(str_replace('<br>','',$active_categorie->name));

$instance_articles_recents = array(
	'titre' => 'Articles récents',
	'titre_icone' => 'bookmark',
	'affichage_modele' => 'affichage_modele_thumbnail',
	'edit_article_titre'=>'strip_tags',
	'class'=>'recommandations',
	'contenu_footer_masquer' => false,
	'contenu_footer_separateur'=>" ",
	'contenu_footer_categories'=>"on",
	'vignette_background' => "on",
	'vignette_dimensions' => "medium",
	'filtres_off' => false,
	'ajax' => false
	);

if (get_query_var('paged') > 1) {
    $instance_articles_recents['titre'] = "Médiathèque";
}

/* HTML Start */

echo a('section.content.index');
echo a('section.main');

if(is_category()) {
	echo a('header.page-header');
	echo '<h1>Articles de la catégorie '.$titre_content.'</h1>';
	echo z('header');
}
elseif (is_author()) {
	echo a('header.page-header');
	echo '<h1>Articles de '.get_the_author().'</h1>';
	echo z('header');
}
elseif (is_archive()) {
	echo a('header.page-header');
	if ( is_day() ) :
		printf( __( 'Daily Archives: %s', 'bodyrock' ), get_the_date() );

	elseif ( is_month() ) :
		printf( __( 'Monthly Archives: %s', 'bodyrock' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'bodyrock' ) ) );

	elseif ( is_year() ) :
		printf( __( 'Yearly Archives: %s', 'bodyrock' ), get_the_date( _x( 'Y', 'yearly archives date format', 'bodyrock' ) ) );

	else :
		_e( 'Archives', 'twentyfourteen' );

	endif;
	echo z('header');
}

//the_widget('br_widgetsBodyloop', $instance_articles_recents, false);

if ( have_posts() ) : 

			// Start the Loop.
			while ( have_posts() ) : the_post();

				 $instance = array(
				'affichage_modele' => 'affichage_modele_thumbnail',
				'edit_article_titre'=>'strip_tags',
				'class'=>'recommandations',
				'contenu_footer_masquer' => false,
				'contenu_footer_separateur'=>" ",
				'contenu_footer_categories'=>"on",
				'vignette_background' => "on",
				'vignette_dimensions' => "medium",
				'filtres_off' => 'on',
				'ajax' => false
				);
				echo a('article.article.affichage.mod-thumbnail', "#post-" . get_the_ID());

					echo a('div.thumbnail');
					
					if ($instance['vignette_masquer'] == false) {
					    echo Get_thumbnail($instance);
					}
					
					echo a('div.caption');
					
					if ($instance['contenu_header_masquer'] == false) {
					    echo a('header.art-header');
					    if($instance['edit_article_titre']!=false)  {
					        $titre = $instance['edit_article_titre'](get_the_title());
					    }
					        else $titre = get_the_title();
					    echo '<h1 itemprop="name"><a href="' . get_permalink() . '" itemprop="url">' . $titre . '</a></h1>';
					    echo z('header');
					}
					
					$br_excerpt = Get_excerpt($instance, a('section.art-content'), z('section'), $excerpt[$i]);
					if (isset($instance['contenu_excerpt']) && $instance['contenu_excerpt'] == 'on' && $br_excerpt != false) {
					    echo "<div itemprop='description'>" . $br_excerpt . "</div>";
					}
					
					echo Get_artfooter($instance);
					
					echo z('/div');
					echo '<hr class="clearfix">';
					echo z('/div');
				
				echo z('article');
								

			endwhile;
			// Previous/next page navigation.
			//twentyfourteen_paging_nav();

		else :
			// If no content, include the "No posts found" template.
			get_template_part( 'content', 'none' );

		endif;

echo z('section');
//get_template_part('tpl/sidebars/sidebar', 'left');
echo z('section');

get_footer();
?>