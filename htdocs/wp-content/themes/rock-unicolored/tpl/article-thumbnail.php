<md-card class="article portfolio <?php echo (isset($id_current) && $id_current==get_the_ID()) ? 'currentpost' : false ?>" id="post-<?php echo get_the_ID() ?>" itemscope="" itemtype="http://schema.org/CreativeWork">
  <a href="<?php the_permalink() ?>" class="portfolio-thumbnail image-<?php echo get_the_ID() ?>">
    <?php the_post_thumbnail('medium',array('class'=>'img-responsive md-card-image')); ?>
  <!-- <img src="https://placekitten.com/g/324/224" class="md-card-image" alt="Washed Out"> -->
  </a>
  <h5 itemprop="name"><a href="<?php the_permalink() ?>"><?php echo get_the_title() ?></a></h5>
  <div itemprop="about">
    <?php the_excerpt() ?>
  </div>
</md-card>
