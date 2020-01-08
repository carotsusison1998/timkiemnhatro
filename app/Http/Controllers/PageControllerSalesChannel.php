<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Area;
use App\Type_BoardingHouse;
use App\Type_Product;
use App\BoardingHouse;
use App\Image_BoardingHouse;
use App\Image_Product;
use App\Comment_BoardingHouse;
use App\Rep_Comment_BoardingHouse;
use App\Customer;
use App\Booking;
use App\Booking_Detail;
use App\Product;
use App\street;
use App\wards;
use App\district;
use Auth;
use Input;
use Imagick;
use File;

class PageControllerSalesChannel extends Controller
{
    public function GetSaleChannel($value='')
    {

    	return view('PageSaleChannel.PageHomeSaleChannel.PageHome');
    }

    public function InsertBoardingHouse()
    {
        $area = Area::get();
        $type_boardinghouse = Type_BoardingHouse::get();
        return view('PageSaleChannel.PageHomeSaleChannel.PageInsertBoardingHouse', compact('area', 'type_boardinghouse'));
    }

    public function PostInsertBoardingHouse(Request $req)
    {
        $this->validate($req, 
            [
                'name' => 'required',
                'price' => 'required',
                'address' => 'required',
                'description' => 'required|min:20',
                'image' => 'required|mimes:jpeg,png,jpg',
                'picture' => 'required',
                'street' =>'required',
                'number' => 'required',
                'acreage' => 'required'
            ],
            [
                'name.required' => 'vui lòng nhập tên nhà trọ',
                'price.required' => 'vui lòng nhập giá nhà trọ',
                'address.required' => 'vui lòng nhập địa chỉ nhà trọ',
                'description.required' => 'vui lòng nhập mô tả nhà trọ',
                'description.min' => 'vui lòng nhập mô tả nhà trọ nhiều hơn 20 kí tự',
                'image.required' => 'vui lòng nhập ảnh đại diện nhà trọ',
                'image.mimes' =>'tệp ảnh nền bạn chọn không đúng định dạng là ảnh',
                'picture.required' => 'vui lòng nhập ảnh chi tiết về nhà trọ',
                'street.required' => ' vui lòng nhập đường',
                'number.required' => 'vui lòng nhập số nhà',
                'acreage.required' => 'vui lòng nhập diện tích'
            ]
        );
        $files = $req->file('image');
        $filename =  $files->getClientOriginalName();     
        $id    = Auth::user()['id'];
        $id_customer = Customer::where('id_user', $id)->first();
        $boardinghouse = new BoardingHouse();
        $boardinghouse->name = $req->name;
        $boardinghouse->price = $req->price;
        $boardinghouse->status = '1';
        $boardinghouse->image = time().'.'.$filename;
        $boardinghouse->description = $req->description;
        $boardinghouse->id_type_boardinghouse = $req->type_boardinghouse;
        $boardinghouse->id_owner = $id_customer->id;
        $boardinghouse->id_street = $req->street;
        $boardinghouse->address = $req->address;
        $boardinghouse->acreage = $req->acreage;
        $boardinghouse->type = $req->type;
        $boardinghouse->object = $req->object;
        $boardinghouse->number = $req->number;
        $boardinghouse->lat = $req->lat;
        $boardinghouse->lng = $req->lon;
        
        $boardinghouse->save();
        $files->move(public_path('resources/UploadImage/ImageBoardingHouse/BoardingAvatar'), time().'.'.$filename);
        
        // kiểm tra file ảnh chi tiết nè
        if($req->hasFile('picture'))
        {
            foreach ($req->file('picture') as $file) {
                $image_detail = new Image_BoardingHouse();
                if(isset($file))
                {
                    $image_detail->image = time().'.'.$file->getClientOriginalName();
                    // echo "<pre>";
                    // print_r($image_detail->toArray());
                    // echo "</pre>";
                    $image_detail->id_boardinghouse = $boardinghouse->id;
                    $file->move('resources/UploadImage/ImageBoardingHouse/BoardingDetail/', time().'.'.$file->getClientOriginalName());
                    $image_detail->save();
                }
            }
        }
        return redirect()->back()->with('thongbao', 'Thêm nhà trọ mới thành công');
    }

    public function HRMBoardingHouse($id)
    {
        $boardinghouse = BoardingHouse::where('id_owner', $id)->get()->toArray();
        // echo "<pre>";
        // print_r($boardinghouse);
        // echo "</pre>";
        return view('PageSaleChannel.PageHomeSaleChannel.PageHRMBoardingHouse', compact('boardinghouse'));
    }

