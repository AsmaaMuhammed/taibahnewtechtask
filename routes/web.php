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

Route::get('/', 'WelcomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/products', 'ProductController@index');
Route::group(['prefix' => 'admin'], function () {
    Route::get('/add-provider', 'ProviderAuth\RegisterController@showRegistrationForm')->name('register');
    Route::post('/add-provider', 'ProviderAuth\RegisterController@register');
});
Route::group(['prefix' => 'client'], function () {
  Route::get('/login', 'ClientAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'ClientAuth\LoginController@login');
  Route::post('/logout', 'ClientAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'ClientAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'ClientAuth\RegisterController@register');

  Route::post('/password/email', 'ClientAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'ClientAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'ClientAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'ClientAuth\ResetPasswordController@showResetForm');
  //Route::get('/product/{id}', 'ProductController@showProduct');
  Route::get('/add-to-cart/{id}', 'ProductController@addToCart');
    Route::get('cart', 'ProductController@cart');
});

Route::group(['prefix' => 'provider' ], function () {
  Route::get('/login', 'ProviderAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'ProviderAuth\LoginController@login');
  Route::post('/logout', 'ProviderAuth\LoginController@logout')->name('logout');
  Route::post('/password/email', 'ProviderAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'ProviderAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'ProviderAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'ProviderAuth\ResetPasswordController@showResetForm');
  Route::post('/add-product', 'ProductController@create');
});
