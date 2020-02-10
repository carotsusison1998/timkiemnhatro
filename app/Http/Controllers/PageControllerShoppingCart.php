<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\BoardingHouse;
use App\Booking_Detail;
use App\Booking;
use App\Product;
use App\Order_Product;
use App\Detail_Order_Product;
use Auth, Cart;

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
		$cart = Cart::getContent();
		// echo "<pre>";
		// print_r($cart->toArray());
		// echo "</pre>";
		$sum = Cart::getTotal();
		return view('PageCart.GetShoppingCart', compact('cart', 'sum'));
	}

	public function GetOrderBoar($id)
	{
		$book = Booking::where('id_customer', $id)->get();
		return view('PageCart.GetOrderBoardingHouse', compact('book'));
	}

	public function GetCartProduct($id)
	{
		// Cart::remove(4);
		// Cart::remove(5);
		// Cart::remove(3);
		// Cart::isEmpty();
		// Cart::clear();
		$product = Product::find($id);
		if($product->quantity == '0')
		{
			return redirect()->back()->with('thongbaos', 'sản phẩm đã hết hàng');
		}
		else
		{
			if($product->sale == '0')
			{
				Cart::add(
					array(
						'id' => $id,
						'name' => $product->name,
						'quantity' => 1,
						'price' => $product->price,
						'attributes' => array(
							'image' => $product->image
						)
					)
				);
			}
			else
			{
				Cart::add(
					array(
						'id' => $id,
						'name' => $product->name,
						'quantity' => 1,
						'price' => $product->sale,
						'attributes' => array(
							'image' => $product->image
						)
					)
				);
			}
			return redirect()->back()->with('thongbaos', 'thêm giỏ hàng thành công');
		}
		// $cart = Cart::getContent();
		// echo "<pre>";
		// print_r($cart->toArray());
		// echo "</pre>";
	}

	public function RemoveCart($id)
	{
		Cart::remove($id);
		return redirect()->back()->with('thongbaos', 'xóa sản phẩm giỏ hàng thành công');
	}

	public function UpdateCart(Request $req)
	{
		$product = Product::find($req->id);

		if($req->ajax())
		{
			if($product->quantity >= $req->qty)
			{
				$id = $req->id;
				$qty = $req->qty;
				Cart::update($id, array(
					'quantity' => array(
						'relative' => false,
						'value' => $qty
					),
				));
			}
			else
			{
				echo "not";
			}
			
		}
	}

	public function SaveCart($id, Request $req)
	{
		$total = Cart::getTotal();
		$order = new Order_Product;
		$order->id_customer = $id;
		$order->total = $total;
		$order->payment = $req->payment;
		$order->note = $req->note;
		$order->save();
		$cart = Cart::getContent();
		foreach ($cart as $key => $value) {
			$product = Product::find($value->id);
			$product->quantity = $product->quantity - $value->quantity;
			$product->save();
			$order_detail = new Detail_Order_Product;
			$order_detail->id_order = $order->id;
			$order_detail->id_product = $value->id;
			$order_detail->quantity = $value->quantity;
			$order_detail->price = $value->price;
			$order_detail->save();
		}
		return redirect()->back()->with('thongbao', 'Đặt hàng thành công');
	}

	public function ClearCart()
	{
		Cart::clear();
		return redirect()->back();
	}
}
