<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;

class Incoterm extends Model
{
    protected $table = "mst_incoterms";

    protected $fillable = [
        'code', 'name', 'description', 'user_create_id', 'user_update_id','user_open_id'
    ];

    public function customers()
    {
        return $this->hasMany('Sass\Customer');
    }

    public function user_open()
    {
        return $this->belongsTo('Sass\User', 'user_open_id');
    }

    public function user()
    {
        return $this->hasOne('Sass\User');
    }
    public function getCodeAttribute() {
        $code = $this->attributes['code'];
        return strtoupper($code);
    }
}
