
<div id="intro" class="section scrollspy">
    <div class="container">
        <div class="col s12 ">
            <div class="card-panel grey lighten-5 z-depth-1">
                <div class="row valign-wrapper">
                    <div class="col s4 m2">
                        <img src="vue/images/avatar.jpg" alt="" class="circle responsive-img valign">
                    </div>
                    <div class="col s8 m10">
                        <span class="black-text">Bienvenue <?php  $agent=Agent::getAgentByUser($_SESSION["user"]); echo $agent->getPrenom()." ". $agent->getNom(); ?> </span>
                    </div>
                </div>
            </div>
        </div>
        <!--card stats start-->
        <div id="card-stats" class="seaction">
            <h4 class="header">Tableau de bord </h4>

            <div class="row">
                <div class="col s12 m6 l4">
                    <div class="card">
                        <div class="card-content  green white-text">
                            <p class="card-stats-title"><i class="mdi-social-group-add"></i> Clients</p>
                            <h4 class="card-stats-number"><?php echo Vente::getNbClientByUser($_SESSION["user"])?></h4>
                            <p class="card-stats-compare"><i class="mdi-hardware-keyboard-arrow-up"></i> 15% <span class="green-text text-lighten-5">from yesterday</span>
                            </p>
                        </div>
                        <div class="card-action  green darken-2">
                            <div id="clients-bar" class="center-align"></div>
                        </div>
                    </div>
                </div>
                <div class="col s12 m6 l4">
                    <div class="card">
                        <div class="card-content purple white-text">
                            <p class="card-stats-title"><i class="mdi-editor-attach-money"></i>Total des ventes </p>
                            <h4 class="card-stats-number">
                                <?php
                                $tot=0;
                                if (!empty($listeEvenement) && sizeof($listeEvenement)>0){

                                    foreach ($listeEvenement as $prod){
                                        foreach (Billet::getBylletByEvent($prod->getIdEvenement()) as $Billet){

                                           $tot=$tot+$Billet->getPrix()*Vente::getNbVenteByBillet($Billet->getIdBillet());


                                        }
                                    }

                                }
                                  echo "$".$tot;
                                ?>
                            </h4>
                            <p class="card-stats-compare"><i class="mdi-hardware-keyboard-arrow-up"></i> 70% <span class="purple-text text-lighten-5">last month</span>
                            </p>
                        </div>
                        <div class="card-action purple darken-2">
                            <div id="sales-compositebar" class="center-align"></div>

                        </div>
                    </div>
                </div>

                <div class="col s12 m6 l4">
                    <div class="card">
                        <div class="card-content deep-purple white-text">
                            <p class="card-stats-title"><i class="mdi-editor-insert-drive-file"></i> Tous les evenements</p>
                            <h4 class="card-stats-number"><?php echo count($listeEvenement)?></h4>
                            <p class="card-stats-compare"><i class="mdi-hardware-keyboard-arrow-down"></i> 3% <span class="deep-purple-text text-lighten-5">from last month</span>
                            </p>
                        </div>
                        <div class="card-action  deep-purple darken-2">
                            <div id="invoice-line" class="center-align"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--card stats end-->

        <!-- //////////////////////////////////////////////////////////////////////////// -->
        <div class="divider"></div>
        <!--chart dashboard start-->
        <div id="chart-dashboard" class="seaction">
            <h4 class="header">Statistique des ventes</h4>
            <p>Consulté en temps réel toutes les ventes des billets sur chacun des vos evenement.</p>
            <div class="row">
                <div class="col s12 m8 l8">
                    <div class="card" >
                        <div class="card-move-up waves-effect waves-block waves-light" >
                            <div class="move-up cyan darken-1">
                                <div class="row" style="padding: 20px;">
                                    <span class="chart-title white-text col s12 m6 l6">Revenue</span>

                                    <div class="switch chart-revenue-switch col s12 m4 l4">
                                        <label class="cyan-text text-lighten-5">
                                            Month
                                            <input type="checkbox">
                                            <span class="lever"></span> Year
                                        </label>
                                    </div>
                                    <div class="chart-revenue cyan darken-2 white-text col s12 m2 l2">
                                        <p class="chart-revenue-total">$4,500.85</p>
                                        <p class="chart-revenue-per"><i class="mdi-navigation-arrow-drop-up"></i> 21.80 %</p>
                                    </div>
                                </div>
                                <div class="trending-line-chart-wrapper">
                                    <canvas id="trending-line-chart" height="70" style="padding: 10px"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="card-content">
                            <a class="btn-floating btn-move-up waves-effect waves-light darken-2 right"><i class="mdi-content-add activator"></i></a>
                            <div class="col s12 m3 l3">
                                <div id="doughnut-chart-wrapper">
                                    <canvas id="doughnut-chart" height="200"></canvas>
                                    <div class="doughnut-chart-status">4500
                                        <p class="ultra-small center-align">Sold</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m2 l2">
                                <ul class="doughnut-chart-legend">
                                    <li class="mobile ultra-small"><span class="legend-color"></span>Mobile</li>
                                    <li class="kitchen ultra-small"><span class="legend-color"></span> Kitchen</li>
                                    <li class="home ultra-small"><span class="legend-color"></span> Home</li>
                                </ul>
                            </div>
                            <div class="col s12 m5 l6">
                                <div class="trending-bar-chart-wrapper">
                                    <canvas id="trending-bar-chart" height="90"></canvas>
                                </div>
                            </div>
                        </div>

                        <div class="card-reveal">
                            <span class="card-title grey-text text-darken-4">Revenue par Evenement <i class="mdi-navigation-close right"></i></span>
                            <table class="responsive-table display" id="data-table-row-grouping">
                                <thead>
                                <tr>
                                    <th data-field="id">ID</th>
                                    <th data-field="id">Type</th>
                                    <th data-field="month">Evenement</th>

                                    <th data-field="item-sold">Qte</th>
                                    <th data-field="item-price">Prix</th>
                                    <th data-field="total-profit">Profit Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php

                                if (!empty($listeEvenement) && sizeof($listeEvenement)>0){
                                    foreach ($listeEvenement as $prod){
                                        foreach (Billet::getBylletByEvent($prod->getIdEvenement()) as $Billet){
                                            echo "
                                            <tr>
                                                <td>".$prod->getIdEvenement()."</td>
                                                <td>".$Billet->getType()."</td>
                                                <td>".$prod->getNom()."</td>
                                                <td>".Vente::getNbVenteByBillet($Billet->getIdBillet())."</td>
                                                <td>".$Billet->getPrix()."</td>
                                                <td>".($Billet->getPrix()*Vente::getNbVenteByBillet($Billet->getIdBillet()))."</td>
                                            </tr>
                                                
                                            ";
                                        }
                                    }
                                }

                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col s12 m4 l4">
                    <div class="card">
                        <div class="card-move-up teal waves-effect waves-block waves-light">
                            <div class="move-up">
                                <p class="margin white-text">Browser Stats</p>
                                <canvas id="trending-radar-chart" height="114"></canvas>
                            </div>
                        </div>
                        <div class="card-content  teal darken-2">
                            <a class="btn-floating btn-move-up waves-effect waves-light darken-2 right"><i class="mdi-content-add activator"></i></a>
                            <div class="line-chart-wrapper">
                                <p class="margin white-text">Revenue by country</p>
                                <canvas id="line-chart" height="114"></canvas>
                            </div>
                        </div>
                        <div class="card-reveal">
                            <span class="card-title grey-text text-darken-4">Revenue by country <i class="mdi-navigation-close right"></i></span>
                            <table class="responsive-table">
                                <thead>
                                <tr>
                                    <th data-field="country-name">Country Name</th>
                                    <th data-field="item-sold">Item Sold</th>
                                    <th data-field="total-profit">Total Profit</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>USA</td>
                                    <td>65</td>
                                    <td>$452.55</td>
                                </tr>
                                <tr>
                                    <td>UK</td>
                                    <td>76</td>
                                    <td>$452.55</td>
                                </tr>
                                <tr>
                                    <td>Canada</td>
                                    <td>65</td>
                                    <td>$452.55</td>
                                </tr>
                                <tr>
                                    <td>Brazil</td>
                                    <td>76</td>
                                    <td>$452.55</td>
                                </tr>
                                <tr>

                                    <td>India</td>
                                    <td>65</td>
                                    <td>$452.55</td>
                                </tr>
                                <tr>
                                    <td>France</td>
                                    <td>76</td>
                                    <td>$452.55</td>
                                </tr>
                                <tr>
                                    <td>Austrelia</td>
                                    <td>65</td>
                                    <td>$452.55</td>
                                </tr>
                                <tr>
                                    <td>Russia</td>
                                    <td>76</td>
                                    <td>$452.55</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="divider"></div>
        <div id="table-datatables">
            <h4 class="header">Liste des utilisateur</h4>
            <div class="row">

                <div class="col s12 m12 l12">
                    <table id="data-table-simple" class="responsive-table display" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Genre</th>
                            <th>Titre</th>
                            <th>tel</th>
                            <th>email</th>
                            <th>Date de naissance</th>
                            <th>Adresse</th>
                        </tr>
                        </thead>

                        <tfoot>
                        <tr>
                            <th>Nom</th>
                            <th>Genre</th>
                            <th>Titre</th>
                            <th>tel</th>
                            <th>email</th>
                            <th>Date de naissance</th>
                            <th>Adresse</th>
                        </tr>
                        </tfoot>

                        <tbody>
                        <?php

                        foreach ($listeAgent as $ag) {
                            echo "
                                    <tr >
                                        <th > ".$ag->getNom()." ".$ag->getPostnom()." ".$ag->getPrenom()." </th >
                                        <th > ".$ag->getGenre()." </th >
                                        <th > ".$ag->getGenre()."</th >
                                        <th > ".$ag->getTel()."</th >
                                        <th >".$ag->getMail()."</th >
                                        <th >".$ag->getDateNaissance()."</th >
                                        <th >".$ag->getAdresse()."</th >
                                    </tr >";

                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="divider" id="work"></div>
        <h4 class="header">Mes evenements</h4>
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
                                            <button class='waves-effect waves-light light-blue btn' type='submit' name='addPanier'>
                                            Billets
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
<!-- Floating Action Button -->

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
