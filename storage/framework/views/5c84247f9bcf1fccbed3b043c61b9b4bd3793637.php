

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

  <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;">
    <div>
      <input type="text" id="search" placeholder="Search departments">
      <button id="searchBtn" class="btn btn-primary">Search</button>
    </div>
    <div>
      <a href="<?php echo e(url('department/create')); ?>" class="btn btn-secondary">Create</a>
    </div>
  </div>

  <table class="table table-striped">
    <thead>
      <tr>
        <td>Department ID</td>
        <td>Department Name</td>
        <td colspan="2">Action</td>
      </tr>
    </thead>
    <tbody>
      <?php $__currentLoopData = $Products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
        <td><?php echo e($Product->dept_id); ?></td>
        <td><?php echo e($Product->name); ?></td>
        <td><a href="<?php echo e(route('department.edit', $Product->dept_id)); ?>" class="btn btn-primary">Edit</a></td>
        <td>
          <form action="<?php echo e(route('department.destroy', $Product->dept_id)); ?>" method="post">
            <?php echo csrf_field(); ?>
            <?php echo method_field('DELETE'); ?>
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>
        </td>
      </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
  </table>

  <ul id="results"></ul>
</div>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
  const searchInput = document.getElementById('search');
  const searchButton = document.getElementById('searchBtn');
  const resultsList = document.getElementById('results');

  function performSearch() {
    const searchTerm = searchInput.value;

    if (searchTerm.trim() !== '') {
      axios.get('/departments/search', {
        params: {
          term: searchTerm
        }
      })
      .then(function(response) {
        const departments = response.data;

        // Clear previous results
        resultsList.innerHTML = '';

        // Append new results
        departments.forEach(function(department) {
          const li = document.createElement('li');
          li.textContent = department.name;
          resultsList.appendChild(li);
        });
      })
      .catch(function(error) {
        console.error(error);
      });
    } else {
      // Clear the results if the search term is empty
      resultsList.innerHTML = '';
    }
  }

  searchButton.addEventListener('click', function(event) {
    event.preventDefault();
    performSearch();
  });

  searchInput.addEventListener('input', function() {
    performSearch();
  });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\nrwa-projekt-1\resources\views/department/index.blade.php ENDPATH**/ ?>