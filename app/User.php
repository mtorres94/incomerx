<?php

namespace Sass;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon\Carbon;

class User extends Authenticatable
{
    protected $table = "mst_users";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'name', 'email', 'password', 'role', 'status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getNameAttribute() {
        $name = $this->attributes['name'];
        return ucwords($name);
    }

    public function getRoleAttribute() {
        $role = $this->attributes['role'];
        return ucfirst($role);
    }

    public function getCreatedAtAttribute() {
        $created_at = $this->attributes['created_at'];
        return Carbon::parse($created_at)->toFormattedDateString();
    }
}
