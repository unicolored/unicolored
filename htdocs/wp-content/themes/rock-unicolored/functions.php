<?php
// Définition d'une constante YESWEARE qui indique que le site est en développement
// Je m'en sers pour charger les scripts js originaux et non concaténés ni minifiés
// Après la tâche grunt production(aka release), il faut tester la concaténation des fichiers / sur la branche release
$local_settings = dirname(__FILE__) . '/dev/yesimlocal.php';
if (file_exists($local_settings)) {
  //include $local_settings;
  define("YESWEARE","dev");
}
else define("YESWEARE","");

// Démarrage du chronomètre
$microtime  = explode(' ', microtime());
global $started_at;
$started_at = (float)$microtime[0] + (float)$microtime[1];
/* FUNCTIONS.PHP - Configuration manuelle du thème */
// Liste des Constantes Bodyrock :
//THEME_PATH' , 'wp-content/themes/bodyrock/' ); // Liens absolus.
//BR_PATH, //ASSETS_PATH, //INC_PATH, //LESS_PATH, //JS_PATH, //BR_CSS_PATH
//TPL_PATH, //TPL_SIDEBAR_PATH, //TPL_BOOTSTRAP_PATH, //TPL_SINGULAR_PATH

// Liste des Options du thème :
//BR_ICON_SET // Id - Sélection du set d'icône parmis Glyphicon, Font-Awesome, Elusive, etc...
//BR_FONTS // String - Fonts chargées Sous la forme TOFIX : ajouter la forme de la chaine de caractere
//BR_COMPILELESS_ON // Boolean - Active la compilation .less en .css (utile si les .less ont été modifiés)
//BR_VIDEO_AUTOPLAY // Boolean - Active l'autoplay des vidéos sur les pages single
//BR_VIDEO_HEIGHT // Int - La hauteur de l'iframe contenant le lecteur vidéo
//BR_NORESPONSIVE // Boolean - Activation du "responsive"
//BR_AUDIO_HEIGHT // Int - La hauteur de l'iframe contenant le lecteur audio
//BR_ALL_BS_JS // Boolean - Chargement des scripts Bootstrap.min.js
//BR_IMAGE_SIZES // String - Tailles des images - sous la forme : nomdelataille,width,height; nomdelataille2,width2,height2; ...
/////////////////////////////////////////////////////

/*
##         ## ##      ##          ###    ##    ##  ######   ##     ## ########  ######
##         ## ##      ##         ## ##   ###   ## ##    ##  ##     ## ##       ##    ##
##       #########    ##        ##   ##  ####  ## ##        ##     ## ##       ##
##         ## ##      ##       ##     ## ## ## ## ##   #### ##     ## ######    ######
##       #########    ##       ######### ##  #### ##    ##  ##     ## ##             ##
##         ## ##      ##       ##     ## ##   ### ##    ##  ##     ## ##       ##    ##
########   ## ##      ######## ##     ## ##    ##  ######    #######  ########  ######
*/
// LANGUAGE - Charges les fichiers de langue
// Desactivé car défini dans style.css de ce thème (et non utilisé à l'heure actuelle)
// load_theme_textdomain('gh', get_stylesheet_directory() . '/languages');

/********************************************************/

/*
##         ## ##      #### ##     ##    ###     ######   ########  ######
##         ## ##       ##  ###   ###   ## ##   ##    ##  ##       ##    ##
##       #########     ##  #### ####  ##   ##  ##        ##       ##
##         ## ##       ##  ## ### ## ##     ## ##   #### ######    ######
##       #########     ##  ##     ## ######### ##    ##  ##             ##
##         ## ##       ##  ##     ## ##     ## ##    ##  ##       ##    ##
########   ## ##      #### ##     ## ##     ##  ######   ########  ######
*/
//////// AJOUT DE TAILLES POUR LES MEDIAS
// Ces tailles de vignettes sont entrées manuellement
// Ici je n'utilise pas (ecnore) l'option du thème BR_IMAGE_SIZES
add_image_size('vignette', 324, 224, true);
add_image_size('bg', 1366, 768, true);
// Filtres qui modifie le nom des images uploadées afin d'enlever les caractères interdits et les accents.
function sanitize_file_uploads( $file ){
  $file['name'] = sanitize_file_name($file['name']);
  $file['name'] = preg_replace("/[^a-zA-Z0-9\.\-]/", "", $file['name']);
  $file['name'] = strtolower($file['name']);
  add_filter('sanitize_file_name', 'remove_accents');

  return $file;
}
add_filter('wp_handle_upload_prefilter', 'sanitize_file_uploads');
// Force le recadrage d'image de cette dimension

