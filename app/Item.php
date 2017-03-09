<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'mst_items';

    protected $fillable = [
        'code', 'name', 'packages', 'additional_description', 'customer_id', 'net_value', 'gross_value', 'category_id', 'subcategory_id', 'vendor_sku_number', 'user_create_id', 'user_update_id','user_open_id'
    ];

    public function customer()
    {
        return $this->belongsTo('Sass\Customer');
    }

    public function category()
    {
        return $this->belongsTo('Sass\ItemCategory');
    }

    public function subcategory()
    {
        return $this->belongsTo('Sass\ItemSubcategory');
    }

    public function user()
    {
        return $this->belongsTo('Sass\User');
    }
    public function user_open()
    {
        return $this->belongsTo('Sass\User', 'user_open_id');
    }
}
