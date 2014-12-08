<nav id="navbarbot" class="navbar navbar-inverse navbar-fixed-bottom " role="navigation" data-ng-controller="NavbotCtrl">
  <noscript><div class="navbar-text">Activer Javascript pour bénéficier de fonctionnalités supplémentaires.</div></noscript>

  <ul class="nav navbar-nav">
    <li class="launcher"><a class="text-center" href="/" itemscope itemtype="http://schema.org/Brand">
      <img itemprop="logo" src="https://gilleshoarau.com/wp-content/themes/rock-gilleshoarau/img/ico/logo.svg" height="50" width="50" alt="GH"/></a></li>
  </ul>

  <ul class="nav navbar-nav taskbar">
    <li><a href="#" data-ng-click="jLoad('chat')"><span class="icon-comment-alt"></span> Chat</a></li>
    <li><a href="#" data-ng-click="jLoad('drawing')"><span class="icon-smiley"></span> Drawing</a></li>
    <li><a href="#" data-ng-click="jLoad('snake')"><span class="icon-road"></span> Snake</a></li>
  </ul>

  <div data-menu:launcher="menuLauncher"></div>
  <div data-menu:horloge="menuHorloge"></div>

  <ul class="nav navbar-nav navbar-right">
    <li class="horloge" data-horloge="Horloge">

    </li>
    <li data-start="opacity:0.1" data-1000="opacity:1">
      <a id="gotop" title="Retour en haut de la page" href="#top">
        <span class="icon-chevron-up"></span>
      </a>
    </li>

  </ul>
</nav>

<div data-modal:iframe="modalIframe"></div>
