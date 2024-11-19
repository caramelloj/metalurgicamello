<?php

namespace App\Http\Controllers;

use App\Models\Work;
use App\Models\Customer;
use Illuminate\Http\Request;

class WorkController extends Controller
{
    public function getWorks()
    {
        // Obtiene todos los registros de la tabla `works`
        $works = Work::all();

        // Retorna los registros en formato JSON
        return response()->json(['data' => $works]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('work.show');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        Work::create([
            'customer_id' => $request->id,
            'titulo' => $request->titulo,
            'detalle' => $request->detalle,
            'costo_materiales' => $request->costo_materiales,
            'costo_trabajo' => $request->costo_trabajo,
            'horas_trabajadas' => $request->horas_trabajadas,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_fin' => $request->fecha_fin,
            'materiales' => $request->materiales,

        ]);

        return to_route('trabajos.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $customer = Customer::where('id', $id)->first();

        return view('work.create',compact('customer'));
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
