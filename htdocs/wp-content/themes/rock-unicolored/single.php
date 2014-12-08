<?php require( 'inc/setup_single.php'); global $image_src_thumbnail, $is_blog, $is_gif; get_header(YESWEARE);
?>
<div class="br_bonjour single" itemscope itemtype="http://schema.org/CreativeWork">
    <?php // Placer le code Html ci-dessous ?>
    <?php if($is_blog === true) { ?>
    <section class="navigation">
        <div class="container">
            <?php echo $OB_SINGLE_NAVIGATION_ABSOLUTE; ?>
        </div>
    </section>
    <?php get_template_part( 'tpl/single', 'intro') ?>
    <section class="article">
        <div class="container">
            <?php get_template_part( 'tpl/article', 'single'); ?>
        </div>
        <section class="container">
            <div class="competences margeit" itemprop="keywords">
                <?php echo $OB_SINGLE_ASIDE_TAGS ?>
            </div>
        </section>
    </section>
    <hr/>
    <section class="portfolio margeit">
        <div class="container" itemprop="exampleOfWork">
            <?php get_template_part( 'tpl/category', 'portfolio'); ?>
        </div>
    </section>
    <?php } elseif ($is_gif)
    <?php // Placer le code Html ci-dessus ?>
</div>
<?php get_footer(YESWEARE);?>
