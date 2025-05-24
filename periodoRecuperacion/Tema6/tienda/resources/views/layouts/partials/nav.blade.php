<nav class="bg-gray-900 py-6 relative ">
    <div class="container mx-auto flex px-8 xl:px-0">
        <div class="flex flex-grow items-center">
            <img src="{{asset('assets/imagenes/logo.jpg')}}" alt="logo" class="h-12 w-auto">
        </div>
        <div class="flew lg:hidden">
            <img src="{{asset('assets/imagenes/iconoMenu.png')}}" alt="menu" onClick="openMenu();">
        </div>
        <div id="menu"
            class="hidden flex-grow  w-full justify-between items-center absolute top-40 left-0 bg-gray-900 py-14 px-8 lg:flex lg:relative lg:top-0  lg:py-0 lg:px-0 sm:px-14">
            <div class="flex flex-col mb-8 lg:flex-row lg:mb-0 mx-auto">
                <a href="{{route('inicio')}}" class="text-white mb-1 lg:ml-16 lg:mr-16 lg:mb-8">Inicio</a>
                @if(session('usuario_rol') === 'admin')
                    <a href="{{route('productos.index')}}" class="text-white mb-1 lg:mr-16 lg:mb-8">Listado de Productos</a>
                    <a href="{{route('productos.create')}}" class="text-white mb-1 lg:mr-16 lg:mb-8">Nuevo Producto</a>
                    <a href="{{route('productos.indexadmin')}}" class="text-white mb-1 lg:mr-16 lg:mb-8">Administrar Productos</a>
                @elseif(session('usuario_rol') === 'cliente')
                    <a href="{{route('productos.index')}}" class="text-white mb-1 lg:mr-16 lg:mb-8">Listado de Productos</a>
                    <a href="{{route('cesta')}}" class="text-white mb-1 lg:mr-16 lg:mb-8">Cesta</a>
                @endif
            </div>
            <div class="flex flex-col text-center lg:flex-row">
                @if(session('usuario_nombre'))
                    <span class="text-white mr-4">Hola, {{ session('usuario_nombre') }}</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="bblanco mb-1 lg:mr-4 lg:mb-0">Desconectarse</button>
                    </form>
                @else
                    <a href="{{route('login')}}" class="bblanco mb-1 lg:mr-4 lg:mb-0">Iniciar Sesión</a>
                    <a href="{{route('register')}}" class="bverde">Regístrate</a>
                @endif
            </div>
        </div>
    </div>
</nav>
<script>
    function openMenu() {
        let menu = document.getElementById('menu');
        if (menu.classList.contains('hidden')) {
            menu.classList.remove('hidden');
        } else {
            menu.classList.add('hidden');
        }
    }
</script>