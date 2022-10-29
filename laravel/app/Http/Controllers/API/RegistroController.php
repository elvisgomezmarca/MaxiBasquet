<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Registro;

class RegistroController extends Controller
{
    public function store(Request $request){
        //dd($request);
        $registro = new Registro;
        $registro->email = $request->input('email');
        $registro->password = $request->input('password');
        $registro->name = $request->input('name');
        $registro->apellido = $request->input('apellido');
        $registro->rol = $request->input('rol');
        $registro->nacionalidad = $request->input('nacionalidad');
        $registro->sexo = $request->input('sexo');
        $registro->edad = $request->input('edad');

        $registro->save();

        return response()->json([
            'status' => 200,
            'message'=> 'se aniadido estudiante exitosamente',
        ]);
    }
}
