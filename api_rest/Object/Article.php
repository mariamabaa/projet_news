<?php
class Article{
    // Connexion
    private $connexion;
    private $table = "Article";
    private $tab = "Categorie";

    // object properties
    public $id;
    public $titre;
    public $contenu;
    public $dateCreation;
    public $dateModification;
    public $categorie;
    //public $created_at;

    /**
     * Constructeur avec $db pour la connexion à la base de données
     *
     * @param $db
     */
    public function __construct($db){
        $this->connexion = $db;
    }

    /**
     * Lecture des Articlephp
     *
     * @return void
     */
    public function lire(){
        // On écrit la requête
        $sql = "SELECT c.titre as titre, p.id, p.titre, p.contenu, p.dateCreation, p.dateModification, p.categorie FROM " . $this->table . " p LEFT JOIN Article c ON p.id = c.id ORDER BY p.dateCreation DESC";

        // On prépare la requête
        $query = $this->connexion->prepare($sql);

        // On exécute la requête
        $query->execute();

        // On retourne le résultat
        return $query;
    }
    /**
     * Lecture des Article par categorie
     *
     *
     */
    public function lireByCategorie()
    {
      $sql = "SELECT c.titre as titre, p.id, p.titre, p.contenu, p.dateCreation, p.dateModification, p.categorie FROM " .Article . " p LEFT JOIN Article c ON p.id = c.id ORDER BY p.id DESC";

      // On prépare la requête
      $query = $this->connexion->prepare($sql);

      // On exécute la requête
      $query->execute();

      // On retourne le résultat
      return $query;
    }

    //$get = $_GET['$get']
    public function getById($id)
    {
      $id = $_GET['id'];
      $sql = "SELECT * FROM ". Article. " WHERE id = " .$id;

      // On prépare la requête
      $query = $this->connexion->prepare($sql);

      // On exécute la requête
      $query->execute();

      // On retourne le résultat
      return $query;
    }





}
