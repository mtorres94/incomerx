<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;

class AccInvoice extends Model
{
    protected $table = "acc_invoices";

    protected $fillable = [
        'id', 'user_create_id', 'user_update_id','user_open_id', 'created_at', 'updated_at','code', 'invoice_bill', 'date', 'currency_id', 'type', 'source', 'period', 'class', 'shipment_code', 'master_code', 'bill_to_id', 'bill_to_address', 'bill_to_city', 'bill_state_id', 'bill_to_zip_code_id', 'bill_to_contact', 'bill_to_email', 'bill_to_phone', 'bill_to_payment_term', 'bill_to_sales', 'shipper_id', 'shipper_address', 'shipper_city', 'shipper_state_id', 'shipper_zip_code_id', 'shipper_contact', 'shipper_email', 'shipper_phone', 'shipper_fax', 'shipper_payment_term', 'consignee_id', 'consignee_address', 'consignee_city', 'consignee_state_id', 'consignee_zip_code_id', 'consignee_contact', 'consignee_email', 'consignee_phone', 'consignee_fax', 'consignee_payment_term', 'agent_id', 'freight_revenue', 'freight_cost', 'profit', 'adjustment', 'net_profit', 'agent_commission_adjust', 'agent_commission_percent', 'agent_commission_amount', 'agent_note', 'carrier_type', 'carrier_id', 'vessel_name', 'voyage_name', 'departure_date', 'arrival_date', 'origin_id', 'destination_id', 'place_receipt_id', 'ultimate_destination_id', 'commission_amount', 'commissionable_amount', 'commission_adjust', 'service_id', 'total_bill', 'total_cost', 'total_profit', 'total_profit_percent', 'total_balance', 'invoice_comments', 'comments', 'customer_reference', 'house_code', 'status', 'total_gross_weight', 'total_pieces', 'total_volume_weight', 'total_weight_unit','total_charge_weight', 'total_cubic', 'posted_date', 'reference_id', 'total_prepaid', 'total_collected' ];

    public function user()
    {
        return $this->belongsTo('Sass\User');
    }
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
    public function bill_to()
    {
        return $this->belongsTo('Sass\Customer', 'bill_to_id');
    }
    public function bill_to_state()
    {
        return $this->belongsTo('Sass\State', 'bill_to_state_id');
    }
    public function bill_to_zip_code()
    {
        return $this->belongsTo('Sass\ZipCode', 'bill_to_zip_code_id');
    }
    public function agent()
    {
        return $this->belongsTo('Sass\Customer', 'agent_id');
    }
    public function shipper()
    {
        return $this->belongsTo('Sass\Customer', 'shipper_id');
    }
    public function carrier()
    {
        return $this->belongsTo('Sass\Carrier', 'carrier_id');
    }
    public function shipper_state()
    {
        return $this->belongsTo('Sass\State', 'shipper_state_id');
    }
    public function shipper_zip_code()
    {
        return $this->belongsTo('Sass\ZipCode', 'shipper_zip_code_id');
    }
    public function consignee()
    {
        return $this->belongsTo('Sass\Customer', 'consignee_id');
    }
    public function consignee_state()
    {
        return $this->belongsTo('Sass\State', 'consignee_state_id');
    }
    public function consignee_zip_code()
    {
        return $this->belongsTo('Sass\ZipCode', 'consignee_zip_code_id');
    }
    public function origin()
    {
        $mode = $this->attributes['carrier_type'];
        switch ($mode) {
            case "A":
                return $this->belongsTo('Sass\Airport', 'origin_id');
            case "O":
                return $this->belongsTo('Sass\OceanPort', 'origin_id');
            case "T":
                return $this->belongsTo('Sass\ZipCode', 'origin_id');

        }
    }
    public function destination()
    {
        $mode = $this->attributes['carrier_type'];
        switch ($mode) {
            case "A":
                return $this->belongsTo('Sass\Airport', 'destination_id');
            case "O":
                return $this->belongsTo('Sass\OceanPort', 'destination_id');
            case "T":
                return $this->belongsTo('Sass\ZipCode', 'destination_id');

        }
    }
    public function place_receipt()
    {
        return $this->belongsTo('Sass\WorldLocation', 'place_receipt_id');
    }
    public function ultimate_destination()
    {
        return $this->belongsTo('Sass\WorldLocation', 'ultimate_destination_id');
    }
    public function service()
    {
        return $this->belongsTo('Sass\Service', 'service_id');
    }
    public function cargo_details()
    {
        return $this->hasMany('Sass\AccInvoiceCargo', 'invoice_id');
    }
    public function container_details()
    {
        return $this->hasMany('Sass\AccInvoiceContainer', 'invoice_id');
    }
    public function charge_details()
    {
        return $this->hasMany('Sass\AccInvoiceCharge', 'invoice_id');
    }

