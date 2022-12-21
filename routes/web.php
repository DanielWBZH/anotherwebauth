<?php

use App\Http\Controllers\FacebookController;
use App\Http\Controllers\GithubController;
use App\Http\Controllers\GoogleController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

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

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


 //Google
Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle'])->name('login.google');
// Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);
Route::get('/auth/google/callback', function () {
    $user = Socialite::driver('google')->stateless()->user();
    $check = User::where('email', '=', $user->email)->first();
    if($check == false) {
        $check = new User();
        $check->name = $user->name;
        $check->email = $user->email;
        $check->provider_id = $user->id;
        $check->avatar = $user->avatar;
        $check->save();
    }
    Auth::login($check);
    return view('home');
});

//Github
Route::get('/auth/github', [GithubController::class, 'redirectToGithub'])->name('login.github');
// Route::get('/auth/github/callback', [GithubController::class, 'handleGithubCallback']);
Route::get('/auth/github/callback', function () {
    $user = Socialite::driver('github')->stateless()->user();
    $check = User::where('email', '=', $user->email)->first();
    if($check == false) {
        $check = new User();
        $check->name = $user->name;
        $check->email = $user->email;
        $check->provider_id = $user->id;
        $check->avatar = $user->avatar;
        $check->save();
    }
    Auth::login($check);
    return view('home');
});

