<?php

namespace Furbook;

use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, CanResetPassword;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    //  MySQL doesn't have a native Boolean data type.
    protected $casts = [
        'is_admin' => 'boolean'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function cats() {
        return $this->hasMany('Furbook\Cat');
    }

    public function owns(Cat $cat) {
        return $this->id == $cat->user_id;
    }

    public function canEdit(Cat $cat) {
        return $this->is_admin || $this->owns($cat);
    }
}
