<div class="row">
    <div class="col-md-9">{!! Form::bsText(null, null, 'Proper Shipping Name', 'hazardous_proper_shipping_name', null, '') !!}</div>
</div>
<div class="row">
    <div class="col-md-4">{!! Form::bsComplete(null, null, 'Un#', 'hazardous_un_id', 'hazardous_un_code', Request::get('term'), null, 'Uns#') !!}</div>
    <div class="col-md-5">{!! Form::bsText(null, null, '', 'hazardous_un_description', null, '') !!}</div>
</div>
<div class="row">
    <div class="col-md-3">{!! Form::bsText(null, null, 'Class#', 'hazardous_class_id', null, '') !!}</div>
    <div class="col-md-6">{!! Form::bsText(null, null, '', 'hazardous_class_description', null, '') !!}</div>
</div>
<div class="row">
    <div class="col-md-4">{!! Form::bsSelect(null, null, 'Packing Group', 'hazardous_packing_group', array('1' => 'Group 1 (High Danger)', '2' => 'Group 2 (Med Danger)','3' => 'Group 3 (Low Danger)' ), ' ') !!}</div>
    <div class="col-md-2">{!! Form::bsText(null, null, 'Flash Point', 'hazardous_flash_point', null, '0.00') !!}</div>
    <div class="col-md-3">{!! Form::bsSelect(null, null, '', 'hazardous_flashing_point_type', array('C' => 'CELSIUS', 'F' => 'FAHRENHEIT' ), '') !!}</div>
</div>
<div class="row">
    <div class="col-md-9">{!! Form::bsText(null, null, 'Special Instructions', 'hazardous_special_instructions', null, '') !!}</div>
</div>
<div class="row">
    <div class="col-md-3">{!! Form::bsText(null, null, 'Units', 'hazardous_units', null, '') !!}</div>
    <div class="col-md-6">{!! Form::bsText(null, null, 'Material Page', 'hazardous_material_page', null, '') !!}</div>
</div>
<div class="row">
    <div class="col-md-3">{!! Form::bsText(null, null, 'Quantity', 'hazardous_quantity', null, '') !!}</div>
    <div class="col-md-6">{!! Form::bsText(null, null, 'Labels Required', 'hazardous_label_required', null, '') !!}</div>
</div>
<div class="row">
    <div class="col-md-3">{!! Form::bsText(null, null, 'Emergency Contact', 'hazardous_emergency_contact', null, '') !!}</div>
    <div class="col-md-6">{!! Form::bsText(null, null, 'Phone', 'hazardous_emergency_contact_phone', null, '') !!}</div>
</div>

