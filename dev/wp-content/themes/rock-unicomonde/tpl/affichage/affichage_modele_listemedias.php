<?php
global $instance;
echo a('article.article.affichage.mod-listemedias', "#post-" . get_the_ID());

if ($instance['vignette_masquer'] == false) {
    //echo Get_thumbnail($instance);

    echo '<div class="col-ff">';

    /*MODULE:: Affichage des attachments */
    $args = array('post_type' => 'attachment', 'numberposts' => -1,
    //'post__not_in' => array(get_post_thumbnail_id( get_the_ID() )),
    'post_status' => null, 'post_parent' => $post -> ID, 'orderby' => 'date', 'order' => 'DESC');

    $attachments = get_posts($args);
    $nb_att = count($attachments);

    if ($attachments) {

        echo '<section class="art-attachments">';

        foreach ($attachments as $attachment) {
            //vardump($attachment);
            $image_src = wp_get_attachment_image_src($attachment -> ID, 'thumbnail');

            echo '<article class="article>';
            echo '<section class="art-vignette">';
            echo '<img class="img-responsive pull-left"" src="' . $image_src[0] . '" alt="' . trim(strip_tags($attachment -> post_title)) . '">';
            echo '</section';
            echo '</article>';
        }

        echo '<hr class="clearfix" /></section>';

    }

    echo '</div>';
}
echo '<hr class="clearfix" />';
echo a('div.media-body');

if ($instance['contenu_header_masquer'] == false) {
    echo a('header.art-header');
    echo '<h4 class="media-heading" itemprop="name"><a href="'.get_permalink().'">' . get_the_title() . '</a></h4>';
    echo z('header');
}

$br_excerpt = Get_excerpt($instance, a('section.art-content') . a('p'), z('p') . z('section'), $excerpt[$i]);
if ($instance['contenu_excerpt'] == 'on' && $br_excerpt != false) {
    echo $br_excerpt != false ? $br_excerpt : false;
}

echo Get_artfooter($instance);

echo z('/div');

echo z('article');
