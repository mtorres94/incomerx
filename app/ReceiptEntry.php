<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Sass\Logic\Common\CommonFunctions as Common;
use Sass\ReceiptEntryCargoDetail;

class ReceiptEntry extends Model
{
    protected $table = "whr_receipts_entries";

    protected $fillable = [
        'id','code', 'date_in', 'division_id', 'status', 'shipping_id', 'expire_date', 'currency_id', 'pd_order_id', 'po_number_id',
        'shipper_id', 'shipper_address', 'shipper_city', 'shipper_state_id', 'shipper_zip_code_id', 'shipper_phone', 'shipper_fax', 'consignee_id',
        'consignee_address', 'consignee_city', 'consignee_state_id', 'consignee_zip_code_id', 'consignee_phone', 'consignee_fax', 'third_party_id',
        'third_party_phone', 'third_party_fax', 'agent_id', 'coloader_id', 'mode', 'warehouse_id', 'location_origin_id', 'location_destination_id',
        'location_country_id', 'location_world_location_id', 'location_service_id', 'receiving_carrier_id', 'receiving_freight_amt',
        'receiving_cod_amount', 'receiving_carrier_terms', 'receiving_date', 'receiving_1_check', 'receiving_2_check', 'receiving_receiving_by',
        'receiving_checked_by', 'receiving_pictures_by', 'receiving_driver_id', 'receiving_driver_license', 'receiving_driver_plate',
        'hazardous_contact', 'hazardous_phone', 'commercial_inv', 'extra_length', 'pallets', 'packing_list', 'extra_width', 'improper_document',
        'heat_treated', 'extra_height', 'inbond', 'hazardous', 'extra_heavy', 'glass', 'haz_documents', 'driver_licenses', 'pieces_discrepancy',
        'hazardous_labels', 'fragile', 'weight_discrepancy', 'cargo_screened', 'ippc', 'ippc_number', 'marks', 'comments', 'unique_str',
        'sum_pieces', 'sum_weight', 'sum_volume_weight', 'sum_cubic', 'user_create_id', 'user_update_id','cargo_loader_id', 'user_open_id', 'sum_bill', 'sum_profit', 'sum_cost', 'sum_profit_percent', 'bill_of_lading_id'
    ];

    public function getShipperAddressAttribute($value) {
        return format_text($value);
    }

    public function getConsigneeAddressAttribute($value) {
        return format_text($value);
    }

    public function setCommercialInvAttribute($value)
    {
        $this->attributes['commercial_inv'] = ($value == 'on') ? 1 : 0;
    }

    public function setExtraLengthAttribute($value)
    {
        $this->attributes['extra_length'] = ($value == 'on') ? 1 : 0;
    }

    public function setPalletsAttribute($value)
    {
        $this->attributes['pallets'] = ($value == 'on') ? 1 : 0;
    }

    public function setPackingListAttribute($value)
    {
        $this->attributes['packing_list'] = ($value == 'on') ? 1 : 0;
    }

    public function setExtraWidthAttribute($value)
    {
        $this->attributes['extra_width'] = ($value == 'on') ? 1 : 0;
    }

    public function setImproperDocumentAttribute($value)
    {
        $this->attributes['improper_document'] = ($value == 'on') ? 1 : 0;
    }

    public function setHeatTreatedAttribute($value)
    {
        $this->attributes['heat_treated'] = ($value == 'on') ? 1 : 0;
    }

    public function setInbondAttribute($value)
    {
        $this->attributes['inbond'] = ($value == 'on') ? 1 : 0;
    }

    public function setHazardousAttribute($value)
    {
        $this->attributes['hazardous'] = ($value == 'on') ? 1 : 0;
    }

    public function setExtraHeavyAttribute($value)
    {
        $this->attributes['extra_heavy'] = ($value == 'on') ? 1 : 0;
    }

    public function setGlassAttribute($value)
    {
        $this->attributes['glass'] = ($value == 'on') ? 1 : 0;
    }

    public function setHazDocumentsAttribute($value)
    {
        $this->attributes['haz_documents'] = ($value == 'on') ? 1 : 0;
    }

