unicolored.factory( 'CarouselService', function() {
    var images = [];
    return function( which ) {
        switch ( which ) {
            case "frontpage":
                images = [
                    /*{
                        "title": "Gilles Hoarau",
                        "img": "gilles"
                },*/
                    {
                        "title": "Gilles Hoarau",
                        "img": "services",
                        "url": "https://www.unicolored.com/services-communication-developpement-web/"
                }, {
                        "title": "Services et prestations",
                        "img": "graphisme",
                        "url": "https://www.unicolored.com/portfolio-graphic-web-design-professionnel/"
                }, {
                        "title": "Web design",
                        "img": "webdesign",
                        "url": "https://www.unicolored.com/portfolio-graphic-web-design-professionnel/"
                }, {
                        "title": "Polyvalence",
                        "img": "polyvalence",
                        "url": "https://www.unicolored.com/services-communication-developpement-web/"
                }, {
                        "title": "Cr\u00e9ativit\u00e9",
                        "img": "creativite",
                        "url": "https://www.unicolored.com/portfolio-graphic-web-design-professionnel/"
                }, {
                        "title": "Exp\u00e9rience",
                        "img": "experience",
                        "url": "https://www.unicolored.com/services-communication-developpement-web/"
                } ];
                break;
        }
        return images;
    }
} );
unicolored.directive( 'carouselFrontpage', [ 'CarouselService', function( CarouselService ) {
    return {
        restrict: 'A',
        link: function() {
            //scope.da = 'indicators';
            /*//////////// CAROUSEL : affichage des images */
            var ol = $( '<ol class="carousel-indicators">' );
            var carouselLeft = $( '<a class="left carousel-control" href="#frontpageCarousel" role="button" data-slide="prev" style="opacity:0">' ).html( $( '<span class="icon-arrow-left">' ) );
            var carouselRight = $( '<a class="right carousel-control" href="#frontpageCarousel" role="button" data-slide="next" style="opacity:0">' ).html( $( '<span class="icon-arrow-right">' ) );
            $( '#frontpageCarousel' ).prepend( ol ).append( carouselLeft ).append( carouselRight );
            $.each( CarouselService( 'frontpage' ), function( index, value ) {
                var img = value.img;
                //var $image = $( '<img src="https://unicolored.com/img/carousel/' + img + '.jpg" class="img-responsive" itemprop="thumbnailUrl" width="900" height="349" alt="' + value.title + '" >' );
                var $image = $( '<span class="imagecarousel ' + value.img + '" />' );
                var $link = $( '<a href="' + value.url + '"/>' );
                $image.appendTo( $link );
                if ( index >= 3 ) {
                    $image.addClass( 'secondpart' );
                }
                var active = '';
                if ( index === 1000 ) {
                    active = ' active';
                }
                var $item = $( '<div class="item' + active + '">' ).html( $link );
                /*if ( index === 0 ) {
                    $( "#frontpageCarousel .carousel-inner" ).html( $item );
                } else {*/
                $( "#frontpageCarousel .carousel-inner" ).append( $item );
                //}
                if ( index === 5 ) {
                    $( ".carousel-control" ).css( {
                        opacity: 1
                    } );
                }
                ol.append( '<li data-target="#frontpageCarousel" data-slide-to="' + index + 1 + '">' );
            } );
            ol.prepend( '<li data-target="#frontpageCarousel" data-slide-to="0" class="active">' );
            //$scope.navigation = carouselLeft;
            $( '#frontpageCarousel' ).prepend( ol );
        }
    }
} ] );
