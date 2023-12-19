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

    <title>Touts les cds</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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
          <a class="nav-link" href="supprimer.php" >Supprimer</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="afficher.php" style="font-weight: bold">Cds</a>
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
      <table class="table">
  <thead>
    <tr>
      <th scope="col">IDcd</th>
      <th scope="col">imagePochette</th>
      <th scope="col">nomCD</th>
      <th scope="col">dateSortie</th>
      <th scope="col">prix</th>
    </tr>
  </thead>
  <tbody>


    <?php foreach($cds as $cd): ?>
    <tr>
      <th scope="row"><?= $cd->IDcd ?></th>
      <td>
        <img src="<?= $cd->imagePochette ?>" style="width: 20%">
      </td>
      <td><?= $cd->nomCD ?></td>
      <td><?= $cd->dateSortie ?></td>
      <td style="font-weight: bold; color: green;"><?= $cd->prix ?>€</td>
    </tr>

    <?php endforeach;?>



  </tbody>
</table>

</div>

<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
</div>
</div></div>

</body>
</html>


