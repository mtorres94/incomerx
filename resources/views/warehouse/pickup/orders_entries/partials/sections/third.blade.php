<fieldset id="third_party_section">
    <legend>Third Party</legend>
    <div class="form-horizontal">
        <div class="row">
            {!! Form::bsComplete('col-md-3', 'col-md-9', 'Name', 'third_party_id', 'third_party_name', Request::get('term'), ((isset($order_entry) and $order_entry->third_party_id > 0) ? $order_entry->third_party->name : null), 'Customers...') !!}
        </div>
        <div class="row">
                {!! Form::bsText('col-md-3', 'col-md-4','Phone', 'third_party_phone', null, '') !!}
        </div>
        <div class="row">
                {!! Form::bsText('col-md-3', 'col-md-4', 'Fax', 'third_party_fax', null, '') !!}
        </div>

        <div class="row">
            <div class="col-md-6">
               {!! Form::bsSelect('col-md-6', 'col-md-6', 'Currency', 'third_party_currency_type',Sass\Currency::all()->lists('code', 'id'), 'Currency') !!}

                {!! Form::bsText('col-md-6', 'col-md-6', 'Value $', 'third_value', null, '0.00') !!}
            </div>
            <div class="col-md-6">
                {!! Form::bsText('col-md-6', 'col-md-6', 'Declared Value $', 'third_declared_value', null, '0.00') !!}
                {!! Form::bsText('col-md-6', 'col-md-6', 'Insured Value $', 'third_insured_value', null, '0.00') !!}
            </div>
        </div>

    </div>
</fieldset>