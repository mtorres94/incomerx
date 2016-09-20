<?php

namespace Sass\Http\Requests\Maintenance\Customers;

use Illuminate\Routing\Route;
use Sass\ContactType;
use Sass\Http\Requests\Request;

class ContactTypeRequest extends Request
{
    /**
     * @var ContactType
     */
    private $contact_type;

    /**
     * ContactTypeRequest constructor.
     * @param Route $route
     */
    public function __construct(Route $route)
    {
        $this->contact_type = ContactType::find($route->getParameter('contact_types'));
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
                    'name' => 'required|unique:mst_contact_types',
                ];
            }
            case 'PUT':
            {
                return [
                    'name' => 'required|unique:mst_contact_types,name,'.$this->contact_type->id,
                ];
            }
            case 'PATCH':
        }
    }
}
