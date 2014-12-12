totoro.directive( 'imagePortfolio', function() {
    /*//////////// PORTFOLIO : affichage des images */
    return {
        restrict: "A",
        link: function( scope, element, attrs ) {
            console.log( element );
            var imageId = attrs.imagePortfolio;
            $permalink = $( '<a itemprop="thumbnailUrl" class="image text-center" href="' + attrs.url + '">' );
            //nbimg++;
            $result = $permalink.html( $( '<img src="https://www.gilleshoarau.com' + attrs.imageurl + '" class="img-responsive" width="344" height="224" alt="Portfolio graphic & web design Paris">' ).hide() );
            $( 'article#post-' + imageId + ' .portfolio-thumbnail' ).html( $result );
            //} );
            var i = 1;
            $( 'a.image img' ).each( function() {
                var delai = 20 * i;
                $( this ).delay( delai ).fadeIn( 500 );
                i = i + 1;
            } );
        }
    };
} );
