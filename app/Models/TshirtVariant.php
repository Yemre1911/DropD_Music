<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TshirtVariant extends Model
{
    use HasFactory;

    protected $fillable = [
        'tshirt_id',
        'size',
        'color',
        'additional_price',
        'image_path',
    ];

    // İlişki tanımlamaları
    public function tshirt()
    {
        return $this->belongsTo(Tshirt::class);
    }

    public function stock()
    {
        return $this->hasOne(Stock::class, 'variant_id');
    }
}
