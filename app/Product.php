<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 *
 * @property $id
 * @property $name
 * @property $price
 * @property $cantidad
 * @property $category_id
 * @property $image
 * @property $info
 * @property $image_dos
 * @property $image_tres
 * @property $image_cuatro
 * @property $created_at
 * @property $updated_at
 * @property $link_download
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Product extends Model
{
    
    static $rules = [
		'name' => 'required',
		'price' => 'required',
		'cantidad' => 'required',
		'category_id' => 'required',
		'image' => 'required|image|max:5120',
		'info' => 'required',
		'link_download' => 'required',
		'image_dos' => 'required|image|max:5120',
		'image_tres' => 'required',
		'image_cuatro' => 'required|image|max:5120',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','price','cantidad','category_id','image','info','image_dos','image_tres','image_cuatro','link_download'];



}
