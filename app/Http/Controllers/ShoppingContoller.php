<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShoppingContoller extends Controller
{
    public function addToCart(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'integer|exists:products,id',
        ]);

        Cart::create([
            'product_id' => $request->product_id,
            'user_id' => $request->user()->id,
        ]);
        return response()->json(['flag'=>true,'message'=>'با موفقیت در سبد خرید اضافه شد']);

    }

    protected function showCart($id)
    {
       $cart=DB::table('products')->join('carts','products.id','=','carts.product_id')->
       select('products.productname','products.company','products.price','products.pic')->
       where('carts.id','=',$id)->get();
        return response()->json($cart);

    }
}
