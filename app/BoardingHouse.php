<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BoardingHouse extends Model
{
    protected $table = "boarding_house";
    public $timestamps = false;

    public function area()
    {
    	return $this->belongsTo('App/Area', 'id_area', 'id');
    }

    public function image()
    {
    	return $this->hasMany('App/Image_BoardingHouse', 'id_image_detail', 'id');
    }

    public function type_boardinghouse()
    {
    	return $this->belongsTo('App/Type_BoardingHouse', 'id_type_boardinghouse', 'id');
    }

    public function onwer()
    {
    	return $this->belongsTo('App/Customer', 'id_owner', 'id');
    }

    public function booking_detail()
    {
    	return $this->belongsTo('App/Booking_Detail', 'id_boardinghouse', 'id');
    }

    public function comment_boardinghouse()
    {
    	return $this->hasMany('App/Comment_BoardingHouse', 'id_boardinghouse', 'id');
    }
    
}
