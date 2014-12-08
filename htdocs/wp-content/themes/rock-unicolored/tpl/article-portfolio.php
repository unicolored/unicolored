
<article class="article portfolio <?php echo (isset($id_current) && $id_current==get_the_ID()) ? 'currentpost' : false ?>" id="post-<?php echo get_the_ID() ?>" itemscope="" itemtype="http://schema.org/CreativeWork">
    <div class="thumbnail">
        <div class="portfolio-thumbnail image-<?php echo get_the_ID() ?>" data-image:portfolio="<?php the_ID() ?>" style="min-height:160px" data-url="<?php the_permalink() ?>" data-imageurl="<?php global $images; echo $images[get_the_ID()]['url'] ?>"></div>

        <div class="caption">
            <h5 itemprop="name"><a href="<?php the_permalink() ?>"><?php echo get_the_title() ?></a></h5>
            <div itemprop="about">
                <?php the_excerpt() ?>
            </div>
        </div>
    </div>
</article>
