<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderItemController;

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
    return view('index');
});

 //user routes
 Route::get('/user', [UserController::class, 'index']);
 Route::get('/user/create', [UserController::class, 'create']);
 Route::post('/user', [UserController::class, 'store']);
 Route::get('/user/edit/{id}', [UserController::class, 'edit']);
 Route::put('/user/{id}', [UserController::class, 'update']);
 Route::delete('/user/{id}', [UserController::class, 'destroy']);

  //category routes
  Route::get('/category', [CategoryController::class, 'index']);
  Route::get('/category/create', [CategoryController::class, 'create']);
  Route::post('/category', [CategoryController::class, 'store']);
  Route::get('/category/edit/{id}', [CategoryController::class, 'edit']);
  Route::put('/category/{id}', [CategoryController::class, 'update']);
  Route::delete('/category/{id}', [CategoryController::class, 'destroy']);

  //product routes
  Route::get('/product', [ProductController::class, 'index']);
  Route::get('/product/create', [ProductController::class, 'create']);
  Route::post('/product', [ProductController::class, 'store']);
  Route::get('/product/edit/{id}', [ProductController::class, 'edit']);
  Route::put('/product/{id}', [ProductController::class, 'update']);
  Route::delete('/product/{id}', [ProductController::class, 'destroy']);

  //order routes
  Route::get('/order', [OrderController::class, 'index']);
  Route::get('/order/create', [OrderController::class, 'create']);
  Route::post('/order', [OrderController::class, 'store']);
  Route::get('/order/edit/{id}', [OrderController::class, 'edit']);
  Route::put('/order/{id}', [OrderController::class, 'update']);
  Route::delete('/order/{id}', [OrderController::class, 'destroy']);

  //orderItem routes
  Route::get('/orderItem', [OrderItemController::class, 'index']);
  Route::get('/orderItem/create', [OrderItemController::class, 'create']);
  Route::post('/orderItem', [OrderItemController::class, 'store']);
  Route::get('/orderItem/edit/{id}', [OrderItemController::class, 'edit']);
  Route::put('/orderItem/{id}', [OrderItemController::class, 'update']);
  Route::delete('/orderItem/{id}', [OrderItemController::class, 'destroy']);