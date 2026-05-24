<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\hospedaje;
class hospedajeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hospedajes = hospedaje::all();
        return view('hospedajes')->with('hospedajes', $hospedajes);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'capacidad' => 'required|integer', // integer, no int
            'tipo' => 'required|in:hotel,airbnb,casa', // Validar opciones permitidas
            'direccion' => 'nullable|string|max:255',
            'imagenes.*' => 'image|mimes:jpeg,png,jpg|max:2048', // IMPORTANTE: imagenes.*
        ]);

        $rutas = [];

        if ($request->hasFile('imagenes')) {
            foreach ($request->file('imagenes') as $imagen) {
                $ruta = $imagen->store('hospedajes', 'public');
                $rutas[] = $ruta;
            }
        }

        hospedaje::create([
            'nombre' => $validated['nombre'],
            'capacidad' => $validated['capacidad'],
            'tipo' => $validated['tipo'],
            'direccion' => $validated['direccion'],
            'imagenes' => $rutas, // Se guarda como array gracias al cast
        ]);
        
        return redirect()->back()->with('success', 'Hospedaje agregado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $hospedaje = hospedaje::find($id);
        return view('hospedaje_modificar', compact('hospedaje'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            'nombre' => 'required|string|max:255',
            'capacidad' => 'required|integer',
            'tipo' => 'required|in:hotel,airbnb,casa',
            'direccion' => 'nullable|string|max:255',
            'imagenes.*' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $hospedaje = hospedaje::find($id);

        if (!$hospedaje) {
            return redirect('hospedajes');
        }

        $rutas = [];

        if ($request->hasFile('imagenes')) {
            foreach ($request->file('imagenes') as $imagen) {
                $ruta = $imagen->store('hospedajes', 'public');
                $rutas[] = $ruta;
            }
        }

        $hospedaje->nombre = $request->nombre;
        $hospedaje->capacidad = $request->capacidad;
        $hospedaje->tipo = $request->tipo;
        $hospedaje->direccion = $request->direccion;
        $hospedaje->imagenes = $rutas;
        $hospedaje->save();

        return redirect()->back()->with('success', 'Hospedaje actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
