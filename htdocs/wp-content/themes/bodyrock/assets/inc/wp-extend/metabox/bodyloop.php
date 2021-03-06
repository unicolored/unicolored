<?php
// BODYLOOP
// Metabox permettant de créer une loop personnalisée qui sera placée avant, après ou en remplacement de la loop page.

// Création de la metabox
function bodyloop_meta_box() {
    add_meta_box("bodyloop-meta", "Bodyloop", "bodyloop_meta_options", "page", "normal", "high");
}

// Affichage de la metabox
function bodyloop_meta_options() {
    global $post;
    global $wpdb;

    if (defined('AI1EC_POST_TYPE'))
        wp_nonce_field('ai1ec', AI1EC_POST_TYPE);

    $custom = get_post_custom($post -> ID);
    $post_views_count = isset($custom["post_views_count"][0]) ? $custom["post_views_count"][0] : false;

    echo 'Vous êtes sur un article "' . get_post_format() . '".';
    echo '<h4>Nombre de vues</h4>';
    echo '<input name="post_views_count" class="form-input" value="' . $post_views_count . '" size="16" type="text" />';

    $videoType = 'you';

    $custom = get_post_custom($post -> ID);

    include 'bodyloop_form_page.php';
}

// Sauvegarde des données
function save_blmetas($post) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    } else {

        foreach (getDefaultLoop() as $K => $V) {
            if(isset($_POST[$K])) {
              update_post_meta(get_the_ID(), $K, $_POST[$K]);
            }
        }

    }
}

function doFormInput($string, $instance = false, $options = false, $after = false) {// 'Afficher un titre,afficher_titre ?'
    // Création de formulaire en parallèle avec bodyloop.php, le widget
    include 'bodyloop_functions_page.php';
    return $form_item . $after;
}

function getOptions($which) {
    switch($which) {
        default :
            return array();
            break;
        case 'filtres_categories' :
            return get_categories();
            break;
    }
}

/* FIN DE LA METABOX */

/////////////////////////////////////////////////////////////////////////////////////////////////////////
