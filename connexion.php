<?php
/*Montre les erreurs sur MAMP*/
error_reporting(E_ALL);
ini_set("display_errors", 1);

/* Connexion à la BDD */
$dbb = 'mysql:host=localhost:3306;dbname=track-calories';
$user = 'greta2';
$password = 'Greta1234!';
try {
    $base = new PDO($dbb, $user, $password);
} catch (PDOException $exp) {
    echo 'erreur connexion' .$excep-> getMessage();
}

/*fonction qui permet de ne pas se faire hacker dans les formulaires*/
function valid_donnees($donnees){
    $donnees = trim($donnees);
    $donnees = stripslashes($donnees);
    $donnees = htmlspecialchars($donnees);
    return $donnees;
} 
?>