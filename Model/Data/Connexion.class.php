<?php

/** 
 
 * Classe permettant d'établir une connexion avec notre BD.
 *
 */

class Connexion 
{
    private static $connexion;

    /**
     * Initialisation de la connexion à la BD.
     *
     */
    private function __construct()
    {
        try 
        {
            $user = 'root';
			$password = '';
			$server = 'localhost';
            $dbname = 'mglsi_news;charset=utf8';
            self::$connexion = new PDO('mysql:host='.$server.';dbname='.$dbname, $user, $password, [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);
        }
        catch(Exception $e)
        {
            echo 'Une erreur est survenue lors de la connection à la BD => '. $e->getMessage();
            die();
        }
    }
    
    /**
     *
     * @return  une instance de Connexion
     */
    public static function getConnexion()
    {
        if(self::$connexion === null)
            self::$connexion == new Connexion;
        return self::$connexion;
    }
}
