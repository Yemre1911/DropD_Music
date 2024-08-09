<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $fillable = [
        'variant_id',
        'quantity',
    ];

    /**
     * Get the variant associated with the stock.
     */
    public function variant()
    {
        return $this->belongsTo(TshirtVariant::class, 'variant_id');
    }


}
