<?php
if ( have_posts() ) :
    while ( have_posts() ) : the_post();
        get_template_part('tpl/article','search');
    endwhile;

else :
    echo 'Aucun contenu disponible sur cette page.';
endif;
?>
