<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Clases\Frontend\Input;
class UserController extends Controller
{

    public function getUsers()
    {
        $u = User::all();
        $d =  new Input();
        return response()->json(["object"=>"success", "data"=>$d->getDataAll('users',$u)]);
    }
}
