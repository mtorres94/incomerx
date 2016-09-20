<?php

namespace Sass\Http\Requests\Maintenance\DivisionsDepartments;

use Illuminate\Routing\Route;
use Sass\Division;
use Sass\Http\Requests\Request;

class DivisionRequest extends Request
{
    /**
     * @var Division
     */
    private $division;

    /**
     * DivisionRequest constructor.
     * @param Route $route
     */
    public function __construct(Route $route)
    {
        $this->division = Division::find($route->getParameter('divisions'));
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
                    'code' => 'required|unique:mst_divisions',
                    'name' => 'required|unique:mst_divisions',
                    'log_counter' => 'numeric',
                ];
            }
            case 'PUT':
            {
                return [
                    'code' => 'required|unique:mst_divisions,code,'.$this->division->id,
                    'name' => 'required|unique:mst_divisions,name,'.$this->division->id,
                    'log_counter' => 'numeric',
                ];
            }
            case 'PATCH':
        }
    }
}
