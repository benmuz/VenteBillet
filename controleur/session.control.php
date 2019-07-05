<?php
/**
 * Created by PhpStorm.
 * User: Gust
 * Date: 28/08/2018
 * Time: 06:06
 */
require_once("globals/config.php");
require_once("modele/connexion.php");
require_once("modele/Agent.php");
require_once("modele/Billet.php");
require_once("modele/Evenement.php");
require_once("modele/Vente.php");
require_once("modele/Utilisateur.php");

$agent=Agent::getAgentByUser($_POST["username"]);
$_SESSION["agent"] = "".$agent->getIdAgent();
$_SESSION["user"] = $_POST["username"];

if($agent->getTitre()=="admin"){
    $listeEvenement= Evenement::afficher();
    include("vue/session.admin.views.php");
}elseif ($agent->getTitre()=="vendeur"){
    $listeEvenement= Evenement::getEvenmentByUser($_POST["username"]);
    $listeAgent = Agent::search($_SESSION["agent"]);
    include("vue/session.vendeur.views.php");
}elseif ($agent->getTitre()=="controleur"){
    $boss = Agent::get1gentByID(Agent::getAgentByUser($_POST["username"])->getEmployeur());

    $listeEvenement= Evenement::getEvenmentByUser($boss->getUtilisateur());
    include("vue/session.garde.views.php");
}else{
    include("controleur/erreur.control.php");
}