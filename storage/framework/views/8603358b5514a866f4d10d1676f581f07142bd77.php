<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Statut de votre Requête</title>
</head>
<body>
    <h2>Bonjour,</h2>

    <p>Le statut de votre requête "<strong><?php echo e($request->request_title); ?></strong>" a été mis à jour.</p>

    <p><strong>Nouveau Statut :</strong> <?php echo e(ucfirst($request->status)); ?></p>

    <p>Merci de consulter votre espace personnel pour plus d'informations.</p>

    <p>Cordialement,<br>L'équipe de support</p>
</body>
</html>
<?php /**PATH I:\Programmation Laravel\gestrequete\resources\views/emails/request_status_updated.blade.php ENDPATH**/ ?>