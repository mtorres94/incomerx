<div class="row">
    <div class="col-md-6">{!! Form::bsDate('col-md-6', 'col-md-6', 'Date', 'pod_date', null, ' ') !!}</div>
    <div class="col-md-6">{!! Form::bsDate('col-md-6', 'col-md-6', 'Expected Date', 'pod_expected_date', null, ' ') !!}</div>
</div>
<div class="row">
    {!! Form::bsText('col-md-3', 'col-md-9', 'Received By', 'pod_received_by', null, ' ') !!}
</div>
<div class="row">
    {!! Form::bsText('col-md-3', 'col-md-9', 'Incident', 'pod_incident', null, ' ') !!}

</div>
<div class="row">
    {!! Form::bsMemo('col-md-3', 'col-md-9', 'Notes', 'pod_note', null, 3, ' ') !!}
</div>
