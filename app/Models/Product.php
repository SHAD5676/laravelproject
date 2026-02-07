<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'image',
        'sku',
        'details',
        'category_id',
        'stock'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
   }

}
