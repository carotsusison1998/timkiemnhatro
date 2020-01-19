<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageControllerNotifycations extends Controller
{
    public function GetNotice($id_customer)
    {
    	echo $id_customer;
    }
}