    public function DetailBoardingHouse($id)
    {
        $detail_boarding = BoardingHouse::where('id', $id)->first();
        $booking_detail = Booking_Detail::where('id_boardinghouse', $id)->first();
        $booking = Booking::where('id', $booking_detail['id_booking'])->first();
        $customers = Customer::where('id', $booking['id_customer'])->first();

        // echo "<pre>";
        // dd($customers);
        // echo "</pre>";
        
        return view('PageSaleChannel.PageHomeSaleChannel.PageDetailBoardingHouse', compact('detail_boarding', 'customers'));
    }

    public function DeleteBoardingHouse($id)
    {
        $booking_detail = Booking_Detail::where('id_boardinghouse', $id)->first();
        $booking = Booking::where('id', $booking_detail['id_booking'])->first();
        $image = Image_BoardingHouse::where('id_boardinghouse', $id)->get();
        $comment = Comment_BoardingHouse::where('id_boardinghouse', $id)->get();

        $boardinghouse = BoardingHouse::where('id', $id)->first();
        
        if($image)
        {
            foreach ($image as  $value) {
                File::delete('resources/UploadImage/ImageBoardingHouse/BoardingDetail/'.$value['image']);
                $value->delete();
            }
        }
        if($comment)
        {
            foreach ($comment as  $value) {

                $repcomment = Rep_Comment_BoardingHouse::where('id_comment_boardinghouse', $value->id)->get();
                if($repcomment)
                {
                    foreach ($repcomment as $values) 
                    {
                        $values->delete();

                    }
                    $value->delete();
                }
            }
        }
        if($booking_detail!= null)
        {
            $booking_detail->delete();
        }   
        if($booking != null)
        {
            $booking->delete();
        }
        File::delete('resources/UploadImage/ImageBoardingHouse/BoardingAvatar/'.$boardinghouse['image']);
        $boardinghouse->delete();
        return redirect()->back()->with('thongbao', 'Xóa thành công nhà trọ');
    }

    public function DelImageBoardingHouse($id)
    {
        $image = Image_BoardingHouse::where('id', $id)->first();
        $image->delete();
        File::delete('resources/UploadImage/ImageBoardingHouse/BoardingDetail/'.$image['image']);
        return redirect()->back();
    }

    public function UpdateBoardingHouse($id)
    {
        $detail_boarding = BoardingHouse::where('id', $id)->first();
        $type_boardinghouse = Type_BoardingHouse::get();
        $area = Area::get();
        
        return view('PageSaleChannel.PageHomeSaleChannel.PageUpdateBoardingHouse', compact('detail_boarding', 'type_boardinghouse', 'area'));
    }

