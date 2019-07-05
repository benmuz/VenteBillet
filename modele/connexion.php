<?php

/**
 * Created by PhpStorm.
 * User: Godza bupe
 * Date: 11/2/2017
 * Time: 10:34 AM
 */
class connexion
{
    private  static  $ressources;

    public  static  function  getConnexion(){
        if(self::$ressources == null){
            self::$ressources= new  PDO(DB_DSN,DB_USER,DB_PASSWORD,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

            return self::$ressources;
        }
        else {
            return self::$ressources;

        }
    }


}