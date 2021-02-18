<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{

    public function signUp(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|unique:users|max:255',
            'password' => 'required|confirmed'
        ]);

        $token = Str::random(60);

        $user = User::create(
            [
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'api_token' => hash('sha256', $token),
            ]
        );

        return response()->json(['token' => $token]);
    }

    public function signIn(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|unique:users|max:255',
            'password' => 'required'
        ]);

        $user = User::where('username',$request->username)->where('password',$request->password)->first();

        if ($user){
            $token = Str::random(60);
            $user->api_login = hash('sha256', $token);
            $user->update();
        }
    }
}
