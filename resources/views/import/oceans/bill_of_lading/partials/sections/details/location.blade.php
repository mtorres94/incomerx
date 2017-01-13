<div class="row">
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-12">
            {!! Form::bsComplete('col-md-3', 'col-md-8', 'Name', 'location_id', 'location_name', Request::get('term'), ((isset($bill_of_lading) and $bill_of_lading->location_id > 0) ? $bill_of_lading->location->name : null), 'Customers...') !!}
            </div></div>
        <div class="row">
            <div class="col-md-12">
            {!! Form::bsMemo('col-md-3', 'col-md-8', 'Address', 'location_address', null, 1, ' ') !!}</div>
        </div>
        <div class="row">
            <div class="col-md-12">{!! Form::bsText('col-md-3', 'col-md-8', 'City', 'location_city', null, ' ') !!}</div>
        </div>
        <div class="row">
            <div class="col-md-12">{!! Form::bsComplete('col-md-3', 'col-md-8', 'State/ Province', 'location_state_id', 'location_state_name', Request::get('term'), ((isset($bill_of_lading) and $bill_of_lading->location_state_id > 0) ? $bill_of_lading->location_state->name : null), 'State') !!}</div>
        </div>
        <div class="row">
            <div class="col-md-12">{!! Form::bsComplete('col-md-3', 'col-md-8', 'Zip Postal Code', 'location_zip_code_id', 'location_zip_code_code', Request::get('term'), ((isset($bill_of_lading) and $bill_of_lading->location_zip_code_id > 0) ? $bill_of_lading->location_zip_code->code : null), 'Zip Code') !!}</div>
        </div>
        <div class="row">
            <div class="col-md-12">{!! Form::bsText('col-md-3', 'col-md-8', 'Contact', 'location_contact', null, ' ') !!}</div>
        </div>
        <div class="row">
            <div class="col-md-6">
                {!! Form::bsText('col-md-6', 'col-md-6', 'Phone', 'location_phone', null, ' ') !!}
            </div>
            <div class="col-md-4">
                {!! Form::bsText('col-md-6', 'col-md-6', 'Fax', 'location_fax', null, ' ') !!}
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-12">{!! Form::bsMemo(null, null, 'Comments', 'location_comments', null, 4,' ') !!}</div>
        </div>
        <div class="row">
            <div class="col-md-4">
                {!! Form::bsText(null, null, 'FMC Number', 'fmc_number', null, ' ') !!}
            </div>
        </div>
    </div>
</div>