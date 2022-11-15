<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
$dbb = 'mysql:host=localhost:3306;dbname=track-calories';
$user = 'root';
$password = 'root';

/* Connexion 2 */

try {
    $base = new PDO($dbb, $user, $password);
} catch (PDOException $exp) {
    echo 'erreur connexion' .$excep-> getMessage();
}

function valid_donnees($donnees){
    $donnees = trim($donnees);
    $donnees = stripslashes($donnees);
    $donnees = htmlspecialchars($donnees);
    return $donnees;
}
?>