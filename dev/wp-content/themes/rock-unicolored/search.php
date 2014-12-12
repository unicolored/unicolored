<?php get_header(YESWEARE); ?>
<div class="br_bonjour index">
    <?php // Placer le code Html ci-dessous ?>
    <section class="intro paddit-top">
        <div class="container">
          <blockquote>
            <h1>
                Trouver "<em><?php echo get_query_var('s') ?></em>"
            </h1>
          </blockquote>
        </div>
    </section>
    <section class="cadre-inverse">
      <div class="container">
        <?php get_template_part( 'tpl/index', 'default') ?>
      </div>
    </section>
    <?php // Placer le code Html ci-dessus ?>
</div>
<?php get_footer(YESWEARE);?>
