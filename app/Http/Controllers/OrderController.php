<?php

namespace App\Http\Controllers;

use App\Order;
use App\Orderproduct;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Auth;

use App\Mail\Correo;
use Illuminate\Support\Facades\Mail;

/**
 * Class OrderController
 * @package App\Http\Controllers
 */
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();
        $i = 0;

        return view('order.index', compact('orders'))
            ->with('i', $i);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $order = new Order();
        return view('order.create', compact('order'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Order::$rules);

        $order = Order::create($request->all());

        foreach (\Cart::getContent() as $item) {
            # code...
            $orderProducts = new Orderproduct;
            $orderProducts->id_order = $order->id;
            $orderProducts->id_products = $item->id;
            $orderProducts->save();
        }

        /*foreach (\Cart::getContent() as $value) {
            # code...
            $decrement = Product::find($value->id);
            $decrement->decrement('cantidad', $value->quantity);
        }*/

        /*$to = $request->user();
        $subject = "Resumen de Pedido: #" . $order->id;
        $content = $order->products;
        $id = $order->id;
        
        Mail::send(new Correo($to, $subject, $content, $id));*/

        CartController::clearAllCart();

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::find($id);
        $orderResume = Orderproduct::all()->where('id_order',$id);

        if (!$order) {
            return view('home');
        }

        return view('order.show', compact('order','orderResume'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::find($id);

        return view('order.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Order $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        request()->validate(Order::$rules);

        $order->update($request->all());

        return redirect()->route('orders.index')
            ->with('success', 'Order updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $order = Order::find($id)->delete();

        return redirect()->route('orders.index')
            ->with('success', 'Order deleted successfully');
    }

    public function print($id)
    {

            # code...
            $order = Order::find($id);

            $data = [
                'order' => $order
            ];
        
            return \PDF::loadView('order.pdf', $data)
                ->stream('Pedido_'.$order->id.'.pdf');
                

    }
}
