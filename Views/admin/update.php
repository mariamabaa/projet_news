<?php
     require_once(dirname(__FILE__)."/../../Controller/Controller.php");
     $controller = new Controller();
     if(isset($_POST['updateuser'])){
          if(isset($_POST['id'])){
               if($controller->update($_POST['nom'],$_POST['username'],$_POST['prenom'],$_POST['mdp'],$_POST['id'])){
                    $controller->redirect(1);
               }
          }
     }else if(isset($_POST['updatearticle'])){
          if(isset($_POST['id'])){
               if($controller->editArticle($_POST['titre'],$_POST['contenu'],$_POST['categorie'],$_POST['id'])){
                    $controller->backToArticle();
               }
          }   
     }
