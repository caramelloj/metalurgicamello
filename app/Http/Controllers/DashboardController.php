<?php

namespace App\Http\Controllers;

use App\Models\Work;
use App\Models\Customer;
use App\Models\Material;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard_stats(){

        $customers_count = count( Customer::all());

        $works_count = count( Work::all());

        $materials_cost = Work::sum('costo_materiales');

        $works_income = Work::sum('costo_trabajo');

        $materials_amount_stock = Material::sum('cantidad');

        $materials_amount_money = Material::sum('total');

        return view('dashboard',compact('customers_count','works_count','materials_cost',
        'works_income','materials_amount_stock','materials_amount_money'));
    }
}
