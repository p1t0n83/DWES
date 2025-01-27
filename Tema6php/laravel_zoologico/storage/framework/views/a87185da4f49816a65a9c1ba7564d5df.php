<nav class="bg-green-800 py-6 relative ">
    <div class="container mx-auto flex px-8 xl:px-0">
        <div class="flex flex-grow">
            <img src="<?php echo e(asset('assets/imagenes/logo.png')); ?>" alt="logo animal">
        </div>
        <div class="flew lg:hidden">
            <img src="<?php echo e(asset('assets/imagenes/iconoMenu.png')); ?>" alt="menu" onClick="openMenu();">
        </div>
        <div id="menu" class="hidden flex-grow  w-full justify-between items-center absolute top-40 left-0 bg-green-800 py-14 px-8 lg:flex lg:relative lg:top-0  lg:py-0 lg:px-0 sm:px-14">
            <div class="flex flex-col mb-8 lg:flex-row lg:mb-0 mx-auto">
                <a href="<?php echo e(route('inicio')); ?>" class="text-white mb-1 lg:ml-16 lg:mr-16 lg:mb-8">Inicio</a>
                <a href="<?php echo e(route('animales.index')); ?>" class="text-white mb-1 lg:mr-16 lg:mb-8">Listado de Animales</a>
                <a href="<?php echo e(route('animales.create')); ?>" class="text-white">Nuevo Animal</a>
            </div>
            <?php if(auth()->guard()->guest()): ?>
                    <li><a href="<?php echo e(route('login')); ?>">Iniciar sesión</a></li>
                    <li><a href="<?php echo e(route('register')); ?>">Registrarse</a></li>
                <?php else: ?>
                    <li>Bienvenido, <?php echo e(Auth::user()->name); ?></li>
                    <li>
                        <a href="<?php echo e(route('logout')); ?>"
                           onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            Cerrar sesión
                        </a>
                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                            <?php echo csrf_field(); ?>
                        </form>
                    </li>
                <?php endif; ?>
        </div>
    </div>
</nav>
<script>
    function openMenu(){
        let menu=document.getElementById('menu');
        if (menu.classList.contains('hidden')){
            menu.classList.remove('hidden');
        } else{
            menu.classList.add('hidden');
        }
    }
</script>
<?php /**PATH C:\Users\Usuario\Documents\DWES\Tema6php\laravel_zoologico\resources\views/layouts/partials/nav.blade.php ENDPATH**/ ?>