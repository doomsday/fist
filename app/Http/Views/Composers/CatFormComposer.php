<?php

namespace Furbook\Http\Views\Composers;
use Furbook\Breed;
use Illuminate\Contracts\View\View;

// View composer. When the 'partials.forms.cat' template partial is called, it kicks in.
class CatFormComposer {
    protected $breeds;

    // When Laravel instantiates it, it'll read the constructor and automatically inject instances of the specified
    // types
    public function __construct(Breed $breeds)
    {
        $this->breeds = $breeds;
    }

    // Once the view composer has been initialized, the compose() method is called. This is where the actual binding of
    // data to the view occurs.
    public function compose(View $view) {
        $view->with('breeds',
            $this->breeds->pluck('name', 'id')  // Get an array with the values of a given column.
        );
    }
}