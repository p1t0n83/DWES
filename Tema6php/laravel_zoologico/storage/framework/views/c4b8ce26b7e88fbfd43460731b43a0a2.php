<?php $__env->startSection('titulo', 'Mostrar animales'); ?>

<?php $__env->startSection('contenido'); ?>
    <h1 class="text-3xl font-bold underline mb-4">Página de inicio de <?php echo e($animal->especie); ?></h1>
    <div class="flex flex-col md:flex-row bg-white shadow-md rounded-lg p-4 mb-4">
        <div class="md:w-1/3">
            <img src="<?php echo e(asset('assets/imagenes/' . $animal->imagen)); ?>" alt="imagen de <?php echo e($animal->especie); ?>" class="w-full h-auto object-cover">
        </div>
        <div class="md:w-2/3 md:pl-4">
            <ul class="list-disc pl-5">
                <li class="mb-2"><strong>Especie:</strong> <?php echo e($animal->especie); ?></li>
                <li class="mb-2"><strong>Peso:</strong> <?php echo e($animal->peso); ?> kg</li>
                <li class="mb-2"><strong>Altura:</strong> <?php echo e($animal->altura); ?> cm</li>
                <li class="mb-2"><strong>Edad:</strong> <?php echo e($animal->getEdad()); ?> años</li>
                <li class="mb-2"><strong>Alimentación:</strong> <?php echo e($animal->alimentacion); ?></li>
                <li class="mb-2"><strong>Descripción:</strong> <?php echo e($animal->descripcion); ?></li>
                <li class="mb-2"><strong>Revisiones:</strong>
                    <?php $__currentLoopData = $animal->revisiones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $revision): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo e($revision->fecha); ?> - <?php echo e($revision->descripcion); ?><br>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </li>
            </ul>
        </div>
    </div>
    <div class="flex space-x-4">
    <a href="<?php echo e(route('animales.edit',$animal)); ?>" class="bg-blue-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
            Editar Animal
        </a>
        <a href="<?php echo e(route('animales.revision',$animal)); ?>" class="bg-blue-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
            Crear revision
        </a>
        <a href="<?php echo e(route('animales.index')); ?>" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
            Volver al Listado
        </a>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\DWES\Tema6php\laravel_zoologico\resources\views/animales/show.blade.php ENDPATH**/ ?>