<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Clases\Frontend\Input;
use App\Clases\Frontend\permissios_admin;
use Illuminate\Support\Facades\Validator;
use App\Models\General\Permissions;
use App\Models\General\User_permissions;

class PermissionsController extends Controller
{
    //
    public function view_permissions()
    {
        $d = new  Input();
        $model = new Permissions();
        $squema = $d->getTypeInput($model);
        return view('auth.permissions',['squemas' => $squema]);
    }

    public function view_permissions_user()
    {
        $d = new  Input();
        $model = new User_permissions();
        $squema = $d->getTypeInput($model);

        return view('auth.permissions_user',['squemas' => $squema]);
    }

    function validator_permissions(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255','unique:permissions,name'],
            'description' => ['required', 'string', 'max:255'],
            'status' => ['required', 'string'],
        ]);
    }

    function validator_permissions_user_get(array $data)
    {
        return Validator::make($data, [
            'id_user' => ['required', 'integer','exists:users,id'],
        ]);
    }

    function validator_permissions_user_insert(array $data)
    {
        return Validator::make($data, [
            'id_user' => ['required', 'integer','exists:users,id'],
            'id_permissions' => ['required', 'integer','exists:permissions,id'],
        ]);
    }

    public function create()
    {
        $r = $this->validator_permissions(request()->data);
        if ($r->fails()) {
            return response()->json([$r->errors()],400);
        }

        $p = new Permissions();
        $p->name = request()->data['name'];
        $p->description = request()->data['description'];
        if(isset(request()->data['status']))
        $p->status = true;
        else $p->status = false;
        return $p->save();
    }

    public function getPermissions()
    {
        $d = new Input();
        $p = Permissions::all();
        $data = $d->getDataAll('permissions',$p);
        return response()->json(["data"=>$data]);
    }

    public function getPermissions_user()
    {
        $r = $this->validator_permissions_user_get(request()->data);
        if ($r->fails()) {
            return response()->json([$r->errors()],400);
        }
        $d = new Input();
        $p = User_permissions::where('id_user',request()->data['id_user'])->get();
        return response()->json(["data"=>$d->getDataAll('user_permissions',$p)]);
    }

    public function insert_permissions_user(){
        $r = $this->validator_permissions_user_insert(request()->data);
        if ($r->fails()) {
            return response()->json([$r->errors()],400);
        }
        $u = new User_permissions();
        $u->id_permissions = request()->data['id_permissions'];
        $u->id_user = request()->data['id_user'];
        return $u->save();
    }

    public function dataTest(){
        $d = new permissios_admin();
        return response()->json($d->getStatusPermission(2,2));
    }
}
