<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShoppingContoller extends Controller
{
    public function addToCart($id)
    {
        $product = DB::table('products')->where('id',$id)->get();
        $cart=Cart::create($product->all());
        return response()->json($cart);

    }
}
