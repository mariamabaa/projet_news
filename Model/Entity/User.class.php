<?php

declare(strict_types=1);
require_once(dirname(__FILE__).'/../../assets/Utilities/HydratationTrait.php');

class User 
{
    use HydratationTrait;
    private $id;
    private $nom;
    private $prenom;
    private $username;
    private $mdp;
    private $deleted;
    private $statut;

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
    public function getNom()
    {
        return $this->nom;
    }
    public function setNom($nom)
    {
        $this->nom = $nom;
    }
    public function getPrenom()
    {
        return $this->prenom;
    }
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }
    public function getMail()
    {
        return $this->mail;
    }
    public function setMail($mail)
    {
        $this->mail = $mail;
    }
    public function getStatut()
    {
        return $this->statut;
    }
    public function setStatut($statut)
    {
        $this->statut = $statut;
    }

    public function getUsername()
    {
        return $this->username;
    }
    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getMdp()
    {
        return $this->mdp;
    }
    public function setMdp($mdp)
    {
        $this->mdp = $mdp;
    }

    public function getDeleted()
    {
        return $this->deleted;
    }
    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;
    }

}