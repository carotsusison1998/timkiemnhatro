<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image_Product extends Model
{
    protected $table = "image_product";
    public $timestamps = false;

    public function product()
    {
    	return $this->belongsTo('App/Product', 'id_product', 'id');
    }
}
