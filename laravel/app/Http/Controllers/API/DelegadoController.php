<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Delegado;
use Illuminate\Support\Facade\file;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DelegadoController extends Controller
{
    public function index($id)
    {
        $delegado = Delegado::find($id);
        return $delegado;
    }
    public function store(Request $request){
        //dd($request);
        $delegado = new Delegado;
        $delegado->name = $request->input('name');
        $delegado->apellido = $request->input('apellido');
        $delegado->ci = $request->input('ci');
        $delegado->fechaNac = $request->input('fechaNac');
        $delegado->foto = $request->input('foto');

         //---------Guardar Imagen -------
        $sol_filename=(string)Str::uuid();
        if($request->hasFile("foto")){
            $file=$request->file("foto");
            $name_sol = $sol_filename.".".$file->guessExtension();
                        //$ruta = public_path("pdf/".$name_sol);
            if($file->guessExtension()=="png" || "jpg"){
                $request->file('foto')->storeAs('/public/imagenes/' , $name_sol);
                $delegado->foto =  $name_sol;
                //copy($file, $ruta);
            }else{
                dd("NO ES UN PNG");
            }
        }


        $delegado->save();

    }

    public function show(){
        $delegado = Delegado::All();
        return $delegado;


    }

    public function update(Request $request, $id){

        $delegado = Delegado::find($id);
        $delegado -> update($request->all());
    }

    public function destroy( $id){
        $delegado = Delegado::destroy($id);
        return $delegado;
    }
}
