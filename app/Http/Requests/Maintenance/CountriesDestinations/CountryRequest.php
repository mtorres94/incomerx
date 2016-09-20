<?php

namespace Sass\Http\Requests\Maintenance\CountriesDestinations;

use Illuminate\Routing\Route;
use Sass\Country;
use Sass\Http\Requests\Request;

class CountryRequest extends Request
{
    /**
     * @var Country
     */
    private $country;

    /**
     * CountryRequest constructor.
     * @param Route $route
     */
    public function __construct(Route $route)
    {
        $this->country = Country::find($route->getParameter('countries'));
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
                    'abbreviation' => 'required|max:3|unique:mst_countries',
                    'name' => 'required|unique:mst_countries',
                ];
            }
            case 'PUT':
            {
                return [
                    'abbreviation' => 'required|max:3|unique:mst_countries,abbreviation,'.$this->country->id,
                    'name' => 'required|unique:mst_countries,name,'.$this->country->id,
                ];
            }
            case 'PATCH':
        }
    }
}
