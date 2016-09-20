<?php

namespace Sass\Http\Requests\Maintenance\Customers;

use Illuminate\Routing\Route;
use Sass\Http\Requests\Request;
use Sass\IdentificationType;

class IdentificationTypeRequest extends Request
{
    /**
     * @var IdentificationType
     */
    private $identification_type;

    /**
     * IdentificationTypeRequest constructor.
     * @param Route $route
     */
    public function __construct(Route $route)
    {
        $this->identification_type = IdentificationType::find($route->getParameter('identification_types'));
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
                    'abbreviation' => 'required|unique:mst_identification_types',
                    'name' => 'required|unique:mst_identification_types',
                ];
            }
            case 'PUT':
            {
                return [
                    'abbreviation' => 'required|unique:mst_identification_types,abbreviation,'.$this->identification_type->id,
                    'name' => 'required|unique:mst_identification_types,name,'.$this->identification_type->id,
                ];
            }
            case 'PATCH':
        }
    }
}
