<?php
session_start();
include('connexion.php');
$user_id = $_SESSION['user']['id'];


/*On vérifie si la session existe, si c'est le cas, on continue sur la page, sinon on est envoyé sur la page notconnected.php*/
if ($_SESSION['user'] === NULL) {
    header('Location: notconnected.php');
} else {

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
/*On récupère le poids du formulaire*/
$user_new_weight = valid_donnees($_POST['newWeight']);
    /*On ne fait le prosessus qui suit que si quelqu'un envoie les infos du formulaire et que l'input où on peut ajouter un nouveau poids n'est pas vide*/
    if (!empty($user_new_weight) && $_SERVER['REQUEST_METHOD'] === 'POST') {


        /*On fait une requête SQL afin de changer le poids de l'utilisateur par ce qu'il vient d'entrer dans la BDD*/
        $etat = $base->prepare("UPDATE `utilisateur` SET `poids`=:poids WHERE `id`= :id");
        $etat->bindParam(':poids', $user_new_weight);
        $etat->bindParam(':id', $user_id);
        $etat->execute();
        $_SESSION['user'][0]['poids'] = $user_new_weight;
    }
}}
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
    <a href="pageconnexion.php"><img style="height: 2vh;" src="img\out.svg" alt=""></a>
    <img class="logoinscription3" src="img/Logo.svg">
    <?php
    echo "<p>Bonjour <span>" . $_SESSION['user']['surname'] . "</span> :)</p>";
    ?>

    <div class="encadre_imc">
        <p>Votre IMC est de :</p>
        <?php
        $imc = number_format(($_SESSION['user'][0]['poids']) / (($_SESSION['user'][0]['taille'] * 0.01) * ($_SESSION['user'][0]['taille'] * 0.01)), 1);

        echo "<p class='number_imc'>" . $imc . "</p>";
        ?>

    </div>
    <p class="conseil" >Conseil : reprend une part de gâteau, tu as de la marge :)</p>
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
<script>
        var divImc = document.querySelector('.number_imc');
        var conseil = document.querySelector('.conseil');

        var imc = <?php echo json_encode($imc) ?>;
        if (imc<18.5) {
            divImc.style.color = 'grey';
            conseil.innerText = "Conseil : Reprends une part de gâteau, tu as de la marge :)";
        }
        else if (imc<25) {
            divImc.style.color = '#869B08';
            conseil.innerText = "Conseil : Garde le cap !";
        }
        else if (imc<30) {
            divImc.style.color = '#e28213';
            conseil.innerText = "Conseil : Essaye de faire attention frérot, privilégie une alimentation moins riche";
        }
        else if (imc>30.1) {
            divImc.style.color = '#A5305C';
            conseil.innerText = "Conseil : Prends rendez-vous avec un nutritioniste, ça peut être dangereux pour ta santé";
        }

    </script>
</html>