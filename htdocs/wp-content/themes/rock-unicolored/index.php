<?php get_header(YESWEARE); ?>
<div class="br_bonjour index">
    <?php // Placer le code Html ci-dessous ?>
    <md-content>


      <div ng-view="">




</div>
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
