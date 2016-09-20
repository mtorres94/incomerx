<?php

namespace Sass\Http\Requests\Maintenance\Items;

use Illuminate\Routing\Route;
use Sass\Http\Requests\Request;
use Sass\Item;

class ItemRequest extends Request
{
    /**
     * @var Item
     */
    private $item;

    /**
     * ItemRequest constructor.
     * @param Route $route
     */
    public function __construct(Route $route)
    {
        $this->item = Item::find($route->getParameter('items'));
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
                    'code' => 'required|unique:items',
                    'name' => 'required|unique:items',
                    'package' => 'numeric',
                    'net_value' => 'numeric',
                    'gross_value' => 'numeric',
                ];
            }
            case 'PUT':
            {
                return [
                    'code' => 'required|unique:items,code,'.$this->item->id,
                    'name' => 'required|unique:items,name,'.$this->item->id,
                    'package' => 'numeric',
                    'net_value' => 'numeric',
                    'gross_value' => 'numeric',
                ];
            }
            case 'PATCH':
        }
    }
}
