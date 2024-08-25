<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoría;
use App\Models\Expedientes;
use App\Models\Usuario;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;


class CategoríaController extends Controller
{
    public function index()
    {
        $categorias = Categoría::all();
        return view('admin.home', compact('categorias'));
    }
    public function filtrarYCategorias(Request $request)
{
    // Obtener los valores de búsqueda y filtro
    $search = $request->input('s');
    $filter = $request->input('filtro', 'todos');
    
    // Consultar las categorías
    $categorias = Categoría::query();

    // Aplicar filtro para solo obtener categorías activas
    $categorias->where('activa', 1);
    
    // Aplicar búsqueda por nombre
    if ($search) {
        $categorias->where('nombre', 'like', '%' . $search . '%');
    }
    
    // Aplicar filtro de orden
    if ($filter == 'ascendente') {
        $categorias->orderBy('nombre', 'asc');
    } elseif ($filter == 'descendente') {
        $categorias->orderBy('nombre', 'desc');
    } else {
        // Por defecto o si el filtro es 'todos', ordenar ascendentemente
        $categorias->orderBy('nombre', 'asc');
    }
    
    // Obtener los resultados
    $categorias = $categorias->get();
    
    return view('app.area', compact('categorias'));
}

    
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255|unique:categorias,nombre',
            'descripcion' => 'nullable|string',
            'caracteristicas' => 'nullable|string',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try {
            // Crear una nueva categoría
            $categoria = new Categoría();
            $categoria->nombre = $request->input('nombre');
            $categoria->descripcion = $request->input('descripcion');
            $categoria->caracteristicas = $request->input('caracteristicas');

            if ($request->hasFile('img')) {
                $image = $request->file('img');
                $imagePath = $image->move(public_path('img'), $image->getClientOriginalName());
                $categoria->img = 'img/' . $image->getClientOriginalName();
            }

            $categoria->save();

            return response()->json([
                'message' => 'Categoría agregada exitosamente',
                'data' => $categoria
            ]);
        } catch (\Exception $e) {
            // Registrar el error
            Log::error('Error al agregar categoría: ' . $e->getMessage());

            return response()->json([
                'message' => 'Hubo un error al agregar la categoría',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function show($id)
    {
        $categoria = Categoría::find($id);
        if (!$categoria) {
            return redirect()->back()->with('error', 'La categoría no existe.');
        }
        return view('admin.statistics', compact('categoria'));
    }

    public function showRecords($id)
    {
        $categoria = Categoría::find($id);
        if (!$categoria) {
            return redirect()->back()->with('error', 'La categoría no existe.');
        }

        $users = Usuario::all();

        return view('admin.records', compact('categoria', 'users'));
    }

    public function showAd_chats($id)
    {
        $categoria = Categoría::find($id);
        if (!$categoria) {
            return redirect()->back()->with('error', 'La categoría no existe.');
        }
        return view('admin.ad_chats', compact('categoria'));
    }

    public function showStaff($id)
    {
        $categoria = Categoría::with('doctors')->find($id);
        if (!$categoria) {
            return redirect()->back()->with('error', 'La categoría no existe.');
        }
        return view('admin.staff', compact('categoria'));
    }

    public function showCalendar($id)
    {
        $categoria = Categoría::find($id);
        if (!$categoria) {
            return redirect()->back()->with('error', 'La categoría no existe.');
        }
        return view('admin.calendar', compact('categoria'));
    }

    public function edit($id)
    {
        $categoria = Categoría::find($id);
        if (!$categoria) {
            return response()->json(['error' => 'La categoría no existe.'], 404);
        }
        return response()->json($categoria);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:categorias,nombre,' . $id,
            'descripcion' => 'nullable|string',
            'caracteristicas' => 'nullable|string',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $categoria = Categoría::find($id);

        if (!$categoria) {
            return response()->json(['message' => 'Categoría no encontrada'], 404);
        }

        try {
            // Manejo de la imagen
            if ($request->hasFile('img')) {
                // Borra la imagen antigua si existe
                if ($categoria->img && file_exists(public_path('img/' . $categoria->img))) {
                    unlink(public_path($categoria->img));
                }

                // Guarda la nueva imagen
                $image = $request->file('img');
                $imageName = time() . '.' . $image->extension();
                $imagePath = $image->move(public_path('img'), $imageName);
                $categoria->img = 'img/' . $imageName;
            }

            $categoria->update([
                'nombre' => $request->input('nombre'),
                'descripcion' => $request->input('descripcion'),
                'caracteristicas' => $request->input('caracteristicas'),
            ]);

            return response()->json(['message' => 'Categoría actualizada exitosamente', 'data' => $categoria]);
        } catch (\Exception $e) {
            Log::error('Error al actualizar la categoría: ' . $e->getMessage());

            return response()->json([
                'message' => 'Hubo un error al actualizar la categoría',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function deleteUser($id)
    {
        try {
            // Encontrar el paciente por ID
            $users = Usuario::findOrFail($id);

            // Eliminar el paciente
            $users->delete();

            return response()->json([
                'success' => true,
                'message' => 'Paciente eliminado correctamente'
            ]);
        } catch (\Exception $e) {
            // Manejar la excepción y retornar error
            return response()->json([
                'success' => false,
                'message' => 'No se pudo eliminar el paciente. ' . $e->getMessage()
            ], 500);
        }
    }

    public function destroy($id)
    {
        $categoria = Categoría::findOrFail($id);
        if ($categoria->img) {
            // Verifica que el archivo realmente existe antes de intentar eliminarlo
            $path = public_path($categoria->img);
            if (file_exists($path)) {
                unlink($path);
            }
        }
        $categoria->delete();
    
        return response()->json(['success' => 'Categoría eliminada correctamente.']);
    }
    

    public function suspend(Request $request, $id)
    {
        $categoria = Categoría::findOrFail($id);
        $categoria->activa = false;
        $categoria->save();

        $categoría = Categoría::findOrFail($id);
        $categoría->activa = false;
        $categoría->save();

        return response()->json(['message' => 'Categoría suspendida exitosamente']);
    }

    public function activate(Request $request, $id)
    {
        $categoria = Categoría::findOrFail($id);
        $categoria->activa = true;
        $categoria->save();

        return response()->json(['message' => 'Categoría activada exitosamente']);
    }
}
