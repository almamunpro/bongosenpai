<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
    'name', 'description', 'price', 'category', 'stock_quantity', 'image_path',
];

}
