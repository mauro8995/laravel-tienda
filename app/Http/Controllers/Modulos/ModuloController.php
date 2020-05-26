<?php

namespace App\Http\Controllers\Modulos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Clases\Frontend\main_ad;
use App\Models\General\Modulo;
use App\Clases\Frontend\Input;
use Illuminate\Support\Facades\Validator;

class ModuloController extends Controller
{
    //

    function view_modulo(){
        $menu = new main_ad();
        $model = new Modulo();
        $d =  new Input();
        $squema = $d->getTypeInput($model);
        return view('modulo/modulo',['squemas' => $squema,"main"=>$menu->getMain()]);
    }

    function register(){
        $r =  Validator::make(request()->data, [
            'name' => ['required', 'string', 'unique:modulos,name', 'max:255'],
            'description' => ['required', 'string', 'min:2'],

        ]);
        if ($r->fails()) {
            return response()->json([$r->errors()],400);
        }

        $m = new Modulo();
        $m->name = request()->data['name'];
        $m->description = request()->data['description'];
        $m->save();
        return response()->json(["object"=>"success", "message"=>"correctamente registrado"]);
    }

    function getModulo(){
        $d =  new Input();
        $m = Modulo::all();
        return response()->json(["object"=>"success", "data"=>$d->getDataAll('modulos',$m)]);
    }
}
