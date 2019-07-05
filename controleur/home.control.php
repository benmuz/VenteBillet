<?php
/**
 * Created by PhpStorm.
 * User: Gust
 * Date: 05/08/2018
 * Time: 05:49
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
    $listeEvenement= Evenement::afficher();
    include("vue/home.views.php");

}
catch (Exception $exep)
{
    echo '<h1> '.$exep->getMessage().'</h1>';

}
include('vue/footer.views.php');