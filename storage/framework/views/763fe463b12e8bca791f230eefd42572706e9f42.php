

<?php $__env->startSection('content'); ?>
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Add officer
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
      <form method="post" action="<?php echo e(route('officer.store')); ?>">
          <div class="form-group">
              <?php echo csrf_field(); ?>
              <label  for="cust_id">Customer Id:</label>
              <select class="form-select" name="cust_id">
                  <?php $__currentLoopData = \App\Models\Customer::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($type->cust_id); ?>"><?php echo e($type->cust_id); ?> - <?php echo e($type->address); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
          </div>
          <div class="form-group" style="margin-bottom: 15px;">
              <?php echo csrf_field(); ?>
              <label for="title">Title:</label>
              <input type="text" class="form-control" name="title"/>
          </div>
          <div class="form-group" style="margin-bottom: 15px;">
              <?php echo csrf_field(); ?>
              <label for="first_name">First name:</label>
              <input type="text" class="form-control" name="first_name"/>
          </div>
          <div class="form-group" style="margin-bottom: 15px;">
              <?php echo csrf_field(); ?>
              <label for="last_name">Last Name:</label>
              <input type="text" class="form-control" name="last_name"/>
          </div>
          <div class="form-group" style="margin-bottom: 15px;">
              <?php echo csrf_field(); ?>
              <label for="start_date">Start date:</label>
              <input type="date" class="form-control" name="start_date"/>
          </div>
          <div class="form-group" style="margin-bottom: 15px;">
              <?php echo csrf_field(); ?>
              <label for="end_date">End date:</label>
              <input type="date" class="form-control" name="end_date"/>
          </div>
          <button type="submit" class="btn btn-primary">Add officer</button>
      </form>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\nrwa-projekt-1\resources\views/officer/create.blade.php ENDPATH**/ ?>