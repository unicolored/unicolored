/*
##         ## ##       ######   #######  ##    ##  ######   #######  ##       ########
##         ## ##      ##    ## ##     ## ###   ## ##    ## ##     ## ##       ##
##       #########    ##       ##     ## ####  ## ##       ##     ## ##       ##
##         ## ##      ##       ##     ## ## ## ##  ######  ##     ## ##       ######
##       #########    ##       ##     ## ##  ####       ## ##     ## ##       ##
##         ## ##      ##    ## ##     ## ##   ### ##    ## ##     ## ##       ##
########   ## ##       ######   #######  ##    ##  ######   #######  ######## ########
*/
totoro.directive( 'console', function() {
    return {
        restrict: "A",
        //templateUrl: "/wp-content/themes/rock-gilleshoarau/js/navbot/console.html",
        controller: 'ConsoleCtrl',
    };
} );
/*
##         ## ##       ######   #######  ##    ## ######## ########   #######  ##       ##       ######## ########
##         ## ##      ##    ## ##     ## ###   ##    ##    ##     ## ##     ## ##       ##       ##       ##     ##
##       #########    ##       ##     ## ####  ##    ##    ##     ## ##     ## ##       ##       ##       ##     ##
##         ## ##      ##       ##     ## ## ## ##    ##    ########  ##     ## ##       ##       ######   ########
##       #########    ##       ##     ## ##  ####    ##    ##   ##   ##     ## ##       ##       ##       ##   ##
##         ## ##      ##    ## ##     ## ##   ###    ##    ##    ##  ##     ## ##       ##       ##       ##    ##
########   ## ##       ######   #######  ##    ##    ##    ##     ##  #######  ######## ######## ######## ##     ##
*/
totoro.controller( 'ConsoleCtrl', [ '$scope', 'ConsoleService', function( $scope, ConsoleService ) {
    ConsoleService.consoleStart();
} ] );
totoro.factory( "ConsoleDatas", function() {
    /*
    db                 .d88b.  d8888b.    d88b d88888b d888888b .d8888.
    88       db db    .8P  Y8. 88  `8D    `8P' 88'     `~~88~~' 88'  YP
    88      C88888D   88    88 88oooY'     88  88ooooo    88    `8bo.
    88       88 88    88    88 88~~~b.     88  88~~~~~    88      `Y8b.
    88booo. C88888D   `8b  d8' 88   8D db. 88  88.        88    db   8D
    Y88888P  YP YP     `Y88P'  Y8888P' Y8888P  Y88888P    YP    `8888Y'
    */
    var datas = new Object();
    datas.container = jQuery( 'body' );
    datas.machine = jQuery( '<div id="machine">' );
    datas.wrapper = jQuery( '<div id="wrap">' );
    datas.ghConsole = jQuery( '<div id="console">' );
    datas.pageBottom = jQuery( '<div id="bottom">' );
    // Construction
    datas.commandForm = jQuery( '<form id="command" action="/">' );
    datas.consoleZone = jQuery( '<input id="consolezone">' );
    datas.submitBtn = jQuery( '<input type="submit" class="hidden">' );
    datas.insert = jQuery( '<input class="insert">' );
    datas.cmdline = jQuery( '<div class="cmdline">' );
    datas.timeOfDay = function() {
            var hourOfDay = new Date().getHours();
            var timeOfDay;
            // assign time of day to the hour
            if ( ( hourOfDay >= 4 ) && ( hourOfDay <= 5 ) ) {
                timeOfDay = "Paris s'éveille";
            } else if ( ( hourOfDay >= 5 ) && ( hourOfDay <= 14 ) ) {
                timeOfDay = "Bonne journée";
            } else if ( ( hourOfDay >= 14 ) && ( hourOfDay <= 18 ) ) {
                timeOfDay = "Bon après-midi";
            } else if ( ( hourOfDay >= 18 ) && ( hourOfDay <= 22 ) ) {
                timeOfDay = "Bonne soirée";
            } else {
                timeOfDay = "Bonsoir";
            }
            return timeOfDay;
        }
        /*
        db                d888888b d8b   db .d8888. d888888b d8888b. db    db  .o88b. d888888b d888888b  .d88b.  d8b   db .d8888.
        88       db db      `88'   888o  88 88'  YP `~~88~~' 88  `8D 88    88 d8P  Y8 `~~88~~'   `88'   .8P  Y8. 888o  88 88'  YP
        88      C88888D      88    88V8o 88 `8bo.      88    88oobY' 88    88 8P         88       88    88    88 88V8o 88 `8bo.
        88       88 88       88    88 V8o88   `Y8b.    88    88`8b   88    88 8b         88       88    88    88 88 V8o88   `Y8b.
        88booo. C88888D     .88.   88  V888 db   8D    88    88 `88. 88b  d88 Y8b  d8    88      .88.   `8b  d8' 88  V888 db   8D
        Y88888P  YP YP    Y888888P VP   V8P `8888Y'    YP    88   YD ~Y8888P'  `Y88P'    YP    Y888888P  `Y88P'  VP   V8P `8888Y'
        */
    Ins = new Object();
    Ins.instructions = '<li>Afficher le bureau, tapez : <b>start</b></li>';
    Ins.liste = '<li>Liste de commandes : <b>list</b></li>';
    Ins.signature = '<h2>&laquo; ' + datas.timeOfDay() + ' &raquo;</h2>';
    Ins.ghascii = '<br>.####...##.....##<br>##......##.....##<br>##......##.....##<br>##...############<br>##......##.....##<br>##......##.....##<br>.#########.....##<br><br>&nbsp;';
    Ins.space = '<br> * * *'; //'<br>' + window.name;
    Ins.connected = '<u>☼</u> Offline.';
    if ( navigator.onLine === true ) {
        Ins.connected = '<i>☼</i> ';
    }
    Ins.aide = '<li>Besoin d\'aide ? <span>contact@gilleshoarau.com</span></li>';
    Ins.strings = "";
    Ins.corrections = "";
    Ins.suffix = false;
    datas.Ins = Ins;
    return datas;
} );
totoro.factory( "ConsoleCommandsList", [ 'ConsoleDatas', function( ConsoleDatas ) {
    return {
        /*
        db                d88888b db    db d88888b  .o88b. db    db d888888b d888888b  .d88b.  d8b   db
        88       db db    88'     `8b  d8' 88'     d8P  Y8 88    88 `~~88~~'   `88'   .8P  Y8. 888o  88
        88      C88888D   88ooooo  `8bd8'  88ooooo 8P      88    88    88       88    88    88 88V8o 88
        88       88 88    88~~~~~  .dPYb.  88~~~~~ 8b      88    88    88       88    88    88 88 V8o88
        88booo. C88888D   88.     .8P  Y8. 88.     Y8b  d8 88b  d88    88      .88.   `8b  d8' 88  V888
        Y88888P  YP YP    Y88888P YP    YP Y88888P  `Y88P' ~Y8888P'    YP    Y888888P  `Y88P'  VP   V8P
        */
        commandExec: function() {
            // J'efface les anciennes commandes
            jQuery( '.cmd' + ( jQuery( '.cmdline' ).length - 1 ) ).fadeTo( 1000, .75, function() {
                jQuery( '.cmd' + ( jQuery( '.cmdline' ).length - 2 ) ).fadeTo( 750, .5, function() {
                    jQuery( '.cmd' + ( jQuery( '.cmdline' ).length - 3 ) ).fadeTo( 500, .25, function() {
                        jQuery( '.cmd' + ( jQuery( '.cmdline' ).length - 4 ) ).fadeOut( 250 );
                    } );
                } );
            } );
            // Exec
            var datas = ConsoleDatas;
            var instructions = new Object();
            instructions.error = false;
            switch ( datas.consoleZone.val() ) {
                default: strings = "commande inconnue.";
                /*jQuery( '.cmdline:last-child' ).addClass( 'error' );
        if ( datas.cmdline.hasClass( 'error' ).length === 2 ) {
        strings = " cette commande n'existe pas non plus.</b>";
      } else if ( datas.cmdline.hasClass( 'error' ).length === 3 ) {
      strings = " commande inexistante.<br>Pour afficher la liste des commandes, tapez <b>list</b>";
    } else if ( datas.cmdline.hasClass( 'error' ).length === 4 ) {
    strings = " vous cherchez une commande cachée ?<br>Bonne chance.";
    datas.cmdline.each( function( index ) {
    $( this ).fadeOut( 5000 );
  } );
}*/
                instructions.error = true;
                break;
                case 'start':
                        strings = " chargement du bureau ^500.^500.^500.<br>" + datas.Ins.ghascii + '<br># Démarrage ^500.^500.^500.^500.^500.^500.^500.^500.^500.';
                    datas.consoleZone.addClass( 'hide' );
                    datas.insert.addClass( 'hide' );
                    datas.container.animate( {
                        backgroundColor: "#871d1f",
                    }, 5000 ).animate( {
                        backgroundColor: "#070809",
                    }, 5000, function() {
                        window.location.replace( '/' );
                    } );
                    break;
                case 'quit':
                        case 'exit':
                        strings = " sortie imminente ^500. ^500. ^500. ^500 <br> Ouf je vous ai rattrapés à temps,<br>vous êtes toujours là ?";
                    break;
                case 'gh photo':
                        maphoto = atob( "Ojo6Ojo6Ojo6Ojo6Ojo6Ojo7Ozs7Ojo6Ojo6Ojo6Ojo6Ojo6Ojo6Ojo6Ojo6Ojo6Ojo6Ojo6Ojo6Ojo6Ojo6Ojo6Ojo6Ojo6Ojo6Ojo6Oiw8YnI+DQo6Ojo6Ojo6Ojo6Ojo6Ojo6Ojs7Ojo6Ojo6Ojo6Ojo6Ojo6Ojo6Ojo6Ojo6Ojo6Ojo6Ojo6Ojo6Ojo6Ojo6Ojo6Ojo6Ojo6Ojo6Ojo6LDo6Ojxicj4NCjo6Ojo6Ojo6Ojo6Ojo6Ojo6Ozs7Ojs6Ojo6Ojo6Ojo6LCwsLCwsLCwsLCwsLCwsLCwsLCwsLDo6Ojo6Ojo6LDo6Ojo6Ojo6OjosOjosOjo6PGJyPg0KOjo6Ojo6Ojo6Ojo6Ojo6Ojo7Ozo6Ojo6Ojo6OjosLCwsKyM6LC4sLCwuLDs6LC4sLCwsLCwsOjo6Ojo6Ojo6Ojo6Ojo6OjosLDosLCwsOiw8YnI+DQo6Ojo6Ojo6Ojo6Ojo6Ojo6Ojs6Ojo6Ojo6Ojo6OicjKyMjQEBAQEBAQEBAQEAjIzsrJzo7OywsLCw6Ojo6Ojo6LCwsLCwsLDosLDo6OjosLDxicj4NCjo6Ojo6Ojo6Ojo6Ojo6Ojo6Ojo6Ojo6Ojo6Ojo7QCNAIyMrQEBAQEBAQEBAQEBAQEBAOjorLCwsOiw6OjosOjosOiw6LCw6LCwsLDo6LCwsPGJyPg0KOjo6Ojo6Ojo6Ojo6Ojo6Ojo6Ojs6Ojo6OiwsOyMrK0AjIyMjIyMjI0BAQEBAQEBAQEBAQCMsLiwsLDo6LCw6LCwsLCwsLDo6LCwsLCwsLCw8YnI+DQo6Ojo6Ojo6Ojo6Ojo6Ojo6Ojs6Ojo6OjosLCdAQEBAQEAjQCMjIyMjQCMjIyMjI0AjI0BAQEA6LiwsLCw6LCwsOiwsLCw6LDosLCwsLCwsLDxicj4NCjo6Ojo6Ojo6Ojo6Ojo6Ojo6Ozo6Ojo6LDonOydAI0BAIyMjIyMjIyMjIyMjIyMjIyMjI0BAQEAnLiwsLCwsLCwsLCwsLCwsLCwsLCwsLCwsPGJyPg0KOjo6Ojo6Ojo6Ojo6Ojo6Ojo6Ojo6Ojo7QCMjQEBAQCMjIyMjIyMjIyMjIyMjQEBAQCMjIyNAQEAjLi4sLCwsLDosLCwsLCwsLCwsLCwsLCw8YnI+DQo6Ojo6Ojo6Ojo6Ojo6Ojo6Ojo6OjosLCMjQEBAIyMjIyMjI0BAQCNAIyMjIyNAI0BAIyMjQEBAQEA6LiwsLCwsLCwsLCw6LCwsLCwsLCwsLDxicj4NCjo6Ojo6Ojo6Ojo6Ojo6Ojo6Ojo6Oiw7QEBAIyMjQCNAQCNAQEAjIyNAIyMjIyMjQEAjIyMjIyNAQCMuLiwsLCwsLCwsLCwsLCwsLCwsLCwsPGJyPg0KOjo6Ojo6Ojo6Ojo6Ojo6Ojo6Ojo6LCdAQCMjQEBAI0AjIyMjQCMjIyNAQEBAIyMrI0AjIyMjIyMjQEAsLiwsLCwsLCwsLCwsLCwsLCwsLCw8YnI+DQo6Ojo6Ojo6Ojo6Ojo6Ojo6Ojo6Oiw6QEAjQEBAQEAjQEBAQEBAQEBAQEBAQEAjIyMjQEAjIyNAI0BAQEAuLiwsLCwsLCwsLCwsLCwsLCwsLDxicj4NCjo6Ojo6Ojo6Ojo6Ojo6Ojo6OjosLCNAQEBAIyMjI0BAQEAjQEAjI0BAQCNAIyMjKytAQEBAQCNAI0AjQCtgLCwsLCwsLCwsLCwsLCwsLCwsPGJyPg0KOjo6Ojo6Ojo6Ojo6Ojo6Ojo6Oiw6QEAjQEAjI0AjQEBAIyMjKyMrKyMrOycnKyc7OysjQEAjQEAjI0BAQDouLCwsLCwsLCwsLCwsLCwsLCw8YnI+DQo6Ojo6Ojo6Ojo6Ojo6Ojo6OjosLCtAQCNAQEBAI0BAIyMjJ0ArJzs7Jzs6Oiw6LDo6OycjKyNAQCMjQCNAJy4sLCwsLCwsLCwsLCwsLCwsLDxicj4NCjo6Ojo6Ojo6Ojo6Ojo6Ojo6OjosI0BAQCNAQEAjQCMjIysnIyc7Ojo6Ojo6LCwsLCwsOjs7K0BAIyMjI0BALi4sLCwsLCwsLCwsLCwsLCwsPGJyPg0KOjo6Ojo6Ojo6Ojo6Ojo6Ojo6LC5AQEAjQEAjI0BAKysjJycrOzo6Ozo6Oiw6OiwsLCw6OicnJyMjIyMjQEAuLiwsLCwsLCwsLCwsLCwsLCw8YnI+DQo6Ojo6Ojo6Ojo6Ojo6Ojo6OjosO0BAQCNAQCMjQCsrJysnJzs7Ojs6Ojo6Ojo6LDo6Oiw6OycjQCNAQCNAQGAuLCwsLCwsLCwsLCwsLCwsLDxicj4NCjo6Ojo6Ojo6Ojo6Ojo6Ojo6OjpAQCNAI0BAI0AjKzs7Ozs7Ozs7Ozs6Ojo6Ojo6LDo6OiwsLCtAIyMjQEBALC4sLCwsLCwsLCwsLCwsLCwsPGJyPg0KOjo6Ojo6Ojo6Ojo6Ojo6OjssO0BAQCMjQEAjIycnOzs7Ozs7Ozs7Ojo6Ojo6OjosOjo6OiwsJyNAIyNAQEBgLiwsLCwsLCwsLCwsLCwsLCw8YnI+DQo6Ojo6Ojo6Ojo6Ojo6Ojo6Oiw7QEAjQCMjIyMrJzs7Ozs7Ozs7Ozs7Ojo7Ojo6Ojo6Ojo6Ojo6LCc6I0BAQC4uLCwsLCwsLCwsLCwsLCwsLDxicj4NCjo6Ojo6Ojo6Ojo6Ojo6Ojo6LCdAQEBAIyMjIysnJzs7Ozs7Ozs7Ozs6Ojs6Ojo6Ojo6Ojo6Ojo6Oiw6QEBAYC4sLCwsLCwsLCwsLCwsLCwsPGJyPg0KOjo6Ojo6Ojo6Ojo6Ojo6OjosO0BAI0AjIyNAIysnJyc7Ozs7Ozs7Ojo6Ojo6Ojo6Ojo6Ojo6Ojo6LDorQEBgLiwsLCwsLCwsLCwsLCwsLCw8YnI+DQo6Ojo6Ojo6Ojo6Ojo6Ojo6OiwsQEAjQCMjI0AjKycnJyc7Ozs7Ozs6Ojo6Ojo6Ojo6Ojo6Ojo6Ojo6OitAQGAuLCwsLCwsLCwsLCwsLCwsLDxicj4NCjo6Ojo6Ojo6Ojo6Ojo6Ojo6LCxAQCNAQCMjQCMrJycnOzs7Ozs7Ozs7Ojo6Ojo6OjosLDo6Ojo6Ojo6K0BAYC4sLCwsLCwsLCwsLCwsLCwsPGJyPg0KOjo6Ojo6Ojo6Ojo6Ojo6Ozo6K0BAI0BAQCMjKycnJzs7Ozo6Ojo6Ozs6Ojo6Ojo6Ojo6Ojo6Ojo6OiwjQCNgLiwsLCwsLCwsLCwsLCwsLCw8YnI+DQo6Ojo6Ojo6Ojo6Ojo6Ojo6OjpAQEBAI0BAQCsrJycnOzo6OjosOjo6Ojo6Ojo6Ojo6Ojo6Ojo6Ojo6LEBAJ2AuLCwsLCwsLCwsLCwsLCwsLDxicj4NCjo6Ojo6Ojo6Ojo6Ojo6Ojo6OiNAQEBAQEArIycnJyc7OisrJyc7Ojo6Ojo6Ojs6Ojo6Ojo6Ojo6OiwsQEA6LiwsLCwsLCwsLCwsLCwsLCwsPGJyPg0KOjo6Ojo6Ojo6Ojo6Ojo6OjosQEBAQCNAQCM7OycnOysjI0BAQEBAIyc7Ozs7Ojo7Ozo6OiwsLCwsLCxAQGAuLCwsLCwsLCwsLCwsLCwsLCw8YnI+DQo6Ojo6Ojo6Ojo6Ojo6Ojo6OjtAI0BAQEBAJzsnOzsrQEAjIyNAQEBAQCsnOzs7Ozs6Ojo6Ozo6OjosOkAjYC4sLCwsLCwsLCwsLCwsLCwsLDxicj4NCjo6Ojo6Ojo6Ojo6Ojo6OjosO0AnJyNAQEAnOycnJysrJycrJycnKysjKysnJzs7Ozs7JysjQEBAIyM7QCdgLiwsLCwsLCwsLCwsLCwsLCwsPGJyPg0KLDo6Ojo6Ojo6Ojo6Ojo6Oiw7IyMrO0BAQCc7JycnJycnKyMjIyMjKysrKysnOzs7JycrI0BAQEBAKytALGAsLiwsLCwsLCwsLCwsLCwsLCw8YnI+DQo6Ojo6Ojo6Ojo6Ojo6Ojo6LCcrQCcnQEBAJzsnJycnIyNAI0AnJyMjKysrKyc7OjsnKysjQCMrKysrIytgLiwsLCwsLCwsLCwsLCwsLCwsLDxicj4NCjo6Ojo6Ojo6Ojo6Ojs7OzosJysrJyNAQEA7Ozs7JysjQCs7QCs6OiMrKysnOywsOysjIyNAKyMnJzojOzouLCwsLCwsLCwsLCwsLCwsLCwsPGJyPg0KLDo6Ojo6Ojo6Ojo7OzsnJzs7IycnI0BAIzs7Ozs7JysjJzs7Ozo6JyM7Jyc7LCw6KysrQCNALkAjOkAsLi4sLCwsLCwsLCwsLCwsLCwsLCw8YnI+DQosOjo6Ojo6Ojo6Ojs7OycnJycjJysjQEAjOzs7Ozs7JycrJyc7Jyc7OjsnJzs6LDo6KydAIztgKyMsI2AuLCwsLCwsLCwsLCwsLCwsLCwsLDxicj4NCiw6Ojo6Ojo6Ojo7Ojs7JycnJycnKysrQEA7Ozs7Ozs7OycnJycrJzs7OycnOywsLDs7JzssOzsnJzojLi4sLCwsLCwsLCwsLCwsLCwsLCwsPGJyPg0KLDo6Ojo6Ojo6Ojo6OycnJycnJzsrKydAQCc7Jzs7Ojs7Ozs7Jyc7OjsnJzs6LCwsOzsnKysnJzs6OjsuLiwsLCwsLCwsLCwsLCwsLCwsLCw8YnI+DQo6Ojo6Ojo6Ojo6Ozo7JycnJycnJysjJytAJycnOzs6Ojo6Ojs7Ojo6Oyc7Ozs6LCw6OjsnJzs7Ozo7LC4uLCwsLCwsLCwsLCwsLCwsLCwsLDxicj4NCiw6Ojo6Ojo6Ojs7OjsnJycnJyc7JysjJyMnJyc7Ozs7Ozo6Ojo6OjonJzs7OzosOjo6Ojs7Ozs6OjsuLiwsLCwsLCwsLCwsLCwsLCwsLCwsPGJyPg0KOjo6Ojo6Ojo6Ozs6OycnJycnJycrJysrJycnJyc7Ozs7Ojo6Ojo6OycnJzs7Oi46Ojo6Ojo6Ojo6Oi4sLCwsLCwsLCwsLCwsLCwsLCwsLCw8YnI+DQo6Ojo6Ojo6Ojo7Ozs7JycnJycnJzsnKysnJycnJyc7Ozs6Oiw6Ojo7JycnJzs6Ljo6Ozo6Ojo6OjsuLCwsLCwsLCwsLCwsLCwsLCwsLCwsLDxicj4NCjo6Ojo6Ojo6Ojs7OzsnJycnJycnOycnKycnJycnJzs7Ozs6Ojo7OicnOycnOzouOjo7Ozo6Ojo6Oy4sLCwsLCwsLCwsLCwsLCwsLCwsLCwsPGJyPg0KOjo6Ojo6Ojo6Ozs7OycnJycnJzs7OzsnJycnJycnJzs7Ozo6Ozo6Jzs6Ozs7LC46Ojs6Ojo6OjsnLi4sLCwsLCwsLCwsLCwsLCwsLCwsLCw8YnI+DQo6Ojo6Ojo6Ozs7Ojs7JycnJycnOzsnIyMnJycnJycnOzs7Ozo6OjorOzo7OzosLCwsOjs6Ojo6JywuLCwsLCwsLCwsLCwsLCwsLCwsLCwsLDxicj4NCjo6Ojo6Ojo6Ozs7OzsnJycnJyc7J0BAKycnJycnJyc7Jzs7Ojo6OiMnOycnOyw6LCw6Ojo6Ozs7Li4sLCwsLCwsLCwsLCwsLCwsLCwsLCwsPGJyPg0KLDo6Ojo6Ojo7Ozo7OycnJycnJztAQEArJycnJycnJyc7Ozo6Ozo7IyMrQCMnOzo7Ozs7Ojo6OzsuLCwsLCwsLCwsLCwsLCwsLCwsLCwsLCw8YnI+DQosOjo6Ojo6Ojo7OjsnJycnJyc7O0BAQCsnJycnJycnOzs7Ozo7OjsnKyMjIysnOycrOjo6Ojo6Jy4sLCwsLCwsLCwsLCwsLCwsLCwsLCwsLDxicj4NCjo6Ojo6Ojo6Ojo6OycnJycnJzs7I0BAIysnJycnOyc7Ozs7Ozs7Ojs7JysrIysrIzo6Ojo6OzssLiwsLCwsLCwsLCwsLCwsLCwsLCwsLCwsPGJyPg0KOjo6Ojo6Ojo7Ozo7JycnJyc7OyMjQEAjIysrJycnOyc7Ozs7Ozs6Oyc7OycrIyc7Ozo6Ozo7Oy4uLCwsLCwsLCwsLCwsLCwsLCwsLCwsLCw8YnI+DQosOjo6Ojo6Ojs7OzsnJycnJycnQCNAQCMjKysnJycnOzsnJyc7Ozs7JycnJycrOzs7Ozs6Ozs7Li4sLCwsLCwsLCwsLCwsLCwsLCwsLCwsLDxicj4NCiw6Ojo6Ojo6Ojo7OycnJycnKyNAIyNAIyMrKysnKysnOycnOycnJycnJzo6Oic7OycnOzs7JywuLCwsLCwsLCwsLCwsLCwsLCwsLCwsLCwsPGJyPg0KOjo6Ojo6Ojo6Ozs7JycnJycrIyMjI0AjQCMrKysrKyc7OycnJyc7Ojs6OiwsLCw6Ojs7OzsnLi4sLCwsLCwsLCwsLCwsLCwsLCwsLCwsLCw8YnI+DQo6Ojo6Ojo6Ojs6OzsnJycnJysjIyMrQCMjQCMrKysrKycnJyNAIyMrKysnJzonOzs7Kyc6OywuLiwsLCwsLCwsLCwsLCwsLCwsLCwsLCwsLDxicj4NCjo6Ojo6Ojo6Ojo7OycnJycrKysjQCMjIyMjQCMrKysrJyc7OycrKysjIyMjKysjIysnKzs7Li4sLCwsLCwsLCwsLCwsLCwsLCwsLCwsLCwsPGJyPg0KOjo6Ojo6Ojo6Ojs7JycnJysrKyNAIyMjIyMjIysrIysrJzs7OzsnJzo6LDs6Ojo7OjsnJy4uLCwsLCwsLCwsLCwsLCwsLCwsLCwsLCwsLCw8YnI+DQo6Ojo6Ojo6Ojo6OzsnJycnKysrI0AjK0AjIyNAIysrIysrJycnJycnJzs7Ozo6Ozo6OycuLi4sLCwsLCwsLCwsLCwsLCwsLCwsLCwsLCwsLDxicj4NCjo6Ojo6Ojo6Ojo7JycnJycrKyMjI0ArIyMjI0BAIysrKycrKysrKysnOzs7Ojs7OzsnO2BgYC4uLiwsLCwsLCwsLCwsLCwsLCwsLCwsLCwsPGJyPg0KOjo6Ojo6OjosLCMjIysjKysjIyMjQCMjQCsjI0BAKysnJzsrKysrKyMjIyMjKyc7OztAJ2BgYGAuLi4sLCwsLCwsLCwsLCwsLCwsLCwsLCw8YnI+DQo6Ojo6OjosLC4jIyMjIysjKysjQCMjIysjIyMjQEBAKysnOjsnJycrKyMjKys7Ojo6I0BAQCwuO0ArLi4sLCwsLCwsLCwsLCwsLCwsLCwsLDxicj4NCiwsLCwsLCwnQCMjKysjIysjKyMjQEBAIyMjKyMjQEBAIyc7Ojo6Ozo7Ozs6OjosLCxAIyNAQEBAQEAuLiwsLCwsLCwsLCwsLCwsLCwsLCwsPGJyPg0KLCwsLjo7QEAjIyMrKyMjKysrKyMjQEAjKyMjKyNAQEBAIys7Ozo7Ozo6OiwsOiw6QCMjIyNAQEBAJy4uLCwsLCwsLCwsLCwsLCwsLCwsLCw8YnI+DQouOiNAQCMjIyMrKysjKyMrKysjIyMjQEAjKyMjI0AjKysjIysnOzs7Ojo6Ojo6OitAIyMjIyMjQEBgLi4sLCwsLCwsLCwsLCwsLCwsLCwsLDxicj4NCiMjIyMjIyMrKysrIyMrKyMrKysjIyNAQCMjKyMjIyMrKyMjIyMnJycnOzs7Ozo7QCMrIyMjIyNAQGBgLCwsLCwsLCwsLCwsLCwsLCwsLCwsPGJyPg0KIyMjKysjKysrKyMrIysrKyMjKysjI0BAQCMjKyMrKyMrIyNAQCsrIysrKysnK0BAIysjIyMjI0AuLi4sLCwsLCwsLCwsLCwsLCwsLCwsLCw8YnI+DQojKysjIysjKysrKysjKysrKyMrKysjI0BAQEAjIyMjKyMjIyMjI0AjKycnK0BAQEAjKyMjIyNAQGAuLCwsLCwsLCwsLCwsLCwsLCwsLCwsLDxicj4NCiMrIyMjKysrIyMrKyMjKysrKysrIyMjI0BAI0AjI0AjIytAIyMrIyMrJztAQEBAQCMjKyMjI0AsYC4sLCwsLCwsLCwsLCwsLCwsLCwsLiwsPGJyPg0KKysrKysrKyMjIyMjIyMrKysrKysjIyMjQCNAI0AjIyMjIyMjIycrKyc7OyNAI0AjIyMrIyMjQCBgLiwsLCwsLCwsLCwsLCwsLCwsLCwsLCw8YnI+DQorKysrKysrIysjIyMjIysrKysrKysjIyMjQEAjI0AjIyMjIyMjJycnJzs7I0AjQCMjKyMjIyMjYC4sLCwsLCwsLCwsLCwsLCwsLCwsLCwsLDxicj4NCiMrKysrKysrIysrIyMjKyMrKysrKysjIyMjI0AjI0BAQEAjQCMjJycnOycrQCNAIyMjIysrQCsjLi4sLCwsLCwsLCwsLCwsLCwsLCwsLCwsPGJyPg0KKysrKysrKysrKysjIyMjIysrKysrKysjIyMjI0ArI0BAIyMjIyMjIys7OytAI0AjIysrKysjIyNgLiwsLCwsLCwsLCwsLCwsLCwsLCwsLCw8YnI+DQorKysrKysrJysrKysrIyMjIyMjKysrKysjIyMjQCMrK0BAQEAjIyNAIyNAQCMjQCMjIyMrKyNAK2AuLCwsLCwsLCwsLCwsLCwsLCwsLCwsLDxicj4NCiMrKysrIysrKysrKysrIyMjIyMjKysrKysjIyMjQCMjJytAQEAjIyNAQEAjIyNAIyMjKysjKyMrYC4sLCwsLCwsLCwsLCwsLCwsLCwsLCwsPGJyPg0KQEAjKysrKysrKysrKysrKysjIyMjKysrKysrIyNAQEBAIysrJycnI0AjIyMjQEAjIyMrIyMrIys7YC4sLCwsLCwsLCwsLCwsLCwsLCwsLCw8YnI+DQorIyNAQCMrKysrKysrKysrKyMjIyMrKysrKysrI0BAQEBAQCNAQCcjIyMjIyNAQCMjIysrIycnQCtgLiwsLCwsLCwsLCwsLCwsLCwsLCwsLDxicj4=" );
                    strings = '<br><h1>Ma photo</h1><br>Début du téléchargement ^500. ^500. ^500. <br>Temps estimé : ~2min... (<kbd>Esc</kbd> Echap pour lancer une nouvelle commande)<br><p style="letter-spacing:1px; color:#040607; font-size:5px; line-height:5px !important;"><span style="background:#d0d2d3;">' + maphoto + '</span></p><br> ^500 . ^500 . ^500 . ^500 c\'est moi !';
                    datas.consoleZone.val( '' ).prop( "disabled", true );
                    $( document ).keyup( function( e ) {
                        if ( e.which == 27 ) {
                            datas.consoleZone.val( '' ).prop( "disabled", false ).focus();
                            datas.container.animate( {
                                backgroundColor: "#131d22",
                            }, 1000 );
                            return false;
                        }
                    } );
                    datas.container.animate( {
                        backgroundColor: "#e23134",
                    }, 25000 ).animate( {
                        backgroundColor: "#181e29",
                    }, 25000 ).animate( {
                        backgroundColor: "#163c14",
                    }, 25000 ).animate( {
                        backgroundColor: "#603809",
                    }, 25000 ).animate( {
                        backgroundColor: "#1e0001",
                    }, 25000 ).animate( {
                        backgroundColor: "#070809",
                    }, 25000 ).animate( {
                        backgroundColor: "#570e0e",
                    }, 25000 ).animate( {
                        backgroundColor: "#181e29",
                    }, 25000 ).animate( {
                        backgroundColor: "#163c14",
                    }, 25000 ).animate( {
                        backgroundColor: "#603809",
                    }, 25000 ).animate( {
                        backgroundColor: "#1e0001",
                    }, 25000 ).animate( {
                        backgroundColor: "#070809",
                    }, 25000 );
                    break;
                case 'gh cv':
                        strings = '<h1>CV</h1>Directeur artistique<br> ^500 Graphiste ^500 et Webmaster <br> * * * <br>Dernière expérience : 2006 - 2014<br>Agence de communication à Troyes';
                    break;
                case 'obscd':
                        strings = ' toi même.';
                    break;
                case 'gh services':
                        strings = '<h1>Services</h1>Création graphique<br>Développement de sites Internet<br>Photographie, illustration, 3D<br>Montage vidéo';
                    break;
                case 'gh bio':
                        strings = '<h1>Bio</h1>32ans, ©1982<br>Permis B : OK<br>Langues : Français/Anglais<br>Nationalité : Française<br>Origine : Guyane (97)';
                    break;
                case 'gh sexe':
                        case 'gh sex':
                        case 'sexe':
                        case 'sex':
                        strings = '18 cm';
                    break;
                case 'gh contact':
                        strings = '<h1>Contact</h1><span class="icon-phone"></span> 01 77 17 43 37<br><span class="icon-map-marker"></span> Bld de Bonne nouvelle 75010 Paris';
                    break;
                case 'gh':
                        strings = 'gh [option : cv, bio, services, contact, photo]<br><small><em>exemple : tapez </em><b class="text-warning">gh cv</b><em> pour afficher le cv</em></small>';
                    break;
                case 'list':
                        strings = '<h1>Commandes</h1><br>- <b>gh</b> [<b>option</b>] : informations sur Gilles Hoarau<br>- <b>start</b> : démarrer le bureau<br>- <b>navigator</b> : informations du navigateur<br>- <b>date</b> : affiche la date et l\'heure courante';
                    break;
                case 'boobs':
                        strings = '（。&nbsp;ㅅ&nbsp;。）';
                    break;
                case 'navigator':
                        strings = ' ' + navigator.userAgent;
                    break;
                case 'date':
                        strings = '' + new Date();
                    break;
                case 'gilles':
                        case 'Gilles':
                        strings = "A dispo.";
                    break;
            }
            var corrections = '';
            switch ( datas.consoleZone.val() ) {
                case 'photo':
                    corrections = 'Pensiez-vous à <b>gh photo</b> ?';
                    break;
                case 'cv':
                    corrections = 'Pensiez-vous à <b>gh cv</b> ?';
                    break;
                case 'obsédé':
                case 'obsede':
                case 'obsd':
                case 'obcd':
                    corrections = 'Pensiez-vous à <b>obscd</b> ?';
                    break;
                case 'services':
                case 'service':
                    corrections = 'Pensiez-vous à <b>gh services</b> ?';
                    break;
                case 'version':
                    corrections = 'Pensiez-vous à <b>gh version</b> ?';
                    break;
                case 'liste':
                case 'gh list':
                    corrections = 'Pensiez-vous à <b>list</b> ?';
                    break;
                case 'navigateur':
                    corrections = 'Pensiez-vous à <b>navigator</b> ?';
                    break;
                case 'heure':
                case 'horloge':
                    corrections = 'Pensiez-vous à <b>date</b> ?';
                    break;
                case 'gh option':
                case 'gh [option]':
                    corrections = 'Remplacez [option] par : cv, bio, services, contact ou photo';
                    break;
                case 'stat':
                case 'sart':
                case 'star':
                case 'restart':
                case 'reboot':
                case 'starte':
                case 'gh start':
                    corrections = 'Pensiez-vous à <b>start</b> ?';
                    break;
            }
            instructions.strings = strings;
            instructions.corrections = corrections;
            return instructions;
        }
    }
} ] );
totoro.factory( "ConsoleSubmitService", [ 'ConsoleDatas', 'ConsoleCommandsList', function( ConsoleDatas, ConsoleCommandsList ) {
    return {
        /*
        db                .d8888. db    db d8888b. .88b  d88. d888888b d888888b
        88       db db    88'  YP 88    88 88  `8D 88'YbdP`88   `88'   `~~88~~'
        88      C88888D   `8bo.   88    88 88oooY' 88  88  88    88       88
        88       88 88      `Y8b. 88    88 88~~~b. 88  88  88    88       88
        88booo. C88888D   db   8D 88b  d88 88   8D 88  88  88   .88.      88
        Y88888P  YP YP    `8888Y' ~Y8888P' Y8888P' YP  YP  YP Y888888P    YP
        */
        commandSubmit: function( event ) {
            var datas = ConsoleDatas;
            datas.ghConsole.append( jQuery( '<div class="cmdline">' ).addClass( 'cmd' + ( jQuery( '.cmdline' ).length + 1 ) ) );
            //datas.consoleZone.prop( "disabled", true ).blur();
            // EXECUTION DE LA COMMANDE
            var instructions = ConsoleCommandsList.commandExec();
            var thiscommand = "";
            if ( instructions.error === false ) {
                thiscommand = '$ <b>' + datas.consoleZone.val() + '</b> : ';
            } else {
                thiscommand = '$ <u>' + datas.consoleZone.val() + '</u> : ';
            }
            datas.consoleZone.val( '' );
            jQuery( '.cmdline.cmd' + ( jQuery( '.cmdline' ).length ) ).typed( {
                //strings: [  ],
                strings: [ thiscommand + instructions.strings + '<br>' + instructions.corrections ],
                typeSpeed: 0,
                startDelay: 0,
                backDelay: 0,
                loop: false,
                loopCount: false,
                showCursor: false,
                cursorChar: '█',
                callback: function() {
                    datas.consoleZone.prop( "disabled", false ).focus();
                    datas.pageBottom.scrollTo();
                },
            } );
            return false;
        }
    }
} ] );
totoro.factory( "ConsoleService", [ 'ConsoleSubmitService', 'ConsoleDatas', 'ConsoleCommandsList', function( ConsoleSubmitService, ConsoleDatas, ConsoleCommandsList ) {
    var datas = ConsoleDatas;
    return {
        /*
        db                .d8888. d888888b  .d8b.  d8888b. d888888b
        88       db db    88'  YP `~~88~~' d8' `8b 88  `8D `~~88~~'
        88      C88888D   `8bo.      88    88ooo88 88oobY'    88
        88       88 88      `Y8b.    88    88~~~88 88`8b      88
        88booo. C88888D   db   8D    88    88   88 88 `88.    88
        Y88888P  YP YP    `8888Y'    YP    YP   YP 88   YD    YP
        */
        consoleStart: function( container ) {
            theContainer = typeof container !== 'undefined' ? container : datas.container;
            /*
            ACTIONS
            */
            datas.wrapper.html( datas.ghConsole );
            datas.machine.css( {
                'min-height': window.innerHeight - 500
            } ).html( datas.wrapper );
            // Insertion dans le body
            theContainer.html( datas.machine.animate( {
                padding: '80px',
            } ) ).append( datas.pageBottom );
            setInterval( function() {
                datas.pageBottom.scrollTo();
            }, 500 );
            /*
            db                 .d8b.  d88888b d88888b d888888b  .o88b. db   db  .d8b.   d888b  d88888b
            88       db db    d8' `8b 88'     88'       `88'   d8P  Y8 88   88 d8' `8b 88' Y8b 88'
            88      C88888D   88ooo88 88ooo   88ooo      88    8P      88ooo88 88ooo88 88      88ooooo
            88       88 88    88~~~88 88~~~   88~~~      88    8b      88~~~88 88~~~88 88  ooo 88~~~~~
            88booo. C88888D   88   88 88      88        .88.   Y8b  d8 88   88 88   88 88. ~8~ 88.
            Y88888P  YP YP    YP   YP YP      YP      Y888888P  `Y88P' YP   YP YP   YP  Y888P  Y88888gP
            */
            datas.wrapper.append( datas.insert ).append( datas.commandForm );
            // Après la fin de l'animation de l'intro
            datas.commandForm.on( 'submit', function( event ) {
                ConsoleSubmitService.commandSubmit( event );
                event.preventDefault();
            } );
            var instructions = datas.Ins;
            datas.ghConsole.typed( {
                strings: [ '* * * ^500 <br>' + instructions.connected + navigator.appName + ' (' + navigator.appCodeName + ', ' + navigator.platform + ' ' + navigator.language + ' - ' + navigator.product + ')<br><i>☺</i> GillesHoarau<b class="tp">.com</b> <small>v.' + version + '</small><br>' + instructions.signature + instructions.instructions + instructions.liste + instructions.aide + instructions.space ],
                //strings: [ ' . . . ^100*^100*^100*', '<br> . . . ' + new Date() + '<br> . . . * * * ^500 <br>' + instructions.connected + navigator.appName + ' (' + navigator.appCodeName + ', ' + navigator.platform + ' ' + navigator.language + ' - ' + navigator.product + ')<br><i>☺</i> GillesHoarau<b class="tp">.com</b> <small>v.' + version + '</small><br>' + instructions.signature + instructions.instructions + instructions.liste + instructions.aide + instructions.space ],
                //strings: [ 'Ok' ],
                typeSpeed: 0,
                startDelay: 0,
                backDelay: 0,
                loop: false,
                loopCount: false,
                showCursor: false,
                cursorChar: '█',
                callback: function() {
                    datas.commandForm.html( datas.consoleZone ).append( datas.submitBtn );
                    datas.insert.val( 'GH $ ' );
                    datas.consoleZone.val( '' );
                    datas.consoleZone.focus();
                }
            } );
            $( document ).on( 'click', function() {
                datas.consoleZone.focus();
            } );
        }
    }
} ] );
