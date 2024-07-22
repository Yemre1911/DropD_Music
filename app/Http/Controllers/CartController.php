<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use App\Models\Brand;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cart = Auth::user()->cart;
        $products = Product::all();
        $brands = Brand::all();
        return view('cart')->with('brands', $brands)->with('products', $products)->with('cart', $cart);
    }

    public function add(Request $request)
    {
        $cart = Auth::user()->cart ?? Cart::create(['user_id' => Auth::id()]);  // kullanıcının bir sepeti varsa al, yoksa yeni bir tane oluştur ve onu al (sepetin user id kısmına kullanıcının user id sini yazdır)

        $cartItem = $cart->items()->where('product_id', $request->product_id)->first();
        // sepetin içindeki ürünleri kontrol et, ürünID sine göre
        if ($cartItem) {
            $cartItem->update(['quantity' => $cartItem->quantity + 1]);
        } else {
            CartItem::create([
                'cart_id' => $cart->id,
                'product_id' => $request->product_id,
                'quantity' => 1,
            ]);
        }

        return redirect()->route('cart_page');
    }

    public function remove(Request $request)
    {
        $cartItem = CartItem::find($request->item_id);

        if ($cartItem) {
            $cartItem->delete();
        }

        return response()->json(['success' => true]);
    }
}
