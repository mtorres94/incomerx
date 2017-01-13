<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class IoBillOfLadingDestinationCharge extends Model
{
    protected $table = "io_bill_of_lading_destination_charge";

    protected $fillable = [
        'id', 'created_at', 'updated_at', 'line', 'bill_of_lading_id', 'billing_id', 'billing_description', 'bill_type', 'bill_party','notes', 'bill_quantity', 'bill_unit_id', 'bil_increase', 'bill_rate', 'bill_amount', 'bill_currency_type', 'bill_exchange_rate', 'customer_id','cost_quantity', 'cost_unit_id', 'cost_rate', 'cost_amount', 'cost_currency_type', 'cost_exchange_rate', 'vendor_code', 'cost_date', 'cost_invoice', 'cost_center', 'cost_reference'];

    public static function saveDetail($id, $data) {
        $i=-1; $a=0;
        if (isset($data['destination_charge_id'])){
            $details= DB::table('io_bill_of_lading_destination_charge')->where('bill_of_lading_id', '=', $id)->delete();
            while($a < count($data['destination_charge_id'])){
                $i++;
                if (isset($data['destination_charge_id'][$i])){
                    $obj = new IoBillOfLadingDestinationCharge();

                    $obj->bill_of_lading_id = $id;
                    $obj->line=  $a + 1;
                    $obj-> billing_id = $data['destination_billing_id'][$i];
                    $obj-> billing_description = $data['destination_billing_description'][$i];
                    $obj-> bill_type = $data['destination_bill_type'][$i];
                    $obj-> bill_party = $data['destination_bill_type'][$i];
                    $obj-> notes = $data['destination_notes'][$i];
                    $obj-> bill_quantity = $data['destination_bill_quantity'][$i];
                    $obj-> bill_unit_id = $data['destination_bill_unit_id'][$i];
                    $obj-> bill_increase = $data['destination_bill_increase'][$i];
                    $obj-> bill_rate = $data['destination_bill_rate'][$i];
                    $obj-> bill_amount = $data['destination_bill_amount'][$i];
                    $obj-> bill_currency_type = $data['destination_bill_currency_type'][$i];
                    $obj-> bill_exchange_rate = $data['destination_bill_exchange_rate'][$i];
                    $obj-> customer_id = $data['destination_customer_id'][$i];
                    $obj-> cost_quantity = $data['destination_cost_quantity'][$i];
                    $obj-> cost_unit_id = $data['destination_cost_unit_id'][$i];
                    $obj-> cost_rate = $data['destination_cost_rate'][$i];
                    $obj-> cost_amount = $data['destination_cost_amount'][$i];
                    $obj-> cost_currency_type = $data['destination_cost_currency_type'][$i];
                    $obj-> cost_exchange_rate = $data['destination_cost_exchange_rate'][$i];
                    $obj-> vendor_code = $data['destination_vendor_code'][$i];
                    $obj-> cost_date = $data['destination_cost_date'][$i];
                    $obj-> cost_invoice = $data['destination_cost_invoice'][$i];
                    $obj-> cost_center = $data['destination_cost_center'][$i];
                    $obj-> cost_reference = $data['destination_cost_reference'][$i];
                    $obj->save();
                    $a++;
                }

            }
        }

    }


    public static function Search($id){
        return self::where('bill_of_lading_id', $id)->get();
    }
    public function billing()
    {
        return $this->belongsTo('Sass\BillingCode', 'billing_id');
    }
    public function billing_customer()
    {
        return $this->belongsTo('Sass\Customer', 'customer_id');
    }
    public function billing_unit()
    {
        return $this->belongsTo('Sass\Unit', 'bill_unit_id');
    }
    public function cost_unit()
    {
        return $this->belongsTo('Sass\Unit', 'cost_unit_id');
    }
    public function bill_of_lading()
    {
        return $this->belongsTo('Sass\IoBillOfLading', 'bill_of_lading_id');
    }
    public function billing_vendor()
    {
        return $this->belongsTo('Sass\Vendor', 'vendor_code');
    }
}
