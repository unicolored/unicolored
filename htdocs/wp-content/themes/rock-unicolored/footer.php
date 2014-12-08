<div class="br_header">
  <?php get_template_part( 'tpl/bs_navbar', 'top');?>
  <div data-nav:bot="NavbotCtrl"></div>
  <div data-modal:app="ModalAppCtrl" class="modals"></div>
</div>

  <?php
  if(YESWEARE != "dev") { ?>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src="/js/scripts.<?php echo wp_get_theme()->Version ?>.min.js"></script>
    <?php
  } else {
  gh_head(); gh_footer();
} ?>

  <script type="application/ld+json">{ "@context": "http://schema.org", "@type": "WebSite", "url": "https://gilleshoarau.com/",
  "potentialAction": { "@type": "SearchAction", "target": "https://gilleshoarau.com/?s={search_term}",
  "query-input": "required name=search_term" } }</script>

  <script type="text/javascript">
  /* <![CDATA[ */
  generated =
  "<?php echo (substr((microtime(true) - $_SERVER['REQUEST_TIME_FLOAT']),0,4)*1000) ?>";
  version = "<?php echo wp_get_theme()->Version ?>";
  /* ]]> */
  </script>
</body>
</html>
