<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="fr-FR" prefix="og: http://ogp.me/ns#"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="fr-FR" prefix="og: http://ogp.me/ns#"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="fr-FR" prefix="og: http://ogp.me/ns#"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="fr-FR" prefix="og: http://ogp.me/ns#" data-ng-app="unicolored" layout="column" md-theme="gilles">
<!--<![endif]-->
    <head prefix="gilles: https://www.unicolored.com/">
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"
        />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <title>
            <?php wp_title( '|', true, 'right'); ?>
        </title>
        <meta property="og:title" content="Gilles Hoarau" />
        <meta name="description" content="Directeur artistique. Paris Xème. Le conseil, la cr&#xe9;ation visuelle et la conception de sites Web &#xe0; votre disposition. Parlons de vos projets."
        />
        <meta property="og:description" content="Directeur artistique. Paris Xème. Le conseil, la cr&#xe9;ation visuelle et la conception de sites Web &#xe0; votre disposition. Parlons de vos projets."
        />
        <link rel="canonical" href="https://www.unicolored.com/" />
        <meta property="og:url" content="https://www.unicolored.com/" />
        <meta property="og:site_name" content="Gilles Hoarau" />
        <meta property="og:locale" content="fr_FR" />
        <meta property="og:type" content="gilles:website" />
        <meta property="og:updated_time" content="gilles:website" />
        <meta name="author" content="Gilles Hoarau" />
        <link rel="alternate" type="application/rss+xml" title="Gilles Hoarau &raquo; Flux du site unicolored.com"
        href="http://feeds.feedburner.com/unicolored" />
        <link rel="stylesheet" id="style-child-css" href="/wp-content/themes/rock-unicolored/style.<?php echo wp_get_theme()->Version ?>.css"
        type="text/css" media="all" />
        <link rel="shortlink" href="http://bit.ly/GillesH" />
        <link rel="image_src" href="/img/ico/gravatar.<?php echo wp_get_theme()->Version ?>.jpg" />
        <meta property="og:image" content="/img/ico/gravatar.<?php echo wp_get_theme()->Version ?>.jpg" />
        <link rel="shortcut icon" href="/img/ico/favicon.<?php echo wp_get_theme()->Version ?>.ico" />
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/img/ico/144.<?php echo wp_get_theme()->Version ?>.png"
        />
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries. All other JS at the end of file. -->
        <!-- [if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
      <div data-ng:controller="ToolbarController as toolbar">
        <md-toolbar>
          <h2 class="md-toolbar-tools">
            <a href="/#/" ng-show="toolbar.isHome()">
              <md-icon icon="/wp-content/themes/rock-unicolored/img/material-design-icons/navigation/svg/production/ic_menu_24px.svg" style="width: 24px; height: 24px;"></md-icon>
            </a>
            <a href="/#/" ng-show="!toolbar.isHome()">
              <md-icon icon="/wp-content/themes/rock-unicolored/img/material-design-icons/navigation/svg/production/ic_arrow_back_24px.svg" style="width: 24px; height: 24px;"></md-icon>
            </a>
            <span flex>unicolored</span>
            <a href="/#/" ng-show="toolbar.isHome()">
              <md-icon icon="/wp-content/themes/rock-unicolored/img/material-design-icons/content/svg/production/ic_filter_list_24px.svg" style="width: 24px; height: 24px;"></md-icon>
            </a>
            <a href="/#/" ng-show="toolbar.isArticle()">
              <md-icon icon="/wp-content/themes/rock-unicolored/img/material-design-icons/social/svg/production/ic_share_24px.svg" style="width: 24px; height: 24px;"></md-icon>
            </a>
          </h2>
        </md-toolbar>
      </div>
