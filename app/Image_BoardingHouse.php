<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image_BoardingHouse extends Model
{
    protected $table = "image_boardinghouse";
    public $timestamps = false;

    public function boardinghouse()
    {
    	return $this->belongsTo('App/BoardingHouse', 'id_image_detail', 'id');
    }
}
