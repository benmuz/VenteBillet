<?php

/**
 * Created by PhpStorm.
 * User: Gust
 * Date: 04/08/2018
 * Time: 14:01
 */
class Vente
{
    private $idVente;
    private $billet;
    private $code;
    private $client;
    private $tel;
    private $mail;
    private $etat;
    private $payement;

    /**
     * Vente je viuens de faire un come constructor
     */
    public function __construct()
    {
    }
    public  static  function afficher()
    {
        $pdo_con = connexion::getConnexion();
        $pdo_query = " SELECT * FROM `vente` ";

        $pdo_select = $pdo_con->prepare($pdo_query);
        $pdo_select->execute();
        $tableau = array();
        $bi=new Billet();
        if ($pdo_select != null) {
            while ($ob = $pdo_select->fetch(PDO::FETCH_OBJ)) {
                $vente =  new Vente();
                $vente->setIdVente($ob->id_vente);
                $vente->setBillet($bi->getBilletById($ob->id_billet));
                $vente->setCode($ob->code);
                $vente->setClient($ob->client);
                $vente->setTel($ob->tel);
                $vente->setMail($ob->mail);
                $vente->setEtat($ob->etat);
                $vente->setPayement($ob->payement);
                $tableau=$vente;
            }
            return $tableau;
        }
    }
    public  static  function getVenteByEvent($idEvent)
    {
        $pdo_con = connexion::getConnexion();
        $pdo_query = "SELECT v.`id_vente`, v.`id_billet`, v.`payement`, v.`code`, v.`client`, v.`tel`, v.`mail`, v.`etat` FROM `vente` v, billet b WHERE v.`id_billet` = b.`id_billet`and b.id_evenement = '".$idEvent."' ";

        $pdo_select = $pdo_con->prepare($pdo_query);
        $pdo_select->execute();
        $tableau = array();
        $bi=new Billet();
        if ($pdo_select != null) {
            while ($ob = $pdo_select->fetch(PDO::FETCH_OBJ)) {
                $vente =  new Vente();
                $vente->setIdVente($ob->id_vente);
                $vente->setBillet($bi->getBilletById($ob->id_billet));
                $vente->setCode($ob->code);
                $vente->setClient($ob->client);
                $vente->setTel($ob->tel);
                $vente->setMail($ob->mail);
                $vente->setEtat($ob->etat);
                $vente->setPayement($ob->payement);
                $tableau=$vente;
            }
            return $tableau;
        }
    }
    public  static  function getNbClientByUser($user)
    {
        $pdo_con = connexion::getConnexion();
        if($user == "admin"){
            $pdo_query =   "SELECT count(`client`)as nb FROM `vente` ";
        }else{
            $pdo_query =   "SELECT count(v.`client`)as nb FROM `vente` v, billet b, evenement e 
                        WHERE v.`id_billet` = b.`id_billet`
                        and b.id_evenement = e.id_evenement
                        and e.username = :username";

        }

        $pdo_select = $pdo_con->prepare($pdo_query);
        $pdo_select->bindParam(':username', $user);
        $pdo_select->execute();
        $nb=0;
        if ($pdo_select != null) {
            while ($ob = $pdo_select->fetch(PDO::FETCH_OBJ)) {

                $nb=$ob->nb;

            }
            return $nb;
        }
    }

    public  static  function getNbVenteByBillet($idBillet)
    {
        $pdo_con = connexion::getConnexion();

        $pdo_query = "SELECT count(`id_billet`)as nb FROM `vente` WHERE `id_billet` = :id_billet";

        $pdo_select = $pdo_con->prepare($pdo_query);
        $pdo_select->bindParam(':id_billet', $idBillet);
        $pdo_select->execute();
        $nb=0;
        if ($pdo_select != null) {
            while ($ob = $pdo_select->fetch(PDO::FETCH_OBJ)) {

                $nb=$ob->nb;

            }
            return $nb;
        }

    }
    public  static  function getNbScanByEvent($idBvent)

