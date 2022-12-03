<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    public function cartList()
    {
        $cartItems = \Cart::getContent();
        $i = 0;
        // dd($cartItems);
        return view('cart', compact(['cartItems','i']));
    }

    public function cartModel()
    {
        $modelCartItems = \Cart::getContent();
        $i = 0;
        // dd($cartItems);
        return view('layouts.app', compact(['modelCartItems','i']));
    }

   

    public function checkOut()
    {
        $checkoutItems =  \Cart::getContent();
        return view('checkout', compact('checkoutItems'));
    }


    public function addToCart(Request $request)
    {
        \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->image,
            )
        ]);
        session()->flash('success', 'Product is Added to Cart Successfully !');
        
        echo "
        <script>
        let text = 'Ir al Carrito de Compras?';
        if (confirm(text) == true) {
            location.replace('/cart')
        } else {
            location.replace('/store')
        
        }
        document.getElementById('demo').innerHTML = text;
        </script>
        ";

    }

    public function updateCart(Request $request)
    {
        \Cart::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );

        session()->flash('success', 'Item Cart is Updated Successfully !');

        return redirect()->route('cart.list');
    }

    public function removeCart(Request $request)
    {
        \Cart::remove($request->id);
        session()->flash('success', 'Item Cart Remove Successfully !');

        return redirect()->route('cart.list');
    }

    public function clearAllCart()
    {
        \Cart::clear();

        session()->flash('success', 'All Item Cart Clear Successfully !');

        return redirect()->route('cart.list');
    }
}
