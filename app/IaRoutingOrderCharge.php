<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class IaRoutingOrderCharge extends Model
{
    protected $table = "ia_routing_order_charge";

    protected $fillable = [
        'id' ,  'line' ,  'routing_order_id' ,  'billing_id' ,  'bill_type' ,  'bill_party' ,  'billing_quantity' ,  'billing_rate' ,  'billing_amount' ,  'billing_currency_type' ,  'billing_customer_id' ,  'cost_amount' ,  'cost_currency_type' ,  'cost_invoice' ,  'cost_reference' ,  'billing_notes' ,  'billing_unit_id' ,  'billing_exchange_rate' ,  'cost_quantity' ,  'cost_unit_id' ,  'cost_rate' ,  'cost_center' ,  'cost_exchange_rate' ,  'billing_vendor_code' ,  'cost_date' ,  'billing_increase' ,  'billing_description' ];    public $timestamps = false;
    public static function saveDetail($id, $data) {
        $i=-1; $a=0;
        DB::table('ia_routing_order_charge')->where('routing_order_id', '=', $id)->delete();
        if (isset($data['charge_id'])){

            while($a < count($data['charge_id'])){
                $i++;
                if (isset($data['charge_id'][$i])){
                    $obj = new IaRoutingOrderCharge();

                    $obj->routing_order_id = $id;
                    $obj->line=  $a + 1;
                    $obj-> billing_id = $data['billing_billing_id'][$i];
                    $obj-> bill_type = $data['billing_bill_type'][$i];
                    $obj-> bill_party = $data['billing_bill_party'][$i];
                    $obj-> billing_quantity = $data['billing_quantity'][$i];
                    $obj-> billing_description= $data['billing_billing_description'][$i];
                    $obj-> billing_rate = $data['billing_rate'][$i];
                    $obj-> billing_amount = $data['billing_amount'][$i];
                    $obj-> billing_currency_type = $data['billing_currency_type'][$i];
                    $obj-> billing_customer_id = $data['billing_customer_id'][$i];
                    $obj-> cost_amount = $data['cost_amount'][$i];
                    $obj-> cost_currency_type = $data['cost_currency_type'][$i];
                    $obj-> cost_invoice = $data['cost_invoice'][$i];
                    $obj-> cost_reference = $data['cost_reference'][$i];
                    $obj-> billing_notes = $data['billing_notes'][$i];
                    $obj-> billing_unit_id = $data['billing_unit_id'][$i];
                    $obj-> cost_quantity = $data['cost_quantity'][$i];
                    $obj-> cost_unit_id = $data['cost_unit_id'][$i];
                    $obj-> cost_rate = $data['cost_rate'][$i];
                    $obj-> cost_center = $data['cost_cost_center'][$i];
                    $obj-> billing_vendor_code = $data['billing_vendor_code'][$i];
                    $obj-> cost_date = $data['cost_date'][$i];
                    $obj-> billing_increase = $data['billing_increase'][$i];
                    $obj->save();
                    $a++;
                }

            }
        }

    }


    public static function Search($id){
        return self::where('routing_order_id', $id)->get();
    }
    public function billing()
    {
        return $this->belongsTo('Sass\BillingCode', 'billing_id');
    }
    public function billing_customer()
    {
        return $this->belongsTo('Sass\Customer', 'billing_customer_id');
    }
    public function billing_unit()
    {
        return $this->belongsTo('Sass\Unit', 'billing_unit_id');
    }
    public function cost_unit()
    {
        return $this->belongsTo('Sass\Unit', 'cost_unit_id');
    }
    public function billing_vendor()
    {
        return $this->belongsTo('Sass\Vendor', 'billing_vendor_code');
    }
}
