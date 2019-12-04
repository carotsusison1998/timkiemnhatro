<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_Product extends Model
{
    protected $table = "order_product";
    public $timestamps = false;

    public function customer()
    {
    	return $this->belongsTo('App/Order_Product', 'id_customer', 'id');
    }

    public function detail_order_product()
    {
    	return $this->hasMany('App/Detail_Order_Product', 'id_order', 'id');
    }
}
