<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Conekta\Conekta;

class PagoController extends Controller
{
    public function procesarPagoOXXO(Request $request)
    {
        
        return response()->json('xxxxxx');
        
        /*try {
            //code...
            Conekta::setApiKey(config('services.conekta.secret'));

            // Lógica para crear la orden de pago y obtener la URL de pago OXXO
            $orden = Conekta\Order::create([
                'line_items' => [
                    [
                        "name" => "Tacos",
                        "price" => 250,
                        "cantidad" => 5
                    ]
                ], // Detalles de la orden
                'currency' => 'MXN',
                'charges' => [[
                    'payment_method' => [
                        'type' => 'oxxo_cash',
                    ],
                ]],
            ]);

            // Redirigir al usuario a la URL de pago OXXO
            return redirect()->route('cart.list');

            
        } 
        catch (\Conekta\ParameterValidationError $error){
            echo $error->getMessage();
        } catch (\Conekta\Handler $error){
            echo $error->getMessage();
        }*/
        }
}
