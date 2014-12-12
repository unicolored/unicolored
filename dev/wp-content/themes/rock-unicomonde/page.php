<?php
get_header();
/************** HTML START **************/


echo a('section.content.page');
echo a('section.main');

	if ( have_posts() ) :
	
		while ( have_posts() ) :
		
			the_post();
			setPostViews(get_the_ID());	
			get_template_part(TPL_SINGULAR_PATH.'page');
			
		endwhile;
		
	else:
	
		echo '<p>'.__('Sorry, no posts matched your criteria.').'</p>';
		
	endif;
	
echo z('section');
	
echo z('section');

	
get_footer();
?>