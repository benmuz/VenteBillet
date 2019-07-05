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

echo Utilisateur::login("ben@gmail.","KABEYA10");