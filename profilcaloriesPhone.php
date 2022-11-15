<?php

session_start();
include('connexion.php');
$user_calories = valid_donnees($_POST['calories']);
$DATEtoday = date('Y-m-d');

    $etat = $base->prepare("SELECT * FROM `calories` WHERE `date` = :date");
    $etat->bindParam(':date',$DATEtoday);
    $etat->execute();
    $resultats = $etat->fetchAll();
    $date = $resultats[0]['date'];
    $user_calories_total = $resultats[0]['calories'];
    
if (!empty($date) && !empty($user_calories)) {
    $user_calories_total = $user_calories + $resultats[0]['calories'];
    $etat = $base->prepare("UPDATE `calories` SET `calories`=:calories WHERE `date`= :date");
    $etat->bindParam(':date',$DATEtoday);
    $etat->bindParam(':calories', $user_calories_total);
    $etat->execute();
    } 
elseif(empty($date)&& !empty($user_calories)){
    $etat = $base->prepare("INSERT INTO `calories`(`date`, `calories`, `id-user`) VALUES (:date,:calories,:id)");
    $etat->bindParam(':date',$DATEtoday);
    $etat->bindParam(':calories', $user_calories_total);
    $etat->bindParam(':id', $_SESSION["user"]["id"]);
    $etat->execute();
}

?>
<!DOCTYPE html>
<html lang="FR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\appPhone.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;500;700&family=Work+Sans:wght@200;300;500;700&display=swap" rel="stylesheet">
    <title>TrackCalories - Profil</title>
</head>
<body class="profil">
    <img class="logoinscription4" src="img/Logo.svg">
    <div class="encadre_imc">
        <p>Aujourd'hui vous êtes à :</p>
        <?php 
              
        echo "<p class='number_imc'>".$user_calories_total."</p>";
        ?>
    </div>
    <div class="change_poids">
        <p>Ajoute tes calories :</p>
        <div class="enter_poids">
            <form action="" method="post">
                <input name="calories" type="number">
                <button type="submit"><img src="img/validation.png" alt=""></button>
            <form>
        </div>
    </div>
    <div class="nav_profil">
        <div class="logo_profil">
            <a href="profilPhone1.php"><img src="img/logo_user_green.png" alt=""></a>
            <a href="profilcaloriesPhone.php"><img src="img/logo_calculate_green.png" alt=""></a>
            <a href="profilGraph.php"><img src="img/logo_graph_green.png" alt=""></a>
        </div>
    </div>
</body>
</html>