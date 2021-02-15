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

    public function lipstick()
    {
        $product = DB::table('product')->where('kindid','=',1)->get();
        return $product;

    }
    public function mascara()
    {
        $product = DB::table('product')->where('kindid','=',2)->get();
        return $product;
    }

    public function cream()
    {
        $product = DB::table('product')->where('kindid','=',3)->get();
        return $product;
    }

    public function nailpolish()
    {
        $product = DB::table('product')->where('kindid','=','4')->get();
        return $product;
    }

    public function lotion()
    {
        $product = DB::table('product')->where('kindid','=','5')->get();
        return $product;
    }

    public function sunscream()
    {
        $product = DB::table('product')->where('kindid','=','2')->get();
        return $product;
    }

    public function facewash()
    {
        $product = DB::table('product')->where('kindid','=','7')->get();
        return $product;
    }

    public function oily()
    {
        $product = DB::table('product')->where('skintypeid','=','1')->get();
        return $product;
    }

    public function dry()
    {
        $product = DB::table('product')->where('skintypeid','=','2')->get();
        return $product;
    }

    public function normal()
    {
        $product = DB::table('product')->where('skintypeid','=','3')->get();
        return $product;
    }

}
