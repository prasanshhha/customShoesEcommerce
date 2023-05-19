<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\UserPagesController;
use App\Http\Controllers\UserOrderController;


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

Route::get('/', [UserPagesController::class, 'homepage'])->name('home');
Route::get('/search', [UserPagesController::class, 'search']);
Route::get('/viewProduct/{id}', [UserPagesController::class, 'viewProduct']);

Route::middleware(['auth'])->group(function () {
    Route::get('/addToCart/{id}', [UserOrderController::class, 'addToCart']);
    Route::get('/addToWishlist/{id}', [UserOrderController::class, 'addToWishlist']);
    Route::get('/cart', [UserPagesController::class, 'cart']);
    Route::get('/wishList', [UserPagesController::class, 'wishList']);
    Route::get('/removeFromWishlist/{id}', [UserOrderController::class, 'removeFromWishlist']);
    Route::get('/removeFromCart/{id}', [UserOrderController::class, 'removeFromCart']);
    Route::get('/updateQuantity', [UserOrderController::class, 'updateQuantity']);
    Route::get('/checkout', [UserPagesController::class, 'checkout']);
});

Route::name('categories.')->group(function(){
    Route::get('/categories/all', [UserPagesController::class, 'allCategories'])->name('all');
    Route::get('/category/{id}', [UserPagesController::class, 'selectedCategory']);
});

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/signUp', [AuthController::class, 'signUp'])->name('signUp');
Route::post('/login', [AuthController::class, 'handleLogin'])->name('handleLogin');
Route::post('/signUp', [AuthController::class, 'handleSignUp'])->name('handleSignUp');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin Routes
Route::middleware(['role:admin'])->name('admin.')->prefix('admin')->group(function(){
    Route::get('/dashboard', [AdminDashboardController::class, 'dashboard'])->name('dashboard');
    Route::resource('user', UserController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('product', ProductController::class);
    Route::resource('order', OrderController::class);
    Route::resource('orderItem', OrderItemController::class);
    Route::get('/order/toggleStatus/{id}', [OrderController::class, 'toggleStatus']);
});

