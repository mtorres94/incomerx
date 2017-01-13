<div class="row">
    <div class="col-md-6">

        <div class="row">{!! Form::bsComplete('col-md-3', 'col-md-8', 'Carrier', 'delivery_carrier_id', 'delivery_carrier_name', Request::get('term'), ((isset($bill_of_lading) and $bill_of_lading->carrier_id > 0) ? $bill_of_lading->carrier->name : null), 'Carrier') !!}</div>
        <div class="row">{!! Form::bsComplete('col-md-3', 'col-md-8', 'Delivery to', 'delivery_id', 'delivery_name', Request::get('term'), ((isset($bill_of_lading) and $bill_of_lading->delivery_id > 0) ? $bill_of_lading->delivery->name : null), 'Customers') !!}</div>
        <div class="row">{!! Form::bsMemo('col-md-3', 'col-md-8', 'Address', 'delivery_address', null, 1, ' ') !!}</div>
        <div class="row">
            {!! Form::bsText('col-md-3', 'col-md-8', 'City', 'delivery_city', null, ' ') !!}
        </div>
        <div class="row">
            <div class="col-md-6">{!! Form::bsComplete('col-md-6', 'col-md-6', 'State/ Province', 'delivery_state_id', 'delivery_state_name', Request::get('term'), ((isset($bill_of_lading) and $bill_of_lading->delivery_state_id > 0) ? $bill_of_lading->delivery_state->name : null), 'State') !!}</div>
            <div class="col-md-6">{!! Form::bsComplete('col-md-4', 'col-md-6', 'Zip Postal Code', 'delivery_zip_code_id', 'delivery_zip_code_code', Request::get('term'), ((isset($bill_of_lading) and $bill_of_lading->delivery_zip_code_id > 0) ? $bill_of_lading->delivery_zip_code->code : null), 'Zip Code') !!}</div>
        </div>
        <div class="row">
            {!! Form::bsText('col-md-3', 'col-md-8', 'Contact', 'delivery_contact', null, ' ') !!}
        </div>
        <div class="row">
            <div class="col-md-6">
                {!! Form::bsText('col-md-6', 'col-md-6', 'Phone', 'delivery_phone', null, ' ') !!}
            </div>
            <div class="col-md-6">
                {!! Form::bsText('col-md-4', 'col-md-5', 'Fax', 'delivery_fax', null, ' ') !!}
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class=row>{!! Form::bsSelect('col-md-4', 'col-md-6', ' Freight Charges', 'freight_charges', array('WR' => 'BR - BANK RELEASE','PD' => 'COD - COD','EA' => 'COL - COLLECTED','EO' => 'PPD - PREPAID'), '') !!}</div>
        <div class="row">
            {!! Form::bsMemo('col-md-4', 'col-md-6', 'Comments', 'delivery_comments', null, 3, ' ') !!}
        </div>

    </div>
</div>