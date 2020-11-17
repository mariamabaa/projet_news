<?php

require_once("../Model/Data/Connexion.class.php");
require_once("../Model/Entity/User.class.php");

class Users
{
   
    private $connection;

    public function __construct(){
        $this->connection = Connexion::getConnexion();
    }

    public function sayHello($firstName)
    {
        return 'Hello ' . $firstName;
    }

    public function all(){
        $request = $this->connection->query('SELECT * FROM user where statut <> 0 and deleted = 0');
        return $request->fetchAll(PDO::FETCH_OBJ);
    }
public function checkUser($username)
    {
        $sql = 'SELECT COUNT(*) FROM user WHERE username = ?';
        $request = $this->connection->prepare($sql);
        $request->bindParam(1,$username);
        $request->execute();
        $isUnique = $request->fetch();
        return $isUnique;
    }

  public function delete($id){
    $sql = 'UPDATE user set deleted = 1 where id = ?';
    $request = $this->connection->prepare($sql);
    $request->bindParam(1,$id);
    $request->execute();
    return  $id;
  }

  public function register(User $user){


    $sql ='INSERT INTO user(nom,prenom,username,mdp,deleted,statut) values (?,?,?,?,?,?)';
    $request = $this->connection->prepare($sql);
    $request->bindParam(1,$user->getNom());
    $request->bindParam(2,$user->getPrenom());
    
    $request->bindParam(3,$user->getUsername());
    $request->bindParam(4,$user->getPrenom());
    $request->bindParam(5,0);
    $request->bindParam(6,$user->getStatut());
    if(checkUser($user->getUsername())){
        return 0;
    }else
    $request->execute();
    return 1;
  }
  


}


        try {
          $server = new SOAPServer(
            NULL,array(
             'uri' => 'http://localhost/projet_news/soap/server.php'
            ));
          $server->setClass('Users');
          $server->handle();
        }

        catch (SOAPFault $f) {
          print $f->faultstring; exit;
        }