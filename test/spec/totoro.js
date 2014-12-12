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
    localStorageService.set( 'taskBar', '{}' );
    localStorageService.set( 'appLang', 'fr' );
    // Redimensionnement de la fenêtre
    $( window ).resize( function() {
        $( ".resize" ).animate( {
            'min-height': $window.innerHeight - $( '#navbartop' ).height()
        }, 1000 );
        $( ".collapse" ).hide().css( 'min-height', 0 );
    } );
    // Détection du navigateur
    var isOpera = !!window.opera || navigator.userAgent.indexOf( ' OPR/' ) >= 0;
    // Opera 8.0+ (UA detection to detect Blink/v8-powered Opera)
    var isFirefox = typeof InstallTrigger !== 'undefined'; // Firefox 1.0+
    var isSafari = Object.prototype.toString.call( window.HTMLElement ).indexOf( 'Constructor' ) > 0;
    // At least Safari 3+: "[object HTMLElementConstructor]"
    var isChrome = !!window.chrome && !isOpera; // Chrome 1+
    var isIE = /*@cc_on!@*/ false || !!document.documentMode; // At least IE6
    if ( isIE === false ) {
        /*$watch( scope.getWindowDimensions, function( newValue, oldValue ) {
            console.log( "watch dimensions, height : ", newValue.h )
            windowHeight = newValue.h;
            windowWidth = newValue.w;
            /*
                        scope.style = function() {
                            return {
                                'min-height': ( newValue.h ) + 'px',
                                //'width': ( newValue.w - 100 ) + 'px'
                            };
                        };*/
        //}, true );*/
    }
} );
