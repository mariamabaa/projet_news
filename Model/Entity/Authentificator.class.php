<?php

require_once(dirname('__FILE__')."/../../Model/Data/Connexion.class.php");

class Authentificator{
    private $connection;

    public function __construct(){
        $this->connection = Connexion::getConnexion();
    }

    public  function authentificate($username,$password){
        $query = $this->connection->prepare("SELECT * from user where user.username = :username and user.mdp= :password");
        $result = $query->execute(array(
            'username'=> $username,
            'password'=> $password
        ));
        $result= $query->fetch(PDO::FETCH_OBJ);
        if($result!=true){
           return -1;
        }
        return $result;
    }

 
}