<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $user=DB::table('customer')->where('username','=' , $request->email)->get()->first();
        if(!$user) {
            Session::flash('user.login', 'user not found');
            return redirect()->route('login');
        }

        $credentials = $request->only('username', 'password');

        if(Auth::attempt($credentials)) {
            // Auth::login($user, true);
            return redirect()->intended('dashboard');
        } else {
            Session::flash('user.login', 'invalid password');
            return redirect()->route('login');
        }


    }

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function logout(Request $request){

    }
}
