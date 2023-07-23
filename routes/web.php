<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserPagesController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserOrderController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\CustomShoeController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\AdminDashboardController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;


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

//Email Verification
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
 
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

//Reset Password
Route::middleware(['guest'])->name('password.')->group(function(){
    Route::get('/forgot-password', [ForgotPasswordController::class, 'forgotPassword'])->middleware('guest')->name('request');
    Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLink'])->middleware('guest')->name('email');
    Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'resetPassword'])->middleware('guest')->name('reset');
    Route::post('/reset-password', [ForgotPasswordController::class, 'updatePassword'])->middleware('guest')->name('update');
});

//Logged In routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/user-orders', [UserPagesController::class, 'userOrders'])->name('user-orders');
    Route::get('/cart', [UserPagesController::class, 'cart']);
    Route::get('/wishList', [UserPagesController::class, 'wishList']);
    Route::get('/addToCart/{id}', [UserOrderController::class, 'addToCart']);
    Route::get('/addToWishlist/{id}', [UserOrderController::class, 'addToWishlist']);
    Route::get('/removeFromCart/{id}', [UserOrderController::class, 'removeFromCart']);
    Route::get('/removeFromWishlist/{id}', [UserOrderController::class, 'removeFromWishlist']);
    Route::get('/removeCustomFromCart/{id}', [UserOrderController::class, 'removeCustomFromCart']);
    Route::get('/updateQuantity', [UserOrderController::class, 'updateQuantity']);
    Route::get('/updateCustomQuantity', [UserOrderController::class, 'updateCustomQuantity']);
    Route::get('/customize', [CustomShoeController::class, 'customize'])->name('customize');
    Route::get('/customize/{id}', [CustomShoeController::class, 'getTemplate']);
    Route::post('/customize/{id}', [CustomShoeController::class, 'customizeTemplate']);
    Route::post('/addToCart/custom/{id}', [UserOrderController::class, 'addCustomShoeToCart']);
    Route::get('/checkout', [UserPagesController::class, 'checkout']);
    Route::get('order-details/{id}', [UserPagesController::class, 'orderDetails']);
    Route::post('/place-order/{id}', [PaymentController::class, 'placeOrder']);
    Route::post('/place-order-esewa/{id}', [PaymentController::class, 'esewaPay']);
    Route::get('/success', [UserPagesController::class, 'esewaPaySuccess']);
    Route::get('/failure', [UserPagesController::class, 'esewaPayFailed']);
});

Route::name('categories.')->group(function(){
    Route::get('/categories/all', [UserPagesController::class, 'allCategories'])->name('all');
    Route::get('/category/{id}', [UserPagesController::class, 'selectedCategory']);
});

//Authentication
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/signUp', [AuthController::class, 'signUp'])->name('signUp');
Route::post('/login', [AuthController::class, 'handleLogin'])->name('handleLogin');
Route::post('/signUp', [AuthController::class, 'handleSignUp'])->name('handleSignUp');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin Routes
Route::middleware(['role:admin', 'verified'])->name('admin.')->prefix('admin')->group(function(){
    Route::get('/dashboard', [AdminDashboardController::class, 'dashboard'])->name('dashboard');
    Route::resource('user', UserController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('product', ProductController::class);
    Route::resource('order', OrderController::class);
    Route::resource('orderItem', OrderItemController::class);
    Route::get('/order/toggleStatus/{id}', [OrderController::class, 'toggleStatus']);
});