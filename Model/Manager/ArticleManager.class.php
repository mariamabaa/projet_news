<?php

class ArticleManager 
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

    public function getAll()
    {
        $articles = array();

        $request = $this->db->query('SELECT * FROM Article');

        while($data = $request->fetch(PDO::FETCH_ASSOC))
        {
            $articles [] = new Article($data);
        }
        
        return $articles;
    }

    public function get($id)
    {
        $id = (int) $id;

        $request = $this->db->query('SELECT * FROM Article WHERE id = '.$id);
        $data = $request->fetch(PDO::FETCH_OBJ);
        return $data;
    }

    public function getByCategory($category)
    {
        $articles = array();
        $category = (int) $category;

        $request = $this->db->prepare('SELECT * FROM Article WHERE categorie = :categorie');
        $request->execute(array(
            'categorie' => $category
        ));
        return $articles = $request->fetchAll(PDO::FETCH_OBJ);
    }
    public function reediter($titre,$contenu,$categorie,$id){
        $request = $this->db->prepare('Update Article set  titre =:titre, contenu =:contenu ,categorie=:categorie where id =:id');
        $request->execute(array(
            'titre' => $titre,
            'contenu' =>$contenu,
            'categorie' => $categorie,
            'id' => $id
        ));
        return 1;
    }

    public function deleteArticle($id)
{
    $request = $this->db->prepare("UPDATE Article set deleted = 1  WHERE id=:id");
    $request->execute(array(
            'id' => $id
    ));
    return 1;
}

public function addArticle($titre,$contenu,$categorie){
    $request = $this->db->prepare("INSERT into Article(titre,categorie,contenu,dateCreation) values(:titre ,:categorie,:contenu,NOW())");
    $request->execute(array(
        'titre'  => $titre,
        'categorie' => $categorie,
        'contenu' => $contenu
    ));
    return 1;
}

}