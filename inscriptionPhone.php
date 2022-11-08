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
    <div class="container2">
        <div class="content2">
            <img class="logoinscription" src="img\Logorose.svg" alt="Track Calories logo">
            <div class="signin">
            <form action="connexion.php" method="post">
                <input type="text" name="surname" placeholder="Entrez votre prénom">
                <input type="text" name="name" placeholder="Entrez votre nom">
                <input type="mail" name="mail" placeholder="Entrez votre adresse mail">
                <input type="password" name="password" placeholder="Entrez votre mot de passe">
                <input type="password" name="passwordconfirm" placeholder="Confirmez votre mot de passe">
                <a href="inscription2Phone.php"><button class="next" type="submit">Suivant</button></a>
            </form>
        </div>
        <div class="button-bottom">
            <a href=""><button class="connexion">Connexion</button></a>
        </div>
        </div>
    </div>
</body>
</html>