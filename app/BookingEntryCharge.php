<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class BookingEntryCharge extends Model
{
    protected $table = 'exp_booking_entries_charge';

    protected $fillable = [
        'booking_entry_id', 'line', 'billing_id', 'billing_description', 'bill_type', 'bill_party', 'billing_notes', 'billing_quantity', 'billing_unit_id', 'billing_increase', 'billing_rate', 'billing_amount', 'billing_currency_type', 'billing_customer_id', 'cost_quantity', 'cost_unit_id', 'cost_rate', 'cost_amount', 'cost_currency_type', 'vendor_id', 'cost_invoice', 'cost_center', 'cost_reference', 'created_at', 'updated_at'];

    public static function saveDetail($id, $data) {
        $i=-1; $a=0;
        if (isset($data['charge_id'])){
            $details= DB::table('exp_booking_entries_charge')->where('booking_entry_id', '=', $id)->delete();
            while($a < count($data['charge_id'])){
                $i++;
                if(isset($data['charge_id'][$i])){
                    $obj = new BookingEntryCharge();

                    $obj->booking_entry_id = $id;
                    $obj->line =  $data['charge_id'][$i];
                    $obj-> billing_id = $data['billing_billing_id'][$i];
                    $obj-> billing_description = $data['billing_billing_description'][$i];
                    $obj->bill_type = $data['billing_bill_type'][$i];
                    $obj->bill_party = $data['billing_bill_party'][$i];
                    $obj->billing_notes = $data['billing_notes'][$i];

                    $obj->billing_quantity=  $data['billing_quantity'][$i];
                    $obj-> billing_unit_id = $data['billing_unit_id'][$i];
                    $obj->billing_increase = $data['billing_increase'][$i];
                    $obj->billing_rate = $data['billing_rate'][$i];
                    $obj->billing_amount = $data['billing_amount'][$i];

                    $obj->billing_currency_type=  $data['billing_currency_type'][$i];
                    $obj-> billing_customer_id = $data['billing_customer_id'][$i];
                    $obj->cost_quantity = $data['cost_quantity'][$i];
                    $obj->cost_unit_id = $data['cost_unit_id'][$i];
                    $obj->cost_rate = $data['cost_rate'][$i];

                    $obj->cost_amount=  $data['cost_amount'][$i];
                    $obj-> cost_currency_type = $data['cost_currency_type'][$i];
                    $obj->vendor_id = $data['billing_vendor_code'][$i];
                    $obj->cost_invoice = $data['cost_invoice'][$i];
                    $obj->cost_center = $data['cost_cost_center'][$i];
                    $obj->cost_reference = $data['cost_reference'][$i];
                    $obj->save();
                    $a++;
                }
            }
        }
    }
    public static function search($id){
        return self::where('booking_entry_id', $id)->get();
    }

    public function billing_billing()
    {
        return $this->belongsTo('Sass\BillingCode', 'billing_id');
    }
    public function billing_unit()
    {
        return $this->belongsTo('Sass\Unit', 'billing_unit_id');
    }
    public function cost_unit()
    {
        return $this->belongsTo('Sass\Unit', 'cost_unit_id');
    }
    public function billing_customer()
    {
        return $this->belongsTo('Sass\Customer', 'billing_customer_id');
    }
    public function billing_vendor()
    {
        return $this->belongsTo('Sass\Vendor', 'vendor_id');
    }
    public function booking_entry()
    {
        return $this->belongsTo('Sass\BookingEntry', 'booking_entry_id');
    }

}
