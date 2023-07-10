

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
  <?php if(session()->get('success')): ?>
    <div class="alert alert-success">
      <?php echo e(session()->get('success')); ?>  
    </div><br />
  <?php endif; ?>
  <table class="table table-striped">
    <thead>
        <tr>
          <td>Available balance</td>
          <td>Close date</td>
          <td>Last activity date</td>
          <td>Open date</td>
          <td>Pending balance</td>
          <td>Status</td>
          <td>Customer Id</td>
          <td>Open branch id</td>
          <td>Open employee id</td>
          <td>Product code</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $Products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($Product->avail_balance); ?></td>
            <td><?php echo e($Product->close_date); ?></td>
            <td><?php echo e($Product->last_activity_date); ?></td>
            <td><?php echo e($Product->open_date); ?></td>
            <td><?php echo e($Product->pending_balance); ?></td>
            <td><?php echo e($Product->status); ?></td>
            <td><?php echo e($Product->cust_id); ?></td>
            <td><?php echo e($Product->open_branch_id); ?></td>
            <td><?php echo e($Product->open_emp_id); ?></td>
            <td><?php echo e($Product->product_cd); ?></td>
            </td>
            <td><a href="<?php echo e(route('account.edit', $Product->account_id)); ?>" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="<?php echo e(route('account.destroy', $Product->account_id)); ?>" method="post">
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
  <a href="<?php echo e(url('account/create')); ?>" class="btn btn-secondary">Create</a>
  </div>
<div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\nrwa-projekt-1\resources\views/account/index.blade.php ENDPATH**/ ?>