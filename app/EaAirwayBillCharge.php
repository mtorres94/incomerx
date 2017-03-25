<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class EaAirwayBillCharge extends Model
{

    protected $table = "ea_airwaybill_charge";

    protected $fillable = [
        'id',   'line',   'airwaybill_id',   'billing_id',   'bill_type',   'bill_party',   'billing_quantity',   'billing_rate',   'billing_amount',   'billing_currency_type',   'billing_customer_id',   'cost_amount',   'cost_currency_type',   'cost_invoice',   'cost_reference',   'billing_notes',   'billing_unit_id',   'cost_quantity',   'cost_unit_id',   'cost_rate',   'cost_center',   'billing_vendor_code',   'billing_increase', 'cost_date'];

    public $timestamps= false;
    public static function saveDetail($id, $data) {
        $i=-1; $a=0;
        if (isset($data['charge_id'])){
            DB::table('ea_airwaybill_charge')->where('airwaybill_id', '=', $id)->delete();
            while($a < count($data['charge_id'])){
                $i++;
                if (isset($data['charge_id'][$i])){
                    $obj = new EaAirwayBillCharge();

                    $obj->airwaybill_id = $id;
                    $obj->line=  $a + 1;
                    $obj-> billing_id = $data['billing_billing_id'][$i];
                    $obj-> bill_type = $data['billing_bill_type'][$i];
                    $obj-> bill_party = $data['billing_bill_party'][$i];
                    $obj-> billing_quantity = $data['billing_quantity'][$i];
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


    public static function saveDetailAwb($id, $data) {
      /*  $a=0; $i=0;

        while(isset($data['warehouse_select'][$i]) ) {
            $receipts = ReceiptEntryChargeDetail::select('whr_receipts_entries_charges_details.*')->where('receipt_entry_id', '=', $data['warehouse_select'][$i])->get();
            foreach ($receipts as $whr) {
                $obj = [
                    'airwaybill_id' => $id,
                    'line' => ($a + 1),
                    'billing_id' => $whr->billing_id,
                    'bill_type' => $whr->bill_type,
                    'bill_party' => $whr->bill_party,
                    'billing_quantity' => $whr->billing_quantity,
                    'billing_rate' => $whr->billing_rate,
                    'billing_amount' => $whr->billing_amount,
                    'billing_currency_type' => $whr->billing_currency_type,
                    'billing_customer_id' => $whr->billing_customer_id,
                    'cost_amount' => $whr->cost_amount,
                    'cost_currency_type' => $whr->cost_currency_type,
                    'cost_invoice' => $whr->cost_invoice,
                    'cost_reference' => $whr->const_reference,
                    'billing_notes' => $whr->billing_notes,
                    'billing_unit_id' => $whr->billing_unit_id,
                    'cost_quantity' => $whr->cost_quantity,
                    'cost_unit_id' => $whr->cost_unit_id,
                    'cost_rate' => $whr->cost_rate,
                    'cost_center' => $whr->cost_center,
                    'billing_vendor_code' => $whr->vendor_id,
                    'billing_increase' => $whr->billing_increase,
                ];
                EaAirwayBillCharge::create($obj);
                $a++;
            }
            $i++;
        }*/
            $obj = [
                'bill_of_lading_id' => $id,
                'line' => 1,
                'billing_id' => 3,
            ];
            EaAirwayBillCharge::create($obj);

    }

    public function billing()
    {
        return $this->belongsTo('Sass\BillingCode', 'billing_id');
    }
    public function billing_customer()
    {
        return $this->belongsTo('Sass\Customer', 'billing_customer_id');
    }
    public function billing_vendor()
    {
        return $this->belongsTo('Sass\Vendor', 'billing_vendor_code');
    }
    public function billing_unit()
    {
        return $this->belongsTo('Sass\Unit', 'billing_unit_id');
    }
    public function cost_unit()
    {
        return $this->belongsTo('Sass\Unit', 'cost_unit_id');
    }
    public function airwaybill()
    {
        return $this->belongsTo('Sass\EaAirwaybill', 'airwaybill_id');
    }

}
