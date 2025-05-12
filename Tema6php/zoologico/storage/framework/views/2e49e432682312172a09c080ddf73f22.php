<?php $__env->startSection('titulo','Editar animal'); ?>
<?php $__env->startSection('contenido'); ?>
<h1 class="text-3x1 font-bold underline">Página para editar al animal <?php echo e($animal); ?></h1>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.plantilla', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Usuario\Documents\DWES\Tema6php\zoologico\resources\views/edit.blade.php ENDPATH**/ ?>