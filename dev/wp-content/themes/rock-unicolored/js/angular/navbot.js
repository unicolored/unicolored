/*
##         ## ##      ##    ##    ###    ##     ## ########   #######  ########
##         ## ##      ###   ##   ## ##   ##     ## ##     ## ##     ##    ##
##       #########    ####  ##  ##   ##  ##     ## ##     ## ##     ##    ##
##         ## ##      ## ## ## ##     ## ##     ## ########  ##     ##    ##
##       #########    ##  #### #########  ##   ##  ##     ## ##     ##    ##
##         ## ##      ##   ### ##     ##   ## ##   ##     ## ##     ##    ##
########   ## ##      ##    ## ##     ##    ###    ########   #######     ##
*/
//
totoro.directive( 'navBot', [ '$rootScope', function( $rootScope ) {
    return {
        restrict: "A",
        templateUrl: "/wp-content/themes/rock-gilleshoarau/js/navbot/navbot.html",
        controller: "NavbotCtrl",
        link: function( scope, element, attrs ) {
            scope = $rootScope;
        }
    };
} ] );
totoro.controller( 'NavbotCtrl', [ '$scope', '$rootScope', 'localStorageService', 'ApplicationsService', '$document', '$window', 'ConsoleService', '$interval',
    function( $scope, $rootScope, localStorageService, ApplicationsService, $document, $window, ConsoleService, $interval ) {
        $( "li.launcher img.logo" ).load( function() {
            $( 'li.launcher a img' ).fadeIn();
        } );
        this.isHidden = false;
        $scope.appList = $rootScope.appList;
        $scope.loadApp = function( app ) {
            // On ferme le launcher au lancement d'une application
            var alltooltips = $( '.bigtooltip' );
            alltooltips.removeClass( 'opened' );
            //$rootScope.appList[ appIndex ].position = $( '.taskbar li' ).length;
            // Ouverture de l'application via la directive modalApp dans modal.js
            var modalApp = $( '#' + app );
            if ( modalApp.length > 0 ) {
                modalApp.modal( 'show' );
                console.info( 'Affichée' );
            } else {
                // Récupération des paramètres de l'application via l'appList
                var appIndex = findWithAttr( $rootScope.appList, 'name', app );
                // Modifications de l'appList en fonction de l'application ouverte
                $rootScope.appList[ appIndex ].open = true;
                $rootScope.jLoad( app );
                // SAUVEGARDE DE LA LISTE DES APPLICATIONS EN LOCAL
                // L'intérêt est d'avoir l'état 'open' de l'application même si la page est rechargée
                localStorageService.set( 'appList', $rootScope.appList );
            }
            $scope.openClose( 'launcher', true );
            return false;
        }
        $scope.exitApp = function( app ) {
            var appIndex = findWithAttr( $rootScope.appList, 'name', app );
            $rootScope.appList[ appIndex ].open = false;
            //$rootScope.appList[ appIndex ].position = $( '.taskbar li' ).length;
            localStorageService.set( 'appList', $rootScope.appList );
            return false;
        }
        $scope.isOpen = function( app ) {
            // Fonction qui vérifie si l'application a la propriété (open: true) dans l'appList
            return app.open === true;
        };
        $( document ).on( 'click', function( event ) {
            if ( !$( event.target ).closest( '.bigtooltip' ).length && !$( event.target ).closest( '#navbarbot' ).length ) {
                var alltooltips = $( '.bigtooltip' );
                alltooltips.removeClass( 'opened', true );
            }
        } );
        /*
        db                 .d88b.  d8888b. d88888b d8b   db  .o88b. db       .d88b.  .d8888. d88888b
        88       db db    .8P  Y8. 88  `8D 88'     888o  88 d8P  Y8 88      .8P  Y8. 88'  YP 88'
        88      C88888D   88    88 88oodD' 88ooooo 88V8o 88 8P      88      88    88 `8bo.   88ooooo
        88       88 88    88    88 88~~~   88~~~~~ 88 V8o88 8b      88      88    88   `Y8b. 88~~~~~
        88booo. C88888D   `8b  d8' 88      88.     88  V888 Y8b  d8 88booo. `8b  d8' db   8D 88.
        Y88888P  YP YP     `Y88P'  88      Y88888P VP   V8P  `Y88P' Y88888P  `Y88P'  `8888Y' Y88888P
        */
        $scope.openClose = function( openClass, forceClose ) {
            console.log( 'hey' );
            if ( jQuery( "#contactForm input:focus" ).length === 0 && jQuery( "#contactForm textarea:focus" ).length === 0 && jQuery( "input#consolezone" ).length === 0 ) {
                var alltooltips = $( '.bigtooltip' );
                //alltooltips.removeClass( 'opened' );
                var bigtooltip = $( '.' + openClass + 'menu' );
                if ( forceClose === true ) {
                    alltooltips.removeClass( 'opened' );
                } else if ( bigtooltip.hasClass( 'opened' ) ) {
                    alltooltips.removeClass( 'opened' );
                } else {
                    alltooltips.removeClass( 'opened' );
                    $( '.' + openClass + 'menu' ).addClass( 'opened' );
                }
                //console.log( 'hey' );
                //event.stopPropagation();
                return false;
            } else return false;
        };
        /***************************************************************************/
        /*
        db                d8888b.  .d8b.   .o88b.       .o88b. db       .d8b.  db    db d888888b d88888b d8888b.
        88       db db    88  `8D d8' `8b d8P  Y8      d8P  Y8 88      d8' `8b 88    88   `88'   88'     88  `8D
        88      C88888D   88oobY' 88ooo88 8P           8P      88      88ooo88 Y8    8P    88    88ooooo 88oobY'
        88       88 88    88`8b   88~~~88 8b           8b      88      88~~~88 `8b  d8'    88    88~~~~~ 88`8b
        88booo. C88888D   88 `88. 88   88 Y8b  d8 db   Y8b  d8 88booo. 88   88  `8bd8'    .88.   88.     88 `88.
        Y88888P  YP YP    88   YD YP   YP  `Y88P' VP    `Y88P' Y88888P YP   YP    YP    Y888888P Y88888P 88   YD
        */
        /***************************************************************************/
        // RACCOURCIS CLAVIERS
        /*//////////// Bind G to open */
        $scope.kdbLauncher = function( event ) {
            console.info( "Ca marche !" );
        }
        if ( $( "#contactForm input:focus" ).length === 0 || $( "#contactForm textarea:focus" ).length === 0 || $( "#searchform input:focus" ).length === 0 ) {
            $( document ).keyup( function( e ) {
                if ( e.which == 71 ) {
                    isCtrl = false;
                    $scope.openClose( 'launcher' );
                    return false;
                }
            } );
            /*//////////// Bind G to open */
            $( document ).keyup( function( e ) {
                if ( e.which == 72 ) {
                    isCtrl = false;
                    $scope.openClose( 'horloge' );
                    return false;
                }
            } );
            /*//////////// Bind G + H to back home */
            /*
            var isCtrl = false;
            $( document ).keyup( function( e ) {
                if ( e.which == 71 ) isCtrl = false;
            } ).keydown( function( e ) {
                if ( e.which == 71 ) isCtrl = true;
                // Je désactive le raccourci clavier lorsque les champs de formulaires de la page contact sont :focus
                if ( e.which == 72 && isCtrl === true ) {
                    window.location.href = "/";
                    return false;
                }
            } );*/
        }
        /*
        db                db    db d8b   db d888888b d8b   db .d8888. d888888b  .d8b.  db      db
        88       db db    88    88 888o  88   `88'   888o  88 88'  YP `~~88~~' d8' `8b 88      88
        88      C88888D   88    88 88V8o 88    88    88V8o 88 `8bo.      88    88ooo88 88      88
        88       88 88    88    88 88 V8o88    88    88 V8o88   `Y8b.    88    88~~~88 88      88
        88booo. C88888D   88b  d88 88  V888   .88.   88  V888 db   8D    88    88   88 88booo. 88booo.
        Y88888P  YP YP    ~Y8888P' VP   V8P Y888888P VP   V8P `8888Y'    YP    YP   YP Y88888P Y88888P
        */
        $scope.unInstall = function() {
            jQuery( '.modal' ).each( function() {
                jQuery( this ).fadeOut( 500 ).delay( 1000 ).parent().fadeOut( 1000 );
            } );
            jQuery( 'h1' ).each( function() {
                jQuery( this ).fadeOut( 500 ).delay( 1000 ).parent().fadeOut( 1000 );
            } );
            jQuery( '.carousel' ).each( function() {
                jQuery( this ).fadeOut( 2000 );
            } );
            jQuery( 'p' ).each( function() {
                jQuery( this ).fadeOut( 2000 );
            } );
            jQuery( 'ul' ).each( function() {
                jQuery( this ).fadeOut( 2000 );
            } );
            jQuery( 'section' ).each( function() {
                jQuery( this ).fadeOut( 5000 );
            } );
            jQuery( '#navbartop' ).each( function() {
                jQuery( this ).fadeOut( 5000 );
            } );
            jQuery( '#navbarbot' ).each( function() {
                jQuery( this ).fadeOut( 7000 );
                jQuery( 'body' ).delay( 1000 ).css( {
                    'background-image': 'none'
                } );
                jQuery( 'body' ).animate( {
                    backgroundColor: "#131d22",
                    color: '#d0d2d3',
                    padding: '0px',
                    'padding-bottom': '0px'
                }, ConsoleService.consoleStart() );
            } );
            return false;
        };
                } ] );
