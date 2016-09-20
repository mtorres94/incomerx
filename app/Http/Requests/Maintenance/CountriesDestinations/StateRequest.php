<?php

namespace Sass\Http\Requests\Maintenance\CountriesDestinations;

use Illuminate\Routing\Route;
use Sass\Http\Requests\Request;
use Sass\State;

class StateRequest extends Request
{
    /**
     * @var State
     */
    private $state;

    /**
     * StateRequest constructor.
     * @param Route $route
     */
    public function __construct(Route $route)
    {
        $this->state = State::find($route->getParameter('states'));
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
                    'code' => 'required|min:2|max:3|unique:states',
                    'name' => 'required|unique:states',
                    'tax'  => 'numeric',
                    'additional_tax' => 'numeric',
                ];
            }
            case 'PUT':
            {
                return [
                    'code' => 'required|min:2|max:3|unique:states,code,'.$this->state->id,
                    'name' => 'required|unique:states,name,'.$this->state->id,
                    'tax'  => 'numeric',
                    'additional_tax' => 'numeric',
                ];
            }
            case 'PATCH':
        }
    }
}
