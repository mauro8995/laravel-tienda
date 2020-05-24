<?php
namespace App\Clases\Frontend;

use Illuminate\Support\Facades\DB;
use App\Models\General\User_permissions;
use stdClass;


class permissios_admin
{
    function getPermission($id_user){
        $d = User_permissions::where('id_user',$id_user)->get();
        return $d;
    }
    function getStatusPermission($id_permissions,$id_user){
        $respuesta = false;
        if(User_permissions::where('id_user',$id_user)->where('id_permissions',$id_permissions)->exists()){
            return true;
        }
        return $respuesta;
    }


}
