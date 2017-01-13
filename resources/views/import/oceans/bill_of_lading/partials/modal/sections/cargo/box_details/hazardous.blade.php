<div class="row">
    <div class="col-md-9">{!! Form::bsText(null, null, 'Proper Shipping Name', 'box_proper_shipping_name', null, '') !!}</div>
</div>
<div class="row">
    <div class="col-md-4">{!! Form::bsComplete('col-md-3', 'col-md-9', 'Un#', 'box_uns_id', 'box_uns_code', Request::get('term'), null, 'Uns#') !!}</div>
    <div class="col-md-5">{!! Form::bsText(null, 'col-md-9', '', 'box_uns_description', null, '') !!}</div>
</div>
<div class="row">
    <div class="col-md-4">{!! Form::bsText('col-md-3', 'col-md-9', 'Class#', 'box_class_id', null, '') !!}</div>
    <div class="col-md-5">{!! Form::bsText(null, 'col-md-9', '', 'box_class_description', null, '') !!}</div>
</div>
<div class="row">
    <div class="col-md-4">{!! Form::bsSelect(null, null, 'Packing Group', 'box_packing_group', array('1' => 'Group 1 (High Danger)', '2' => 'Group 2 (Med Danger)','3' => 'Group 3 (Low Danger)' ), ' ') !!}</div>
    <div class="col-md-2">{!! Form::bsText(null, null, 'Flash Point', 'box_flash_point', null, '0.00') !!}</div>
    <div class="col-md-3">{!! Form::bsSelect(null, null, '', 'box_flashing_point_type', array('C' => 'CELSIUS', 'F' => 'FAHRENHEIT' ), '') !!}</div>
</div>
<div class="row">
    <div class="col-md-9">{!! Form::bsText(null, null, 'Special Instructions', 'box_special_instructions', null, '') !!}</div>
</div>
<div class="row">
    <div class="col-md-3">{!! Form::bsText(null, null, 'Units', 'box_units', null, '') !!}</div>
    <div class="col-md-6">{!! Form::bsText(null, null, 'Material Page', 'box_material_page', null, '') !!}</div>
</div>
<div class="row">
    <div class="col-md-3">{!! Form::bsText(null, null, 'Quantity', 'box_hazardous_quantity', null, '') !!}</div>
    <div class="col-md-6">{!! Form::bsText(null, null, 'Labels Required', 'box_label_required', null, '') !!}</div>
</div>
<div class="row">
    <div class="col-md-3">{!! Form::bsText(null, null, 'Emergency Contact', 'box_emergency_contact', null, '') !!}</div>
    <div class="col-md-6">{!! Form::bsText(null, null, 'Phone', 'box_emergency_contact_phone', null, '') !!}</div>
</div>

