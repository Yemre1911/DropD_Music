<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Order;
use App\Models\OrderItem;

use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function index()
    {
        $cart = Auth::user()->cart;
        $products = Product::all();
        $brands = Brand::all();

        $cartItems = $cart ? $cart->items : collect();

        foreach($cartItems as $item)
        {
            if($item->product->stock==0)
            {
                return $this->outOfStock();
            }
        }

        return view('payment')->with('brands', $brands)->with('products', $products)->with('cart', $cart);
    }

    public function payment(Request $request)
    {
        $request->validate([
            /*
            'firstname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'zip' => 'required|string|max:8|confirmed',
            'cardname' => 'required|string|max:20',
            'cardnumber' => 'required|string|max:20',
            'expmonth' => 'required|string|max:20',
            'expyear' => 'required|string|max:20',
            'cvv' => 'required|string|max:3',*/
            'state' => 'required|string|max:255',

        ]);

        $order_no = $this->generateUniqueOrderCode();

        $user = Auth::user();

        $cart = Auth::user()->cart;
        $cartItems = $cart ? $cart->items : collect();

        $totalAmount=0;

        foreach($cartItems as $item)
        {
            if($item->product->stock==0)
            {
                return $this->outOfStock();
            }
            $totalAmount = $totalAmount + $item->product->price * $item->quantity;      // total tutarı hesapladım
        }

        $order = Order::create([

            'order_no' => $order_no,
            'total_amount' => $totalAmount,
            'statue' => 'pending',
            'location' => $request->state,
            'user_id' => $user->id,

        ]);

        foreach ($cartItems as $cartItem) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $cartItem->product_id,
                'quantity' => $cartItem->quantity,
                'price' => $cartItem->product->price,
            ]);

            $product = $cartItem->product;
            $product->stock -= $cartItem->quantity; // stoktan düşüyorum
            $product->save();
        }

        $cartItems->each->delete();

        return redirect()->route('anasayfa')->with('message', 'Siparişiniz başarıyla oluşturuldu.');


    }

    private function generateUniqueOrderCode()
    {
        do {
            $code = '#' . str_pad(mt_rand(0, 9999999), 7, '0', STR_PAD_LEFT);
        } while (Order::where('order_no', $code)->exists());

        return $code;
    }

    private function outOfStock()
    {
        return redirect()->route('cart_page')->withErrors(['message' => 'Seçtiğiniz ürünlerden biri stokta yok. Lütfen sepetinizi kontrol edin.']);

    }
}
