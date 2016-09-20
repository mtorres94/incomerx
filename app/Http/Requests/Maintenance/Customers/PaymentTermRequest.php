<?php

namespace Sass\Http\Requests\Maintenance\Customers;

use Illuminate\Routing\Route;
use Sass\Http\Requests\Request;
use Sass\PaymentTerm;

class PaymentTermRequest extends Request
{
    /**
     * @var PaymentTerm
     */
    private $payment_term;

    /**
     * PaymentTermRequest constructor.
     * @param Route $route
     */
    public function __construct(Route $route)
    {
        $this->payment_term = PaymentTerm::find($route->getParameter('payment_terms'));
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
                    'code' => 'required|unique:warehouse_facilities',
                    'name' => 'required',
                    'address' => 'required',
                    'city' => 'required',
                ];
            }
            case 'PUT':
            {
                return [
                    'abbreviation' => 'required|unique:mst_payment_terms,abbreviation,'.$this->payment_term->id,
                    'name' => 'required|unique:mst_payment_terms,name,'.$this->payment_term->id,
                    'net_days' => 'numeric',
                    'discount' => 'numeric',
                ];
            }
            case 'PATCH':
        }
    }
}
