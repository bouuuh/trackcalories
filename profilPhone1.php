<?php
session_start();
include('connexion.php');
$user_new_weight = valid_donnees($_POST['newWeight']);
$user_id = $_SESSION['user']['id'];  
if(!empty($user_new_weight) && $_SERVER['REQUEST_METHOD'] === 'POST'){
    $etat = $base->prepare("UPDATE `utilisateur` SET `poids`=:poids WHERE `id`= :id");
    $etat->bindParam(':poids', $user_new_weight);
    $etat->bindParam(':id', $user_id);
    $etat->execute();
    $_SESSION['user'][0]['poids'] = $user_new_weight; 
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
    <img class="logoinscription3" src="img/Logo.svg">
    <?php
            echo "<p>Bonjour <span>".$_SESSION['user']['surname']."</span> :)</p>";
            ?>
  
    <div class="encadre_imc">
        <p>Votre IMC est de :</p>
        <?php 
        $imc = number_format(($_SESSION['user'][0]['poids']) / (($_SESSION['user'][0]['taille']* 0.01)*($_SESSION['user'][0]['taille']* 0.01)),1);
        
        echo "<p class='number_imc'>".$imc."</p>";
        ?>
        
    </div>
    <p>Conseil : reprend une part de gâteau, tu as de la marge :)</p>
    <div class="change_poids">
        <p>Ton poids a changé ?</p>
        <div class="enter_poids">
            <form action="" method="post">
            <input type="number" name="newWeight">
            <button type="submit"><img src="img/validation.png" alt=""></button>
        </form>
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