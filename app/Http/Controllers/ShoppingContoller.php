<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShoppingContoller extends Controller
{
    public function addToCart(Request $request)
    {
        $user = User::where('username',$request->username);
        $validated = $request->validate([
            'product_id' => 'integer|exists:products,id',
        ]);

        Cart::create([
            'product_id' => $request->product_id,
            'user_id' => $request->user()->id,
        ]);
        return response()->json(['flag'=>true,'message'=>'با موفقیت در سبد خرید اضافه شد']);

    }

    protected function showCart(Request $request)
    {
       $user = User::where('username',$request->username);
       $cart=DB::table('products')->join('carts','products.id','=','carts.product_id')->
       select('products.productname','products.company','products.price','products.pic')->
       where('carts.user_id','=',$user->id)->get();
        return response()->json($cart);

    }
}
