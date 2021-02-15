<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function getCategory($id)
    {
        if ($id == id) {
            $product = DB::table('product')->where('id', '=', id)->get();
            dd($product);
        } elseif ($id == 2) {
            $product = DB::table('product')->where('id', '=', '2')->get();
            dd($product);
        } elseif ($id == 3) {
            $product = DB::table('product')->where('id', '=', '3')->get();
            dd($product);
        }
    }

    public function category()
    {
        while (1) {

            $product = DB::table('product')->get();
            return $product;
        }
    }

    public function home()
    {
        return 'slam';
    }

    public function lipstick($cat)
    {
        $product = DB::table('product')->where('kindid', '=', $cat)->get();
        return response()->json($product);

    }
}