/*
##         ## ##      ########  #### ########  ########  ######  ######## #### ##     ## ########  ######
##         ## ##      ##     ##  ##  ##     ## ##       ##    ##    ##     ##  ##     ## ##       ##    ##
##       #########    ##     ##  ##  ##     ## ##       ##          ##     ##  ##     ## ##       ##
##         ## ##      ##     ##  ##  ########  ######   ##          ##     ##  ##     ## ######    ######
##       #########    ##     ##  ##  ##   ##   ##       ##          ##     ##   ##   ##  ##             ##
##         ## ##      ##     ##  ##  ##    ##  ##       ##    ##    ##     ##    ## ##   ##       ##    ##
########   ## ##      ########  #### ##     ## ########  ######     ##    ####    ###    ########  ######
*/
/*
db                db       .d8b.  db    db d8b   db  .o88b. db   db d88888b d8888b.   d8888b. d888888b d8b   db
88       db db    88      d8' `8b 88    88 888o  88 d8P  Y8 88   88 88'     88  `8D   88  `8D `~~88~~' 888o  88
88      C88888D   88      88ooo88 88    88 88V8o 88 8P      88ooo88 88ooooo 88oobY'   88oooY'    88    88V8o 88
88       88 88    88      88~~~88 88    88 88 V8o88 8b      88~~~88 88~~~~~ 88`8b     88~~~b.    88    88 V8o88
88booo. C88888D   88booo. 88   88 88b  d88 88  V888 Y8b  d8 88   88 88.     88 `88.   88   8D    88    88  V888
Y88888P  YP YP    Y88888P YP   YP ~Y8888P' VP   V8P  `Y88P' YP   YP Y88888P 88   YD   Y8888P'    YP    VP   V8P
//////////// LAUNCHER BUTTON : effet parallax
*/
// Le menu qui apparaît au clic sur le menu GH
totoro.directive( 'menuLauncher', function( $animate ) {
    return {
        restrict: "A",
        templateUrl: "/wp-content/themes/rock-gilleshoarau/js/navbot/menu-launcher.html",
        link: function( scope, element, attrs ) {
            $( '.dropdown-toggle' ).dropdown();
            scope.version = version;
            var gravatar = $( '<img class="img-circle img-responsive" style="margin:0 auto;" src="https://www.gilleshoarau.com/img/ico/gravatar.' + version + '.jpg" alt="Gilles Hoarau" />' );
            $( '#theLauncherMenu blockquote' ).prepend( gravatar );
        }
    };
} );
// Bouton de retour en haut de page #gotop
totoro.directive( 'goTop', function() {
    return {
        restrict: "A",
        template: '<span class="icon-upload"></span>',
        link: function( scope, element, attrs ) {
            $.localScroll( {
                filter: '#gotop',
                duration: 500,
                axis: 'y',
                easeing: 'easeOutCirc'
            } );
            skrollr.init( {
                smoothScrolling: false,
                forceHeight: false
            } );
        }
    }
} );
// Le menu qui apparaît au clic sur Paramètres(cog)
totoro.directive( 'menuParametres', [ 'localStorageService', '$rootScope', function( localStorageService, $rootScope ) {
    return {
        restrict: "A",
        templateUrl: "/wp-content/themes/rock-gilleshoarau/js/navbot/menu-parametres.html",
        link: function( scope, element, attrs ) {
            // Temps de génération de la page
            var theGenerated = typeof generated != 'undefined' ? generated : 0;
            scope.generated = theGenerated;
            scope.connexion = function( generated ) {
                // Renvoie la couleur de la connexion basée sur le temps de génération
                if ( generated < 500 ) {
                    return 'text-success'; // vert
                } else if ( generated < 1000 ) {
                    return 'text-warning'; // orange
                } else {
                    return 'text-danger'; // rouge
                }
            };
            $rootScope.connexionClass = scope.connexion( theGenerated );
            // La version de GillesHoarau.com
            scope.version = localStorageService.get( 'version' );
            // Affichage des dimensions du viewport
            scope.windowWidth = localStorageService.get( 'windowWidth' );
            scope.windowHeight = localStorageService.get( 'windowHeight' );
        }
    };
} ] );
// Le menu qui apparaît au clic sur l'icône Langue(globe)
totoro.directive( 'menuLangues', function() {
    return {
        restrict: "A",
        templateUrl: "/wp-content/themes/rock-gilleshoarau/js/navbot/menu-langues.html",
        link: function( scope, element, attrs ) {
            scope.language = navigator.language;
            scope.appCodeName = navigator.appCodeName;
            scope.appName = navigator.appName;
            scope.platform = navigator.platform;
        }
    };
} );
/*
db                db   db  .d88b.  d8888b. db       .d88b.   d888b  d88888b
88       db db    88   88 .8P  Y8. 88  `8D 88      .8P  Y8. 88' Y8b 88'
88      C88888D   88ooo88 88    88 88oobY' 88      88    88 88      88ooooo
88       88 88    88~~~88 88    88 88`8b   88      88    88 88  ooo 88~~~~~
88booo. C88888D   88   88 `8b  d8' 88 `88. 88booo. `8b  d8' 88. ~8~ 88.
Y88888P  YP YP    YP   YP  `Y88P'  88   YD Y88888P  `Y88P'   Y888P  Y88888P
*/
// Horloge
totoro.directive( 'horloge', [ '$interval', 'dateFilter', function( $interval, dateFilter ) {
    function link( scope, element, attrs ) {
        var timeoutId;

        function updateTime() {
            element.find( 'span.padd' ).html( '<time id="date_heure">' + dateFilter( new Date(), 'HH:mm:ss' ) + '</time>' );
        }
        element.on( '$destroy', function() {
            $interval.cancel( timeoutId );
        } );
        timeoutId = $interval( function() {
            updateTime(); // update DOM
        }, 1000 );
    }
    return {
        link: link
    }
} ] );
// Le menu qui apparaît au clic sur l'horloge(H:i:s)
totoro.directive( 'menuHorloge', function() {
    return {
        restrict: "A",
        templateUrl: "/wp-content/themes/rock-gilleshoarau/js/navbot/menu-horloge.html",
        link: function( scope, element, attrs ) {
            function dateseule() {
                // Création de la date
                date = new Date();
                annee = date.getFullYear();
                moi = date.getMonth();
                mois = new Array( 'Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre' );
                j = date.getDate();
                jour = date.getDay();
                jours = new Array( 'Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi' );
                return jours[ jour ] + ' ' + j + ' ' + mois[ moi ] + ' ' + annee;
            }
            scope.date = dateseule();
            element.find( '.horlogemenu' ).prepend( $( '<div class="agenda">' ).datepicker() );
            $( '.agenda' ).datepicker( "option", "showWeek", true );
            $( '.agenda' ).datepicker( "option", "firstDay", 1 );
            //datepicker.setDefaults( datepicker.regional[ 'fr' ] );
            $( '.agenda' ).datepicker( "option", $.datepicker.regional[ "fr" ] );
        }
    };
} );
