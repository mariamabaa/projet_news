<?php
 declare(strict_types=1);
 require_once(dirname(__FILE__).'/../../assets/Utilities/HydratationTrait.php');

class UserDAO
{
    private $db;
    public function __construct($db)
    {
        $this->setDb($db);
    }
    public function getDb()
    {
        return $this->db;
    }
    private function setDb($db)
    {
        $this->db = $db;
    }

    
   
    public function get($id)
    {
        $id = (int) $id;
        $request = $this->db->query('SELECT * FROM user WHERE id = '.$id);
        $data = $request->fetch(PDO::FETCH_ASSOC);
        $user = ($data === false) ? null : new User($data);
        return $user;
    }

    public function allUser()
    { /**
        *statut 1 signifie un administrateu
        *statut 2 signifie un utilisateur simple
        */
        $users = array();
        $request = $this->db->query('SELECT * FROM user WHERE deleted = 0 and statut <>  1 '); 
        while($data = $request->fetch(PDO::FETCH_ASSOC))
        {
            $users [] = new User($data);
        }
        
        return $users;
    }


    public function checkUser()
    {
        $sql = 'SELECT COUNT(pseudo) FROM user WHERE username = ?';
        $request = $this->db->prepare($sql);
        $request->bindParam(1,$_POST['username']);
        $request->execute();
        $isUnique = $request->fetchColumn();

        if($isUnique){
            echo "Cet utilisateur existe déja !";
        }
    }

public function getAllAdmins()
{
    $users = array();
    $request = $this->db->query('SELECT * FROM user WHERE statut = 1 and deleted=0');
    while($data = $request->fetch(PDO::FETCH_ASSOC))
    {
        $users [] = new User($data);
    }
    
    return $users;
}

public function updateUser($nom,$username,$prenom,$mdp,$id)
{
    $request = $this->db->prepare("update user set  username= :username ,mdp= :mdp, nom = :nom , prenom = :prenom WHERE id = :id ");
    $request->execute(array(
            'username' => $username,
            'nom' => $nom,
            'mdp' => $mdp,
            'prenom' => $prenom,
            'id' => $id
    ));
    return 1;
}


public function delete($id)
{
    $request = $this->db->prepare("update user set deleted = 1  WHERE id=:id");
    $request->execute(array(
            'id' => $id
    ));
    return 1;
}


   /* public function register(User $user)
    {
        
        $this->checkUser($post);
        $salt ="azertyuiopqsdfhklmnbvcxw123456489";
        $sql = 'INSERT INTO user (username, mdp, nom,prenom, statut ,deleted) VALUES (?,?,?,?,?)';
        $
    }*/


  /*  public function createQuery($request,$parameter=array()){
        foreach($parameter as $param){
            echo $param[0];
        }
    }
*/

}