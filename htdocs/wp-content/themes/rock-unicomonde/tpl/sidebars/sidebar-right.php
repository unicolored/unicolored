
<?php
echo a('aside.sidebar-right');
	echo a('aside.main');
	
		// GESTION DES CATEGORIES DU POST
		$post_categories = wp_get_post_categories(get_the_ID());
		$categories_titres = '';
		$i = 1;
		foreach ($post_categories as $c) {
			$cat = get_category($c);
			$categories_titres .= ($i > 1 ? ', ' : false) . $cat -> name;
			$i++;
		}
		?>
		<h2 class="h-int">Egalement dans<br>la catégorie <?php echo $categories_titres ?></h2>
		<?php
		/*Articles similaires*/
		$instance_similaires = array(
		'titre' => "Articles similaires",
		'titre_icone' => 'list',
		'name' => 'articlessimilaires',
		'class' => 'wrap-similaires',
		'filtres_off' => false,
		'filtres_combien' => 9,
		'contenu_footer_masquer' => true,
		'vignette_dimensions' => "medium",
		'vignette_background' => "on",
		'filtres_orderby'=>'orderby_rand',
		'affichage_modele' => 'affichage_modele_thumbnail',
		'filtres_similaires_selon' => 'cats',
		'filtres_article_reference' => get_the_ID(),
		'filtres_ignoreposts' => array(get_the_ID()),
		'ajax' => false
		);
		$post_categories = wp_get_post_categories( get_the_ID() );
		foreach($post_categories as $c) {	
			$instance_similaires['filtres_categories_'.$c] = "on";
		}
		//vardump($instance_similaires);}
		the_widget('br_widgetsBodyloop',$instance_similaires);
		
		
		
		dynamic_sidebar('sidebar-right');
		
	echo z('aside');
echo z('aside');
?>