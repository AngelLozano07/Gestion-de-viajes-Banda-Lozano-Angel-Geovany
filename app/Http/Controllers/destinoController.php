<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\destino;

class destinoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $destinos = destino::all();
        return view('destinos', compact('destinos'));
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
        //
        $request->validate([
            'nombre' => 'required|string|max:255',
            'ciudad' => 'required|string|max:255',
            'pais' => 'required|string|max:255',
            'direccion' => 'nullable|string|max:255',
            'imagenes.*' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $rutas = [];

        if ($request->hasFile('imagenes')) {
            foreach ($request->file('imagenes') as $imagen) {
                $ruta = $imagen->store('destinos', 'public');
                $rutas[] = $ruta;
            }
        }

        destino::create([
            'nombre' => $request->nombre,
            'ciudad' => $request->ciudad,
            'pais' => $request->pais,
            'direccion' => $request->direccion,
            'imagenes' => $rutas,
        ]);
        return redirect()->back()->with('success', 'Destino agregado correctamente.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
