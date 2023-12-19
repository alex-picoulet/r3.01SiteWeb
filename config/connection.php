<?php

$host = 'localhost';
$dbname = 'projetweb';
$user = 'root';
$password = '';

try {
    $access = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $access->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();

}


?>