<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\AuthController;
use App\Http\Controllers\Dashboard\SettingsController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|   note that the prefix for all the file route is "admin"
*/
Route::get('test' ,function (){
    return 'hello from admin';
});

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){

    Route::group(['namespace' => 'Dashboard' , 'middleware' => 'auth:admin','prefix' => 'admin'] , function (){

        // Dashboard
        Route::get('dashboard',[DashboardController::class,'index'])->name('admin.dashboard');

        // Settings
        Route::group(['prefix' => 'settings'],function (){

            Route::get('shipping_methods/{type}',[SettingsController::class,'editShippingMethods'])->name('edit.shipping.methods');
            Route::post('shipping_methods/{id}',[SettingsController::class,'updateShippingMethods'])->name('update.shipping.methods');

        });

        // Logout
        Route::get('logout',[AuthController::class,'logout'])->name('admin.logout');

    });

    Route::group(['namespace' => 'Dashboard' , 'middleware' => 'guest:admin','prefix' => 'admin'] , function (){

        Route::get('login',[AuthController::class,'login'])->name('admin.login');
        Route::post('login',[AuthController::class,'postLogin'])->name('admin.post.login');
    });

});




