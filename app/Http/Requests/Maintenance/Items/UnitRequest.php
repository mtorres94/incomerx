<?php

namespace Sass\Http\Requests\Maintenance\Items;

use Illuminate\Routing\Route;
use Sass\Http\Requests\Request;
use Sass\Unit;

class UnitRequest extends Request
{
    /**
     * @var Unit
     */
    private $unit;

    /**
     * UnitRequest constructor.
     * @param Route $route
     */
    public function __construct(Route $route)
    {
        $this->unit = Unit::find($route->getParameter('units'));
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
                    'abbreviation' => 'required|unique:mst_units',
                    'name' => 'required|unique:mst_units',
                ];
            }
            case 'PUT':
            {
                return [
                    'abbreviation' => 'required|unique:mst_units,abbreviation,'.$this->unit->id,
                    'name' => 'required|unique:mst_units,name,'.$this->unit->id,
                ];
            }
            case 'PATCH':
        }
    }
}
