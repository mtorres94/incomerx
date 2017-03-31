<div class="col-md-7">
    <div class="row">
        <legend>Billing Code</legend>
    </div>
    <div class="row">
        {!! Form::bsText('col-md-3', 'col-md-3', 'Billing Code', 'code', null, null) !!}
        {!! Form::bsText(null, 'col-md-6', null, 'name', null, null) !!}
    </div>
    <div class="row">
        {!! Form::bsMemo('col-md-3', 'col-md-9', 'Other Description', 'description', null, null) !!}
    </div>
    <div class="row">
        {!! Form::bsMemo('col-md-3', 'col-md-9', 'Another Lang', 'another_lang', null, null) !!}
    </div>
</div>
<div class="col-md-5">
    <div class="row">
        <legend>Default Values</legend>
    </div>
    <div class="row">
        {!! Form::bsSelect('col-md-3', 'col-md-9', 'Code Type', 'code_type', array('W' => 'Weight Charge','V' => 'Valuation', 'T' =>'Taxed', 'A'=> 'Due Agent', 'C'=> 'Due Carrier', 'O'=> 'Other'), '') !!}
    </div>
    <div class="row">
        {!! Form::bsSelect('col-md-3', 'col-md-9', 'Billing Type', 'billing_type', array('D' => 'Default','B' => 'Total Bill%', 'F'=> 'Freight%', 'S'=>'Short Tons'), '') !!}
    </div>
    <div class="row">
        {!! Form::bsSelect('col-md-3', 'col-md-9', 'Unit', 'unit_id', Sass\CargoType::all()->lists('code', 'id'), '') !!}
    </div>
    <div class="row">
        {!! Form::bsText('col-md-3', 'col-md-6', 'Billing', 'billing_amount', null, null) !!}
        {!! Form::bsSelect(null, 'col-md-3', null, 'billing_currency_id', Sass\Currency::all()->lists('code', 'id'), '') !!}
    </div>
    <div class="row">
        {!! Form::bsText('col-md-3', 'col-md-6', 'Cost', 'cost_amount', null, null) !!}
        {!! Form::bsSelect(null, 'col-md-3', null, 'cost_currency_id', Sass\Currency::all()->lists('code', 'id'), '') !!}
    </div>
</div>