    public function PostUpdateBoardingHouse(Request $req)
    {
        $this->validate($req, 
            [
                'name' => 'required',
                'price' => 'required',
                'address' => 'required',
                'description' => 'required|min:20',
                'image' => 'mimes:jpeg,png,jpg',    
                'number' => 'required',
                'acreage' => 'required'
            ],
            [
                'name.required' => 'vui lòng nhập tên nhà trọ',
                'price.required' => 'vui lòng nhập giá nhà trọ',
                'address.required' => 'vui lòng nhập địa chỉ nhà trọ',
                'description.required' => 'vui lòng nhập mô tả nhà trọ',
                'description.min' => 'vui lòng nhập mô tả nhà trọ nhiều hơn 20 kí tự',
                'image.mimes' =>'tệp ảnh nền bạn chọn không đúng định dạng là ảnh',
                'number.required' => 'vui lòng nhập số nhà',
                'acreage.required' => 'vui lòng nhập diện tích'
            ]
        );

        $id = $req->id;
        $update_boardinghouse = BoardingHouse::find($id);

        if(!$req->street)
        {
            if($req->hasFile('picture'))
            {
                $update_boardinghouse->name = $req->name;
                $update_boardinghouse->price = $req->price;
                $update_boardinghouse->status = $req->status;
                $update_boardinghouse->description = $req->description;
                $update_boardinghouse->id_type_boardinghouse = $req->id_type_boardinghouse;
                $update_boardinghouse->id_street = $req->nostreet;
                $update_boardinghouse->address = $req->address;
                $update_boardinghouse->number = $req->number;
                $update_boardinghouse->acreage = $req->acreage;
                $update_boardinghouse->type = $req->type;
                $update_boardinghouse->lng = $req->lng;
                $update_boardinghouse->lat = $req->lat;
                $update_boardinghouse->object = $req->object;

                // echo "<pre>";
                // print_r($update_boardinghouse->toArray());
                // echo "</pre>";

                foreach ($req->file('picture') as $file) {                
                    $image_detail = new Image_BoardingHouse();
                    if(isset($file))
                    {
                        // echo "<pre>";
                        // print_r(time().'.'.$file->getClientOriginalName());
                        // echo "</pre>";
                        $image_detail->image = time().'.'.$file->getClientOriginalName();
                        $image_detail->id_boardinghouse = $id;
                        $file->move('resources/UploadImage/ImageBoardingHouse/BoardingDetail/', time().'.'.$file->getClientOriginalName());
                        $image_detail->save();
                    }
                }
                $update_boardinghouse->save();
            }
            else
            {

                $update_boardinghouse->name = $req->name;
                $update_boardinghouse->price = $req->price;
                $update_boardinghouse->status = $req->status;
                $update_boardinghouse->description = $req->description;
                $update_boardinghouse->id_type_boardinghouse = $req->id_type_boardinghouse;
                $update_boardinghouse->id_street = $req->nostreet;
                $update_boardinghouse->address = $req->address;
                $update_boardinghouse->acreage = $req->acreage;
                $update_boardinghouse->number = $req->number;
                $update_boardinghouse->type = $req->type;
                $update_boardinghouse->lng = $req->lng;
                $update_boardinghouse->lat = $req->lat;
                $update_boardinghouse->object = $req->object;


                // echo "<pre>";
                // print_r($update_boardinghouse->toArray());
                // echo "</pre>";
                $update_boardinghouse->save();
            }
        }
        else
        {
            if($req->hasFile('picture'))
            {
                $update_boardinghouse->name = $req->name;
                $update_boardinghouse->price = $req->price;
                $update_boardinghouse->status = $req->status;
                $update_boardinghouse->description = $req->description;
                $update_boardinghouse->id_type_boardinghouse = $req->id_type_boardinghouse;
                $update_boardinghouse->id_street = $req->street;
                $update_boardinghouse->address = $req->address;
                $update_boardinghouse->number = $req->number;
                $update_boardinghouse->acreage = $req->acreage;
                $update_boardinghouse->type = $req->type;
                $update_boardinghouse->lng = $req->lng;
                $update_boardinghouse->lat = $req->lat;
                $update_boardinghouse->object = $req->object;

                // echo "<pre>";
                // print_r($update_boardinghouse->toArray());
                // echo "</pre>";

                foreach ($req->file('picture') as $file) {                
                    $image_detail = new Image_BoardingHouse();
                    if(isset($file))
                    {
                        // echo "<pre>";
                        // print_r(time().'.'.$file->getClientOriginalName());
                        // echo "</pre>";
                        $image_detail->image = time().'.'.$file->getClientOriginalName();
                        $image_detail->id_boardinghouse = $id;
                        $file->move('resources/UploadImage/ImageBoardingHouse/BoardingDetail/', time().'.'.$file->getClientOriginalName());
                        $image_detail->save();
                    }
                }
                $update_boardinghouse->save();
            }
            else
            {
                $update_boardinghouse->name = $req->name;
                $update_boardinghouse->price = $req->price;
                $update_boardinghouse->status = $req->status;
                $update_boardinghouse->description = $req->description;
                $update_boardinghouse->id_type_boardinghouse = $req->id_type_boardinghouse;
                $update_boardinghouse->id_street = $req->nostreet;
                $update_boardinghouse->address = $req->address;
                $update_boardinghouse->acreage = $req->acreage;
                $update_boardinghouse->number = $req->number;
                $update_boardinghouse->type = $req->type;
                $update_boardinghouse->lng = $req->lng;
                $update_boardinghouse->lat = $req->lat;
                $update_boardinghouse->object = $req->object;
                

                // echo "<pre>";
                // print_r($update_boardinghouse->toArray());
                // echo "</pre>";
                $update_boardinghouse->save();
            }
        }
        return redirect()->back()->with('thongbao','cập nhật thành công');
    }
    // chức năng xác nhân của chủ trọ, thay đổi status thành 2 , đặt thành công
    public function PostConfirmBoardingHouse(Request $req)
    {
        $boar = BoardingHouse::where('id', $req->id_boar)->first();
        $boar->status = '3';
        $boar->save();
        return redirect()->back()->with('thongbao', 'Xác nhận thành công');
    }

