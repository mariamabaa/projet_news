<?php

require_once(dirname(__FILE__).'/../../assets/Utilities/HydratationTrait.php');

class Categorie 
{
    use HydratationTrait;

    private $id;
    private $libelle;

    public function __construct(Array $data)
    {
        $this->hydrate($data);
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getLibelle()
    {
        return $this->libelle;
    }

    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;
    }
}