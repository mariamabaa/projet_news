<?php 
try 
        {
            $user = 'root';
            $password = '';
            $server = 'localhost';
            $dbname = 'mglsi_news;charset=utf8';
            $db = new PDO('mysql:host='.$server.';dbname='.$dbname, $user, $password);
        }
        catch(PDOException $e)
        {
            echo 'Une erreur est survenue lors de la connection à la BD => '. $e->getMessage();
            die();
        }
   
 ?>
