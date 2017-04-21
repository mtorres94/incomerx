<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Sass\Logic\Common\CommonFunctions as Common;
use Illuminate\Support\Facades\DB;


class EoBillOfLading extends Model
{
    protected $table = "eo_bills_of_lading";

    protected $fillable = [
        'id', 'user_create_id', 'user_update_id', 'created_at', 'updated_at', 'code', 'bl_class', 'bl_type', 'division_id', 'date', 'rate_class', 'status', 'quote_number_id', 'ship_inst', 'project_number', 'shipment_number', 'booking_code', 'manifest_type', 'mbl_code', 'hbl_code', 'currency_type', 'declared_value', 'insured_value', 'exchange_rate', 'collect_free', 'insurance', 'stand_by', 'partial', 'spot_rate', 'confirmed', 'POD_info', 'amount',
        'shipper_id', 'shipper_address', 'shipper_city', 'shipper_state_id', 'shipper_country_id', 'shipper_zip_code_id', 'shipper_phone',
        'consignee_id', 'consignee_address', 'consignee_city', 'consignee_state_id', 'consignee_country_id', 'consignee_zip_code_id', 'consignee_phone',
        'notify_id', 'notify_address', 'notify_city', 'notify_state_id', 'notify_country_id', 'notify_zip_code_id', 'notify_phone', 'notify_contact', 'notify_contact_phone', 'notify_email',
        'third_id', 'third_address', 'third_city', 'third_state_id', 'third_zip_code_id', 'third_contact', 'third_contact_phone', 'third_email',
       'pod_date', 'pod_expected_date', 'pod_received_by', 'pod_incident','pod_note', 'add_info_comments', 'SDK_name', 'SDK_address', 'SDK_attn', 'SDK_reff', 'SDK_notes', 'inland_carrier_id', 'inland_date','inland_dbl_mbl_code', 'import_date', 'import_master_number', 'import_house_number', 'import_shipment_number', 'confirm_status', 'uplift', 'confirm_master_number', 'confirm_house_number', 'confirm_shipment_number', 'broker_code', 'broker_phone', 'broker_reference', 'destination_broker_code', 'destination_broker_phone', 'destination_broker_reference', 'port_loading_id', 'port_unloading_id', 'carrier_id', 'vessel_name', 'voyage_name', 'departure_date', 'arrival_date', 'origin_country_id', 'customs_code', 'it_number', 'incoterm_type', 'forwarding_agent_id', 'commission_p', 'coloader_id', 'document_number', 'bl_number', 'export_reference', 'point_of_origin', 'fmc_number', 'agent_id', 'agent_address', 'agent_city', 'agent_state_id', 'agent_country_id', 'agent_zip_code_id', 'agent_phone', 'agent_commission_amount', 'agent_commission_p', 'domestic_instruction', 'pre_carriage_by', 'place_receipt', 'loading_terminal', 'vessel_yes', 'vessel_no', 'exporting_carrier', 'port_loading', 'type_of_move', 'foreign_port', 'place_delivery', 'transhipment_port_id', 'letter_comments', 'comments_comment', 'total_pieces', 'total_commodity_name', 'total_weight_unit', 'total_weight_kgs','total_cubic_cbm', 'total_charge_weight_kgs', 'total_gross_weight', 'total_cubic', 'total_charge_weight', 'bl_comments', 'bl_doc_type', 'bl_notes', 'shipment_id', 'cargo_loader_id', 'bill_of_lading_id', 'user_open_id', 'agent_contact', 'agent_fax', 'total_prepaid', 'total_collected', 'total_bill', 'total_cost', 'total_profit', 'total_profit_percent'];

