<?php

/**
 * Created by PhpStorm.
 * User: Gust
 * Date: 04/08/2018
 * Time: 13:58
 */
class Agent
{
    private $idAgent;
    private $matricule;
    private $nom;
    private $postnom;
    private $prenom;
    private $genre;
    private $titre;
    private $tel;
    private $mail;
    private $adresse;
    private $dateNaissance;
    private $lieuNaissance;
    private $nationalite;
    private $photo;
    private $utilisateur;
    private $employeur;

    /**
     * Agent constructor.
     * @param $idAgent
     * @param $matricule
     * @param $nom
     * @param $postnom
     * @param $prenom
     * @param $genre
     * @param $titre
     * @param $tel
     * @param $mail
     * @param $adresse
     * @param $dateNaissance
     * @param $lieuNaissance
     * @param $nationalite
     * @param $photo
     */
    public function __construct($idAgent, $matricule, $nom, $postnom, $prenom, $genre, $titre, $tel, $mail, $adresse, $dateNaissance, $lieuNaissance, $nationalite, $employeur, $photo)
    {
        $this->idAgent = $idAgent;
        $this->matricule = $matricule;
        $this->nom = $nom;
        $this->postnom = $postnom;
        $this->prenom = $prenom;
        $this->genre = $genre;
        $this->titre = $titre;
        $this->tel = $tel;
        $this->mail = $mail;
        $this->adresse = $adresse;
        $this->dateNaissance = $dateNaissance;
        $this->lieuNaissance = $lieuNaissance;
        $this->nationalite = $nationalite;
        $this->employeur= $employeur;
        $this->photo = $photo;
    }


    public  static  function afficher(){
        $pdo_con= connexion::getConnexion();
        $pdo_query= " SELECT * FROM `agent` ";

        $pdo_select=$pdo_con -> prepare($pdo_query);
        $pdo_select->execute();
        $tableau=array();
        if($pdo_select!= null){
            while ($ob= $pdo_select->fetch(PDO::FETCH_OBJ)){
                $tableau []= new Agent($ob->idAgent,
                $ob->matricule,
                $ob->nom,
                $ob->postnom,
                $ob->prenom,
                $ob->genre,
                $ob->titre,
                $ob->tel,
                $ob->mail,
                $ob->adresse,
                $ob->dateNaissance,
                $ob->lieuNaissance,
                $ob->nationalite,
                $ob->employeur,
                $ob->photo
                );


            }
            return $tableau;
        }
    }

