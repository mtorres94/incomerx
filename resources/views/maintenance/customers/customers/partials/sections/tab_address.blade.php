<div class="row">
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-12"> {!! Form::bsComplete('col-md-3', 'col-md-9','Name ', 'bill_id', 'bill_name', Request::get('term'),((isset($customer) and $customer->port_unloading_id > 0) ? $customer->unloading->name : null), 'NAME') !!}</div>
        </div>
        <div class="row">
            <div class="col-md-12"> {!! Form::bsMemo('col-md-3', 'col-md-9', 'Address', 'bill_address', null, '') !!}</div>
        </div>
        <div class="row">
            <div class="col-md-12"> {!! Form::bsText('col-md-3', 'col-md-9', 'City', 'bill_city', null, '') !!}</div>
        </div>
        <div class="row">
            <div class="col-md-12"> {!! Form::bsComplete('col-md-3', 'col-md-9','State ', 'bill_state_id', 'bill_state_name',null , 'STATES') !!}</div>
        </div>
        <div class="row">
            <div class="col-md-12"> {!! Form::bsComplete('col-md-3', 'col-md-9','Zip code ', 'bill_zip_code_id', 'bill_zip_code', null, 'ZIP CODES') !!}</div>
        </div>
        <div class="row">
            <div class="col-md-12"> {!! Form::bsComplete('col-md-3', 'col-md-9','Country ', 'bill_country_id', 'bill_country_name',null, 'COUNTRY') !!}</div>
        </div>
        <div class="row">
            <div class="col-md-6"> {!! Form::bsText('col-md-6', 'col-md-6', 'Phone', 'bill_phone', null, '') !!}</div>
            <div class="col-md-6"> {!! Form::bsText('col-md-6', 'col-md-6', 'Fax', 'bill_fax', null, '') !!}</div>
        </div>

    </div>
    <div class="col-md-6">
        <div class="btn-group btn-group-sm pull-right" role="group" style="padding-bottom: 10px;">
            <button type="button" id="btn-charges" class="btn btn-default" data-toggle="modal" data-target="#deliveryAddress" onclick="cleanModalFields('deliveryAddress')">
                <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
            </button>
            <button type="button" class="btn btn-danger">
                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
            </button>
        </div>

        <table class="table table-bordered table-condensed" id="delivery">
            <thead>
            <tr>
                <th hidden></th>
                <th width="25%" >Name</th>
                <th width="35%" >Address</th>
                <th width="25%" >City</th>
                <th width="12%"/>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>