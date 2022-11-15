<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Auth\Controller;
use Illuminate\Http\Request;
use App\Models\Registro;
//use Illuminate\Support\Facade\file;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RegistroController extends Controller
{
    public function index()
    {
        $registro = Registro::all();
        return $registro;
    }

    public function store(Request $request){
        $registro = new Registro;
        $registro->codigo = $request->input('codigo');
        $registro->rol = $request->input('rol');
        $registro->email = $request->input('email');
        $registro->ci = $request->input('ci');

        $registro->save();

        return response()->json([
            'status' => 200,
            'message'=> 'se aniadio el registro exitosamente',
        ]);
    }

    public function show($id)
    {
        $registro = Registro::find($id);
        return $registro;
    }

    public function destroy($id)
    {
        $registro = Registro::destroy($id);
        return $registro;
    }
}
