<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Shop\ProductController;

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

Route::get('/', 'DashboardController@index')->name('dashboard.index');
Route::get('/shop/products/{product:slug}', [ProductController::class, 'show'])->name('shop-product.show');

Route::get('/carts', 'CartController@index')->name('carts.index');
Route::post('/add-to-cart/{product:id}', 'CartController@add')->name('carts.add');
Route::get('/remove/{product:id}', 'CartController@remove')->name('carts.remove');
Route::get('/remove-to-cart/{product:id}', 'CartController@destroy')->name('carts.destroy');
Route::put('/carts/update/{product:id}', 'CartController@update')->name('carts.update');

Route::middleware('auth')->group(function () {
    Route::get('/admin', 'HomeController@index')->name('home')->middleware(['admin_access']);
    Route::resource('users', 'UserController');
    

    Route::resource('categories', 'CategoryController');
    Route::resource('labels', 'LabelController');
    Route::resource('products', 'ProductController');
    Route::resource('billings', 'BillingAddressController');
    Route::resource('shippings', 'ShippingAddressController');

    Route::get('/checkout', 'CheckoutController@index')->name('checkouts.index');

    Route::get('confirm-delete/category/{category}', 'CategoryController@confirmDelete')->name('categories.confirm-delete');
    Route::get('confirm-delete/label/{label}', 'LabelController@confirmDelete')->name('labels.confirm-delete');
    Route::get('confirm-delete/product/{product}', 'ProductController@confirmDelete')->name('products.confirm-delete');
    Route::get('confirm-delete/users/{user}', 'UserController@confirmDelete')->name('users.confirm-delete');
});



Auth::routes();



