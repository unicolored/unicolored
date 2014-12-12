<?php get_header(YESWEARE); ?>
<div class="br_bonjour index">
    <?php // Placer le code Html ci-dessous ?>
    <section class="intro">
        <div class="wrapflex">
            <blockquote>
            <h1>
                <?php the_title() ?>
            </h1>
          </blockquote>
        </div>
    </section>
    <section class="cadre-inverse">
        <div class="conteneur">
            <?php get_template_part( 'tpl/index', 'default') ?>
        </div>
    </section>
    <section class="cadre">
        <div class="container">
            <?php get_template_part( 'tpl/article', 'lorem'); ?>
        </div>
    </section>
    <section class="cadre">
        <div class="conteneur">
            <?php get_template_part( 'tpl/index', 'loop') ?>
        </div>
    </section>
    <?php // Placer le code Html ci-dessus ?>
</div>
<?php get_footer(YESWEARE);?>
