

<?php $__env->startSection('content'); ?>
<div class="container py-4">
    <h1 class="mb-4">Mes Requêtes Affectées</h1>

    <?php if($assignedRequests->isEmpty()): ?>
        <div class="alert alert-info">
            Aucune requête ne vous a été affectée pour le moment.
        </div>
    <?php else: ?>
        <div class="table-responsive">
            <table class="table table-bordered shadow-sm">
                <thead class="thead-dark">
                    <tr>
                        <th>Titre</th>
                        <th>Description</th>
                        <th>Priorité</th>
                        <th>Statut</th>
                        <th>Soumis le</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $assignedRequests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $request): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($request->request_title); ?></td>
                            <td><?php echo e(Str::limit($request->request_description, 50)); ?></td>
                            <td>
                                <?php if($request->priority == 'urgente'): ?>
                                    <span class="badge bg-danger text-white">Urgente</span>
                                <?php else: ?>
                                    <span class="badge bg-primary text-white">Standard</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if($request->status == 'soumise'): ?>
                                    <span class="badge bg-warning text-dark">Soumise</span>
                                <?php elseif($request->status == 'en cours'): ?>
                                    <span class="badge bg-info text-dark">En cours</span>
                                <?php elseif($request->status == 'traitée'): ?>
                                    <span class="badge bg-success text-white">Traitée</span>
                                <?php elseif($request->status == 'rejetée'): ?>
                                    <span class="badge bg-danger text-white">Rejetée</span>
                                <?php endif; ?>
                            </td>
                            <td><?php echo e(\Carbon\Carbon::parse($request->submitted_at)->format('d/m/Y')); ?></td>
                            <td>
                                <a href="<?php echo e(route('agent.requests.edit', $request->id)); ?>" class="btn btn-sm btn-outline-primary">Voir Détails</a>                                
                                <form action="<?php echo e(route('agent.requests.markAsCompleted', $request->id)); ?>" method="POST" style="display:inline;">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('PUT'); ?>
                                    <button type="submit" class="btn btn-sm btn-success">Marquer Terminé</button>
                                </form>
                                
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH I:\Programmation Laravel\gestrequete\resources\views/agent/assigned_requests.blade.php ENDPATH**/ ?>