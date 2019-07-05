<?php
/**
 * Created by PhpStorm.
 * User: JOKISS
 * Date: 11/09/2018
 * Time: 18:12
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

    if(isset($_POST["addPanier"])){
        $idEvent = $_POST["id"];
        $listeBillet= Billet::getBylletByEvent($_POST["id"]);
        $telEvent = Agent::getAgentByUser($_SESSION["user"])->getTel();
        $prix_base = 0;
        $prix_stand =  0;
        $prix_vip =  0;
        if($listeBillet !=null){

            foreach ($listeBillet as $prix){

                if($prix->getType()=="BASIC" ){

                        $prix_base =  $prix->getPrix();

                }elseif ($prix->getType()=="STANDARD"){

                        $prix_base =  $prix->getPrix();


                }elseif ($prix->getType()=="VIP"){

                    $prix_vip =  $prix->getPrix();

                }
            }


        }
        include("vue/addBillet.php");

    }
    if (isset($_POST["setPrix"])){

        $idEvent = $_POST["idEvent"];

        $telEvent = Agent::getAgentByUser($_SESSION["user"])->getTel();

        if(Billet::getBylletByEventType($idEvent,$_POST["type"])->getIdBillet()==null){
            Billet::ajouter($idEvent,$_POST["nom"],$_POST["type"]);

        }else{
            $b=Billet::getBylletByEventType($idEvent,$_POST["type"]);
            Billet::modifier($b->getIdBillet(),$_POST["nom"]);

        }
        $listeBillet= Billet::getBylletByEvent($_POST["idEvent"]);
        $prix_base = 0;
        $prix_stand =  0;
        $prix_vip =  0;
        foreach ($listeBillet as $prix){

            if($prix->getType()=="BASIC" ){

                $prix_base =  $prix->getPrix();

            }elseif ($prix->getType()=="STANDARD"){

                $prix_base =  $prix->getPrix();


            }elseif ($prix->getType()=="VIP"){

                $prix_vip =  $prix->getPrix();

            }
        }
        include("vue/addBillet.php");
    }
    if(isset($_POST["scanPanier"])){

        $idEvent = $_POST['id'];
        $qte = Vente::getNbScanByEvent($_POST['id']);
        $msg = "Nombre des billet scanner";
        include("vue/scanBillet.php");

    }
    if(isset($_POST["scan"])){
        $q = $_POST["code"];
        $msg = "Nombre des billet scanner";
        $qte = Vente::getNbScanByEvent($_POST["idEve"]);
        if (Vente::scanBillet($q)=="valide"){
            $qte = Vente::getNbScanByEvent($_POST["idEve"]);
            $msg = "Nombre des billet scanner";

        }else{
            $qte = Vente::getNbScanByEvent($_POST["idEve"]);
            $msg =Vente::scanBillet($q);

        }


        include("vue/scanBillet.php");

    }
    /*if(!empty($_REQUEST["code"])){
        $q = $_REQUEST["code"];
        $hint = "";
        if ($q !== "") {



            if (Vente::scanBillet($q)=="valide"){

                $hint = Vente::getNbScanByEvent($code);
            }
            echo "get : ".$q;

        }
        echo "get : ".$q;
    }
    if (isset($_GET['code'])){
        $q = $_GET["code"];
        $idEv = $_GET["idEvent"];
        $hint = "";
        if (Vente::scanBillet($q)=="valide"){

            $hint = Vente::getNbScanByEvent($code);
        }

        //echo $hint;
    }
    if(!empty($_REQUEST["idEve"])){
        $q = $_REQUEST["code"];
        $hint = "";
        echo "get : ".$q;

        /*if ($q !== "") {



            if (Vente::scanBillet($q)=="valide"){

                $hint = Vente::getNbScanByEvent($code);
            }
            echo "get : ".$q;

        }
        echo "get : ".$q;
    }*/


}
catch (Exception $exep)
{
    echo '<h1> '.$exep->getMessage().'</h1>';

}
include('vue/footer.views.php');