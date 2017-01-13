<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class IoBillOfLadingOriginCharge extends Model
{
    protected $table = "io_bill_of_lading_origin_charge";

    protected $fillable = [
        'id', 'created_at', 'updated_at', 'line', 'bill_of_lading_id', 'billing_id', 'billing_description', 'bill_type', 'bill_party','billing_notes', 'billing_quantity', 'billing_unit_id', 'billing_increase', 'billing_rate', 'billing_amount', 'billing_currency_type', 'billing_exchange_rate', 'billing_customer_id','cost_quantity', 'cost_unit_id', 'cost_rate', 'cost_amount', 'cost_currency_type', 'cost_exchange_rate', 'billing_vendor_code', 'cost_date', 'cost_invoice', 'cost_center', 'cost_reference'];

    public static function saveDetail($id, $data) {
        $i=-1; $a=0;
        DB::table('io_bill_of_lading_origin_charge')->where('bill_of_lading_id', '=', $id)->delete();
        if (isset($data['charge_line'])){

            while($a < count($data['charge_line'])){
                $i++;
                if (isset($data['charge_line'][$i])){
                    $obj = new IoBillOfLadingOriginCharge();

                    $obj->bill_of_lading_id = $id;
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
    public static function search($id){
        return self::where('bill_of_lading_id', $id)->get();
    }

    public function billing()
    {
        return $this->belongsTo('Sass\BillingCode', 'billing_id');
    }
    public function billing_unit()
    {
        return $this->belongsTo('Sass\Unit', 'bill_unit_id');
    }
    public function cost_unit()
    {
        return $this->belongsTo('Sass\Unit', 'cost_unit_id');
    }
    public function billing_customer()
    {
        return $this->belongsTo('Sass\Customer', 'customer_id');
    }
    public function billing_vendor()
    {
        return $this->belongsTo('Sass\Vendor', 'vendor_code');
    }
    public function billing_currency()
    {
        return $this->belongsTo('Sass\Currency', 'billing_currency_type');
    }
    public function cost_currency()
    {
        return $this->belongsTo('Sass\Currency', 'cost_currency_type');
    }


}
