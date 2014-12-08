<?php /* HEADER */ get_header(YESWEARE); ?>
<div class="br_bonjour front-page">
    <!-- Placer le code Html ci-dessous -->
    <section class="jumbo resize paddit-top">
        <div class="jumbotron" itemscope itemtype="http://schema.org/Person">
            <div class="galaxie">
                <div class="slogan-gilles">
                    <div class="flexthat">
                        <h1 class="nom">Gilles Hoarau</h1>
                        <h3 class="fonction">
                            <strong itemprop="jobTitle">Directeur artistique</strong>
                            <span class="domaine">Graphic &amp; Web Design</span>
                            <span class="hide">
                                <span itemprop="workLocation">
                                    <span itemscope itemtype="http://schema.org/Place">
                                        <strong itemprop="address">Paris</strong>
                                    </span>
                                </span>,
                                <span itemprop="nationality">France</span>
                        </h3>
                    </div>
                </div>
                <div class="slogan-conseil" itemprop="owns">
                    <blockquote itemscope itemtype="http://schema.org/Product">
                        <h1 itemprop="description">Le
                            <strong>conseil marketing</strong>,
                            <br /> la
                            <strong>création visuelle</strong>
                            <br /> et la
                            <strong>conception de&nbsp;sites&nbsp;Web</strong>
                            <br /> sont
                            <em>à votre disposition</em>
                        </h1>
                    </blockquote>
                </div>
            </div>
            <div class="galaxie">
                <?php get_template_part( 'tpl/frontpage', 'carousel'); ?>
            </div>
        </div>
    </section>
    <div class="container text-center">
      <a id="godown" href="#services" style="z-index:0; position:relative; top:0px;" data-start="top:-120px; opacity:1" data-100="top:-100px; opacity:0">
      -- &nbsp; <span class="icon-download"></span> &nbsp; --
    </a>
    </div>
    <section class="services">
        <div class="container">
            <div id="services" class="messervices">
                <?php get_template_part( 'tpl/section', 'services') ?>
            </div>
            <div class="monexperience">
                <blockquote class="blockquote-reverse" itemscope itemtype="http://schema.org/Product">
                    <h3 itemprop="description">&laquo;&nbsp;
                        <strong>10&nbsp;ans d'expériences</strong>
                        <br />dans la
                        <strong>communication</strong>
                        <br />et le
                        <em>développement Web</em>&nbsp;&raquo;</h3>
                </blockquote>
            </div>
        </div>
    </section>
    <section class="portfolio">
        <div class="container" itemscope itemtype="http://schema.org/JobPosting">
            <h3 class="text-center text-warning paddit hide" itemprop="description">
                <?php br_Icon( 'warning-sign'); ?>
                <strong>Créatif</strong> très averti</h3>
            <div class="experiences">
                <dl>
                    <dt itemprop="qualifications">
                        <?php br_Icon( 'ok') ?>
                        <strong>8 ans</strong> en
                        <em>agence de&nbsp;communication</em>
                    </dt>
                    <dd itemprop="skills">Un savoir-faire global, une efficacité&nbsp;prouvée</dd>
                    <dt itemprop="qualifications">
                        <?php br_Icon( 'ok') ?>
                        <strong>Autonome</strong>,
                        <strong>polyvalent</strong> et&nbsp;
                        <em>rigoureux</em>
                    </dt>
                    <dd itemprop="skills">Un indépendant qui aime
                        <em>aussi</em> le travail en&nbsp;équipe</dd>
                </dl>
            </div>
            <div class="lecarousel">
                <dl>
                    <dt itemprop="qualifications">
                        <?php br_Icon( 'ok') ?>
                        <strong>Autodidacte</strong> formé à
                        <em>toutes les&nbsp;situations</em>
                    </dt>
                    <dd itemprop="skills">Pouvoir s'adapter en temps réel, ou&nbsp;presque</dd>
                    <dt itemprop="qualifications">
                        <?php br_Icon( 'ok') ?>
                        <strong>Membre du collectif</strong> de
                        <em>créatifs&nbsp;OBSCD</em>
                    </dt>
                    <dd itemprop="skills">D'ingénieux cooéquipiers pour les projets&nbsp;ambitieux</dd>
                </dl>
            </div>
        </div>
    </section>
    <section class="clients">
        <div class="container">
            <h3 class="text-center text-info">
                <?php br_Icon( 'signal'); ?>
                <strong>100% des clients satisfaits</strong> sont satisfaits</h3>
            <h4 class="text-center paddit-bottom">&laquo; Les autres pensent que ce n'était pas assez cher &raquo;</h4>
            <div class="satisfaits">
                <section class="citation">
                    <blockquote>
                        <h3>&laquo;&nbsp;Une large variété
                            <br />
                            <strong> de prestations</strong>
                            <br />pour
                            <em>tous les budgets</em>&nbsp;&raquo;</h3>
                    </blockquote>
                </section>
            </div>
            <div class="lesclients">
                <?php get_template_part( 'tpl/section', 'clients') ?>
            </div>
        </div>
    </section>
    <div class="container text-center">
      <a id="gofooter" href="#footer" style="z-index:0; position:relative; top:0px;" data-bottom-start="top:-120px; opacity:1" data-bottom-100="top:-100px; opacity:0">
        -- &nbsp; <span class="icon-download"></span> &nbsp; --
      </a>
    </div>
    <?php // Placer le code Html ci-dessus ?>
</div>
<div id="footer" class="br_footer resize">
  <section class="citation paddit-bottom">
    <div class="container">
      <?php get_template_part( 'tpl/footer_section', 'contact'); ?>
    </div>
  </section>
</div>
<?php get_footer(YESWEARE); ?>
