

<?php $__env->startSection('titulo', 'Detalles del Animal'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <!-- Columna de la imagen -->
        <div class="col-md-6">
            <img src="<?php echo e(asset('assets/imagenes/' . $animal['imagen'])); ?>" alt="<?php echo e($animal['especie']); ?>" class="img-fluid">
        </div>

        <!-- Columna de los detalles -->
        <div class="col-md-6">
            <h2><?php echo e($animal['especie']); ?></h2>
            <p><strong>Peso:</strong> <?php echo e($animal['peso']); ?> kg</p>
            <p><strong>Altura:</strong> <?php echo e($animal['altura']); ?> cm</p>
            <p><strong>Fecha de nacimiento:</strong> <?php echo e($animal['fechaNacimiento']); ?></p>
            <p><strong>Alimentación:</strong> <?php echo e($animal['alimentacion']); ?></p>
            <p><strong>Descripción:</strong> <?php echo e($animal['descripcion']); ?></p>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\DWES\Tema6php\laravel_zoologico\resources\views/animales/show.blade.php ENDPATH**/ ?>