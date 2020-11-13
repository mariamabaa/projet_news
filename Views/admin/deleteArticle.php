<?php
     require_once(dirname(__FILE__)."/../../Controller/Controller.php");
     $controller = new Controller();
     if(isset($_GET['idart'])){
          if($controller->removeArticle($_GET['idart'])){
               $controller->backToArticle();
          }
     }
?>