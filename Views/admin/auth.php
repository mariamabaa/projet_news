<?php
    require_once(dirname(__FILE__)."/../../Controller/Controller.php");
    require_once(dirname(__FILE__)."/../../Model/Entity/Authentificator.class.php");
    require_once(dirname(__FILE__)."/../../Model/Entity/User.class.php");
    require_once(dirname(__FILE__)."/../../Model/service/SessionMgn.class.php");

    $auth= new  Authentificator();
    $user = new User(array());
    $controller= new Controller();
    if(isset($_POST)){
    $user->setUsername($_POST['username']);
     $user->setMdp($_POST['mdp']);
     if(($res = $auth->authentificate($user->getUsername(),$user->getMdp()))->statut){
         $session = new SessionMgn();
         $session->start();
         $_SESSION['id'] =  $res->id;
         $_SESSION['username'] = $res->username;
         $controller->redirect(1);
     }
    }

    

?>
