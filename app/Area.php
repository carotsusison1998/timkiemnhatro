<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $table = "area";
    public $timestamps = false;

    public function boardinghouse()
    {
    	return $this->hasMany('App/BoardingHouse', 'id_area', 'id');
    }
}
