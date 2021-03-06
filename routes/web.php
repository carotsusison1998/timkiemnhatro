<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Http\Request;
use App\User;
use App\Area;
use App\Type_BoardingHouse;
use App\notifycations;
use App\Customer;

Route::get('', [
	'as'=>'page-home',
	'uses' =>'PageControllerHome@GetHome'
]);

Route::group(['prefix'=>''],function(){
	Route::get('/admin', [function(){
		$alluser = User::join('Customer', 'Customer.id_user', '=', 'users.id')->get();
		return view('PageAdmin.GetAccount',compact('alluser'));
	},'as'=>'admin']);

	Route::get('/type', [function(){
		$type = Type_BoardingHouse::get();
		return view('PageAdmin.Type.Get', compact('type'));
	}, 'as'=>'type']);


	Route::post('/type', [function(Request $req){
		$newtype = new Type_BoardingHouse;
		$newtype->name = $req->type;
		$newtype->save();
		return redirect()->back()->with('thongbao', 'Thêm thành công thể loại mới');
	}, 'as'=>'type']);


	Route::get('/area', [function(){
		$area = Area::get();
		return view('PageAdmin.Area.Get', compact('area'));
	}, 'as'=>'area']);

	Route::post('/area', [function(Request $req){
		$newarea = new Area;
		$newarea->name = $req->area;
		$newarea->save();
		return redirect()->back()->with('thongbao', 'Thêm khu vực thành công');
	}, 'as'=>'area']);
});


Route::get('about', [
	'as'=>'page-about',
	'uses' =>'PageControllerUser@GetAbout'
]);

Route::get('google-maps', [
	'as'=>'page-goolemaps',
	'uses' =>'PageControllerHome@GooleMaps'
]);

Route::get('contact', [
	'as'=>'page-contact',
	'uses' =>'PageControllerHome@GetContact'
]);
// product of client
Route::group(['prefix'=>''],function(){
	Route::get('product', [
		'as'=>'product',
		'uses' =>'PageControllerProduct@GetProductAll'
	]);

	Route::get('product-type/{id?}', [
		'as'=>'product-type',
		'uses' =>'PageControllerProduct@GetProductType'
	]);

	Route::get('product-filter', [
		'as'=>'product-filter',
		'uses' =>'PageControllerProduct@GetProductFilter'
	]);

	Route::get('product-detail/{id?}', [
		'as'=>'product-detail',
		'uses' =>'PageControllerProduct@GetProductDetail'
	]);

	Route::post('comment-product/{id_product}',[
		'as'=> 'comment-product',
		'uses'=> 'PageControllerProduct@CommentProduct'
	]);

	Route::post('repcomment-product/{id_comment}',[
		'as'=> 'repcomment-product',
		'uses'=> 'PageControllerProduct@RepCommentProduct'
	]);

});

Route::group(['prefix'=>''],function(){
	Route::get('motel-all', [
		'as'=>'motel-all',
		'uses' =>'PageControllerHome@GetMotelAll'
	]);

	Route::get('motel-type/{id?}', [
		'as'=>'motel-type',
		'uses' =>'PageControllerHome@GetMotelType'
	]);

	Route::get('motel-filter', [
		'as' => 'motel-filter',
		'uses' => 'PageControllerHome@GetFilter'
	]);

	Route::get('motel-detail/{id?}', [
		'as'=>'motel-detail',
		'uses' =>'PageControllerHome@GetMotelDetail'
	]);

	Route::post('comment-boardinghouse', [
		'as'=>'comment-boardinghouse',
		'uses' =>'PageControllerHome@PostCommentBoardingHouse'
	]);

	Route::post('repcomment-boardinghouse', [
		'as'=>'repcomment-boardinghouse',
		'uses' =>'PageControllerHome@PostRepCommentBoardingHouse'
	]);
});

