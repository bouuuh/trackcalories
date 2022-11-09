<?php
session_start();
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
        <a href="inscription1Phone.php"><img src="img/arrowleft2.svg" alt="" class="arrowback"></a>
        <div class="content2">
            <?php
            echo "<p class='hello'>Bonjour ".$_SESSION['user']['surname']."</p>";
            ?>
           
           <p class="almostdone">Ton inscription est bientôt finie mais nous avons besoin d’informations supplémentaires pour créer ton profil :)</p>
            <a href="inscription3Phone.php"><img src="img/arrowcircleright2.svg" alt="" class="arrownext"></a>
      
        </div> 
    <img class="logoinscription" src="img\Logorose.svg" alt="Track Calories logo">
    </div>
    <?php
    
    ?>
</body>
</html>