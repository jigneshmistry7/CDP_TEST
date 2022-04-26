<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\ProductsController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


//Admin
Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){
    Route::namespace('Auth')->middleware('guest:admin')->group(function(){
        //Login Route
        Route::get('login','AuthenticatedSessionController@create')->name('login');
        
        Route::post('login','AuthenticatedSessionController@store')->name('adminlogin');
        Route::get('register','RegisteredAdminController@create')->name('register');
        Route::post('register','RegisteredAdminController@store')->name('adminregister');

    });

    Route::middleware('admin')->group(function(){
        Route::get('dashboard','HomeController@index')->name('dashboard');
        Route::get('/products',[ProductController::class,'index'])->name('products.index');
        Route::get('/products/create',[ProductController::class,'create'])->name('products.create');
        Route::post('/products',[ProductController::class,'store'])->name('products.store');
        // Route::get('/products/{id}',[ProductController::class,'show'])->name('products.show');
        Route::get('/products/{id}',[ProductController::class,'edit'])->name('products.edit');
        Route::put('/products/{id}',[ProductController::class,'update'])->name('products.update');
        Route::delete('/product/{id}',[ProductController::class,'destroy'])->name('products.destroy');
        Route::get('/product/deactivate/{id}',[ProductController::class,'deactivate'])->name('products.deactivate');
        Route::get('/product/activate/{id}',[ProductController::class,'activate'])->name('products.activate');

        
    });
    
    Route::post('logout','Auth\AuthenticatedSessionController@destroy')->name('logout');

});

//User
Route::name('user.')->group(function(){
    Route::middleware('auth')->group(function(){
        Route::get('/products',[ProductsController::class,'index'])->name('products.index'); 
    });
});