<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;

class ItemCategory extends Model
{
    protected $table = "mst_item_categories";

    protected $fillable = [
        'name', 'user_create_id', 'user_update_id','user_open_id'
    ];
    
    public function getNameAttribute()
    {
        $name = $this->attributes['name'];
        return strtoupper($name);
    }
    
    public function user()
    {
        return $this->hasOne('Sass\User');
    }
    public function user_open()
    {
        return $this->hasOne('Sass\User', 'user_open_id');
    }
}
