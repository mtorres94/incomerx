<div class="row">
    <div class="col-md-6">{!! Form::bsText('col-md-6', 'col-md-6', 'Document#', 'document_number', null, '') !!}</div>
    <div class="col-md-6">{!! Form::bsText('col-md-6', 'col-md-6', 'BL Number', 'bl_number', null, '') !!}</div>
</div>

<div class="row">
    <div class="col-md-6">{!! Form::bsText('col-md-6', 'col-md-6', 'State of origin', 'point_of_origin', null, '') !!}</div>
    <div class="col-md-6">{!! Form::bsText('col-md-6', 'col-md-6', 'FMC Number', 'fmc_number', null, '') !!}</div>
</div>
<div class="row">
    <div class="col-md-6">{!! Form::bsText('col-md-6', 'col-md-6', 'IT Number', 'it_number', null, '') !!}</div>
    <div class="col-md-6">{!! Form::bsSelect('col-md-6', 'col-md-6', ' Incoterm', 'incoterm_type', Sass\Incoterm::all()->lists('code', 'id'), null) !!}</div>
</div>

<div class="row">
    <div class="col-md-12">{!! Form::bsMemo('col-md-3', 'col-md-9', 'Export References', 'export_reference', null,2, '') !!}</div>
</div>
<div class="row">
    <div class="col-md-4">{!! Form::bsCheck('col-md-1', 'col-md-5','Stand by', 'stand_by',(isset($bill_of_lading) ? $bill_of_lading->stand_by : 'off') ) !!}</div>
    <div class="col-md-4"> {!! Form::bsCheck('col-md-1', 'col-md-5','Partial', 'partial', (isset($bill_of_lading) ? $bill_of_lading->partial : 'off')) !!}</div>
    <div class="col-md-4"> {!! Form::bsCheck('col-md-1', 'col-md-5','Spot Rate', 'spot_rate', (isset($bill_of_lading) ? $bill_of_lading->spot_rate : 'off')) !!}</div>
</div>
<div class="row">
    <div class="col-md-4">{!! Form::bsCheck('col-md-1', 'col-md-5','Confirmed', 'confirmed', (isset($bill_of_lading) ? $bill_of_lading->confirmed : 'off')) !!}</div>
    <div class="col-md-4"> {!! Form::bsCheck('col-md-1', 'col-md-5', 'POD Information', 'POD_info', (isset($bill_of_lading) ? $bill_of_lading->POD_info : 'off')) !!}</div>
</div>