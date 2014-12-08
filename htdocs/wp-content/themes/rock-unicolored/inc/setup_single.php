<?php
// Ajouter des scripts supplémentaires ci-dessous
//add_action('wp_enqueue_scripts', 'ScriptsSingle');
/*add_action('wp_enqueue_scripts', 'ScriptsEffetdeSurvol');*/

// CONSTRUCTION DE DONNEES
global $post_categories, $is_blog, $is_gif;

///////////// BOUCLE PRINCIPALE

//if (have_posts()) :
    //while (have_posts()) : the_post();
    //echo get_post_format();
        $is_gif = false;
        $is_blog = false;
        $post_categories = wp_get_post_categories(get_the_ID());
        if(in_array('562', $post_categories)) { $is_gif = true; }
        if(in_array('1', $post_categories)) { $is_blog = true; }
        //var_dump($is_blog);
  //  endwhile;
//endif;


///////////// Navigation post en post
global $OB_SINGLE_NAVIGATION_ABSOLUTE;
ob_start();
echo "
      <li class=\"singlenav singlenavleft\">";
      previous_post_link_plus( array(
'order_by' => 'post_title',
'order_2nd' => 'post_date',
'thumb' => 'medium',
'format' => '%link',
'tooltip' => 'Projet précédent',
'in_cats' => get_category_by_slug( 'portfolio-graphic-web-design-professionnel' )->term_id,
'num_results' => 1,
'link' => '<span class="icon-arrow-left"></span>'
) );
echo "</li>
      <li class=\"singlenav singlenavright\">";
      next_post_link_plus( array(
'order_by' => 'post_title',
'order_2nd' => 'post_date',
'thumb' => 'medium',
'format' => '%link',
'tooltip' => 'Projet suivant',
'in_cats' => get_category_by_slug( 'portfolio-graphic-web-design-professionnel' )->term_id,
'num_results' => 1,
'link' => '<span class="icon-arrow-right"></span>'
) );

echo "</li>
    ";

$OB_SINGLE_NAVIGATION_ABSOLUTE = ob_get_clean();

///////////// Liste des tags / Compétences
ob_start();
$t = wp_get_post_tags(get_the_ID());
foreach($t as $tag) {
    echo '<img src="/wp-content/themes/rock-gilleshoarau/img/competences/'.$tag->slug.'.png" alt="'.$tag->name.'"/> &nbsp; ';
}
$OB_SINGLE_ASIDE_TAGS = ob_get_clean();

///////////// Liste les images de l'article
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
