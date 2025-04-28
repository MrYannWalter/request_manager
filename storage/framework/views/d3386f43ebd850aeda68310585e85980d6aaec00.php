

<?php $__env->startSection('content'); ?>
<div class="container py-4">
    <h1 class="mb-4">Details de la Requête</h1>

    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <form action="<?php echo e(route('agent.requests.update', $request->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="mb-3">
            <label class="form-label">Titre</label>
            <input type="text" name="request_title" class="form-control" value="<?php echo e(old('request_title', $request->request_title)); ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="request_description" class="form-control" rows="5" required><?php echo e(old('request_description', $request->request_description)); ?></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Priorité</label>
            <select name="priority" class="form-select" required>
                <option value="urgente" <?php echo e($request->priority == 'urgente' ? 'selected' : ''); ?>>Urgente</option>
                <option value="standard" <?php echo e($request->priority == 'standard' ? 'selected' : ''); ?>>Standard</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Statut</label>
            <select name="status" class="form-select" required>
                <option value="soumise" <?php echo e($request->status == 'soumise' ? 'selected' : ''); ?>>Soumise</option>
                <option value="en cours" <?php echo e($request->status == 'en cours' ? 'selected' : ''); ?>>En cours</option>
                <option value="traitée" <?php echo e($request->status == 'traitée' ? 'selected' : ''); ?>>Traitée</option>
                <option value="rejetée" <?php echo e($request->status == 'rejetée' ? 'selected' : ''); ?>>Rejetée</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
        <a href="/agent/assigned-requests" class="btn btn-secondary">Retour</a>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH I:\Programmation Laravel\gestrequete\resources\views/agent/edit_request.blade.php ENDPATH**/ ?>