    public function setCollectFreeAttribute($value)
    {
        $this->attributes['collect_free'] = ($value == 'on') ? 1 : 0;
    }
    public function setInsuranceAttribute($value)
    {
        $this->attributes['insurance'] = ($value == 'on') ? 1 : 0;
    }
    public function setStandByAttribute($value)
    {
        $this->attributes['stand_by'] = ($value == 'on') ? 1 : 0;
    }
    public function setPartialAttribute($value)
    {
        $this->attributes['partial'] = ($value == 'on') ? 1 : 0;
    }
    public function setSpotRateAttribute($value)
    {
        $this->attributes['spot_rate'] = ($value == 'on') ? 1 : 0;
    }
    public function setConfirmedAttribute($value)
    {
        $this->attributes['confirmed'] = ($value == 'on') ? 1 : 0;
    }
    public function setPODInfoAttribute($value)
    {
        $this->attributes['POD_info'] = ($value == 'on') ? 1 : 0;
    }
    public function setVesselYesAttribute($value)
    {
        $this->attributes['vessel_yes'] = ($value == 'on') ? 1 : 0;
    }
    public function setVesselNoAttribute($value)
    {
        $this->attributes['vessel_no'] = ($value == 'on') ? 1 : 0;
    }
    public function getCollectFreeAttribute($value)
    {
        return ($value == 1) ? 'on' : 'off';
    }
    public function getSpotRateAttribute($value)
    {
        return ($value == 1) ? 'on' : 'off';
    }
    public function getInsuranceFreeAttribute($value)
    {
        return ($value == 1) ? 'on' : 'off';
    }
    public function getStandByAttribute($value)
    {
        return ($value == 1) ? 'on' : 'off';
    }
    public function getPartialAttribute($value)
    {
        return ($value == 1) ? 'on' : 'off';
    }
    public function getConfirmedAttribute($value)
    {
        return ($value == 1) ? 'on' : 'off';
    }
    public function getPODInfoAttribute($value)
    {
        return ($value == 1) ? 'on' : 'off';
    }
    public function getVesselYesAttribute($value)
    {
        return ($value == 1) ? 'on' : 'off';
    }
    public function getVesselNoAttribute($value)
    {
        return ($value == 1) ? 'on' : 'off';
    }



    public static function updateHBL($id, $data)
    {
        $i = 0;
        $a = 0;
        EoBillOfLading::where('bill_of_lading_id', $id)->update(['status' => "O",'bill_of_lading_id' => "0", 'mbl_code' => " "]);
           if (isset($data['cargo_hbl_id'])){
               while ($a < count($data['cargo_hbl_id'])) {
                   if (isset($data['cargo_hbl_id'][$i])) {
                       EoBillOfLading::where('id', $data['cargo_hbl_id'][$i])->update(['status' => "C",'bill_of_lading_id' => $id, 'mbl_code' => $data['code']]);

                       $a++;
                   }
                   $i++;
               }
           }
    }


