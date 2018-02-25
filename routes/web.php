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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile', 'ProfileController@profile')->name('profile');
Route::post('/profile', 'ProfileController@updateAvatar')->name('profile.updateAvatar');
Route::get('/products', 'ProductsController@index')->name('products');
Route::get('/products/add', 'ProductsController@addnew')->name('products.addnew');
Route::post('/products/submit/{id?}', 'ProductsController@submit')->name('products.submit');
Route::get('/products/edit/{id?}', 'ProductsController@edit')->name('product.edit');

Route::resource('photos', 'PhotoController');