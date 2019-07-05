<?php

/**
 * Created by PhpStorm.
 * User: Gust
 * Date: 04/08/2018
 * Time: 14:01
 */
class Evenement
{
    private $idEvenement;
    private $nom;
    private $date;
    private $debut;
    private $fin;
    private $adresse;
    private $ville;
    private $utilisateur;
    private $description;
    private $photo;

    /**
     * Evenement constructor.
     * @param $idEvenemtn
     * @param $nom
     * @param $date
     * @param $debut
     * @param $fin
     * @param $adresse
     * @param $ville
     * @param $utilisateur
     * @param $description
     * @param $photo
     */
    public function __construct($idEvenement, $nom, $date, $debut, $fin, $adresse, $ville, $utilisateur, $description, $photo)
    {
        $this->idEvenement = $idEvenement;
        $this->nom = $nom;
        $this->date = $date;
        $this->debut = $debut;
        $this->fin = $fin;
        $this->adresse = $adresse;
        $this->ville = $ville;
        $this->utilisateur = $utilisateur;
        $this->description = $description;
        $this->photo = $photo;
    }

    public  static  function afficher()
    {
        $pdo_con = connexion::getConnexion();
        $pdo_query = " SELECT * FROM `evenement` ORDER BY id_evenement DESC;";

        $pdo_select = $pdo_con->prepare($pdo_query);
        $pdo_select->execute();
        $tableau = array();
        if ($pdo_select != null) {
            while ($ob = $pdo_select->fetch(PDO::FETCH_OBJ)) {
                $tableau [] = new Evenement($ob->id_evenement ,
                    $ob->nom,
                    $ob->date,
                    $ob->debut,
                    $ob->fin,
                    $ob->adresse,
                    $ob->ville,
                    $ob->username,
                    $ob->description,
                    $ob->photo);
            }
            return $tableau;
        }
    }

    public  static  function search($mot)
    {
        $pdo_con = connexion::getConnexion();
        $pdo_query = " SELECT * FROM `evenement` WHERE `nom` = '".$mot."' or `date` = '".$mot."' or `adresse` = '".$mot."' or `ville` = '".$mot."' or `description` = '".$mot."' ";

        $pdo_select = $pdo_con->prepare($pdo_query);
        $pdo_select->execute();
        $tableau = array();
        if ($pdo_select != null) {
            while ($ob = $pdo_select->fetch(PDO::FETCH_OBJ)) {
                $tableau [] = new Evenement($ob->id_evenement ,
                    $ob->nom,
                    $ob->date,
                    $ob->debut,
                    $ob->fin,
                    $ob->adresse,
                    $ob->ville,
                    $ob->username,
                    $ob->description,
                    $ob->photo);
            }
            return $tableau;
        }
    }

    public  static  function getEvenmentByUser($user)
    {
        $pdo_con = connexion::getConnexion();
        $pdo_query = " SELECT * FROM `evenement` WHERE `username` = :username ORDER BY id_evenement DESC";

        $pdo_select = $pdo_con->prepare($pdo_query);
        $pdo_select->bindParam(':username', $user);
        $pdo_select->execute();
        $tableau = array();
        if ($pdo_select != null) {
            while ($ob = $pdo_select->fetch(PDO::FETCH_OBJ)) {
                $tableau [] = new Evenement($ob->id_evenement ,
                    $ob->nom,
                    $ob->date,
                    $ob->debut,
                    $ob->fin,
                    $ob->adresse,
                    $ob->ville,
                    $ob->username,
                    $ob->description,
                    $ob->photo);
            }
            return $tableau;
        }
    }
    public  static  function getEvenmentById($id)
    {
        $pdo_con = connexion::getConnexion();
        $pdo_query = " SELECT * FROM `evenement` WHERE `id_evenement` = '".$id."' ";

        $pdo_select = $pdo_con->prepare($pdo_query);
        $pdo_select->execute();
        $tableau = null;
        if ($pdo_select != null) {
            while ($ob = $pdo_select->fetch(PDO::FETCH_OBJ)) {
                $tableau [] = new Evenement($ob->id_evenement ,
                    $ob->nom,
                    $ob->date,
                    $ob->debut,
                    $ob->fin,
                    $ob->adresse,
                    $ob->ville,
                    $ob->username,
                    $ob->description,
                    $ob->photo);
            }
            return $tableau;
        }
    }

    public static function ajouter( $nom, $date, $debut, $fin, $adresse, $ville, $utilisateur, $description, $photo){

        try {
            $pdo_con= connexion::getConnexion();

            $stmt = $pdo_con->prepare("INSERT INTO `evenement`( `nom`, `date`, `debut`, `fin`, `adresse`, `ville`, `username`, `description`, `photo`) 
                                                             VALUES (:nom, :ddate, :debut, :fin, :adresse, :ville, :username, :description, :photo)");
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':ddate', strftime('%Y:%m:%d', strtotime($date)));
            $stmt->bindParam(':debut', $debut);
            $stmt->bindParam(':fin', $fin);
            $stmt->bindParam(':ville', $ville);
            $stmt->bindParam(':username', $utilisateur);
            $stmt->bindParam(':adresse', $adresse);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':photo', $photo);
            $stmt->execute();
            return 1;
        }catch (PDOException $e){

            echo "<br>erreure <br>" . $e->getMessage();
            return 0;
        }


    }
    public static function modifier($idEvenement, $nom, $date, $debut, $fin, $adresse, $ville, $utilisateur, $description, $photo){

    }
    public static function supprimer($id){

    }
    public static function date_mysql($date){
        echo  strftime('%Y:%m:%d', strtotime($date));
    }
    /**
     * @return mixed
     */
    public function getIdEvenement()
    {
        return $this->idEvenement;
    }

    /**
     * @param mixed $idEvenemtn
     * @return Evenement
     */
    public function setIdEvenement($idEvenement)
    {
        $this->idEvenement = $idEvenement;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     * @return Evenement
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     * @return Evenement
     */
    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDebut()
    {
        return $this->debut;
    }

    /**
     * @param mixed $debut
     * @return Evenement
     */
    public function setDebut($debut)
    {
        $this->debut = $debut;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFin()
    {
        return $this->fin;
    }

    /**
     * @param mixed $fin
     * @return Evenement
     */
    public function setFin($fin)
    {
        $this->fin = $fin;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * @param mixed $adresse
     * @return Evenement
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * @param mixed $ville
     * @return Evenement
     */
    public function setVille($ville)
    {
        $this->ville = $ville;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUtilisateur()
    {
        return $this->utilisateur;
    }

    /**
     * @param mixed $utilisateur
     * @return Evenement
     */
    public function setUtilisateur($utilisateur)
    {
        $this->utilisateur = $utilisateur;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     * @return Evenement
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @param mixed $photo
     * @return Evenement
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;
        return $this;
    }



}