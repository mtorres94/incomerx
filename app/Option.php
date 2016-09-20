<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = "mst_options";

    protected $fillable = [
        'name', 'route', 'icon', 'menu_id'
    ];

    public function menu()
    {
        return $this->belongsTo('Sass\Menu');
    }
}
