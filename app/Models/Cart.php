<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = ['user_id'];  // toplu atamaya izin verildi

    public function user()
    {
        return $this->belongsTo(User::class);   // bu metot cart modelinin user modeliyle ilişkili olduğunu gösterir
    }                                           // bir sepet bir kullanıcıya ait olmuş oluyor



    public function items()                     // bu metot cart modelinin CartItem modeliyle ilişkili olduğunu gösterir
    {
        return $this->hasMany(CartItem::class); //bir sepetin bir çok sepet üyesi-ürünü vardır
    }
}
