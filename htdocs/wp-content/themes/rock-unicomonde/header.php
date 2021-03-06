<?php
///
/* HEADER Bodyrock */
/* 23-02-2014
//
//
session_start();

$_SESSION['ajax-widgets']="";

$_SESSION['br_lastviews'] = br_modules_lastviewsSet();
$options = get_option('brthemeoptions', themeoptionsGet_default());
$meta_og_image = false;
if ( get_post_format() == 'video' ) {	
	$image = br_getPostThumbnail('medium',false);
	
	$meta_og_image = '<meta property="og:image" content="'.$image['src'].'" />'."\n";
}

/* Html Start */
session_start();
echo '<!DOCTYPE html>'."\n";
echo '<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" '; language_attributes(); echo '> <![endif]--> ';
echo '<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" '; language_attributes(); echo '> <![endif]--> ';
echo '<!--[if IE 8]>    <html class="no-js lt-ie9" '; language_attributes(); echo '> <![endif]-->'."\n";
echo '<!--[if gt IE 8]><!-->'."\n";
echo '<html class="no-js" '; language_attributes(); echo '>'."\n";
echo '<!--<![endif]-->';
echo a('head');
	echo "\t".'<meta charset="'.get_bloginfo( 'charset' ).'">'."\n";
	echo "\t".'<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">'."\n";
	
	if(BR_NORESPONSIVE==false) {
		echo "\t".'<meta name="viewport" content="width=device-width, initial-scale=1.0">'."\n";
	}
	
	echo "\t".'<title>';
	wp_title('|', true, 'right');
	echo '</title>'."\n";
	
	echo "\t".'<meta name="author" content="Gilles Hoarau">'."\n";
	echo "\r";
	wp_head();
	
	echo "\t".'<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->';
	echo "\t".'<!--[if lt IE 9]>';
	echo "\t".'<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>';
	echo "\t".'<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>';
	echo "\t".'<![endif]-->'."\n";
	echo "\r";
	echo "\t".'<link rel="shortcut icon" href="'.get_stylesheet_directory_uri().'/img/ico/favicon.ico">'."\n";
	echo "\t".'<link rel="apple-touch-icon-precomposed" sizes="144x114" href="'.get_stylesheet_directory_uri().'/img/ico/apple-touch-icon-144-precomposed.png">'."\n";
	echo "\t".'<link rel="apple-touch-icon-precomposed" sizes="114x114" href="'.get_stylesheet_directory_uri().'/img/ico/apple-touch-icon-114-precomposed.png">'."\n";
	echo "\t".'<link rel="apple-touch-icon-precomposed" sizes="72x72" href="'.get_stylesheet_directory_uri().'/img/ico/apple-touch-icon-72-precomposed.png">'."\n";
	echo "\t".'<link rel="apple-touch-icon-precomposed" sizes="57x57" href="'.get_stylesheet_directory_uri().'/img/ico/apple-touch-icon-57-precomposed.png">'."\n";
	echo "\r";
	
	$ch = curl_init('http://api.bitly.com/v3/shorten?login=unicolored&apiKey=R_8de9dc884a5f6e6ba8831909df65d03c&longUrl='.get_permalink());
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	 
	$result = curl_exec($ch);
	$R = json_decode($result);
	echo '<link rel="shortlink" href="'.$R->data->url.'" />';
echo a('/head');
echo "\r";
echo '<body data-spy="scroll" data-target=".subnav" data-offset="50" '; body_class(); echo '>'."\n";
    
	echo a('div.loader').z('div');
	echo a('div.scripts_body').z('div');
	echo '<a href="#content" class="sr-only">Skip to content</a>'."\n";
	echo '<div class="container"><div class="galaxie"><div class="col-xs-12"><noscript><div class="alert alert-warning">'.br_getIcon('warning').' Activer Javascript dans votre navigateur pour profiter de toutes les fonctionnalités du site.</div></noscript></div></div></div>'."\n";
		
	echo "\r";
	$options=get_option('brthemeoptions', themeoptionsGet_default());
	
	echo a('div.'.($options['layout_width']==1 ? 'fluidwidth' : 'container'));
	?>
	<header class="header">
		<h1><a href="http://unicolored.com/"><img src="/wp-content/themes/rock-unicomonde/img/unicolored.png"></a></h1>
		<?php
	//echo a('header.header');
		get_template_part(TPL_BOOTSTRAP_PATH.'navbars');
	//echo z('/header');
	?>
	</header>
	
		<?php get_template_part(TPL_BOOTSTRAP_PATH.'navbars','fixed'); ?>
	
	
	

	
	
