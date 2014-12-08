<?php
$defaults = array('theme_location' => 'primary', 'container_class' => 'list-group', 'menu' => 'Top', 'depth' => 1, 'items_wrap' => '%3$s', 'walker' => new wp_bootstrap_listgroupwalker(), 'fallback_cb' => false, );

/* Html START */

echo a('aside.sidebar');

//wp_nav_menu($defaults);
/*
if (is_single()) {
    echo '
	<div class="panel-group" id="guide">
		<div class="panel panel-default" style="overflow:visible;">
			<div class="panel-heading">
				<h4 class="panel-title"><a data-toggle="collapse" data-parent="#guide" href="#collapseOne">' . br_getIcon('chevron-circle-right') . ' ' . __('Guide', 'bodyrock') . '</a></h4>
			</div>
			<div id="collapseOne" class="panel-collapse collapse">
				<div class="panel-body">';
    $_SESSION['lastpost_id'] = false;
    $_SESSION['lastpost_id'] .= '' . get_the_ID() . '';
	echo $_SESSION['lastpost_id'].'sdqdqsd';
    $_SESSION['lastpost_tags'] = '';
    $_SESSION['lastpost_cats'] = '';

    $posttags = get_the_tags();
    if ($posttags) {
        $i = 0;
        foreach ($posttags as $tag) {
            $i++;
            echo '#' . ucfirst($tag -> name) . '<br>';
            //vardump($_SESSION['lastpost_tags']);
            $_SESSION['lastpost_tags'] .= $tag -> name . ',';
        }
    }

    $categories = get_the_category();
    if ($categories) {
        $i = 0;
        foreach ($categories as $categorie) {
            $i++;
            echo '@' . ucfirst($categorie -> name) . '<br>';
            $_SESSION['lastpost_cats'] .= $categorie -> term_id . ',';
        }
    }

    echo '
				</div>
			</div>
		</div>
	</div>
	';
}
*/
//dynamic_sidebar('sidebar-left');

echo z('aside');
?>