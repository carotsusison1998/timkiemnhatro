<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BoardingHouse;
use App\street;
use App\Type_BoardingHouse;
use App\Product;
use App\Customer;
use DB;

class PageControllerSearch extends Controller
{
    public function SearchBoarding(Request $req)
    {
        if($req->ajax())
        {
            $output = '';
            $i=1;
            $lol = BoardingHouse::where('name', 'LIKE', '%'.$req->search.'%')->get();
            if($lol)
            {
                foreach ($lol as $key => $value) {
                    $data = street::where('id', $value['id_street'])->first();
                    $data1 = Type_BoardingHouse::where('id', $value['id_type_boardinghouse'])->first();
                	
                    $output .= '<tr>'.
                                    '<td>'.$i++.'</td>'.
                                    '<td>'.$value->name.'</td>'.
                                    '<td>'.$value->price.'</td>'.
                                    '<td>'.$data->name.'</td>'.
                                    '<td>'.$data1->name.'</td>'.
                                    '<td>'
                                        .'<a href="'.route('update-boardinghousee', $value['id']).'">'.'<button class="btn btn-info" style="color: black">Sửa</button>'.'</a>'.

                                        '<a href="'.route('delete-boardinghouse', $value['id']).'">'.'<button class="btn btn-group">Xóa</button>'.'</a>'.
                                    '</td>'.
                                   
                                '</tr>';
                }
            }
            else
            {
                $output .=  'not fount';
            }
            return Response($output);
        }
    }

    public function SearchBoardingClient(Request $req)
    {
        if($req->ajax())
        {
            $output = '';
            $search = BoardingHouse::where('name', 'LIKE', '%'.$req->search.'%')->orderBy('created_at', 'desc')->get();
            if($search)
            {
                foreach ($search as $key => $value) {
                    $output .= '<div class="col-md-9 col-sm-12 col-xs-12 remove-padd-left" style="padding-top: 20px" id="show">'.
                                    '<div class="side-A">'.
                                        '<div class="product-thumb">'.
                                            '<div class="img-responsive">'.
                                               '<a href="'.route('motel-detail', $value['id']).'" >'.
                                                    '<img src="./resources/UploadImage/ImageBoardingHouse/BoardingAvatar/'.$value['image'].'"  alt="image" class="img-rounded" width="300px" height="300px">'.
                                                '</a>'.
                                            '</div>'.
                                        '</div>'.
                                    '</div>'.
                                    '<div class="side-B">'.
                                        '<div class="product-desc-side">'.
                                            '<h3>'.
                                                '<a href="'.url('motel-detail', $value['id']).'">'.
                                                    "Nhà Trọ: ".$value->name. "</br>".
                                                '</a>'.
                                            '</h3>'.
                                            '<h4>'.
                                                '<p style="background-color: #ff4157; border-radius: 30px; padding: 5px; margin-top: 20px;">'.
                                                "Giá Phòng: ". '<b>'. $value['price']. "Vnd".
                                                '</p>'.
                                            '</h4>'. "<br>".
                                            '<p>'.'<li>'."Diện Tích: " .$value['acreage']."m2". '</li>'.'</p>'.
                                            '<p>'.'<b>'.'<li>'."Địa Chỉ: ".$value['address'].'</li>'.'</b>'.'</p>'.
                                            '<p>'.'<b>'.'<li>'.
                                                "Ngày Đăng: " .'<br>' .$value['created_at'].
                                            '</li>'.'</b>'.'</p>'. '<br>'.
                                            '<div class="links">'.
                                                '<a href="'.url('motel-detail', $value['id']).'" style="border-radius: 30px">Chi Tiết</a>'.
                                            '</div>'.
                                        '</div>'.
                                    '</div>'.
                                '</div>';
                }
            }
        }
        return $output;
    }

