<?php $__env->startComponent('mail::message'); ?>
# Bonjour <?php echo e($request->user->name ?? ''); ?>,

Votre requête **<?php echo e($request->request_title); ?>** a été **<?php echo e(strtolower($decision)); ?>** par les responsables.

<?php if(!empty($response_text)): ?>
> **Commentaire du responsable :**  
> <?php echo e($response_text); ?>

<?php endif; ?>

Merci pour votre confiance.


Cordialement,  
L'équipe Administration
<?php echo $__env->renderComponent(); ?>
<?php /**PATH I:\Programmation Laravel\gestrequete\resources\views/emails/decision/notification.blade.php ENDPATH**/ ?>