    public  static  function search($mot){
        $pdo_con= connexion::getConnexion();
        $pdo_query= "SELECT * FROM `agent` WHERE `nom` = :mot or `postnom` = :mot or `prenom` = :mot or `genre` = :mot or `titre` = :mot or `mail` = :mot or `adresse` = :mot or `employeur`= :mot";

        $pdo_select=$pdo_con -> prepare($pdo_query);
        $pdo_select->bindParam(':mot', $mot);
        $pdo_select->execute();

        $tableau=array();
        if($pdo_select!= null){
            while ($ob= $pdo_select->fetch(PDO::FETCH_OBJ)){
                $tableau []= new Agent($ob->idAgent,
                    $ob->matricule,
                    $ob->nom,
                    $ob->postnom,
                    $ob->prenom,
                    $ob->genre,
                    $ob->titre,
                    $ob->tel,
                    $ob->mail,
                    $ob->adresse,
                    $ob->dateNaissance,
                    $ob->lieuNaissance,
                    $ob->nationalite,
                    $ob->employeur,
                    $ob->photo

                );


            }
            return $tableau;
        }
    }
    public  static  function get1gentByID($id){
        $pdo_con= connexion::getConnexion();
        $pdo_query= " SELECT * FROM `agent` where idAgent = :idAgent ";

        $pdo_select=$pdo_con -> prepare($pdo_query);
        $pdo_select->bindParam(':idAgent', $id);
        $pdo_select->execute();
        $a=null;
        if($pdo_select!= null){
            while ($ob= $pdo_select->fetch(PDO::FETCH_OBJ)){
                $a= new Agent($ob->idAgent,
                    $ob->matricule,
                    $ob->nom,
                    $ob->postnom,
                    $ob->prenom,
                    $ob->genre,
                    $ob->titre,
                    $ob->tel,
                    $ob->mail,
                    $ob->adresse,
                    $ob->dateNaissance,
                    $ob->lieuNaissance,
                    $ob->nationalite,
                    $ob->employeur,
                    $ob->photo
                );
                $a->setUtilisateur($ob->username);

            }
            return $a;
        }
    }
    public  static  function getAgentByUser($user){
        $pdo_con= connexion::getConnexion();
        $pdo_query= " SELECT * FROM `agent` WHERE `username` = :username ";

        $pdo_select=$pdo_con -> prepare($pdo_query);
        $pdo_select->bindParam(':username', $user);
        $pdo_select->execute();
        $a=null;
        if($pdo_select!= null){
            while ($ob= $pdo_select->fetch(PDO::FETCH_OBJ)){
                $a= new Agent($ob->idAgent,
                    $ob->matricule,
                    $ob->nom,
                    $ob->postnom,
                    $ob->prenom,
                    $ob->genre,
                    $ob->titre,
                    $ob->tel,
                    $ob->mail,
                    $ob->adresse,
                    $ob->dateNaissance,
                    $ob->lieuNaissance,
                    $ob->nationalite,
                    $ob->employeur,
                    $ob->photo
                );
                $a->setUtilisateur($ob->username);

            }

            return $a;
        }
    }

    public static function ajouter( $matricule, $nom, $postnom, $prenom, $genre, $titre, $tel, $mail, $adresse, $dateNaissance, $lieuNaissance, $nationalite, $employeur, $photo){


        try {
            $pdo_con= connexion::getConnexion();
            $stmt = $pdo_con->prepare("INSERT INTO `agent`(`matricule`, `nom`, `postnom`, `prenom`, `genre`, `titre`, `tel`, `mail`, `adresse`, `dateNaissance`, `lieuNaisssance`, `nationalite`, `username`, `employeur`, `photo`) 
                                                             VALUES (:matricule,  :nom,  :postnom,  :prenom,  :genre,  :titre,  :tel,  :mail,  :adresse,  :dateNaissance,  :lieuNaisssance,  :nationalite,  :username,  :employeur,  :photo)");
            $stmt->bindParam(':matricule', $matricule);
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':postnom', $postnom);
            $stmt->bindParam(':prenom', $prenom);
            $stmt->bindParam(':genre', $genre);
            $stmt->bindParam(':titre', $titre);
            $stmt->bindParam(':tel', $tel);
            $stmt->bindParam(':mail', $mail);
            $stmt->bindParam(':adresse', $adresse);
            $stmt->bindParam(':dateNaissance', strftime('%Y:%m:%d', strtotime($dateNaissance)));
            $stmt->bindParam(':lieuNaisssance', $lieuNaissance);
            $stmt->bindParam(':nationalite', $nationalite);
            $stmt->bindParam(':username', $mail);
            $stmt->bindParam(':employeur', $employeur);
            $stmt->bindParam(':photo', $photo);
            $stmt->execute();
            echo "New records created successfully";
        }
        catch(PDOException $e)
        {
            echo "<br>erreure <br>" . $e->getMessage()."<br>a la ligne ".$e->getLine();
        }

    }

