<?php
     require_once(dirname(__FILE__)."/../../Controller/Controller.php");
     $controller = new Controller();
     if(isset($_POST['save'])){
          if($controller->saveArticle($_POST['titre'],$_POST['contenu'],$_POST['categorie'])){
                $controller->backToArticle();
          }
     }
     
?>