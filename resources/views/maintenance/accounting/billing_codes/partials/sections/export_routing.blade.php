<div class="row">
    <div class="col-md-7">
        <legend>Accounting Export Routing</legend>
    </div>
</div>
<div class="col-md-4">
    <h5>Billing</h5>
    <div class="row">{!! Form::bsText('col-md-3', 'col-md-8', 'Item', 'billing_item', null, null) !!}</div>
    <div class="row">{!! Form::bsText('col-md-3', 'col-md-8', 'Description', 'billing_description', null, null) !!}</div>
    <div class="row">{!! Form::bsText('col-md-3', 'col-md-8', 'Account', 'billing_account', null, null) !!}</div>
    <h5>Customer Group Billing Code</h5>
    <div class="row">{!! Form::bsText('col-md-3', 'col-md-8', 'Group', 'customer_billing_code', null, null) !!}</div>
    <div class="row">{!! Form::bsText('col-md-3', 'col-md-8', 'Description', 'customer_billing_code_description', null, null) !!}</div>
</div>
<div class="col-md-4">
    <h5>Cost</h5>
    <div class="row">{!! Form::bsText('col-md-3', 'col-md-8', 'Item', 'cost_item', null, null) !!}</div>
    <div class="row">{!! Form::bsText('col-md-3', 'col-md-8', 'Description', 'cost_description', null, null) !!}</div>
    <div class="row">{!! Form::bsText('col-md-3', 'col-md-8', 'Account', 'cost_account', null, null) !!}</div>
    <h5>Cost Center</h5>
    <div class="row">{!! Form::bsText('col-md-3', 'col-md-8', 'Cost Center', 'cost_center', null, null) !!}</div>
</div>
<div class="col-md-4">

    <div class="btn-group btn-group-sm pull-right" role="group" style="padding-bottom: 10px;">
        <div class="btn-group btn-group-sm pull-right" role="group" style="padding-bottom: 10px;">
            <button type="button" id="btn_customer" class="btn btn-default" data-toggle="modal" data-target="#customer_mapping" onclick="cleanModalFields('customer_mapping')" >
                <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
            </button>
            <button type="button" class="btn btn-danger" onclick="clearTable('customer_table')">
                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
            </button>
        </div>
    </div>

    <table class="table table-bordered table-condensed" id="customer_table">
        <thead>
        <tr>
            <th hidden></th>
            <th width="50%" >Customer</th>
            <th width="30%" >Code Mapping</th>
            <th width="20%"/>
        </tr>
        </thead>
        <tbody>
        </tbody>
    </table>

</div>
