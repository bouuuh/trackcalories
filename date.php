<?php
session_start();
include('connexion.php');
$DATEtoday = date('Y-m-d');

 if (isset($_POST['date'])) {
    $datechosen = $_POST['start'];
    $etat = $base->prepare("UPDATE `utilisateur` SET `datechosen`=:datechosen WHERE `id`=:id");
    $etat->bindParam(':datechosen',$datechosen);
    $etat->bindParam(':id', $_SESSION["user"]["id"]);
    $etat->execute();
    $_SESSION['datechosen'] = $datechosen;
    header('Location: profilcaloriesPhone.php');
}


?>