<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = "mst_modules";

    protected $fillable = [
        'name', 'icon',
    ];

    public function menus()
    {
        return $this->hasMany('Sass\Menu');
    }
}
