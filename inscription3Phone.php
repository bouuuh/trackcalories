<?php
    session_start();
    include('connexion.php');
    $user_sexe = $_POST['sexe']; 
    $user_dateofbirth = $_POST['dateofbirth']; 
    $user_height =$_POST['height'];
    $user_weight = $_POST['weight'];     
    if (!empty($user_sexe) && !empty($user_dateofbirth) && !empty($user_height) && !empty($user_weight)) {    
        $etat = $base->prepare("UPDATE `utilisateur` SET `sexe`=:sexe,`date de naissance`=:naissance,`taille`=:taille,`poids`=:poids WHERE `id`=:id");
        $etat->bindValue(':sexe', $user_sexe,PDO::PARAM_STR);
        $etat->bindValue(':naissance', $user_dateofbirth,PDO::PARAM_STR);
        $etat->bindValue(':taille', $user_height,PDO::PARAM_STR);
        $etat->bindValue(':weight', $user_weight,PDO::PARAM_STR);
        $etat->bindValue(':id', $_SESSION['user']['id'],PDO::PARAM_STR);
        $etat->execute();  
        header('Location: inscription4Phone.php');
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
           <form action="" method="post">
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
           </form>
            <a href=""><img src="img/arrowcircleright2.svg" alt="" class="arrownext"></a>
      
        </div> 
    <img class="logoinscription2" src="img\Logorose.svg" alt="Track Calories logo">
    </div>
   
</body>
</html>