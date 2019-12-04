<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sales_Channel extends Model
{
    protected $table = 'sales_channel';
    public $timestamps = false;

    public function customer()
    {
    	return $this->hasMany('App/Customer', 'id_customer', 'id');
    }
}
