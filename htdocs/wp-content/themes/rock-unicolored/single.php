<?php // require( 'inc/setup_single.php'); global $image_src_thumbnail, $is_blog, $is_gif;
get_header(YESWEARE);
?>
<div class="br_bonjour single" itemscope itemtype="http://schema.org/CreativeWork">
    <?php // Placer le code Html ci-dessous ?>
    <md-content class="article md-padding">

            <?php get_template_part( 'tpl/article', 'single'); ?>

    </md-content>
    <?php // Placer le code Html ci-dessus ?>
</div>
<?php get_footer(YESWEARE);?>
