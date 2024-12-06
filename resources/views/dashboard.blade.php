@extends('adminlte::page')

@section('title', 'Dashboard')
@section('css')
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@endsection
@section('js')
<script src="https://kit.fontawesome.com/458cce8f5a.js" crossorigin="anonymous"></script>
@endsection
@section('content_header')
    <h1>Estadísticas generales</h1>
@stop

@section('content')
<div class="container-fluid">

    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3>{{$customers_count}}</h3>

            <p>Clientes Registrados</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3>{{$works_count}}</h3>

            <p>Trabajos Realizados</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
        </div>
      </div>
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
            <h3>${{$works_income}}</h3>
            <p>Total de dinero por trabajos realizados</p>
          </div>
          <div class="icon">
            <i class="fa-solid fa-rocket"></i>
          </div>
          {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
        </div>
      </div>
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-secondary">
          <div class="inner">
            <h3>${{$materials_cost}}</h3>

            <p>Total de gastos de materiales</p>
          </div>
          <div class="icon">
            <i class="fas fa-cog"></i>
          </div>
          {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            <h3>{{$materials_amount_stock}}</h3>
            <p>Cantidad de materiales en stock</p>
          </div>
          <div class="icon">
            <i class="fa-solid fa-layer-group"></i>
          </div>
          {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-gradient-primary">
          <div class="inner">
            <h3>${{$materials_amount_money}}</h3>

            <p>Dinero total de materiales en stock</p>
          </div>
          <div class="icon">
            <i class="fa-solid fa-wallet"></i>
          </div>
          {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
        </div>
      </div>
    </div>
    <!-- /.row -->
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log("dashboard stats, developed by njck"); </script>
@stop
