<?php

class Router
{
    public function run()
    {
        try{
            if(isset($_GET['route']))
            {
                if($_GET['route'] === 'article'){
                    header('location:/article');
                    exit();
                }
                else{
                    echo '<h1>404 PAGE not found !!</h1>';
                }
            }
            else{
                $controller = new Controller();
                $controller->home();
            }
        }
        catch (Exception $e)
        {
            echo 'Erreur';
        }
    }
}