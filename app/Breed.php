<?php namespace Furbook;

use Illuminate\Database\Eloquent\Model;

class Breed extends Model {

    public $timestamps = false;

    // One (breed) to many (cats).
    public function cats() {
        return $this->hasMany('Furbook\Cat');
    }
}