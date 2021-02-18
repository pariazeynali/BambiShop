<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'productname',
        'company',
        'price',
        'count',
        'productinfo',
        'kind_id',
        'type_id',
        'skintypeid',
        'pic'
    ];
}
