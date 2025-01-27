<!-- filepath: /c:/Users/Usuario/Documents/DWES/Tema6php/laravel_zoologico/resources/views/animales/index.blade.php -->

<?php $__env->startSection('titulo', 'Inicio'); ?>
<?php $__env->startSection('contenido'); ?>
    <h1 class="text-3xl font-bold underline mb-4">Página de inicio de animales</h1>
    <?php $__currentLoopData = $animales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $animal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="bg-white shadow-md rounded-lg p-4 mb-4">
            <ul class="list-disc pl-5">
                <li class="mb-2"><strong>Especie:</strong> <?php echo e($animal->especie); ?></li>
                <li class="mb-2"><strong>Peso:</strong> <?php echo e($animal->peso); ?> kg</li>
                <li class="mb-2"><strong>Altura:</strong> <?php echo e($animal->altura); ?> cm</li>
                <li class="mb-2"><strong>Edad:</strong> <?php echo e($animal->getEdad()); ?> años</li>
                <li class="mb-2"><strong>Alimentación:</strong> <?php echo e($animal->alimentacion); ?></li>
                <li class="mb-2"><strong>Descripción:</strong> <?php echo e($animal->descripcion); ?></li>
                <li class="mb-2"><strong>Revisiones:</strong> <?php echo e($animal->revisiones->count()); ?></li>
                <li class="mb-2">
                    <img src="<?php echo e(asset('assets/imagenes/' . $animal->imagen)); ?>" alt="imagen de <?php echo e($animal->especie); ?>" class="w-32 h-32 object-cover">
                </li>
                <li class="mb-2">
                    <a href="<?php echo e(route('animales.show', $animal)); ?>" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Ver detalles</a>
                </li>
            </ul>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Usuario\Documents\DWES\Tema6php\laravel_zoologico\resources\views/animales/index.blade.php ENDPATH**/ ?>