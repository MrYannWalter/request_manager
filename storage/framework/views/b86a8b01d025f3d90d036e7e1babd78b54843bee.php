<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Confirmation de requête soumise</title>
</head>
<body>
    <h1>Votre requête a été soumise avec succès !</h1>
    
    <p><strong>Objet de la requête :</strong> <?php echo e($requestTitle); ?></p>
    <p><strong>Description :</strong> <?php echo e($requestDescription); ?></p>
    <p><strong>Priorité :</strong> <?php echo e($priority); ?></p>

    <p><strong>Un agent va maintenant traiter votre requête. </strong></p>
    <p><strong>Nom de l'agent : </strong> <?php echo e($agentName); ?></p>

    <p>Merci de votre patience.</p>
</body>
</html>
<?php /**PATH I:\Programmation Laravel\gestrequete\resources\views/emails/request_submitted.blade.php ENDPATH**/ ?>