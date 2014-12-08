<?php
// CONSTRUCTION DE DONNEES
// (SERVICE) ICONES DE COMPETENCES
$competences = array();
$competences = array(
    'Design graphique + Infographie + Motion design + Mise en page + Retouche Photo + Développement Web + Graphisme 3D'=>array(
            "rubrique"=>'Logiciels',
            "icones"=>array(
                    'photoshop'=>'Photoshop',
                    'after-effects'=>'After Effects',
                    'indesign'=>'Indesign',
                    'lightroom'=>'Lightroom',
                    'illustrator'=>'Illustrator',
                    'blender'=>'Blender'
                    )
    ),

    'Blog + e-Commerce + Site administrable + Web design'=>array(
            "rubrique"=>'CMS',
            "icones"=>array(
                    'wordpress'=>'Wordpress',
                    'tumblr'=>'Tumblr',
                    'woo-commerce'=>'Woo Commerce',
                    'prestashop'=>'Prestashop',
                    'joomla'=>'Joomla',
                    'bootstrap'=>'Twitter Bootstrap',
                    )
    ),
    'Interactivité + Accessibilité + Ergonomie + Application'=>array(
            "rubrique"=>'Langages',
            "icones"=>array(
                    'php'=>'PHP',
                    'html5'=>'Html5',
                    'css3'=>'CSS3',
                    'less'=>'Less',
                    'angularjs'=>'AngularJS',
                    'jquery'=>'jQuery',
                    )
    ),

    'Environnement + Collaboration + Installation + Développement'=>array(
            "rubrique"=>'Environnements',
            "icones"=>array(
                    'bower'=>'Bower',
                    'git'=>'Git',
                    'yeoman'=>'Yeoman',
                    'grunt'=>'Grunt',
                    'nodejs'=>'NodeJS',
                    'phonegap'=>'Phonegap',
                  )
    ),
    'Serveurs + Mobile + Bases de données + Temps réel'=>array(
            "rubrique"=>'Serveurs',
            "icones"=>array(
                    'apache'=>'Apache',
                    'cordova'=>'Apache Cordova',
                    'xampp'=>'Xampp',
                    'mysql'=>'MySql',
                    'firebase'=>'Firebase',
                    'ubuntu'=>'Ubuntu',
                  )
    ),
    'Formation + Information + Technique + Veille + Tendances'=>array(
      "rubrique"=>'Formation / Veille',
      "icones"=>array(
        'github'=>'Github',
        'codeschool'=>'Code School',
        'nettuts'=>'tuts+',
        'smashingmagazine'=>'Smashing Magazine ',
        'cgcookie'=>'CG Cookie',
        'stackoverflow'=>'Stack Overflow',
      )
    ),

);

// (VIEW) BOUCLE DES ICONES
ob_start();
foreach($competences as $name => $items) {
    echo '
        <div class="mescompetences" itemscope itemtype="http://schema.org/JobPosting">
            <h3 itemprop="qualifications">'.$items['rubrique'].'</h3>
            <h4 itemprop="responsibilities">'.$name.'</h4>';
            echo '<div itemprop="skills">';
                foreach($items['icones'] as $file => $title) {
                    echo '<div class="competence"><span class="'.$file.'"><b>'.$file.'</b></span></div>';
                }
            echo '</div>
       </div>';
}
$COMPETENCES = ob_get_clean();
