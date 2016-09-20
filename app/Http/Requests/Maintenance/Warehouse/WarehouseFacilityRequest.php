<?php

namespace Sass\Http\Requests\Maintenance\Warehouse;

use Illuminate\Routing\Route;
use Sass\Http\Requests\Request;
use Sass\WarehouseFacility;

class WarehouseFacilityRequest extends Request
{
    /**
     * @var WarehouseFacility
     */
    private $warehouse_facility;

    /**
     * WarehouseFacilityRequest constructor.
     * @param Route $route
     */
    public function __construct(Route $route)
    {
        $this->warehouse_facility = WarehouseFacility::find($route->getParameter('warehouse_facilities'));
    }

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
        switch ($this->method())
        {
            case 'GET':
            case 'DELETE': { return []; }
            case 'POST':
            {
                return [
                    'code' => 'required|unique:mst_warehouse_facilities',
                    'name' => 'required',
                    'address' => 'required',
                    'city' => 'required',
                ];
            }
            case 'PUT':
            {
                return [
                    'code' => 'required|unique:mst_warehouse_facilities,code,'.$this->warehouse_facility->id,
                    'name' => 'required',
                    'address' => 'required',
                    'city' => 'required',
                ];
            }
            case 'PATCH':
        }
    }
}
