<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ModelHasPermission
 *
 * @property $permission_id
 * @property $model_type
 * @property $model_id
 *
 * @property Permission $permission
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ModelHasPermission extends Model
{
    
    static $rules = [
		'permission_id' => 'required',
		'model_type' => 'required',
		'model_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['permission_id','model_type','model_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function permission()
    {
        return $this->hasOne('App\Permission', 'id', 'permission_id');
    }

    public $timestamps = false;
    

}
