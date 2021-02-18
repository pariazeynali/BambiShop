<?php

namespace App\Http\Controllers;

use Dotenv\Validator;
use http\Client\Curl\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Array_;
use function GuzzleHttp\Promise\all;

class AuthController extends Controller
{

    public function signUp(Request $request)
    {

    }
}
