<?php
global $current_user;
get_currentuserinfo();
?>
<nav class="navbar navbar-default navbar-fixed-bottom navbar-inverse" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div>
    
	
    <div class="navbar-inverse-collapse navbar-ex1-collapse">
        <!--<button type="button" class="btn btn-default navbar-btn pull-right"><span class="glyphicon glyphicon-user"></span> <?php echo $current_user->user_login; ?></button>-->
		<ul class="nav navbar-nav">
			<?php
//			for($i=1;$i<=6;$i++) {
			if(isset($_SESSION['br_lastviews'])) {
				$post_id = $_SESSION['br_lastviews'];
//				vardump($post_id);
				for($i=5;$i>=0;$i--) {
//				foreach($articles as $post_id) {
					//echo $post_id[$i];
//					echo 'da'.$i.'::'.$post_id[$i].'!!';
					if($post_id[$i]!=false) {
						$format = get_post_format($post_id[$i]);
						
						if(strpos($post_id[$i],'tag:')===0) {
							$x = explode(':',$post_id[$i]);
							$tag = $x[1];
							?>
							<li>
								<a class="link_item" href="/projets/<?php echo $tag ?>" data-toggle="tooltip" title="<?php echo get_query_var('tag')==$tag ? 'Vous êtes ici' : ucfirst($tag) ?>">
									<div class="nav_item <?php echo get_query_var('tag')==$tag ? 'active' : false ?>">
										<h3><?php br_Icon('tag') ?></h3> 
									</div>
								</a>
							</li>
							<?php							
						}
						elseif(strpos($post_id[$i],'search:')===0) {
							$x = explode(':',$post_id[$i]);
							$search = $x[1];
							?>
							<li>
								<a class="link_item" href="/?s=<?php echo $search ?>" data-toggle="tooltip" title="<?php echo get_query_var('s')==$search ? 'Vous êtes ici' : ucfirst($search) ?>">
									<div class="nav_item <?php echo get_query_var('s')==$search ? 'active' : false ?>">
										<h3><?php br_Icon('search'); echo '<br><em>'.$search.'</em>' ?> </h3> 
									</div>
								</a>
							</li>
							<?php							
						}
						elseif(strpos($post_id[$i],'cat:')===0) {
							$x = explode(':',$post_id[$i]);
							$cat = get_category($x[1]);
							?>
							<li>
								<a class="link_item" href="<?php echo get_category_link($cat->term_id) ?>" data-toggle="tooltip" title="<?php echo ucfirst($cat->name) ?>">
									<div class="nav_item <?php echo get_query_var('cat')==$cat ? 'active' : false ?>">
										<h3><?php br_Icon($cat->slug) ?><br><?php echo ucfirst($cat->name) ?></h3> 
									</div>
								</a>
							</li>
							<?php							
						}
						elseif(get_post_type($post_id[$i]) == 'page') {
							//echo 'page';
							//echo $post_id[$i];
							$thispage = get_post( $post_id[$i] );
							?>
							<li>
								<a class="link_item" href="<?php echo get_permalink($post_id[$i]); ?>" data-toggle="tooltip" title="<?php echo strip_tags(get_the_title($post_id[$i])); ?>">
									<div class="nav_item <?php echo get_the_ID()==$post_id[$i] ? 'active' : false ?>">
										<h3><?php br_Icon($format) ?></h3> 
									</div>
								</a>
							</li>
							<?php
						}
						elseif(get_post_type($post_id[$i]) == 'post') {
							//echo 'single';
							
							$span = false;
							$image = br_getPostThumbnail('thumbnail',false,$post_id[$i]);
//							echo $image_src[0];
							?>
							<li>
								<a class="link_item" href="<?php echo get_permalink($post_id[$i]); ?>" data-toggle="tooltip" title="<?php echo strip_tags(get_the_title($post_id[$i])); ?>">
									<div class="nav_item <?php echo get_the_ID()==$post_id[$i] ? 'active' : false ?>" style="background-image:url(<?php echo $image['src'] ?>);">
										<?php
										if ( $image['src'] == false ) {
											echo '<h3>'.br_getIcon('film').'</h3>';
										} ?>
									</div>
								</a>
							</li>
							<?php
						}
						elseif(get_post_type($post_id[$i]) == 'attachment') {
							//echo 'attachment';
							// TO FIX
							?>
							<li>
								<a class="link_item" href="<?php echo get_permalink($post_id[$i]); ?>" data-toggle="tooltip" title="<?php echo get_the_title($post_id[$i]); ?>">
									<div class="nav_item <?php echo get_the_ID()==$post_id[$i] ? 'active' : false ?>">
										<?php echo get_the_title($post_id[$i]); ?>
									</div>
								</a>
							</li>
							<?php
						}
					}
				}
			}
			?>
		</ul>
			<?php
	debugStructure(); // Affiche des colonnes, des galaxies.
	?>
    </div>

</nav>
