<?php

namespace App\Http\Controllers;

use App\Models\Moto;
use Illuminate\Http\Request;

class MotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $motos = Moto::all();
        return view('moto.index', ['motos' => $motos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('moto.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //1º Generamos el objeto para guardar los datos en la BD
        $object = new Moto($request->all());
        
        //2º Intentamos guardar
        try {
            $result = $object->save();
            
            $afterInsert = session('afterInsert', 'show');
            $target = 'moto/' . $object->id;
            
            if($afterInsert == 'moto') {
                $target = 'moto';
            } else if($afterInsert == 'createForm') {
                $target = 'moto/create';
            }
            
            //3º Si lo guarda vamos a redirigir a la página de create con un feedback de que se ha guardado bien
            return redirect($target)->with(['message'=> 'Your moto has been saved.']);
            
        } catch(\Exception $e) {
            
        //4º si no lo he guardado, volver a la pag anterior con los datos para volver a rellenar el formulario
            return back()->withInput()->withErrors(['message' => 'Your moto has not been saved.']);
            
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Moto $moto)
    {
        return view('moto.show', ['moto' => $moto]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Moto $moto)
    {
        return view('moto.edit', ['moto' => $moto]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Moto $moto)
    {
        //1º generar el objeto para guardar
        
        
        try {
            
            $moto->update($request->all());
            
            $afterEdit = session('afterEdit', 'show');
            // editForm, moto, show
            $target = 'moto/' . $moto->id;
        
            if($afterEdit == 'moto'){
                $target = 'moto';
            } else if ($afterEdit == 'editForm') {
                $target = 'moto/' . $moto->id . '/edit';
            } else {
                $target = 'moto/' . $moto->id;
            }
            
            //3º si lo he guardado volver a algún sitio
            return redirect($target)->with(['message'=> 'Your moto has been updated.']);
            
        } catch(\Exception $e) {
            
            //4º si no lo he guardado, volver a la pag anterior con los datos para volver a rellenar el formulario
            return back()->withInput()->withErrors(['message' => 'Your moto has not been updated.']);
            
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Moto $moto)
    {
        try {
            $moto->delete();
            return redirect('moto')->with(['message'=> 'The moto has been deleted.']);
        } catch (\Exception $e) {
            return back()->withErrors(['message' => 'Your moto has not been updated.']);
        }
    }
}
