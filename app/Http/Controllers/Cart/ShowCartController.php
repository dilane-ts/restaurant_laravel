<?php

namespace App\Http\Controllers\Cart;

use App\Actions\Product\GetCartAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ShowCartController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $cart = (new GetCartAction())(Session::get('cart'));
        $total = $cart->sum(function ($item) {
            return $item->quantity * $item->product->price;
        });
        return view('product.cart', [
            'cart' => $cart,
            'total' => $total
        ]);
    }
}
