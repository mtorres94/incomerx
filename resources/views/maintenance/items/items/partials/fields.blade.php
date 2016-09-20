{!! Form::bsText('col-md-4', 'col-md-6', 'Code', 'code', null, 'Enter the code for the item') !!}
{!! Form::bsText('col-md-4', 'col-md-6', 'Description', 'name', null, 'Enter the description for the item') !!}
{!! Form::bsText('col-md-4', 'col-md-6', 'Package', 'package', null, 'Enter the package for the item') !!}
{!! Form::bsMemo('col-md-4', 'col-md-6', 'Additional description', 'additional_description', null, 2, 'Enter some additional description for this item') !!}
{!! Form::bsSelect('col-md-4', 'col-md-6', 'Customer', 'customer_id', Sass\Customer::all()->lists('name', 'id'), 'Choose one of the following customers...') !!}
{!! Form::bsText('col-md-4', 'col-md-4', 'Net Value', 'net_value', null, 'Enter the net value for the item') !!}
{!! Form::bsText('col-md-4', 'col-md-4', 'Gross Value', 'gross_value', null, 'Enter the gross value for the item') !!}
{!! Form::bsSelect('col-md-4', 'col-md-6', 'Category', 'category_id', Sass\ItemCategory::all()->lists('name', 'id'), 'Choose one of the following categories...') !!}
{!! Form::bsSelect('col-md-4', 'col-md-6', 'Subcategory', 'subcategory_id', Sass\ItemSubcategory::all()->lists('name', 'id'), 'Choose one of the following subcategories...') !!}
{!! Form::bsText('col-md-4', 'col-md-4', 'Vendor SKU number', 'vendor_sku_number', null, 'Enter the vendor SKU number for the item') !!}