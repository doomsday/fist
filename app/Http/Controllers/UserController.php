<?php

namespace Furbook\Http\Controllers;

class UserController extends Controller {
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show($id)
    {
        $this->doSomething();
        return 'Something';
    }

    protected function doSomething() {
        // Perform some operations.
    }
}