<div class="section scrollspy" id="work">
    <div class="container">

        <div class="row">
            <div class="col s12">
                <h4 class="header">Les billet</h4>
            </div>
            <?php echo $succe; ?>
            <section class="plans-container" id="plans">
                <?php
                if (!empty($listeBillet) && sizeof($listeBillet)>0){

                    foreach ($listeBillet as $prod){
                        ?>



                        <article class="col s12 m6 l4">

                            <form class="card hoverable" method='post' action='index.php?action=billet'>
                                <?php
                                if($prod->getType()=="VIP"){
                                    echo '<div class="card-image green waves-effect" style="width: 100%">
                                                <div class="card-title">'.$prod->getType().'</div>
                                                <div class="price"><sup>$</sup>'.$prod->getPrix().'</div>
                                                <div class="price-desc">+ Repas</div>
                                            </div>';
                                }elseif($prod->getType()=="BALCON"){
                                    echo '<div class="card-image cyan waves-effect" style="width: 100%">
                                            <div class="card-title">'.$prod->getType().'</div>
                                            <div class="price"><sup>$</sup>'.$prod->getPrix().'</div>
                                            <div class="price-desc">+ Boisson</div>
                                        </div>';
                                }else{
                                    echo '<div class="card-image purple waves-effect " style="width: 100%">
                                            <div class="card-title">'.$prod->getType().'</div>
                                            <div class="price"><sup>$</sup>'.$prod->getPrix().'</div>
                                            <div class="price-desc">Pas d\'avantage</div>
                                        </div>';
                                }
                                ?>

                                <div class="card-content">
                                    <input type='hidden' name='id' value = '<?php echo $idEvent ?>' >
                                    <input type='hidden' name='idBillet' value = '<?php echo $prod->getIdBillet() ?>' >
                                    <ul class="collection">
                                        <li class="collection-item">
                                            <div class="input-field col s12  m12 l12">
                                                <input id="<?php echo 'nom'.$prod->getType() ?>" type='text' name='nom' required >
                                                <label for="<?php echo 'nom'.$prod->getType() ?>" data-error="Veuillez saisir le nom svp !" data-success="Perfect!">Votre nom complet</label>
                                            </div>

                                        </li>
                                        <li class="collection-item">
                                            <div class="input-field col s12  m12 l12">
                                                <input id="<?php echo 'tel'.$prod->getType() ?>"type='text' name='tel' required >
                                                <label for="<?php echo 'tel'.$prod->getType() ?>" >Telephone</label>
                                            </div>
                                        </li>
                                        <li class="collection-item">
                                            <div class="input-field col s12  m12 l12">
                                                <input id="<?php echo 'mail'.$prod->getType() ?>" type='email' name='mail' required >
                                                <label for="<?php echo 'mail'.$prod->getType() ?>" >Votre email</label>
                                            </div>
                                        </li>
                                        <li class="collection-item">Mobile money : <?php echo $telEvent ?></li>
                                    </ul>
                                </div>
                                <div class="card-action center-align">
                                    <button class="waves-effect waves-light  btn" type="submit" name="addPanier">Acheter</button>
                                </div>

                            </form>
                        </article>

                        <?php
                    }
                }
                else{
                    echo "<div class=\"col s12\">
                            <h5 class=\"header\">Pas des billet disponible veuillez contactez l'organisateur de l'evenment pour plus d'information.  $telEvent </h5>
                        </div>";
                }

                ?>


                 </section>



        </div>


    </div>
</div>





