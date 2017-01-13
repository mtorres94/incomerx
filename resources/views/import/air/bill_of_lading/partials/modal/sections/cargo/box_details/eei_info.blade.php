<div class="row">
    <div class="col-md-5"> {!! Form::bsComplete(null, null, 'Schedule B Code', 'box_scheduleb_id', 'box_scheduleb_code', Request::get('term'), null, '') !!}</div>
    <div class="col-md-4">{!! Form::bsText(null, null, 'Description', 'box_scheduleb_description', null, '') !!}</div>
</div>
<div class="row">
    <div class="col-md-5">{!! Form::bsComplete(null, null, 'HTS Number', 'box_hts_id', 'box_hts_code', Request::get('term'), null, '') !!}</div>
    <div class="col-md-4">{!! Form::bsText(null, null, 'Description', 'box_hts_description', null, '') !!}</div>
</div>
<div class="row">
    <div class="col-md-5">
        <div class="row">
            <div class="col-md-6">{!! Form::bsText(null, null, 'Value', 'box_value', null, '') !!}</div>
            <div class="col-md-6">{!! Form::bsText(null, null, 'E.C.C.N.', 'box_eccn', null, '') !!}</div>
        </div>
        <div class="row">
            <div class="col-md-12">{!! Form::bsComplete(null, null, 'Export Code', 'box_export_id', 'box_export_code', Request::get('term'), null, '') !!}</div>
        </div>
        <div class="row">
            <div class="col-md-12">{!! Form::bsComplete(null, null, 'License Type', 'box_license_type_id', 'box_license_type_code', Request::get('term'), null, '') !!}</div>
        </div>
        <div class="row">
            <div class="col-md-4">{!! Form::bsSelect(null, null, 'Origin', 'box_origin', array('D' => 'D = DOMESTICS', 'F' => 'F = FOREIGN'), ' ') !!}</div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="row">
            <div class="col-md-12">{!! Form::bsMemo(null, null, 'NCM Codes', 'box_ncm_code', null, 7,'') !!}</div>
        </div>
    </div>
</div>


