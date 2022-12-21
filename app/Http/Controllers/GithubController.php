<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;


class GithubController extends Controller
{
    //Github Login
    public function redirectToGithub(){
        return Socialite::driver('github')->redirect();
    }

    // //github callback
    // public function handleGithubCallback(){

    //     $user = Socialite::driver('github')->stateless()->user();

    //        $this->RegisterLogin($user);
    //        return redirect()->route('home');
    // }

    // protected function RegisterLogin($data){
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
