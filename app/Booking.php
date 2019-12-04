<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = "booking";
    public $timestamps = false;

    public function booking_detail()
    {
    	return $this->hasMany('App/Booking_Detail', 'id_booking', 'id');
    }

    public function customer()
    {
    	return $this->belongsTo('App/Customer', 'id_customer', 'id');
    }
}
