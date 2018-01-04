<?php

namespace Furbook\Http\Controllers;

use Furbook\Breed;
use Furbook\Cat;
use Furbook\Http\Requests\SaveCatRequest;
use Illuminate\Support\Facades\Input;

class CatController extends Controller
{

    public function __construct()
    {
        // Attaches the auth middleware to all requests that will be handled by the CatController.
        $this->middleware('auth');
    }

    // GET '/cat/breeds/{name}'
    public function catBreeds($name) {
        $breed = Breed::with('cats')->whereName($name)->first();
        return view('cats.index')->with('breed', $breed)->with('cats', $breed->cats);
    }

    // GET '/cat/{cat}/delete
    public function catDelete(Cat $cat) {   // FIXME: CSRF VULNERABLE
        $cat->delete();
        return redirect('cat')->withSuccess('Cat has been deleted.');
    }

    // POST '/cat'
    public function store(SaveCatRequest $request)
    {
        // All of the SaveCatRequest validation errors will automatically be flashed to the session.

        $cat = Cat::create($request->all());  // Input::all() - retrieve an array of all the input data.
        $cat->photo_path = $request->file('photo')->store('uploads/photos');
        $cat->save();
        return redirect('cat/' . $cat->id)->withSuccess('Cat has been created.');
    }

    // GET '/cat'
    public function index()
    {
        $cats = Cat::all();
        return view('cats.index')->with('cats', $cats);
    }

    // DELETE '/cat/{cat}'
    public function destroy($cat)
    {
        $cat->delete();
        return redirect('cat')->withSuccess('Cat has been deleted.');
    }

    // GET '/cat/create'
    public function create()
    {
        return view('cats.create');
    }

    // GET '/cat/{id}/edit'
    public function edit(Cat $cat)
    {
        return view('cats.edit')->with('cat', $cat);
    }

    // GET '/cat/id'
    public function show($id)
    {
        $cat = Cat::find($id);
        return view('cats.show')->with('cat', $cat);
    }

    // PUT/PATCH '/cat/{cat}'
    public function update(Cat $cat) {
        $cat->update(Input::all());
        return redirect('cat/'.$cat->id)->withSuccess('Cat has been updated.');
    }
}
