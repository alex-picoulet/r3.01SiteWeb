<?php
session_start();

if(!isset($_SESSION['test'])){
    header("Location: ../login.php");
}
if(empty($_SESSION['test'])){
    header("Location: ../login.php");
}

require("../config/commandes.php");

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
          <a class="nav-link active" aria-current="page" href="../admin/" style="font-weight: bold">Nouveau</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="supprimer.php">Supprimer</a>
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
    <input type="name" class="form-control" name ="idCd" required>
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Nom du CD</label>
    <input type="text" class="form-control" name ="nom" required>
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Date de sortie du CD</label>
    <input type="text" class="form-control"  name ="date" required>
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Image de la pochette</label>
    <textarea class="form-control" name ="image" required></textarea>
  </div>

  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Prix du CD</label>
    <input type="number" class="form-control" id="exampleInputPassword1" name ="prix" required>
  </div>
</br>
</br>

<div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Id de l'artiste</label>
    <input type="text" class="form-control" name ="idArtiste" required>
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Nom de l'artiste</label>
    <input type="text" class="form-control"  name ="NomArtiste" required>
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Alias de l'artiste</label>
    <textarea class="form-control" name ="alias" required></textarea>
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Date de naissance</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name ="dateNaiss" required>
  </div>
</br>


  <button type="submit" name ="valider" class="btn btn-success">Soumettre le nouveau CD</button>
</form>

</div>
</div>
</div>

</body>
</html>


<?php
if(isset($_POST['valider'])){
    if(isset($_POST['idCd']) AND isset($_POST['nom']) AND isset($_POST['date']) AND isset($_POST['image']) AND isset($_POST['prix'])){
        if(!empty($_POST['idCd']) AND !empty($_POST['nom']) AND !empty($_POST['date']) AND !empty($_POST['image']) AND !empty($_POST['prix'])){
            $idCd = htmlspecialchars(strip_tags($_POST['idCd']));
            $nom = htmlspecialchars(strip_tags($_POST['nom']));
            $date = htmlspecialchars(strip_tags($_POST['date']));
            $image = htmlspecialchars(strip_tags($_POST['image']));
            $prix = htmlspecialchars(strip_tags($_POST['prix']));

            try{
                ajouter($idCd, $nom, $date, $image, $prix);
            } catch (Exception $e){
                $e->getMessage();
            }

        }
    }
}

if(isset($_POST['valider'])){
    if(isset($_POST['idArtiste']) AND isset($_POST['NomArtiste']) AND isset($_POST['alias']) AND isset($_POST['dateNaiss'])){
        if(!empty($_POST['idArtiste']) AND !empty($_POST['NomArtiste']) AND !empty($_POST['alias']) AND !empty($_POST['dateNaiss'])){
            $idArtiste = htmlspecialchars(strip_tags($_POST['idArtiste']));
            $NomArtiste = htmlspecialchars(strip_tags($_POST['NomArtiste']));
            $alias = htmlspecialchars(strip_tags($_POST['alias']));
            $dateNaiss = htmlspecialchars(strip_tags($_POST['dateNaiss']));

            try{
                ajouterArtiste($idArtiste, $NomArtiste, $alias, $dateNaiss);
            } catch (Exception $e){
                $e->getMessage();
            }

        }
    }
}


?>