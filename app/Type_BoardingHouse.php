<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type_BoardingHouse extends Model
{
    protected $table = "type_boardinghouse";
    public $timestamps = false;

    public function boardinghouse()
    {
    	return $this->hasMany('App/BoardingHouse', 'id_type_boardinghouse', 'id');
    }
}
