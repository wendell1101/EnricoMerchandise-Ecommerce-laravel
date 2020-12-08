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


//orders
Route::get('/orders', 'OrderController@index')->name('orders.index');
Route::get('/orders/{order}', 'OrderController@show')->name('orders.show');
Route::post('/orders/store', 'OrderController@store')->name('orders.store');




Route::get('/shop/category/{category}', 'ShopCategoryController@show')->name('shop-categories.show');





Route::middleware('auth')->group(function () {
    Route::get('/admin', 'HomeController@index')->name('home')->middleware(['admin_access']);
    Route::resource('users', 'UserController');

    // Carts
    Route::get('/carts', 'CartController@index')->name('carts.index');
    Route::post('/add-to-cart/{product:id}', 'CartController@add')->name('carts.add');
    Route::get('/remove/{product:id}', 'CartController@remove')->name('carts.remove');
    Route::get('/remove-to-cart/{product:id}', 'CartController@destroy')->name('carts.destroy');
    Route::put('/carts/update/{product:id}', 'CartController@update')->name('carts.update');


    //payments
    Route::get('/payments/paypal', 'PaymentController@index')->name('payments.index');
    Route::put('/payments/update/{order}', 'PaymentController@update')->name('payments.update');

    //admin orders
    Route::get('/admin-orders', 'AdminOrderController@index')->name('admin-orders.index');
    Route::get('/admin-orders/{order:slug}', 'AdminOrderController@edit')->name('admin-orders.edit');
    Route::get('/admin-orders-show/{order:slug}', 'AdminOrderController@show')->name('admin-orders.show');
    Route::put('/admin-orders/update/{order:slug}', 'AdminOrderController@update')->name('admin-orders.update');
    Route::delete('/admin-orders/destroy/{order:slug}', 'AdminOrderController@destroy')->name('admin-orders.destroy');
    Route::get('confirm-delete/order/{order}', 'AdminOrderController@confirmDelete')->name('admin-orders.confirm-delete');

    //admin payments
    Route::get('/admin-payments', 'AdminPaymentController@index')->name('admin-payments.index');
    Route::delete('/admin-payments/{payment}', 'AdminPaymentController@destroy')->name('admin-payments.destroy');
    Route::get('confirm-delete/payment/{payment}', 'AdminPaymentController@confirmDelete')->name('admin-payments.confirm-delete');

    Route::resource('categories', 'CategoryController');
    Route::resource('labels', 'LabelController');
    Route::resource('products', 'ProductController')->middleware('admin_or_product_manager');
    Route::resource('billings', 'BillingAddressController');
    Route::post('/billing/store/previous', 'BillingAddressController@usePreviousAddress')->name('address.previous');
    Route::resource('shippings', 'ShippingAddressController');

    Route::get('/checkout', 'CheckoutController@index')->name('checkouts.index');

    Route::get('confirm-delete/category/{category}', 'CategoryController@confirmDelete')->name('categories.confirm-delete');
    Route::get('confirm-delete/label/{label}', 'LabelController@confirmDelete')->name('labels.confirm-delete');
    Route::get('confirm-delete/product/{product}', 'ProductController@confirmDelete')->name('products.confirm-delete');
    Route::get('confirm-delete/users/{user}', 'UserController@confirmDelete')->name('users.confirm-delete');
});



Auth::routes();

Route::get('auth/google', 'Auth\GoogleController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\GoogleController@handleGoogleCallback');