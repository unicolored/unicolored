<?php
// Si le visiteur a vu un post avant d'arriver sur cette page,
// je récupère par SESSIONS via single.php, les tags et les catégories de ce post pour faire des recommandations ici-même.
/*TOFIX : Translate this page*/

br_ajaxWidgetInstance(isset($_GET['instance']) ? $_GET['instance'] : false);

get_header();

echo a('section.content.blog');
echo a('section.main');

if (get_query_var('paged') < 2) {
    //MODULE:: RECOMMANDATIONS basées sur les CATEGORIES
    if (isset($_SESSION['lastpost_cats']) && $_SESSION['lastpost_cats'] != false) {
        // QUERY
        $CAT = explode(',', $_SESSION['lastpost_cats']);

        $i = 0;
        foreach ($CAT as $IDCAT) {
            if ($IDCAT != false && $i <= 1) {
                $category = get_category($IDCAT);

                if ($i > 0) {
                    $ignore_posts = explode(',', $_SESSION['wposts_' . $category_name[$i - 1]]);
                    $ignore_posts[] = $_SESSION['lastpost_id'];
                }

                $category_name[$i] = 'recommandations_cats_' . $category -> slug;

                $instance_recommandations_categories = array('titre' => ucfirst($category -> name), 'titre_icone' => $category -> slug, 'name' => $category_name[$i], 'class' => 'recommandations', 'contenu_excerpt' => false, 'filtres_combien' => 6, 'contenu_footer_masquer' => "on", 'vignette_background' => 'on', 'affichage_modele' => 'affichage_modele_thumbnail', 'filtres_similaires_selon' => 'cats', 'filtres_categories_' . $IDCAT => true, );

                $instance_recommandations_categories['filtres_ignoreposts'] = serialize($ignore_posts);

                the_widget('br_widgetsBodyloop', $instance_recommandations_categories, $args_section);

                $i++;
                echo '<hr class="clearfix">';
            }
        }
    }
}

echo a('div.galaxie');

$instance_articles_recents = array('titre' => 'Articles récents', 'titre_icone' => 'bookmark', 'affichage_modele' => 'affichage_modele_thumbnail', 'contenu_header_masquer' => "on", 'contenu_footer_masquer' => "on", 'vignette_background' => false, 'filtres_off' => 'on', 'ajax' => false);

if (isset($_SESSION['lastpost_id']) && $_SESSION['lastpost_id'] != false) {
    $instance_articles_recents['ajax'] = "on";
}

$_SESSION['lastpost_id'] = false;

if (get_query_var('paged') > 1) {
    $instance_articles_recents['titre'] = "Médiathèque";
}

the_widget('br_widgetsBodyloop', $instance_articles_recents, false);

// Previous/next post navigation.
echo '<div class="col-ff visible-lg">';
echo '<a href="/communication/web/page/2/" class="btn btn-md btn-info btn-block">Suite ' . br_getIcon('chevron-right') . '</a>';
echo '</div>';

echo z('div');
?>
			
<div class="column">
	<h2>Que pouvez-vous faire sur <span class="red">unicomonde</span> ?</h2>
</div>
<div class="column1">
	<h5><span class="red">Trouver</span> l'inspiration</h5>
	<img src="/wp-content/themes/rock-unicomonde/img/quepouvezvousfaire_trouver.jpg" class="img-responsive">
	<p>Découvrez d'extraordinaires photos et vidéos de créateurs du monde entier. unicomonde répertorie des moments personnels, des projets créatifs, du travail professionnel et bien plus encore.</p>
	<a href="/?s=inspiration"><button class="btn btn-md btn-primary"><i class="fa fa-search"></i> Rechercher "inspiration"</button></a>
</div>
<!--<div class="column2">
	<h5><span class="red">Participer</span> aux discussions</h5>
	<img src="/wp-content/themes/rock-unicomonde/img/quepouvezvousfaire_participer.jpg" class="img-responsive">
	<p>Vous avez une question relatives au graphisme, à la photographie ou au développement Web ?<br>Vous avez besoin d'aide pour des projets Print ou Web ? Proposez vos sujets de discussions à nos visiteurs.</p>
	<a href="/communication/discussions/"><button class="btn btn-md btn-warning"><i class="fa fa-comments"></i> Liste des discussions</button></a>
</div>-->
<div class="column3">
	<h5><span class="red">Partager</span> selon vos envies</h5>
	<img src="/wp-content/themes/rock-unicomonde/img/quepouvezvousfaire_partager.jpg" class="img-responsive">
	<p>Parcourez nos galeries et partager en deux clics vos articles favoris sur les réseaux sociaux.<br><br><br><br></p>
</div>
<!--
<div class="column">
<p class="text-center"><a href="" data-toggle="modal" data-target="#myModal"><small>Je souhaite m'inscrire à la RedNews</small></a></p>
</div>
<hr class="margin2">
-->
<?php

get_template_part('tpl/parts/navigation');

echo z('section');

get_template_part('tpl/sidebars/sidebar', 'left');
echo z('section');

get_footer();
?>