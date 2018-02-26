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
    # Home
Route::get('/home', 'HomeController@index')->name('home');
    # Profile
Route::get('/profile', 'ProfileController@profile')->name('profile');
Route::post('/profile', 'ProfileController@updateAvatar')->name('profile.updateAvatar');
    # Products
Route::get('/products', 'ProductsController@index')->name('products');
// Route::get('/products/add', 'ProductsController@addnew')->name('products.addnew');
Route::post('/products/submit/{id?}', 'ProductsController@submit')->name('products.submit');
// Route::get('/products/edit/{id?}', 'ProductsController@edit')->name('product.edit');
Route::get('/product/newEdit/{id?}', 'ProductsController@newEdit')->name('products.newEdit');
    # Categories
Route::get('/categories/index', 'CategoriesController@index')->name('categories');
Route::get('/categories/newEdit/{id?}', 'CategoriesController@newEdit')->name('categories.newEdit');
Route::post('/categories/submit/{id?}', 'CategoriesController@submit')->name('categories.submit');

Route::resource('photos', 'PhotoController');