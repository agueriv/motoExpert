<?php
    use App\Models\Moto;
    $motos = Moto::orderBy('created_at','DESC')->get();
    $cont = 0;
?>
<!-- Heredamos el contenido base de layout -->
@extends('app.layout')
<!-- Aqui vamos a poner el contenido dinámico de nuestra página -->
@section('menuelements')
    <a href="{{ url('.') }}" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
    <a href="{{ url('moto') }}" class="nav-item nav-link"><i class="fa fa-motorcycle me-2"></i>Catalog</a>
    <a href="{{ url('moto/create') }}" class="nav-item nav-link"><i class="fa fa-plus me-2"></i>Add Motorcycle</a>
    <hr>
    <a href="{{ url('settings') }}" class="nav-item nav-link"><i class="fa fa-cog me-2"></i>Settings</a>
@endsection

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4 justify-content-between">
        <div class="col-sm-6 col-xl-4">
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-line fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Number of models</p>
                    <h6 class="mb-0">{{ Moto::all()->groupBy('model')->count() }}</h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-4">
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-bar fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Numbers of brands</p>
                    <h6 class="mb-0">{{ Moto::all()->groupBy('brand')->count() }}</h6>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">NEWLY ADDED MOTORCYCLES</h6>
            <a href="{{ url('moto') }}">Show All</a>
        </div>
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-white">
                        <th scope="col">Brand</th>
                        <th scope="col">Model</th>
                        <th scope="col">Year</th>
                        <th scope="col">License</th>
                        <th scope="col">Type</th>
                        <th scope="col">Prize</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($motos as $moto)
                    <?php
                        $cont = $cont + 1;
                    ?>
                    @if ($cont <= 5)
                    <tr>
                        <td>{{ $moto->brand }}</td>
                        <td>{{ $moto->model }}</td>
                        <td>{{ $moto->year }}</td>
                        <td>{{ $moto->license }}</td>
                        <td>{{ $moto->type }}</td>
                        <td>{{ $moto->prize }}€</td>
                        <td>
                            <a href="{{ url('moto/' . $moto->id) }}" class="btn btn-primary">Detail</a>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection