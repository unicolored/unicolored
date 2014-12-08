
<article class="article blog <?php echo (isset($id_current) && $id_current==get_the_ID()) ? 'currentpost' : false ?>" id="post-<?php echo get_the_ID() ?>" itemscope="" itemtype="http://schema.org/CreativeWork">
    <div class="panel">
        <div class="panel-heading">
            <h2 itemprop="name"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
            <div class="metas">
              par <a href="#">Gilles Hoarau</a> • Tags : <a href="#">Photoshop</a>, <a href="#">Concours</a> • <a href="#">5 commentaires</a>
            </div>
        </div>
        <div class="panel-body">
        <div class="image-<?php echo get_the_ID() ?>" href="<?php the_permalink() ?>">
          <?php the_post_thumbnail('medium',array('class'=>'img-responsive img-thumbnail')) ?>
        </div>
      </div>
      <div class="panel-body">
            <div itemprop="about" class="lead">
                <?php the_excerpt() ?>
            </div>
          </div>
          <div class="panel-footer">
            <a href="#" class="btn btn-info">Lire la suite</a>
          </div>
    </div>
</article>
