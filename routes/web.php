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

use Illuminate\Support\Facades\Route;

// Closure-based route actions.

// GET '/'
Route::get('/', function() {
    return redirect('cat');
});

// PUT '/cat/{cat}'
Route::put('cat/{cat}', function(Furbook\Cat $cat) {
    $cat->update(Input::all());
    return redirect('cat/'.$cat->id)->withSuccess('Cat has been updated.');
});

// GET '/cat/breeds/{name}'
Route::get('cat/breeds/{name}', function($name) {
   $breed = Furbook\Breed::with('cats')->whereName($name)->first();
   return view('cats.index')->with('breed', $breed)->with('cats', $breed->cats);
});

// GET '/about'
Route::get('about', function(){
    return view('about')->with('number_of_cats', 9000);
});

// Controllers

Route::get('user/{id}', ['uses' => 'UserController@show']);

// Register default routes that will be handled in 'CatController'.
Route::resource('cat', 'CatController');