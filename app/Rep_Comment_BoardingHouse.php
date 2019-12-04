<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rep_Comment_BoardingHouse extends Model
{
    protected $table = "rep_comment_boardinghouse";
    public $timestamps = false;

    public function comment_boardinghouse()
    {
    	return $this->belongsTo('App/Comment_BoardingHouse', 'id_comment_boardinghouse', 'id');
    }

    public function customer()
    {
    	return $this->belongsTo('App/Customer', 'id_customer', 'id');	
    }
}
