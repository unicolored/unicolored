<?php
ob_start();
/*
if (get_query_var('paged') == false || get_query_var('paged') == 1) {
	echo '<a class="btn btn-default disabled"></a>';
}*/
echo '<hr class="clearfix">';
posts_nav_link(' ', br_getIcon('chevron-left') . ' Retour', 'Suite ' . br_getIcon('chevron-right') );
$OB_POSTS_NAV_LINK = ob_get_clean();

$OB_POSTS_NAV_LINK = str_replace('<a ','<li><a class="btn btn-primary" ', $OB_POSTS_NAV_LINK);
$OB_POSTS_NAV_LINK = str_replace('</a> ','</li></a>', $OB_POSTS_NAV_LINK);
$OB_POSTS_NAV_LINK = '<ul class="pager">'.$OB_POSTS_NAV_LINK.'</ul>';

echo $OB_POSTS_NAV_LINK;
?>