    public static function saveDetail($id, $data, $id_group)
    {
        $a=0; $i= -1; $group = []; $codes=[];
        if (isset($data['group_by'])) {
            $count_group_id = count($id_group);
            if($data['group_by'] == "1") {
                $group  = $data['shipper_id'];
            }elseif ($data['group_by'] == "2"){
                $group = $data['consignee_id'];
            }elseif ($data['group_by'] == "3"){
                $group  =$data['warehouse_id'];
                $count_group_id = 1;
            }
                while ($a < $count_group_id) {
                    $i++;
                    $shipper= Customer::findOrFail($data['shipper_id'][$a]);
                    $consignee= Customer::findOrFail($data['consignee_id'][$a]);
                    $shipment = EoShipmentEntry::findOrFail($data['tmp_shipment_id']);
                    $type =  $shipment->shipment_type == 'C' ? 'HBL' : 'DBL';
                    $last = EoBillOfLading::orderBy('code','desc')->where('code', 'LIKE', $type.'%') ->first();
                    $frmt = $last == null ? 1 : intval(substr($last->code, 4)) + 1;
                    $code = str_pad($frmt, 6, '0', 0);
                    $data['code'] = $type."-".$code;
                        $obj = [
                            'bill_of_lading_id' => 0,
                            'cargo_loader_id' => $id,
                            'status' => "O",
                            'bl_type' => "C",
                            'fmc_number' => "021671NF",
                            'date' => $data['tmp_date_today'],
                            'user_create_id' => Auth::user()->id,
                            'user_open_id' => 0,
                            'user_update_id' => Auth::user()->id,
                            'booking_code' => $data['tmp_booking_code'],
                            'document_number' => $data['tmp_booking_code'],
                            'bl_number' => $data['code'],

                            'shipment_id' => $shipment->id,
                            'code' => $data['code'],
                            'hbl_code' => $data['code'],
                            'bl_class' =>($shipment->shipment_type == 'C'? '2' : '1'),
                            'carrier_id' => $shipment->carrier_id,
                            'departure_date' => $shipment->departure_date,
                            'arrival_date' => $shipment->arrival_date,

                            'place_receipt' => strtoupper($shipment->place_receipt_id > 0 ? $shipment->place_receipt->name : ""),
                            'place_delivery' => strtoupper($shipment->place_delivery_id > 0 ? $shipment->place_delivery->name : ""),
                            'foreign_port' => strtoupper($shipment->port_unloading_id > 0 ? $shipment->port_unloading->name : ""),
                            'port_loading' => strtoupper($shipment->port_loading_id > 0 ? $shipment->port_loading->name : ""),
                            'vessel_name' => $shipment->vessel_name,
                            'voyage_name' => $shipment->voyage_name,
                            'port_loading_id' => $shipment->port_loading_id,
                            'port_unloading_id' => $shipment->port_unloading_id,
                            'forwarding_agent_id' => $shipment->agent_id,
                            'exporting_carrier' => strtoupper($shipment->carrier_id > 0 ? $shipment->carrier->name  : ""),
                            'pre_carriage_by' => strtoupper($shipment->inland_carrier_id > 0 ? $shipment->inland_carrier->name : ""),

                            'shipper_id' => $shipper->id,
                            'shipper_address' => $shipper->address,
                            'shipper_state_id'=> $shipper->state_id,
                            'shipper_city' => $shipper->city,
                            'shipper_country_id' => $shipper->country_id,
                            'shipper_zip_code_id' => $shipper->zip_code_id,

                            'consignee_id' => $consignee->id,
                            'consignee_address' => $consignee->address,
                            'consignee_state_id'=> $consignee->state_id,
                            'consignee_city' => $consignee->city,
                            'consignee_country_id' => $consignee->country_id,
                            'consignee_zip_code_id' => $consignee->zip_code_id,

                            'agent_id' => $shipment->agent_id >0 ? $shipment->agent->id : "",
                            'agent_address' => $shipment->agent_id > 0 ? $shipment->agent->address : "",
                            'agent_state_id'=> $shipment->agent_id > 0 ? $shipment->agent->state_id: "",
                            'agent_city' => $shipment->agent_id > 0 ? $shipment->agent->city : "",
                            'agent_country_id' => $shipment-> agent_id >0 ? $shipment->agent->country_id : "",
                            'agent_zip_code_id' => $shipment->agent_id > 0 ? $shipment->agent->zip_code_id : "",

                            'notify_id' => $shipment->notify_id >0 ? $shipment->notify->id : "",
                            'notify_address' => $shipment->notify_id > 0 ? $shipment->notify->address : "",
                            'notify_state_id'=> $shipment->notify_id > 0 ? $shipment->notify->state_id: "",
                            'notify_city' => $shipment->notify_id > 0 ? $shipment->notify->city : "",
                            'notify_country_id' => $shipment-> notify_id >0 ? $shipment->notify->country_id : "",
                            'notify_zip_code_id' => $shipment->notify_id > 0 ? $shipment->notify->zip_code_id : "",

                            'commission' => $shipment->agent_commission_p,
                            'amount' => $shipment->agent_amount,
                        ];
                        $id_hbl = EoBillOfLading::create($obj)->id;
                        $codes = $id_hbl;

                        //EoHblReceiptEntry::saveDetail($id, $data);
                    //========================================================
                    //EoBillOfLadingContainer::saveDetail($id_hbl, $data);
                    //========================================================
                        //$data['inserted_id'] = Common::replaceId($id_hbl, $data['resume_line'][$i], $data['resume_line'], $data['inserted_id']);
                        //$data['hbl_line_id'] = Common::replaceId($id_hbl, $data['resume_line'][$i], $data['hidden_flag'], $data['hbl_line_id']);
                            if($data['group_by'] == '3'){
                                $x=0;
                                for($y=0; $y < count($data['warehouse_id']); $y ++){
                                    if(isset($data["warehouse_select"][$x]) and ($data['warehouse_id'][$y] == $data["warehouse_select"][$x])){
                                        $data['hbl_line_id'][$y] = $id_hbl;
                                        $x++;
                                    }
                                }
                            }else {
                                $data['hbl_line_id'] = Common::replaceId($id_hbl, $id_group[$a], $group, $data['hbl_line_id']);
                            }
                    EoBillOfLadingCharge::saveDetailHBL($id_hbl, $data);
                    $a++;
                }

            EoHblReceiptEntry::saveDetail($id, $data);
            EoBillOfLadingCargo::saveDetailHBL($data);
        }
        return $codes;
    }


    public function division()
    {
        return $this->belongsTo('Sass\Division', 'division_id');
    }

    public function shipment()
    {
        return $this->belongsTo('Sass\EoShipmentEntry', 'shipment_id');
    }
    public function total_commodity()
    {
        return $this->belongsTo('Sass\Commodity', 'total_commodity_id');
    }
    public function origin_country()
    {
        return $this->belongsTo('Sass\Country', 'origin_country_id');
    }

