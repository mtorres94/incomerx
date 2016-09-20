<div class="row">
    <div class="col-md-5"> {!! Form::bsComplete(null, null, 'Schedule B Code', 'eei_info_scheduleb_id', 'eei_info_scheduleb_code', Request::get('term'), null, '') !!}</div>
    <div class="col-md-4">{!! Form::bsText(null, null, 'Description', 'eei_info_scheduleb_description', null, '') !!}</div>
</div>
<div class="row">
    <div class="col-md-5">{!! Form::bsComplete(null, null, 'HTS Number', 'eei_info_hts_id', 'eei_info_hts_name', Request::get('term'), null, '') !!}</div>
    <div class="col-md-4">{!! Form::bsText(null, null, 'Description', 'eei_info_hts_description', null, '') !!}</div>
</div>
<div class="row">
    <div class="col-md-5">{!! Form::bsText(null, null, 'Value$', 'eei_info_value', null, '') !!}</div>
    <div class="col-md-4">{!! Form::bsText(null, null, 'E.C.C.N.', 'eei_info_eccn', null, '') !!}</div>
</div>

<div class="row">
    <div class="col-md-9">{!! Form::bsComplete(null, null, 'Export Code', 'eei_info_export_id', 'eei_info_export_code', Request::get('term'), null, '') !!}</div>
</div>
<div class="row">
    <div class="col-md-9">{!! Form::bsComplete(null, null, 'License Type', 'eei_info_license_type_id', 'eei_info_license_type_code', Request::get('term'), null, '') !!}</div>
</div>
<div class="row">
    <div class="col-md-4">{!! Form::bsSelect(null, null, 'Origin', 'eei_info_origin', array('D' => 'D = DOMESTICS', 'F' => 'F = FOREIGN'), ' ') !!}</div>
</div>
