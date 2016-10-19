<fieldset>
    <div class="row row-padding">
        <div class="col-md-2">{!! Form::bsText(null, null,'Booking #', 'booking_code', null, '') !!}</div>

        <div class="col-md-2">{!! Form::bsSelect(null, null, ' Status', 'booking_status', array(
            'O' => 'OPEN',
            'P' => 'IN PROCESS',
            'C' => 'CLOSED',
            'V' => 'VOID',
        ), 'Status') !!}</div>
        <div class="col-md-2">{!! Form::bsSelect(null, null, 'Currency', 'currency_type', Sass\Currency::all()->lists('code', 'id'), ' ') !!}</div>

    </div>
</fieldset>