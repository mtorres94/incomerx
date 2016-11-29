<div class="row">
    <div class="col-md-12">
        {!! Form::bsComplete('col-md-2', 'col-md-3', 'Schedule B Code', 'box_scheduleb_id', 'box_scheduleb_code', Request::get('term'), null, '') !!}
        {!! Form::bsText('col-md-2', 'col-md-5', 'Description', 'box_scheduleb_description', null, '') !!}
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        {!! Form::bsComplete('col-md-2', 'col-md-3', 'HTS Number', 'box_hts_id', 'box_hts_code', Request::get('term'), null, '') !!}
        {!! Form::bsText('col-md-2', 'col-md-5', 'Description', 'box_hts_description', null, '') !!}
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        {!! Form::bsText('col-md-2', 'col-md-4', 'Value', 'box_value', null, '') !!}
        {!! Form::bsText('col-md-2', 'col-md-4', 'E.C.C.N.', 'box_eccn', null, '') !!}
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        {!! Form::bsComplete('col-md-2', 'col-md-6', 'Export Code', 'box_export_id', 'box_export_code', Request::get('term'), null, '') !!}
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        {!! Form::bsComplete('col-md-2', 'col-md-6', 'License Type', 'box_license_type_id', 'box_license_type_code', Request::get('term'), null, '') !!}
    </div>
</div>
<div class="row">
    <div class="col-md-12">{!! Form::bsSelect('col-md-2', 'col-md-3', 'Origin', 'box_origin', array('D' => 'D = DOMESTICS', 'F' => 'F = FOREIGN'), ' ') !!}</div>
</div>





