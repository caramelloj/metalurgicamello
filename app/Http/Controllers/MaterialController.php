<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\Inventory;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materiales = Material::orderBy('id', 'DESC')->get();

        return view('material.show', compact('materiales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('material.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'descripcion' => 'required|string|max:255',
            'unidad' => 'required|string|max:50',
            'cantidad' => 'required|integer|min:0',
            'precio' => 'required|numeric|min:0',
        ]);

        // Crear un nuevo registro en la base de datos
        $material = Material::create($validatedData);

        return to_route('materiales.index');
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
        $material = Material::where('id',$id)->first();

        return view('material.edit',compact('material'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $material = Material::where('id',$id)->first();
        $material->descripcion = $request->descripcion;
        $material->cantidad = $request->cantidad;
        $material->unidad = $request->unidad;
        $material->precio = $request->precio;

        $material->save();

        return to_route('materiales.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Material::where('id', $id)->delete();

        return to_route('materiales.index');
    }
}
