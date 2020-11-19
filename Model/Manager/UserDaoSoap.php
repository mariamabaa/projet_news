<?php
 //declare(strict_types=1);
 //require_once(dirname(__FILE__).'/../../assets/Utilities/HydratationTrait.php');

 //private $db;


    function addUser($nom,$prenom,$username,$mdp,$deleted,$statut){
        require_once('connex.php');
    $request = $db->prepare("INSERT into user(nom,prenom,username,mdp,deleted,statut) values(:nom ,:prenom,:username,:mdp,:deleted,:statut");
    $request->execute(array(
        'nom'  => $nom,
        'prenom' => $prenom,
        'username' => $username,
        'mdp' => $mdp,
        'deleted' => $deleted,
        'statut' => $statut
    ));
    return 1;
}


function updateUser($nom,$username,$prenom,$mdp,$id)
{
    require_once('connex.php');
    $request = $db->prepare("update user set nom = :nom , username= :username ,prenom = :prenom , mdp= :mdp,  WHERE id = :id ");
    $request->execute(array(
            'nom' => $nom,
            'username' => $username,
            'prenom' => $prenom,
            'mdp' => $mdp,
            'id' => $id
    ));
    return 1;
}


function delete($id)
{
    require_once('connex.php');
    $request = $db->prepare("update user set deleted = 1  WHERE id = :id");
    $request->execute(array(
            'id' => $id
    ));
    return 1;
}
?>
