<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getCategory($id)
    {
        if ($id == 1){
            return response()->json('this is one');
        }elseif ($id ==2) {
            return response()->json('this is 2');
        }else{
            return response()->json('this is 3');
        }
    }

    public function home()
    {
        return 'slam';
    }
}
