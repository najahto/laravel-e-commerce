<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
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

Route::group(
    [
        'namespace' => 'Admin',
        'prefix' => 'admin',
        // 'middleware' => ['auth'],
    ],
    function () {
        Route::get('dashboard', [PageController::class,'dashboard'])->name('admin.dashboard');
        Route::resource('categories', '\App\Http\Controllers\Admin\CategoryController');
        Route::resource('products', '\App\Http\Controllers\Admin\ProductController');
        Route::resource('sliders', '\App\Http\Controllers\Admin\SliderController');
    }
);


Route::get('/', [ClientController::class, 'home']);
Route::get('/shop', [ClientController::class, 'shop']);
Route::get('/cart', [ClientController::class, 'cart']);
Route::get('/checkout', [ClientController::class, 'checkout']);


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

// require __DIR__.'/auth.php';
