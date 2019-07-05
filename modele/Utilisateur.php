<?php

/**
 * Created by PhpStorm.
 * User: Gust
 * Date: 04/08/2018
 * Time: 14:00
 */
class Utilisateur
{
    private $username;
    private $password;

    public function __construct()
    {

    }
    public static function login($user, $passe){
        $pdo_con= connexion::getConnexion();
        $pdo_query= " SELECT * FROM `utilisateur` WHERE `username` = :username and `motsPasse` = :motsPasse";

        $pdo_select=$pdo_con -> prepare($pdo_query);
        $pdo_select->bindParam(':username', $user);
        $pdo_select->bindParam(':motsPasse', $passe);
        $pdo_select->execute();
        $billet =  "login incorrect";


        if($pdo_select!= null){
            while ($ob= $pdo_select->fetch(PDO::FETCH_OBJ)){
                if(($ob-> motsPasse)==$passe&&($ob-> username)==$user){
                    $billet="acces accordé";

                }


            }

            return $billet;
        }
    }
    public static function ajouter($username,$passe)
    {
        try {
            $pdo_con = connexion::getConnexion();
            $stmt = $pdo_con->prepare("INSERT INTO `utilisateur`(`username`, `motsPasse`) VALUES (:username, :motsPasse)");
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':motsPasse', $passe);
            $stmt->execute();

        } catch (PDOException $e) {
            echo "<br>erreure <br>" . $e->getTraceAsString();
        }
    }
    public function getUsername() {
        return $this ->username;
    }

    public function setUsername($£username) {
        $this ->username = $£username;
    }

    public function getPassword() {
        return $this ->password;
    }

    public function  setPassword($password) {
        $this ->password = $password;
    }


}