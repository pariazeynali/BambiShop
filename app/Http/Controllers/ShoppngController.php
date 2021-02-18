<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ShoppngController extends Controller
{
    public function add_to_cart(Request $request)
    {
        $product = $request->product();

    }
}
