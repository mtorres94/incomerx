<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class IoQuoteDestinationCharge extends Model
{
    protected $table = "io_quote_destination_charges";

    protected $fillable = [
        'id', 'quote_id','line', 'billing_id', 'bill_type', 'bill_party','billing_quantity','billing_description', 'billing_rate', 'billing_amount', 'billing_currency_type', 'billing_customer_id', 'cost_amount', 'cost_currency_type', 'cost_invoice', 'cost_reference', 'billing_notes', 'billing_unit_id', 'billing_exchange_rate', 'cost_quantity', 'cost_unit_id', 'cost_rate', 'cost_center', 'cost_exchange_rate', 'billing_vendor_code', 'cost_date', 'billing_increase' ];
    public $timestamps= false;
    public static function saveDetail($id, $data) {
        $i=-1; $a=0;
        DB::table('io_quote_destination_charges')->where('quote_id', '=', $id)->delete();
        if (isset($data['dest_charge_id'])){

            while($a < count($data['dest_charge_id'])){
                $i++;
                if (isset($data['dest_charge_id'][$i])){
                    $obj = new IoQuoteDestinationCharge();

                    $obj->quote_id = $id;
                    $obj->line=  $a + 1;
                    $obj-> billing_id = $data['dest_billing_id'][$i];
                    $obj-> bill_type = $data['dest_bill_type'][$i];
                    $obj-> bill_party = $data['dest_bill_party'][$i];
                    $obj-> billing_description = $data['dest_billing_description'][$i];
                    $obj-> billing_quantity = $data['dest_billing_quantity'][$i];
                    $obj-> billing_rate = $data['dest_billing_rate'][$i];
                    $obj-> billing_amount = $data['dest_billing_amount'][$i];
                    $obj-> billing_currency_type = $data['dest_billing_currency_type'][$i];
                    $obj-> billing_customer_id = $data['dest_billing_customer_id'][$i];
                    $obj-> cost_amount = $data['dest_cost_amount'][$i];
                    $obj-> cost_currency_type = $data['dest_cost_currency_type'][$i];
                    $obj-> cost_invoice = $data['dest_cost_invoice'][$i];
                    $obj-> cost_reference = $data['dest_cost_reference'][$i];
                    $obj-> billing_notes = $data['dest_notes'][$i];
                    $obj-> billing_unit_id = $data['dest_billing_unit_id'][$i];
                    $obj-> cost_quantity = $data['dest_cost_quantity'][$i];
                    $obj-> cost_unit_id = $data['dest_cost_unit_id'][$i];
                    $obj-> cost_rate = $data['dest_cost_rate'][$i];
                    $obj-> cost_center = $data['dest_cost_center'][$i];
                    $obj-> billing_vendor_code = $data['dest_vendor_code'][$i];
                    $obj-> cost_date = $data['dest_cost_date'][$i];
                    $obj-> billing_increase = $data['dest_billing_increase'][$i];
                    $obj->save();
                    $a++;
                }

            }
        }

    }


    public static function Search($id){
        return self::where('quote_id', $id)->get();
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
    public function billing_currency()
    {
        return $this->belongsTo('Sass\Currency', 'billing_currency_type');
    }
    public function billing_vendor()
    {
        return $this->belongsTo('Sass\Vendor', 'billing_vendor_code');
    }
    public function cost_currency()
    {
        return $this->belongsTo('Sass\Currency', 'cost_currency_type');
    }
}
