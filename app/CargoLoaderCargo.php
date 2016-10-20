<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class CargoLoaderCargo extends Model
{
    protected $table = 'exp_cargo_loader_cargo';

    protected $fillable = [
        'cargo_loader_id', 'line','created_at', 'updated_at', 'container_id', 'warehouse_line', 'warehouse_number', 'date_in', 'shipper_id', 'shipper_city', 'shipper_state_id', 'shipper_zip_code_id', 'shipper_phone', 'shipper_fax', 'consignee_id', 'consignee_city', 'consignee_state', 'consignee_zip_code_id','consignee_phone', 'consignee_fax', 'box_number', 'destination_name', 'ship_inst_number', 'status'];

    public function shipper_zip_code()
    {
        return $this->belongsTo('Sass\ZipCode','shipper_zip_code_id');
    }

    public function consignee_zip_code()
    {
        return $this->belongsTo('Sass\ZipCode','consignee_zip_code_id');
    }

    public function shipper_state()
    {
        return $this->belongsTo('Sass\State','shipper_state_id');
    }

    public function consignee_state()
    {
        return $this->belongsTo('Sass\State','consignee_state_id');
    }

    public function shipper()
    {
        return $this->belongsTo('Sass\Customer', 'shipper_id');
    }

    public function consignee()
    {
        return $this->belongsTo('Sass\Customer', 'consignee_id');
    }

    public static function saveDetail($id, $data)
    {
        $i = -1;
        $a = 0;
        if (isset($data['hidden_warehouse_line'])) {
            $details = DB::table('exp_cargo_loader_cargo')->where('cargo_loader_id', '=', $id)->delete();
            while ($a < count($data['hidden_warehouse_line'])) {
                $i++;
                if (isset($data['hidden_warehouse_line'][$i])) {
                    $obj = new CargoLoaderCargo();
                    $obj->cargo_loader_id = $id;
                    $obj->line = $a + 1;
                    $obj->container_id                      = (isset($data['hidden_container_id'][$i])?$data['hidden_container_id'][$i] : '1');
                    $obj->warehouse_line                      = $data['hidden_warehouse_line'][$i];
                    $obj->warehouse_number                      = $data['hidden_warehouse_number'][$i];
                    $obj->date_in                      = $data['hidden_date_in'][$i];
                    $obj->shipper_id                      = $data['hidden_shipper_id'][$i];
                    $obj->shipper_city                      = $data['hidden_shipper_city'][$i];
                    $obj->shipper_state_id                      = $data['hidden_shipper_state_id'][$i];
                    $obj->shipper_zip_code_id                      = $data['hidden_shipper_zip_code_id'][$i];
                    $obj->shipper_phone                      = $data['hidden_shipper_phone'][$i];
                    $obj->shipper_fax                      = $data['hidden_shipper_fax'][$i];
                    $obj->consignee_id                      = $data['hidden_consignee_id'][$i];
                    $obj->consignee_city                      = $data['hidden_consignee_city'][$i];
                    $obj->consignee_state_id                     = $data['hidden_consignee_state_id'][$i];
                    $obj->consignee_zip_code_id                      = $data['hidden_consignee_zip_code_id'][$i];
                    $obj->consignee_phone                      = $data['hidden_consignee_phone'][$i];
                    $obj->consignee_fax                      = $data['hidden_consignee_fax'][$i];
                    $obj->box_number                      = $data['hidden_box_number'][$i];
                    $obj->destination_name                      = (isset($data['hidden_destination_name'][$i])?$data['hidden_destination_name'][$i] : '1');
                    $obj->ship_inst_number                      = $data['hidden_ship_inst_number'][$i];
                    $obj->status                      = $data['hidden_status'][$i];
                    $obj->save();
                    $a++;

                }
            }
        }
    }

    public static function Search($id){
        return self::where('cargo_loader_id', $id)->get();
    }

}
