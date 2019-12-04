<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment_BoardingHouse extends Model
{
    protected $table = "comment_boardinghouse";
    public $timestamps = false;

    public function customer()
    {
    	return $this->belongsTo('App/Customer', 'id_customer', 'id');
    }

    public function rep_comment_boardinghouse()
    {
    	return $this->hasMany('App/Rep_Comment_BoardingHouse', 'id_comment_boardinghouse', 'id');
    }
}