// client cart 
Route::group(['prefix'=>''],function(){

	Route::get('shopping-cart', [
		'as'=>'get-shopping-cart',
		'uses' =>'PageControllerShoppingCart@GetShoppingCart'
	]);

	Route::get('order-boardinghouse/{id?}', [
		'as'=>'order-boardinghouse',
		'uses' =>'PageControllerShoppingCart@GetOrderBoarding'
	]);

	Route::post('order-boardinghouse', [
		'as'=>'order-boardinghouses',
		'uses' =>'PageControllerShoppingCart@PostShoppingCart'
	]);

	Route::get('ordered-boardinghouse/{id}', [
		'as'=>'ordered-boardinghouse',
		'uses' =>'PageControllerShoppingCart@GetOrderBoar'
	]);

	Route::get('shoppingcart/{id}/{name}', [
		'as'=>'shoppingcart',
		'uses'=> 'PageControllerShoppingCart@GetCartProduct'
	]);

	Route::get('remove-cart/{id}', [
		'as' => 'remove-cart',
		'uses' => 'PageControllerShoppingCart@RemoveCart'
	]);

	Route::get('update-cart/{id}/{qty}', [
		'as' => 'update-cart',
		'uses' => 'PageControllerShoppingCart@UpdateCart'
	]);

	Route::post('save-cart/{id}',[
		'as'=>'save-cart',
		'uses'=>'PageControllerShoppingCart@SaveCart'
	]);

	Route::get('clear-cart', [
		'as'=>'clear-cart',
		'uses'=>'PageControllerShoppingCart@ClearCart'
	]);

	Route::get('get-cart/{id}', [
		'as'=>'get-cart',
		'uses'=>'PageControllerProduct@GetCart'
	]);


});
// sales channel
Route::group(['prefix'=>''],function(){
	Route::get('sales-channel/{id?}', [
		'as'=>'sales-channel',
		'uses' =>'PageControllerSalesChannel@GetSaleChannel'
	]);

	Route::get('insert-boardinghouse', [
		'as'=>'insert-boardinghouse',
		'uses' =>'PageControllerSalesChannel@InsertBoardingHouse'
	]);

	Route::post('insert-boardinghouse', [
		'as'=>'insert-boardinghouse',
		'uses' =>'PageControllerSalesChannel@PostInsertBoardingHouse'
	]);

	Route::get('hrm-boardinghouse/{id?}', [
		'as'=>'hrm-boardinghouse',
		'uses' =>'PageControllerSalesChannel@HRMBoardingHouse'
	]);

	Route::get('detail-boardinghouse/{id?}', [
		'as'=>'detail-boardinghouse',
		'uses' =>'PageControllerSalesChannel@DetailBoardingHouse'
	]);

	Route::get('delete-boardinghouse/{id?}', [
		'as'=>'delete-boardinghouse',
		'uses' =>'PageControllerSalesChannel@DeleteBoardingHouse'
	]);

	Route::get('update-boardinghouse/{id?}', [
		'as'=>'update-boardinghousee',
		'uses' =>'PageControllerSalesChannel@UpdateBoardingHouse'
	]);

	Route::post('update-boardinghouse', [
		'as'=>'update-boardinghouse',
		'uses' =>'PageControllerSalesChannel@PostUpdateBoardingHouse'
	]);

	Route::get('deleteimage-boardinghouse/{id?}', [
		'as'=>'deleteimage-boardinghouse',
		'uses' =>'PageControllerSalesChannel@DelImageBoardingHouse'
	]);

	Route::post('confirm-boardinghouse', [
		'as'=>'confirm-boardinghouse',
		'uses' =>'PageControllerSalesChannel@PostConfirmBoardingHouse'
	]);

	Route::post('confirm-boardinghouse2', [
		'as'=>'confirm-boardinghouse2',
		'uses' =>'PageControllerSalesChannel@PostConfirmBoardingHouse2'
	]);

	Route::post('confirm-boardinghouse3', [
		'as'=>'confirm-boardinghouse3',
		'uses' =>'PageControllerSalesChannel@PostConfirmBoardingHouse3'
	]);

	Route::post('confirm-boardinghouse4', [
		'as'=>'confirm-boardinghouse4',
		'uses' =>'PageControllerSalesChannel@PostConfirmBoardingHouse4'
	]);

	Route::post('date-in/{id?}', [
		'as'=>'date-in',
		'uses' =>'PageControllerSalesChannel@Post_DateIn'
	]);

});
// sales channel
Route::group(['prefix'=>''],function(){
	Route::get('insert-product', [
		'as'=>'insert-product',
		'uses' =>'PageControllerSalesChannel@InsertProduct'
	]);

	Route::get('hrm-product/{id?}', [
		'as'=>'hrm-product',
		'uses' =>'PageControllerSalesChannel@GetProduct'
	]);
	
	Route::post('insert-product',[
		'as' => 'insert-product',
		'uses' => 'PageControllerSalesChannel@PostInsertProduct'
	]);
	Route::get('detail-product/{id}', [
		'as'=> 'detail-product',
		'uses'=> 'PageControllerProduct@DetailProduct'
	]);

	Route::get('product-update/{id?}', [
		'as'=>'product-update',
		'uses' =>'PageControllerProduct@GetProductUpdate'
	]);

	Route::get('delete-image/{id?}', [
		'as'=>'delete-image',
		'uses' =>'PageControllerProduct@DeleteImage'
	]);

	Route::post('product-update/{id?}',[
		'as'=>'product-update',
		'uses' =>'PageControllerProduct@PostProductUpdate'
	]);
});

