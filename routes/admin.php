<?php

use App\Http\Controllers\Dashboard\TagsController;
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

    Route::group(['namespace' => 'App\Http\Controllers\Dashboard' , 'middleware' => 'auth:admin','prefix' => 'admin'] , function (){

        // Dashboard
        Route::get('dashboard',[DashboardController::class,'index'])->name('admin.dashboard');

        // Settings
        Route::group(['prefix' => 'settings'],function (){
            Route::get('shipping_methods/{type}',[SettingsController::class,'editShippingMethods'])->name('edit.shipping.methods');
            Route::post('shipping_methods/{id}',[SettingsController::class,'updateShippingMethods'])->name('update.shipping.methods');
        });

        // Profile
        Route::group(['prefix' => 'profile'],function (){
            Route::get('edit',[ProfileController::class,'edit'])->name('admin.edit.profile');
            Route::put('update',[ProfileController::class,'update'])->name('admin.update.profile');
        });

        // Logout
        Route::get('logout',[AuthController::class,'logout'])->name('admin.logout');

        ############################### Start Categories Routes ###############################

        Route::group(['prefix' => 'categories'],function (){
            Route::get('/index/{type}',[CategoriesController::class,'index'])->name('admin.index.categories');
            Route::get('create/{type}',[CategoriesController::class,'create'])->name('admin.create.categories');
            Route::post('store/{type}',[CategoriesController::class,'store'])->name('admin.store.categories');
            Route::get('edit/{type}/{id}',[CategoriesController::class,'edit'])->name('admin.edit.categories');
            Route::put('update/{type}/{id}',[CategoriesController::class,'update'])->name('admin.update.categories');
            Route::get('delete/{type}/{id}',[CategoriesController::class,'delete'])->name('admin.delete.categories');
        });

        ###############################  End Categories Routes  ###############################

        ################################# Start Brands Routes #################################

        Route::group(['prefix' => 'brands'],function (){
            Route::get('/index',[BrandsController::class,'index'])->name('admin.index.brands');
            Route::get('create',[BrandsController::class,'create'])->name('admin.create.brands');
            Route::post('store',[BrandsController::class,'store'])->name('admin.store.brands');
            Route::get('edit/{id}',[BrandsController::class,'edit'])->name('admin.edit.brands');
            Route::put('update/{id}',[BrandsController::class,'update'])->name('admin.update.brands');
            Route::get('delete/{id}',[BrandsController::class,'delete'])->name('admin.delete.brands');
        });

        #################################  End Brands Routes  #################################

        ################################# Start Tags Routes #################################

        Route::resource('tags', TagsController::class)->except(['show','destroy'])->names([
            'index' => 'admin.index.tags',
            'create' => 'admin.create.tags',
            'store' => 'admin.store.tags',
            'edit' => 'admin.edit.tags',
            'update' => 'admin.update.tags',
        ]);
        Route::get('tags/delete/{id}', [TagsController::class, 'destroy'])->name('admin.delete.tags');


        #################################  End Tags Routes  #################################
    });

    Route::group(['namespace' => 'App\Http\Controllers\Dashboard' , 'middleware' => 'guest:admin','prefix' => 'admin'] , function (){

        Route::get('login',[AuthController::class,'login'])->name('admin.login');
        Route::post('login',[AuthController::class,'postLogin'])->name('admin.post.login');
    });
});




