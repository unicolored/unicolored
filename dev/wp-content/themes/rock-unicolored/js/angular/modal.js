/*
##         ## ##      ##     ##  #######  ########     ###    ##
##         ## ##      ###   ### ##     ## ##     ##   ## ##   ##
##       #########    #### #### ##     ## ##     ##  ##   ##  ##
##         ## ##      ## ### ## ##     ## ##     ## ##     ## ##
##       #########    ##     ## ##     ## ##     ## ######### ##
##         ## ##      ##     ## ##     ## ##     ## ##     ## ##
########   ## ##      ##     ##  #######  ########  ##     ## ########
*/
totoro.directive( 'modalApp', [ '$rootScope', '$window', 'ConsoleService', 'localStorageService',
    function( $rootScope, $window, ConsoleService, localStorageService ) {
        return {
            controller: 'ModalAppCtrl',
            link: function( scope, element, attrs ) {
                scope.jLoad = function( app ) {
                        // Je commence par masquer les autres modal
                        element.find( '.modal' ).modal( 'hide' );
                        // Je recherche les paramètres de l'application dans la liste définie par ApplicationsServices
                        // et appellée ici par $rootScope.appList
                        var appIndex = findWithAttr( $rootScope.appList, 'name', app );
                        var application = $rootScope.appList[ appIndex ];
                        var modalApp = $( '#' + app + '.modal' );
                        // On regarde si l'appli est déjà ouverte sinon on la construit
                        if ( modalApp.length === 0 ) {
                            // Construction du modal Bootstrap
                            var btnClose = $( '<button type="button" class="fermer" class="' + app + '">' ).html( '<span aria-hidden="true">&times;</span>' );
                            btnClose.on( 'click', function() {
                                scope.exitApp( app );
                                element.find( '.modal' ).remove();
                            } );
                            var btnReduce = $( '<button type="button" class="reduce" class="' + app + '">' ).html( '<span aria-hidden="true">&minus;</span>' );
                            btnReduce.on( 'click', function() {
                                element.find( '.modal' ).modal( 'hide' );
                            } );
                            //var btnHelp = $('<button type="button" class="fermer" data-dismiss="modal">').html('<span aria-hidden="true">&times;</span>');
                            var iconeApp = $( '<b class="icon-' + application.icone + '">' );
                            var titleApp = $( '<h4 class="modal-title">' ).append( iconeApp ).append( " " + application.nicename + " <small>" + application.slogan + "</small>" );
                            var modalHeader = $( '<div class="modal-header">' ).append( btnClose ).append( btnReduce ).append( titleApp );
                            var modalBody = $( '<div class="modal-body">' ).html( '' );
                            var modalFooter = $( '<div class="modal-footer hide">' ).html( '<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Quitter</button>' );
                            var modalContent = $( '<div class="modal-content">' ).append( modalHeader ).append( modalBody ).append( modalFooter );
                            var modalDialog = $( '<div class="modal-dialog">' ).html( modalContent );
                            modalApp = $( '<div class="modal fade" tabindex="" role="dialog" id="' + app + '">' );
                            modalApp.append( modalDialog );
                            // Le modal est construit, on charge le contenu de l'application, passé dans .modal-body
                            // Si l'application charge une url, on charge l'iframe
                            if ( typeof application.iframeurl != 'undefined' ) {
                                // Insertion de l'iframe et de l'url
                                var theWindow = $( '<iframe class="resizeApp">' );
                                theWindow.attr( "src", application.iframeurl );
                            } else {
                                // sinon on affiche le contenu
                                var theWindow = $( '<section class="window resizeApp">' )
                            }
                            theWindow.addClass( 'myApp-' + app );
                            switch ( app ) {
                                case 'terminal':
                                    ConsoleService.consoleStart( theWindow );
                                    break;
                            }
                            var insideHeight = theWindow.height();
                            insideHeight = $window.innerHeight - 200;
                            theWindow.height( insideHeight + "px" );
                            modalApp.find( '.modal-body' ).html( theWindow );
                            // AFFICHAGE DU MODAL
                            $( '.modals' ).append( modalApp.addClass( 'myAppModal' ) );
                        }
                        modalApp.modal( 'show' );
                        modalApp.find( '.modal-content' ).draggable( {
                            container: modalApp
                        } );
                    }
                    /*
                    element.find( 'button.fermer' ).hide().on( 'click', function( e ) {
                        scope.exitApp( $( "#" + e.attr( 'class' ) ).attr( "id" ) );
                        $( "#" + e.attr( 'class' ) ).remove();
                    } );*/
            }
        };
} ] );
totoro.controller( 'ModalAppCtrl', [ '$scope', '$rootScope',
    function( $scope, $rootScope ) {}
] );
