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

// Redirects

Route::get('/', function() {
    return redirect('cats');
});

Route::post('cats', function() {
    $cat = Furbook\Cat::create(Input::all());  // Input::all() - retrieve an array of all the input data.
    return redirect('cats/'.$cat->id)->withSuccess('Cat has been created.');
});

Route::put('cats/{cat}', function(Furbook\Cat $cat) {
    $cat->update(Input::all());
    return redirect('cats/'.$cat->id)->withSuccess('Cat has been updated.');
});

Route::delete('cats/{cat}', function(Furbook\Cat $cat) {
    $cat->delete();
    return redirect('cats')->withSuccess('Cat has been deleted.');
});

// Views

Route::get('cats', function() {
    $cats = Furbook\Cat::all();
    return view('cats.index')->with('cats', $cats);
});

Route::get('cats/create', function() {
    return view('cats.create');
});

Route::get('cats/{cat}/edit', function(Furbook\Cat $cat) {
    return view('cats.edit')->with('cat', $cat);
});

Route::get('cats/{id}', function($id) {
    $cat = Furbook\Cat::find($id);
    return view('cats.show')->with('cat', $cat);
});

Route::get('cats/breeds/{name}', function($name) {
   $breed = Furbook\Breed::with('cats')->whereName($name)->first();
   return view('cats.index')->with('breed', $breed)->with('cats', $breed->cats);
});

Route::get('about', function(){
    return view('about')->with('number_of_cats', 9000);
});