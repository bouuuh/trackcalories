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
    <div class="container4">
        
        <div class="content4">
        <?php
            echo "<p class='hello'>Bravo ".$_SESSION['user']['surname']."</p>";
            ?>
           <p class="almostdone">Ton inscription est terminée ! 
            Tu vas pouvoir maintenant avoir accès à l’application.</p>
            <a href=""><img src="img/arrowcircleright2.svg" alt="" class="arrownext"></a>
      
        </div> 
    <img class="logoinscription" src="img\Logorose.svg" alt="Track Calories logo">
    </div>
</body>
</html>