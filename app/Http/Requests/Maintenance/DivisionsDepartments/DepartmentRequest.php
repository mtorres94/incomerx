<?php

namespace Sass\Http\Requests\Maintenance\DivisionsDepartments;

use Illuminate\Routing\Route;
use Sass\Department;
use Sass\Http\Requests\Request;

class DepartmentRequest extends Request
{
    /**
     * @var Department
     */
    private $department;

    /**
     * DepartmentRequest constructor.
     * @param Route $route
     */
    public function __construct(Route $route)
    {
        $this->department = Department::find($route->getParameter('departments'));
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
                    'name' => 'required|unique:mst_departments',
                    'code' => 'required|unique:mst_departments',
                ];
            }
            case 'PUT':
            {
                return [
                    'name' => 'required|unique:mst_departments,name,'.$this->department->id,
                    'code' => 'required|unique:mst_departments,code,'.$this->department->id,
                ];
            }
            case 'PATCH':
        }
    }
}
