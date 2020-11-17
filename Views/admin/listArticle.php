<?php
require_once(dirname(__FILE__) . "/../../Controller/Controller.php");
$controller  = new Controller();
$articles = $controller->allArticles;
require_once(dirname(__FILE__) . "/../../Model/service/SessionMgn.class.php");
$session = new SessionMgn();
$session->start();
if (!isset($_SESSION['id'])) {
  $controller->redirect(-1);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Admin</title>
  <!-- Custom fonts for this template-->
  <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="../assets/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="../assets/css/sb-admin.css" rel="stylesheet">
</head>
<body id="page-top">
  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
    <a class="navbar-brand mr-1" href="../admin">Admin ==> <?= $_SESSION['username'] ?></a>
  </nav>

  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="./dashboard" role="button">
          <span>Utlisateur</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" role="button">
          <span>Article</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./deconnexion">
          <span>Deconnexion</span></a>
      </li>
    </ul>
    <div id="content-wrapper">
      <div class="container-fluid">
        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Liste Article <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#basicExampleModal">Ajouter un article</button></div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>titre</th>
                    <th>categorie</th>
                    <th>Contenu</th>
                    <th>Date</th>
                    <th>Actions</th>

                  </tr>
                </thead>
                <tbody>
                  <!--ici on met le code pour afficher la liste des users-->
                  <?php foreach ($articles as $article) { ?>
                    <tr>
                      <td><?= $article->getTitre(); ?></td>
                      <td><?= $article->getCategorie(); ?></td>
                      <td><?= $article->getContenu(); ?></td>
                      <td><?= $article->getDateModification(); ?></td>
                      <td>
                        <form action="deleteart/<?= $article->getId() ?>" style="display:inline;" method="GET">
                          <button class="btn btn-danger" type="submit"><i class="fas fa-trash"></i></button>
                        </form>
                        <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modalSubscriptionForm"><i class="fas fa-edit"></i></button>
                        <form action="update/" style="display:inline;" method="POST">
                          <input type="hidden" name="id" value="<?= $article->getId() ?>">
                          <div class="modal fade" id="modalSubscriptionForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header text-center">
                                  <h4 class="modal-title w-100 font-weight-bold">Edition</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body mx-3">
                                  <div class="md-form mb-5">
                                    <i class="fas grey-text">Titre</i>
                                    <input placeholder="Votre titre" type="text" id="form3" name="titre" value="<?= $article->getTitre() ?>" class="form-control validate">
                                  </div>
                                  <div class="md-form mb-5">
                                    <i class="fas grey-text">Categorie de'article</i>
                                    <select name="categorie" class="primary" id="">
                                      <option value="1">Sport</option>
                                      <option value="2">Santé</option>
                                      <option value="3">Education</option>
                                      <option value="4">Politique</option>
                                    </select>
                                  </div>
                                  <div class="md-form mb-4">
                                    <i class="fas prefix grey-text">Contenu</i>
                                    <textarea name="contenu" id="" cols="30" rows="10">
                                    <?= $article->getContenu(); ?>
                                    </textarea>
                                  </div>
                                </div>
                                <div class="modal-footer d-flex justify-content-center">
                                  <button class="btn btn-indigo" name="updatearticle" value="updatearticle">Modifier l'article <i class="fas fa-paper-plane-o ml-1"></i></button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </form>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © DIC2INFO</span>
          </div>
        </div>
      </footer>
    </div>
    <!-- /.content-wrapper -->
  </div>
  <!-- /#wrapper -->
  <form action="article/saveA" method="POST">
    <div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ajouter un article</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="col-md-6 form-group">
              <label for="titre">Titre</label>
              <input type="text" class="form-control" placeholder="Donner un titre a votre article" name="titre" id="titre" required>
            </div>
            <div class="col-md-12 form-group">
              <label for="categorie">Categorie</label><br>
              <select name="categorie" class="form-control" id="categorie" required>
                <option value="1">Sport</option>
                <option value="2">Santé</option>
                <option value="3">Education</option>
                <option value="4">Politique</option>
              </select>
            </div>
            <div class="col-md-12 form-group">
              <label for="contenu">Contenu</label><br>
              <textarea type="text" class="form-control" placeholder="Ecrivez votre article" name="contenu" id="contenu" required></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="save" class="btn btn-primary">Enregistrer l'article</button>
          </div>
        </div>
      </div>
    </div>
  </form>
  <!-- Bootstrap core JavaScript-->
  <script src="../assets/vendor/jquery/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="../assets/vendor/datatables/jquery.dataTables.js"></script>
  <script src="../assets/vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../assets/js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="../assets/js/demo/datatables-demo.js"></script>

</body>

</html>