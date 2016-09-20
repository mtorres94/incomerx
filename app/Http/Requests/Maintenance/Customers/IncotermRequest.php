<?php

namespace Sass\Http\Requests\Maintenance\Customers;

use Illuminate\Routing\Route;
use Sass\Http\Requests\Request;
use Sass\Incoterm;

class IncotermRequest extends Request
{
    /**
     * @var Incoterm
     */
    private $incoterm;

    /**
     * IncotermRequest constructor.
     * @param Route $route
     */
    public function __construct(Route $route)
    {
        $this->incoterm = Incoterm::find($route->getParameter('incoterms'));
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
                    'code' => 'required|unique:mst_incoterms',
                    'name' => 'required|unique:mst_incoterms',
                ];
            }
            case 'PUT':
            {
                return [
                    'code' => 'required|unique:mst_incoterms,code,'.$this->incoterm->id,
                    'name' => 'required|unique:mst_incoterms,name,'.$this->incoterm->id,
                ];
            }
            case 'PATCH':
        }
    }
}
