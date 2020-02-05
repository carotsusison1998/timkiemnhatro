<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Socialite;
use App\User;
use App\Customer;

class LoginFacebook extends Controller
{
	public function redirect($provider)
	{
		return Socialite::driver($provider)->redirect();
	}
	public function callback($provider)
	{
		$getInfo = Socialite::driver($provider)->stateless()->user(); 
		$user = $this->createUser($getInfo,$provider); 
		auth()->login($user); 
		return redirect()->back();
	}
	function createUser($getInfo,$provider){
		$user = User::where('provider_id', $getInfo->id)->first();
		if (!$user) {
			$user = User::create([
				'name'     => $getInfo->name,
				'email'    => $getInfo->email,
				'provider' => $provider,
				'provider_id' => $getInfo->id,
				'password' => "aaaosjfailmialnclsaicmlaia",
				'token' => "asakmalasmdfiaomfioanguoanmgvolanboao"
			]);

			$customer = new Customer;
			$customer->id_user = $user->id;
			$customer->first_name = "Tran";
			$customer->last_name = $getInfo->name;
			$customer->email = "tnduy@gmail.com";
			$customer->save();
		}
		return $user;
	}
}
