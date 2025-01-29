<!-- filepath: /c:/Users/Usuario/Documents/DWES/Tema6php/laravel_zoologico/resources/views/animales/create.blade.php -->


<?php $__env->startSection('titulo', 'Crear'); ?>

<?php $__env->startSection('contenido'); ?>
    <h1 class="text-3xl font-bold underline mb-4">Página de crear revision</h1>
    <form class="bg-white shadow-md rounded-lg p-6 mb-4" action="<?php echo e(route('animales.store')); ?>" method="post" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
        <div class="mb-4">
            <label for="fecha" class="block text-gray-700 text-sm font-bold mb-2">Fecha:</label>
            <input type="date" id="fecha" name="fechaNac" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="mb-4">
            <label for="descripcion" class="block text-gray-700 text-sm font-bold mb-2">Descripción:</label>
            <textarea id="descripcion" name="descripcion" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
        </div>
        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Añadir revision
            </button>
        </div>
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\DWES\Tema6php\laravel_zoologico\resources\views/animales/revision.blade.php ENDPATH**/ ?>