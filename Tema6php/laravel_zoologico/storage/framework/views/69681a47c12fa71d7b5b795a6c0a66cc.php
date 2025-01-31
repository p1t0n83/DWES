

<?php $__env->startSection('titulo', 'Añadir una nueva revisión'); ?>

<?php $__env->startSection('contenido'); ?>
<div class="container">
    <h2 class="text-3xl font-bold mb-4">Añadir una nueva revisión</h2>

    <form method="POST" action="<?php echo e(route('revisiones.store')); ?>" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>

        <!-- Campo Hidden para el ID del Animal -->
        <input type="hidden" name="animalId" value="<?php echo e($animal->id); ?>">


        <!-- Campo de Descripción -->
        <div class="mb-4">
            <label for="descripcion" class="block text-lg font-medium">Descripción</label>
            <textarea id="descripcion" name="descripcion" rows="4" class="w-full px-4 py-2 border rounded-lg" required></textarea>
        </div>
        <?php $__errorArgs = ['descripcion'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <p style="color: red;"><?php echo e($message); ?></p>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

        <!-- Campo de Fecha -->
        <div class="mb-4">
            <label for="fecha" class="block text-lg font-medium">Fecha</label>
            <input type="date" id="fecha" name="fecha" class="w-full px-4 py-2 border rounded-lg" required>
        </div>
        <?php $__errorArgs = ['fecha'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <p style="color: red;"><?php echo e($message); ?></p>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

        <!-- Botón para añadir la revisión -->
        <div class="mb-4">
            <button type="submit" class="bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-600">
                Añadir revisión
            </button>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\DWES\Tema6php\laravel_zoologico\resources\views/revisiones/create.blade.php ENDPATH**/ ?>