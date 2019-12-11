<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Customer;
use App\Sales_Channel;
use Hash;
use Auth;

class PageControllerUser extends Controller
{
    public function GetAbout()
    {
    	return view('PageAbout.GetAbout');
    }

    public function GetSignup()
    {
    	return view('PageDK.PageSignup');
    }

    public function PostSignup(Request $req)
    {
    	$this->validate($req, 
            [
                'firstname' => 'required',
                'lastname' => 'required',
                'email' => 'required|email|unique:customer,email',
                'username' => 'required|min:10',
                'password' => 'required|min:6|max:25',
                'phone' => 'required|numeric'
            ],
            [
                'firstname.required' => 'vui lòng nhập họ của bạn',
                'lastname.required' => 'vui lòng nhập tên của bạn',
                'email.required' => 'vui lòng nhập email của bạn',
                'email.email' => 'không đúng định dạng email',
                'email.unique' => 'email đã tồn tại, vui lòng chọn email khác',
                'username.required' => 'vui lòng nhập tài khoản',
                'username.min' => 'tài khoản quá ngắn, vui lòng nhập tài khoản trên 10 kí tự',
                'password.required' => 'vui lòng nhập mật khẩu',
                'password.min' => 'mật khẩu bạn quá ngắn, vui lòng nhập trên 6 kí tự',
                'password.max' => 'mật khẩu bạn quá dài, vui lòng nhập dưới 25 kí tự',
                'phone.required' =>'bạn phải nhập số điện thoại',
                'phone.numeric' =>'số điện thoại phải nhập số',
                'phone.min' =>'số điện thoại quá ngắn',
                'phone.max' =>'số điện thoại quá dài',
            ]
        );


        $user = new User();
        $user->username = $req->username;
        $user->password = Hash::make($req->password);
        $user->token = $req->_token;
        $user->save();

        $customer = new Customer();
        $customer->id_user = $user->id;
        $customer->first_name = $req->firstname;
        $customer->last_name = $req->lastname;
        $customer->phone = $req->phone;
        $customer->email = $req->email;
        $customer->save();
        return redirect()->back()->with('thongbao', 'Đăng kí tài khoản thành công');
    }

    public function PostSignin(Request $req)
    {
        $this->validate($req, 
            [
                'username' => 'required|min:10',
                'password' => 'required|min:6|max:25',
            ],
            [
                'username.required' => 'vui lòng nhập tài khoản',
                'username.min' => 'tài khoản quá ngắn, vui lòng nhập tài khoản trên 10 kí tự',
                'password.required' => 'vui lòng nhập mật khẩu',
                'password.min' => 'mật khẩu bạn quá ngắn, vui lòng nhập trên 6 kí tự',
                'password.max' => 'mật khẩu bạn quá dài, vui lòng nhập dưới 25 kí tự',
            ]
        );
        if(Auth::attempt(array('username' => $req->username,'password' => $req->password), false, true))
        {
            return redirect()->back()->with(['flag'=>'success', 'thongbao'=>'Đăng nhập  thành công']);
        }
        else
        {
            return redirect()->back()->with(['flag'=>'danger', 'thongbao'=>'Tài khoản hoặc mật khẩu sai, vui lòng thử lại']);
        }
    }

    public function GetSignout()
    {
        $user = Auth::check();
        $id = Auth::user()['id'];
        $customer = Customer::where('id_user',$id)->first();
        $check = Sales_Channel::where('id_customer', $customer['id'])->get();
        if($check)
        {
            Auth::logout();
            return redirect()->route('page-home');
        }
        else
        {
            Auth::logout();
            return redirect()->route('page-home');
        }
        
    }

    public function GetChange($id)
    {
        $user = Customer::where('id', $id)->first();
        return view('PageDK.PageChangeInformation', compact('user'));
    }

    public function PostChange(Request $req)
    {
        $this->validate($req, 
            [
                'first_name' => 'required',
                'last_name' => 'required',
                'phone' => 'required|numeric',
                'image' => 'mimes:jpeg,png,jpg',
            ],
            [
                'phone.required' =>'bạn phải nhập số điện thoại',
                'phone.numeric' =>'số điện thoại phải nhập số',
                'first_name.required' => 'họ và chữ lót không được trống',
                'last_name.required' => 'tên không được trống',
                'address.min' => 'địa chỉ quá ngắn',
                'image.mimes' =>'tệp ảnh nền bạn chọn không đúng định dạng là ảnh',
            ]);
        if($req->password)
        {
            $this->validate($req, 
                [
                    'password' => 'min:6|max:25'
                ],
                [
                    'password.min' => 'mật khẩu bạn quá ngắn, vui lòng nhập trên 6 kí tự',
                    'password.max' => 'mật khẩu bạn quá dài, vui lòng nhập dưới 25 kí tự',
                ]);
        }
        $customer = Customer::where('id', $req->id)->first();
        $customer->first_name = $req->first_name;
        $customer->last_name = $req->last_name;
        $customer->phone = $req->phone;
        $customer->age = $req->age;
        $customer->address = $req->address;
        if($req->password)
        {
            $pass = User::where('id', $customer->id_user)->first();
            $pass->password = Hash::make($req->password);
            $pass->save();
        }
        if($req->image)
        {
            $files = $req->file('image')->getClientOriginalName();
            $customer->image = time().'.'.$files;
            $image = $req->image;
            $image->move(public_path('resources/UploadImage/Image'), time().'.'.$files);
        }
        $customer->save();
        return redirect()->back()->with('thongbaos', 'Cập nhật thành công');
    }

    public function PostSigninChannel(Request $req)
    {
        $sales_channel = new Sales_Channel;
        $sales_channel->id_customer = $req->id_customer;
        $sales_channel->save();
        return redirect()->back()->with('thongbaos', 'Đăng kí kênh bán hàng thành công');
    }
}
