

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1 class="mb-4">Liste des Requêtes à Décider</h1>

    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <?php $__empty_1 = true; $__currentLoopData = $requests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $request): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between">
            <strong><?php echo e($request->request_title); ?></strong> (Priorité: <?php echo e(ucfirst($request->priority)); ?>)
            <?php if($request->responses->count()): ?>
                <span class="badge bg-secondary">Décision prise</span>
            <?php else: ?>
                <span class="badge bg-warning text-dark">En attente</span>
            <?php endif; ?>
        </div>
        <div class="card-body">
            <p><strong>Description :</strong> <?php echo e($request->request_description); ?></p>
            <p><strong>Soumis par :</strong> <?php echo e($request->user->name ?? 'Inconnu'); ?></p>

            <?php if(!$request->responses->count()): ?>
                <form action="<?php echo e(route('responsable.requests.decision', $request->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="mb-3">
                        <label for="response_text_<?php echo e($request->id); ?>" class="form-label">Commentaire (optionnel)</label>
                        <textarea name="response_text" id="response_text_<?php echo e($request->id); ?>" class="form-control" rows="2"></textarea>
                    </div>
                    <div class="d-flex gap-2">
                        <button type="submit" name="decision" value="Approuver" class="btn btn-success">Approuver</button>
                        <button type="submit" name="decision" value="Refuser" class="btn btn-danger">Refuser</button>
                    </div>
                </form>
            <?php else: ?>
                <p><strong>Réponse :</strong> <?php echo e($request->responses->first()->response_text); ?></p>
            <?php endif; ?>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <div class="alert alert-info">Aucune requête à traiter.</div>
<?php endif; ?>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH I:\Programmation Laravel\gestrequete\resources\views/responsable/requests/index.blade.php ENDPATH**/ ?>