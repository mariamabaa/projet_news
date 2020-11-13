<?php
try 
        {
            $user = 'root';
            $password = '';
            $server = 'localhost';
            $dbname = 'mglsi_news;charset=utf8';
            $db = new PDO('mysql:host='.$server.';dbname='.$dbname, $user, $password);
        }
        catch(PDOException $e)
        {
            echo 'Une erreur est survenue lors de la connection à la BD => '. $e->getMessage();
            die();
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualités </title>
    <meta content="Bootstrap News Template - Free HTML Templates" name="keywords">
    <meta content="Bootstrap News Template - Free HTML Templates" name="description">
    <!-- Favicon -->
    <link href="assets/img2/favicon.ico" rel="icon">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600&display=swap" rel="stylesheet">
    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="assets/lib/slick/slick.css" rel="stylesheet">
    <link href="assets/lib/slick/slick-theme.css" rel="stylesheet">
    <!-- Stylesheets -->
	<link rel="stylesheet" href="assets/css/style2.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<body style=" font-family: serif;">
<!-- Top Bar Start -->
        <div class="top-bar  navbar-inverse">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="tb-contact">
                            <p><i class="fas fa-envelope"></i>info@mail.com</p>
                            <p><i class="fas fa-phone-alt"></i>+221 777447004</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="tb-menu">
                            <a href="">About</a>
                            <a href="">Privacy</a>
                            <a href="">Terms</a>
                            <a href="">Contact</a>
                        </div>
                    </div>
                </div>
                <?php require_once('entete.php');?>

            </div>
        </div>
        <!-- Top Bar Start -->

        <!-- Nav Bar Start -->
        <div class="nav-bar navbar navbar-inverse">
            <div class="container">
                <nav class="navbar navbar-expand-md bg-dark navbar-dark">
                    <a href="#" class="navbar-brand">MENU</a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto">
                            <a href="" class="nav-item nav-link active">Home</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Dropdown</a>
                                <div class="dropdown-menu">
                                    <a href="#" class="dropdown-item">Sub Item 1</a>
                                    <a href="#" class="dropdown-item">Sub Item 2</a>
                                </div>
                            </div>
                            <a href="single-page.html" class="nav-item nav-link">Single Page</a>
                            <a href="contact.html" class="nav-item nav-link">Contact Us</a>
                        </div>
                        <div class="social ml-auto">
                            <a href=""><i class="fab fa-twitter"></i></a>
                            <a href=""><i class="fab fa-facebook-f"></i></a>
                            <a href=""><i class="fab fa-linkedin-in"></i></a>
                            <a href=""><i class="fab fa-instagram"></i></a>
                            <a href=""><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Nav Bar End -->
         <!-- Category News Start-->
        <div class="cat-news">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div id="contenu">
                            <?php
                                require_once('../Controller/Controller.php');
                                $controller = new Controller();
                                $article = null;
                                
                                if(isset($_GET['id'])){
                                    $article = $controller-> article($_GET['id']);
                                }
                                
                                if($article != null) { ?>
                                <h1 class="article"><?= $article->titre ?></h1>
                                <span ><h6 style="color: red;">Publié le <?= $article->dateCreation ?></h6></span>
                                <p><?= $article->contenu ?></p>
                            <?php } else { ?>
                                <meta http-equiv="refresh" content="3; url=../accueil">
                                <h1>Aucun article trouvé !</h1>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                       <h2>Catégories</h2>
                        <div class="row cn-slider">
                                <div>
                                    <ul>
                                        <li class="col-26 liste article"><a href="../index.php">Tout</a></li>
                                        <?php
                                            $controller= new Controller();
                                            $categories = $controller->allCategories;
                                            foreach ($categories as $categorie):?>
                                            <li class="col-26 liste article"><a href="../categorie/<?= $categorie->id ?>"><?= mb_convert_encoding($categorie->libelle,"utf-8") ?></a></li>
                                        <?php endforeach ?>
                                    </ul>
                                </div>
                        </div>
                        <h2>Derniers articles publiés</h2>
                        <div class="row cn-slider">
                            <?php
                                        // On détermine sur quelle page on se trouve
                                        if(isset($_GET['page']) && !empty($_GET['page'])){
                                            $currentPage = (int) strip_tags($_GET['page']);
                                        }else{
                                            $currentPage = 1;
                                        }
                                        // On détermine le nombre total d'articles
                                        $sql = 'SELECT COUNT(*) AS nb_articles FROM `Article`;';

                                        // On prépare la requête
                                        $query = $db->prepare($sql);

                                        // On exécute
                                        $query->execute();

                                        // On récupère le nombre d'articles
                                        $result = $query->fetch();

                                        $nbArticles = (int) $result['nb_articles'];

                                        // On détermine le nombre d'articles par page
                                        $parPage = 10;

                                        // On calcule le nombre de pages total
                                        $pages = ceil($nbArticles / $parPage);

                                        // Calcul du 1er article de la page
                                        $premier = ($currentPage * $parPage) - $parPage;

                                        $sql = 'SELECT * FROM `Article` ORDER BY `dateCreation` DESC LIMIT :premier, :parpage;';

                                        // On prépare la requête
                                        $query = $db->prepare($sql);

                                        $query->bindValue(':premier', $premier, PDO::PARAM_INT);
                                        $query->bindValue(':parpage', $parPage, PDO::PARAM_INT);

                                        // On exécute
                                        $query->execute();

                                        // On récupère les valeurs dans un tableau associatif
                                        $articles = $query->fetchAll(PDO::FETCH_ASSOC);

                                        //require_once('close.php');
                            ?>
                            <main class="container" >
                                <div class="row">
                                    <section class="col-26  liste  " >
                                        <table class="table article">
                                            <thead>
                                                <th>Titre</th>
                                                <th>Date</th>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach($articles as $article){
                                                ?>
                                                    <tr>
                                                        <td><?= $article['titre'] ?></td>
                                                        <td><?= $article['dateCreation'] ?></td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                        <nav>
                                            <ul class="pagination">
                                                <!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
                                                <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
                                                    <a href="./?page=<?= $currentPage - 1 ?>" class="page-link">Précédent</a>
                                                </li>
                                                <?php for($page = 1; $page <= $pages; $page++): ?>
                                                  <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
                                                  <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                                                        <a href="./?page=<?= $page ?>" class="page-link"><?= $page ?></a>
                                                    </li>
                                                <?php endfor ?>
                                                  <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
                                                  <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
                                                    <a href="./?page=<?= $currentPage + 1 ?>" class="page-link">Suivant</a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </section>
                                </div>
                            </main>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Category News End-->
</body>
</html>
