<?php

namespace Furbook\Http\Controllers;

use Furbook\Cat;
use Illuminate\Http\Request;


class CatController extends Controller
{
    // POST '/cat'
    public function store(Request $request)
    {
        $cat = Cat::create($request->all());  // Input::all() - retrieve an array of all the input data.
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
    public function edit($cat)
    {
        return view('cats.edit')->with('cat', $cat);
    }

    // GET '/cat/id'
    public function show($id)
    {
        $cat = Cat::find($id);
        return view('cats.show')->with('cat', $cat);
    }
}
