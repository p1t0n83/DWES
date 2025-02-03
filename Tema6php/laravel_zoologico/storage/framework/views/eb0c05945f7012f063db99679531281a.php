<?php $__env->startSection('titulo', 'Zoologico'); ?>

<?php $__env->startSection('contenido'); ?>
<h1 class="text-3xl font-bold underline">Pagina principal del zoologico</h1>

<!-- Mostrar animales de manera vertical con imagen a la izquierda y texto a la derecha -->
<div class="space-y-6">
    <?php $__currentLoopData = $animalesLista; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $animal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="flex bg-white p-4 rounded shadow-md">
            <!-- Imagen a la izquierda -->
            <div class="w-1/3 pr-4"> <!-- Ancho de la imagen 1/3 y padding derecho -->
                <img src="<?php echo e(asset('assets/imagenes/' . $animal->imagen)); ?>" alt="<?php echo e($animal->especie); ?>"
                    class="w-full h-48 object-cover rounded">
            </div>

            <!-- Texto a la derecha -->
            <div class="w-2/3">
                <h2 class="text-2xl font-bold"><?php echo e($animal->especie); ?></h2>
                <p><strong>Peso:</strong> <?php echo e($animal->peso); ?> kg</p>
                <p><strong>Altura:</strong> <?php echo e($animal->altura); ?> cm</p>
                <p><strong>Fecha de Nacimiento:</strong>
                    <?php echo e(\Carbon\Carbon::parse($animal->fechaNacimiento)->format('d-m-Y')); ?></p>
                <p><strong>Alimentación:</strong> <?php echo e($animal->alimentacion); ?></p>
                <p><strong>Descripción:</strong> <?php echo e($animal->descripcion); ?></p>
                <form action="<?php echo e(route("animales.show",$animal)); ?>" method="get">
                    <button  class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Ver informacion detallada</button>
                </form>
            </div>

        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Usuario\Documents\DWES\Tema6php\laravel_zoologico\resources\views/animales/index.blade.php ENDPATH**/ ?>