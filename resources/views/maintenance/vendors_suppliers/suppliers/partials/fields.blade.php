<div class="container-fluid">
    <div class="col-md-6">
        {!! Form::bsText('col-md-2', 'col-md-10', 'Code', 'code', null, 'Enter the code for the supplier') !!}
        {!! Form::bsText('col-md-2', 'col-md-10', 'Name', 'name', null, 'Enter the name for the supplier') !!}
        {!! Form::bsMemo('col-md-2', 'col-md-10', 'Address', 'address', null, 2, 'Enter the address for this supplier') !!}
        {!! Form::bsText('col-md-2', 'col-md-10', 'City', 'city', null, 'Enter the city for the supplier') !!}
        {!! Form::bsSelect('col-md-2', 'col-md-10', 'State', 'state_id', Sass\State::all()->lists('name', 'id'), 'Choose one of the following states...') !!}
        {!! Form::bsText('col-md-2', 'col-md-10', 'ZIP', 'zip', null, 'Enter the postal code for the supplier') !!}
        {!! Form::bsSelect('col-md-2', 'col-md-10', 'Country', 'country_id', Sass\Country::all()->lists('name', 'id'), 'Choose one of the following countries...') !!}
    </div>
    <div class="col-md-6">
        {!! Form::bsText('col-md-3', 'col-md-9', 'Contact name', 'contact_name', null, 'Enter the contact name for the supplier') !!}
        {!! Form::bsText('col-md-3', 'col-md-9', 'Phone', 'contact_phone', null, 'Enter the contact phone for the supplier') !!}
        {!! Form::bsText('col-md-3', 'col-md-9', 'Fax', 'contact_fax', null, 'Enter the contact fax for the supplier') !!}
        {!! Form::bsText('col-md-3', 'col-md-9', 'Email address', 'email_contact', null, 'Enter the email address for the supplier') !!}
    </div>
</div>