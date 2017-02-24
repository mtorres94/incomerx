<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;

class ReceiptEntryShippingReference extends Model
{
    protected $table = 'whr_receipts_entries_shipping_references';

    protected $fillable = [
        'receipt_entry_id', 'reference_number', 'user_id', 'type',  'shipment_number', 'date_in', 'date_out', 'reference_id'
    ];
    public $timestamps = false;

    public function user_name()
    {
        return $this->belongsTo('Sass\User', 'user_id');
    }



}
