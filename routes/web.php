<?php

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

Auth::routes();
// Admin Routes
    # Home
Route::get('/admin/home', 'HomeController@index')->name('home');
    # Profile
Route::get('/profile', 'ProfileController@profile')->name('profile');
Route::post('/profile', 'ProfileController@updateAvatar')->name('profile.updateAvatar');
    # Products
Route::get('/admin/products', 'ProductsController@index')->name('products');
Route::post('/admin/products/submit/{id?}', 'ProductsController@submit')->name('products.submit');
Route::get('/admin/product/newEdit/{id?}', 'ProductsController@newEdit')->name('products.newEdit');
Route::post('/admin/product/delete/{id?}', 'ProductsController@delete')->name('product.delete');
    # Categories
Route::get('/admin/categories/index', 'CategoriesController@index')->name('categories');
Route::get('/admin/categories/newEdit/{id?}', 'CategoriesController@newEdit')->name('categories.newEdit');
Route::post('/admin/categories/submit/{id?}', 'CategoriesController@submit')->name('categories.submit');
Route::post('/admin/categories/delete/{id?}', 'CategoriesController@delete')->name('categories.delete');

// Client routes

Route::get('/home', 'ShopController@index')->name('home');
Route::post('/addToCart', 'ShopController@addToCart')->name('product.addToCart');
Route::get('/shoppingCart', 'ShopController@shoppingCart')->name('product.shoppingCart');
Route::get('/category/{id}', 'ShopController@category')->name('product.category');
Route::post('/search', 'ShopController@search')->name('product.search');

Route::resource('photos', 'PhotoController');