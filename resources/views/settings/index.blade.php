<!-- Heredamos el contenido base de layout -->
@extends('app.layout')
<!-- Aqui vamos a poner el contenido dinámico de nuestra página -->
@section('menuelements')
    <a href="{{ url('.') }}" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
    <a href="{{ url('moto') }}" class="nav-item nav-link"><i class="fa fa-motorcycle me-2"></i>Catalog</a>
    <a href="{{ url('moto/create') }}" class="nav-item nav-link"><i class="fa fa-plus me-2"></i>Add Motorcycle</a>
    <hr>
    <a href="{{ url('settings') }}" class="nav-item nav-link active"><i class="fa fa-cog me-2"></i>Settings</a>
@endsection

@section('content')
<div class="container-fluid pt-4 px-4">
    <a href="{{ url('.') }}" class="btn p-0"><i class="fa fa-chevron-left me-2"></i>Go home</a>
</div>

<div class="container-fluid pt-4 px-4">
    <form action="{{ url('settings') }}" method="post">
        @csrf
        @method('put')
        <div class="row g-4 justify-content-between">
                <div class="col-sm-12 col-xl-6">
                    <div class="bg-secondary rounded h-100 p-4">
                        <h6 class="mb-4">Behaviour after insert a new moto</h6>
                        <div class="form-floating mb-3">
                            <select class="form-select" id="afterInsert" name="afterInsert"
                                aria-label="Floating label select example">
                                @foreach ($afterCreateOptions as $value => $label)
                                    <option value="{{ $value }}" {{ $createOption === $value ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            <label for="afterInsert">Select what you want to do after insertion</label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-xl-6">
                    <div class="bg-secondary rounded h-100 p-4">
                        <h6 class="mb-4">Behaviour after edit a moto</h6>
                        <div class="form-floating mb-3">
                            <select class="form-select" id="afterEdit" name="afterEdit"
                                aria-label="Floating label select example">
                                @foreach ($afterEditOptions as $value => $label)
                                    <option value="{{ $value }}" {{ $editOption === $value ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            <label for="afterEdit">Select what you want to do after edit</label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-xl-12 text-center justify-center">
                    <button class="btn btn-primary">Apply changes</button>
                </div>
        </div>
    </form>
</div>
    
@endsection