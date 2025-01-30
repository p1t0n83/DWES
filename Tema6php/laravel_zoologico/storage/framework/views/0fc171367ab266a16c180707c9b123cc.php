

<?php $__env->startSection('titulo', 'Editar Animal'); ?>

<?php $__env->startSection('contenido'); ?>
<div class="container">
    <h2 class="text-3xl font-bold mb-4">Modificar un Animal</h2>
    
    <form method="POST" action="<?php echo e(route('animales.update', $animal)); ?>" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?> <!-- Se usa PUT para la actualización -->

        <div class="mb-4">
            <label for="especie" class="block text-lg font-medium">Especie</label>
            <input type="text" id="especie" name="especie" class="w-full px-4 py-2 border rounded-lg" value="<?php echo e($animal->especie); ?>" required>
        </div>

        <div class="mb-4">
            <label for="peso" class="block text-lg font-medium">Peso (kg)</label>
            <input type="number" id="peso" name="peso" class="w-full px-4 py-2 border rounded-lg" value="<?php echo e($animal->peso); ?>" required>
        </div>

        <div class="mb-4">
            <label for="altura" class="block text-lg font-medium">Altura (cm)</label>
            <input type="number" id="altura" name="altura" class="w-full px-4 py-2 border rounded-lg" value="<?php echo e($animal->altura); ?>" required>
        </div>

        <div class="mb-4">
            <label for="fechaNacimiento" class="block text-lg font-medium">Fecha de Nacimiento</label>
            <input type="date" id="fechaNacimiento" name="fechaNacimiento" class="w-full px-4 py-2 border rounded-lg" value="<?php echo e($animal->fechaNacimiento); ?>" required>
        </div>

        <div class="mb-4">
            <label for="alimentacion" class="block text-lg font-medium">Alimentación</label>
            <input type="text" id="alimentacion" name="alimentacion" class="w-full px-4 py-2 border rounded-lg" value="<?php echo e($animal->alimentacion); ?>" required>
        </div>

        <div class="mb-4">
            <label for="descripcion" class="block text-lg font-medium">Descripción</label>
            <textarea id="descripcion" name="descripcion" rows="4" class="w-full px-4 py-2 border rounded-lg" required><?php echo e($animal->descripcion); ?></textarea>
        </div>

        <div class="mb-4">
            <label for="imagen" class="block text-lg font-medium">Imagen</label>
            <input type="file" id="imagen" name="imagen" class="w-full px-4 py-2 border rounded-lg" accept="image/*">
            <!-- Si la imagen ya existe, mostrarla -->
            <?php if($animal->imagen): ?>
                <img src="<?php echo e(asset('assets/imagenes/' . $animal->imagen)); ?>" alt="<?php echo e($animal->especie); ?>" class="mt-2" style="max-width: 200px;">
            <?php endif; ?>
        </div>

        <!-- Botón para modificar el animal -->
        <div class="mb-4">
            <button type="submit" class="bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-600">
                Modificar animal
            </button>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\DWES\Tema6php\laravel_zoologico\resources\views/animales/edit.blade.php ENDPATH**/ ?>