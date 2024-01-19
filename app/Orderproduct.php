<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Order;

/**
 * Class Orderproduct
 *
 * @property $id
 * @property $id_order
 * @property $id_products
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Orderproduct extends Model
{
    
    static $rules = [
		'id_order' => 'required',
		'id_products' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_order','id_products'];

    public function orders()
    {
      return $this->belongsTo(Order::class);
    }

}
