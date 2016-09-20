<?php

namespace Sass\Http\Requests\Maintenance\Items;

use Illuminate\Routing\Route;
use Sass\Commodity;
use Sass\Http\Requests\Request;

class CommodityRequest extends Request
{
    /**
     * @var Commodity
     */
    private $commodity;

    /**
     * CommodityRequest constructor.
     * @param Route $route
     */
    public function __construct(Route $route)
    {
        $this->commodity = Commodity::find($route->getParameter('commodities'));
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
                    'name' => 'required|unique:mst_commodities',
                ];
            }
            case 'PUT':
            {
                return [
                    'name' => 'required|unique:mst_commodities,name,'.$this->commodity->id,
                ];
            }
            case 'PATCH':
        }
    }
}