    public static function createInvoice($data, $id){


       $obj=[
           'user_open_id' => '0',
           'status' => 'O',
           'type' => 'I',
           'period' => date('m/Y'),
           'source'=> $data['source'],
           'class'=> "HO",
           'master_code' => $data['code'],
           'departure_date' => $data['departure_date'],
           'arrival_date' => $data['arrival_date'],
           'vessel_name' => isset($data['vessel_name'])? $data['vessel_name'] : "",
           'voyage_name' => isset($data['voyage_name']) ? $data['voyage_name'] : $data['flight'] ,
           'shipper_id' => $data['shipper_id'],
           'shipper_address' => $data['shipper_address'],
           'shipper_city' => $data['shipper_city'],
           'shipper_state_id' => $data['shipper_state_id'],
           'shipper_zip_code_id' => $data['shipper_zip_code_id'],
           'shipper_phone' => $data['shipper_phone'],
           'consignee_id' => $data['consignee_id'],
           'consignee_address' => $data['consignee_address'],
           'consignee_city' => $data['consignee_city'],
           'consignee_state_id' => $data['consignee_state_id'],
           'consignee_zip_code_id' => $data['consignee_zip_code_id'],
           'consignee_phone' => $data['consignee_phone'],
           'agent_id' => $data['agent_id'],
           'shipment_code' => $data['shipment_code'],
           'date' => $data['date'],
           'carrier_id' => $data['carrier_id'],
           'origin_id' => $data['origin_id'],
           'destination_id' => $data['destination_id'],
           'carrier_type' => $data['carrier_type'],
           'total_pieces' => $data['total_pieces'],
           'total_gross_weight' => $data['total_gross_weight'],
           'total_charge_weight' => isset($data['total_charge_weight']) ? $data['total_charge_weight'] : $data['total_gross_weight'],
           'total_cubic' => isset($data['total_cubic'])? $data['total_cubic'] : "",
           'total_bill' =>$data['total_bill'],
           'total_cost' =>$data['total_cost'],
           'total_profit' =>$data['total_profit'],
           'total_profit_percent' =>$data['total_profit_percent'],
           'total_prepaid' =>$data['total_prepaid'],
           'total_collected' =>$data['total_collected'],
            'reference_id' => $id,
       ];
       if( AccInvoice::where('reference_id', $id)->exists()){
           AccInvoice::where('reference_id', $id)->update($obj);
           $invoices= AccInvoice::where('reference_id', $id)->get();
           foreach($invoices as $invoice){
               $id = $invoice->id;
           }

       }else{
           $type= 'INV';
           $last = AccInvoice::orderBy('code', 'desc')->where('code', 'like', $type . '%')->first();
           $frmt = $last == null ? 1 : intval(substr($last->code, 4)) + 1;
           $code = str_pad($frmt, 6, '0', 0);
           $code = $type . '-' . $code;
           $obj['code'] = $code;
           $id = AccInvoice::create($obj)->id;
       }
        //INVOICE DETAILS
        AccInvoiceCargo::createDetail($id, $data);
        AccInvoiceCharge::saveDetail($id, $data);
        AccInvoiceContainer::saveDetail($id, $data);


    }

}
