<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    protected $fillable = ['cart_id', 'product_id', 'quantity'];

    public function cart()
    {
        return $this->belongsTo(Cart::class);   // bu fonksiyon bu modelin Cart modeline ait olduğu ilişkisini gösteriyor
    }                                           // her item bir sepetin içindedir

    public function product()
    {
        return $this->belongsTo(Product::class);    // aynı şekilde ürün için de
    }
}
