<div class="row">
    <div class="col-md-5"> {!! Form::bsComplete(null, null, 'Schedule B Code', 'vehicle_scheduleb_id', 'vehicle_scheduleb_code', Request::get('term'), null, '') !!}</div>
    <div class="col-md-4">{!! Form::bsText(null, null, 'Description', 'vehicle_scheduleb_description', null, '') !!}</div>
</div>
<div class="row">
    <div class="col-md-5">{!! Form::bsComplete(null, null, 'HTS Number', 'vehicle_hts_id', 'vehicle_hts_code', Request::get('term'), null, '') !!}</div>
    <div class="col-md-4">{!! Form::bsText(null, null, 'Description', 'vehicle_hts_description', null, '') !!}</div>
</div>
<div class="row">
    <div class="col-md-5">
        <div class="row">
            <div class="col-md-6">{!! Form::bsText(null, null, 'Value', 'vehicle_value', null, '') !!}</div>
            <div class="col-md-6">{!! Form::bsText(null, null, 'E.C.C.N.', 'vehicle_eccn', null, '') !!}</div>
        </div>
        <div class="row">
            <div class="col-md-12">{!! Form::bsComplete(null, null, 'Export Code', 'vehicle_export_id', 'vehicle_export_code', Request::get('term'), null, '') !!}</div>
        </div>
        <div class="row">
            <div class="col-md-12">{!! Form::bsComplete(null, null, 'License Type', 'vehicle_license_type_id', 'vehicle_license_type_code', Request::get('term'), null, '') !!}</div>
        </div>
        <div class="row">
            <div class="col-md-6">{!! Form::bsSelect(null, null, 'Origin', 'vehicle_origin', array('D' => 'D = DOMESTICS', 'F' => 'F = FOREIGN'), ' ') !!}</div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="row">
            <div class="col-md-12">{!! Form::bsMemo(null, null, 'NCM Codes', 'vehicle_ncm_code', null, 7,'') !!}</div>
        </div>
    </div>
</div>


