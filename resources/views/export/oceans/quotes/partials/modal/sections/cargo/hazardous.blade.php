<div class="row">
    <div class="col-md-12">
        {!! Form::bsText('col-md-3', 'col-md-9', 'Proper Shipping Name', 'box_proper_shipping_name', null, '') !!}
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        {!! Form::bsComplete('col-md-3', 'col-md-3', 'Un#', 'box_uns_id', 'box_uns_code', Request::get('term'), null, 'Uns#') !!}
        {!! Form::bsText(null, 'col-md-6', '', 'box_uns_description', null, '') !!}
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        {!! Form::bsText('col-md-3', 'col-md-3', 'Class#', 'box_class_id', null, '') !!}
        {!! Form::bsText(null, 'col-md-6', '', 'box_class_description', null, '') !!}</div>
</div>

<div class="row">
    <div class="col-md-12">{!! Form::bsText('col-md-3', 'col-md-9', 'Material Page', 'box_material_page', null, '') !!}</div>
</div>
<div class="row">
    <div class="col-md-12">{!! Form::bsText('col-md-3', 'col-md-9', 'Special Instructions', 'box_special_instructions', null, '') !!}</div>
</div>

<div class="row">
    <div class="col-md-12">{!! Form::bsText('col-md-3', 'col-md-9', 'Hazardous Levels', 'box_hazardous_level', null, '') !!}</div>
</div>
<div class="row">
    <div class="col-md-12">
        {!! Form::bsText('col-md-3', 'col-md-3', 'Emergency Contact', 'box_emergency_contact', null, '') !!}
        {!! Form::bsText('col-md-3', 'col-md-3', 'Phone', 'box_emergency_contact_phone', null, '') !!}</div>
</div>

