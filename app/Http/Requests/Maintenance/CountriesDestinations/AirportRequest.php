<?php

namespace Sass\Http\Requests\Maintenance\CountriesDestinations;

use Illuminate\Routing\Route;
use Sass\Airport;
use Sass\Http\Requests\Request;

class AirportRequest extends Request
{
    /**
     * @var Airport
     */
    private $airport;

    /**
     * AirportRequest constructor.
     * @param Route $route
     */
    public function __construct(Route $route)
    {
        $this->airport = Airport::find($route->getParameter('airports'));
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
                    'code' => 'required|min:3|max:5|unique:mst_airports',
                    'name' => 'required|unique:mst_airports',
                    'type' => 'in:0,1,2',
                ];
            }
            case 'PUT':
            {
                return [
                    'code' => 'required|min:3|max:5|unique:mst_airports,code,'.$this-$this->airport->id,
                    'name' => 'required|unique:mst_airports,name,'.$this->airport->id,
                    'type' => 'in:0,1,2',
                ];
            }
            case 'PATCH':
        }
    }
}
