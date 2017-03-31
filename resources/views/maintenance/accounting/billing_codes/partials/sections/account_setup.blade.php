<div class="col-md-7">
    <div class="btn-group btn-group-sm pull-right" role="group" style="padding-bottom: 10px;">
        <div class="btn-group btn-group-sm pull-right" role="group" style="padding-bottom: 10px;">
            <button type="button" id="btn_account" class="btn btn-default" data-toggle="modal" data-target="#gl_account" onclick="cleanModalFields('gl_account')" >
                <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
            </button>
            <button type="button" class="btn btn-danger" onclick="clearTable('account_table')">
                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
            </button>
        </div>
    </div>

    <table class="table table-bordered table-condensed" id="account_table">
        <thead>
        <tr>
            <th hidden></th>
            <th width="15%" >G/L Account</th>
            <th width="15%" >Type</th>
            <th width="20%" >State</th>
            <th width="30%" >Description</th>
            <th width="20%"/>
        </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
<div class="col-md-5">
    <h5>Tax Options</h5>
    <div class="row">
        {!! Form::bsCheck('col-md-1', 'col-md-3','Taxable', 'taxable', (isset($billing) ? $billing->stand_by : 'off')) !!}
        {!! Form::bsCheck('col-md-1', 'col-md-5','Tax to be included on Amount', 'taxable_add_to_amount', (isset($billing) ? $billing->stand_by : 'off')) !!}
    </div>
    <div class="row">
        {!! Form::bsText('col-md-2', 'col-md-3', 'AR %', 'ar_percent', null, null) !!}
        {!! Form::bsText('col-md-2', 'col-md-3', 'AP %', 'ap_percent', null, null) !!}
    </div>


</div>