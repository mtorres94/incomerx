<?php

namespace Sass\Http\Requests\Warehouse\Receipts\Create;

use Sass\Http\Requests\Request;

class CreateReceiptEntryRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'date_in'                   => 'required|date',
            'division_id'               => 'required|exists:mst_divisions,id',
            'status'                    => 'required|in:O,C,V,H',
            'expire_date'               => 'required|date',
            'currency_id'               => 'required|exists:mst_currencies,id',
            'shipper_id'                => 'required|exists:mst_customers,id',
            'shipper_address'           => 'required',
            'shipper_city'              => 'required',
            'consignee_id'              => 'required|exists:mst_customers,id',
            'consignee_address'         => 'required',
            'consignee_city'            => 'required',
            'third_party_id'            => 'required|exists:mst_customers,id',
            'mode'                      => 'required|in:A,O,W,R,T',
            'warehouse_id'              => 'required|exists:mst_warehouse_facilities,id',
            'location_service_id'       => 'required|exists:mst_services,id',
        ];
    }
}
