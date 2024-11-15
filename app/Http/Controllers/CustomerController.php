<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    public function getCustomer(Request $request){

        $customers = Customer::searchCustomer($request->customerName)->get();

        return view('customer.show_customers', compact('customers'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::all();

        return view('customer.show_customers', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('customer.create_customer');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'nombre' => 'required|string|max:255', // El nombre es requerido, debe ser una cadena y con un máximo de 255 caracteres
            'cuit' => 'required|regex:/^\d{2}-\d{8}-\d$/', // CUIT/CUIL debe cumplir con el formato XX-XXXXXXXX-X (2 números, 8 números, 1 número)
            'telefono' => 'required|regex:/^\+?[0-9]{1,4}?[ -]?[0-9]{3}[ -]?[0-9]{4}$/', // Teléfono puede ser con o sin código de país, y con espacios o guiones
            'direccion' => 'required|string|max:255', // La dirección es requerida, debe ser una cadena y con un máximo de 255 caracteres
            'saldo' => 'required|numeric|min:0', // El saldo debe ser un número y no puede ser negativo
        ];


        $cuit_cuil_comprobation = Customer::where('cuit_cuil', $request->customerCuit)->first();

        if ($cuit_cuil_comprobation == null){
            Customer::create([
                'name' => $request->customerName,
                'cuit_cuil' => $request->customerCuit,
                'address' => $request->customerAddress,
                'phone' => $request->customerPhone,
                'saldo' => $request->saldo
            ]);
        }else{
            dd("CLIENTE EXISTENTE");
            return back()->with('error','Cuit Duplicado');
        }

        return back()->with('success', 'Formulario procesado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

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
