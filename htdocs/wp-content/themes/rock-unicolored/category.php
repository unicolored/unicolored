<?php /*add_action( 'wp_enqueue_scripts', 'ScriptsEffetdeSurvol');*/ get_header(YESWEARE);?>
<div class="br_bonjour portfolio">
    <?php // Placer le code Html ci-dessous ?>
    <section class="articles paddit">
        <div class="container">
            <blockquote>
                <h1>
                  <?php br_Icon( 'folder') ?> Catégorie
                    <em>
                        <?php echo ucfirst(get_cat_name( get_query_var( 'cat'))) ?>
                    </em>
                </h1>
            </blockquote>
            <?php get_template_part( 'tpl/category', 'default') ?>
        </div>
    </section>
    <?php // Placer le code Html ci-dessus ?>
</div>
<?php get_footer(YESWEARE);?>
