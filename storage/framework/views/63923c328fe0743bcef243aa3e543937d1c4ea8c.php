

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
          <td>Product Code</td>
          <td>Product Name</td>
          <td>Date Offered</td>
          <td>Date Retired</td>
          <td>Product Type Code </td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $Products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($Product->product_cd); ?></td>
            <td><?php echo e($Product->name); ?></td>
            <td><?php echo e($Product->date_offered); ?></td>
            <td><?php echo e($Product->date_retired); ?></td>
            <td><?php echo e($Product->product_type_cd); ?></td>
            </td>
            <td><a href="<?php echo e(route('product.edit', $Product->product_cd)); ?>" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="<?php echo e(route('product.destroy', $Product->product_cd)); ?>" method="post">
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
  <a href="<?php echo e(url('product/create')); ?>" class="btn btn-secondary">Create</a>
  </div>
<div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\nrwa-projekt-1\resources\views/product/index.blade.php ENDPATH**/ ?>