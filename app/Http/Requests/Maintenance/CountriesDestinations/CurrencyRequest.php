<?php

namespace Sass\Http\Requests\Maintenance\CountriesDestinations;

use Illuminate\Routing\Route;
use Sass\Currency;
use Sass\Http\Requests\Request;

class CurrencyRequest extends Request
{
    /**
     * @var Currency
     */
    private $currency;

    /**
     * CurrencyRequest constructor.
     * @param Route $route
     */
    public function __construct(Route $route)
    {
        $this->currency = Currency::find($route->getParameter('currencies'));
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
                    'code' => 'required|max:3|unique:mst_currencies',
                    'name' => 'required|unique:mst_currencies',
                ];
            }
            case 'PUT':
            {
                return [
                    'code' => 'required|max:3|unique:mst_currencies,code,'.$this->currency->id,
                    'name' => 'required|unique:mst_currencies,name,'.$this->currency->id,
                ];
            }
            case 'PATCH':
        }
    }
}
