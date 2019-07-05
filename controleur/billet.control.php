<?php
/**
 * Created by PhpStorm.
 * User: Gust
 * Date: 05/08/2018
 * Time: 13:10
 */
require_once("globals/config.php");
require_once("modele/connexion.php");
require_once("modele/Agent.php");
require_once("modele/Billet.php");
require_once("modele/Evenement.php");
require_once("modele/Vente.php");
session_start();
include("vue/header.views.php");

try{


        if(isset($_POST["submit"])){
            $idEvent = $_POST["id"];
            $listeBillet= Billet::getBylletByEvent($_POST["id"]);
            $telEvent = Agent::getAgentByUser($_SESSION["user"])->getTel();
            $succe="";

            include("vue/billet.views.php");
        }elseif(isset($_POST["addPanier"])){

            $listeBillet= Billet::getBylletByEvent($_POST["id"]);
            $telEvent = Agent::getAgentByUser($_SESSION["user"])->getTel();
            if(Vente::ajouter($_POST["id"],$_POST["idBillet"],$_POST["mail"],$_POST["tel"],$_POST["nom"])==1){
                $succe = "<div class=\"row\"><div class=\"col s12 m4 l4 right\">
                    <div id=\"card-alert\" class=\"card green lighten-5 \">
                      <div class=\"card-content green-text\">
                        <p>SUCCESS : le code du bille sera envoyer dans quelques instant.</p>
                      </div>
                      <button type=\"button\" class=\"close green-text \" data-dismiss=\"alert\" aria-label=\"Close\" style='float: right; margin-top: -60px; border: hidden'>
                        <span aria-hidden=\"true\">×</span>
                      </button>
                    </div></div></div>";
            }else{
                $succe = "<div class=\"row\"><div class=\"col s12 m4 l4 right\">
                    <div id=\"card-alert\" class=\"card orange lighten-5\">
                      <div class=\"card-content orange-text\">
                        <p>WARNING : Echec de l'operation </p>
                      </div>
                      <button type=\"button\" class=\"close orange-text\" data-dismiss=\"alert\" aria-label=\"Close\" style='float: right; margin-top: -60px; border: hidden'>
                        <span aria-hidden=\"true\">×</span>
                      </button>
                    </div></div></div>";
            }
            include("vue/billet.views.php");

        }

}
catch (Exception $exep)
{
    echo '<h1> '.$exep->getMessage().'</h1>';

}
include('vue/footer.views.php');