<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Auth\Controller;
use App\Models\Partidos;
use Illuminate\Http\Request;

class RolPartidosController extends Controller
{
    public function show()
    {
        $partido = Partidos::All();
        return $partido;


    }
    public function Store(Request $request)
    {
        $partido = new Partidos();
        $partido->equipo1 = $request->input('equipo1');
        $partido->equipo2 = $request->input('equipo2');
        $partido->hora = $request->input('hora');
        $partido->fecha = $request->input('fecha');
        $partido->save();

    }


}