    // chức năng xác nhân của chủ trọ, thay đổi status thành 3 , hủy thành công
    public function PostConfirmBoardingHouse2(Request $req)
    {
        $boar = BoardingHouse::where('id', $req->id_boar)->first();
        $boar->status = '4';
        $boar->save();
        return redirect()->back()->with('thongbao', 'Hủy thành công');
    }
    //hủy đặt phòng 
    public function PostConfirmBoardingHouse3(Request $req)
    {
        $boar = BoardingHouse::where('id', $req->id_boar)->first();
        $boar->status = '4';
        
        $boar->save();
        return redirect()->back()->with('thongbao', 'Hủy thành công');
    }
    // đặt lại nè
    public function PostConfirmBoardingHouse4(Request $req)
    {
        $boar = BoardingHouse::where('id', $req->id_boar)->first();
        $boar->status = '2';
        $boar->save();
        
        return redirect()->back()->with('thongbao', 'Xác nhận thành công');
    }

    public function InsertProduct($value='')
    {
        $type_product = Type_Product::get();
        
        return view('PageSaleChannel.PageProductChannel.PageInsertProduct', compact('type_product'));
    }

    public function PostInsertProduct(Request $req)
    {
        $this->validate($req, 
            [
                'name_product' => 'required|min:6|max:50',
                'price_product' => 'required|numeric',
                'sales_product' => 'numeric',
                'quantity' => 'required|numeric',
                'production' => 'required|min:3',
                'status' => 'required|numeric',
                'address' => 'required|min:10',
                'description' => 'required|min:10',
                'image' => 'required',
                'picture' => 'required'
            ],
            [
                'name_product.required' => 'vui lòng nhập tên sản phẩm',
                'name_product.min' => 'vui lòng nhập tên sản phẩm tối thiểu 6 kí tự',
                'name_product.max' => 'vui lòng nhập tên sản phẩm tối đa 50 kí tự',
                'price_product.required' => 'vui lòng nhập giá sản phẩm',
                'price_product.numeric' => 'vui lòng nhập giá bán sản phẩm phải là số',
                'sales_product.numeric' => 'vui lòng nhập giá sale sản phẩm phải là số',
                'quantity.required' => 'vui lòng nhập số lượng sản phẩm',
                'quantity.numeric' => 'vui lòng nhập số lượng sản phẩm phải là số',
                'production.required' => 'vui lòng nhập nơi sản xuất sản phẩm',
                'production.min' => 'vui lòng nhập nơi sản xuất sản phẩm tối thiểu là 10 kí tự',
                'status.required' => 'vui lòng nhập trạng thái sản phẩm',
                'address.required' => 'vui lòng nhập địa chỉ cửa hàng bán sản phẩm',
                'address.min' => 'vui lòng nhập địa chỉ cửa hàng bán sản phẩm tối thiểu 10 kí tự',
                'description.required' => 'vui lòng nhập mô tả sản phẩm',
                'description.min' => 'vui lòng nhập mô tả sản phẩm tối thiểu 10 kí tự',
                'picture.required' => 'vui lòng nhập hình ảnh chi tiết sản phẩm',
                'image.required' => 'vui lòng nhập hình ảnh sản phẩm',
            ]);
        $image = $req->image;
        $images = $image->getClientOriginalName();
        $product = new Product;
        $product->name = $req->name_product;
        $product->price = $req->price_product;
        $product->sale = $req->sales_product;
        $product->quantity = $req->quantity;
        $product->production = $req->production;
        $product->image = time().'.'.$image->getClientOriginalName();
        $product->status = $req->status;
        $product->description = $req->description;
        $product->id_typeproduct = $req->type_product;
        $product->id_customer = $req->id_customer;
        $image->move(public_path('resources/UploadImage/ImageProduct/ProductAvatar'), time().'.'.$image->getClientOriginalName());
        $product->save();

        if($req->hasFile('picture'))
        {
            foreach ($req->file('picture') as $file) {
                $image_detail = new Image_Product();
                if(isset($file))
                {
                    $image_detail->image = time().'.'.$file->getClientOriginalName();
                    $image_detail->id_product = $product->id;
                    $file->move('resources/UploadImage/ImageProduct/ProductDetail/', time().'.'.$file->getClientOriginalName());
                    $image_detail->save();
                }
            }
        }
        return redirect()->back()->with('thongbao', 'thêm sản phẩm thành công');
    }

    public function GetProduct($id)
    {
        $product = Product::where('id_customer', $id)->orderBy('created_at', 'desc')->get();
        // echo "<pre>";
        // print_r($product);
        // echo "</pre>";

        return view('PageSaleChannel.PageProductChannel.PageHRMProduct', compact('product'));
    }
}
