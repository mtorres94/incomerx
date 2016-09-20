<?php

namespace Sass\Http\Requests\Maintenance\CountriesDestinations;

use Illuminate\Routing\Route;
use Sass\City;
use Sass\Http\Requests\Request;

class CityRequest extends Request
{
    /**
     * @var City
     */
    private $city;

    /**
     * CityRequest constructor.
     * @param Route $route
     */
    public function __construct(Route $route)
    {
        $this->city = City::find($route->getParameter('cities'));
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
                    'code' => 'required|max:3|unique:mst_cities',
                    'name' => 'required|unique:mst_cities',
                ];
            }
            case 'PUT':
            {
                return [
                    'code' => 'required|max:3|unique:mst_cities,code,'.$this->city->id,
                    'name' => 'required|unique:mst_cities,name,'.$this->city->id,
                ];
            }
            case 'PATCH':
        }
    }
}
