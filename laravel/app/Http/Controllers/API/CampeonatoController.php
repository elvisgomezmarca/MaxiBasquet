<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Auth\Controller;
use App\Models\Campeonato;
use Illuminate\Http\Request;

class CampeonatoController extends Controller
{
    public function index($id)
    {
        $campeonato = Campeonato::find($id);
        return $campeonato;
    }

    public function store(Request $request)
    {
        $campeonato = new Campeonato;
        $campeonato->nombre = $request->input('nombre');
        $campeonato->fechaInicio = $request->input('fechaInicio');
        $campeonato->fechaFin = $request->input('fechaFin');
        $campeonato->categoria = $request->input('categoria');
        $campeonato->save();

    }

    public function show()
    {
        $campeonato = Campeonato::All();
        return $campeonato;
    }

    public function update(Request $request, $id)
    {
        $campeonato = Campeonato::find($id);
        $campeonato -> update($request->all());
    }

    public function destroy( $id)
    {
        $campeonato = Campeonato::destroy($id);
        return $campeonato;
    }
}
