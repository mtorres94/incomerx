<div class="form-horizontal">
    <div class="row">
        <div class="col-md-6">
            {!! Form::bsSelect('col-md-4', 'col-md-4', 'Vendor Type', 'vendor_type_id', Sass\VendorType::all()->lists('code', 'id'), 'Vendor Type') !!}
            {!! Form::bsText('col-md-4', 'col-md-8', 'Acct #', 'account_number', null, 'Account number') !!}
            {!! Form::bsComplete('col-md-4', 'col-md-8', 'Master', 'master_id', 'master_name', Request::get('term'), null, 'Vendors...') !!}
            {!! Form::bsComplete('col-md-4', 'col-md-8', 'Customer', 'customer_id', 'customer_name', Request::get('term'), null, 'Customers...') !!}
            {!! Form::bsText('col-md-4', 'col-md-8', 'Notification Email', 'notification_email', null, 'Email') !!}
            {!! Form::bsSelect('col-md-4', 'col-md-4', 'Identification Type', 'identification_type_id', Sass\IdentificationType::all()->lists('abbreviation', 'id'), 'Identification Type') !!}
            {!! Form::bsText('col-md-4', 'col-md-4', 'Identification Number', 'identification_number', null, 'Identification number') !!}
            {!! Form::bsSelect('col-md-4', 'col-md-4', 'Payment Terms', 'payment_term_id', Sass\PaymentTerm::all()->lists('abbreviation', 'id'), 'Payment Term') !!}
        </div>
        <div class="col-md-6">
            <div class="col-md-12">
                {!! Form::bsMemo(null, null, 'Remitance Information', 'remitance_information', null, 12, '') !!}
            </div>
        </div>
    </div>
</div>