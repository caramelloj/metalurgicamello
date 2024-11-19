<?php

namespace App\Http\Controllers;

use App\Models\Work;
use App\Models\Photo;
use App\Models\Customer;
use Illuminate\Http\Request;

class WorkController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $works = Work::all();
        $photos = Photo::all();

        return view('work.show', compact('works','photos'));
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

        // Validar las fotos
        $request->validate([
            'photos.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);


        // Almacenar las fotos
        $paths = [];
        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $paths = $photo->store('photos', 'public');

                    // Guardar la ruta en la base de datos
                    Photo::create([
                        'path' => $paths,
                        'id_trabajo' => $request->id_trabajo
                    ]);
            }
        }


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

        return to_route('getall.works');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $customer = Customer::where('id', $id)->first();
        $ultimoRegistro = Work::orderBy('id', 'desc')->first();

        if ($ultimoRegistro == null){
            $ultimoRegistro = 0;
        }else{
            $ultimoRegistro = $ultimoRegistro->id;
        }

        return view('work.create',compact('customer', 'ultimoRegistro'));
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
