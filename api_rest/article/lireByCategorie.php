<?php
// Headers requis
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// On vérifie que la méthode utilisée est correcte
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    // On inclut les fichiers de configuration et d'accès aux données
    include_once '../Config/Database.php';
    include_once '../Object/Article.php';

    // On instancie la base de données
    $database = new Database();
    $db = $database->getConnection();

    // On instancie les produits
    $produit = new Article($db);

    // On récupère les données
    $stmt = $produit->lireByCategorie();

    // On vérifie si on a au moins 1 produit
    if($stmt->rowCount() > 0){
        // On initialise un tableau associatif
        $tableauArticle = [];
        $tableauArticle['Article'] = [];

        // On parcourt les produits
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);

            $prod = [
                "id" => $id,
                "titre" => $titre,
                "contenu" => $contenu,
                "dateCreation" => $dateCreation,
                "dateModification" => $dateModification,
                "categorie" => $categorie
            ];

            $tableauArticle['Article'][] = $prod;
        }

        // On envoie le code réponse 200 OK
        http_response_code(200);

        // On encode en json et on envoie
        //echo json_encode($tableauArticle);
        $format=$_GET["format"];
        if ($format =='json') {
          echo json_encode($tableauArticle);
          //echo $format;
        }
        else {
          header("Content-Type: application/xml; charset=UTF-8");
          $xml = new SimpleXMLElement('<racine/>');
          $produit=$xml->addChild('Article');
          foreach ($tableauArticle as $Article) {
            foreach ($Article as $key) {
              $produit->addChild('id', $key['id']);
              $produit->addChild('titre', $key['titre']);
              $produit->addChild('contenu', $key['contenu']);
              $produit->addChild('dateCreation', $key['dateCreation']);
              $produit->addChild('dateModification', $key['dateModification']);
              $produit->addChild('categorie', $key['categorie']);
            }
          }
          echo $xml->asXML();
        }
    }


    else
    {
        http_response_code(404);

        echo json_encode(
            array("message" => "Cette categorie ne possede pas d'articles.")
        );
    }

}else{
    // On gère l'erreur
    http_response_code(405);
    echo json_encode(["message" => "La méthode n'est pas autorisée"]);
}
