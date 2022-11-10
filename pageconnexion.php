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
    <div class="container5">
        <div class="content2">
            <img class="logoconnexion" src="img\Logo.svg" alt="Track Calories logo">
            <div class="signin">
            <form action="connexion.php" method="post">
                <input type="mail" name="mail" placeholder="Entrez votre adresse mail">
                <input type="password" name="password" placeholder="Entrez votre mot de passe">
                <p class="mdpforgotten">mot de passe oublié ?</p>
                <a href="inscription2Phone.php"><button class="connect" type="submit">Connexion</button></a>
            </form>
        </div>
        <div class="noaccount">
            <a href="inscription1Phone.php">Pas de compte ? <br>Inscrivez-vous</a>
        </div>
        </div>
    </div>
</body>
</html>