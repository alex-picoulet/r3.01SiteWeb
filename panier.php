<?php

require("config/commandes.php");

$paniers = afficherPanier();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <title>Panier</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Vinylog</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

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
      <th scope="col">Supprimer (panier)</th>
    </tr>
  </thead>
  <tbody>




  <?php foreach ($paniers as $panier): ?>
    <tr>
        <th scope="row"><?= $panier->IDcdpanier ?></th>
        <td>
            <img src="<?= $panier->imagePochette ?>" style="width: 20%">
        </td>
        <td><?= $panier->nomCD ?></td>
        <td><?= $panier->dateSortie ?></td>
        <td style="font-weight: bold; color: green;"><?= $panier->prix ?>€</td>
        <td>
            <form method="post">
                <input type="hidden" name="IDcdpanier" value="<?= $panier->IDcdpanier ?>">
                <button type="submit" name="supp" class="btn btn-warning">Supprimer</button>
            </form>
        </td>
    </tr>
    
<?php endforeach; ?>


<?php
if (isset($_POST['supp'])) {
    if (isset($_POST['IDcdpanier'])) {
        try {
            $IDcdpanierToDelete = $_POST['IDcdpanier']; 
            supprimerPanier($IDcdpanierToDelete);
        } catch (Exception $e) {
            echo $e->getMessage(); 
        }
    }
}
?>




  </tbody>
</table>

</div>

<?php
$totalPrix = 0;
foreach ($paniers as $panier) {
    $totalPrix += $panier->prix;
}
?>

<div class="container">
    <div class="row">
        <div class="col">
            <h4>Total du panier: <?= $totalPrix ?>€</h4>
        </div>
        <div class="col">
            <a href="paiement.php" class="btn btn-primary">Payer</a>
        </div>
    </div>
</div>

<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
</div>
</div></div>

</body>
</html>




