<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'model',
        'price',
        'sale',
        'brand',
        'type',
        'symmetry',
        'features',
        'product_code',
        'stock',
        'color',
        'main_image',
        'image1',
        'image2',
        'image3',
        'image4',
    ];

    public function comments()
{
    return $this->hasMany(Comment::class);
}


}
