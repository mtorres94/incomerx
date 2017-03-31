<div class="row"><div class="col-md-12">{!! Form::bsComplete('col-md-3', 'col-md-9', 'Name', 'agent_id', 'agent_name', Request::get('term'), ((isset($invoice) and $invoice->agent_id > 0) ? $invoice->agent->name : null), 'Customers...') !!}</div></div>
<div class="row">
    <div class="col-md-6">{!! Form::bsText('col-md-6', 'col-md-6', 'Freight Revenue', 'freight_revenue', null, ' ') !!}</div>
    <div class="col-md-6">{!! Form::bsText('col-md-6', 'col-md-6', 'Freight Cost', 'freight_cost', null, ' ') !!}</div>
</div>
<div class="row">
    <div class="col-md-6">{!! Form::bsText('col-md-6', 'col-md-6', 'Profit', 'profit', null, ' ') !!}</div>
    <div class="col-md-6">{!! Form::bsText('col-md-6', 'col-md-6', 'Adjustment', 'adjustment', null, ' ') !!}</div>
</div>

<div class="row">
    <div class="col-md-12">{!! Form::bsText('col-md-3', 'col-md-9', 'Net profit', 'net_profit', null, ' ') !!}</div></div>
<div class="row">
    <div class="col-md-6">{!! Form::bsText('col-md-6', 'col-md-6', 'Commission Adj', 'agent_commission_adjust', null, ' ') !!}</div>
    <div class="col-md-6">{!! Form::bsText('col-md-6', 'col-md-4', '%', 'agent_commission_percent', null, ' ') !!}</div>
</div>

<div class="row"><div class="col-md-12">{!! Form::bsText('col-md-3', 'col-md-9', 'Commission Amt', 'agent_commission_amount', null, ' ') !!}</div></div>
<div class="row"><div class="col-md-12">{!! Form::bsMemo('col-md-3', 'col-md-9', 'Notes', 'agent_note', null, ' ') !!}</div></div>

