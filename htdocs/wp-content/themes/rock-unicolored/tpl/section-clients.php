<?php
// CONSTRUCTION DE DONNEES
ob_start();
$args = array(
	'post_type' => 'attachment',
	'numberposts' => 15,
	'post_status' => null,
	'post_parent' =>   get_page_by_path('references') -> ID,
	'orderby' => 'rand',
	'order' => 'ASC',
);

$attachments = get_posts($args);
$nb_att = count($attachments);


$circle = false;
// Si ce n'es pas Internet Explorer
if(strstr($_SERVER['HTTP_USER_AGENT'],'MASBJS')==false) {
	$circle = 'img-circle'; // Ajout d'une classe aux images.
}

$mesreferences[0] = array('andra','centrehospitalier','marchedeshalles');
$mesreferences[1] = array('aube','grandtroyes','troyesexpocube');
$mesreferences[2] = array('grdf','mcdonalds','nigloland');
$mesreferences[3] = array('champagne-clerambault','champagne-jacques-chaput','champagne-phillipe-fourrier');
$mesreferences[4] = array('reims','foyer-remois','plurial');



	$i = 0;
	foreach ($mesreferences as $reference) {
			echo '<div class="item ' . ($i == 0 ? 'active' : false) . '">'.'
<div class="logo-client" itemscope="itemscope" itemtype="https://schema.org/Brand">
<span class="imageclient '.$reference[0].'"></span>
</div>

<div class="logo-client" itemscope="itemscope" itemtype="https://schema.org/Brand">
<span class="imageclient '.$reference[1].'"></span>
</div>

<div class="logo-client" itemscope="itemscope" itemtype="https://schema.org/Brand">
<span class="imageclient '.$reference[2].'"></span>
</div>'. '</div>';
			$i++;
	}
	/*
for ($i = 0; $i < count($items)-3; $i += 3) {
echo '<div class="item ' . ($i == 0 ? 'active' : false) . '">' . (isset($items[$i]) ? $items[$i] : false) . (isset($items[$i + 1]) ? $items[$i + 1] : false) . (isset($items[$i + 2]) ? $items[$i + 2] : false) . '</div>';
}*/
$CAROUSEL_ITEMS = ob_get_clean();
?>

<div id="frontpageCarousel-clients" class="carouselClients" data-ride="carousel">
<div class="carousel-inner">
<?php echo $CAROUSEL_ITEMS; ?>
</div>
<a class="left carousel-control" href="#frontpageCarousel-clients" role="button" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
<a class="right carousel-control" href="#frontpageCarousel-clients" role="button" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
</div>
