<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $filable =['productname','company','price','count','kind_id','type_id','skintypeid','pic'];
    use HasFactory;
}
