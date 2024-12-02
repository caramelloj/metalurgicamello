<?php

namespace App\Http\Controllers;

use App\Models\Work;
use App\Models\Customer;
use Illuminate\Http\Request;
use Carbon\Carbon;
use PDF;

class WorkController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $works = Work::orderBy('id', 'desc')->get();

        return view('work.show', compact('works'));
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

        $photos = [];
        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $imagen) {
                $path = $imagen->store('photos', 'public'); // Guardar imagen en storage/public/imagenes
                $photos[] = $path; // Agregar la ruta al array
            }
        }


        Work::create([
            'customer_id' => $request->id,
            'nombre_cliente' => $request->nombre,
            'titulo' => $request->titulo,
            'detalle' => $request->detalle,
            'costo_materiales' => $request->costo_materiales,
            'costo_trabajo' => $request->costo_trabajo,
            'horas_trabajadas' => $request->horas_trabajadas,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_fin' => $request->fecha_fin,
            'materiales' => $request->materiales,
            'imagenes' => json_encode($photos), // Convertir a JSON antes de guardar
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
        $work = Work::where('id', $id)->first();

        $fecha_inicio = $work->fecha_inicio = Carbon::createFromFormat('d/m/Y', '24/11/2024')->format('Y-m-d'); // Ejemplo de conversión
        $fecha_fin = $work->fecha_fin = Carbon::createFromFormat('d/m/Y', '24/11/2024')->format('Y-m-d'); // Ejemplo de conversión

        return view('work.edit',compact('work','fecha_inicio','fecha_fin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $work = Work::where('id',$id)->first();
        $work->titulo = $request->titulo;
        $work->detalle = $request->detalle;
        $work->costo_materiales = $request->costo_materiales;
        $work->costo_trabajo = $request->costo_trabajo;
        $work->fecha_inicio= $request->fecha_inicio;
        $work->fecha_fin = $request->fecha_fin;


        $work->save();

        return to_route('getall.works');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Work::where('id', $id)->delete();

        return to_route('getall.works');
    }

    public function dumpdf($id){

        $works = Work::where('id', $id)->get();
        $customer_name = $works[0]->nombre_cliente;
        $pdf = PDF::loadView('work.dumpdf', compact('works'));

        return $pdf->download('Detalle de trabajo -'.$id.'-'.$customer_name.'.pdf');
    }
}
