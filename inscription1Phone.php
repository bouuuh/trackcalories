<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
session_start();
include('connexion.php');

   $user_surname = valid_donnees($_POST['surname']); 
$user_name = valid_donnees($_POST['name']); 
$user_mail =valid_donnees($_POST['mail']);
$user_mail = filter_var($user_mail, FILTER_VALIDATE_EMAIL);
$user_password = valid_donnees($_POST['password']); 
$user_password_hash = password_hash($user_password, PASSWORD_DEFAULT);
$user_passwordConfirm = valid_donnees($_POST['passwordconfirm']); 


if(!empty($user_surname) && !empty($user_name) && !empty($user_mail) && !empty($user_password)){
 
$etat = $base->prepare("INSERT INTO `utilisateur`(`prenom`, `nom`, `adresse mail`, `mot de passe`) VALUES (:surname,:nom,:mail,:pass)");

$etat->bindValue(':surname', $user_surname,PDO::PARAM_STR);
$etat->bindValue(':nom', $user_name,PDO::PARAM_STR);
$etat->bindValue(':mail', $user_mail,PDO::PARAM_STR);
$etat->bindValue(':pass', $user_password_hash,PDO::PARAM_STR);
$etat->execute();


$id = $base->lastInsertId();
$_SESSION["user"] = [
    "id" => $id,
    "surname" => $user_surname,
    "name" => $user_name,
    "mail" => $user_mail,
];
header('Location: inscription2Phone.php');
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\appPhone.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;500;700&family=Work+Sans:wght@200;300;500;700&display=swap" rel="stylesheet">
    <title>Track Calories</title>
</head>
<body>
    <div class="container2">
        <div class="content2">
            <img class="logoinscription" src="img\Logorose.svg" alt="Track Calories logo">
            <div class="signin">
            <form action="inscription1Phone.php" method="post">
                <?php
                if($_SERVER['REQUEST_METHOD'] === 'POST' && empty($user_surname)){
                    echo '<p class="empty">Il manque un prénom</p>';
                }
                ?>
                <input type="text" name="surname" placeholder="Entrez votre prénom" value=<?= $user_surname ?? '' ?>>
                <?php
                if($_SERVER['REQUEST_METHOD'] === 'POST' && empty($user_name)){
                    echo '<p class="empty">Il manque un nom</p>';
                }
                ?>
                <input type="text" name="name" placeholder="Entrez votre nom" value=<?= $user_name ?? '' ?>>
                <?php
                if($_SERVER['REQUEST_METHOD'] === 'POST' && empty($user_mail)){
                    echo '<p class="empty">Il manque un mail</p>';
                }
                ?>
                <input type="mail" name="mail" placeholder="Entrez votre adresse mail" value=<?= $user_mail ?? '' ?>>
                <?php
                if($_SERVER['REQUEST_METHOD'] === 'POST' && empty($user_password)){
                    echo '<p class="empty">Il manque un mot de passe</p>';
                }
                ?>
                <input type="password" name="password" placeholder="Entrez votre mot de passe">
                <?php
                if($_SERVER['REQUEST_METHOD'] === 'POST' && empty($user_password)){
                    echo '<p class="empty">Il manque une confirmation de mot de passe</p>';
                };
                
                ?>
                <input type="password" name="passwordconfirm" placeholder="Confirmez votre mot de passe" >
                <button class="next" type="submit" name="next">Suivant</button>
            </form>
        </div>
        <div class="button-bottom">
            <a href="pageconnexion.php"><button class="connexion">Connexion</button></a>
        </div>
        </div>
    </div>

</body>
</html>