<?php
// Si le visiteur a vu un post avant d'arriver sur cette page,
// je récupère par SESSIONS via single.php, les tags et les catégories de ce post pour faire des recommandations ici-même.
// $_SESSION['lastpost_id'] contient l'id, il ne reste plus qu'à récupérer la catégorie du post et/ou ses tags pour les injecter dans le widget

get_header();

/* HTML Start */

echo a('section.content.categorie');
echo a('section.main');

echo '<h1>Erreur 404 - Page introuvable</h1>';

echo z('section');
echo z('section');

get_footer();
?>