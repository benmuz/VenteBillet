<?php

/**
 * Created by PhpStorm.
 * User: Gust
 * Date: 04/08/2018
 * Time: 14:02
 */
class Billet
{
    private $idBillet;
    private $evenemnt;
    private $prix;
    private $type;

    /**
     * Billet constructor.
     */
    public function __construct()
    {
    }

    public  static  function getBylletById($id){
        $pdo_con= connexion::getConnexion();
        $pdo_query= " SELECT * FROM `billet` WHERE `id_billet`=:id_billet";

        $pdo_select=$pdo_con -> prepare($pdo_query);
        $pdo_select->bindParam(':id_billet', $id);
        $pdo_select->execute();
        $billet =  new Billet();
        $ev = null;

        if($pdo_select!= null){
            while ($ob= $pdo_select->fetch(PDO::FETCH_OBJ)){
                $billet->setIdBillet($ob-> id_billet);

                $billet->setPrix($ob->prix);
                $billet->setType($ob->type);
                $billet->setEvenemnt($ob->id_evenement);
            }
            $billet->setEvenemnt(Evenement::getEvenemntById($ob->id_evenement));
            return $billet;
        }
    }
    public  static  function getBylletByEvent($idEvent){
        $pdo_con= connexion::getConnexion();
        $pdo_query= " SELECT * FROM `billet` WHERE `id_evenement`=:id_evenement";

        $pdo_select=$pdo_con -> prepare($pdo_query);
        $pdo_select->bindParam(':id_evenement', $idEvent);
        $pdo_select->execute();
        $tableau=array();

        if($pdo_select!= null){
            while ($ob= $pdo_select->fetch(PDO::FETCH_OBJ)){
                $billet =  new Billet();
                $billet->setIdBillet($ob-> id_billet);
                $billet->setEvenemnt($ob->id_evenement);
                $billet->setPrix($ob->prix);
                $billet->setType($ob->type);

                $tableau []=$billet;
            }
            return $tableau;
        }
    }
    public  static  function getBylletByEventType($evement, $type){
        $pdo_con= connexion::getConnexion();
        $pdo_query= " SELECT * FROM `billet` WHERE `id_evenement`= :id_evenement and `type` = :type";

        $pdo_select=$pdo_con -> prepare($pdo_query);
        $pdo_select->bindParam(':id_evenement', $evement);
        $pdo_select->bindParam(':type', $type);
        $pdo_select->execute();
        $billet =  new Billet();
        if($pdo_select!= null){
            while ($ob= $pdo_select->fetch(PDO::FETCH_OBJ)){


                $billet->setIdBillet($ob-> id_billet);
                $billet->setEvenemnt($ob->id_evenement);
                $billet->setPrix($ob->prix);
                $billet->setType($ob->type);


            }
            return $billet;
        }
    }

    public static function ajouter($evement, $prix, $type) {

        try {
            $pdo_con = connexion::getConnexion();
            $stmt = $pdo_con->prepare("INSERT INTO `billet`( `type`, `prix`, `id_evenement`) VALUES (:type,:prix,:id_evenement)");
            $stmt->bindParam(':type', $type);
            $stmt->bindParam(':prix', $prix);
            $stmt->bindParam(':id_evenement',$evement);
            $stmt->execute();

        } catch (PDOException $e) {
            echo "<br>erreure <br>" . $e->getTraceAsString();
        }
    }
    public static  function modifier($id, $prix){
        try {
            $pdo_con = connexion::getConnexion();
            $stmt = $pdo_con->prepare("UPDATE `billet` SET `prix`=:prix WHERE `id_billet`=:id_billet");

            $stmt->bindParam(':prix', $prix);
            $stmt->bindParam(':id_billet',$id);
            $stmt->execute();

        } catch (PDOException $e) {
            echo "<br>erreure <br>" . $e->getTraceAsString();
        }
    }

    public static  function supprimer($id){

    }
    /**
     * @return mixed
     */
    public function getIdBillet()
    {
        return $this->idBillet;
    }

    /**
     * @param mixed $idBillet
     */
    public function setIdBillet($idBillet)
    {
        $this->idBillet = $idBillet;
    }

    /**
     * @return mixed
     */
    public function getEvenemnt()
    {
        return $this->evenemnt;
    }

    /**
     * @param mixed $evenemnt
     */
    public function setEvenemnt($evenemnt)
    {
        $this->evenemnt = $evenemnt;
    }

    /**
     * @return mixed
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * @param mixed $prix
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }


}