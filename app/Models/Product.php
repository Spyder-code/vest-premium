<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'type',
        'description',
        'price',
        'stock'
    ];

    public function product_behaviors()
    {
        return $this->hasMany(ProductBehavior::class);
    }
}
