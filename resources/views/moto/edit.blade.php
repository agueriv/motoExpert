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

@section('content')
<div class="container-fluid pt-4 px-4">
    <a href="{{ url('moto') }}" class="btn p-0"><i class="fa fa-chevron-left me-2"></i>Go catalog</a>
    <br>
    <a href="{{ url('moto/' . $moto->id) }}" class="btn p-0"><i class="fa fa-chevron-left me-2"></i>See moto</a>
</div>

<div class="col-sm-12 col-xl-12 pt-4 px-4">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4">Modify moto {{$moto->id}} {{$moto->brand}} {{$moto->model}}</h6>
        <form action="{{ url('moto/' . $moto->id) }}" method="post">
            @method('put')
            @csrf
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="brand" name="brand" placeholder="Moto brand" maxlength="40" required value="{{old('brand', $moto->brand)}}">
                <label for="brand">Moto brand</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="model" name="model" placeholder="Moto model" maxlength="60" required value="{{old('model', $moto->model)}}">
                <label for="model">Moto model</label>
            </div>
            <div class="form-floating mb-3">
                <input type="number" class="form-control" id="year" name="year" placeholder="Year" min="1" max="9999" required value="{{old('year', $moto->year)}}">
                <label for="year">Year</label>
            </div>
            <div class="form-floating mb-3">
                <input type="number" class="form-control" id="displacement" name="displacement" min="25" max="3000" placeholder="Displacement" required value="{{old('displacement', $moto->displacement)}}">
                <label for="displacement">Displacement</label>
            </div>
            <div class="form-floating mb-3">
                <input type="number" class="form-control" id="power" name="power" min="1" max="2500" placeholder="Power" value="{{old('power', $moto->power)}}">
                <label for="power">Power</label>
            </div>
            <div class="form-floating mb-3">
                <select class="form-select" id="license" name="license" aria-label="License type" required value="{{old('license', $moto->license)}}">
                    <?php
                        $enum = ['AM', 'A1', 'A2', 'A'];
                    ?>
                    @foreach($enum as $license)
                        @if($moto->license == $license || old('license') == $license)
                            <option value="{{$license}}" selected>{{$license}}</option>
                        @else
                            <option value={{$license}}>{{$license}}</option>
                        @endif
                    @endforeach
                </select>
                <label for="license">License type</label>
            </div>
            <div class="form-floating mb-3">
                <input type="number" class="form-control" id="weight" name="weight" min="1" max="1500" placeholder="Weight" value="{{old('weight', $moto->weight)}}">
                <label for="weight">Weight</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="type" name="type" placeholder="Type" maxlength="25" required value="{{old('type', $moto->type)}}">
                <label for="type">Type</label>
            </div>
            <div class="form-floating mb-3">
                <input type="number" class="form-control" id="prize" name="prize" min="1" step=".01" placeholder="Prize" value="{{old('prize', $moto->prize)}}">
                <label for="prize">Prize</label>
            </div>
            <div class="form-floating mb-3">
                <button type="submit" class="btn btn-success mt-3">Modify model</button>
            </div>
        </form>
    </div>
</div>

@endsection