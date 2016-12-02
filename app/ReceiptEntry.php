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
        'sum_pieces', 'sum_weight', 'sum_volume_weight', 'sum_cubic', 'user_create_id', 'user_update_id','cargo_loader_id', 'user_open_id', 'open_status'
    ];

    //=========================================================
    public static function saveDetail($id, $data) {
        $i=-1;
        $a=0;

        while($a < count($data['hidden_receipt_entry'])){
            $i++;
            if(isset($data['hidden_receipt_entry'][$i])){
                if($data['hidden_receipt_entry'][$i]>0){
                    $affectedRows = ReceiptEntry::where('id', '=', $data['hidden_receipt_entry'][$i])->update(['cargo_loader_id' => $id]);
                    $a++;
                }else{
/*
                    $count = ReceiptEntry::count() + 1;
                    $receipt_entry_code= str_pad($count, 10, '0', STR_PAD_LEFT);
                        if (isset($data['hidden_warehouse_line'][$i])){
                            $obj = [

                                'code'=>   $receipt_entry_code,
                                'date_in'=>  $data['hidden_date_in'][$i],
                                'shipper_id'=>  $data['hidden_shipper_id'][$i],
                                'shipper_city'=>  $data['hidden_shipper_city'][$i],
                                'shipper_state_id'=>  $data['hidden_shipper_state_id'][$i],
                                'shipper_zip_code_id'=>  $data['hidden_shipper_zip_code_id'][$i],
                                'shipper_phone'=>  $data['hidden_shipper_phone'][$i],
                                'shipper_fax '=>  $data['hidden_shipper_fax'][$i],
                                'consignee_id '=>  $data['hidden_consignee_id'][$i],
                                'consignee_city '=>  $data['hidden_consignee_city'][$i],
                                'consignee_state_id'=>  $data['hidden_consignee_state_id'][$i],
                                'consignee_zip_code_id'=>  $data['hidden_consignee_zip_code_id'][$i],
                                'consignee_phone'=>  $data['hidden_consignee_phone'][$i],
                                'consignee_fax'=>  $data['hidden_consignee_fax'][$i],
                                'status'=>  $data['hidden_status'][$i],
                                'sum_pieces'=>  $data['hidden_sum_pieces'][$i],
                                'sum_weight'=>  $data['hidden_sum_weight'][$i],
                                'sum_cubic'=>  $data['hidden_sum_cubic'][$i],
                                'sum_volume_weight'=>  $data['hidden_sum_volume_weight'][$i],
                                'user_create_id'=>   $data['user_create_id'],
                                'user_update_id'=>  $data['user_update_id'] ,

                                'third_party_id'=> (isset( $data['third_id'])?  $data['third_id']: 0) ,
                                'third_party_phone'=> (isset( $data['third_contact_phone'] )?  $data['third_contact_phone'] : 0) ,
                                'receiving_carrier_id'=>  $data['carrier_id'] ,

                                'division_id '=> $data['division_id'],
                                'mode'=> 'O',
                                'location_origin_id '=> $data['place_receipt_id'],
                                'location_destination_id '=> $data['place_delivery_id'],
                                'warehouse_id'=>  $data['hidden_warehouse_id'][$i],
                                'cargo_loader_id'=>  $id,
                            ];

                            $id = ReceiptEntry::create($obj)->id;
                            $data['inserted_id'] = Common::replaceId($id, $data['hidden_warehouse_line'][$i], $data['details_id'], $data['inserted_id']);
                            $a++;
                        }*/
                    }


            }
        }
       // ReceiptEntryCargoDetail::saveDetail($data);
    /*    $i= -1;
        $a=0;
        if (isset($data['hidden_warehouse_line']) ){
            while($a < count($data['hidden_warehouse_line'])){
                $i++;
                if (isset($data['hidden_warehouse_line'][$i])){
                    $obj = [
                        'code'=>   $data['hidden_warehouse_number'][$i],
                        'date_in'=>  $data['hidden_date_in'][$i],
                        'shipper_id'=>  $data['hidden_shipper_id'][$i],
                        'shipper_city'=>  $data['hidden_shipper_city'][$i],
                        'shipper_state_id'=>  $data['hidden_shipper_state_id'][$i],
                        'shipper_zip_code_id'=>  $data['hidden_shipper_zip_code_id'][$i],
                        'shipper_phone'=>  $data['hidden_shipper_phone'][$i],
                        'shipper_fax '=>  $data['hidden_shipper_fax'][$i],
                        'consignee_id '=>  $data['hidden_consignee_id'][$i],
                        'consignee_city '=>  $data['hidden_consignee_city'][$i],
                        'consignee_state_id'=>  $data['hidden_consignee_state_id'][$i],
                        'consignee_zip_code_id'=>  $data['hidden_consignee_zip_code_id'][$i],
                        'consignee_phone'=>  $data['hidden_consignee_phone'][$i],
                        'consignee_fax'=>  $data['hidden_consignee_fax'][$i],
                        'status'=>  $data['hidden_status'][$i],
                        'sum_pieces'=>  $data['hidden_sum_pieces'][$i],
                        'sum_weight'=>  $data['hidden_sum_weight'][$i],
                        'sum_cubic'=>  $data['hidden_sum_cubic'][$i],
                        'sum_volume_weight'=>  $data['hidden_sum_volume_weight'][$i],
                        'user_create_id'=>   $data['user_create_id'],
                        'user_update_id'=>  $data['user_update_id'] ,

                        'third_party_id'=> (isset( $data['third_id'])?  $data['third_id']: 0) ,
                        'third_party_phone'=> (isset( $data['third_contact_phone'] )?  $data['third_contact_phone'] : 0) ,
                        'receiving_carrier_id'=>  $data['carrier_id'] ,

                        'division_id '=> $data['division_id'],
                        'mode'=> 'O',
                        'location_origin_id '=> $data['place_receipt_id'],
                        'location_destination_id '=> $data['place_delivery_id'],
                        'warehouse_id'=>  $data['hidden_warehouse_id'][$i],
                        'cargo_loader_id'=>  $id,
                    ];

                    $id = ReceiptEntry::create($obj)->id;
                    $data['inserted_id'] = Common::replaceId($id, $data['hidden_warehouse_line'][$i], $data['details_id'], $data['inserted_id']);
                    $a++;
                }
            }
        }
        ReceiptEntryCargoDetail::createDetail('',$data);*/
    }
    //=========================================================


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

    public function user_create()
    {
        return $this->belongsTo('Sass\User', 'user_create_id');
    }

    public function user_open()
    {
        return $this->belongsTo('Sass\User', 'user_open_id');
    }
}
