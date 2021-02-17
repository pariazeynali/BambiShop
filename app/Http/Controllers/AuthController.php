<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{

    protected function login_validate(Request $request){

        $this->validate($request,[
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
    }
    public function login(Request $request)
    {
        $this->login_validate($request);

        $user=DB::table('customer')->where('username','=' , $request->username)->get()->first();
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
        $this->guard()->login();
        $request->session()->invalidate();
        return redirect('/');

    }
}
