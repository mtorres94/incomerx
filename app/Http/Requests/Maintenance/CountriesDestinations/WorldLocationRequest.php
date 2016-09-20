<?php

namespace Sass\Http\Requests\Maintenance\CountriesDestinations;

use Illuminate\Routing\Route;
use Sass\Http\Requests\Request;
use Sass\WorldLocation;

class WorldLocationRequest extends Request
{
    /**
     * @var WorldLocation
     */
    private $world_location;

    /**
     * WorldLocationRequest constructor.
     * @param Route $route
     */
    public function __construct(Route $route)
    {
        $this->world_location = WorldLocation::find($route->getParameter('world_locations'));
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
                    'code' => 'required|min:3|max:5|unique:mst_world_locations',
                    'name' => 'required|unique:mst_world_locations',
                ];
            }
            case 'PUT':
            {
                return [
                    'code' => 'required|min:3|max:5|unique:mst_world_locations,code,'.$this->world_location->id,
                    'name' => 'required|unique:mst_world_locations,name,'.$this->world_location->id,
                ];
            }
            case 'PATCH':
        }
    }
}
