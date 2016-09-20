<?php

namespace Sass\Http\Requests\Maintenance\Customers;

use Sass\CustomerType;
use Sass\Http\Requests\Request;

class CustomerTypeRequest extends Request
{
    /**
     * @var CustomerType
     */
    private $customer_type;

    /**
     * CustomerTypeRequest constructor.
     * @param Route $route
     */
    public function __construct(Route $route)
    {
        $this->customer_type = CustomerType::find($route->getParameter('customer_types'));
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
                    'name' => 'required|unique:mst_customer_types',
                ];
            }
            case 'PUT':
            {
                return [
                    'name' => 'required|unique:mst_customer_types,name,'.$this->customer_type->id,
                ];
            }
            case 'PATCH':
        }
    }
}