    public function setDriverLicensesAttribute($value)
    {
        $this->attributes['driver_licenses'] = ($value == 'on') ? 1 : 0;
    }

    public function setPiecesDiscrepancyAttribute($value)
    {
        $this->attributes['pieces_discrepancy'] = ($value == 'on') ? 1 : 0;
    }

    public function setHazardousLabelsAttribute($value)
    {
        $this->attributes['hazardous_labels'] = ($value == 'on') ? 1 : 0;
    }

    public function setFragileAttribute($value)
    {
        $this->attributes['fragile'] = ($value == 'on') ? 1 : 0;
    }

    public function setWeightDiscrepancyAttribute($value)
    {
        $this->attributes['weight_discrepancy'] = ($value == 'on') ? 1 : 0;
    }

    public function setCargoScreenedAttribute($value)
    {
        $this->attributes['cargo_screened'] = ($value == 'on') ? 1 : 0;
    }

    public function setIppcAttribute($value)
    {
        $this->attributes['ippc'] = ($value == 'on') ? 1 : 0;
    }

    public function getCommercialInvAttribute($value)
    {
        return ($value == 1) ? 'on' : 'off';
    }

    public function getExtraLengthAttribute($value)
    {
        return ($value == 1) ? 'on' : 'off';
    }

    public function getPalletsAttribute($value)
    {
        return ($value == 1) ? 'on' : 'off';
    }

    public function getPackingListAttribute($value)
    {
        return ($value == 1) ? 'on' : 'off';
    }

    public function getExtraWidthAttribute($value)
    {
        return ($value == 1) ? 'on' : 'off';
    }

    public function getImproperDocumentAttribute($value)
    {
        return ($value == 1) ? 'on' : 'off';
    }

    public function getHeatTreatedAttribute($value)
    {
        return ($value == 1) ? 'on' : 'off';
    }

    public function getInbondAttribute($value)
    {
        return ($value == 1) ? 'on' : 'off';
    }

    public function getHazardousAttribute($value)
    {
        return ($value == 1) ? 'on' : 'off';
    }

    public function getExtraHeavyAttribute($value)
    {
        return ($value == 1) ? 'on' : 'off';
    }

    public function getGlassAttribute($value)
    {
        return ($value == 1) ? 'on' : 'off';
    }

    public function getHazDocumentsAttribute($value)
    {
        return ($value == 1) ? 'on' : 'off';
    }

    public function getDriverLicensesAttribute($value)
    {
        return ($value == 1) ? 'on' : 'off';
    }

    public function getPiecesDiscrepancyAttribute($value)
    {
        return ($value == 1) ? 'on' : 'off';
    }

    public function getHazardousLabelsAttribute($value)
    {
        return ($value == 1) ? 'on' : 'off';
    }

    public function getFragileAttribute($value)
    {
        return ($value == 1) ? 'on' : 'off';
    }

    public function getWeightDiscrepancyAttribute($value)
    {
        return ($value == 1) ? 'on' : 'off';
    }

    public function getCargoScreenedAttribute($value)
    {
        return ($value == 1) ? 'on' : 'off';
    }

    public function getIppcAttribute($value)
    {
        return ($value == 1) ? 'on' : 'off';
    }

    //=========================================================
    public static function saveDetail($id, $data)
    {
        $i = 0;
        $a = 0;
        ReceiptEntry::where('cargo_loader_id', '=', $id)->update(['cargo_loader_id' => "0"]);
        if(isset($data['hidden_receipt_entry'])){
            while ($a < count($data['hidden_receipt_entry'])) {
                if (isset($data['hidden_receipt_entry'][$i])) {
                    if ($data['hidden_receipt_entry'][$i] > 0) {
                        ReceiptEntry::where('id', '=', $data['hidden_receipt_entry'][$i])->update(['cargo_loader_id' => $id]);
                        $a++;
                    }
                }
                $i++;
            }
        }
    }
    //===========================================================
    public static function set_pd_order($id, $data)
    {
        $i = -1;
        $a = 0;
        if (isset($data['line_warehouse_id'])){
            while ($a < count($data['line_warehouse_id'])) {
                $i++;
                if (isset($data['line_warehouse_id'][$i])) {

                    ReceiptEntry::where('id', '=', $data['whr_id'][$i])->update(['pd_order_id' => $id]);
                    $a++;

                }
            }
        }
    }
    //===========================================================

