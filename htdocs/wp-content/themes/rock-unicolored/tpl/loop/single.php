

	<?php if(has_post_thumbnail()) { ?>
		<section class="thumbnail">
			<?php the_post_thumbnail('large',array('class'=>'img-responsive'));?>
		</section>
	<?php
	} ?>	