<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Clases\Frontend\Input;

class RegisterController extends Controller
{

    public function __construct()
    {
        //$this->middleware('guest');
    }

    public function view_register()
    {
        $d = new  Input();
        $user = new User();
        $squema = $d->getTypeInput($user);
        return view('auth.register',['squemas' => $squema]);
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */


     function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    public function create()
    {


        $r = $this->validator(request()->data);
        if ($r->fails()) {
            return response()->json([$r->errors()],400);
        }


        return User::create([
            'first_name' =>request()->data['first_name'],
                'last_name' => request()->data['last_name'],
                'email' => request()->data['email'],
                'google_id'=> request()->data['google_id'],
                'password' => request()->data['password']
        ]);
    }
}
