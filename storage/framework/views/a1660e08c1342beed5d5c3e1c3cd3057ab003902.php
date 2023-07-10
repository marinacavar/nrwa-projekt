

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
          <td>Title</td>
          <td>First name</td>
          <td>Last name</td>
          <td>Start date</td>
          <td>End date</td>
          <td>Customer Id</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $Products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($Product->title); ?></td>
            <td><?php echo e($Product->first_name); ?></td>
            <td><?php echo e($Product->last_name); ?></td>
            <td><?php echo e($Product->start_date); ?></td>
            <td><?php echo e($Product->end_date); ?></td>
            <td><?php echo e($Product->cust_id); ?></td>
            </td>
            <td>
                <a href="<?php echo e(route('officer.edit', $Product->officer_id)); ?>" class="btn btn-primary">Edit</a>
                <button class="btn btn-danger delete-btn" data-id="<?php echo e($Product->officer_id); ?>">Delete</button>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
  </table>
  <div style="display: flex; justify-content: center">
  <a href="<?php echo e(url('officer/create')); ?>" class="btn btn-secondary">Create</a>
  </div>
<div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
    $(document).ready(function() {
        $('.delete-btn').click(function() {
            var officerId = $(this).data('id');
            if (confirm('Are you sure you want to delete this officer?')) {
                $.ajax({
                    url: '/officer/' + officerId,
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }
        });
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts/app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\nrwa-projekt-1\resources\views/officer/index.blade.php ENDPATH**/ ?>