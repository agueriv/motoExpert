<?php
    use App\Models\Moto;
?>
<!-- Heredamos el contenido base de layout -->
@extends('app.layout')
<!-- Aqui vamos a poner el contenido dinámico de nuestra página -->
@section('menuelements')
    <a href="{{ url('.') }}" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
    <a href="{{ url('moto') }}" class="nav-item nav-link active"><i class="fa fa-motorcycle me-2"></i>Catalog</a>
    <a href="{{ url('moto/create') }}" class="nav-item nav-link"><i class="fa fa-plus me-2"></i>Add Motorcycle</a>
    <hr>
    <a href="{{ url('settings') }}" class="nav-item nav-link"><i class="fa fa-cog me-2"></i>Settings</a>
@endsection

@include('modal.deleteModal')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <a href="{{ url('.') }}" class="btn p-0"><i class="fa fa-chevron-left me-2"></i>Go home</a>
    </div>

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
                <h6 class="mb-0">MOTORCYCLES CATALOG</h6>
            </div>
            <div class="table-responsive">
                <table class="table align-middle text-start table-bordered table-hover mb-0">
                    <thead>
                        <tr class="text-white">
                            <th scope="col">#</th>
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
                        <tr>
                            <td>{{ $moto->id }}</td>
                            <td>{{ $moto->brand }}</td>
                            <td>{{ $moto->model }}</td>
                            <td>{{ $moto->year }}</td>
                            <td>{{ $moto->license }}</td>
                            <td>{{ $moto->type }}</td>
                            <td>{{ $moto->prize }}€</td>
                            <td class="actions">
                                <a href="{{ url('moto/' . $moto->id) }}" class="btn btn-primary">Detail</a>
                                <a href="{{ url('moto/' . $moto->id . '/edit')}}" class="btn btn-light">Modify</a>
                                <button data-url="{{ url('moto/' . $moto->id) }}" data-brand="{{ $moto->brand }}" data-model="{{ $moto->model }}" type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#deleteMotoModal">
                                    Delete
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <a href="{{ url('moto/create') }}" class="btn btn-success mt-3"><i class="fa fa-plus me-2"></i>New model</a>
        <form id="formDelete" name="formDelete" action="{{ url('') }}" method="post">
            @csrf
            @method('delete')
    </form>
    </div>
@endsection

@section('scripts')
    <script>
        const deleteMotoModal = document.getElementById('deleteMotoModal');
        const motoName = document.getElementById('motoBrandModel');
        const formDeleteV3 = document.getElementById('formDelete');
        
        deleteMotoModal.addEventListener('show.bs.modal', event => {
          let motoBranModelName = event.relatedTarget.dataset.brand + ' ' + event.relatedTarget.dataset.model;
          let url = event.relatedTarget.dataset.url;
          
          motoName.innerText = motoBranModelName;
          formDeleteV3.action = url;
        });
    </script>
@endsection