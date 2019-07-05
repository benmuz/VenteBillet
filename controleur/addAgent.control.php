<?php
require_once("globals/config.php");
require_once("modele/connexion.php");
require_once("modele/Agent.php");
require_once("modele/Billet.php");
require_once("modele/Evenement.php");
require_once("modele/Vente.php");
require_once("modele/Utilisateur.php");
session_start();
$agent = $_SESSION["agent"];
include("vue/header.views.php");
try{
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        echo "nom : ".$_POST["nom"]." postnom : ".$_POST["postnom"]." prenom : ".$_POST["prenom"];
        echo " date : ".$_POST["dateNaiss"];
        echo "mail : ".$_POST["mail"]." tel : ".$_POST["tel"]." lieu : ".$_POST["lieu"];
        echo "nationalite : ".$_POST["natio"]." pass: ".$_POST["pass"]." adresse : ".$_POST["adresse"];
        echo "session user: ".$_SESSION["user"];
        $genre = "Homme";
        $titre = "controleur";
        $employeur = $agent;
        $photo  = "";
        echo "session id ".$agent;
        Utilisateur::ajouter($_POST["mail"],$_POST["pass"]);
        Agent::ajouter($_POST["tel"],$_POST["nom"],$_POST["postnom"],$_POST["prenom"],$genre,$titre,$_POST["tel"],$_POST["mail"],$_POST["adresse"],$_POST["dateNaiss"],$_POST["lieu"],$_POST["natio"],$employeur, $photo);

        $listeEvenement= Evenement::getEvenmentById($agent);
        include("vue/session.vendeur.views.php");
    }else{
        include("vue/addAgent.views.php");
    }




}
catch (Exception $exep)
{
    echo '<h1> '.$exep->getMessage().'</h1>';

}
include('vue/footer.views.php');