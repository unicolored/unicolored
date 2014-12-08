<hr class="margin">
<nav class="navbar navbar-default navbar-unfixed" role="navigation">
	<!-- Brand and toggle get grouped for better mobile display -->
	<div class="navbar-header hidden">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="<?php echo bloginfo('url') ?>"><?php echo bloginfo('name') ?></a>
		<p class="navbar-text"><?php echo bloginfo('description') ?></p>		
	</div>
	
	<!-- Collect the nav links, forms, and other content for toggling -->
	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		<?php 
		echo a('div');
		wp_nav_menu( array(
			'menu'       => 'primary',
			'theme_location' => 'primary',
			'depth'      => 2,
			'container'  => false,
			'menu_class' => 'nav navbar-nav',
			'fallback_cb' => 'br_menu_default',
			'walker' => new wp_bootstrap_navwalker())
		);
		echo z('/div');
		?>
	</div><!-- /.navbar-collapse -->
</nav>