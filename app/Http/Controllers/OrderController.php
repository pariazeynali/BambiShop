<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Customer;
use App\Models\Order;
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
            'national_id' =>'required|numeric|max:11|min:9',
            'phone_number'=>'required|numeric|max:12|min:10',
            'province'=>'required',
            'city'=>'required',
            'postcode'=>'required|numeric',
            'address'=>'required'
        ]);

        $customer = Customer::create(
            [
                'fname' => $request->fname,
                'lname' => $request->lname,
                'national_id' => $request->national_id,
                'phone_number' => $request->phone_number,
                'province' => $request->province,
                'city' => $request->city,
                'postcode' => $request->postcode,
                'address' => $request->address,
                'user_id' => $request->user()->id
            ]
        );

        $request->user()->update(['customer_id'=>$customer->id]);

       return response()->json(['flag' =>true,'message'=>'خرید شما با موفقیت ثبت شد']);

    }

    public function showOredre($id)
    {
        $order=DB::table('orders')
            ->join('products','product.id','=','orders.product_id')
            ->select('products.productname','products.company','products.price','products.pic')
            ->where('order.id','=',$id)
            ->get();
        return response()->json($order);

    }

    public function MoveCartToOrder(Request $request){
        $carts = Cart::where('user_id',$request->user()->id);

        foreach ($carts->get() as $cart){
            Order::create([
                'product_id' => $cart->product_id,
                'user_id' => $request->user()->id
            ]);
        }

        $carts->delete();
    }
}
