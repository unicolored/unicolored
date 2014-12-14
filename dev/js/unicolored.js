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
unicolored.config( function() {
    'use strict';
} );
// RUN
unicolored.run( function() {
    'use strict';
} );
unicolored.controller( 'BonjourController', [ '$scope', '$http', function( $scope, $http ) {
    'use strict';
    $scope.world = 'Gilles';
    $scope.articles = [];
    $http( {
        method: 'GET',
        url: '/wp-json/posts/',
    } ).success( function( data, status ) {
        $scope.articles = data;
        console.log( status );
    } );
} ] );
