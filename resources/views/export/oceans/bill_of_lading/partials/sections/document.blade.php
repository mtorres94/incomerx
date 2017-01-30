<div class="row">
    <div class="col-md-6">{!! Form::bsText('col-md-6', 'col-md-6', 'Document Number', 'document_number', null, '') !!}</div>
    <div class="col-md-6">{!! Form::bsText('col-md-6', 'col-md-6', 'BL Number', 'bl_number', null, '') !!}</div>
</div>

<div class="row">
    <div class="col-md-6">{!! Form::bsText('col-md-6', 'col-md-6', 'Point (state) of origin', 'point_of_origin', null, '') !!}</div>
    <div class="col-md-6">{!! Form::bsText('col-md-6', 'col-md-6', 'FMC Number', 'fmc_number', null, '') !!}</div>
</div>
<div class="row">
    <div class="col-md-6">{!! Form::bsText('col-md-6', 'col-md-6', 'IT Number', 'it_number', null, '') !!}</div>
    <div class="col-md-6">{!! Form::bsSelect('col-md-6', 'col-md-6', ' Incoterm', 'incoterm_type', Sass\Incoterm::all()->lists('code', 'id'), null) !!}</div>
</div>
<div class="row">
    <div class="col-md-6">{!! Form::bsText('col-md-6', 'col-md-6', 'Vessel', 'vessel_name', null, null) !!}</div>
    <div class="col-md-6">{!! Form::bsText('col-md-6', 'col-md-6', 'Voyage', 'voyage_name', null, null) !!}</div>
</div>
<div class="row">
    <div class="col-md-6">{!! Form::bsDate('col-md-6', 'col-md-6', 'Departure', 'departure_date', null, '') !!}</div>
    <div class="col-md-6">{!! Form::bsDate('col-md-6', 'col-md-6', 'Arrival', 'arrival_date', null, '') !!}</div>
</div>
<div class="row">
    <div class="col-md-12">{!! Form::bsMemo('col-md-3', 'col-md-9', 'Export References', 'export_reference', null,2, '') !!}</div>
</div>
<div class="row">
    <div class="col-md-4">{!! Form::bsCheck('Stand by', 'stand_by',(isset($bill_of_lading) ? $bill_of_lading->stand_by : 0) ) !!}</div>
    <div class="col-md-4"> {!! Form::bsCheck('Partial', 'partial', (isset($bill_of_lading) ? $bill_of_lading->partial : 0)) !!}</div>
    <div class="col-md-4"> {!! Form::bsCheck('Spot Rate', 'spot_rate', (isset($bill_of_lading) ? $bill_of_lading->spot_rate : 0)) !!}</div>
</div>
<div class="row">
    <div class="col-md-4">{!! Form::bsCheck('Confirmed', 'confirmed', (isset($bill_of_lading) ? $bill_of_lading->confirmed : 0)) !!}</div>
    <div class="col-md-4"> {!! Form::bsCheck('POD Information', 'POD_info', (isset($bill_of_lading) ? $bill_of_lading->POD_info : 0)) !!}</div>
</div>