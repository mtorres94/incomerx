<?php

namespace Sass\Http\Requests\Maintenance\VendorsSuppliers;

use Illuminate\Routing\Route;
use Sass\Http\Requests\Request;
use Sass\Supplier;

class SupplierRequest extends Request
{
    /**
     * @var Supplier
     */
    private $supplier;

    /**
     * SupplierRequest constructor.
     * @param Route $route
     */
    public function __construct(Route $route)
    {
        $this->supplier = Supplier::find($route->getParameter('suppliers'));
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
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
                    'code' => 'required|unique:mst_suppliers',
                    'name' => 'required|unique:mst_suppliers',
                    'address' => 'required',
                ];
            }
            case 'PUT':
            {
                return [
                    'code' => 'required|unique:mst_suppliers,code,'.$this->supplier->id,
                    'name' => 'required|unique:mst_suppliers,name,'.$this->supplier->id,
                    'address' => 'required',
                ];
            }
            case 'PATCH':
        }
    }
}
