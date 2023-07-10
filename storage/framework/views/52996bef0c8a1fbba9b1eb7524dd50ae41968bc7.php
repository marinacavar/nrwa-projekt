

<?php $__env->startSection('content'); ?>
<style>
  .uper {
    margin-top: 40px;
  }

  td {
    text-align: center;
  }
</style>
<div class="uper">
<?php if($errors->has('delete')): ?>
    <div class="alert alert-danger">
        <?php echo e($errors->first('delete')); ?>

    </div>
<?php endif; ?>
  <?php if(session()->get('success')): ?>
    <div class="alert alert-success">
      <?php echo e(session()->get('success')); ?>  
    </div><br />
  <?php endif; ?>
  <table class="table table-striped">
    <thead>
        <tr>
          <td>Name</td>
          <td>State Id</td>
          <td>Customer Id</td>
          <td>Incorp date</td>
          <!-- cust_type_cd, fed_id -->
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $Products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($Product->name); ?></td>
            <td><?php echo e($Product->state_id); ?></td>
            <td><?php echo e($Product->cust_id); ?></td>
            <td><?php echo e($Product->incorp_date); ?></td>
            </td>
            <td><a href="<?php echo e(route('business.edit', $Product->cust_id)); ?>" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="<?php echo e(route('business.destroy', $Product->cust_id)); ?>" method="post">
                  <?php echo csrf_field(); ?>
                  <?php echo method_field('DELETE'); ?>
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
  </table>
  <div style="display: flex; justify-content: center">
  <a href="<?php echo e(url('business/create')); ?>" class="btn btn-secondary">Create</a>
  </div>
<div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\nrwa-projekt-1\resources\views/business/index.blade.php ENDPATH**/ ?>