<!-- filepath: /c:/Users/Usuario/Documents/DWES/Tema6php/laravel_zoologico/resources/views/animales/show.blade.php -->


<?php $__env->startSection('titulo', 'Mostrar animales'); ?>

<?php $__env->startSection('contenido'); ?>
    <h1 class="text-3xl font-bold underline mb-4">Página de inicio de <?php echo e($animal['especie']); ?></h1>
    <div class="flex flex-col md:flex-row bg-white shadow-md rounded-lg p-4 mb-4">
        <div class="md:w-1/3">
            <img src="<?php echo e(asset('assets/imagenes/' . $animal['imagen'])); ?>" alt="imagen de <?php echo e($animal['especie']); ?>" class="w-full h-auto object-cover">
        </div>
        <div class="md:w-2/3 md:pl-4">
            <ul class="list-disc pl-5">
                <li class="mb-2"><strong>Especie:</strong> <?php echo e($animal['especie']); ?></li>
                <li class="mb-2"><strong>Peso:</strong> <?php echo e($animal['peso']); ?> kg</li>
                <li class="mb-2"><strong>Altura:</strong> <?php echo e($animal['altura']); ?> cm</li>
                <li class="mb-2"><strong>Fecha de Nacimiento:</strong> <?php echo e($animal['fechaNacimiento']); ?></li>
                <li class="mb-2"><strong>Alimentación:</strong> <?php echo e($animal['alimentacion']); ?></li>
                <li class="mb-2"><strong>Descripción:</strong> <?php echo e($animal['descripcion']); ?></li>
            </ul>
        </div>
    </div>
    <div class="flex space-x-4">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Editar animal
        </button>
        <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
            Volver al Listado
        </button>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Usuario\Documents\DWES\Tema6php\laravel_zoologico\resources\views/animales/show.blade.php ENDPATH**/ ?>