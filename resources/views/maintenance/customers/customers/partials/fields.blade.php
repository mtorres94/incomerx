<div class="container-fluid">
    <div class="col-md-6">
        <div id="subpanel" class="panel panel-default">
            <div class="panel-header">Customer info</div>
            <div class="panel-body">
                {!! Form::bsText('col-md-3', 'col-md-9', 'Code', 'code', null, 'Enter the code for the customer') !!}
                {!! Form::bsText('col-md-3', 'col-md-9', 'Name', 'name', null, 'Enter the name for the customer') !!}
                {!! Form::bsMemo('col-md-3', 'col-md-9', 'Address', 'address', null, 2, 'Enter the address for this customer') !!}
                {!! Form::bsText('col-md-3', 'col-md-9', 'City', 'city', null, 'Enter the city for the customer') !!}
                {!! Form::bsSelect('col-md-3', 'col-md-9', 'State', 'state_id', Sass\State::all()->lists('name', 'id'), 'Choose one of the following states...') !!}
                {!! Form::bsText('col-md-3', 'col-md-9', 'Phone', 'phone', null, 'Enter the phone for the customer') !!}
                {!! Form::bsText('col-md-3', 'col-md-9', 'Fax', 'fax', null, 'Enter the fax for the customer') !!}
                {!! Form::bsText('col-md-3', 'col-md-9', 'Duns Code', 'duns_code', null, 'Enter the duns code for the customer') !!}
                {!! Form::bsSelect('col-md-3', 'col-md-9', 'Incoterm', 'incoterm_id', Sass\Incoterm::all()->lists('name', 'id'), 'Choose one of the following incoterms...') !!}
                {!! Form::bsSelect('col-md-3', 'col-md-9', 'Defult Currency', 'currency_id', Sass\Currency::all()->lists('code', 'id'), 'Choose one of the following currencies...') !!}
            </div>
        </div>
        <div id="subpanel" class="panel panel-default">
            <div class="panel-header">Contact information</div>
            <div class="panel-body">
                {!! Form::bsText('col-md-3', 'col-md-9', 'Name', 'contact_name', null, 'Enter the contact name for the customer') !!}
                {!! Form::bsText('col-md-3', 'col-md-9', 'Mobile', 'mobile', null, 'Enter the contact phone for the customer') !!}
                {!! Form::bsText('col-md-3', 'col-md-9', 'Email', 'email_contact', null, 'Enter the email contact for the customer') !!}
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div id="subpanel" class="panel panel-default">
            <div class="panel-header">Account info</div>
            <div class="panel-body">
                {!! Form::bsDate('col-md-3', 'col-md-9', 'Since', 'since', null, null) !!}
                {!! Form::bsText('col-md-3', 'col-md-9', 'DPS Check', 'dps_check', null, 'Enter the DPS check for the customer') !!}
                {!! Form::bsText('col-md-3', 'col-md-9', 'User ID', 'user_create_id', null, '') !!}
                {!! Form::bsSelect('col-md-3', 'col-md-9', 'Account status', 'status', array('1' => 'PROSPECT', '2' => 'ACTIVE', '3' => 'NON ACTIVE', '4' => 'ON HOLD'), 'Choose one of the following status...') !!}
            </div>
        </div>
        <div id="subpanel" class="panel panel-default">
            <div class="panel-header">Account type</div>
            <div class="panel-body">
                <div class="row no-padding-top">
                    <div class="col-md-6">{!! Form::bsCheck('Shipper', 'shipper') !!}</div>
                    <div class="col-md-6">{!! Form::bsCheck('Consignee', 'consignee') !!}</div>
                </div>
                <div class="row no-padding-top">
                    <div class="col-md-6">{!! Form::bsCheck('Third Party', 'third_party') !!}</div>
                    <div class="col-md-6">{!! Form::bsCheck('Agent', 'agent') !!}</div>
                </div>
            </div>
        </div>
        <div id="subpanel" class="panel panel-default">
            <div class="panel-header">Agent Co-Loader Default</div>
            <div class="panel-body">
                {!! Form::bsSelect('col-md-3', 'col-md-9', 'Agent', 'agent_id', Sass\Customer::all()->lists('name', 'id'), 'Choose one of the following customers...') !!}
                {!! Form::bsSelect('col-md-3', 'col-md-9', 'Co-Loader', 'coloader_id', Sass\Customer::all()->lists('name', 'id'), 'Choose one of the following customers...') !!}
            </div>
        </div>
        <div id="subpanel" class="panel panel-default">
            <div class="panel-header">Broker Default</div>
            <div class="panel-body">
                {!! Form::bsSelect('col-md-3', 'col-md-9', 'Origin', 'origin_id', Sass\Vendor::all()->lists('name', 'id'), 'Choose one of the following vendors...') !!}
                {!! Form::bsSelect('col-md-3', 'col-md-9', 'Destination', 'destination_id', Sass\Vendor::all()->lists('name', 'id'), 'Choose one of the following vendors...') !!}
            </div>
        </div>
    </div>
</div>
