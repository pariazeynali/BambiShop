<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getCategory($id)
    {
        if ($id == 1){
            return 'زژ لب';
        }elseif ($id ==2) {
            return 'کرم';
        }else{
            return 'عریف نشده';
        }
    }
}
