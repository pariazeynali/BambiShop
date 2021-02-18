<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShoppingContoller extends Controller
{
    public function addToCart(Request $request,$id)
    {
        $validated = $request->validate([
            'id' => 'number|exists:products,id',
        ]);

        Cart::create([
            'product_id' => $id,
            'user_id' => $request->user()->id,
        ]);
        return response()->json(['flag'=>true,'message'=>'با موفقیت در سبد خرید اضافه شد']);

    }

    protected function add($id)
    {
        $product = DB::table('products')->where('id',$id)->get();
        $cart=Cart::create($product->all());
        return $cart;

    }
}
