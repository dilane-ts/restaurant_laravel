<?php

namespace App\Services;

use App\Models\Order;
use Stripe\Checkout\Session;
use Stripe\Stripe;

class StripeService
{
    public function __construct()
    {
        Stripe::setApikey(env('STRIPE_SECRET'));
        Stripe::setApiVersion('2024-06-20');
    }
    public function checkout($cart, Order $order): Session
    {
        return Session::create([
            'mode' => 'payment',
            'line_items' => array_map(function ($item) {
                return [
                    'price_data' => [
                        'currency' => 'usd',
                        'unit_amount' => $item->product->price * 100,
                        'product_data' => [
                            'name' => $item->product->name,
                            'description' => $item->product->description,
                            // 'images' => [url($item->product->image)]
                        ]
                    ],
                    'quantity' => $item->quantity,
                ];
            }, $cart),
            'metadata' => [
                'order_id' => $order->id,
            ],
            'success_url' => route('checkout.success'),
            'cancel_url' => route('checkout.cancel'),
        ]);
    }
}
