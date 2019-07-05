<?php





try{
    if (isset($_GET["action"])){
        if ($_GET["action"] == "home"){
            include ("controleur/home.control.php");
        }
        else if ($_GET["action"] == "login"){
            include ("controleur/login.control.php");
        }
        else if ($_GET["action"] == "contact"){
            include ("controleur/contact.php");
        }
        else if ($_GET["action"] == "addAgent"){
            include ("controleur/addAgent.control.php");
        }
        else if ($_GET["action"] == "addEvent"){
            include ("controleur/addEvent.control.php");
        }
        else if ($_GET["action"] == "billet"){
            include ("controleur/billet.control.php");
        }
        else if ($_GET["action"] == "addBillet"){
            include ("controleur/addBillet.control.php");
        }
        else if ($_GET["action"] == "scanBillet"){
            include ("controleur/addBillet.control.php");
        }
        else if ($_GET["action"] == "scan"){
            include ("controleur/addBillet.control.php");
        }
        else if ($_GET["action"] == "#"){

        }
        else {
            include ("controleur/home.control.php");
        }
    }else{

        include ("controleur/home.control.php");
    }
}catch (Exception $ex){
    include("control/erreur.control.php");
}
