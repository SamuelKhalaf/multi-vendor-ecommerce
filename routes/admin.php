<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\LoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|   note that the prefix for all the file route is "admin"
*/
Route::get('test' ,function (){
    return 'hello from admin';
});
Route::group(['namespace' => 'Dashboard' , 'middleware' => 'auth:admin'] , function (){

    Route::get('dashboard',[DashboardController::class,'index'])->name('admin.dashboard');
});

Route::group(['namespace' => 'Dashboard' , 'middleware' => 'guest:admin'] , function (){

    Route::get('login',[LoginController::class,'login'])->name('admin.login');
    Route::post('login',[LoginController::class,'postLogin'])->name('admin.post.login');

});

