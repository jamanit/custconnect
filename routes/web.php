<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\C_user;
use App\Http\Controllers\C_profile;
use App\Http\Controllers\C_category;
use App\Http\Controllers\C_product;

Route::post('/language/switch', function (\Illuminate\Http\Request $request) {
    $locale = $request->input('locale', config('app.locale'));
    session(['locale' => $locale]);
    return redirect()->back();
})->name('language.switch');


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('users', C_user::class)->parameters([
        'users' => 'user:uuid'
    ]);

    Route::resource('categories', C_category::class)->parameters([
        'categories' => 'categories:uuid'
    ]);

    Route::resource('profile', C_profile::class);

    Route::resource('products', C_product::class);
});
