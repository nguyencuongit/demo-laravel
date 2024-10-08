<?php

use App\Http\Controllers\Admin\Admincontroller;
use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Order\OrderController;
use App\Http\Controllers\Admin\Product\ProductController;
use App\Http\Controllers\Admin\User\UserController;
use App\Http\Controllers\frontend\Cart\CartController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\Product\DetailController;
use App\Http\Controllers\TestController;
use GuzzleHttp\Middleware;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;
use PHPUnit\TextUI\XmlConfiguration\Group;

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
Route::get('/test', [TestController::class, "test"]);
Route::post('/test', [TestController::class, "testForm"]);



Route::get('/login', [AuthController::class, "login"])->Middleware("login");
Route::post('/login', [AuthController::class, "postLogin"]);

Route::group(["prefix"=>"/admin", 'middleware'=>"logout"], function(){
    Route::get('/', [Admincontroller::class, "index"]);
    Route::get('/logout', [AuthController::class, "logout"]);

    Route::group(["prefix"=>"product"], function(){
        Route::get('/', [ProductController::class, "index"]);

        Route::post('/store', [ProductController::class, "store"]);
        Route::get('/create', [ProductController::class, "create"]);

        Route::get('/edit/{id}', [ProductController::class, "edit"]);
        Route::post('/update/{id}', [ProductController::class, "update"]);

        Route::get('/delete/{id}', [ProductController::class, "delete"]);
    });

    Route::group(["prefix"=>"category"], function(){
        Route::get('/', [CategoryController::class, "index"]);

        Route::post('/store', [CategoryController::class, "store"]);

        Route::get('/edit/{id}', [CategoryController::class, "edit"]);
        Route::post('/update/{id}', [CategoryController::class, "update"]);

        Route::get('/delete/{id}', [CategoryController::class, "delete"]);
    });

    Route::group(["prefix"=>"user"], function(){
        Route::get('/', [UserController::class, "index"]);

        Route::post('/store', [UserController::class, "store"]);
        Route::get('/create', [UserController::class, "create"]);

        Route::get('/edit/{id}', [UserController::class, "edit"]);
        Route::post('/update/{id}', [UserController::class, "update"]);

        Route::get('/delete/{id}', [UserController::class, "delete"]);
    });

    Route::group(["prefix"=>"order"], function(){
        Route::get('/', [OrderController::class, "index"]);

        Route::get('/detail', [OrderController::class, "detail"]);
    });
});

Route::group(["prefix" => "/home"], function(){
    Route::get('/', [HomeController::class, "index"]);
    Route::get('/about', [HomeController::class, "about"]);
    Route::get('/contact', [HomeController::class, "contact"]);
});


Route::get('/product/{id}', [DetailController::class, "detail"]);
Route::get('/shop', [DetailController::class, "shop"]);
Route::post('/filter', [DetailController::class, "filter"]);
Route::get('/getCat/{slug}', [DetailController::class, "getCat"]);



Route::get('/cart', [CartController::class, "cart"]);
Route::get('/cart/addcart/{id}', [CartController::class, "addToCart"]);
Route::get('/cart/updatecart/{rowId}/{qty}', [CartController::class, "updateCart"]);
Route::get('/cart/updatecart/{rowId}', [CartController::class, "deleteCart"]);

Route::get('/checkout', function(){
    return view("../frontend/checkout");
});

Route::get('/complete', function(){
    return view("../frontend/complete");
});


