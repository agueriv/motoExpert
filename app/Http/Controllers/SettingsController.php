<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index() {
        // Creamos un array con las opciones que queremos en el select de crear moto
        $afterInsert = session('afterInsert', 'show');
        $afterCreateOptions = [
            'moto' => 'See all models',
            'show' => 'See model',
            'createForm' => 'See add models form'
        ];
        
        // Creamos un array con las opciones que queremos en el select de editar moto
        $afterEdit = session('afterEdit', 'show');
        $afterEditOptions = [
            'moto' => 'See all models',
            'show' => 'See model',
            'editForm' => 'See edit models form'
        ];
        
        return view('settings.index',[
            'afterCreateOptions' => $afterCreateOptions,
            'createOption' => $afterInsert,
            'afterEditOptions' => $afterEditOptions,
            'editOption' => $afterEdit
        ]);
    }
    
    public function update(Request $request) {
         session([
            'afterInsert'=> $request->afterInsert,
            'afterEdit' => $request->afterEdit
        ]);
        return  back()->with(['message' => 'Your change have been saved.']);
    }
}
