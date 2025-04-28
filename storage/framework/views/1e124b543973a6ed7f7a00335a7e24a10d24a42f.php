<!DOCTYPE html>
<html>
<head>
    <title>Nouvelle requête à traiter</title>
</head>
<body>
    <h1>Bonjour,</h1>
    <p>Une nouvelle requête vous a été affectée.</p>

    <p><strong>Titre de la requête :</strong> <?php echo e($requestTitle); ?></p>
    <p><strong>Étudiant concerné :</strong> <?php echo e($studentName); ?></p>
    <p><strong>Priorité :</strong> <?php echo e($priority); ?></p>

    <p>Merci de traiter cette requête dès que possible.</p>
</body>
</html>
<?php /**PATH I:\Programmation Laravel\gestrequete\resources\views/emails/agent_assigned.blade.php ENDPATH**/ ?>