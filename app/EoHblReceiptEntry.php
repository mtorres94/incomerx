<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class EoHblReceiptEntry extends Model
{
    protected $table = 'eo_hbl_receipt_entries';

    protected $fillable = [
        'line','receipt_entry_id', 'bill_of_lading_id', 'cargo_loader_id'];
    public $timestamps = false;

    public static function saveDetail($id, $data)
    {
        $i = 0;
        $a = 0;
    if($data["flag"] == 0){
        //DB::table('eo_hbl_receipt_entries')->where('cargo_loader_id', '=', $id)->delete();
    }else{
        ReceiptEntry::where('bill_of_lading_id', '=', $id)->update(['status' => "O", 'bill_of_lading_id'=> '0']);
        DB::table('eo_hbl_receipt_entries')->where('bill_of_lading_id', $id)->delete();
        DB::table('whr_receipts_entries_shipping_references')->where('reference_id', $id)->delete();
    }
        if (isset($data['warehouse_id'])) {
        //from EoCargoLoaderController      $id = cargo_loader_id
            //hidden_warehouse_line == code
            while ($a < count($data['warehouse_select'])) {
                if (isset($data['warehouse_code'][$i]) and ($data['warehouse_id'][$i] == $data['warehouse_select'][$a])) {

                    $obj = new EoHblReceiptEntry();
                    $obj->line = $a + 1;
                    $obj->bill_of_lading_id =  $data['hbl_line_id'][$i];
                    $obj->receipt_entry_id = $data['warehouse_id'][$i];
                    $obj->cargo_loader_id = $id;
                    $obj->save();
                    ReceiptEntry::where('id', '=', $data['warehouse_id'][$i])->update(['status' => "C", 'cargo_loader_id' => $id, 'bill_of_lading_id' => $data['hbl_line_id'][$i]]);
                    ReceiptEntryShippingReference::create(['receipt_entry_id'=> $data['warehouse_id'][$i], 'reference_number' => $data['code'], 'shipment_number' => $data['tmp_shipment_code'], 'user_id' => Auth::user()->id, 'type' => 'EO', 'reference_id' => $data['hbl_line_id'][$i]]);
                    $a++;
                }
                $i++;
            }
        }elseif (isset($data['cargo_hbl_id'])) {
            //from EoBillOfLadingController     $id = bill_of_lading_id

            while ($a < count($data['cargo_hbl_id'])) {
                if (isset($data['cargo_hbl_id'][$i]) ){
                        $obj = new EoHblReceiptEntry();
                        $obj->line = $a + 1;
                        $obj->bill_of_lading_id = $id;
                        $obj->receipt_entry_id = $data['cargo_hbl_id'][$i];
                        $obj->cargo_loader_id = $data['cargo_loader_id'];
                        $obj->save();
                        ReceiptEntry::where('id', '=', $data['cargo_hbl_id'][$i])->update(['status' => "C", 'cargo_loader_id'=> $data['cargo_loader_id'], 'bill_of_lading_id' => $id]);
                        ReceiptEntryShippingReference::create(['receipt_entry_id'=> $data['cargo_hbl_id'][$i], 'reference_number' => $data['code'], 'shipment_number' => $data['shipment_code'], 'user_id' => Auth::user()->id, 'type' => 'EO', 'reference_id' => $id]);

                    $a++;
                }
                $i++;
            }
        }
    }

    public function bill_of_lading()
    {
        return $this->belongsTo('Sass\EoBillOfLading','bill_of_lading_id');
    }

    public function receipt_entry()
    {
        return $this->belongsTo('Sass\ReceiptEntry', 'receipt_entry_id');
    }

    public function receipt_entry_details()
    {
        return $this->hasMany('Sass\ReceiptEntryCargoDetail', 'receipt_entry_id');
    }
}
