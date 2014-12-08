<?php /* Template Name: Services & Compétences */ require(
'inc/setup_services.php'); get_header(YESWEARE); ?>
<div class="br_bonjour about">
    <?php // Placer le code Html ci-dessous ?>
    <section class="jumbo paddit-top">
        <div class="container">
            <blockquote class="blockquote-reverse">
                <h1>&laquo;&nbsp;Mes
                    <strong>compétences</strong>
                    <br />au
                    <em>service de votre entreprise</em>&nbsp;&raquo;</h1>
            </blockquote>
        </div>
    </section>
    <section class="services">
        <div class="container">
            <?php get_template_part( 'tpl/section', 'services') ?>
        </div>
    </section>
    <section class="competences paddit-top resize">
        <div class="container" style="margin:0 auto;">
            <blockquote>
                <h1>&laquo;&nbsp;Spécialisé en&nbsp;
                    <strong>polyvalence</strong>
                    <br />pour
                    <em>répondre à &nbsp;vos&nbsp;besoins</em>&nbsp;&raquo;</h1>
            </blockquote>
            <?php echo $COMPETENCES ?>
        </div>
    </section>
    <?php // Placer le code Html ci-dessus ?>
</div>
<?php get_footer(YESWEARE);?>
