<?php

namespace Sass\Http\Requests\Maintenance\Items;

use Illuminate\Routing\Route;
use Sass\Http\Requests\Request;
use Sass\ItemSubcategory;

class ItemSubcategoryRequest extends Request
{
    /**
     * @var ItemSubcategory
     */
    private $item_subcategory;

    /**
     * ItemSubcategoryRequest constructor.
     * @param Route $route
     */
    public function __construct(Route $route)
    {
        $this->item_subcategory = ItemSubcategory::find($route->getParameter('item_subcategories'));
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
                    'name' => 'required|unique:mst_item_subcategories',
                ];
            }
            case 'PUT':
            {
                return [
                    'name' => 'required|unique:mst_item_subcategories,name,'.$this->item_subcategory->id,
                ];
            }
            case 'PATCH':
        }
    }
}
