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
        //$squema = $d->getTypeInput('users');
        return response()->json(["data"=>$u]);
    }
}
