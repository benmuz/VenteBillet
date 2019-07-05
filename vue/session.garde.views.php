
<div id="intro" class="section scrollspy">
    <div class="container">

        <h4 class="header">Liste des utilisateur</h4>
        <div class="row">
            <?php
            setlocale(LC_ALL,'fr_FR', 'fra_FRA');
            if (!empty($listeEvenement) && sizeof($listeEvenement)>0){

                foreach ($listeEvenement as $prod){
                    echo "<form method='post' action='index.php?action=addBillet'>
                                <div class=\"col s12 m4 l4\">
                                    <div class=\"card\">
                                        <div class=\"card-image waves-effect waves-block waves-light\">
                                            <img class=\"activator\" src='content/image/".$prod->getPhoto()."' alt='".$prod->getNom()."'>
                                        </div>
                                        <div class=\"card-content\">
                                            <span class=\"card-title activator grey-text text-darken-4\">".$prod->getNom()." <i class=\"mdi-navigation-more-vert right\"></i></span>
                                            <button class='waves-effect waves-light light-blue btn' type='submit' name='scanPanier'>
                                            SCAN BILLET
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


<!--chart dashboard end-->

<script type="text/javascript">
    /*Show entries on click hide*/
    $(document).ready(function(){
        $(".dropdown-content.select-dropdown li").on( "click", function() {
            var that = this;
            setTimeout(function(){
                if($(that).parent().hasClass('active')){
                    $(that).parent().removeClass('active');
                    $(that).parent().hide();
                }
            },100);
        });
    });

</script>
