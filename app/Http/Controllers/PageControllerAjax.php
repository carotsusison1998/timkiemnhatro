<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\district;
use App\wards;
use App\street;

class PageControllerAjax extends Controller
{
    public function GetDistrict(Request $req)
    {
    	$out = '';

    	if($req->ajax())
    	{
    		$district = district::where('id_area', $req->id_district)->get();
    		$out = '<option>Chọn quận/huyện<option>';
    		foreach ($district as $key => $value) {
    			$out .= '<option value="'.$value['id'].'">'.$value['name'].'</option>';
    		}
    		echo $out;
    	}
    }

    public function GetWards(Request $req)
    {
    	$out = '';

    	if($req->ajax())
    	{
    		$wards = wards::where('id_district', $req->id_wards)->get();
    		$out = '<option>Chọn phường/xã<option>';
    		foreach ($wards as $key => $value) {
    			$out .= '<option value="'.$value['id'].'">'.$value['name'].'</option>';
    		}
    		echo $out;
    	}
    }

    public function GetStreet(Request $req)
    {
    	$out = '';

    	if($req->ajax())
    	{
    		$wards = street::where('id_wards', $req->id_street)->get();
    		$out = '<option>Chọn đường<option>';
    		foreach ($wards as $key => $value) {
    			$out .= '<option value="'.$value['id'].'">'.$value['name'].'</option>';
    		}
    		echo $out;
    	}
    }

    public function GetMoney(Request $req)
    {
    	$out = '';
    	if($req->ajax())
    	{
    		$out = number_format($req->price);
    		echo $out;
    	}
    }

    public function CheckNumber(Request $req)
    {
        $pattern = preg_match('/^(0|\+84)(\s|\.)?((3[2-9])|(5[689])|(7[06-9])|(8[1-689])|(9[0-46-9]))(\d)(\s|\.)?(\d{3})(\s|\.)?(\d{3})$/', $req->mobile);
        if($pattern == 1)
        {
            echo "<p style=".'color:#0A8527'.">số điện thoại hợp lệ</p>";
        }
        else
        {
            echo "<p style=".'color:#EC1D1D'.">số điện thoại chưa hợp lệ</p>";
        }
    }
}
