<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\PaymentIntent;

use App\Order;

class PaymentController extends Controller
{
    public function gateway()
    {        
        return view('pago');
    }

    public function session($id)
    {
        \Stripe\Stripe::setApiKey(config('stripe.sk'));

        $order = Order::find($id);
 
        $session = \Stripe\Checkout\Session::create([
            'line_items'  => [
                [
                    'price_data' => [
                        'currency'     => 'MXN',
                        'product_data' => [
                            "name" => "Pedido: #" . $order->id,
                        ],
                        'unit_amount'  => $order->total*100,
                    ],
                    'quantity'   => 1,
                ],
                 
            ],
            'mode'        => 'payment',
            'success_url' => route('success', $order->id),
            'cancel_url'  => route('gateway'),
        ]);
 
        return redirect()->away($session->url);
    }

    public function success($id)
    {   
        $order = Order::find($id);
        $order->status = "Pagado";
        $order->save();

        return redirect()->back();
    }
}
