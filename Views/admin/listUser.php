<?php
require_once(dirname(__FILE__) . "/../../Controller/Controller.php");
$controller  = new Controller();
$user = $controller->listUser;

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
        <a class="nav-link" href="#" role="button">
          <span>Utilisateurs</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./larticle" role="button">
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
            Liste utilisateur</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Username</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <!--ici on met le code pour afficher la liste des users-->
                  <?php foreach ($user as $users) { ?>
                    <tr>
                      <td><?= $users->getNom(); ?></td>
                      <td><?= $users->getPrenom(); ?></td>
                      <td><?= $users->getUsername(); ?></td>
                      <td>
                        <form action="delete/<?= $users->getId() ?>" style="display:inline;" method="GET">
                          <button class="btn btn-danger" type="submit">Supprimer</button>
                        </form>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalRegisterForm">
                          Modifier</button>
                        <form action="update/" method="POST">
                          <div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header text-center">
                                  <h4 class="modal-title w-100 font-weight-bold">Sign up</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body mx-3">
                                  <div class="md-form mb-5">
                                    <i class="fas fa-user prefix grey-text"></i>
                                    <input type="text" id="orangeForm-name" name="nom" value="<?= $users->getNom() ?>" class="form-control validate">
                                    <input type="hidden" name="id" value="<?= $users->getId() ?>">
                                    <label data-error="wrong" data-success="right" for="orangeForm-name">Votre nom</label>
                                  </div>
                                  <div class="md-form mb-5">
                                    <i class="fas fa-user prefix grey-text"></i>
                                    <input type="text" name="prenom" value="<?= $users->getPrenom() ?>" id="orangeForm-prenom" class="form-control validate">
                                    <label data-error="wrong" data-success="right" for="orangeForm-prenom">Votre prenom</label>
                                  </div>
                                  <div class="md-form mb-5">
                                    <i class="fas fa-envelope prefix grey-text"></i>
                                    <input type="username" name="username" value="<?= $users->getUsername() ?>" id="orangeForm-username" class="form-control validate">
                                    <label data-error="wrong" data-success="right" for="orangeForm-username">Votre username</label>
                                  </div>

                                  <div class="md-form mb-4">
                                    <i class="fas fa-lock prefix grey-text"></i>
                                    <input type="password" name="mdp" value="" id="orangeForm-pass" class="form-control validate">
                                    <label data-error="wrong" data-success="right" for="orangeForm-pass">Votre mot de pass</label>
                                  </div>

                                </div>
                                <div class="modal-footer d-flex justify-content-center">
                                  <button class="btn btn-success" name="updateuser" value="updateuser" type="submit">Mettre a jour </button>
                                </div>
                              </div>
                            </div>
                          </div>

                      </td>
                      <!-- Formulaire modal -->
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