<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    function view_login(){
        return view('auth.login');
    }

    function test(){
        //Auth::logout();
        return auth()->user()->id;
        return redirect()->to("/");
    }

    function login(){
        $r =  Validator::make(request()->data, [
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:2'],

        ]);
        if ($r->fails()) {
            return response()->json([$r->errors()],400);
        }

          $credentials = [
                'email' => request()->data['email'],
                'password' =>request()->data['password'],
            ];

            if(Auth::attempt($credentials) ==1){
                if(Auth::check()){

                }else{
                    return response()->json(["object"=>"error"],400);
                }

            }
            else{
                return response()->json(["object"=>"error"],400);
            }
    }
}
