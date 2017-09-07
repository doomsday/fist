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

//Route::get('/', function () {
//    return view('welcome');
//});

use Illuminate\Support\Facades\Route;

Route::get('/', function() {
    return redirect('cats');
});

Route::get('cats', function() {
    $cats = Furbook\Cat::all();
    return view('cats.index')->with('cats', $cats);
});

Route::get('cats/{id}', function($id) {
    return sprintf('Cat #%s', $id);
})->where('id', '[0-9]+');

Route::get('cats/breeds/{name}', function($name) {
   $breed = Furbook\Breed::with('cats')->whereName($name)->first();
   return view('cats.index')->with('breed', $breed)->with('cats', $breed->cats);
});

Route::get('about', function(){
    return view('about')->with('number_of_cats', 9000);
});