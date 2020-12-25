<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/


Auth::routes();


///* Routes User Can Use *///

Route::get('/', 'HomeController@index')->name('home');
Route::get('Home/products/show/{id}', 'HomeController@singleProduct')->name('products.single'); // for users
Route::get('Home/products/search/result', 'ProductController@searchForProduct')->name('products.searchProduct'); // for users
// search by tags
Route::get('Home/products/search-by-tag/{tag}','ProductController@searchByTags')->name('products.searchByTags');
// get category product for users
Route::get('Home/category/{id}/products','HomeController@getCategory')->name('category.products'); //for users
// order routes for users
Route::post('Order/order-product','OrderController@store')->name('order.store');
// Route to show user profile
Route::get('Home/users/profile/{id}','HomeController@showProfile')->name('users.profile');





Route::middleware(['CheckRole', 'auth'])->group(function () {

    Route::get('dashboard/index', 'DashboardController@index')->name('dashboard.index');


    // User Routes in dashboard
    Route::get('dashboard/users', 'UserController@index')->name('users.index');
    Route::delete('users/delete/{id}','UserController@delete')->name('users.delete');
    Route::get('users/show/{id}','UserController@show')->name('users.show');
    Route::get('users/search','UserController@search')->name('users.search');
    Route::get('users/approved/{id}','UserController@approved')->name('users.approved');
    Route::post('users/update/{id}','UserController@update')->name('users.update');
    Route::get('users/be-admin/{id}','UserController@BeAdmin')->name('users.be-admin');
    Route::get('users/cancel-admin/{id}','UserController@CancelAdmin')->name('users.cancel-admin');



    // Category Routes in Dashboard
    Route::get('dashboard/categories', 'CategoriesController@index')->name('categories.index');
    Route::delete('categories/delete/{id}', 'CategoriesController@delete')->name('categories.delete');
    Route::post('categories/store', 'CategoriesController@store')->name('categories.store');
    Route::post('categories/update/{id}', 'CategoriesController@update')->name('categories.update');
    Route::get('categories/show/{id}', 'CategoriesController@show')->name('categories.show');



    // product route in dashboard
    Route::get('dashboard/products', 'ProductController@index')->name('products.index');
    Route::delete('dashboard/products/delete/{id}', 'ProductController@delete')->name('products.delete');
    Route::get('dashboard/products/search', 'ProductController@search')->name('products.search');
    Route::POST('dashboard/products/store', 'ProductController@store')->name('products.store');
    Route::get('dashboard/products/show/{id}', 'ProductController@show')->name('products.show');
    Route::get('dashboard/products/allow/{id}', 'ProductController@allow')->name('products.allow');
    Route::post('dashboard/products/update/{id}', 'ProductController@update')->name('products.update');


    // product images routes
     Route::post('dashboard/product-images/store','ProductImgsController@store')->name('productimgs.store');


    //Order products routes in dashboard

    Route::get('dashboard/orders','OrderController@index')->name('order.index');
    Route::delete('dashboard/order/delete/{id}','OrderController@delete')->name('order.delete');
    Route::get('dashboard/order/show/{id}','OrderController@show')->name('order.show');




});

