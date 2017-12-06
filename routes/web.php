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

use Furbook\Cat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// ========= REDIRECTS =========

// GET '/'
Route::get('/', function() {
    return redirect('cat');
});

// ========= RESOURCES =========

// Register default routes that will be handled in 'CatController'.
Route::resource('cat', 'CatController');

// ========= ROUTES =========

// GET '/cat/breeds/{name}'
Route::get('cat/breeds/{name}', 'CatController@catBreeds');

// GET '/cat/{cat}/delete
Route::get('cat/{cat}/delete', 'CatController@catDelete');

// GET '/about'
Route::get('about', 'HomeController@about');

// GET '/home'
Route::get('/home', 'HomeController@index')->name('home');

// GET 'user/{id}'
Route::get('user/{id}', 'UserController@show');

Auth::routes();
