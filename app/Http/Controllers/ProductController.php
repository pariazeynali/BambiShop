<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create(Request $request){

        $request->validate([
            'productname' => 'required',
            'company'     => 'required',
            'price'       => 'required|numeric',
            'count'       => 'required|numeric',
        ]);

        $product =Product::create($request->except('_token'));
        dd($product);

    }
}
