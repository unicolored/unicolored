<?php /*add_action( 'wp_enqueue_scripts', 'ScriptsEffetdeSurvol');*/ get_header(YESWEARE);?>
<div class="br_bonjour blog">
    <?php // Placer le code Html ci-dessous ?>
    <section class="articles paddit">
        <div class="container">
          <aside class="blogsidebar-left">
              <h1><a href="/blog/">Blog</a></h1>
              <ul class="category_list">
            <?php wp_list_categories('orderby=name&child_of=1&title_li=&current_category=1&hide_empty='); ?>
          </ul>
          </aside>
          <section class="content">
            <?php get_template_part( 'tpl/category', 'blog') ?>
          </section>
            <aside class="blogsidebar-right">
                <form role="search" method="get" id="searchform" style="margin:5px 0;" action="/">
                  <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-addon">
                        <span class="icon-binoculars"></span>
                      </div>
                      <input type="text" class="form-control" value="" name="s" id="s" placeholder="Rechercher..."
                      />
                    </div>
                  </div>
                </form>
            </aside>
        </div>
    </section>
    <?php // Placer le code Html ci-dessus ?>
</div>
<?php get_footer(YESWEARE);?>
