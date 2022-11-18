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

$etat = $base->prepare("SELECT * FROM `calories` WHERE (`date` =:date AND `id-user`=:id)");
$etat->bindParam(':date', $DATEminus7);
$etat->bindParam(':id', $_SESSION["user"]["id"]);
$etat->execute();
$resultats7 = $etat->fetchAll();
if(empty($resultats7)){
    $calories7 = 0;
} else {
    $calories7 = $resultats7[0]['calories'];
}

$etat = $base->prepare("SELECT * FROM `calories` WHERE (`date` =:date AND `id-user`=:id)");
$etat->bindParam(':date', $DATEminus6);
$etat->bindParam(':id', $_SESSION["user"]["id"]);
$etat->execute();
$resultats6 = $etat->fetchAll();
if(empty($resultats6)){
    $calories6 = 0;
} else {
    $calories6 = $resultats6[0]['calories'];
}

$etat = $base->prepare("SELECT * FROM `calories` WHERE (`date` =:date AND `id-user`=:id)");
$etat->bindParam(':date', $DATEminus5);
$etat->bindParam(':id', $_SESSION["user"]["id"]);
$etat->execute();
$resultats5 = $etat->fetchAll();
if(empty($resultats5)){
    $calories5 = 0;
} else {
    $calories5 = $resultats5[0]['calories'];
}

$etat = $base->prepare("SELECT * FROM `calories` WHERE (`date` =:date AND `id-user`=:id)");
$etat->bindParam(':date', $DATEminus4);
$etat->bindParam(':id', $_SESSION["user"]["id"]);
$etat->execute();
$resultats4 = $etat->fetchAll();
if(empty($resultats4)){
    $calories4 = 0;
} else {
    $calories4 = $resultats4[0]['calories'];
}

$etat = $base->prepare("SELECT * FROM `calories` WHERE (`date` =:date AND `id-user`=:id)");
$etat->bindParam(':date', $DATEminus3);
$etat->bindParam(':id', $_SESSION["user"]["id"]);
$etat->execute();
$resultats3 = $etat->fetchAll();
if(empty($resultats3)){
    $calories3 = 0;
} else {
    $calories3 = $resultats3[0]['calories'];
}

$etat = $base->prepare("SELECT * FROM `calories` WHERE (`date` =:date AND `id-user`=:id)");
$etat->bindParam(':date', $DATEminus2);
$etat->bindParam(':id', $_SESSION["user"]["id"]);
$etat->execute();
$resultats2 = $etat->fetchAll();
if(empty($resultats2)){
    $calories2 = 0;
} else {
    $calories2 = $resultats2[0]['calories'];
}

$etat = $base->prepare("SELECT * FROM `calories` WHERE (`date` =:date AND `id-user`=:id)");
$etat->bindParam(':date', $DATEminus1);
$etat->bindParam(':id', $_SESSION["user"]["id"]);
$etat->execute();
$resultats1 = $etat->fetchAll();
if(empty($resultats1)){
    $calories1 = 0;
} else {
    $calories1 = $resultats1[0]['calories'];
}

$etat = $base->prepare("SELECT * FROM `calories` WHERE (`date` =:date AND `id-user`=:id)");
$etat->bindParam(':date', $DATEtoday);
$etat->bindParam(':id', $_SESSION["user"]["id"]);
$etat->execute();
$resultats = $etat->fetchAll();
if(empty($resultats)){
    $calories = 0;
} else {
    $calories = $resultats[0]['calories'];
}
}

?>
<!DOCTYPE html>
<html lang="FR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\appPhone.css">
    <!-- <link rel="stylesheet" href="js/scriptGraph.js"> -->
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;500;700&family=Work+Sans:wght@200;300;500;700&display=swap" rel="stylesheet">
    
    <title>TrackCalories - Profil</title>
</head>
<body class="profil">  
<a href="pageconnexion.php"><img style="height: 2vh;" src="img\out.svg" alt=""></a>
    <img class="logoinscription3" src="img/Logo.svg">
        <div class="graphique">
            <canvas id="lineCanvas" aria-label="chart" role="img"></canvas>
        </div>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
            <script>

var calories7 = <?php echo json_encode($calories7); ?>;
var calories6 = <?php echo json_encode($calories6); ?>;
var calories5 = <?php echo json_encode($calories5); ?>;
var calories4 = <?php echo json_encode($calories4); ?>;
var calories3 = <?php echo json_encode($calories3); ?>;
var calories2 = <?php echo json_encode($calories2); ?>;
var calories1 = <?php echo json_encode($calories1); ?>;
var calories = <?php echo json_encode($calories); ?>;
var dateMinus7 = <?php echo json_encode($DATEminus7); ?>;
var dateMinus6 = <?php echo json_encode($DATEminus6); ?>;
var dateMinus5 = <?php echo json_encode($DATEminus5); ?>;
var dateMinus4 = <?php echo json_encode($DATEminus4); ?>;
var dateMinus3 = <?php echo json_encode($DATEminus3); ?>;
var dateMinus2 = <?php echo json_encode($DATEminus2); ?>;
var dateMinus1 = <?php echo json_encode($DATEminus1); ?>;
var dateToday = <?php echo json_encode($DATEtoday); ?>;


const lineCanvas = document.getElementById("lineCanvas");

const lineChart = new Chart(lineCanvas, {
    // on défini le type de graphique (line = ligne; bar = barre verticale...)
    type: "bar",
    // on entre les données sur l'axe X
    data: {
        labels: [dateMinus7, dateMinus6, dateMinus5, dateMinus4, dateMinus3, dateMinus2, dateMinus1, dateToday],
        datasets : [{
            label: "Calories absorbées",
            // On indique les données correspondantes sur l'axe Y
            data: [calories7, calories6, calories5, calories4, calories3, calories2, calories1, calories],
            // couleur des points
            backgroundColor: "green",
            // couleur du trait
            // borderColor: "orange",
            // couleur de remplissage entre l'axe X et la ligne de données
            fill: false,
            // tension de la ligne de données
            tension: 0.38,
            hoverBorderWidth: 1,
        }],
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        elements: {
            // changer la couleur de la ligne
            line: {
                borderColor: "orange",
            }
        },
        plugins: {
            title: {
                display: true,
                text: "Ta consommation de calories des 7 derniers jours",
                color: "white",
            },
        },
        scales: {
            y: {
                // indique le nombre min/max sur l'axe Y
                suggestedMin: 0,
                suggestedMax: 3500,
                ticks: {
                    // changer la couleur du texte
                    color: "#FFF",
                    // changer la taille de la police
                    font: {
                        size: 12,
                    }
                }
            },
            x: {
                ticks: {
                    color: "#FFF",
                    font: {
                        size: 12,
                    }
                }
            }
        }
    }
})

            </script>
        
    <div class="nav_profil">
        <div class="logo_profil">
        <a href="profilPhone1.php"><img src="img/logo_user_green.png" alt=""></a>
        <a href="profilcaloriesPhone.php"><img src="img/logo_calculate_green.png" alt=""></a>
        <a href="profilGraph.php"><img src="img/logo_graph_green.png" alt=""></a>
        </div>
    </div>
    
</body>
</html>