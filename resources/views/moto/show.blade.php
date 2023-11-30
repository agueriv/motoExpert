<!-- Heredamos el contenido base de layout -->
@extends('app.layout')
<!-- Aqui vamos a poner el contenido dinámico de nuestra página -->
@section('menuelements')
    <a href="{{ url('.') }}" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
    <a href="{{ url('moto') }}" class="nav-item nav-link"><i class="fa fa-motorcycle me-2"></i>Catalog</a>
    <a href="{{ url('moto/create') }}" class="nav-item nav-link"><i class="fa fa-plus me-2"></i>Add Motorcycle</a>
    <hr>
    <a href="{{ url('settings') }}" class="nav-item nav-link"><i class="fa fa-cog me-2"></i>Settings</a>
@endsection

@include('modal.deleteModal')

@section('content')
<div class="container-fluid pt-4 px-4">
    <a href="{{ url('.') }}" class="btn p-0"><i class="fa fa-chevron-left me-2"></i>Go home</a>
    <br>
    <a href="{{ url('moto') }}" class="btn p-0"><i class="fa fa-chevron-left me-2"></i>Go catalog</a>
</div>

<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-secondary rounded align-items-center justify-content-center justify-items-center p-4">
                <i class="fa fa-motorcycle fa-3x text-primary text-center col-12 mb-3" style="margin: 0 auto;"></i>
                <h6 class="mb-0 text-center">
                    #{{ $moto->id }} | {{ $moto->brand }} {{ $moto->model }} | {{ $moto->year }}
                </h6>
            </div>
        </div>
        
        <div class="col-sm-4 col-xl-4">
            <div class="bg-secondary rounded d-flex align-items-center p-4">
                <i class="fa fa-copyright fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Brand</p>
                    <h6 class="mb-0">{{ $moto->brand }}</h6>
                </div>
            </div>
        </div>
        <div class="col-sm-4 col-xl-4">
            <div class="bg-secondary rounded d-flex align-items-center p-4">
                <i class="fa fa-motorcycle fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Model</p>
                    <h6 class="mb-0">{{ $moto->model }}</h6>
                </div>
            </div>
        </div>
        <div class="col-sm-4 col-xl-4">
            <div class="bg-secondary rounded d-flex align-items-center p-4">
                <i class="fa fa-calendar-alt fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Year</p>
                    <h6 class="mb-0">{{ $moto->year }}</h6>
                </div>
            </div>
        </div>
        <div class="col-sm-4 col-xl-4">
            <div class="bg-secondary rounded d-flex align-items-center p-4">
                <i class="fa fa-sort-amount-up-alt fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Displacement</p>
                    <h6 class="mb-0">{{ $moto->displacement }} cc</h6>
                </div>
            </div>
        </div>
        
        <div class="col-sm-4 col-xl-4">
            <div class="bg-secondary rounded d-flex align-items-center p-4">
                <i class="fa fa-battery-full fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Power</p>
                    <h6 class="mb-0">{{ $moto->power }} cv</h6>
                </div>
            </div>
        </div>
        <div class="col-sm-4 col-xl-4">
            <div class="bg-secondary rounded d-flex align-items-center p-4">
                <i class="fa fa-id-badge fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">License</p>
                    <h6 class="mb-0">{{ $moto->license }}</h6>
                </div>
            </div>
        </div>
        <div class="col-sm-4 col-xl-4">
            <div class="bg-secondary rounded d-flex align-items-center p-4">
                <i class="fa fa-balance-scale-right fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Weight</p>
                    <h6 class="mb-0">{{ $moto->weight }} kg</h6>
                </div>
            </div>
        </div>
        <div class="col-sm-4 col-xl-4">
            <div class="bg-secondary rounded d-flex align-items-center p-4">
                <i class="fa fa-motorcycle fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Type</p>
                    <h6 class="mb-0">{{ $moto->type }}</h6>
                </div>
            </div>
        </div>
        
        <div class="col-sm-4 col-xl-4">
            <div class="bg-secondary rounded d-flex align-items-center p-4">
                <i class="fa fa-euro-sign fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Prize</p>
                    <h6 class="mb-0">{{ $moto->prize }} €</h6>
                </div>
            </div>
        </div>
        <div class="col-sm-4 col-xl-4 mx-auto">
            <div class="bg-secondary rounded d-flex align-items-center p-4">
                <i class="fa fa-id-badge fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Moto registration number</p>
                    <h6 class="mb-0">{{ $moto->matricula }}&nbsp;</h6>
                </div>
            </div>
        </div>
        
        <div class="container-fluid text-center">
            <a href="{{ url('moto/' . $moto->id . '/edit')}}" class="btn btn-primary">Modify</a>
            <button data-url="{{ url('moto/' . $moto->id) }}" data-brand="{{ $moto->brand }}" data-model="{{ $moto->model }}" type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#deleteMotoModal">
                Delete
            </button>
        </div>
    </div>
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