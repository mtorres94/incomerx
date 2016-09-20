<?php

namespace Sass\Http\Requests\Maintenance\Customers;

use Illuminate\Routing\Route;
use Sass\BusinessType;
use Sass\Http\Requests\Request;

class BusinessTypeRequest extends Request
{
    /**
     * @var BusinessType
     */
    private $business_type;

    /**
     * BusinessTypeRequest constructor.
     * @param Route $route
     */
    public function __construct(Route $route)
    {
        $this->business_type = BusinessType::find($route->getParameter('business_types'));
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
                    'business_type' => 'required|unique:mst_business_types',
                    'name' => 'required|unique:mst_business_types',
                ];
            }
            case 'PUT':
            {
                return [
                    'business_type' => 'required|unique:mst_business_types,business_type,'.$this->business_type->id,
                    'name' => 'required|unique:mst_business_types,name,'.$this->business_type->id,
                ];
            }
            case 'PATCH':
        }
    }
}
