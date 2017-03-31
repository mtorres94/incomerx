<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;

class BillingCode extends Model
{

    protected $table = 'mst_billing_codes';

    protected $fillable = [
        'id','code', 'name', 'description', 'another_lang', 'code_type', 'billing_type', 'unit_id', 'billing_amount', 'billing_currency_id', 'cost_amount', 'cost_currency_id', 'taxable', 'taxable_add_to_amount', 'billing_item', 'billing_description', 'billing_account', 'cost_item', 'cost_description', 'cost_account', 'customer_billing_code', 'customer_billing_code_description', 'cost_center','ar_percent', 'ap_percent','user_create_id', 'user_update_id','user_open_id'
    ];

    public function user()
    {
        return $this->belongsTo('Sass\User');
    }
    public function user_open()
    {
        return $this->belongsTo('Sass\User', 'user_open_id');
    }
    public function unit()
    {
        return $this->belongsTo('Sass\CargoType', 'unit_id');
    }
    public function billing_currency()
    {
        return $this->belongsTo('Sass\Currency', 'billing_currency_id');
    }
    public function cost_currency()
    {
        return $this->belongsTo('Sass\Currency', 'cost_currency_id');
    }

    public function getTaxableAttribute($value) {
        return format_text($value);
    }

    public function setTaxableAttribute($value)
    {
        $this->attributes['taxable'] = ($value == 'on') ? 1 : 0;
    }
    public function getTaxableAddToAccountAttribute($value) {
        return format_text($value);
    }

    public function setTaxableAddToAccountAttribute($value)
    {
        $this->attributes['taxable_add_to_account'] = ($value == 'on') ? 1 : 0;
    }

}
