// Inside our freshly created file, let's add the test block:
describe( 'Controller: NavbotCtrl', function() {
    // We need to tell it what module we are testing
    beforeEach( module( 'totoro' ) );
    // Next, we're going to pretend that we're angular loading the controller when it needs to be instantiated on the page
    var MainCtrl,
        scope;
    beforeEach( inject( function( $controller, $rootScope ) {
        scope = $rootScope.$new();
        MainCtrl = $controller( 'NavbotCtrl', {
            $scope: scope
        } );
    } ) );
    // Everything is all set up and ready for testing, let's write one
    it( "avoir un numéro de version", function() {
        //expect(scope.greeting).toBeUndefined();
        //dateseule();
        expect( scope.version ).toBeDefined();
    } );
    it( "doit envoyer la date à scope.date", function() {
        expect( scope.date ).toBeDefined();
    } );
    it( "doit afficher windowWidth et windowHeight", function() {
        expect( scope.windowWidth ).toBeDefined();
        expect( scope.windowHeight ).toBeDefined();
    } );
    describe( 'Unit: Horloge', function() {
        beforeEach( function() {
            foo = {
                updateTime: function() {}
            };
            spyOn( foo, 'updateTime' );
            foo.updateTime();
        } );
        it( "vérifie que la fonction updateTime() est appellée", function() {
            expect( foo.updateTime ).toHaveBeenCalled();
        } );
    } );
} );
