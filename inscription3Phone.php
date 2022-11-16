<?php
    session_start();
    include('connexion.php');


    /*On ne fait le prosessus qui suit que si quelqu'un envoie les infos du formulaire*/
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        /*On récupère les infos du formulaire*/
        $user_sexe = valid_donnees($_POST['sexe']); 
        $user_dateofbirth = valid_donnees($_POST['dateofbirth']); 
        $user_height =valid_donnees($_POST['height']);
        $user_weight = valid_donnees($_POST['weight']); 
        $user_id = $_SESSION['user']['id'];  

            /*On vérifie que les champs du formulaire ne soient pas vides*/
            if (!empty($user_sexe) && !empty($user_dateofbirth) && !empty($user_height) && !empty($user_weight)) {    
                
                /*Requête SQL pour mettre les infos du formulaire dans la BDD*/
                $etat = $base->prepare("UPDATE utilisateur SET `sexe`= :sexe,`date de naissance`= :naissance,`taille`= :taille,`poids`= :poids WHERE `id`= :id");
                $etat->bindParam(':sexe',$user_sexe);
                $etat->bindParam(':naissance',$user_dateofbirth);
                $etat->bindParam(':taille',$user_height);
                $etat->bindParam(':poids',$user_weight);
                $etat->bindParam(':id',$user_id);
                $etat->execute();  
                
                /*On ajoute les informations de Session*/
                $_SESSION["user"][] = [
                    "sexe" => $user_sexe,
                    "taille" => $user_height,
                    "poids" => $user_weight

        ];
        /*On va à la page suivante*/
        header('Location: inscription4Phone.php');
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
    <div class="container3">
        <div class="content3">
           <form action="inscription3Phone.php" method="post">
            <div class="sexe">
                <label for="sexe">Sexe</label>
                <div>
                <input type="radio" name="sexe" id="man" value="1" ><label for="man"><img src="img/man.svg" alt=""></label>
                <input type="radio" name="sexe" id="woman" value="2"><label for="woman"><img src="img/woman.svg" alt=""></label>
                </div>
                
            </div>
            <div class="birth">
                <label for="dateofbirth">Date de Naissance</label>
                <input type="text" name="dateofbirth"> 
            </div>
            <div class="height">
                <label for="height">Taille (cm)</label>
                <input type="text" name="height"> 
            </div>
            <div class="weight">
                <label for="weight">Poids (kg)</label>
                <input type="text" name="weight">  
            </div>
            <div class="btnArrow">
            <button type="submit" id="arrowSubmit"><img src="img/arrowcircleright2.svg" alt="" class="arrownext"></button>
            </div>
           </form>
            
      
        </div> 
    <img class="logoinscription2" src="img\Logorose.svg" alt="Track Calories logo">
    </div>
   
</body>
</html>