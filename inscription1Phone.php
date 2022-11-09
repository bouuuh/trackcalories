<?php
session_start();
include('connexion.php');

$user_surname = $_POST['surname']; 
$user_name = $_POST['name']; 
$user_mail =$_POST['mail'];
$user_password = $_POST['password']; 
if(!empty($user_surname) && !empty($user_name) && !empty($user_mail) && !empty($user_password)){
$etat = $base->prepare("INSERT INTO `utilisateur`(`prenom`, `nom`, `adresse mail`, `mot de passe`) VALUES (:surname,:nom,:mail,:pass)");

$etat->bindValue(':surname', $user_surname,PDO::PARAM_STR);
$etat->bindValue(':nom', $user_name,PDO::PARAM_STR);
$etat->bindValue(':mail', $user_mail,PDO::PARAM_STR);
$etat->bindValue(':pass', $user_password,PDO::PARAM_STR);
$etat->execute();


$id = $base->lastInsertId();
$_SESSION["user"] = [
    "id" => $id,
    "surname" => $user_surname,
    "name" => $user_name,
    "mail" => $user_mail,
    "password" => $user_password
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
            <form action="" method="post">
                <?php
                if(empty($user_surname)){
                    echo '<p class="empty">Il manque un prénom</p>';
                }
                ?>
                <input type="text" name="surname" placeholder="Entrez votre prénom" value=<?= $user_surname ?? '' ?>>
                <?php
                if(empty($user_name)){
                    echo '<p class="empty">Il manque un nom</p>';
                }
                ?>
                <input type="text" name="name" placeholder="Entrez votre nom" value=<?= $user_name ?? '' ?>>
                <?php
                if(empty($user_mail)){
                    echo '<p class="empty">Il manque un mail</p>';
                }
                ?>
                <input type="mail" name="mail" placeholder="Entrez votre adresse mail" value=<?= $user_mail ?? '' ?>>
                <?php
                if(empty($user_password)){
                    echo '<p class="empty">Il manque un mot de passe</p>';
                }
                ?>
                <input type="password" name="password" placeholder="Entrez votre mot de passe">
                <?php
                if(empty($user_password)){
                    echo '<p class="empty">Il manque une confirmation de mot de passe</p>';
                }
                ?>
                <input type="password" name="passwordconfirm" placeholder="Confirmez votre mot de passe" >
                <button class="next" type="submit">Suivant</button>
            </form>
        </div>
        <div class="button-bottom">
            <a href="pageconnexion.php"><button class="connexion">Connexion</button></a>
        </div>
        </div>
    </div>

</body>
</html>