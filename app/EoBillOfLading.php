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
        'id', 'user_create_id', 'user_update_id', 'created_at', 'updated_at', 'code', 'bl_class', 'bl_type', 'division_id', 'bl_date', 'rate_class', 'bl_status', 'quote_number_id', 'ship_inst', 'project_number', 'shipment_number', 'booking_code', 'manifest_type', 'dbl_mbl_code', 'hbl_code', 'currency_type', 'declared_value', 'insured_value', 'exchange_rate', 'collect_free', 'insurance', 'stand_by', 'partial', 'spot_rate', 'confirmed', 'POD_info', 'amount',
        'shipper_id', 'shipper_address', 'shipper_city', 'shipper_state_id', 'shipper_country_id', 'shipper_zip_code_id', 'shipper_phone',
        'consignee_id', 'consignee_address', 'consignee_city', 'consignee_state_id', 'consignee_country_id', 'consignee_zip_code_id', 'consignee_phone',
        'notify_id', 'notify_address', 'notify_city', 'notify_state_id', 'notify_country_id', 'notify_zip_code_id', 'notify_phone', 'notify_contact', 'notify_contact_phone', 'notify_email',
        'third_id', 'third_address', 'third_city', 'third_state_id', 'third_zip_code_id', 'third_contact', 'third_contact_phone', 'third_email',
       'pod_date', 'pod_expected_date', 'pod_received_by', 'pod_incident','pod_note', 'add_info_comments', 'SDK_name', 'SDK_address', 'SDK_attn', 'SDK_reff', 'SDK_notes', 'inland_carrier_id', 'inland_date','inland_dbl_mbl_code', 'import_date', 'import_master_number', 'import_house_number', 'import_shipment_number', 'confirm_status', 'uplift', 'confirm_master_number', 'confirm_house_number', 'confirm_shipment_number', 'broker_code', 'broker_phone', 'broker_reference', 'destination_broker_code', 'destination_broker_phone', 'destination_broker_reference', 'port_loading_id', 'port_unloading_id', 'carrier_id', 'vessel_name', 'voyage_name', 'departure_date', 'arrival_date', 'origin_country_id', 'customs_code', 'it_number', 'incoterm_type', 'forwarding_agent_id', 'commission_p', 'coloader_id', 'document_number', 'bl_number', 'export_reference', 'point_of_origin', 'fmc_number', 'agent_id', 'agent_address', 'agent_city', 'agent_state_id', 'agent_country_id', 'agent_zip_code_id', 'agent_phone', 'agent_commission_amount', 'agent_commission_p', 'domestic_instruction', 'pre_carriage_by', 'place_receipt', 'loading_terminal', 'vessel_yes', 'vessel_no', 'exporting_carrier', 'port_loading', 'type_of_move', 'foreign_port', 'place_delivery', 'transhipment_port_id', 'letter_comments', 'comments_comment', 'total_pieces', 'total_commodity_id', 'total_weight_unit_measurement', 'total_weight_kgs','total_cubic_cbm', 'total_charge_weight_kgs', 'total_weight_lbs', 'total_cubic_cft', 'total_charge_weight_lbs', 'bl_comments', 'bl_doc_type', 'bl_notes', 'shipment_id', 'cargo_loader_id', 'bill_of_lading_id', 'user_open_id', 'agent_contact', 'agent_fax'];

    public static function updateHBL($id, $data)
    {
        $i = 0;
        $a = 0;
            while ($a < count($data['cargo_hbl_id'])) {
                if (isset($data['cargo_hbl_id'][$i])) {
                    if ($data['cargo_hbl_id'][$i] > 0) {
                        EoBillOfLading::where('id', '=', $data['cargo_hbl_id'][$i])->update(['bill_of_lading_id' => $id]);

                    }
                    $a++;
                }
                $i++;
            }
    }

    public static function saveDetail($id, $data)
    {
        $a=0; $i= -1;

        if (isset($data['resume_line'])) {
         //   DB::table('eo_bills_of_lading')->where('cargo_loader_id', '=',$id)->delete();
                while ($a < count($data['resume_line'])) {
                    $i++;
                    if (isset($data['resume_line'][$i])) {
                        $count = EoBillOfLading::count() + 1;
                        $bill_of_lading_code = str_pad($count, 6, '0', STR_PAD_LEFT);
                        $data['code'] = "HBL-" . $bill_of_lading_code;

                        if($data['code'])
                        $obj = [
                            'bill_of_lading_id' => $data['bill_of_lading_id'],
                            'cargo_loader_id' => $id,
                            'bl_status' => "O",
                            'bl_date' => $data['date_today'],
                            'user_create_id' => Auth::user()->id,
                            'user_open_id' => 0,
                            'it_number' => $data['it_number'],
                            'incoterm_type' => $data['incoterm_type'],
                            'user_update_id' => $data['user_update_id'],
                            'shipment_id' => $data['shipment_id'],
                            'coloader_id' => $data['coloader_id'],
                            'origin_country_id' => $data['origin_country_id'],
                            'amount' => $data['amount'],
                            'insured_value' => $data['insured_value'],
                            'declared_value' => $data['declared_value'],
                            'customs_code' => $data['customs_code'],
                            'code' => $data['code'],
                            'hbl_code' => $data['code'],
                            'bl_class' => "2",
                            'bl_number' => $data['code'],
                            'place_receipt' => $data['place_receipt'],
                            'place_delivery' => $data['place_delivery'],
                            'foreign_port' => $data['port_unloading'],
                            'port_loading' => $data['port_loading'],
                            'shipper_id' => $data['shipper_id'],
                            'vessel_name' => $data['vessel_name'],
                            'voyage_name' => $data['voyage_name'],
                            'carrier_id' => $data['carrier_id'],
                            'shipper_state_id' => $data['shipper_state_id'],
                            'shipper_address' => $data['shipper_address'],
                            'shipper_city' => $data['shipper_city'],
                            'shipper_zip_code_id' => $data['shipper_zip_code_id'],
                            'shipper_phone' => $data['shipper_phone'],

                            'consignee_id' => $data['consignee_id'],
                            'consignee_state_id' => $data['consignee_state_id'],
                            'consignee_address' => $data['consignee_address'],
                            'consignee_city' => $data['consignee_city'],
                            'consignee_zip_code_id' => $data['consignee_zip_code_id'],
                            'consignee_phone' => $data['consignee_phone'],

                            'notify_id' => $data['notify_id'],
                            'notify_state_id' => $data['notify_state_id'],
                            'notify_address' => $data['notify_address'],
                            'notify_city' => $data['notify_city'],
                            'notify_zip_code_id' => $data['notify_zip_code_id'],
                            'notify_contact_phone' => $data['notify_contact_phone'],
                            'notify_contact' => $data['notify_contact'],
                            'departure_date' => $data['departure_date'],
                            'arrival_date' => $data['arrival_date'],

                            'booking_code' => $data['booking_code'],
                            'port_loading_id' => $data['port_loading_id'],
                            'port_unloading_id' => $data['port_unloading_id'],
                            'inland_carrier_id' => $data['inland_carrier_id'],
                            'domestic_instruction' => $data['domestic_instruction'],
                            'agent_id' => $data['agent_id'],
                            'forwarding_agent_id' => $data['forwarding_agent_id'],
                            'total_pieces'=> $data['resume_pieces'][$i],
                            'total_weight_unit_measurement'=> $data['resume_weight_unit'][$i],
                            'total_weight_lbs'=> $data['resume_gross_weight'][$i],
                            'total_cubic_cft'=> $data['resume_cubic'][$i],
                            'total_charge_weight_lbs'=> $data['resume_charge_weight'][$i],
                        ];
                        $id_hbl = EoBillOfLading::create($obj)->id;
                        //EoHblReceiptEntry::saveDetail($id, $data);
                        EoBillOfLadingContainer::saveDetail($id_hbl, $data);
                        $data['inserted_id'] = Common::replaceId($id_hbl, $data['resume_line'][$i], $data['resume_line'], $data['inserted_id']);
                        $data['hbl_line_id'] = Common::replaceId($id_hbl, $data['resume_line'][$i], $data['hidden_flag'], $data['hbl_line_id']);

                        $a++;
                    }
                }


                EoBillOfLadingCargo::saveDetailHBL($data);
                EoHblReceiptEntry::saveDetail($id, $data);

        }
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
        return $this->belongsTo('Sass\EoBillOfLading', 'bill_of_lading_id');
    }
}