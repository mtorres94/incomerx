<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;

class EaShipmentEntry extends Model
{
    protected $table= 'ea_shipment_entries';
    protected $fillable = [
        'id', 'status', 'code', 'booking_id',
    ];

    public function booking()
    {
        return $this->belongsTo('Sass\EaBookingEntry', 'booking_id');
    }


}
