<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{

    public function product($id)
    {
        $product = DB::table('products')->where('id','=',$id)->get();
        return response()->json($product);
    }

    public function category()
    {
        $product = DB::table('products')->get();
        return response()->json($product);
    }


    public function product_kind($cat)
    {
        $kind_id = DB::table('kind')->where('kind',$cat)->value('id');
        $product = DB::table('products')->where('kind_id', '=', $kind_id)->get();
        return response()->json($product);
    }

    public function product_skintype($skin){
        $skintypeid =DB::table('skintype')->where('skintype',$skin)->value('id');
        $product = DB::table('products')->where('skintypeid', '=', $skintypeid)->get();
        return response()->json($product);
    }
}
