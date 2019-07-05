<div class="section scrollspy" id="work">
    <div class="container">

        <div class="row">
            <div class="col s12">
                <h4 class="header">Activer billet</h4>
            </div>

            <section class="plans-container" id="plans">
                <article class="col s12 m6 l4">

                            <form class="card hoverable" method='post' action='index.php?action=addBillet'>

                                <div class="card-image purple waves-effect " style="width: 100%">
                                    <input  type='hidden' name='type' value="BASIC" >
                                    <div class="card-title">BASIC</div>
                                    <div class="price"><sup>$</sup><?php echo $prix_base ?></div>
                                    <div class="price-desc">Pas d'avantage</div>
                                </div>

                                <div class="card-content">

                                    <ul class="collection">
                                        <li class="collection-item">

                                            <div class="input-field col s12  m12 l12">

                                                <input id="nom1" type='number' name='nom' required >

                                                <label for="nom1" data-error="Veuillez saisir le nom svp !" data-success="Perfect!">Prix</label>
                                                <input type='hidden' name='idEvent' value="<?php echo $idEvent ?>" >
                                            </div>

                                        </li>
                                        <li class="collection-item">Mobile money : <?php echo $telEvent ?></li>
                                        <li class="collection-item"><button type="submit" name="setPrix" class="btn btn-success waves-effect waves-light" >ACTIVE</button></li>
                                    </ul>
                                </div>


                            </form>
                </article>
                <article class="col s12 m6 l4">

                    <form class="card hoverable" method='post' action='index.php?action=addBillet'>

                        <div class="card-image cyan waves-effect" style="width: 100%">
                            <div class="card-title">STANDARD</div>
                            <input  type='hidden' name='type' value="STANDARD" >
                            <div class="price"><sup>$</sup><?php echo $prix_stand ?></div>
                            <div class="price-desc">+ Boisson</div>
                        </div>

                        <div class="card-content">

                            <ul class="collection">
                                <li class="collection-item">
                                    <div class="input-field col s12  m12 l12">


                                        <input id="<?php echo 'nom'.$i ?>" type='number'  name='nom' required >
                                        <label for="<?php echo 'nom'.$i ?>" data-error="Veuillez saisir le nom svp !" data-success="Perfect!">Prix</label>
                                        <input type='hidden' name='idEvent' value="<?php echo $idEvent ?>" >
                                    </div>

                                </li>

                                <li class="collection-item">Mobile money : <?php echo $telEvent ?></li>
                                <li class="collection-item"><button type="submit" name="setPrix" class="btn btn-success waves-effect waves-light" >ACTIVE</button></li>
                            </ul>
                        </div>


                    </form>
                </article>
                <article class="col s12 m6 l4">

                    <form class="card hoverable" method='post' action='index.php?action=addBillet'>

                        <div class="card-image green waves-effect" style="width: 100%">
                            <input  type='hidden' name='type' value="VIP" >
                            <div class="card-title">VIP</div>
                            <div class="price"><sup>$</sup><?php echo $prix_vip ?></div>
                            <div class="price-desc">+ Repas</div>
                        </div>

                        <div class="card-content">

                            <ul class="collection">
                                <li class="collection-item">
                                    <div class="input-field col s12  m12 l12">
                                        <input id="<?php echo 'nom'.$i ?>"type='number'  name='nom' required >
                                        <label for="<?php echo 'nom'.$i ?>" data-error="Veuillez saisir le nom svp !" data-success="Perfect!">Prix</label>
                                        <input  type='hidden' name='idEvent' value="<?php echo $idEvent ?>" >
                                    </div>

                                </li>

                                <li class="collection-item">Mobile money : <?php echo $telEvent ?></li>
                                <li class="collection-item"><button type="submit" name="setPrix" class="btn btn-success waves-effect waves-light" >ACTIVE</button></li>
                            </ul>
                        </div>



                    </form>
                </article>


            </section>



        </div>


    </div>
</div>

<!-- Floating Action Button -->
<div class="fixed-action-btn " style="bottom: 50px; right: 19px;">
    <a class="btn-floating btn-large red">
        <i class="mdi-content-add"></i>
    </a>
    <ul>
        <li><a href="#intro" class="btn-floating red"><i class="large mdi-communication-live-help"></i></a></li>
        <li><a href="index.php?action=addEvent" class="btn-floating yellow darken-1"><i class="large mdi-action-stars"></i></a></li>
        <li><a href="index.php?action=addAgent" class="btn-floating green"><i class="large mdi-action-perm-identity"></i></a></li>

    </ul>
</div>


<script>
    function showHint(val) {
        var str=document.getElementById("code");

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
                alert(xmlhttp.responseText);
            }
        }
        xmlhttp.open("GET", "addBillet.control.php?code="+str.value, true);
        xmlhttp.send();""




        //document.getElementById("txtHint").innerHTML=;
    }
</script>





