<?php
session_start();
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
    <img class="logoinscription4" src="img/logo.svg">
    <div class="encadre_imc">
        <p>Aujourd'hui vous êtes à :</p>
        <p class="number_imc">300 kcal</p>
    </div>
    <div class="change_poids">
        <p>Ajoute tes calories :</p>
        <div class="enter_poids">
            <input type="number">
            <img src="img/validation.png" alt="">
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