<?php
namespace App\Clases\Frontend;

use Illuminate\Support\Facades\DB;
use App\Models\General\User_permissions;
use stdClass;
use App\Models\Main\Main;

class main_ad
{
    function getMain(){
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
        return $a;
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
}
