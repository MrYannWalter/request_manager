<?php $__env->startComponent('mail::message'); ?>
# Requête envoyée au responsable

La requête **<?php echo e($request->request_title); ?>** a ete envoyer au responsable **<?php echo e($responsable->name); ?>** avec succes.

Merci pour votre travail.

<?php echo $__env->renderComponent(); ?>
<?php /**PATH I:\Programmation Laravel\gestrequete\resources\views/emails/request_sent_to_responsable.blade.php ENDPATH**/ ?>