    public function cargo_loader()
    {
        return $this->belongsTo('Sass\EoCargoLoader', 'cargo_loader_id');
    }
    public function user_create()
    {
        return $this->belongsTo('Sass\User', 'user_create_id');
    }
    public function user_open()
    {
        return $this->belongsTo('Sass\User', 'user_open_id');
    }
    public function loading()
    {
        return $this->belongsTo('Sass\OceanPort', 'port_loading_id');
    }
    public function unloading()
    {
        return $this->belongsTo('Sass\OceanPort', 'port_unloading_id');
    }
    public function transhipment_port()
    {
        return $this->belongsTo('Sass\OceanPort', 'transhipment_port_id');
    }
    public function shipper()
    {
        return $this->belongsTo('Sass\Customer', 'shipper_id');
    }
    public function quote_number()
    {
        return $this->belongsTo('Sass\Customer', 'quote_number_id');
    }
    public function booking_entry()
    {
        return $this->belongsTo('Sass\BookingEntry', 'booking_entry_id');
    }
    public function consignee()
    {
        return $this->belongsTo('Sass\Customer', 'consignee_id');
    }
    public function third()
    {
        return $this->belongsTo('Sass\Customer', 'third_id');
    }

    public function notify()
    {
        return $this->belongsTo('Sass\Customer', 'notify_id');
    }
    public function forwarding_agent()
    {
        return $this->belongsTo('Sass\Customer', 'forwarding_agent_id');
    }
    public function coloader()
    {
        return $this->belongsTo('Sass\Customer', 'coloader_id');
    }
    public function agent()
    {
        return $this->belongsTo('Sass\Customer', 'agent_id');
    }
    public function shipper_state()
    {
        return $this->belongsTo('Sass\State', 'shipper_state_id');
    }
    public function third_state()
    {
        return $this->belongsTo('Sass\State', 'third_state_id');
    }
    public function consignee_state()
    {
        return $this->belongsTo('Sass\State', 'consignee_state_id');
    }
    public function notify_state()
    {
        return $this->belongsTo('Sass\State', 'notify_state_id');
    }
    public function agent_state()
    {
        return $this->belongsTo('Sass\State', 'agent_state_id');
    }
    public function inland_carrier()
    {
        return $this->belongsTo('Sass\Carrier', 'inland_carrier_id');
    }

    public function carrier()
    {
        return $this->belongsTo('Sass\Carrier', 'carrier_id');
    }
    public function shipper_zip_code()
    {
        return $this->belongsTo('Sass\ZipCode', 'shipper_zip_code_id');
    }
    public function consignee_zip_code()
    {
        return $this->belongsTo('Sass\ZipCode', 'consignee_zip_code_id');
    }
    public function notify_zip_code()
    {
        return $this->belongsTo('Sass\ZipCode', 'notify_zip_code_id');
    }
    public function agent_zip_code()
    {
        return $this->belongsTo('Sass\ZipCode', 'agent_zip_code_id');
    }
    public function third_zip_code()
    {
        return $this->belongsTo('Sass\ZipCode', 'third_zip_code_id');
    }
    public function shipper_country()
    {
        return $this->belongsTo('Sass\Country', 'shipper_country_id');
    }
    public function consignee_country()
    {
        return $this->belongsTo('Sass\Country', 'consignee_country_id');
    }
    public function notify_country()
    {
        return $this->belongsTo('Sass\Country', 'notify_country_id');
    }
    public function agent_country()
    {
        return $this->belongsTo('Sass\Country', 'agent_country_id');
    }

    public function cargo()
    {
        return $this->hasMany('Sass\EoBillOfLadingCargo', 'bill_of_lading_id');
    }
    public function cargo_details()
    {
        return $this->hasMany('Sass\EoBillOfLadingCargoDetail', 'bill_of_lading_id');
    }
    public function charge()
    {
        return $this->hasMany('Sass\EoBillOfLadingCharge', 'bill_of_lading_id');
    }
    public function container()
    {
        return $this->hasMany('Sass\EoBillOfLadingContainer', 'bill_of_lading_id');
    }
    public function customerReference()
    {
        return $this->hasMany('Sass\EoBillOfLadingCustomerReference', 'bill_of_lading_id');
    }
    public function hazardous()
    {
        return $this->hasMany('Sass\EoBillOfLadingHazardous', 'bill_of_lading_id');
    }
    public function item()
    {
        return $this->hasMany('Sass\EoBillOfLadingItem', 'bill_of_lading_id');
    }
    public function pro_tracking()
    {
        return $this->hasMany('Sass\EoBillOfLadingProTracking', 'bill_of_lading_id');
    }
    public function transportation()
    {
        return $this->hasMany('Sass\EoBillOfLadingTransportation', 'bill_of_lading_id');
    }
    public function pivot()
    {
        return $this->hasMany('Sass\EoHblReceiptEntry', 'bill_of_lading_id');
    }

    public function hbl_node()
    {
        return $this->hasMany('Sass\EoBillOfLading', 'bill_of_lading_id');
    }

    public function receipt_entries()
    {
        return $this->hasMany('Sass\ReceiptEntry', 'bill_of_lading_id');
    }
}
