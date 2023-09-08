<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('vendor/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet">
    <title>Changement de mot de passe</title>
</head>
<body>
    <div class="container">
        <h1>Bonjour {{ $contenu['name'] }},</h1>
        <p>Bienvenue sur mon site de startup. Vous venez de changer votre mot de passe.</p>
        <div class="info">
            <p>Email : {{ $contenu['email'] }}</p>
        </div>
        <p>Merci</p>
        <div>
            <p>L'équipe de la startup</p>
        </div>
    </div>
</body>
</html>
