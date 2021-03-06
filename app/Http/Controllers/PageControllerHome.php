<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BoardingHouse;
use App\Image_BoardingHouse;
use App\Type_BoardingHouse;
use App\Comment_BoardingHouse;
use App\Rep_Comment_BoardingHouse;
use App\Booking_Detail;
use App\Customer;
use App\notifycations;
use Cart;
use Auth;
use Session,DB;
class PageControllerHome extends Controller
{
    //
    public function GetHome()
    {
        $boardinghouse = BoardingHouse::orderBy('created_at', 'desc')->paginate(4);
        $top = Booking_Detail::select('id_boardinghouse')->get()->take(8);
        $user = Auth::check();
        $id = Auth::user()['id'];
        $customer = Customer::where('id_user',$id)->first();
        $notifycations = notifycations::where('id_customer', $customer['id'])->take(3)->orderBy('created_at', 'desc')->get();
        // echo "<pre>";
        // print_r($top->toArray());
        // echo "</pre>";
        return view('PageHome.Home', compact('boardinghouse', 'top', 'notifycations'));
    }

    public function GetMotelDetail($id, Request $req)
    {
        $boardinghouse = BoardingHouse::where('id', $id)->first();
        $image = Image_BoardingHouse::where('id_boardinghouse', $id)->get();
        $comment = Comment_BoardingHouse::where('id_boardinghouse', $id)->get();
        $motelofid = DB::table('boarding_house')->where([
            ['id_owner', '=', $boardinghouse['id_owner']],
            ['id', '<>', $id],
        ])->get();
        
        return view('PageMotel.GetMotelDetail', compact('boardinghouse', 'image', 'comment', 'motelofid'));
    }

    public function GetMotelType($id)
    {
        $type_boardinghouse = Type_BoardingHouse::get();
        $nametype_boardinghouse = Type_BoardingHouse::where('id', $id)->first();
        $boarding = BoardingHouse::where('id_type_boardinghouse', $id)->orderBy('created_at', 'desc')->paginate(3);
        return view('PageMotel.GetMotelType', compact('boarding', 'type_boardinghouse', 'nametype_boardinghouse'));
    }

    public function GetMotelAll()
    {
        $all = BoardingHouse::select('*')->orderBy('created_at', 'desc')->paginate(4);
        $type_boardinghouse = Type_BoardingHouse::get();
        return view('PageMotel.GetMotelAll', compact('all', 'type_boardinghouse'));
    }

    public function GetFilter(Request $req)
    {
        $type_boardinghouse = Type_BoardingHouse::get();
        if($req->price)
        {
            $price = $req->price;
            switch ($price) {
             case '1':
             $boardinghouse = BoardingHouse::where('price', '>=', 2000000)->orderBy('created_at', 'desc')->get();
             $price = "Loại trọ trên 2 triệu";
             break;
             case '2':
             $boardinghouse = BoardingHouse::whereBetween('price', [1000000, 2000000])->orderBy('created_at', 'desc')->get();
             $price = "Loại trọ từ 1 triệu đến 2 triệu";
             break;
             case '3':
             $boardinghouse = BoardingHouse::whereBetween('price', [800000, 1000000])->orderBy('created_at', 'desc')->get();
             $price = "Loại trọ dưới 1 triệu";
             break;
             case '4':
             $boardinghouse = BoardingHouse::where('price', '<', 800000)->orderBy('created_at', 'desc')->get();
             $price = "Loại trọ dưới 800.000 ngàn";
             break;
         }
     }
     return view('PageMotel.GetMotelFilter', compact('boardinghouse', 'type_boardinghouse', 'price'));
 }

 public function GetContact()
 {
    return view('PageHome.GetContact');
}

public function PostCommentBoardingHouse(Request $req)
{
    $user = Auth::check();
    $id = Auth::user()['id'];
    $customer = Customer::where('id_user',$id)->first();

    if(!$req->star)
    {
        $this->validate($req, 
            [
                'star' => 'required'
            ],
            [
                'star.required' => 'Vui lòng chọn số sao'
            ]);
    }
    else
    {
        $comment = new Comment_BoardingHouse;
        $comment->id_customer = $customer->id;
        $comment->id_boardinghouse = $req->boardinghouse;
        $comment->star = $req->star;
        $comment->image = "1.png";
        $comment->content = $req->content;
        $comment->save();
        return redirect()->back()->with('thongbaothanhcong', 'thêm bình luận thành công');
    }
    return redirect();        
}

public function PostRepCommentBoardingHouse(Request $req)
{
    $user = Auth::check();
    $id = Auth::user()['id'];
    $customer = Customer::where('id_user',$id)->first();
    $id_comment = $req->id_comment;

    $rep = new Rep_Comment_BoardingHouse;
    $rep->id_comment_boardinghouse = $id_comment;
    $rep->id_customer = $customer->id;
    $rep->content = $req->content;
    $rep->save();
    return redirect()->back()->with('thongbaothanhcong', 'thêm bình luận thành công');
}
public function GooleMaps($value='')
{
    echo "string";
}

public function AllBoardingClient($id)
{
    $allboarding = BoardingHouse::where('id_owner', $id)->Orderby('created_at' , 'DESC')->paginate(4);
    $allboarding2 = BoardingHouse::where('id_owner', $id)->where('status', 1)->Orderby('created_at' , 'DESC')->get();
    $owner = Customer::where('id', $id)->first();
    $arg = count($allboarding) - count($allboarding2);
        // echo "<pre>";
        // print_r(count($allboarding2));
        // echo "</pre>";
    return view('AllBoarding.allboarding', compact('allboarding', 'owner', 'allboarding2', 'arg'));
}

}
