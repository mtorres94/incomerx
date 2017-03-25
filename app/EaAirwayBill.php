<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;

class EaAirwayBill extends Model
{
    protected $table= 'ea_airwaybills';
    protected $fillable = [
        'id', 'created_at', 'updated_at', 'user_create_id', 'user_update_id', 'user_open_id', 'code', 'date', 'awb_class', 'awb_type', 'status', 'booking_code', 'departure_date', 'arrival_date', 'shipment_id', 'customer_reference', 'currency_id', 'agent_id', 'agent_phone', 'commission', 'coloader_id', 'agent_iata_code', 'account_number', 'reference_number', 'requested_flight', 'origin_id', 'destination_id', 'carrier_id', 'flight', 'stand_by', 'partial', 'pod_information', 'confirmed', 'shipper_id', 'shipper_address', 'shipper_city', 'shipper_zip_code_id', 'shipper_state_id', 'shipper_phone', 'consignee_id', 'consignee_address', 'consignee_city', 'consignee_zip_code_id', 'consignee_state_id', 'consignee_phone', 'dec_value', 'ins_value', 'cargo_notes', 'sum_pieces', 'total_unit_weight', 'total_commodity', 'sum_weight', 'sum_volume_weight', 'sum_charge_weight', 'sum_bill', 'sum_cost', 'sum_profit', 'credit_comments', 'airwaybill_comments', 'handling_information', 'executed_on', 'signature_shipper', 'issued_notes', 'sum_cubic', 'booking_id'   ];

    public function user_create()
    {
        return $this->belongsTo('Sass\User', 'user_create_id');
    }
    public function user_open()
    {
        return $this->belongsTo('Sass\User', 'user_open_id');
    }
    public function shipment()
    {
        return $this->belongsTo('Sass\EaShipmentEntry', 'shipment_id');
    }
    public function currency()
    {
        return $this->belongsTo('Sass\Currency', 'currency_id');
    }
    public function agent()
    {
        return $this->belongsTo('Sass\Customer', 'agent_id');
    }
    public function coloader()
    {
        return $this->belongsTo('Sass\Customer', 'coloader_id');
    }
    public function origin()
    {
        return $this->belongsTo('Sass\Airport', 'origin_id');
    }
    public function destination()
    {
        return $this->belongsTo('Sass\Airport', 'destination_id');
    }
    public function carrier()
    {
        return $this->belongsTo('Sass\Carrier', 'carrier_id');
    }
    public function shipper()
    {
        return $this->belongsTo('Sass\Customer', 'shipper_id');
    }
    public function issued()
    {
        return $this->belongsTo('Sass\Customer', 'issued_id');
    }
    public function consignee()
    {
        return $this->belongsTo('Sass\Customer', 'consignee_id');
    }
    public function shipper_state()
    {
        return $this->belongsTo('Sass\State', 'shipper_state_id');
    }
    public function issued_state()
    {
        return $this->belongsTo('Sass\State', 'issued_state_id');
    }
    public function consignee_state()
    {
        return $this->belongsTo('Sass\State', 'consignee_state_id');
    }
    public function consignee_zip_code()
    {
        return $this->belongsTo('Sass\ZipCode', 'consignee_zip_code_id');
    }
    public function issued_zip_code()
    {
        return $this->belongsTo('Sass\ZipCode', 'issued_zip_code_id');
    }
    public function shipper_zip_code()
    {
        return $this->belongsTo('Sass\ZipCode', 'shipper_zip_code_id');
    }
    public function cargo_details()
    {
        return $this->hasMany('Sass\EaAirwayBillCargo', 'airwaybill_id');
    }
    public function charge_details()
    {
        return $this->hasMany('Sass\EaAirwayBillCharge', 'airwaybill_id');
    }
    public function receipts_entries()
    {
        return $this->hasMany('Sass\ReceiptEntry', 'ea_airwaybill_id');
    }
    public function houses()
    {
        return $this->hasMany('Sass\EaAirwayBill', 'airwaybill_id');
    }
    public function getStandByAttribute($value) {
        return format_text($value);
    }
    public function setStandByAttribute($value)
    {
        $this->attributes['stand_by'] = ($value == 'on') ? 1 : 0;
    }
    public function getPartialAttribute($value) {
        return format_text($value);
    }
    public function setPartialAttribute($value)
    {
        $this->attributes['partial'] = ($value == 'on') ? 1 : 0;
    }
    public function getPodInformationAttribute($value) {
        return format_text($value);
    }
    public function setPodInformationAttribute($value)
    {
        $this->attributes['pod_information'] = ($value == 'on') ? 1 : 0;
    }
    public function getConfirmedAttribute($value) {
        return format_text($value);
    }
    public function setConfirmedAttribute($value)
    {
        $this->attributes['confirmed'] = ($value == 'on') ? 1 : 0;
    }

