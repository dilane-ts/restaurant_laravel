<?php

namespace App\Http\Controllers\Product;

use App\Actions\Product\GetCartAction;
use App\Actions\User\StoreUserAction;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use App\Services\StripeService;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $request->validate([
           'firstname' => 'required',
           'lastname' => 'required',
           'email' => 'required',
           'shipping_address' => 'required',
        ]);

        $cart = (new GetCartAction())(session()->get('cart'));
        $total = collect($cart)->reduce(function ($carry, $item) {
            return $carry + $item->product->price * $item->quantity;
        }, 0);

        $email = $request->input('email');
        $user = User::where('email', $email)->first();
        if(!$user){
            $name = $request->input('firstname'). ' '. $request->input('lastname');
            $user = (new StoreUserAction())($email, $name);
        }
        $order = Order::query()
            ->create([
                'user_id' => $user->id,
                'amount' => $total
            ]);
        $order->products()->attach($cart->map(fn($item) => $item->product_id));

        // create checkout session
        $session = (new StripeService())->checkout($cart->toArray(), $order);
        return redirect($session->url);
    }
}
