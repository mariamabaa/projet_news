<?php

    include './nusoap-0/lib/nusoap.php';
    //include '../../Model/Data/Connexion.class.php';
    //include '../../Model/Entity/User.class.php';
    require '../../Model/Manager/UserDaoSoap.php';
    
    //require ('../../modele/dao/dao_authentification.php');

    // $user = new UsersDao();

    // Create the server instance
    $server = new soap_server();
    $server -> configureWSDL ('server', 'urn:server');


    function hello ($username) {
        return 'Hello, '.$username. '!';
    }

    // Register the "hello" method to expose it
   $server -> register ('hello',
                        array ('username' => 'xsd:string'),
                        array ('return' => 'xsd:string')
                    );
   $server->register('delete',
                    array('id'=>'xsd:int'),
                    array('return'=>'xsd:int'));

   $server->register('addUser',
                    array('nom'=>'xsd:string',
                        'prenom'=>'xsd:string',
                        'username'=>'xsd:string',
                        'mdp'=>'xsd:string',
                        'deleted'=>'xsd:int',
                        'statut'=>'xsd:int'),
                    array('return'=>'xsd:int'));

$server->register('updateUser',
                    array('nom'=>'xsd:string',
                        'username'=>'xsd:string',
                        'prenom'=>'xsd:string',
                        'mdp'=>'xsd:string',
                        'id'=>'xsd:int'),
                    array('return'=>'xsd:int'));



     //$server -> register ("UsersDao.get_users", array ('user' => 'xsd:string'), array('return' => 'xsd:string'));

    



    // function helloo ($username) {
    //     return 'Hello, '.$username. '!';
    // }

    $HTTP_RAW_POST_DATA = isset ($HTTP_RAW_POST_DATA)
        ? $HTTP_RAW_POST_DATA : '';
    @$server->service(file_get_contents("php://input"));
?>
