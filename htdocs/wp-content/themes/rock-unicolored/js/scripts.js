/*! unicolored.com - v0.0.21 - 15-12-2014 [FR] */
//####dev/js/tmp/unicolored.js
/*!
unicolored */
var unicolored = angular.module( 'unicolored', [ 'ngMaterial', 'ngRoute', 'ngSanitize', 'ngAria' ] );
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
unicolored.config( [ '$routeProvider', function( $routeProvider ) {
    'use strict';
    $routeProvider.when( '/', {
        templateUrl: '/wp-content/themes/rock-unicolored/js/views/home.html',
        controller: 'BonjourController'
    } ).when( '/about', {
        templateUrl: '/wp-content/themes/rock-unicolored/js/views/about.html',
        //controller: 'AboutCtrl'
    } ).when( '/article/:type/:id', {
        templateUrl: function( params ) {
            return '/wp-content/themes/rock-unicolored/js/views/article-' + params.type + '.html';
        },
        controller: 'ArticleController'
    } ).otherwise( {
        redirectTo: '/'
    } );
} ] );
// RUN
unicolored.run( function() {
    'use strict';
} );
unicolored.controller( 'ToolbarController', [ '$scope', '$location', function( $scope, $location ) {
    'use strict';
    this.isHome = function() {
        return $location.path() == '/';
    }
} ] );
unicolored.controller( 'BonjourController', [ '$scope', '$http', function( $scope, $http ) {
    'use strict';
    $scope.world = 'Gilles';
    $scope.articlesA = [];
    $scope.articlesB = [];
    $scope.articlesC = [];
    $scope.articlesD = [];
    $scope.loading = true;
    $http( {
        method: 'GET',
        url: '/wp-json/posts/',
    } ).success( function( data, status ) {
        $scope.articlesA = data.slice( 0, 13 );
        $scope.articlesB = data.slice( 12, 25 );
        $scope.articlesC = data.slice( 24, 37 );
        $scope.loading = false;
        console.log( status );
    } );
} ] );
unicolored.controller( 'ArticleController', [ '$scope', '$http', '$routeParams', function( $scope, $http, $routeParams ) {
    'use strict';
    $scope.world = 'Gilles';
    $scope.articlesA = [];
    console.log( $routeParams.id );
    $http( {
        method: 'GET',
        url: '/wp-json/posts/' + $routeParams.id,
    } ).success( function( data, status ) {
        $scope.article = data;
        console.log( data );
    } );
} ] );
