<?php
     require_once(dirname(__FILE__)."/../../Controller/Controller.php");
     $controller = new Controller();
     if(isset($_POST['saveu'])){
          if($controller->saveUser($_POST['nom'],$_POST['prenom'],$_POST['username'],$_POST['mdp'],$_POST['deleted'],$_POST['statut'])){
                $controller->backToArticle();
          }
     }
     
?>