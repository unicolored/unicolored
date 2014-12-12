/*!
totoro */
var totoro = angular.module( 'totoro', [ 'LocalStorageModule', 'angularFileUpload' ] );
/*
// LocalStorageModule //https://github.com/grevory/angular-local-storage
An AngularJS module that gives you access to the browsers local storage with cookie fallback
*/
/*
// angularFileUpload // https://github.com/nervgh/angular-file-upload
Supports drag-n-drop upload, upload progress, validation filters and a file upload queue. It supports native HTML5 uploads, but degrades to a legacy iframe upload method for older browsers. Works with any server side platform which supports standard HTML form uploads.
When files are selected or dropped into the component, one or more filters are applied. Files which pass all filters are added to the queue. When file is added to the queue, for him is created instance of {FileItem} and uploader options are copied into this object. After, items in the queue (FileItems) are ready for uploading.
*/
// CONFIG
totoro.config( [ 'localStorageServiceProvider', function( localStorageServiceProvider ) {
    // setStorageType: (sessionStorage ou localStorage)
    localStorageServiceProvider.setPrefix( 'totoro' ).setStorageType( 'localStorage' ).setStorageCookie( 45, '/' ).setStorageCookieDomain( 'gilleshoarau.com' ).setNotify( true, true );
    // Easing jQuery par défaut pour toutes les animations
    $.easing.def = 'easeInOutQuart';
    // EVENEMENTS
    /*//////////// ANIMATION : navbar */
    $( '.navbar-collapse' ).on( 'show.bs.collapse', function() {
        $( ".navbar-collapse" ).css( 'min-height', $( window ).height() ).css( 'height', $( window ).height() ).fadeIn();
    } ).on( 'hide.bs.collapse', function() {
        $( ".navbar-collapse" ).fadeOut();
    } );
    jQuery( "section.resize" ).animate( {
        'min-height': jQuery( window ).height() - jQuery( '#navbartop' ).height()
    }, 1000 );
    $.localScroll( {
        filter: '.portfolmanz',
        duration: 250,
        offset: -120,
        axis: 'y',
        easing: 'easeOutQuint'
    } );
    $.localScroll( {
        filter: '#godown',
        duration: 1500,
        offset: -100,
        axis: 'y',
        easing: 'easeInOutQuint'
    } );
    $.localScroll( {
        filter: '#gofooter',
        duration: 1500,
        offset: 0,
        axis: 'y',
        easing: 'easeInOutQuint'
    } );
} ] );
/*
##         ## ##      ########  ##     ## ##    ##
##         ## ##      ##     ## ##     ## ###   ##
##       #########    ##     ## ##     ## ####  ##
##         ## ##      ########  ##     ## ## ## ##
##       #########    ##   ##   ##     ## ##  ####
##         ## ##      ##    ##  ##     ## ##   ###
########   ## ##      ##     ##  #######  ##    ##
*/
// RUN
totoro.run( function( $document, $window, localStorageService ) {
    // Enregistrement de la taille du viewport en local
    localStorageService.set( 'windowWidth', $document[ 0 ].body.clientWidth );
    localStorageService.set( 'windowHeight', $window.innerHeight );
    localStorageService.set( 'dateStart', new Date() );
    localStorageService.set( 'dateLastActivity', new Date() );
    localStorageService.set( 'idLastActivity', new Date() );
    var theVersion = typeof version != 'undefined' ? version : 0;
    localStorageService.set( 'version', theVersion );
    localStorageService.set( 'appName', 'GillesHoarau.com' );
    //localStorageService.set( 'taskBar', '{}' );
    localStorageService.set( 'appLang', 'fr' );
    // Détection du navigateur
    var isOpera = !!window.opera || navigator.userAgent.indexOf( ' OPR/' ) >= 0;
    // Opera 8.0+ (UA detection to detect Blink/v8-powered Opera)
    var isFirefox = typeof InstallTrigger !== 'undefined'; // Firefox 1.0+
    var isSafari = Object.prototype.toString.call( window.HTMLElement ).indexOf( 'Constructor' ) > 0;
    // At least Safari 3+: "[object HTMLElementConstructor]"
    var isChrome = !!window.chrome && !isOpera; // Chrome 1+
    var isIE = /*@cc_on!@*/ false || !!document.documentMode; // At least IE6
    if ( isIE === false ) {
        // Redimensionnement de la fenêtre
        $( window ).resize( function() {
            $( ".resize" ).animate( {
                'min-height': $window.innerHeight - $( '#navbartop' ).height()
            }, 1000 );
            $( ".resizeApp" ).animate( {
                'min-height': $window.innerHeight - 200 - $( '#navbartop' ).height()
            }, 1000 );
            $( ".collapse" ).hide().css( 'min-height', 0 );
        } );
        $( ".resize" ).animate( {
            'min-height': $window.innerHeight - $( '#navbartop' ).height()
        }, 1000 );
    }
} );
/*
##         ## ##       ######  ######## ########  ##     ## ####  ######  ########  ######
##         ## ##      ##    ## ##       ##     ## ##     ##  ##  ##    ## ##       ##    ##
##       #########    ##       ##       ##     ## ##     ##  ##  ##       ##       ##
##         ## ##       ######  ######   ########  ##     ##  ##  ##       ######    ######
##       #########          ## ##       ##   ##    ##   ##   ##  ##       ##             ##
##         ## ##      ##    ## ##       ##    ##    ## ##    ##  ##    ## ##       ##    ##
########   ## ##       ######  ######## ##     ##    ###    ####  ######  ########  ######
*/
totoro.factory( 'ApplicationsService', [ '$rootScope', 'localStorageService',
    function( $rootScope, localStorageService ) {
        $rootScope.appList = [ {
            name: 'chat',
            nicename: 'MiOo',
            icone: 'bubbles',
            active: false,
            position: 0,
            iframeurl: 'https://www.gilleshoarau.com/apps/MiOo/',
            slogan: 'Messagerie instantanée Oo'
            }, {
            name: 'drawing',
            nicename: 'Pixelle',
            icone: 'quill',
            active: false,
            position: 0,
            iframeurl: 'https://www.gilleshoarau.com/apps/Pixelle/',
            slogan: "L'application Dessin"
            }, {
            name: 'snake',
            nicename: 'Snake 3210',
            icone: 'road',
            active: false,
            position: 0,
            iframeurl: 'https://www.gilleshoarau.com/apps/Snake-3210/',
            slogan: 'Mangez des pommes'
            }, {
            name: 'terminal',
            nicename: 'Terminal',
            icone: 'console',
            active: false,
            position: 0,
            iframeurl: 'https://www.gilleshoarau.com/apps/Initial/',
            slogan: '<3'
            }, {
            name: 'mobile',
            nicename: 'Mobile',
            icone: 'mobile',
            active: false,
            position: 0,
            iframeurl: 'https://www.gilleshoarau.com/index.php',
            slogan: "320x480"
            } ];
        var appStorage = localStorageService.get( 'appList' + version );
        if ( typeof appStorage != null ) {
            angular.extend( $rootScope.appList, appStorage );
            //$rootScope.appList = appStorage;
        }
        localStorageService.set( 'appList' + version, $rootScope.appList );
    }
] );

function findWithAttr( array, attr, value ) {
    for ( var i = 0; i < array.length; i += 1 ) {
        if ( array[ i ][ attr ] === value ) {
            return i;
        }
    }
}
