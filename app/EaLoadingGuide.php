<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;

class EaLoadingGuide extends Model
{
    protected $table= 'ea_loading_guides';
    protected $fillable = [
        'id', 'created_at', 'updated_at', 'user_create_id', 'user_update_id', 'user_open_id', 'code', 'date', 'shipment_type', 'shipment_id', 'status', 'carrier_id', 'origin_id', 'destination_id', 'via_id', 'agent_id', 'flight', 'release_date', 'cut_off_date', 'departure_date', 'arrival_date', 'sum_total_pieces', 'sum_total_volume', 'sum_total_weight', 'sum_total_cubic', 'booking_code', 'booking_id', 'comments', 'marks'
    ];

    public function user_create()
    {
        return $this->belongsTo('Sass\User', 'user_create_id');
    }

    public function user_open()
    {
        return $this->belongsTo('Sass\User', 'user_open_id');
    }

    public function agent()
    {
        return $this->belongsTo('Sass\Customer', 'agent_id');
    }
    public function origin()
    {
        return $this->belongsTo('Sass\Airport', 'origin_id');
    }
    public function destination()
    {
        return $this->belongsTo('Sass\Airport', 'destination_id');
    }
    public function via()
    {
        return $this->belongsTo('Sass\Airport', 'via_id');
    }
    public function shipment()
    {
        return $this->belongsTo('Sass\EaShipmentEntry', 'shipment_id');
    }
    public function carrier()
    {
        return $this->belongsTo('Sass\Carrier', 'carrier_id');
    }
    public function container()
    {
        return $this->hasMany('Sass\EaLoadingGuideContainer', 'loading_guide_id');
    }

    public function receipt_entry()
    {
        return $this->hasMany('Sass\ReceiptEntry', 'ea_loading_guide_id');
    }
}
