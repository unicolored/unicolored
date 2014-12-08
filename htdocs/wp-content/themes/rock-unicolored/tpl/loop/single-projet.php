<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<div class="designed">
	<div class="container">
    
		<div class="line">
        	<?php dynamic_sidebar('top'); ?>
        	<?php get_template_part('tpl/loop/parts/single','header'); ?>     
                  
            <div class="center">
            	<hr class="margin" />
            	<?php get_template_part('tpl/loop/parts/single-content','gallery'); ?>
            </div>
            <hr class="clearfix" />
		</div>
            
		<div class="line">
            <div class="span4">
            	<?php get_template_part('tpl/loop/parts/single','sidebar'); ?>
            </div>
        </div>
		
		<span class="overlay"></span>        
	</div>
</div>
<?php endwhile; // end of the loop. ?>