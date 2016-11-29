<legend>Agent Information</legend>
<div class="row">
    <div class="col-md-12">    {!! Form::bsComplete('col-md-3', 'col-md-9', 'Name', 'agent_id', 'agent_name', Request::get('term'), ((isset($quotes) and $quotes->agent_id > 0) ? $quotes->agent->name : null), 'Ocean Ports') !!}</div>
</div>
<div class="row">
    <div class="col-md-12">
        {!! Form::bsText('col-md-3', 'col-md-6', 'Phone', 'agent_phone',null) !!}
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        {!! Form::bsText('col-md-3', 'col-md-3', 'Transit days', 'transit_day',null) !!}
        {!! Form::bsSelect('col-md-3', 'col-md-3', 'Type', 'payment_type', array(
            '1' => '1- CHECK',
            '2' => '2- CC',
            '3' => '3- CASH',
            '4' => '4- WIRE',
        ), null) !!}
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        {!! Form::bsSelect('col-md-3', 'col-md-6', 'Frequency', 'frequency', array(
            '1' => '1- DAILY',
            '2' => '2- WEEKLY',
            '3' => '3- BIWEEKLY',
            '4' => '4- MONTHLY',
            '5' => '5- ANNUALLY',
        ), null) !!}
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        {!! Form::bsDate('col-md-3', 'col-md-3', 'Starting Date', 'starting_date',null) !!}
        {!! Form::bsDate('col-md-3', 'col-md-3', 'Starting Process date', 'starting_process_date',null) !!}
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        {!! Form::bsDate('col-md-3', 'col-md-3', 'Ending Date', 'ending_date',null) !!}
        {!! Form::bsDate('col-md-3', 'col-md-3', 'Approved Date', 'approved_date',null) !!}
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        {!! Form::bsDate('col-md-3', 'col-md-3', 'Closed Date', 'closed_date',null) !!}
    </div>
</div>