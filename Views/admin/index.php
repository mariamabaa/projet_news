<?php
    require_once(dirname(__FILE__)."/../../Model/service/SessionMgn.class.php");
    require_once(dirname(__FILE__)."/../../Controller/Controller.php");

    $session = new SessionMgn();
    $session->start();
    $controller = new Controller();
    if(!isset($_SESSION['id'])){
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

  <title>SB Admin - Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="assets/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="assets/css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="index.html">Admin identfiant(<?php echo $_SESSION['id'];?>)</a>
    <!-- Navbar Search -->

    <!-- Navbar -->

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span>Utilisateurs</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" href="./list">Liste utilisateur</a>
            <a class="dropdown-item" href="./addUser">Ajouter utilisateur</a>
            <a class="dropdown-item" href="./updateUser">Modifier utilisateur</a>
            <a class="dropdown-item" href="./addUser">supprimer utilisateur</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./deconnexion">
          <span>Deconnexion</span></a>
      </li>
    </ul>

    <div id="content-wrapper">

      <div class="container-fluid">

      </div>
     
      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © DIC2 INFO</span>
          </div>
        </div>
      </footer>

    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>


  <!-- Custom scripts for all pages-->
  <script src="assets/js/sb-admin.min.js"></script>

</body>

</html>
