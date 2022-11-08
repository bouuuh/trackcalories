<?php
$dbb = 'mysql:host=localhost;dbname=track-calories';
$user = 'root';
$password = 'root';

$user_surname = $_POST['surname']; 
$user_name = $_POST['name']; 
$user_mail =$_POST['mail'];
$user_password = $_POST['password']; 



try {
    $base = new PDO($dbb, $user, $password);
} catch (PDOException $exp) {
    echo 'erreur connexion' .$excep-> getMessage();
}
$etat = $base->prepare("INSERT INTO `utilisateur`(`prenom`, `nom`, `adresse mail`, `mot de passe`, `sexe`, `date de naissance`, `taille`, `poids`) VALUES ('$user_surname','$user_name','$user_mail','$user_password','1','05/02/2002','1','1')");
$etat->execute();

echo 'Bonjour ', $user_surname;


?>