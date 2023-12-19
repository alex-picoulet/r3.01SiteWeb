<?php

session_start();

if(!isset($_SESSION['test'])){
    header("Location: ../login.php");
}
if(empty($_SESSION['test'])){
    header("Location: ../login.php");
}


require("../config/commandes.php");

$cds = afficher();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <title>Admin</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="../">Vinylog</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="../admin/">Nouveau</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="supprimer.php" style="font-weight: bold">Supprimer</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="afficher.php">Cds</a>
        </li>
      </ul>

      <div style="display: flex; justify-content: flex-end;">
        <a href="deconnection.php" class="btn btn-danger">Se deconnecter</a>
    </div>
    </div>
  </div>
</nav>


<div class="album py-5 bg-body-tertiary">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

<form method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">ID du CD</label>
    <input type="name" class="form-control" name ="idDuCd" required>
  </div>

  <button type="submit" name ="valider" class="btn btn-warning">Supprimer le CD</button>
</form>

</div>

<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">


<?php foreach($cds as $cd): ?>
        <div class="col">
          <div class="card shadow-sm">
              <title></title><img src="<?= $cd->imagePochette ?>" alt="">
            <div class="card-body">
              <p class="card-text"><strong><?= $cd->IDcd ?></p> <p><?= $cd->nomCD ?></p> <p><?= $cd->alias ?></p><?= $cd->dateSortie ?></p></strong>
              <div class="d-flex justify-content-between align-items-center">
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>

</div>



</div>
</div>

</body>
</html>


<?php
if(isset($_POST['valider'])){
    if(isset($_POST['idDuCd'])){
        if(!empty($_POST['idDuCd']) AND is_numeric($_POST['idDuCd'])){
            $IDcd = htmlspecialchars(strip_tags($_POST['idDuCd']));

            try{
                supprimer($IDcd);
            } catch (Exception $e){
                $e->getMessage();
            }

        }
    }
}


?>