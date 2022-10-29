<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jugador;
use Illuminate\Support\Facade\file;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class JugadorController extends Controller
{
    public function index($id)
    {
        $jugador = Jugador::find($id);
        return $jugador;
    }
    public function store(Request $request){
        //dd($request);
        $jugador = new Jugador;
        $jugador->name = $request->input('name');
        $jugador->apellido = $request->input('apellido');
        $jugador->ci = $request->input('ci');
        $jugador->fechaNac = $request->input('fechaNac');
        $jugador->foto = $request->input('foto');

         //---------Guardar Imagen -------
        $sol_filename=(string)Str::uuid();
        if($request->hasFile("foto")){
            $file=$request->file("foto");
            $name_sol = $sol_filename.".".$file->guessExtension();
                        //$ruta = public_path("pdf/".$name_sol);
            if($file->guessExtension()=="png" || "jpg"){
                $request->file('foto')->storeAs('/public/imagenes/' , $name_sol);
                $jugador->foto =  $name_sol;
                //copy($file, $ruta);
            }else{
                dd("NO ES UN PNG");
            }
        }


        $jugador->save();

    }

    public function show(){
        $jugador = Jugador::All();
        return $jugador;


    }

    public function update(Request $request, $id){

        $jugador = Jugador::find($id);
        $jugador -> update($request->all());
    }

    public function destroy( $id){
        $jugador = Jugador::destroy($id);
        return $jugador;
    }
}
