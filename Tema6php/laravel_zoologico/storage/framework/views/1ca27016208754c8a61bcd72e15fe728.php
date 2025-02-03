<?php $__env->startSection('titulo', 'Detalles del Animal'); ?>

<?php $__env->startSection('contenido'); ?>
<div class="container">
    <div class="row flex items-center"> <!-- Agregar flexbox al contenedor -->
        <!-- Columna de la imagen a la izquierda -->
        <div class="pr-1 w-3/3"> <!-- Aumentar el tamaño de la imagen -->
            <img src="<?php echo e(asset('assets/imagenes/' . $animal->imagen)); ?>" alt="<?php echo e($animal->especie); ?>" class="w-full max-h-96 object-contain rounded-md">
        </div>

        <!-- Columna de los detalles a la derecha -->
        <div class="w-1/3">
            <h2><?php echo e($animal->especie); ?></h2>
            <p><strong>Peso:</strong> <?php echo e($animal->peso); ?> kg</p>
            <p><strong>Altura:</strong> <?php echo e($animal->altura); ?> cm</p>
            <p><strong>Edad:</strong> <?php echo e($animal->getEdad()); ?></p>
            <p><strong>Alimentación:</strong> <?php echo e($animal->alimentacion); ?></p>
            <p><strong>Descripción:</strong> <?php echo e($animal->descripcion); ?></p>
            <p><strong>Revisiones:</strong><?php echo e($animal->revisiones()->count()); ?></p>
        </div>
    </div>

    <!-- Botones -->
    <div class="row mt-4">
        <!-- Botón para volver a la lista -->
        <div class="col-md-6">
            <a href="<?php echo e(route('animales.index')); ?>" class="btn btn-secondary btn-lg btn-block">Volver a la lista</a>
        </div>

        <!-- Botón para editar el animal -->
        <div class="col-md-6">
            <a href="<?php echo e(route('animales.edit', $animal)); ?>" class="btn btn-primary btn-lg btn-block">Editar</a>
        </div>

        <div class="col-md-6">
            <a href="<?php echo e(route('revisiones.create', $animal)); ?>" class="btn btn-primary btn-lg btn-block">Crear revision</a>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Usuario\Documents\DWES\Tema6php\laravel_zoologico\resources\views/animales/show.blade.php ENDPATH**/ ?>