/********************************************************/
/*
##         ## ##            ##  ######           ######   ######   ######
##         ## ##            ## ##    ##         ##    ## ##    ## ##    ##
##       #########          ## ##               ##       ##       ##
##         ## ##            ##  ######  ####### ##        ######   ######
##       #########    ##    ##       ##         ##             ##       ##
##         ## ##      ##    ## ##    ##         ##    ## ##    ## ##    ##
########   ## ##       ######   ######           ######   ######   ######
*/
//////// CHARGEMENT DES FEUILLES .CSS ET .JS
// PAR DEFAUT css/style.css SONT CHARGES PAR BODYROCK sur toutes les pages

add_action('wp_enqueue_scripts', YESWEARE=="dev" ? 'ScriptsLocaux' : 'ScriptsProd');
function ScriptsLocaux() {
    // SCRIPTS ET CSS EN DEVELOPPEMENT LOCAL
    // CSS
    //wp_enqueue_style('style-bootstrap', '/devassets/css/bootstrap.css', false, null, 'all');
    wp_enqueue_style('style-style', get_stylesheet_directory_uri().'/style.css', false, null, 'all');
    // JS
    wp_enqueue_script('myjquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js', false, null, true);
    wp_enqueue_script('bower_concat', get_stylesheet_directory_uri().'/dev/js/tmp/bower_concat.js', array('myjquery'), null, true);
    // Angular
    wp_enqueue_script('scriptsglobaux', get_stylesheet_directory_uri().'/dev/js/unicolored.js', false, null, true);
    /*
    <script src="/bower_components/angular/angular.js"></script>
    <script src="/bower_components/angular-aria/angular-aria.js"></script>
    <script src="/bower_components/angular-animate/angular-animate.js"></script>
    <script src="/bower_components/hammerjs/hammer.js"></script>
    <script src="/bower_components/angular-material/angular-material.js"></script>
    */
    wp_enqueue_script('unicolored', get_stylesheet_directory_uri().'/dev/js/unicolored.js', false, null, true);
}
function ScriptsProd() {
    // SCRIPTS EN PRODUCTION
    // CSS
    wp_enqueue_style('style-child', get_stylesheet_directory_uri() . '/style.'.wp_get_theme('rock-unicolored')->Version.'.css', false, null, 'all');
    // JS
    wp_enqueue_script('myjquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js', false, null, true);
    wp_enqueue_script('scriptsglobaux', "/js".$scriptsjs, array('myjquery'), null, true);
}

// Suppression des styles jetpack
// Ci-dessous, deux liens du plugin jetpack que j'ai desactivé.
//wp_enqueue_style('jetpack_css', 'https://www.unicolored.com/wp-content/plugins/jetpack/css/jetpack.css?ver=3.2.1');
//wp_enqueue_script('devicepx', 'http://s0.wp.com/wp-content/js/devicepx-jetpack.js?ver=201447');
add_filter( 'jetpack_implode_frontend_css', '__return_false' );
function removeJetpackStyle() {
  wp_deregister_style('jetpack_css');
}
function removeJetpackScripts() {
  wp_dequeue_script( 'devicepx' );
}
add_action('wp_print_styles', 'removeJetpackStyle',999);
add_action('wp_footer', 'removeJetpackScripts',0);
/********************************************************/

// AUTRES SCRIPTS qui peuvent être intéressants :
//wp_enqueue_script('fitvids', '//cdnjs.cloudflare.com/ajax/libs/fitvids/1.0.3/jquery.fitvids.min.js',false,'1.0.3',true);

// SCROLL
//wp_enqueue_script('smoothscroll', '/wp-content/themes/rock-unicolored/js/smoothscroll.js',false,'1.2.1',true);

// imagesLoaded - http://imagesloaded.desandro.com/
// Detect when images have been loaded.
//wp_enqueue_script('imagesloaded', '/wp-content/themes/rock-unicolored/js/imagesloaded.min.js',false,'3.1.4',true);

