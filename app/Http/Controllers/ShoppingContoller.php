<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShoppingContoller extends Controller
{
    public function addToCart(Request $request)
    {
        $user = $request->user();

    }

    public function add($id)
    {

    }
}
