<div class="row">

        <div class="row">
            <div class="col-md-12">{!! Form::bsComplete('col-md-3', 'col-md-9', 'Name', 'agent_id', 'agent_name', Request::get('term'), ((isset($booking_entry) and $booking_entry->consignee_id > 0) ? $booking_entry->consignee->name : null), 'Customers...') !!}</div>
        </div>
        <div class="row">
            <div class="col-md-12">{!! Form::bsMemo('col-md-3', 'col-md-9', 'Address', 'agent_address', null, 1, ' ') !!}</div>
        </div>
        <div class="row">
            <div class="col-md-12">{!! Form::bsText('col-md-3', 'col-md-9', 'City', 'agent_city', null, ' ') !!}</div>
        </div>
        <div class="row">
            <div class="col-md-12">{!! Form::bsComplete('col-md-3', 'col-md-9', 'State/ Province', 'agent_state_id', 'agent_state_name', Request::get('term'), ((isset($bill_lading) and $bill_lading->agent_state_id > 0) ? $bill_lading->agent_state->name : null), 'State') !!}</div>
        </div>
        <div class="row">
            <div class="col-md-12">{!! Form::bsComplete('col-md-3', 'col-md-9', 'Country Name', 'agent_country_id', 'agent_country_name', Request::get('term'), ((isset($bill_lading) and $bill_lading->agent_country_id > 0) ? $bill_lading->agent_country->name : null), 'Country') !!}</div>
        </div>
        <div class="row">
            <div class="col-md-12">{!! Form::bsComplete('col-md-3', 'col-md-9', 'Zip Postal Code', 'agent_zip_code_id', 'agent_zip_code_code', Request::get('term'), ((isset($bill_lading) and $bill_lading->agent_zip_code_id > 0) ? $bill_lading->agent_zip_code->code : null), 'Zip Code') !!}</div>
        </div>
        <div class="row">
            <div class="col-md-12">{!! Form::bsText('col-md-3', 'col-md-6', 'Phone', 'agent_phone', null, '') !!}</div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-6">{!! Form::bsText('col-md-6', 'col-md-6', 'Comm. Amt', 'agent_commission_amount', null, '') !!}</div>
                <div class="col-md-6">{!! Form::bsText('col-md-2', 'col-md-6', '%', 'agent_commission_p', null, '') !!}</div>
            </div>
        </div>

</div>
