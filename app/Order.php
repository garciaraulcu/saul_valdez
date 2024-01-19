<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\orderProduct;

/**
 * Class Order
 *
 * @property $id
 * @property $user_id
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
    protected $fillable = ['user_id','total','phone','street','num','colonia','city','state','postcode','country','paymentmethod','status'];

	/**
	 * Get all of the orderProducts for the Order
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	
	 public function orderProducts()
	{	
		return $this->hasMany(Orderproduct::class);
	}

}
