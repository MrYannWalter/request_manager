

<?php $__env->startSection('content'); ?>
<div class="container py-4">
    <h2 class="mb-4 text-center fw-bold">Soumettre une Nouvelle Requête</h2>

    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul class="mb-0">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?php echo e(route('requests.store')); ?>" method="POST" enctype="multipart/form-data" class="card p-4 shadow">
        <?php echo csrf_field(); ?>

        <div class="mb-3">
            <label for="request_title" class="form-label">Titre de la requête</label>
            <input type="text" name="request_title" id="request_title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="request_description" class="form-label">Description</label>
            <textarea name="request_description" id="request_description" rows="4" class="form-control" required></textarea>
        </div>

        <div class="mb-3">
            <label for="priority" class="form-label">Priorité</label>
            <select name="priority" id="priority" class="form-select" required>
                <option value="standard" selected>Standard</option>
                <option value="urgente">Urgente</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Type de Requête</label>
            <select name="category_id" id="category_id" class="form-select" required>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($category->id); ?>"><?php echo e($category->category_name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="attachment_path" class="form-label">Pièce Jointe (PDF, image)</label>
            <input type="file" name="attachment_path" id="attachment_path" class="form-control" accept="application/pdf,image/*">
        </div>

        <div class="text-end">
            <button type="submit" class="btn btn-primary">Soumettre</button>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH I:\Programmation Laravel\gestrequete\resources\views/requests/create.blade.php ENDPATH**/ ?>