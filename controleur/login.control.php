<?php
/**
 * Created by PhpStorm.
 * User: Gust
 * Date: 05/08/2018
 * Time: 09:29
 */
require_once("globals/config.php");
require_once("modele/connexion.php");
require_once("modele/Agent.php");
require_once("modele/Billet.php");
require_once("modele/Evenement.php");
require_once("modele/Vente.php");
require_once("modele/Utilisateur.php");

session_start();
include("vue/header.views.php");
try{
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(Utilisateur::login($_POST["username"],$_POST["password"])=="acces accordé"){
            $_SESSION["user"] = $_POST["username"];
            include("controleur/session.control.php");

        }else{

            include("vue/login.views.php");



        }


    }else{
        include("vue/login.views.php");
    }




}
catch (Exception $exep)
{
    echo '<h1> '.$exep->getMessage().'</h1>';

}
include('vue/footer.views.php');