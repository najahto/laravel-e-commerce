<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\Client\ShoppingController;
use Illuminate\Support\Facades\Route;

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
// Route::get('/admin/dashboard',[AdminController::class,'dashboard']);
// Route::resource('categories', 'CategoryController');

// Admin routes
Route::group(
    [
        'namespace' => 'Admin',
        'prefix' => 'admin',
        // 'middleware' => ['auth'],
    ],
    function () {
        Route::get('dashboard', [PageController::class, 'dashboard'])->name('admin.dashboard');
        Route::resource('categories', '\App\Http\Controllers\Admin\CategoryController');
        Route::resource('products', '\App\Http\Controllers\Admin\ProductController');
        Route::get('product/{id}/activate', [ProductController::class, 'activateProduct'])->name('activate.product');
        Route::get('product/{id}/inactivate', [ProductController::class, 'inactivateProduct'])->name('inactivate.product');
        Route::resource('sliders', '\App\Http\Controllers\Admin\SliderController');
        Route::get('slider/{id}/activate', [SliderController::class, 'activateSlider'])->name('activate.slider');
        Route::get('slider/{id}/inactivate', [SliderController::class, 'inactivateSlider'])->name('inactivate.slider');
    }
);

// Frontend Routes
Route::get('/', [ClientController::class, 'home'])->name('home');
Route::get('/shop', [ClientController::class, 'shop']);
Route::get('/product-detail/{id}', [ClientController::class, 'productDetail'])->name('product-detail');
Route::get('/cart', [ShoppingController::class, 'cart'])->name('cart');
Route::get('/add-to-cart/{id}', [ShoppingController::class, 'addToCart'])->name('add-to-cart');
Route::post('/update-quantity/{id}', [ShoppingController::class, 'updateQuantity'])->name('update-quantity');
Route::get('/remove-from-cart/{id}', [ShoppingController::class, 'removeFromCart'])->name('remove-from-cart');
Route::get('/checkout', [ShoppingController::class, 'checkout']);


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

// require __DIR__.'/auth.php';