    {

        $pdo_con = connexion::getConnexion();

        $pdo_query = "SELECT count(v.`etat`) as nb FROM `vente` v, billet b WHERE b.`id_billet` = v.`id_billet` and b.id_evenement= :idBvent and v.etat=1 ";

        $pdo_select = $pdo_con->prepare($pdo_query);
        $pdo_select->bindParam(':idBvent', $idBvent);
        $pdo_select->execute();
        $nb=0;
        if ($pdo_select != null) {
            while ($ob = $pdo_select->fetch(PDO::FETCH_OBJ)) {

                $nb=$ob->nb;

            }
            return $nb;
        }

    }
    public  static  function getTotalVenteByUser($user)
    {
        $pdo_con = connexion::getConnexion();

        $pdo_query="";

        $pdo_select = $pdo_con->prepare($pdo_query);
        $pdo_select->bindParam(':username', $user);
        $pdo_select->execute();
        $nb=0;
        if ($pdo_select != null) {
            while ($ob = $pdo_select->fetch(PDO::FETCH_OBJ)) {

                $nb=$ob->nb;

            }
            return $nb;
        }
    }

    public static function scanBillet( $code){
        $pdo_con = connexion::getConnexion();
        $pdo_query = "SELECT etat FROM vente WHERE code = :code";
        $message = "";
        $pdo_select = $pdo_con->prepare($pdo_query);
        $pdo_select->bindParam(':code',$code);
        $pdo_select->execute();
        $i=0;

        if ($pdo_select != null) {
            while ($ob = $pdo_select->fetch(PDO::FETCH_OBJ)) {
                $i++;
                if($ob->etat==2){
                    $stmt = $pdo_con->prepare("UPDATE `vente` SET `etat`=1 WHERE `code`= :code");
                    $stmt->bindParam(':code',$code);
                    $stmt->execute();
                    $message = "valide";
                }elseif ($ob->etat==1){
                    $message = "deja utiliser";
                }

            }if($i==0){
                $message = "invalide";
            }

        }
        return $message;
    }

    public static function ajouter($idEvent,$idBillet,$mail,$tel,$nom){
        try {
            $pdo_con= connexion::getConnexion();

            $stmt = $pdo_con->prepare(" INSERT INTO `vente`( `id_billet`, `code`, `client`, `tel`, `mail`, `etat`) 
                                                  VALUES (:id_billet, :code,:client,:tel,:mail, 2)");
            $stmt->bindParam(':id_billet', $idBillet);
            $stmt->bindParam(':code', Vente::code($idEvent, $idBillet,$nom,$mail));
            $stmt->bindParam(':client', $nom);
            $stmt->bindParam(':tel', $tel);
            $stmt->bindParam(':mail', $mail);

            $stmt->execute();
            return 1;
        }catch (PDOException $e){

            echo "<br>erreure <br>" . $e->getMessage();
            return 0;
        }


    }
    public static function code($idEvent, $idBillet,$nom,$mail){
        $pdo_con = connexion::getConnexion();
        $pdo_query = " SELECT * FROM `vente` ";
        $idV = 0;
        $pdo_select = $pdo_con->prepare($pdo_query);
        $pdo_select->execute();
        if ($pdo_select != null) {
            while ($ob = $pdo_select->fetch(PDO::FETCH_OBJ)) {

                $idV=$ob->id_vente;

            }
            if($idV<=10){
                $idV =+ 1;
                $idV = "000".$idV;
            }
            elseif($idV<=100 && $idV>9){
                $idV =+ $idV;
                $idV = "00".$idV;
            }
            elseif ($idV<=1000 && $idV>99)  {
                $idV =+ 1;
                $idV = "0".$idV;
            }
            else{
                $idV = + 1;
            }
        }

        return $idEvent.$idBillet.strlen($nom).str_word_count($nom).strlen($mail).$idV;
    }
    /**
     * @return mixed
     */
    public function getIdVente()
    {
        return $this->idVente;
    }

    /**
     * @param mixed $idVente
     */
    public function setIdVente($idVente)
    {
        $this->idVente = $idVente;
    }

    /**
     * @return mixed
     */
    public function getBillet()
    {
        return $this->billet;
    }

    /**
     * @param mixed $billet
     */
    public function setBillet($billet)
    {
        $this->billet = $billet;
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return mixed
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @param mixed $client
     */
    public function setClient($client)
    {
        $this->client = $client;
    }

    /**
     * @return mixed
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * @param mixed $tel
     */
    public function setTel($tel)
    {
        $this->tel = $tel;
    }

    /**
     * @return mixed
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @param mixed $mail
     */
    public function setMail($mail)
    {
        $this->mail = $mail;
    }

    /**
     * @return mixed
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * @param mixed $etat
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;
    }

    /**
     * @return mixed
     */
    public function getPayement()
    {
        return $this->payement;
    }

    /**
     * @param mixed $payement
     */
    public function setPayement($payement)
    {
        $this->payement = $payement;
    }


}