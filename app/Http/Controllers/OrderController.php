<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function addAddress(Request $request)
    {
        $validated = $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'phone_number'=>'required|numeric|min:10',
            'province'=>'required',
            'city'=>'required',
            'postcode'=>'required|numeric',
            'address'=>'required'
        ]);
        $user = User::where('username',$request->username);

        $customer = Customer::create(
            [
                'fname' => $request->fname,
                'lname' => $request->lname,
                'phone_number' => $request->phone_number,
                'province' => $request->province,
                'city' => $request->city,
                'postcode' => $request->postcode,
                'address' => $request->address,
                'user_id' => $user->first()->id,
            ]
        );

        $user->update(['customer_id'=>$customer->id]);

       return response()->json(['flag' =>true,'message'=>'خرید شما با موفقیت ثبت شد']);

    }

    public function showOredre($id)
    {
        $order=DB::table('orders')
            ->join('products','product.id','=','orders.product_id')
            ->select('products.productname','products.company','products.price','products.pic')
            ->where('order.user_id','=',$id)
            ->get();
        return response()->json($order);

    }

    public function MoveCartToOrder(Request $request){
        $user = User::where('username',$request->username)->first();

        $carts = Cart::where('user_id',$user->id);

        foreach ($carts->get() as $cart){

            $product = Product::find($cart->product_id);
            $product->count = $product->count -1 ;
            $product->save();

            Order::create([
                'product_id' => $cart->product_id,
                'user_id' => $request->user()->id
            ]);
        }

        $carts->delete();
    }
}
