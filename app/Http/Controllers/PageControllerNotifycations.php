<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\notifycations;
class PageControllerNotifycations extends Controller
{
    public function GetNotice($id_customer)
    {
    	$notice = notifycations::where('id_customer', $id_customer)->orderBy('created_at', 'DESC')->get();
    	// echo "<pre>";
    	// print_r($notice);
    	// echo "</pre>";
    	return view('Notice.Notifycations_Boarding', compact('notice'));
    }
    public function RemoveNotice($id_notice)
    {
    	$notice = notifycations::find($id_notice);
        $notice->delete();
        return redirect()->back();
    }
}
