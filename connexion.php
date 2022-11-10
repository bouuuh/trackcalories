<?php
$dbb = 'mysql:host=localhost:3306;dbname=track-calories';
$user = 'root';
$password = 'root';
/* mdp change si on change d'ordi en local */


try {
    $base = new PDO($dbb, $user, $password);
} catch (PDOException $exp) {
    echo 'erreur connexion' .$excep-> getMessage();
}



?>