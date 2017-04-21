<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class AccInvoiceContainer extends Model
{
    protected $table = 'acc_invoice_container_details';

    protected $fillable = [
        'invoice_id', 'line', 'equipment_type_id', 'seal_number', 'container_number'];
    public $timestamps = false;

    public static function saveDetail($id, $data)
    {
        $i = 0;
        $a = 0;
        if (isset($data['container_line'])) {
            DB::table('acc_invoice_container_details')->where('invoice_id', '=', $id)->delete();
            while ($a < count($data['container_line'])) {
                if (isset($data['container_line'][$i])) {
                    $obj = new AccInvoiceContainer();

                    $obj->invoice_id = $id;
                    $obj->line = $a + 1;
                    $obj->equipment_type_id= $data['equipment_type_id'][$i];
                    $obj->container_number= $data['container_number'][$i];
                    $obj->seal_number= $data['container_seal_number'][$i];
                    $a++;
                    $obj->save();
                }
                $i++;
            }

        }
    }
    public function equipment_type()
    {
        return $this->belongsTo('Sass\CargoType', 'equipment_type_id');
    }
}
