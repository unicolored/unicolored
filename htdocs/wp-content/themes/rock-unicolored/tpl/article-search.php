
<article class="article portfolio <?php echo (isset($id_current) && $id_current==get_the_ID()) ? 'currentpost' : false ?>" id="post-<?php echo get_the_ID() ?>" itemscope="" itemtype="http://schema.org/CreativeWork">
  <div class="thumbnail">
    <a itemprop="thumbnailUrl" class="image img-responsive text-center" href="<?php the_permalink() ?>" style="display:block; overflow:hidden; min-height:160px;"><?php the_post_thumbnail('vignette',array(
      'class' => "image-reponsive",
      'alt'   => trim( strip_tags( get_the_title() ) ))); ?></a>
    <div class="caption">
      <h5 itemprop="name"><a href="<?php the_permalink() ?>"><?php echo get_the_title() ?></a></h5>
      <div itemprop="about">
      <?php the_excerpt() ?>
    </div>
    </div>
  </div>
</article>
