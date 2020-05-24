<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\General\User_permissions;
use App\Models\Main\Main;
use App\Clases\Frontend\Input;
use Illuminate\Support\Facades\Validator;
use stdClass;


class MainController extends Controller
{
    //
    function view_menu_admin(){
        $d =  new Input();
        $model = new Main();
        $menu = Main::where('section',1)->get();
        $a = [];
        foreach($menu as $key => $value) {
            if($value->section == 1){
                $o = new stdClass();
                $o = $value;
                $o->children = $this->getChildren($value->id);
                array_push($a,$o);
            }

        }
        $squema = $d->getTypeInput($model);
        return view('main.index',['squemas' => $squema,"main"=>$a]);
    }

    function getChildren($id){
        $sa =  Main::where('father',$id)->get();
        $a = [];
        foreach ($sa as $key => $value) {
            $o = new stdClass();
            $o = $value;
            $o->children = $this->getChildren($value->id);
            array_push($a,$o);
        }
        return $a;
    }

    function validator_main(array $data)
    {
        return Validator::make($data, [
            'url' => ['required', 'string','unique:mains,url'],
            'section' => ['required', 'string', 'max:255'],
            'father' => ['required', 'string'],
            'group' => ['required', 'string'],
            'incono' => ['required', 'string'],
            'description' => ['required', 'string'],
            'note' => ['required', 'string'],
        ]);
    }

    function register(){
        $r = $this->validator_main(request()->data);
        if ($r->fails()) {
            return response()->json([$r->errors()],400);
        }
        $m = new Main();
        $m->url =request()->data['url'];
        $m->section =request()->data['section'];
        $m->father  =request()->data['father'];
        $m->group  =request()->data['group'];
        $m->incono =request()->data['incono'];
        $m->description  =request()->data['description'];
        $m->note   =request()->data['note'];
        $m->save();
    }

    function getMenuMains(){
        $m = Main::all();
        $d =  new Input();
        return response()->json(["data"=>$d->getDataAll('mains',$m)]);
    }

    function getSection(){
        $m = Main::where('section',1)->get();
        $f = Main::where('section',"!=",1)->where('father','!=',0)->get();
        return response()->json(["object"=>"success",
        "data"=>["section"=>$m,"father"=>$f]
        ]);
    }
}
