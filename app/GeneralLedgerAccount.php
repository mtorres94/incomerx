<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class GeneralLedgerAccount extends Model
{
    protected $table = "mst_general_ledger_accounts";

    protected $fillable = [
        'id' , 'created_at', 'updated_at', 'user_create_id', 'user_update_id', 'user_open_id','code', 'description', 'type', 'status', 'subaccount', 'general_ledger_account_id', 'comments', 'currency_id' ];

    public function user_open()
    {
        return $this->belongsTo('Sass\User', 'user_open_id');
    }
    public function user_create()
    {
        return $this->belongsTo('Sass\User', 'user_create_id');
    }

    public function currency()
    {
        return $this->belongsTo('Sass\Currency', 'currency_id');
    }
    public function general_ledger_account()
    {
        return $this->belongsTo('Sass\GeneralLedgerAccount', 'general_ledger_account_id');
    }
    public function getStatusAttribute($value) {
        return format_text($value);
    }

    public function setStatusAttribute($value)
    {
        $this->attributes['status'] = ($value == 'on') ? 1 : 0;
    }
    public function getSubAccountAttribute($value) {
        return format_text($value);
    }

    public function setSubAccountAttribute($value)
    {
        $this->attributes['subaccount'] = ($value == 'on') ? 1 : 0;
    }

}