    public static function saveDetail($id, $data){
        $type =  $data['tmp_shipment_type'] == 'C'? 'HAWB' : 'DAWB' ;
        $last = EaAirwayBill::orderBy('code','desc')->where('code', 'LIKE', $type.'%') ->first();
        $frmt = $last == null ? 1 : intval(substr($last->code, 5)) + 1;
        $code = str_pad($frmt, 5, '0', 0);
        $data['code'] = $type."-".$code;

        $booking = EaBookingEntry::findOrFail($data['tmp_booking_id']);

        $obj = [
            'code'=> $data['code'],
            'date'=> $data['tmp_date'],
            'awb_class'=> ($data['tmp_shipment_type'] == 'C' ? '2' : '1'),
            'booking_id'=> $booking->id,
            'currency_id'=> 1,
            'booking_code'=> $booking->code,
            'shipment_id'=> $booking->shipment_id,
            'loading_guide_id'=> $id,
            'status'=> 'O',
            'awb_type'=> 'C',
            'commission'=> $booking->agent_commission,
            'departure_date'=> $booking->departure_date,
            'arrival_date'=> $booking->arrival_date,
            'agent_id'=> $booking->agent_id,
            'agent_phone'=> $booking->agent_phone,
            'origin_id'=> $booking->origin_id,
            'destination_id'=> $booking->destination_id,
            'carrier_id'=> $booking->carrier_id,
            'flight'=> $booking->first_flight,
            'shipper_id'=> $booking->shipper_id,
            'shipper_address'=> $booking->shipper_address,
            'shipper_city'=> $booking->shipper_city,
            'shipper_phone'=> $booking->shipper_phone,
            'shipper_state_id'=> $booking->shipper_state_id,
            'shipper_zip_code_id'=> $booking->shipper_zip_code_id,
            'consignee_id'=> $booking->consignee_id,
            'consignee_address'=> $booking->consignee_address,
            'consignee_city'=> $booking->consignee_city,
            'consignee_phone'=> $booking->consignee_phone,
            'consignee_state_id'=> $booking->consignee_state_id,
            'consignee_zip_code_id'=> $booking->consignee_zip_code_id,
            'sum_pieces' => $data['sum_pieces'],
            'sum_weight' => $data['sum_weight'],
            'sum_volume_weight' => $data['sum_volume_weight'],
            'sum_charge_weight' => $data['sum_volume_weight'],
            'user_open_id' => $data['user_open_id'],
            'user_create_id' => $data['user_create_id'],
            'user_update_id' => $data['user_update_id'],
        ];

        $airway_bill= EaAirwayBill::create($obj);
        EaAirwayBillCargo::saveDetailAwb($airway_bill->id, $data);
        EaAirwayBillCharge::saveDetailAwb($airway_bill->id, $data);
        $i=0; $a=0;

        if(isset($data['warehouse_select'])){
            while ($a < count($data['warehouse_select'])) {
                if (isset($data['warehouse_select'][$i])) {
                    ReceiptEntry::where('id', '=', $data['warehouse_select'][$i])->update(['ea_airwaybill_id' => $airway_bill->id, 'status' =>'C']);
                    $inputs = ['receipt_entry_id' => $data['warehouse_select'][$i],'shipment_number' => $data['tmp_shipment_code'], 'type'=> 'EA', 'reference_id'=> $airway_bill->id, 'reference_number' => $airway_bill->code];
                    ReceiptEntryShippingReference::create($inputs);
                    $a++;
                }
                $i++;
            }
        }


        return $airway_bill->id;
    }

}