    public function SearchProductClient(Request $req)
    {

        if($req->ajax())
        {
            $output = '';
            $search = Product::where('name', 'LIKE', '%'.$req->search.'%')->orderBy('created_at', 'desc')->get();

            if($search)
            {
                foreach ($search as $key => $value) {
                    $address = Customer::where('id', $value['id_customer'])->first();
                    $date = date_create($value['created_at']);
                    $d = date_format($date, 'd-m-Y');
                    $c = date_format($date, 'H:i');

                    if($value['sale'] == '0')
                    {
                        $output .=  '<div class="col-md-9 col-sm-12 col-xs-12 remove-padd-left" style="padding-top: 20px">'.
                                        '<div class="side-A">'.
                                            '<div class="product-thumb">'.
                                                '<div  class="img-responsive" style="">'.
                                                    '<a href="'.url('product-detail', $value['id']).'">'.
                                                        '<img src="./resources/UploadImage/ImageProduct/ProductAvatar/'.$value['image'].'"  alt="image" class="img-rounded" width="300px" height="300px">'.
                                                    '</a>'.
                                                '</div>'.
                                            '</div>'.
                                        '</div>'.
                                        '<div class="side-B">'.
                                            '<div class="product-desc-side">'.
                                                '<p class="name">'.'<a href="'.url('product-detail', $value['id']).'">'.'<b>'.$value['name'].'</b>'.'</a>'.'</p>'.'<br>'.
                                                '<h4>'.
                                                    '<p style="background-color: #ff4157; margin-top: 8px; border-radius: 30px; padding: 5px">'.
                                                        'Giá: '.'<b>'.number_format($value['price']).' Vnd'.
                                                    '</p>'.
                                                    '<p>'.'<li>'.'Nơi Sản Xuất: '.$value['production'].'</li>'.'</p>'.
                                                    '<p>'.'<li>'.'Địa Chỉ: '.$address['address'].'</li>'.'</p>'.
                                                '</h4>'. '<br>'.
                                                '<p>'.'<b>'.'<li>'.'Thời Gian Đăng: <br> Lúc '.$c.'Ngày '.$d.'</li>'.'</b>'.'</p>'. '<br>'.
                                            '</div>'.
                                            '<div class="links">'.
                                                '<a href="'.url('product-detail', $value['id']).'" style="border-radius: 30px">'.'Chi Tiết'.'</a>'.
                                                '<a href="'.route('shoppingcart', [$value['id'], $value['name']]).'" id="carts2" style="margin-bottom: -10px">'.'Mua Ngay'.'</a>'.
                                            '</div>'.
                                        '</div>'.
                                    '</div>';
                    }
                    else
                    {
                        $output .=  '<div class="col-md-9 col-sm-12 col-xs-12 remove-padd-left" style="padding-top: 20px">'.
                                        '<div class="side-A">'.
                                            '<div class="product-thumb">'.
                                                '<div  class="img-responsive" style="">'.
                                                    '<a href="'.url('product-detail', $value['id']).'">'.
                                                        '<img src="./resources/UploadImage/ImageProduct/ProductAvatar/'.$value['image'].'"  alt="image" class="img-rounded" width="300px" height="300px">'.
                                                    '</a>'.
                                                '</div>'.
                                            '</div>'.
                                        '</div>'.
                                        '<div class="side-B">'.
                                            '<div class="product-desc-side" style="margin-top: -10px;">'.
                                                '<p class="name">'.'<a href="'.url('product-detail', $value['id']).'">'.'<b>'.$value['name'].'</b>'.'</a>'.'</p>'.'<br>'.
                                                '<h4>'.
                                                    '<p style="margin-top: -30px; border-radius: 30px; padding: 5px; text-decoration: line-through;">'.number_format($value['price']).' VND'.'</p>'.
                                                    '<p style="margin-top: -30px; background-color: #ff4157; margin-top: 8px; border-radius: 30px; padding: 5px">'.
                                                        'Giá Sale: '.'<b>'.number_format($value['sale']).' Vnd'.
                                                    '</p>'.
                                                    '<p>'.'<li>'.'Nơi Sản Xuất: '.$value['production'].'</li>'.'</p>'.
                                                    '<p>'.'<li>'.'Địa Chỉ: '.$address['address'].'</li>'.'</p>'.
                                                '</h4>'. '<br>'.
                                                '<p>'.'<b>'.'<li>'.'Thời Gian Đăng: <br> Lúc '.$c.'Ngày '.$d.'</li>'.'</b>'.'</p>'.
                                            '</div>'.
                                            '<div class="links">'.
                                                '<a href="'.url('product-detail', $value['id']).'" style="border-radius: 30px">'.'Chi Tiết'.'</a>'. 
                                                '<a href="'.route('shoppingcart', [$value['id'], $value['name']]).'" id="carts2" style=" margin-bottom: -10px;">'.'Mua Ngay'.'</a>'.
                                            '</div>'.
                                        '</div>'.
                                    '</div>';
                    }
                }
            }
        }
        return $output;
    }
}
