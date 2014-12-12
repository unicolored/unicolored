<?php get_header(YESWEARE); /* Génération du portfolio */ ob_start(); get_template_part(
'tpl/category', 'portfolio'); $PORTFOLIO=ob_get_clean(); ?>
<div class="br_bonjour portfolio">
    <?php // Placer le code Html ci-dessous ?>
    <section class="articles paddit">
        <div class="container">
            <blockquote>
                <h1>&laquo;&nbsp; Du
                    <strong>
                        <a href="#post-5322" class="portfolmanz">Print</a>,
                        <a href="#post-5418" class="portfolmanz">des logos</a>
                    </strong>
                    <br />et des
                    <a href="#post-5328" class="portfolmanz">
                        <em>sites&nbsp;Internet</em>
                    </a>&nbsp;&raquo;</h1>
            </blockquote>
            <?php echo $PORTFOLIO; ?>
        </div>
    </section>
    <?php // Placer le code Html ci-dessus ?>
</div>
<?php get_footer(YESWEARE);?>
