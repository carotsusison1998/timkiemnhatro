<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Auth;
use App\Customer;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('header', function($view){
            $user = Auth::check();
            $id = Auth::user()['id'];
            $customer = Customer::where('id_user',$id)->first();
            $view->with('customer', $customer);
        });

        view()->composer('PageSaleChannel.header', function($view){
            $user = Auth::check();
            $id = Auth::user()['id'];
            $customer = Customer::where('id_user',$id)->first();
            $view->with('customer', $customer);
        });

        view()->composer('PageSaleChannel.personal', function($view){
            $user = Auth::check();
            $id = Auth::user()['id'];
            $customer = Customer::where('id_user',$id)->first();
            $view->with('customer', $customer);
        });

        view()->composer('PageLayoutForDetail.header', function($view){
            $user = Auth::check();
            $id = Auth::user()['id'];
            $customer = Customer::where('id_user',$id)->first();
            $view->with('customer', $customer);
        });

        view()->composer('PageSaleChannel.PageHomeSaleChannel.PageInsertBoardingHouse', function($view){
            $user = Auth::check();
            $id = Auth::user()['id'];
            $customer = Customer::where('id_user',$id)->first();
            $view->with('customer', $customer);
        });

        view()->composer('PageSaleChannel.PageHomeSaleChannel.PageDetailBoardingHouse', function($view){
            $user = Auth::check();
            $id = Auth::user()['id'];
            $customer = Customer::where('id_user',$id)->first();
            $view->with('customer', $customer);
        });

        view()->composer('PageSaleChannel.PageHomeSaleChannel.PageUpdateBoardingHouse', function($view){
            $user = Auth::check();
            $id = Auth::user()['id'];
            $customer = Customer::where('id_user',$id)->first();
            $view->with('customer', $customer);
        });
        view()->composer('PageSaleChannel.personal2', function($view){
            $user = Auth::check();
            $id = Auth::user()['id'];
            $customer = Customer::where('id_user',$id)->first();
            $view->with('customer', $customer);
        });

        view()->composer('PageSaleChannel.PageProductChannel.PageInsertProduct', function($view){
            $user = Auth::check();
            $id = Auth::user()['id'];
            $customer = Customer::where('id_user',$id)->first();
            $view->with('customer', $customer);
        });
    }
}
