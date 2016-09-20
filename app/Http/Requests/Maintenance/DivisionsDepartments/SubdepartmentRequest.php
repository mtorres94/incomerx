<?php

namespace Sass\Http\Requests\Maintenance\DivisionsDepartments;

use Sass\Http\Requests\Request;
use Sass\Subdepartment;

class SubdepartmentRequest extends Request
{
    /**
     * @var Subdepartment
     */
    private $subdepartment;

    /**
     * SubdepartmentRequest constructor.
     * @param Route $route
     */
    public function __construct(Route $route)
    {
        $this->subdepartment = Subdepartment::find($route->getParameter('subdepartments'));
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
                    'name' => 'required|unique:mst_subdepartments',
                ];
            }
            case 'PUT':
            {
                return [
                    'name' => 'required|unique:mst_subdepartments,name,'.$this->subdepartment->id,
                ];
            }
            case 'PATCH':
        }
    }
}
