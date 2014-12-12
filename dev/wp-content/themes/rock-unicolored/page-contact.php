<?php /* Template Name: Contact */ get_header(YESWEARE); ?>
<div class="br_bonjour contact">
    <?php // Placer le code Html ci-dessous ?>
    <section class="introduction paddit">
        <div class="container" itemscope itemtype="http://schema.org/ContactPoint">
            <div class="colonnegauche">
                <blockquote>
                    <h1>
                        <strong>Bonjour</strong>,
                        <em>je vous&nbsp; écoute :)</em>
                    </h1>
                    <h3>
                        <a href="tel:+33177174337" itemprop="telephone">
                            <?php br_Icon( 'phone') ?> 01 77 17 43 37</a>
                    </h3>
                    <h5>
                        <a href="mailto:contact@gilleshoarau.com" itemprop="email">
                            <?php br_Icon( 'envelope') ?> contact@gilleshoarau.com</a>
                    </h5>
                </blockquote>
                <p class="well">
                    <strong>Le meilleur moyen de me contacter est par téléphone</strong>.
                    Nous pourrons ainsi faire connaissance et parler de votre projet.
                    <br />
                    <br />
                    <strong>N’hésitez pas à me contacter</strong> pour poser une question,
                    me faire part d’une information, demander un rendez-vous, exprimer
                    une satisfaction ou formuler une critique constructive… Je
                    vous répondrai au plus&nbsp;vite.
                </p>
                <section class="formulaire">
                    <div data-contact="contact"></div>
                </section>
            </div>
            <div class="colonnedroite">
                <section class="map">
                    <blockquote itemprop="areaServed" itemscope itemtype="http://schema.org/AdministrativeArea">
                        <h1 itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">&laquo;&nbsp;
                            <strong>Retrouvez-moi</strong>
                            <em itemprop="addressLocality">à&nbsp;Paris</em>&nbsp;&raquo;</h1>
                        <h3 itemprop="streeAddress">Bld de Bonne nouvelle, X
                            <sup>ème</sup>
                            <abbr title="arrondissement">arr.</abbr>
                            <span class="hide" itemprop="postalCode">75010</span>
                        </h3>
                        <div itemprop="hoursAvailable" itemscope itemtype="http://schema.org/OpeningHoursSpecification"
                        class="hide">
                            <span itemprop="validFrom" content="2014-11-26">26 Novembre 2014</span>
                            <span itemprop="validThrough" content="2020-12-25">25 Décembre 2020</span>:
                            <span itemprop="opens" content="08:00">8h</span>-
                            <span itemprop="closes" content="19:00">19h</span>
                            </li>
                            <time itemprop="openingHours" datetime="Mo,Tu,We,Th,Fr 08:00-19:00">En semaine 8h-19h</time>
                        </div>
                    </blockquote>
                </section>
                <section class="socialicons paddit">
                    <blockquote class="blockquote-reverse">
                        <h3>
                            <strong>Rejoignez-moi</strong> sur les
                            <em>réseaux sociaux</em>
                        </h3>
                        <?php get_template_part( 'tpl/footer_section', 'socialicons'); ?>
                    </blockquote>
                    <p class="text-center paddit">
                        <img itemprop="image" class="img-circle img-responsive" style="margin:0 auto;"
                        src="https://gilleshoarau.com/img/ico/gravatar.<?php echo wp_get_theme()->Version ?>.jpg" alt="Gilles Hoarau"
                        />
                    </p>
                </section>
            </div>
        </div>
    </section>
    <?php // Placer le code Html ci-dessus ?>
</div>
<?php get_footer(YESWEARE);?>
