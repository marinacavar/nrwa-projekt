

<?php $__env->startSection('content'); ?>
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Add product type data
  </div>
  <div class="card-body">
    <?php if($errors->any()): ?>
      <div class="alert alert-danger">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
      </div><br />
    <?php endif; ?>
      <form method="post" action="<?php echo e(route('department.store')); ?>">
          <div class="form-group">
              <?php echo csrf_field(); ?>
              <p>Department ID is autoincremented.</p>
          </div>
          <div class="form-group" style="margin-bottom: 15px;">
              <?php echo csrf_field(); ?>
              <label for="name">Department Name:</label>
              <input type="text" class="form-control" name="name"/>
          </div>
          <button type="submit" class="btn btn-primary">Add department</button>
      </form>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\nrwa-projekt-1\resources\views/department/create.blade.php ENDPATH**/ ?>