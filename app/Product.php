<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "product";
    public $timestamps = false;

    public function detail_order_product()
    {
    	return $this->belongsTo('App/Detail_Order_Product', 'id_product', 'id');
    }

    public function customer()
    {
    	return $this->belongsTo('App/Customer', 'id_customer', 'id');
    }

    public function image_product()
    {
        return $this->hasMany('App/Image_Product', 'id_product', 'id');
    }

    public function type_product()
    {
    	return $this->belongsTo('App/Type_Product', 'id_typeproduct', 'id');
    }

    public function comment_product()
    {
    	return $this->hasMany('App/Comment_Product', 'id_product', 'id');
    }
}
