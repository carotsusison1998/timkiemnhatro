<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\BoardingHouse;
use App\Booking_Detail;
use App\Booking;
use Auth;

class PageControllerShoppingCart extends Controller
{
	public function GetOrderBoarding($id)
	{
		$user = Auth::check();
		$ids = Auth::user()['id'];
		$customer = Customer::where('id_user',$ids)->first();
		if(!$user)
		{
			return redirect()->back()->with('thongbaoloi', 'vui lòng đăng nhập trước khi đặt phòng');
		}
		else
		{
			$boardinghouse = BoardingHouse::where('id', $id)->first();
			return view('PageOrder.PageOrderBoardingHouse', compact('boardinghouse', 'customer'));
		}
	}

	public function PostShoppingCart(Request $req)
	{
		$user = Auth::check();
		$ids = Auth::user()['id'];
		$customer = Customer::where('id_user',$ids)->first();
		
		$booking = new Booking;
		$booking->id_customer = $customer->id;
		$booking->note = $req->note;
		$booking->payment = $req->payment;
		$booking->save();

		$booking_detail = new Booking_Detail;
		$booking_detail->id_boardinghouse = $req->id_boar;
		$booking_detail->id_booking = $booking->id;
		$booking_detail->price = $req->price;
		$booking_detail->quantity = '1';
		$booking_detail->save();
		// update boarding đã được đặt
		$update_boar = BoardingHouse::find($req->id_boar);
		$update_boar->status = '2';
		$update_boar->save();
		
		return redirect()->back()->with('messager', 'Đặt Phòng Thành Công !!!');
	}


	public function GetShoppingCart()
	{
		return view('PageCart.GetShoppingCart');
	}

	public function GetOrderBoar($id)
	{
		$book = Booking::where('id_customer', $id)->get();
		return view('PageCart.GetOrderBoardingHouse', compact('book'));
	}
}
