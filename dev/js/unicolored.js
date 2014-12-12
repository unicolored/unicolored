/*!
unicolored */
var unicolored = angular.module( 'unicolored', [ 'LocalStorageModule', 'angularFileUpload' ] );
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
unicolored.config( [ 'localStorageServiceProvider', function( localStorageServiceProvider ) {
    // setStorageType: (sessionStorage ou localStorage)
    localStorageServiceProvider.setPrefix( 'unicolored' ).setStorageType( 'localStorage' ).setStorageCookie( 45, '/' ).setStorageCookieDomain( 'unicolored.com' ).setNotify( true, true );

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
unicolored.run( function( $document, $window, localStorageService ) {
    // Enregistrement de la taille du viewport en local
    localStorageService.set( 'dateStart', new Date() );
    localStorageService.set( 'dateLastActivity', new Date() );
    localStorageService.set( 'idLastActivity', new Date() );
    var theVersion = typeof version != 'undefined' ? version : 0;
    localStorageService.set( 'version', theVersion );
    localStorageService.set( 'appName', 'unicolored.com' );
    //localStorageService.set( 'taskBar', '{}' );
    localStorageService.set( 'appLang', 'fr' );
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
unicolored.factory( 'ApplicationsService', [ '$rootScope', 'localStorageService',

] );
