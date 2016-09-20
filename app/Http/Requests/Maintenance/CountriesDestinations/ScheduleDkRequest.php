<?php

namespace Sass\Http\Requests\Maintenance\CountriesDestinations;

use Illuminate\Routing\Route;
use Sass\Http\Requests\Request;
use Sass\ScheduleDk;

class ScheduleDkRequest extends Request
{
    /**
     * @var ScheduleDk
     */
    private $schedule_dk;

    /**
     * ScheduleDkRequest constructor.
     * @param Route $route
     */
    public function __construct(Route $route)
    {
        $this->schedule_dk = ScheduleDk::find($route->getParameter('schedule_dks'));
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
                    'code' => 'required|min:4|max:5|unique:mst_schedule_dks',
                    'name' => 'required|unique:mst_schedule_dks',
                ];
            }
            case 'PUT':
            {
                return [
                    'code' => 'required|min:4|max:5|unique:mst_schedule_dks,code,'.$this->schedule_dk->id,
                    'name' => 'required|unique:mst_schedule_dks,name,'.$this->schedule_dk->id,
                ];
            }
            case 'PATCH':
        }
    }
}
