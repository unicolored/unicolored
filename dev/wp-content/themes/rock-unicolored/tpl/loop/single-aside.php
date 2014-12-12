<article id="post-<?php the_ID(); ?>" <?php post_class('single'); ?>>
	
    <section class="article-media">
    	<?php the_post_thumbnail('large',array('class'=>'img-responsive'));?>
    </section>

    <?php echo get_template_part('tpl/loop/parts/single-header'); ?>
    
    <section class="article-content">
        <?php the_content(); ?>
          
    </section>
    
    <?php echo get_template_part('tpl/loop/parts/single-footer'); ?>
    
</article>
<?php echo get_template_part('tpl/loop/parts/single-comment'); ?>