<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Order
 *
 * @property $id
 * @property $user_id
 * @property $products
 * @property $total
 * @property $phone
 * @property $street
 * @property $num
 * @property $colonia
 * @property $city
 * @property $state
 * @property $postcode
 * @property $country
 * @property $paymentmethod
 * @property $status
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Order extends Model
{
    
    static $rules = [
		'user_id' => 'required',
		'products' => 'required',
		'total' => 'required',
		'phone' => 'required',
		'street' => 'required',
		'num' => 'required',
		'colonia' => 'required',
		'city' => 'required',
		'state' => 'required',
		'postcode' => 'required',
		'country' => 'required',
		'paymentmethod' => 'required',
		'status' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id','products','total','phone','street','num','colonia','city','state','postcode','country','paymentmethod','status'];



}
