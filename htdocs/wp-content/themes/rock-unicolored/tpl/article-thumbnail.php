
<article class="article portfolio <?php echo (isset($id_current) && $id_current==get_the_ID()) ? 'currentpost' : false ?>" id="post-<?php echo get_the_ID() ?>" itemscope="" itemtype="http://schema.org/CreativeWork">
  <div class="thumbnail">
    <div class="portfolio-thumbnail image-<?php echo get_the_ID() ?>" style="min-height:160px; overflow:hidden;" href="<?php the_permalink() ?>">
      <?php the_post_thumbnail('vignette',array('class'=>'img-responsive')) ?>
    </div>

    <div class="caption">
      <h5 itemprop="name"><a href="<?php the_permalink() ?>"><?php echo get_the_title() ?></a></h5>
      <div itemprop="about">
        <?php the_excerpt() ?>
      </div>
    </div>
  </div>
</article>
