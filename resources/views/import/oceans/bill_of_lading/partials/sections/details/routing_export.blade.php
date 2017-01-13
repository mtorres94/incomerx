<div class="row">
    <div class="col-md-6">
            <div class=row>{!! Form::bsSelect('col-md-4', 'col-md-6', ' Routing Mode', 'routing_mode', array('WR' => 'WR - WAREHOUSE','PD' => 'PD - PICK UP & DELIVERY','EA' => 'EA - EXPORT AIR','EO' => 'EO - EXPORT OCEAN','DO' => 'DO - DOMESTIC'), '') !!}</div>
        <div class="row">{!! Form::bsText('col-md-4', 'col-md-6', 'Routing', 'routing', null, ' ') !!}</div>
        <div class="row">{!! Form::bsMemo('col-md-4', 'col-md-6', 'Comments', 'routing_comments', null, 2, ' ') !!}</div>
    </div>
    <div class="col-md-6">
        <div class="row">{!! Form::bsDate('col-md-4', 'col-md-6', 'Date', 'routing_date', null, ' ') !!}</div>
        <div class="row">{!! Form::bsText('col-md-4', 'col-md-6', 'Master #', 'master_number', null, ' ') !!}</div>
        <div class="row">{!! Form::bsText('col-md-4', 'col-md-6', 'House #', 'house_number', null, ' ') !!}</div>
        <div class="row">{!! Form::bsText('col-md-4', 'col-md-6', 'Shipment #', 'routing_shipment_number', null, ' ') !!}</div>

    </div>
</div>