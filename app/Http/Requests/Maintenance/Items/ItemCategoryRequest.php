<?php

namespace Sass\Http\Requests\Maintenance\Items;

use Illuminate\Routing\Route;
use Sass\Http\Requests\Request;
use Sass\ItemCategory;

class ItemCategoryRequest extends Request
{
    /**
     * @var ItemCategory
     */
    private $item_category;

    /**
     * ItemCategoryRequest constructor.
     * @param Route $route
     */
    public function __construct(Route $route)
    {
        $this->item_category = ItemCategory::find($route->getParameter('item_categories'));
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
                    'name' => 'required|unique:mst_item_categories',
                ];
            }
            case 'PUT':
            {
                return [
                    'name' => 'required|unique:mst_item_categories,name,'.$this->item_category->id,
                ];
            }
            case 'PATCH':
        }
    }
}
