<?php
     require_once(dirname(__FILE__)."/../../Controller/Controller.php");
     $controller = new Controller();
     if(isset($_GET['id'])){
          if($controller->del($_GET['id'])){
                    $controller->redirect(1);
          }
     }
     
?>