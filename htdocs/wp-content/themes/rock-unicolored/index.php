<?php get_header(YESWEARE); ?>
<div class="br_bonjour index">
    <?php // Placer le code Html ci-dessous ?>
    <md-content class="md-padding">

          <md-card ng-repeat="article in articles" ng-init="loadArticles()" class="article portfolio <?php echo (isset($id_current) && $id_current==get_the_ID()) ? 'currentpost' : false ?>" id="post-<?php echo get_the_ID() ?>" itemscope="" itemtype="http://schema.org/CreativeWork">
            <a href="{{article.link}}" class="image-{{article.ID}}">
                <img ng-src="{{article.featured_image.source}}" class="md-card-image" alt="Washed Out">
            </a>
            <h5 itemprop="name"><a href="<?php the_permalink() ?>" ng-bind-html="article.title"></a></h5>
            <div itemprop="about" ng-bind-html="article.excerpt">
            </div>
          </md-card>

            <?php
            /*
            $args='posts_per_page=12&post_status=publish';

            // The Query
            $the_query = new WP_Query( $args );

            // The Loop
            if ( $the_query->have_posts() ) {
                while ( $the_query->have_posts() ) {
                    $the_query->the_post();
                    get_template_part('tpl/article','thumbnail');
                }
                wp_reset_postdata();
            }
            else { ?>
                <div class="alert alert-warning alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <strong><?php br_Icon('warning'); ?> Aucun article trouvé</strong> Placez des articles dans la catégorie "featured" pour qu'ils apparaissent ici.
                </div>
                <?php
            }*/
            ?>

    </md-content>
    <?php // Placer le code Html ci-dessus ?>
</div>

<?php get_footer(YESWEARE);?>
