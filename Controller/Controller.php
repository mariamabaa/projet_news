<?php
require_once(dirname(__FILE__).'/../Model/Data/Connexion.class.php');
require_once(dirname(__FILE__).'/../Model/Entity/Article.class.php');
require_once(dirname(__FILE__).'/../Model/Manager/ArticleManager.class.php');
require_once(dirname(__FILE__).'/../Model/Entity/Categorie.class.php');
require_once(dirname(__FILE__).'/../Model/Manager/CategorieManager.class.php');
require_once(dirname(__FILE__).'/../Model/Entity/User.class.php');
require_once(dirname(__FILE__).'/../Model/Manager/UserDAO.class.php');
require_once(dirname(__FILE__).'/../Model/service/SessionMgn.class.php');

/**
 * Classe représentant le controller  et comportant des méthodes implementés 
 * en fonction de la requête d'un utilisateur.
 * 
 */
class Controller
{
    private $connexion;
    private $articleManager;
    private $categorieManager;
    public  $allArticles;
    public  $allCategories;
    public  $userManager;
    public  $listUser;
    public  $article;

    public function __construct()
    {
        $this->connexion = \Connexion::getConnexion();
        $this->articleManager = new \ArticleManager($this->connexion);
        $this->userManager = new UserDAO($this->connexion);
        $this->categorieManager = new \CategorieManager($this->connexion);
        $this->allArticles = $this->articleManager->getAll();
        $this->allCategories = $this->categorieManager->getAll();
        $this->listUser = $this->userManager->allUser();
    }

    public function del($id){
        return $this->userManager->delete($id);
    }
    public function update($nom,$username,$prenom,$mdp,$id){
       return  $this->userManager->updateUser($nom,$username,$prenom,$mdp,$id);
    }
    
    
    public function articleByCategory($id)
    {
        $itemArticles = $this->articleManager->getByCategory($id);
        return $itemArticles;
    }

    public function saveArticle($titre,$contenu,$categorie){
        return $this->articleManager->addArticle($titre,$contenu,$categorie);
    }

    public function editArticle($titre,$contenu,$categorie,$id){
        return $this->articleManager->reediter($titre,$contenu,$categorie,$id);
    }

    public function  removeArticle($id){
        return $this->articleManager->deleteArticle($id);
    }
    public function article($id)
    {
        $article = $this->articleManager->get($id);
        return $article;
    }

   
    

    public function home(){
        header('Location:/projet_news/accueil');
        exit();
    }

    public function redirect($token){
            if($token==1){
                header('Location:'.$_SERVER['ROOT'].'/projet_news/admin/dashboard');
                exit();
            }else{
                header('Location:'.$_SERVER['ROOT'].'/projet_news/accueil');
                exit();
            }
    }

    public function logout(){
        $session = new SessionMgn();
        $session->start();
        $session->destroySession(); 
        $this->home();
    }

    public function backToArticle(){
        header('Location:'.$_SERVER['ROOT'].'/projet_news/admin/larticle');
        exit();
    }



 
}
