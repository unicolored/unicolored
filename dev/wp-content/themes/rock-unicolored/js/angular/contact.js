/*
##         ## ##       ######   #######  ##    ## ########    ###     ######  ########  ######   #######  ##    ## ######## ########   #######  ##       ##       ######## ########
##         ## ##      ##    ## ##     ## ###   ##    ##      ## ##   ##    ##    ##    ##    ## ##     ## ###   ##    ##    ##     ## ##     ## ##       ##       ##       ##     ##
##       #########    ##       ##     ## ####  ##    ##     ##   ##  ##          ##    ##       ##     ## ####  ##    ##    ##     ## ##     ## ##       ##       ##       ##     ##
##         ## ##      ##       ##     ## ## ## ##    ##    ##     ## ##          ##    ##       ##     ## ## ## ##    ##    ########  ##     ## ##       ##       ######   ########
##       #########    ##       ##     ## ##  ####    ##    ######### ##          ##    ##       ##     ## ##  ####    ##    ##   ##   ##     ## ##       ##       ##       ##   ##
##         ## ##      ##    ## ##     ## ##   ###    ##    ##     ## ##    ##    ##    ##    ## ##     ## ##   ###    ##    ##    ##  ##     ## ##       ##       ##       ##    ##
########   ## ##       ######   #######  ##    ##    ##    ##     ##  ######     ##     ######   #######  ##    ##    ##    ##     ##  #######  ######## ######## ######## ##     ##
*/
/*
 * Postmarkapp Contact & Attachment uploader
 * 12/11/2014
 * v.0.1.0
 * by Gilles Hoarau
 * */
totoro.controller( 'ContactCtrl', [ '$scope', '$http', 'FileUploader',
    function( $scope, $http, FileUploader ) {
        $scope.success = false;
        $scope.error = false;
        $scope.err = false;
        $scope.send = function() {
            uploader.uploadAll();
            return false;
        };
        /*
        db                d88888b d888888b db      d88888b   db    db d8888b. db       .d88b.   .d8b.  d8888b.
        88       db db    88'       `88'   88      88'       88    88 88  `8D 88      .8P  Y8. d8' `8b 88  `8D
        88      C88888D   88ooo      88    88      88ooooo   88    88 88oodD' 88      88    88 88ooo88 88   88
        88       88 88    88~~~      88    88      88~~~~~   88    88 88~~~   88      88    88 88~~~88 88   88
        88booo. C88888D   88        .88.   88booo. 88.       88b  d88 88      88booo. `8b  d8' 88   88 88  .8D
        Y88888P  YP YP    YP      Y888888P Y88888P Y88888P   ~Y8888P' 88      Y88888P  `Y88P'  YP   YP Y8888D'
        */
        /* UPLOAD */
        var uploader = $scope.uploader = new FileUploader( {
            url: 'https://www.gilleshoarau.com/wp-content/themes/rock-gilleshoarau/inc/upload.php',
            autoUpload: false,
            removeAfterUpload: false,
            queueLimit: 3,
            //withCredentials: true
        } );
        /* FILTERS */
        uploader.filters.push( {
            name: 'customFilter',
            fn: function( item /*{File|FileLikeObject}*/ , options ) {
                return this.queue.length < this.queueLimit;
            }
        } );
        uploader.filters.push( {
            name: 'imageFilter',
            fn: function( item /*{File|FileLikeObject}*/ , options ) {
                var type = '|' + item.type.slice( item.type.lastIndexOf( '/' ) + 1 ) + '|';
                return '|zip|jpg|png|jpeg|bmp|gif|doc|docx|pdf|ppt|pptx|odt|ods|txt|ai|psd|indd|'.indexOf( type ) !== -1;
            }
        } );
        uploader.filters.push( {
            name: 'sizeFilter',
            fn: function( item /*{File|FileLikeObject}*/ , options ) {
                return item.size < 10000000;
            }
        } );
        /* CALLBACKS */
        uploader.onWhenAddingFileFailed = function( item /*{File|FileLikeObject}*/ , filter, options ) {
            //console.info( 'onWhenAddingFileFailed', item, filter, options );
        };
        uploader.onAfterAddingFile = function( fileItem ) {
            //console.info( 'onAfterAddingFile', fileItem );
        };
        uploader.onAfterAddingAll = function( addedFileItems ) {
            //console.info( 'onAfterAddingAll', addedFileItems );
        };
        uploader.onBeforeUploadItem = function( item ) {
            //console.info( 'onBeforeUploadItem', item );
            var htmlBody = '<div>Nom : ' + $scope.user.name + '</div>' + '<div>Email : ' + $scope.user.email + '</div>' + '<div>Message : ' + $scope.user.body + '</div>' + '<div>Dat e: ' + ( new Date() ).toString() + '</div>';
            formData = [ {
                name: $scope.user.name,
                From: "contact@gilleshoarau.com",
                To: "Gilles Hoarau <contact@gilleshoarau.com>",
                HtmlBody: htmlBody,
                Subject: 'FORMULAIRE RAPPEL : ' + $scope.user.name + ' ' + $scope.user.email,
                TextBody: 'Nom : ' + $scope.user.name + ' //// Email : ' + $scope.user.email + ' //// Message : ' + $scope.user.body,
                //item: item,
            } ];
            Array.prototype.push.apply( item.formData, formData );
        };
        uploader.onProgressItem = function( fileItem, progress ) {
            //console.info( 'onProgressItem', fileItem, progress );
        };
        uploader.onProgressAll = function( progress ) {
            //console.info( 'onProgressAll', progress );
        };
        uploader.onSuccessItem = function( fileItem, response, status, headers ) {
            //console.info( 'onSuccessItem', fileItem, response, status, headers );
        };
        uploader.onErrorItem = function( fileItem, response, status, headers ) {
            //console.info( 'onErrorItem', fileItem, response, status, headers );
        };
        uploader.onCancelItem = function( fileItem, response, status, headers ) {
            //console.info( 'onCancelItem', fileItem, response, status, headers );
        };
        uploader.onCompleteItem = function( fileItem, response, status, headers ) {
            //console.info( 'onCompleteItem', fileItem, response, status, headers );
        };
        uploader.onCompleteAll = function() {
            //console.info( 'onCompleteAll', uploader );
            $scope.success = true;
            $scope.user = {};
            this.clearQueue();
            $scope.contactForm.$setPristine();
        };
    }
] );
/*
##         ## ##      ########  #### ########  ########  ######  ######## #### ##     ## ########  ######
##         ## ##      ##     ##  ##  ##     ## ##       ##    ##    ##     ##  ##     ## ##       ##    ##
##       #########    ##     ##  ##  ##     ## ##       ##          ##     ##  ##     ## ##       ##
##         ## ##      ##     ##  ##  ########  ######   ##          ##     ##  ##     ## ######    ######
##       #########    ##     ##  ##  ##   ##   ##       ##          ##     ##   ##   ##  ##             ##
##         ## ##      ##     ##  ##  ##    ##  ##       ##    ##    ##     ##    ## ##   ##       ##    ##
########   ## ##      ########  #### ##     ## ########  ######     ##    ####    ###    ########  ######
*/
totoro.directive( 'contact', function() {
    return {
        restrict: "A",
        templateUrl: "/wp-content/themes/rock-gilleshoarau/js/contact/form-contact.html",
        //transclude: true,
    };
} );
