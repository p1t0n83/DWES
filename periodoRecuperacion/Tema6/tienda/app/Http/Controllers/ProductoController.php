<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Image;
use App\Http\Requests\ProductosRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\VarDumper\VarDumper;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Product::all();
        return view('index', compact('productos'));
    }

    public function indexadmin()
    {
        $productos = Product::all();
        return view('administrarProductos', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductosRequest $request)
    {
        $datos = $request->all();
        $producto = Product::create([
            'nombre' => $datos['nombre'],
            'slug' => Str::slug($datos['nombre']),
            'precio' => $datos['precio'],
            'stock' => $datos['stock'],
            'descripcion' => $datos['descripcion'],
            'familia' => $datos['familia']
        ]);

        /**
         * $request->imagen->isValid();
         * !empty($request->imagen);
         * $request->imagen->store('',);
         */

        if ($request->imagen->isValid() && !empty($request->imagen)) {
            $url = $request->imagen->store('', 'imagenes');
            // Crear registro de imagen
            Image::create([
                'titulo' => $producto->nombre,
                'url' => $url,
                'producto' => $producto->id
            ]);
        }


        return redirect()
            ->route('productos.index')
            ->with('success', 'Producto creado correctamente.');

    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $producto = Product::where('slug', $slug)->firstOrFail();
        return view('show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
        $producto = Product::where('slug', $slug)->firstOrFail();
        return view('edit', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductosRequest $request, $slug)
    {
        $datos = $request->all();
        $producto = Product::where('slug', $slug)->firstOrFail();
        $producto->update([
            'nombre' => $request->nombre,
            'slug' => Str::slug($request->nombre),
            'precio' => $request->precio,
            'stock' => $request->stock,
            'descripcion' => $request->descripcion,
            'familia' => $request->familia
        ]);

        // Si se sube una nueva imagen, reemplaza la primera imagen asociada
        if ($request->hasFile('imagen') && $request->file('imagen')->isValid()) {
            $url = $request->imagen->store('', 'imagenes');
            // Busca la primera imagen asociada al producto
            $imagen = Image::where('producto', $producto->id)->first();
            //borro la imagen
            $ruta = public_path('imagenes/' . $imagen->url);
            File::delete($ruta);
            if ($imagen) {
                $imagen->update([
                    'titulo' => $producto->nombre,
                    'url' => $url,
                ]);
            } else {
                Image::create([
                    'titulo' => $producto->nombre,
                    'url' => $url,
                    'producto' => $producto->id
                ]);
            }
        }

        return redirect()->route('productos.index')->with('success', 'Producto actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        $producto = Product::where('slug', $slug)->firstOrFail();
        $imagen =Image::where('producto', $producto->id)->firstOrFail();
         File::delete(public_path('imagenes/' . $imagen->url));
         $imagen->delete();
        $producto->delete();
        return redirect()->route('productos.indexadmin')->with('success', 'Producto eliminado correctamente');
    }


public function login(Request $request)
{
    // Validar los datos
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        $usuario = Auth::user();
        $rol = $usuario->getRoleNames()->first();

        session([
            'usuario_nombre' => $usuario->name,
            'usuario_rol' => $rol
        ]);

        // Redirige según el rol
        if ($rol === 'admin') {
            return redirect()->route('productos.indexadmin');
        } else {
            return redirect()->route('inicio');
        }
    }

    return back()->withErrors([
        'email' => 'Las credenciales no son válidas o no tienes permisos para acceder.',
    ]);
}

public function registro(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:6|confirmed',
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);
    $user->assignRole('cliente');

    Auth::login($user);

    // Guarda en sesión
    session([
        'usuario_nombre' => $user->name,
        'usuario_rol' => 'cliente'
    ]);

    return redirect()->route('inicio');
}

public function agregarACesta($id)
{
    $producto = Product::findOrFail($id);

    $cesta = session()->get('cesta', []);

    if (isset($cesta[$id])) {
        $cesta[$id]['cantidad']++;
    } else {
        $cesta[$id] = [
            'nombre' => $producto->nombre,
            'precio' => $producto->precio,
            'cantidad' => 1
        ];
    }

    session(['cesta' => $cesta]);

    return redirect()->back()->with('success', 'Producto añadido a la cesta');
}
public function eliminarDeCesta($id)
{
    $cesta = session('cesta', []);
    unset($cesta[$id]);
    session(['cesta' => $cesta]);
    return redirect()->route('cesta')->with('success', 'Producto eliminado de la cesta');
}

public function vaciarCesta()
{
    session()->forget('cesta');
    return redirect()->route('cesta')->with('success', 'Cesta vaciada correctamente');
}

public function finalizarCompra()
{
    session()->forget('cesta');
    return redirect()->route('cesta')->with('success', '¡Compra finalizada con éxito!');
}
}
