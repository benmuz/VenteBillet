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
        $filename="";
        foreach (Evenement::afficher() as $e){
            $filename = $e->getIdEvenement();
        }
        $dossier = "content/image/";

        $fichier =  basename($_FILES["fileToUpload"]["name"]);

        $extension = pathinfo($fichier,PATHINFO_EXTENSION);
        $extensions = array('jpg','png','gif','jpeg');
// Check if image file is a actual image or fake image


        if(isset($_POST["submit"])) {
            if(!in_array($extension, $extensions)){
                echo  '<script> alert("Vous devez uploader un fichier de type jpg ,png, gif ou jpeg")</script>';
                include("vue/addEvent.views.php");
            }else{
                $fichier = preg_replace('/([^.a-z0-9]+)/i', $filename, $fichier);
                $desc = $_POST['description']."<br><strong>pour plus d'information</strong><br>appéle le ". Agent::getAgentByUser($_SESSION['user'] ." ou faite nous un mail a l'adresse ". $_SESSION['user']);
                if(Evenement::ajouter($_POST["nom"],$_POST["date"],$_POST['debut'],$_POST["fin"], $_POST['adresse'], $_POST['ville'], $_SESSION['user'],$desc,$fichier)==1){
                    if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $dossier.$fichier)){
                        $listeEvenement= Evenement::afficher();
                        include("vue/home.views.php");

                    }else{
                        echo 'Echec du chargement';
                    }
                }else{
                    include("vue/addEvent.views.php");
                }


            }
        }




    }else{
        include("vue/addEvent.views.php");
    }




}
catch (Exception $exep)
{
    echo '<h1> '.$exep->getMessage().'</h1>';

}
include('vue/footer.views.php');