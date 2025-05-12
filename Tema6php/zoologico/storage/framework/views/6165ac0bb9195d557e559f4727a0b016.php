<?php $__env->startSection('titulo','Listado de animales'); ?>
<?php $__env->startSection('contenido'); ?>
<h1 class="text-3x1 font-bold underline">Página principal de los animales</h1>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    <?php $__currentLoopData = $animales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $animal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
            <img src="<?php echo e(asset('assets/imagenes/' . $animal['imagen'])); ?>" alt="<?php echo e($animal['especie']); ?>" class=" h-48 object-cover">
            <div class="p-4">
                <h2 class="text-2xl font-semibold mb-2"><?php echo e($animal['especie']); ?></h2>
                <p><span class="font-semibold">Peso:</span> <?php echo e($animal['peso']); ?> kg</p>
                <p><span class="font-semibold">Altura:</span> <?php echo e($animal['altura']); ?> cm</p>
                <p><span class="font-semibold">Fecha de nacimiento:</span> <?php echo e($animal['fechaNacimiento']); ?></p>
                <p><span class="font-semibold">Alimentación:</span> <?php echo e($animal['alimentacion']); ?></p>
                <a href="<?php echo e(route('animales.show', $animal['especie'])); ?>" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Ver detalles
                </a>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.plantilla', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Usuario\Documents\DWES\Tema6php\zoologico\resources\views/index.blade.php ENDPATH**/ ?>