    /**
     * @param $idAgent
     * @param $matricule
     * @param $nom
     * @param $postnom
     * @param $prenom
     * @param $genre
     * @param $titre
     * @param $tel
     * @param $mail
     * @param $adresse
     * @param $dateNaissance
     * @param $lieuNaissance
     * @param $nationalite
     * @param $employeur
     * @param $photo
     */
    private static function modifier($idAgent, $matricule, $nom, $postnom, $prenom, $genre, $titre, $tel, $mail, $adresse, $dateNaissance, $lieuNaissance, $nationalite, $employeur, $photo){
        try {
            $pdo_con= connexion::getConnexion();
            $pdo_query= "UPDATE `agent` SET `nom`=:nom,`postnom`=:postnom,`prenom`=:prenom,`genre`=:genre,`titre`=:titre,`tel`=:tel,`mail`=:mail,`adresse`=:adresse,`dateNaissance`=:dateNaissance,`lieuNaisssance`=:lieuNaisssance,`nationalite`=:nationalite, `photo`=:photo WHERE `idAgent`=:idAgent";

            // Prepare statement
            $stmt = $pdo_con->prepare($pdo_query);

            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':postnom', $postnom);
            $stmt->bindParam(':prenom', $prenom);
            $stmt->bindParam(':genre', $genre);
            $stmt->bindParam(':titre', $titre);
            $stmt->bindParam(':tel', $tel);
            $stmt->bindParam(':mail', $mail);
            $stmt->bindParam(':adresse', $adresse);
            $stmt->bindParam(':dateNaissance', $dateNaissance);
            $stmt->bindParam(':lieuNaissance', $lieuNaissance);
            $stmt->bindParam(':nationalite', $nationalite);

            $stmt->bindParam(':employeur', $employeur);
            $stmt->bindParam(':postnom', $photo);

            // execute the query
            $stmt->execute();

            // echo a message to say the UPDATE succeeded
            echo $stmt->rowCount() . " records UPDATED successfully";
        }
        catch(PDOException $e)
        {
            echo "erreur<br>" . $e->getLine();
        }

    }
    private static function supprimer($idAgent){

    }
    public function getIdAgent() {
        return $this ->idAgent;
    }

    public function setIdAgent($idAgent) {
        $this ->idAgent = $idAgent;
    }

    public function getMatricule() {
        return $this -> matricule;
    }

    public function setMatricule($matricule) {
        $this ->matricule = $matricule;
    }

    public function getNom() {
        return $this ->nom;
    }

    public function setNom($nom) {
        $this ->nom = $nom;
    }

    public function getPostnom() {
        return $this ->postnom;
    }

    public function setPostnom($postnom) {
        $this ->postnom = $postnom;
    }

    public function getPrenom() {
        return $this ->prenom;
    }

    public function setPrenom($prenom) {
        $this ->prenom = $prenom;
    }

    public function getTitre() {
        return $this ->titre;
    }

    public function setTitre($titre) {
        $this ->titre = $titre;
    }

    public function getTel() {
        return $this ->tel;
    }

    public function setTel($tel) {
        $this ->tel = $tel;
    }

    public function getMail() {
        return $this ->mail;
    }

    public function setMail($mail) {
        $this ->mail = $mail;
    }

    public function getDateNaissance() {
        return $this -> dateNaissance;
    }

    public function setDateNaissance($dateNaissance) {
        $this ->dateNaissance = $dateNaissance;
    }

    public function getLieuNaissance() {
        return $this -> lieuNaissance;
    }

    public function setLieuNaissance($lieuNaissance) {
        $this ->lieuNaissance = $lieuNaissance;
    }

    public function getNationalite() {
        return $this -> nationalite;
    }

    public function setNationalite($nationalite) {
        $this ->nationalite = $nationalite;
    }

    public function getAdresse() {
        return $this -> adresse;
    }

    public function setAdresse($adresse) {
    $this ->adresse = $adresse;
}

    public function getGenre() {
        return $this ->genre;
    }

    public function setGenre($genre) {
        $this ->genre = $genre;
    }

    public function getUtilisateur() {
        return $this ->utilisateur;
    }

    public function setUtilisateur($utilisateur) {
        $this ->utilisateur = $utilisateur;
    }

    public function getPhoto() {
        return $this ->photo;
    }

    public function setPhoto($photo) {
        $this ->photo = $photo;
    }

    /**
     * @return mixed
     */
    public function getEmployeur()
    {
        return $this->employeur;
    }

    /**
     * @param mixed $employeur
     */
    public function setEmployeur($employeur)
    {
        $this->employeur = $employeur;
    }


}