<?php

class CategorieManager 
{

    private $db;

    public function __construct($db)
    {
        $this->setDb($db);
    }

    public function getDb($db)
    {
        return $this->db;
    }

    private function setDb($db)
    {
        $this->db = $db;
    }

    public function getAll()
    {
        $categories = array();

        $request = $this->db->query('SELECT * FROM Categorie');
        $data = $request->fetchAll(PDO::FETCH_OBJ);
        return $data;
    }

    public function get($id)
    {
        $id = (int) $id;

        $request = $this->db->query('SELECT * FROM Categorie WHERE id = '.$id);
        $data = $request->fetch(PDO::FETCH_OBJ);

        return new Categorie($data);
    }



}