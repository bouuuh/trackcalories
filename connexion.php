<?php
$dbb = 'mysql:host=localhost:3306;dbname=track-calories';
$user = 'root';
$password = 'root';



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