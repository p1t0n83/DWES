<!-- filepath: /c:/Users/Usuario/Documents/DWES/Tema6php/laravel_zoologico/resources/views/animales/create.blade.php -->


<?php $__env->startSection('titulo', 'Crear'); ?>

<?php $__env->startSection('contenido'); ?>
    <h1 class="text-3xl font-bold underline mb-4">Página de crear animales</h1>
    <form class="bg-white shadow-md rounded-lg p-6 mb-4" action="<?php echo e(route('animales.store')); ?>" method="POST">
        <div class="mb-4">
            <label for="especie" class="block text-gray-700 text-sm font-bold mb-2">Especie:</label>
            <input type="text" id="especie" name="especie" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>
        <div class="mb-4">
            <label for="peso" class="block text-gray-700 text-sm font-bold mb-2">Peso:</label>
            <input type="number" id="peso" name="peso" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="mb-4">
            <label for="altura" class="block text-gray-700 text-sm font-bold mb-2">Altura:</label>
            <input type="number" id="altura" name="altura" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="mb-4">
            <label for="fechaNac" class="block text-gray-700 text-sm font-bold mb-2">Fecha de nacimiento:</label>
            <input type="text" id="fechaNac" name="fechaNac" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="mb-4">
            <label for="alimentacion" class="block text-gray-700 text-sm font-bold mb-2">Alimentación:</label>
            <input type="text" id="alimentacion" name="alimentacion" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="mb-4">
            <label for="descripcion" class="block text-gray-700 text-sm font-bold mb-2">Descripción:</label>
            <textarea id="descripcion" name="descripcion" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
        </div>
        <div class="mb-4">
            <label for="imagen" class="block text-gray-700 text-sm font-bold mb-2">Imagen:</label>
            <input type="file" id="imagen" name="imagen" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Añadir animal
            </button>
        </div>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Usuario\Documents\DWES\Tema6php\laravel_zoologico\resources\views/animales/create.blade.php ENDPATH**/ ?>