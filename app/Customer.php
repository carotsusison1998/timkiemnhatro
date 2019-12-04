<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = "customer";
    public $timestamps = false;

    public function booking()
    {
    	return $this->hasMany('App/Booking', 'id_customer', 'id');
    }

    public function boardinghouse()
    {
    	return $this->hasMany('App/BoardingHouse', 'id_owner', 'id');
    }

    public function comment_boarding()
    {
    	return $this->hasMany('App/Comment_BoardingHouse', 'id_customer', 'id');
    }

    public function rep_comment_boardinghouse()
    {
    	return $this->hasMany('App/Rep_Comment_BoardingHouse', 'id_customer', 'id');
    }

    public function order_product()
    {
    	return $this->hasMany('App/Order_Product', 'id_customer', 'id');
    }

    public function product()
    {
    	return $this->hasMany('App/Product', 'id_customer', 'id');
    }

    public function users()
    {
    	return $this->hasMany('App/User', 'id_user', 'id');
    }

    public function comment_product()
    {
    	return $this->hasMany('App/Comment_Product', 'id_customer', 'id');
    }

    public function rep_comment_product()
    {
    	return $this->hasMany('App/Rep_Comment_Product', 'id_customer', 'id');
    }

    public function sales_channel()
    {
        return $this->hasMany('App/Sales_Channel', 'id_customer', 'id');
    }
}
