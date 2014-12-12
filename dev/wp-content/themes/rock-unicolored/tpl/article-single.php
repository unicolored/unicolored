<article <?php post_class('article single'); ?>>

        <?php // echo $OB_SINGLE_POST_FORMAT; ?>


            <h1 itemprop="name"><?php the_title() ?></h1>
            <div itemprop="text">
              <?php the_content(); ?>
            </div>
            <div itemprop="creator" itemscope itemtype="http://schema.org/Person" class="hide">
                <span itemprop="name">Gilles Hoarau</span>,
                <span itemprop="jobTitle">Directeur artistique</span> à
                <span itemprop="homeLocation" itemscope itemtype="http://schema.org/Place">
                  <span itemprop="address" itemscope itemtype="PostalAddress">
                    <span itemprop="addressLocality">Paris</span>
                  </span>
                </span>
              </div>
            <hr class="clearfix" />



</article>
