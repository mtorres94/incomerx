<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = "mst_menus";

    protected $fillable = [
        'name', 'icon', 'module_id',
    ];

    public function module()
    {
        return $this->belongsTo('Sass\Module');
    }

    public function options()
    {
        return $this->hasMany('Sass\Option');
    }
}