// backStretch - http://srobbin.com/jquery-plugins/backstretch/
// Add a dynamically-resized, slideshow-capable background image to any page or element
//wp_enqueue_script('backstretch', '//cdnjs.cloudflare.com/ajax/libs/jquery-backstretch/2.0.4/jquery.backstretch.min.js',false,'2.0.4',true);

/*
##         ## ##      ##        #######   ######   #### ##    ##    ########     ###     ######   ########
##         ## ##      ##       ##     ## ##    ##   ##  ###   ##    ##     ##   ## ##   ##    ##  ##
##       #########    ##       ##     ## ##         ##  ####  ##    ##     ##  ##   ##  ##        ##
##         ## ##      ##       ##     ## ##   ####  ##  ## ## ##    ########  ##     ## ##   #### ######
##       #########    ##       ##     ## ##    ##   ##  ##  ####    ##        ######### ##    ##  ##
##         ## ##      ##       ##     ## ##    ##   ##  ##   ###    ##        ##     ## ##    ##  ##
########   ## ##      ########  #######   ######   #### ##    ##    ##        ##     ##  ######   ########
*/
// CUSTOM LOGIN PAGE
function custom_login_css() {
  wp_enqueue_style('mystyles', '/css/styles-login.css', false, null, 'all');
  //echo '&lt;link rel="stylesheet" type="text/css" href="'.get_stylesheet_directory_uri().'/login/login-styles.css" /&gt;';
}
add_action('login_head', 'custom_login_css');


/********************************************************/
/*
##         ## ##      ##     ## ######## ##       ########  ######## ########   ######
##         ## ##      ##     ## ##       ##       ##     ## ##       ##     ## ##    ##
##       #########    ##     ## ##       ##       ##     ## ##       ##     ## ##
##         ## ##      ######### ######   ##       ########  ######   ########   ######
##       #########    ##     ## ##       ##       ##        ##       ##   ##         ##
##         ## ##      ##     ## ##       ##       ##        ##       ##    ##  ##    ##
########   ## ##      ##     ## ######## ######## ##        ######## ##     ##  ######
*/
// Fonction qui transforme les liens absolus en lien relatif
function relativeUrl($url) {
  $disallowed = array('http://unicolored.com', 'http://www.unicolored.com', 'https://unicolored.com', 'https://www.unicolored.com');
  foreach($disallowed as $d) {
    if(strpos($url, $d) === 0) {
      return str_replace($d, '', $url);
    }
  }
  return $url;
}
function br_getIcon($id = false) { // Rewrite de la fonction br_getIcon
      switch(BR_ICON_SET) {
            default :
                  return '<span class="icon-'.br_getPageIcon($id).'"></span>';
            break;
      }
}
/*
##         ## ##      ##      ##  #######   #######      ######   #######  ##     ## ##     ## ######## ########   ######  ########
##         ## ##      ##  ##  ## ##     ## ##     ##    ##    ## ##     ## ###   ### ###   ### ##       ##     ## ##    ## ##
##       #########    ##  ##  ## ##     ## ##     ##    ##       ##     ## #### #### #### #### ##       ##     ## ##       ##
##         ## ##      ##  ##  ## ##     ## ##     ##    ##       ##     ## ## ### ## ## ### ## ######   ########  ##       ######
##       #########    ##  ##  ## ##     ## ##     ##    ##       ##     ## ##     ## ##     ## ##       ##   ##   ##       ##
##         ## ##      ##  ##  ## ##     ## ##     ##    ##    ## ##     ## ##     ## ##     ## ##       ##    ##  ##    ## ##
########   ## ##       ###  ###   #######   #######      ######   #######  ##     ## ##     ## ######## ##     ##  ######  ########
*/
// WOO COMMERCE SUPPORT
// First unhook the WooCommerce wrappers;
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
// Then hook in your own functions to display the wrappers your theme requires;
add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);

function my_theme_wrapper_start() {
  echo '<div class="woowoo">';
}

function my_theme_wrapper_end() {
  echo '</div>';
}

