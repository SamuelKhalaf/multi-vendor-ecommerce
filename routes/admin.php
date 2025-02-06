<?php

use App\Http\Controllers\Dashboard\AttributeController;
use App\Http\Controllers\Dashboard\AuthController;
use App\Http\Controllers\Dashboard\BrandsController;
use App\Http\Controllers\Dashboard\CategoriesController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\OptionController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\ProfileController;
use App\Http\Controllers\Dashboard\SettingsController;
use App\Http\Controllers\Dashboard\SliderImageController;
use App\Http\Controllers\Dashboard\TagsController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|   note that the prefix for all the file route is "admin"
*/
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

        ################################# Start Products Routes #################################
        Route::group(['prefix' => 'products'], function () {
            Route::get('/',              [ProductController::class,'index'])             ->name('admin.products');
            Route::get('general',        [ProductController::class,'create'])            ->name('admin.products.general.create');
            Route::post('store-general', [ProductController::class,'store'])             ->name('admin.products.general.store');

            Route::get('price/{id}',     [ProductController::class,'getPrice'])          ->name('admin.products.price');
            Route::post('price',         [ProductController::class,'saveProductPrice'])  ->name('admin.products.price.store');

            Route::get('stock/{id}',     [ProductController::class,'getStock'])          ->name('admin.products.stock');
            Route::post('stock',         [ProductController::class,'saveProductStock'])  ->name('admin.products.stock.store');

            Route::get('images/{id}',    [ProductController::class,'addImages'])          ->name('admin.products.images');
            Route::post('images',        [ProductController::class,'saveProductImages'])  ->name('admin.products.images.store');
            Route::post('images/db',     [ProductController::class,'saveProductImagesDB'])->name('admin.products.images.store.db');
        });
        #################################  End Products Routes  #################################

        ################################## attributes routes ######################################
        Route::group(['prefix' => 'attributes'], function () {
            Route::get('/', [AttributeController::class,'index'])->name('admin.attributes');
            Route::get('create', [AttributeController::class,'create'])->name('admin.attributes.create');
            Route::post('store', [AttributeController::class,'store'])->name('admin.attributes.store');
            Route::get('edit/{id}', [AttributeController::class,'edit'])->name('admin.attributes.edit');
            Route::post('update/{id}', [AttributeController::class,'update'])->name('admin.attributes.update');
            Route::get('delete/{id}', [AttributeController::class,'destroy'])->name('admin.attributes.delete');
        });
        ################################## end attributes    #######################################

        ################################## start options ######################################
        Route::group(['prefix' => 'options'], function () {
            Route::get('/', [OptionController::class,'index'])->name('admin.options');
            Route::get('create', [OptionController::class,'create'])->name('admin.options.create');
            Route::post('store', [OptionController::class,'store'])->name('admin.options.store');
            Route::get('edit/{id}', [OptionController::class,'edit'])->name('admin.options.edit');
            Route::post('update/{id}', [OptionController::class,'update'])->name('admin.options.update');
            Route::get('delete/{id}',[OptionController::class,'destroy']) -> name('admin.options.delete');
        });
        ################################## end options    #######################################

        ################################## sliders ######################################
        Route::group(['prefix' => 'sliders'], function () {
            Route::get('/', [SliderImageController::class,'addImages'])->name('admin.sliders.create');
            Route::post('images', [SliderImageController::class,'saveSliderImages'])->name('admin.sliders.images.store');
            Route::post('images/db', [SliderImageController::class,'saveSliderImagesDB'])->name('admin.sliders.images.store.db');

        });
        ################################## end sliders    #######################################
    });

    Route::group(['namespace' => 'App\Http\Controllers\Dashboard' , 'middleware' => 'guest:admin','prefix' => 'admin'] , function (){

        Route::get('login',[AuthController::class,'login'])->name('admin.login');
        Route::post('login',[AuthController::class,'postLogin'])->name('admin.post.login');
    });
});




