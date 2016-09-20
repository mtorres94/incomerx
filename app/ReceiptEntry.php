<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;

class ReceiptEntry extends Model
{
    protected $table = "whr_receipts_entries";

    protected $fillable = [
        'warehouse_code', 'date_in', 'division_id', 'status', 'shipping_id', 'expire_date', 'currency_id', 'pd_order_id', 'po_number_id', 'shipper_id', 'shipper_address', 'shipper_city', 'shipper_state_id', 'shipper_zip_code_id', 'shipper_phone', 'shipper_fax', 'consignee_id', 'consignee_address', 'consignee_city', 'consignee_state_id', 'consignee_zip_code_id', 'consignee_phone', 'consignee_fax', 'third_party_id', 'third_party_phone', 'third_party_fax', 'agent_id', 'coloader_id', 'mode', 'warehouse_id', 'location_origin_id', 'location_destination_id', 'location_country_id', 'location_world_location_id', 'location_service_id', 'receiving_carrier_id', 'receiving_freight_amt', 'receiving_cod_amount', 'receiving_carrier_terms', 'receiving_date', 'receiving_1_check', 'receiving_2_check', 'receiving_receiving_by', 'receiving_checked_by', 'receiving_pictures_by', 'receiving_driver_id', 'receiving_driver_license', 'receiving_driver_plate', 'hazardous_contact', 'hazardous_phone', 'commercial_inv', 'extra_length', 'pallets', 'packing_list', 'extra_width', 'improper_document', 'heat_treated', 'extra_height', 'inbond', 'hazardous', 'extra_heavy', 'glass', 'haz_documents', 'driver_licenses', 'pieces_discrepancy', 'hazardous_labels', 'fragile', 'weight_discrepancy', 'cargo_screened', 'ippc', 'ippc_number', 'marks', 'comments', 'unique_str', 'user_create_id', 'user_update_id',
    ];

    public function division()
    {
        return $this->belongsTo('Sass\Division');
    }

    public function shipper()
    {
        return $this->belongsTo('Sass\Customer', 'shipper_id');
    }

    public function shipper_state()
    {
        return $this->belongsTo('Sass\State', 'shipper_state_id');
    }

    public function shipper_zip_code()
    {
        return $this->belongsTo('Sass\ZipCode', 'shipper_zip_code_id');
    }

    public function user_create()
    {
        return $this->belongsTo('Sass\User', 'user_create_id');
    }
}
