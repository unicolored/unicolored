<div class="contentsingle grayback">
    <article id="post-<?php the_ID(); ?>" <?php post_class('single'); ?>>
        <section>
	        <?php if(get_post_format()!='quote' && get_post_format()!='gallery' && get_post_format()!='image' && get_post_format()!=false) the_post_thumbnail('large'); ?>
            <?php
            if(!is_attachment() && get_post_format()!='quote') { echo '<hr class="margin" />'; the_content(); } ?>
        </section>	
        <footer>
          <?php

	if (!is_attachment() && !is_category(389))
	{
	?>
            <div class="motscles">
                <b class="title">Mots clés :</b> <?php echo get_the_tag_list('<span>',' ','</span>'); ?>
            </div>
	<?php
	}
	?>
            <div class="partager">
                <b class="title">Partager :</b> <a href="#" class="addthis_button_email">email</a> • <a href="#" class="addthis_button_facebook">facebook</a> • <a href="http://www.addthis.com/bookmark.php" class="addthis_button_twitter" tw:via="unicolored" tw:related="addthis">twitter</a><!-- • <a href="#" class="addthis_button_google_plusone">google+</a>-->
            </div>
        </footer>
    </article>
    <hr class="clearfix"/>
    <?php comments_template( '', true ); ?>
    <hr class="clearfix"/>
    <hr class="clearfix margin"/>
    <ul class="pager">
        <li class="previous"><?php previous_post_link( '%link', __( '<span class="meta-nav">&larr;</span> Précédent', 'twentyeleven' ) ); ?></li>
        <li class="next"><?php next_post_link( '%link', __( 'Suivant <span class="meta-nav">&rarr;</span>', 'twentyeleven' ) ); ?></li>
    </ul><!-- #nav-single -->	
</div>