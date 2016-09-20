<?php

namespace Sass\Http\Requests\Maintenance\VendorsSuppliers;

use Illuminate\Routing\Route;
use Sass\Http\Requests\Request;
use Sass\Vendor;

class VendorRequest extends Request
{
    /**
     * @var Vendor
     */
    private $vendor;

    /**
     * VendorRequest constructor.
     * @param Route $route
     */
    public function __construct(Route $route)
    {
        $this->vendor = Vendor::find($route->getParameter('vendors'));
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
                    'code' => 'required|unique:mst_vendors',
                    'name' => 'required|unique:mst_vendors',
                    'address' => 'required',
                    'since' => 'required|date',
                ];
            }
            case 'PUT':
            {
                return [
                    'code' => 'required|unique:mst_vendors,code,'.$this->vendor->id,
                    'name' => 'required|unique:mst_vendors,name,'.$this->vendor->id,
                    'address' => 'required',
                    'since' => 'required|date',
                ];
            }
            case 'PATCH':
        }
    }
}
