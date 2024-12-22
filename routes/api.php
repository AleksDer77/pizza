<?php

use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TestController;
use App\Http\Middleware\AdminMiddleware;
use App\Services\CartService\CartService;
use Illuminate\Support\Facades\Route;


Route::prefix('home')->group(function () {
    Route::get('/', [CategoryController::class, 'index'])->name('home');
    Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('home.categories');
    Route::get('/products/{id}', [ProductController::class, 'show'])->name('home.product');
});

Route::controller(AuthController::class)->group(function () {
    Route::post('/register', 'register')->name('register');
    Route::post('/login', 'login')->name('login');
    Route::post('/logout', 'logout')->name('logout')->middleware('auth:sanctum');
});

Route::group(['prefix' => 'carts'], function () {
    Route::get('', [CartController::class, 'index'])->name('cart.index');
//    Route::get('/', function (CartService $service) {
//        return $service->getCart();
//    });
    Route::post('/{id}', [CartController::class, 'addToCart'])->name('cart.addToCart');
});

Route::controller(AdminProductController::class)->middleware( 'admin')->prefix('admin')->group(function () {
    Route::get('products', 'index')->name('admin.products.index');
});

Route::get('test', TestController::class)->middleware(['auth:sanctum', 'admin']);
