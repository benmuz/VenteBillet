<?php
/**
 * Created by PhpStorm.
 * User: Godza bupe
 * Date: 10/30/2017
 * Time: 4:32 PM
 */

// definitions des constantes

// pour la bdd

    if (! defined('DB_SERVEUR')) define('DB_SERVEUR', 'localhost');

    if( ! defined('DB_USER')) define('DB_USER', 'root');

    if( ! defined('DB_PASSWORD')) define('DB_PASSWORD', '');

    if( ! defined('DB_NAME')) define('DB_NAME', 'billet_bd');

    if( ! defined('DB_DSN')) define('DB_DSN', 'mysql: host='.DB_SERVEUR.';dbname='.DB_NAME.'');




