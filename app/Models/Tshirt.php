<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tshirt extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'brand',
        'description',
        'base_price',
        'sale',
    ];

    public function variants()
    {
        return $this->hasMany(TshirtVariant::class);
    }
}
