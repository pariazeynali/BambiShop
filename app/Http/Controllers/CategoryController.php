<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{

    public function category()
    {
        while (1) {

            $product = DB::table('product')->get();
            return response()->json($product);
        }
    }


    public function product_kind($cat)
    {
        $kind_id = DB::table('kind')->where('kind',$cat)->first();
        $product = DB::table('product')->where('kind_id', '=', $kind_id)->get();
        return response()->json($product);
    }

    public function product_skintype($skin){
        $skintypeid=DB::table('skintype')->where('skintype',$skin)->first();
        $product = DB::table('product')->where('kind_id', '=', $skintypeid)->get();
        return response()->json($product);
    }
}