Route::group(['prefix'=>''],function(){
	Route::get('sign-up', [
		'as'=>'sign-up',
		'uses' =>'PageControllerUser@GetSignup'
	]);

	Route::post('sign-up', [
		'as'=>'sign-up',
		'uses' =>'PageControllerUser@PostSignup'
	]);

	Route::post('sign-in', [
		'as'=>'sign-in',
		'uses' =>'PageControllerUser@PostSignin'
	]);

	Route::get('sign-out', [
		'as'=>'sign-out',
		'uses' =>'PageControllerUser@GetSignout'
	]);

	Route::post('sign-in-channel', [
		'as'=>'sign-in-channel',
		'uses' =>'PageControllerUser@PostSigninChannel'
	]);
	Route::get('change-information/{id}', [
		'as' => 'change-information',
		'uses' => 'PageControllerUser@GetChange'
	]);
	Route::post('change-information', [
		'as' => 'change-informations',
		'uses' => 'PageControllerUser@PostChange'
	]);
});

Route::get('all-motel/{id?}', [
	'as' => 'all-motel',
	'uses' => 'PageControllerHome@AllBoardingClient'
]);

Route::group(['prefix'=>''],function(){
	Route::get('search', [
		'as' => 'search',
		'uses' => 'PageControllerSearch@SearchBoarding'
	]);

	Route::get('search-motel', [
		'as' => 'search-motel',
		'uses' => 'PageControllerSearch@SearchBoardingClient'
	]);

	Route::get('search-product', [
		'as' => 'search-product',
		'uses' => 'PageControllerSearch@SearchProductClient'
	]);

	Route::get('get-district', [
		'as' => 'getdistrict',
		'uses' => 'PageControllerAjax@GetDistrict'
	]);

	Route::get('get-wards', [
		'as' => 'getwards',
		'uses' => 'PageControllerAjax@GetWards'
	]);

	Route::get('get-street', [
		'as' => 'getstreet',
		'uses' => 'PageControllerAjax@GetStreet'
	]);

	Route::get('get-money', [
		'as' => 'getmoney',
		'uses' => 'PageControllerAjax@GetMoney'
	]);

	Route::get('checknumber', [
		'as' => 'checknumber',
		'uses' => 'PageControllerAjax@CheckNumber'
	]);


	
});

// Route::get('/notifycations', function(){
// 	$user = Auth::check();
// 	$id = Auth::user()['id'];
// 	$customer = Customer::where('id_user',$id)->first();
// 	$notify = notifycations::where('id_customer', $customer->id)->get();

// 	echo "<pre>";
// 	print_r($notify);
// 	echo "</pre>";
// });
Route::group(['prefix'=>''],function(){
	Route::get('notice/{id_customer}', [
		'as' => 'notice',
		'uses' => 'PageControllerNotifycations@GetNotice'
	]);

	Route::get('remove-notice/{id_notice}', [
		'as' => 'removenotice',
		'uses' => 'PageControllerNotifycations@RemoveNotice'
	]);
});


// do not touch
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/auth/redirect/{provider}', 'LoginFacebook@redirect');
Route::get('/callback/{provider}', 'LoginFacebook@callback');
// 
