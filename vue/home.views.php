
<!--Hero-->
<div class="section no-pad-bot" id="index-banner">
    <div class="container">
        <h1 class="text_h center header cd-headline letters type">
            <span>Gerer</span>
            <span class="cd-words-wrapper waiting">
                <b class="is-visible">vos evenement</b>
                <b>vos ventes</b>
                <b>votre espace</b>
            </span>
        </h1>
    </div>
</div>

<!--Intro and service-->
<div id="intro" class="section scrollspy">
    <div class="container">
        <div class="row">
            <div  class="col s12">
                <h2 class="center header text_h2">Contactez-nous à <span class="span_h2"> info@lepointdevente.com   </span>ou au <span class="span_h2"> 1-855-550-7469 </span> et il nous fera plaisir de vous expliquer la marche à suivre afin de vendre vos billets d'événement en ligne facilement!  </h2>
            </div>

            <div  class="col s12 m4 l4">
                <div class="center promo promo-example">
                    <i class="mdi-image-flash-on"></i>
                    <h5 class="promo-caption">Récoltez l'argent
                        directement dans votre compte</h5>
                    <p class="light center">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Cum sociis natoque penatibus et magnis dis parturient montes.</p>
                </div>
            </div>
            <div class="col s12 m4 l4">
                <div class="center promo promo-example">
                    <i class="mdi-social-group"></i>
                    <h5 class="promo-caption">Joignez la force d'un réseau</h5>
                    <p class="light center">Soyez vu par des centaines de milliers de visiteurs sur notre site web

                        Augmentez votre visibilité en réservant un bandeau sur notre site web

                        Profitez du travail de notre équipe sur les réseaux sociaux

                        Nos listes d'envoi sont à votre disposition</p>
                </div>
            </div>
            <div class="col s12 m4 l4">
                <div class="center promo promo-example">
                    <i class="mdi-social-public"></i>
                    <h5 class="promo-caption">Pour tous les types d'événements
                        Peu importe l'envergure</h5>
                    <p class="light center">À votre site web
                        Personnalisez et intégrez notre « widget » sur votre page web et vendez sans redirection

                        À votre page Facebook
                        Utilisez notre application Facebook pour vendre directement sur votre page « fan ».</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Work-->
<div class="section scrollspy" >
    <div class="container">
        <h2 class="header text_b" id="work">Événements à venir </h2>
        <div class="row">
            <?php
            setlocale(LC_ALL,'fr_FR', 'fra_FRA');
                if (!empty($listeEvenement) && sizeof($listeEvenement)>0){

                    foreach ($listeEvenement as $prod){
                        echo "<form method='post' action='index.php?action=billet'>
                                <div class=\"col s12 m4 l4\">
                                    <div class=\"card\">
                                        <div class=\"card-image waves-effect waves-block waves-light\">
                                            <img class=\"activator\" src='content/image/".$prod->getPhoto()."' alt='".$prod->getNom()."'>
                                        </div>
                                        <div class=\"card-content\">
                                            <span class=\"card-title activator grey-text text-darken-4\">".$prod->getNom()." <i class=\"mdi-navigation-more-vert right\"></i></span>
                                            <button class='waves-effect waves-light light-blue btn' type='submit' name='submit'>
                                            Acheter billet
                                            </button>

                                            
                                        </div>
                                        <div class=\"card-reveal\">
                                            <span class=\"card-title grey-text text-darken-4\">".$prod->getNom()." <i class=\"mdi-navigation-close right\"></i></span>
                                            <input type='hidden' name='id' value = '".$prod->getIdEvenement()."' >
                                            ".$prod->getDescription()."<br/>
                                            date :".strftime('%A %m %B %Y', strtotime($prod->getDate()))."<br/>
                                            debut : ".$prod->getDebut()."<br/>
                                            fin : ".$prod->getFin()."<br/>
                                            adresse : ".$prod->getAdresse()."<br/>
                                            
                                        </div>
                                    </div>
                                </div>
                                </form>
";

                    }
                }


             ?>


        </div>
    </div>
</div>


<!--Parallax-->
<div class="parallax-container">
    <div class="parallax"><img src="vue/images/parallax1.png"></div>
</div>




