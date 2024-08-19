<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class DestroyCartProductController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Product $product)
    {
        $cart = $request->session()->get('cart', []);
        $cart = array_filter($cart, function ($item) use($product) {
            return $item['product_id'] !== $product->id;
        }, ARRAY_FILTER_USE_BOTH);
        $request->session()->put('cart', $cart);
        return redirect()->route('cart');
    }
}
