<h4>Import</h4>
<div class="row">
    {!! Form::bsDate('col-md-3', 'col-md-4', 'Date', 'import_date', null, ' ') !!}
</div>
<div class="row">
    {!! Form::bsText('col-md-3', 'col-md-9', 'Master #', 'import_master_number', null, ' ') !!}
</div>
<div class="row">
    {!! Form::bsText('col-md-3', 'col-md-9', 'House #', 'import_house_number', null, ' ') !!}
</div>
<div class="row">
    {!! Form::bsText('col-md-3', 'col-md-9', 'Shipment #', 'import_shipment_number', null, ' ') !!}
</div>
<h4>Confirm</h4>
<div class="row">
    <div class="col-md-6">{!! Form::bsSelect('col-md-6', 'col-md-6', ' Status', 'confirm_status', array(
            'O' => 'OPEN',
            'P' => 'IN PROCESS',
            'C' => 'CLOSED',
            'V' => 'VOID',
        ), 'Status') !!}</div>
    <div class="col-md-6">    {!! Form::bsDate('col-md-6', 'col-md-6', 'Uplift', 'confirm_uplift', null, ' ') !!}
    </div>
</div>
<div class="row">
    {!! Form::bsText('col-md-3', 'col-md-9', 'Master #', 'confirm_master_number', null, ' ') !!}
</div>
<div class="row">
    {!! Form::bsText('col-md-3', 'col-md-9', 'House #', 'confirm_house_number', null, ' ') !!}
</div>
<div class="row">
    {!! Form::bsText('col-md-3', 'col-md-9', 'Shipment #', 'confirm_shipment_number', null, ' ') !!}
</div>
