
<nav id="navbartop" class="navbar navbar-default navbar-fixed-top" role="navigation" data-start="background:rgba(16,31,39,.5);" data-200="background:rgba(16,31,39,.9);">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <!--
        <a class="navbar-brand brand-xs" href="/" itemscope itemtype="http://schema.org/Brand">
        <img itemprop="logo" src="https://gilleshoarau.com/img/logosvg_small.png" alt="GH" class="brand-xs img-responsive pull-left" width="50" height="44" />
        </a>
        -->
        <!--
        <a class="navbar-brand brand-sm text-center" href="/">
        <img itemprop="logo" class="inv" src="https://gilleshoarau.com/wp-content/themes/rock-gilleshoarau/tpl/logo_inv.svg" height="50" width="50" alt="GH"/>
        <img itempprop="logo" class="logo" src="https://gilleshoarau.com/wp-content/themes/rock-gilleshoarau/img/logo.svg" height="50" width="50" alt="GH"/>
        </a>-->
    </div>

    <div class="navbar-menu">
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="/"><span class="icon-home"></span></a></li>
                <li class="dropdown hide" itemscope itemtype="http://schema.org/Brand">
                    <a href="/" data-toggle="dropdown">
                        <!--<img itemprop="logo" src="https://gilleshoarau.com/img/logosvg_small.png" alt="GH" class="brand-xs hide img-responsive pull-left" width="50" height="44" />-->
                        <span class="icon-user"></span> <span itemprop="name">Gilles Hoarau</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="/a-propos/">Profil</a></li>
                        <li><a href="/autodidacte-freelance-entrepreneur/">CV &amp; Book</a></li>
                    </ul>
                </li>
            </ul>
            <?php
            ob_start();
            wp_nav_menu( array(
                'theme_location' => 'primary',
                'container'  => false,
                'menu_class' => 'nav navbar-nav navbar-right',
                'depth'=>2,
                'walker'=>new wp_bootstrap_navwalker()
            ));
            $MENU = ob_get_clean();
            $MENU = str_replace("http://gilleshoarau.com","",$MENU);
            $MENU = str_replace("https://gilleshoarau.com","",$MENU);
            $MENU = str_replace("http://www.gilleshoarau.com","",$MENU);
            $MENU = str_replace("https://www.gilleshoarau.com","",$MENU);
            echo $MENU;
            ?>
            <ul class="nav navbar-nav backtohome">
                <li><a href="/"><?php br_Icon('fast-backward') ?> Retour à l'accueil</a></li>
            </ul>
        </div>
    </div>
</nav>
