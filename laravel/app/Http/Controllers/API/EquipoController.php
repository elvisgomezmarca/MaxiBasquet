<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Auth\Controller;
use Illuminate\Http\Request;
use App\Models\Equipo;
use Illuminate\Support\Facades\DB;
class EquipoController extends Controller
{
    public function show()
    {
        $equipo = Equipo::All();
        return $equipo;


    }
    public function showOrden()
    {
//        $equipo = Equipo::All();
//        return $equipo;

//        $equipo1 = DB::table('equipos')->orderBy('puntos','asc');
//        return $equipo1;

        $equipo = Equipo::orderby('puntos','desc')->get();
        return $equipo;
    }


}
