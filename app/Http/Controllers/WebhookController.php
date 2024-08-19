<?php

namespace App\Http\Controllers;

use App\Enums\OrderStatus;
use App\Models\Order;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Webhook;

class WebhookController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));
        $signature = $_SERVER['HTTP_STRIPE_SIGNATURE'];
        $payload = @file_get_contents('php://input');
        $event = null;
        try {
            $event = Webhook::constructEvent($payload, $signature, env('STRIPE_WEBHOOK_SECRET'));
        } catch(\UnexpectedValueException $e) {
            // Invalid payload
            return response(["invalidPayloadErr" => $e], 400);
        } catch (\Stripe\Exception\SignatureVerificationException $e) {
            // Invalid signature
            return response(["invalidSigErr" => $e], 400);
        }

        if($event->type === 'checkout.session.completed') {
            $data = $event->data['object'];
            $order_id = $data->metadata['order_id'];
            $order = Order::find($order_id);
            $order->status = OrderStatus::COMPLETED;
            $order->save();
        }else if($event->type === 'checkout.session.failed') {
            $data = $event->data['object'];
            $order_id = $data->metadata['order_id'];
            $order = Order::find($order_id);
            $order->status = OrderStatus::FAILED;
            $order->save();
        } else if($event->type === 'checkout.session.expired') {
            $data = $event->data['object'];
            $order_id = $data->metadata['order_id'];
            $order = Order::find($order_id);
            $order->status = OrderStatus::FAILED;
            $order->save();
        } else if($event->type === 'checkout.session.canceled'){
            $data = $event->data['object'];
            $order_id = $data->metadata['order_id'];
            $order = Order::find($order_id);
            $order->status = OrderStatus::CANCELED;
            $order->save();
        }

        http_response_code(200);
    }
}
