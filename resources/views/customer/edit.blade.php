@extends('adminlte::page')
@section('title', 'Editar cliente')


@section('content')
<div class="card">
    <div class="card-header h4">
        Actualizar datos de cliente
    </div>
    <div class="card-body">
        <form method="POST" action="{{route('clientes.update', $customer->id)}}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label class="col-form-label col-form-label-sm mt-8" for="customerName">Ingrese nombre del cliente</label>
                <input class="form-control form-control-sm" type="text" placeholder="" value="{{ $customer->nombre }}" id="customerName" name="customerName" >
            </div>
            <div class="form-group">
                <label class="col-form-label col-form-label-sm mt-8" for="customerCuit">Ingrese el cuit/cuil del cliente</label>
                <input class="form-control form-control-sm" type="text" placeholder="" value="{{ $customer->cuit_cuil }}" id="customerCuit" name="customerCuit" placeholder="2012345679" required>
            </div>
            <div class="form-group">
                <label class="col-form-label col-form-label-sm mt-8" for="customerPhone">Ingrese el teléfono del cliente</label>
                <input class="form-control form-control-sm" type="text" placeholder="" value="{{ $customer->telefono }}" id="customerPhone" name="customerPhone" pattern="[\+]?[0-9]{1,4}?[ -]?[0-9]{3}[ -]?[0-9]{4}" placeholder="Ej: +54 9 11 1234-5678" required>
            </div>
            <div class="form-group">
                <label class="col-form-label col-form-label-sm mt-8" for="customerAddress">Ingrese la dirección del cliente</label>
                <input class="form-control form-control-sm" type="text" placeholder="" value="{{ $customer->direccion }}" id="customerAddress" name="customerAddress">
            </div>
            <div class="form-group">
                <label class="col-form-label col-form-label-sm mt-8" for="saldo">Saldo:</label>
                <input class="form-control form-control-sm" type="text" placeholder="" value="{{ $customer->saldo }}" id="saldo" name="customerBalance" required>
            </div>
            <hr>
            <div class="form-group">
                <x-adminlte-button class="btn-flat" type="submit" label="Actualizar" theme="success" icon="fas fa-lg fa-save"/>
            </div>
        </form>
    </div>
</div>

@endsection
