<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail_Order_Product extends Model
{
    protected $table = "detail_order_product";
    public $timestamps = false;

    public function order_product()
    {
    	return $this->hasMany('App/Order_Product', 'id_order', 'id');
    }

    public function product()
    {
    	return $this->hasMany('App/Product', 'id_product', 'id');
    }
}
