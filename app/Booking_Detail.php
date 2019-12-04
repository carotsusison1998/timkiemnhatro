<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking_Detail extends Model
{
    protected $table = "booking_detail";
    public $timestamps = false;

    public function boardinghouse()
    {
    	return $this->hasMany('App/BoardingHouse', 'id_boardinghouse', 'id');
    }

    public function booking()
    {
    	return $this->belongsTo('App/Booking', 'id_booking', 'id');
    }
}
