<?php namespace Furbook;

use Illuminate\Database\Eloquent\Model;

class Cat extends Model {

    // Optional: defines the database table it maps to.
    protected $table = 'cats';

    // Defines the list of fields that Laravel can fill by mass assignment.
    protected $fillable = [
        'name','date_of_birth','breed_id'
    ];

    // Many (cats) to one (breed).
    public function breed() {
        return $this->belongsTo('Furbook\Breed');
    }
}