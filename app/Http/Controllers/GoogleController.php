<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    //Google Login
    public function redirectToGoogle(){
        return Socialite::driver('google')->redirect();
    }

    // //Google callback
    // public function handleGoogleCallback(){

    //     $user = Socialite::driver('google')->stateless()->user();

    //        $this->RegisterLogin($user);
    //        return redirect()->route('home');
    // }

    // public function RegisterLogin($data){
    //     $user = User::where('email', $data->email)->first();
    //     If(!$user){
    //         $user = new User();
    //         $user->name= $data->name;
    //         $user->email= $data->email;
    //         $user->provider_id= $data->id;
    //         $user->avatar= $data->avatar;
    //         $user->save();
    //     }
    //     Auth::login($user);
    // }
}
