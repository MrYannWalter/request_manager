

<?php $__env->startSection('content'); ?>
<div class="container py-4">
    <h2 class="mb-4 text-center fw-bold">Mes Requêtes</h2>

    <!-- Bouton pour créer une nouvelle requête -->
    <div class="mb-4 text-end">
        <a href="<?php echo e(route('requests.create')); ?>" class="btn btn-success">
            + Soumettre une nouvelle requête
        </a>
    </div>


    <div id="loader" class="d-flex justify-content-center align-items-center" style="height: 200px;">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Chargement...</span>
        </div>
    </div>

    <!-- Tableau (caché tant que le loader est visible) -->
    <div id="requests-table" class="table-responsive" style="display: none; animation: fadeIn 1s;">
        <?php if($requests->isEmpty()): ?>
            <div class="alert alert-info text-center">
                Vous n'avez soumis aucune requête pour l'instant.
            </div>
        <?php else: ?>
            <table class="table table-hover table-bordered align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Titre</th>
                        <th>Description</th>
                        <th>Statut</th>
                        <th>Priorité</th>
                        <th>Soumis le</th>
                        
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $requests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $request): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="fw-bold"><?php echo e($request->request_title); ?></td>
                            <td><?php echo e(Str::limit($request->request_description, 50)); ?></td>
                            <td>
                                <?php if($request->status == 'soumise'): ?>
                                    <span class="badge bg-primary"><?php echo e(ucfirst($request->status)); ?></span>
                                <?php elseif($request->status == 'en cours'): ?>
                                    <span class="badge bg-warning text-dark"><?php echo e(ucfirst($request->status)); ?></span>
                                <?php elseif($request->status == 'traitée'): ?>
                                    <span class="badge bg-success"><?php echo e(ucfirst($request->status)); ?></span>
                                <?php else: ?>
                                    <span class="badge bg-danger"><?php echo e(ucfirst($request->status)); ?></span>
                                <?php endif; ?>
                            </td>
                            <td><span class="badge bg-info text-dark"><?php echo e(ucfirst($request->priority)); ?></span></td>
                            
                            <td>
                                <?php if($request->submitted_at): ?>
                                    <?php echo e(\Carbon\Carbon::parse($request->submitted_at)->format('d/m/Y H:i')); ?>

                                <?php else: ?>
                                    -
                                <?php endif; ?>
                            </td>
                            
                            
                            <td>
                                <!-- Bouton de suppression -->
                                <form action="<?php echo e(route('requests.destroy', $request->id)); ?>" method="POST" style="display: inline;">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette requête ?');">
                                        Supprimer
                                    </button>
                                </form>
                            </td>
                            
                            
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</div>

<!-- Animation CSS -->
<style>
@keyframes  fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}
</style>

<!-- Script pour le loader -->
<script>
document.addEventListener("DOMContentLoaded", function() {
    setTimeout(function() {
        document.getElementById('loader').style.display = 'none';
        document.getElementById('requests-table').style.display = 'block';
    }, 1000); // simulate 1 second loading
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH I:\Programmation Laravel\gestrequete\resources\views/requests/index.blade.php ENDPATH**/ ?>