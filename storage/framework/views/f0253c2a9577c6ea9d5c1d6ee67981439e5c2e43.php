

<?php $__env->startSection('content'); ?>
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Add customer
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
      <form method="post" action="<?php echo e(route('customer.store')); ?>">
          <div class="form-group">
              <?php echo csrf_field(); ?>
              <label  for="address">Address:</label>
              <input type="text" class="form-control" name="address"/>
          </div>
          <div class="form-group" style="margin-bottom: 15px;">
              <?php echo csrf_field(); ?>
              <label for="city">City:</label>
              <input type="text" class="form-control" name="city"/>
          </div>
          <div class="form-group" style="margin-bottom: 15px;">
              <?php echo csrf_field(); ?>
              <label for="postal_code">Postal Code:</label>
              <input type="text" class="form-control" name="postal_code"/>
          </div>
          <div class="form-group" style="margin-bottom: 15px;">
              <?php echo csrf_field(); ?>
              <label for="state">State:</label>
              <input type="text" class="form-control" name="state"/>
          </div>
          <button type="submit" class="btn btn-primary">Add customer</button>
      </form>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\nrwa-projekt-1\resources\views/customer/create.blade.php ENDPATH**/ ?>