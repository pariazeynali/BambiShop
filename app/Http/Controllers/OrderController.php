<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function addInfo(Request $request)
    {
        $validated = $request->validate([
            'fname' => 'required',
            'lname' => 'required|confirmed',
            'national_id' =>'required|numeric',
            'phone_number'=>'required|numeric',
            'province'=>'required',
            'city'=>'required',
            'postcode'=>'required|numeric',
            'address'=>'required'
        ]);

        $user = Customer::create(
            [
                'fname' => $request->fname,
                'lname' => $request->lname,
                'national_id' => $request->national_id,
                'phone_number' => $request->phone_number,
                'province' => $request->province,
                'city' => $request->city,
                'postcode' => $request->postcode,
                'address' => $request->address,
            ]
        );

    }
}
