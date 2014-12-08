<?php require( 'inc/setup_single.php'); global $image_src_thumbnail; get_header(YESWEARE);
?>
<div class="br_bonjour single">
  <?php // Placer le code Html ci-dessous ?>
  <section class="navigation">
    <div class="container">
      <?php echo $OB_SINGLE_NAVIGATION_ABSOLUTE; ?>
    </div>
  </section>
  <?php get_template_part( 'tpl/single', 'intro') ?>
  <section class="article">
    <div class="container">
      <?php get_template_part( 'tpl/article', 'attachment'); ?>
    </div>
    <section class="container">
      <div class="competences margeit">
        <?php echo $OB_SINGLE_ASIDE_TAGS ?>
      </div>
    </section>
  </section>
  <?php // Placer le code Html ci-dessus ?>
</div>
<?php get_footer(YESWEARE);?>
