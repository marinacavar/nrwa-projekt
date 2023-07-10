

<?php $__env->startSection('content'); ?>
<div class="bankInfo-container">
    <h1>Bank Informations</h1>
<div id="bankInformationDiv">

</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    axios.get('/api/bankInformations')
        .then(function(response) {
            var { branches, products, officers } = response.data[0];
            
            var bankInformationDiv = document.getElementById('bankInformationDiv');
            bankInformationDiv.innerHTML = '<h2>Branches</h2>';
            branches.forEach(function(branch) {
                bankInformationDiv.innerHTML += '<div>' + branch.name + '</div>';
            });

            bankInformationDiv.innerHTML += '<h2>Products</h2>';
            products.forEach(function(product) {
                bankInformationDiv.innerHTML += '<div>' + product.name + '</div>';
            });

            bankInformationDiv.innerHTML += '<h2>Officers</h2>';
            officers.forEach(function(officer) {
                bankInformationDiv.innerHTML += '<div>' + officer.first_name + ' ' + officer.last_name + '</div>';
            });
        })
        .catch(function(error) {
            console.log('Error:', error);
        });
</script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700;800&display=swap" rel="stylesheet">
<style>
    * {
        font-family: 'Poppins', sans-serif;
    }
    .bankInfo-container {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }
    #bankInformationDiv {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    h1 {
        position: absolute;
        top: 20px;
        font-weight: 600;
        margin: 0px !important;
    }
    h2 {
        font-weight: 600;
        margin: 20px 0px 2px 0px;
    }
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\nrwa-projekt-1\resources\views/bankInformations/index.blade.php ENDPATH**/ ?>