<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Confirmation de requête soumise</title>
</head>
<body>
    <h1>Votre requête a été soumise avec succès !</h1>
    
    <p><strong>Objet de la requête :</strong> {{ $requestTitle }}</p>
    <p><strong>Description :</strong> {{ $requestDescription }}</p>
    <p><strong>Priorité :</strong> {{ $priority }}</p>

    <p><strong>Un agent va maintenant traiter votre requête. </strong></p>
    <p><strong>Nom de l'agent : </strong> {{ $agentName }}</p>

    <p>Merci de votre patience.</p>
</body>
</html>
