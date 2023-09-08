<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Bonjour {{ $contenu['name'] }},

    <p>Bienvenue sur mon site de start up. Vous venez de vous inscrire.Voici vos identifiants de connexion: </p>
    <p>Email : {{ $contenu['email'] }}</p>
    <p>Mot de passe : {{ $contenu['mot_de_passe'] }}</p>
    

    <p>Merci</p>
</body>
</html>