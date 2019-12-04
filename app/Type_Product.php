<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type_Product extends Model
{
    protected $table = "type_product";
    public $timestamps = false;

    public function product()
    {
    	return $this->hasMany('App/Product', 'id_typeproduct', 'id');
    }
}
