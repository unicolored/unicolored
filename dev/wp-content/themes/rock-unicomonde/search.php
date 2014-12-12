<?php
// Si le visiteur a vu un post avant d'arriver sur cette page,
// je récupère par SESSIONS via single.php, les tags et les catégories de ce post pour faire des recommandations ici-même.
/*TOFIX : Translate this page*/

get_header();


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
	'filtres_categories_'.$cat => 'on',
	'filtres_off' => 'on',
	'ajax' => false
	);

if (get_query_var('paged') > 1) {
    $instance_articles_recents['titre'] = "Médiathèque";
}

/************** HTML START **************/

echo a('section.content.search');
echo a('section.main');
echo a('div.galaxie');
// TITRE DE LA PAGE
if ( is_search() || is_tag() ) {
	if ( is_search() ) {
	echo ' <h1>Résultats de recherche pour <span class="red"><em>'.get_query_var('s').'</em></span></h1>';
	}
	elseif ( is_tag() ) {
	echo ' <h1>Trouver <span class="red"><em>'.get_query_var('tag').'</em></span></h1>';
	}
	get_search_form();
}
echo z('div');
the_widget('br_widgetsBodyloop', $instance_articles_recents, false);

echo z('section');
//get_template_part('tpl/sidebars/sidebar', 'left');
echo z('section');

get_footer();


?>