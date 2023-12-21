<?php
session_start();

include "config/commandes.php";

if(isset($_SESSION['test'])){
    if(!empty($_SESSION['test'])){
        header("Location: admin/");
    }
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payer - Vinylog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<br>
<br>
<br>
<br>


<div class="container-fluid d-flex justify-content-center align-items-center">
    <div class="row">
        <div class="col-md-10"></div>
        <div>
            <form method="post">
                <div class="mb-3">
                    <label for="numero" class="form-label" require>Numero de carte</label>
                    <input type="numero" class="form-control" name ="numero">
                </div>
                <div class="mb-3">
                    <label for="date" class="form-label" require>Date d'expiration</label>
                    <input type="date" class="form-control" name ="date">
                </div>
                <div>
                    <label for="code" class="form-label" require>CVV (Code de vérification)</label>
                    <input type="number" class="form-control" name ="code">
                </div>
                <input type="submit" class="btn btn-danger" name="payer" value ="Payer">
            </form>
        </div>
    </div>
</div>
</body>
</html>

<?php

if(isset($_POST['payer'])){
    if(!empty($_POST['numero'] AND !empty($_POST['date']) AND !empty($_POST['code']))){

        $numeroCarte = htmlspecialchars($_POST['numero']);
        $date = htmlspecialchars($_POST['date']);
        $code = htmlspecialchars($_POST['code']);

        $paimentEffectuer = $bdd->prepare("DROP");
        header('Location: index.php');

        exit();
    }
}


?>