add_theme_support( 'woocommerce' );
/*
##         ## ##      ##      ## ########          ##     ## ########    ###    ########
##         ## ##      ##  ##  ## ##     ##         ##     ## ##         ## ##   ##     ##
##       #########    ##  ##  ## ##     ##         ##     ## ##        ##   ##  ##     ##
##         ## ##      ##  ##  ## ########          ######### ######   ##     ## ##     ##
##       #########    ##  ##  ## ##                ##     ## ##       ######### ##     ##
##         ## ##      ##  ##  ## ##                ##     ## ##       ##     ## ##     ##
########   ## ##       ###  ###  ##        ####### ##     ## ######## ##     ## ########
*/
function gh_head() {
  ob_start();
  wp_head();
  $HEAD = ob_get_clean();
  $HEAD = str_replace("'stylesheet'", '"stylesheet"', $HEAD);
  $HEAD = str_replace("id='", 'id="', $HEAD);
  $HEAD = str_replace("'  href='", '" href="', $HEAD);
  $HEAD = str_replace("' type=", '" type=', $HEAD);
  $HEAD = str_replace("'all'", '"all"', $HEAD);
  $HEAD = str_replace("'text/css'", '"text/css"', $HEAD);
  $HEAD = str_replace("'text/javascript'", '"text/javascript"', $HEAD);
  $HEAD = str_replace("src='", 'src="', $HEAD);
  $HEAD = str_replace("'></script>", '"></script>', $HEAD);
  $HEAD = preg_replace("%(<script.*?>)(.*?)(<\/script.*?>)%is", "", $HEAD);
  $HEAD = preg_replace("%(<!--)(.*?)(. --?>)%is", '', $HEAD);
  $HEAD = preg_replace("%(Titres)(.*?)(. --?>)%is", '', $HEAD);
  echo $HEAD;
}
/*
##         ## ##      ##      ## ########          ########  #######   #######  ######## ######## ########
##         ## ##      ##  ##  ## ##     ##         ##       ##     ## ##     ##    ##    ##       ##     ##
##       #########    ##  ##  ## ##     ##         ##       ##     ## ##     ##    ##    ##       ##     ##
##         ## ##      ##  ##  ## ########          ######   ##     ## ##     ##    ##    ######   ########
##       #########    ##  ##  ## ##                ##       ##     ## ##     ##    ##    ##       ##   ##
##         ## ##      ##  ##  ## ##                ##       ##     ## ##     ##    ##    ##       ##    ##
########   ## ##       ###  ###  ##        ####### ##        #######   #######     ##    ######## ##     ##
*/
function gh_footer() {
  ob_start();
  wp_footer();
  $FOOTER = ob_get_clean();
  $FOOTER = str_replace("'text/javascript'", '"text/javascript"', $FOOTER);
  $FOOTER = str_replace("src='", 'src="', $FOOTER);
  $FOOTER = str_replace("'></script>", '"></script>', $FOOTER);
  $FOOTER = str_replace('<img alt=\'\' src="', "<img alt='' src='", $FOOTER);
  echo $FOOTER;
}

/********************************************************/
/*
##         ## ##       #######  ##     ## ######## ########  ##     ## ########    ##     ## ######## ##     ## ##
##         ## ##      ##     ## ##     ##    ##    ##     ## ##     ##    ##       ##     ##    ##    ###   ### ##
##       #########    ##     ## ##     ##    ##    ##     ## ##     ##    ##       ##     ##    ##    #### #### ##
##         ## ##      ##     ## ##     ##    ##    ########  ##     ##    ##       #########    ##    ## ### ## ##
##       #########    ##     ## ##     ##    ##    ##        ##     ##    ##       ##     ##    ##    ##     ## ##
##         ## ##      ##     ## ##     ##    ##    ##        ##     ##    ##       ##     ##    ##    ##     ## ##
########   ## ##       #######   #######     ##    ##         #######     ##       ##     ##    ##    ##     ## ########
*/
// Démarrage du buffer qui génère la sortie Html
function sanitize_output($buffer) {

    $search = array(
        '/\>[^\S ]+/s',  // strip whitespaces after tags, except space
        '/[^\S ]+\</s',  // strip whitespaces before tags, except space
        '/(\s)+/s'       // shorten multiple whitespace sequences
    );

    $replace = array(
        '>',
        '<',
        '\\1'
    );
    if(YESWEARE!='dev') {
      $buffer = preg_replace($search, $replace, $buffer);
    }

    return ltrim($buffer);
}

ob_start("sanitize_output");
?>
