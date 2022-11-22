<?php
session_start();
include('connexion.php');

/*On vérifie si la session existe, si c'est le cas, on continue sur la page, sinon on est envoyé sur la page notconnected.php*/
if ($_SESSION['user'] === NULL) {
    header('Location: notconnected.php');
} else {
/*On récupère la date du jour grâce à une fonction*/
$DATEtoday = date('Y-m-d');
$DATEminus7 = date('Y-m-d', strtotime($DATEtoday . ' - 7 days'));
$DATEminus6 = date('Y-m-d', strtotime($DATEtoday . ' - 6 days'));
$DATEminus5 = date('Y-m-d', strtotime($DATEtoday . ' - 5 days'));
$DATEminus4 = date('Y-m-d', strtotime($DATEtoday . ' - 4 days'));
$DATEminus3 = date('Y-m-d', strtotime($DATEtoday . ' - 3 days'));
$DATEminus2 = date('Y-m-d', strtotime($DATEtoday . ' - 2 days'));
$DATEminus1 = date('Y-m-d', strtotime($DATEtoday . ' - 1 days'));


if (($_SESSION['datechosen'])=== NULL) {
    $_SESSION['datechosen'] = $DATEtoday;
}


/*On fait une requête SQL pour chercher si dans la BDD, il existe déjà une entrée pour les calories du jour de l'utilisateur*/
$etat = $base->prepare("SELECT * FROM `calories` WHERE (`date` =:date AND `id-user`=:id)");
$etat->bindParam(':date', $_SESSION['datechosen']);
$etat->bindParam(':id', $_SESSION["user"]["id"]);
$etat->execute();
$resultats = $etat->fetchAll();

/*Si il y a un des infos dans $resultats*/
if (!empty($resultats)) {
    $date = $resultats[0]['date'];
    $user_calories_total = $resultats[0]['calories'];
}

if (isset($_POST['poids']) && !empty($_POST['calories'])) {

    /*Si la date existe déjà, alors on ajoute les nouvelles calories à celle qui étaient déjà dans la BDD et on enregistre les infos dans la BDD*/
    $user_calories = valid_donnees($_POST['calories']);
    if (!empty($date) && !empty($user_calories)) {
        $user_calories_total = $user_calories + $resultats[0]['calories'];
        $etat = $base->prepare("UPDATE `calories` SET `calories`=:calories WHERE (`date` =:date AND `id-user`=:id)");
        $etat->bindParam(':date', $date);
        $etat->bindParam(':calories', $user_calories_total);
        $etat->bindParam(':id', $_SESSION["user"]["id"]);
        $etat->execute();
        $etat = $base->prepare("UPDATE `utilisateur` SET `calochosen`=:calories WHERE `id`=:id");
        $etat->bindParam(':calories', $user_calories_total);
        $etat->bindParam(':id', $_SESSION["user"]["id"]);
        $etat->execute();
    }

    /*Si la date n'existe pas, on met les calories entrées dans les calories de la journée sur la BDD*/ 
    elseif (empty($resultats) && !empty($user_calories)) {
        $etat = $base->prepare("INSERT INTO `calories`(`date`, `calories`, `id-user`) VALUES (:date,:calories,:id)");
        $etat->bindParam(':date', $_SESSION["datechosen"]);
        $etat->bindParam(':calories', $user_calories);
        $etat->bindParam(':id', $_SESSION["user"]["id"]);
        $etat->execute();
        $user_calories_total = $user_calories;
        $etat = $base->prepare("UPDATE `utilisateur` SET `calochosen`=:calories WHERE `id`=:id");
        $etat->bindParam(':calories', $user_calories_total);
        $etat->bindParam(':id', $_SESSION["user"]["id"]);
        $etat->execute();
    }
}

}


?>


<script>
    /*On empêche le refresh de la page d'ajouter des informations dans le formulaire et donc d'augmenter les calories*/
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>

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
<a href="pageconnexion.php"><img style="height: 2vh;" src="img\out.svg" alt=""></a>
    <img class="logoinscription4" src="img/Logo.svg">
    <div class="enter_date">
        <form action="date.php" method="post">
            <input type="date" id="start" name="start" <?php echo 'value="' .$_SESSION['datechosen']. '"' ?> <?php echo 'min="' . $DATEminus7 . '"' ?> <?php echo 'max="' . $DATEtoday . '"' ?>">
            <button name="date" type="submit"><img src="img/validation.png" alt=""></button>
        </form>
    </div>
    <div class="encadre_imc">
        <p>Ce jour, vous êtes à :</p>
        <?php
        if (!empty($user_calories_total)) {
            echo "<p class='number_imc'>" . $user_calories_total . " kcal</p>";
        } else {
            echo "<p class='number_imc'>0</p>";
        }

        ?>
    </div>
    <div class="change_poids">
        <p>Ajoute tes calories :</p>
        <div class="enter_poids">
            <form action="" method="post">
                <input name="calories" type="number">
                <button name="poids" type="submit"><img src="img/validation.png" alt=""></button>
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
    <script>
        var sexe = <?php echo json_encode($_SESSION['user'][0]['sexe']); ?>;
        var number_calorie = <?php echo json_encode($user_calories_total); ?>;
        var calories = document.querySelector('.number_imc');
        console.log(number_calorie);
        if (sexe === '1' && number_calorie>2500) {
            calories.style.color = '#A5305C';
        }
        else if (sexe === '2' && number_calorie>2000) {
            calories.style.color = '#A5305C';
        }
    </script>
</html>