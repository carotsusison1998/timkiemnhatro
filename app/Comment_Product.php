<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment_Product extends Model
{
    protected $table = "commnent_product";
    public $timestamps = false;

    public function product()
    {
    	return $this->belongsTo('App/Product', 'id_product', 'id');
    }

    public function customer()
    {
    	return $this->belongsTo('App/Customer', 'id_customer', 'id');
    }

    public function rep_comment_product()
    {
    	return $this->hasMany('App/Rep_Comment_Product', 'id_comment', 'id');
    }
}