    public function division()
    {
        return $this->belongsTo('Sass\Division');
    }

    public function shipper()
    {
        return $this->belongsTo('Sass\Customer', 'shipper_id');
    }

    public function consignee()
    {
        return $this->belongsTo('Sass\Customer', 'consignee_id');
    }

    public function agent()
    {
        return $this->belongsTo('Sass\Customer', 'agent_id');
    }

    public function coloader()
    {
        return $this->belongsTo('Sass\Customer', 'coloader_id');
    }

    public function third_party()
    {
        return $this->belongsTo('Sass\Customer', 'third_party_id');
    }

    public function shipper_state()
    {
        return $this->belongsTo('Sass\State', 'shipper_state_id');
    }

    public function shipper_zip_code()
    {
        return $this->belongsTo('Sass\ZipCode', 'shipper_zip_code_id');
    }

    public function consignee_state()
    {
        return $this->belongsTo('Sass\State', 'consignee_state_id');
    }

    public function consignee_zip_code()
    {
        return $this->belongsTo('Sass\ZipCode', 'consignee_zip_code_id');
    }

    public function warehouse()
    {
        return $this->belongsTo('Sass\WarehouseFacility', 'warehouse_id');
    }

    public function origin()
    {
        $mode = $this->attributes['mode'];
        switch ($mode) {
            case "A":
                return $this->belongsTo('Sass\Airport', 'location_origin_id');
            case "O":
                return $this->belongsTo('Sass\OceanPort', 'location_origin_id');
            case "W":
                return $this->belongsTo('Sass\Airport', 'location_origin_id');
            case "R":
                return $this->belongsTo('Sass\ZipCode', 'location_origin_id');
            case "T":
                return $this->belongsTo('Sass\ZipCode', 'location_origin_id');
        }
    }

    public function destination()
    {
        $mode = $this->attributes['mode'];
        switch ($mode) {
            case "A":
                return $this->belongsTo('Sass\Airport', 'location_destination_id');
            case "O":
                return $this->belongsTo('Sass\OceanPort', 'location_destination_id');
            case "W":
                return $this->belongsTo('Sass\Airport', 'location_destination_id');
            case "R":
                return $this->belongsTo('Sass\ZipCode', 'location_destination_id');
            case "T":
                return $this->belongsTo('Sass\ZipCode', 'location_destination_id');
        }
    }

    public function country()
    {
        return $this->belongsTo('Sass\Country', 'location_country_id');
    }

    public function world_location()
    {
        return $this->belongsTo('Sass\WorldLocation', 'location_world_location_id');
    }

    public function service()
    {
        return $this->belongsTo('Sass\Service', 'location_service_id');
    }

    public function carrier()
    {
        return $this->belongsTo('Sass\Carrier', 'receiving_carrier_id');
    }

    public function driver()
    {
        return $this->belongsTo('Sass\Driver', 'receiving_driver_id');
    }

    public function reference_details()
    {
        return $this->hasMany('Sass\ReceiptEntryReferenceDetail', 'receipt_entry_id');
    }

    public function receiving_details()
    {
        return $this->hasMany('Sass\ReceiptEntryReceivingDetail', 'receipt_entry_id');
    }

    public function hazardous_details()
    {
        return $this->hasMany('Sass\ReceiptEntryHazardousDetail', 'receipt_entry_id');
    }

    public function cargo_details()
    {
        return $this->hasMany('Sass\ReceiptEntryCargoDetail', 'receipt_entry_id');
    }

    public function charge_details()
    {
        return $this->hasMany('Sass\ReceiptEntryChargeDetail', 'receipt_entry_id');
    }

    public function user_create()
    {
        return $this->belongsTo('Sass\User', 'user_create_id');
    }

    public function user_open()
    {
        return $this->belongsTo('Sass\User', 'user_open_id');
    }
    public function shipping_references()
    {
        return $this->hasMany('Sass\ReceiptEntryShippingReference', 'receipt_entry_id');
    }
}
