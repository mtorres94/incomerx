<fieldset>
    <legend>Ocean - Shipment Entry</legend>
    <div class="row pull-right">

    </div>
    <div class="row row-padding">
        <div class="col-md-4">{!! Form::bsSelect('col-md-5','col-md-7', ' Shipment Type', 'shipment_type', array(
            'O' => 'Consolidation',
            'D' => 'Direct',
        ), 'Type') !!}</div>
        <div class="col-md-2">{!! Form::bsDate('col-md-4','col-md-8','Date', 'date_today', null, '') !!}</div>
        <div class="col-md-4">{!! Form::bsComplete('col-md-4','col-md-8','Division ', 'division_id', 'division_name', Request::get('term'),
    ((isset($shipment_entry) and $shipment_entry->division_id > 0) ? $shipment_entry->division->name : null), 'Divisions...', 'options.maintenance.divisions.divisions', 'options.maintenance.divisions.divisions', 'maintenance.divisions_departments.divisions.index') !!}</div>
        <div class="col-md-2">{!! Form::bsText('col-md-4','col-md-8', 'User', 'user_id', ((isset($shipment_entry) and $shipment_entry->user_create_id > 0) ? $shipment_entry->user_create->username :  Auth::user()->username), '') !!}</div>



    </div>
    <div class="row">
        <div class="col-md-3">{!! Form::bsText('col-md-5','col-md-7','Shipment #', 'code',null, '') !!}</div>

        <div class="col-md-3">{!! Form::bsText('col-md-5','col-md-7','Customs #', 'customs_number',null, '') !!}</div>
        <div class="col-md-3">{!! Form::bsSelect('col-md-5','col-md-7', ' Status', 'shipment_status', array(
            'O' => 'OPEN',
            'P' => 'POSTED',
            'C' => 'CLOSED',
            'V' => 'VOID',
        ), 'Status') !!}</div>
    </div>
</fieldset>