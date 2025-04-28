

<?php $__env->startSection('content'); ?>
<div class="container">
    <h2 class="mb-4">Requêtes à traiter</h2>

    <?php $__empty_1 = true; $__currentLoopData = $requests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $request): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="card mb-4">
            <div class="card-header">
                <strong><?php echo e($request->request_title); ?></strong>
                <span class="badge bg-primary"><?php echo e(ucfirst($request->priority)); ?></span>
            </div>
            <div class="card-body">
                <p><strong>Soumis par :</strong> <?php echo e($request->user->name ?? 'Inconnu'); ?></p>
                <p><strong>Catégorie :</strong> <?php echo e($request->category->name ?? 'Non défini'); ?></p>
                <p><strong>Description :</strong> <?php echo e($request->request_description); ?></p>
                <p><strong>Status actuel :</strong> 
                    <?php if($request->responses->count()): ?>
                        <span class="badge bg-success">Décision prise</span>
                    <?php else: ?>
                        <span class="badge bg-warning text-dark">En attente</span>
                    <?php endif; ?>
                </p>

                <?php if(!$request->responses->count()): ?>
                    <a href="<?php echo e(route('responsable.requests.decision', $request->id)); ?>" class="btn btn-primary mt-2">
                        Prendre une décision
                    </a>
                <?php else: ?>
                    <p><strong>Réponse :</strong> <?php echo e($request->responses->first()->response_text); ?></p>
                <?php endif; ?>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <div class="alert alert-info">Aucune requête à traiter pour l'instant.</div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH I:\Programmation Laravel\gestrequete\resources\views/responsable/assigned_requests.blade.php ENDPATH**/ ?>