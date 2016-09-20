<?php

namespace Sass\Http\Requests\Maintenance\Customers;

use Sass\Customer;
use Sass\Http\Requests\Request;

class CustomerRequest extends Request
{
    /**
     * @var Customer
     */
    private $customer;

    /**
     * CustomerRequest constructor.
     * @param Route $route
     */
    public function __construct(Route $route)
    {
        $this->customer = Customer::find($route->getParameter('customers'));
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
                    'code' => 'required|unique:mst_customers',
                    'name' => 'required|unique:mst_customers',
                    'address' => 'required',
                    'since' => 'required|date'
                ];
            }
            case 'PUT':
            {
                return [
                    'code' => 'required|unique:mst_customers,code,'.$this->customer->id,
                    'name' => 'required|unique:mst_customers,name,'.$this->customer->id,
                    'address' => 'required',
                    'since' => 'required|date'
                ];
            }
            case 'PATCH':
        }
    }
}
