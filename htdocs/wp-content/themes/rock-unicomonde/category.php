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
	'vignette_dimensions' => "thumbnail",
	'filtres_categories_'.$cat => 'on',
	'filtres_off' => 'on',
	'ajax' => false
	);

if (get_query_var('paged') > 1) {
    $instance_articles_recents['titre'] = "Médiathèque";
}

/* HTML Start */

echo a('section.content.categorie');
echo a('section.main');

echo '<h1>Articles de la catégorie '.$titre_content.'</h1>';

the_widget('br_widgetsBodyloop', $instance_articles_recents, false);

get_template_part('tpl/parts/navigation');

echo z('section');
//get_template_part('tpl/sidebars/sidebar', 'left');
echo z('section');

get_footer();
?>