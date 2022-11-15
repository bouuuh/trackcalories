<?php

include('connexion.php');

$user_mail = valid_donnees($_POST['mail']);
$user_mail = filter_var($user_mail, FILTER_VALIDATE_EMAIL);
$user_password = valid_donnees($_POST['password']); 


if (!empty($user_mail) && !empty($user_password)) {

    $etat = $base->prepare("SELECT * FROM `utilisateur` WHERE `adresse mail` = :adresse");
    $etat->bindParam(':adresse',$user_mail);
    $etat->execute();
    $resultats = $etat->fetchAll();
    $mail_bdd = $resultats[0]['adresse mail'];
    $password_bdd = $resultats[0]['mot de passe'];
    var_dump ($resultats);
    

    if (!empty($resultats)) {
        if ((password_verify($user_password, $password_bdd))) {
            session_start();
            $_SESSION["user"] = [
                "id" => $resultats[0]['id'],
                "surname" => $resultats[0]['prenom'],
                "name" => $resultats[0]['nom'],
                "mail" => $resultats[0]['adresse mail'],
            ];
            $_SESSION["user"][] = [
                "sexe" => $resultats[0]['sexe'],
                "taille" => $resultats[0]['taille'],
                "poids" => $resultats[0]['poids']
            ];
            header('Location: profilPhone1.php');
          
        }
    }


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
    <div class="container5">
        <div class="content2">
            <img class="logoconnexion" src="img\Logo.svg" alt="Track Calories logo">
            <div class="signin">
            <form action="" method="post">
                <input type="mail" name="mail" placeholder="Entrez votre adresse mail">
                <input type="password" name="password" placeholder="Entrez votre mot de passe">
                <p class="mdpforgotten">mot de passe oublié ?</p>
                <button class="connect" type="submit">Connexion</button>
            </form>
        </div>
        <div class="noaccount">
            <a href="inscription1Phone.php">Pas de compte ? <br>Inscrivez-vous</a>
        </div>
        </div>
    </div>
</body>
</html>