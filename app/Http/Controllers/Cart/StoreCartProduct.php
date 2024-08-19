<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class StoreCartProduct extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Product $product)
    {
        $cart = $request->session()->get('cart');
        $cart = collect($cart);
        $item = $cart->search(fn($item) => $item['product_id'] === $product->id);
        if($item){
           $cart = $cart->map(function($cartItem) use ($product, $request) {
              if($cartItem['product_id'] === $product->id){
                  $cartItem['quantity'] += $request->input('quantity');
              }
              return $cartItem;
           });
        }else{
            $cart->push([
                'product_id' => $product->id,
                'quantity' => $request->input('quantity'),
            ]);
        }
        $request->session()->put('cart', $cart->toArray());
        return redirect()->route('cart');
    }
}
