<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rep_Comment_Product extends Model
{
    protected $table = "rep_comment_product";
    public $timestamps = false;

    public function comment_product()
    {
    	return $this->belongsTo('App/Comment_Product', 'id_comment', 'id');
    }

    public function customer()
    {
    	return $this->belongsTo('App/Customer', 'id_customer', 'id');	
    }
}
