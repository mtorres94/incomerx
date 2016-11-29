<div class="row">
    <legend>Charges Details</legend>
    <div class="btn-group btn-group-sm pull-right" role="group" style="padding-bottom: 10px;">
        <button type="button" class="btn btn-default" id="btn_charge_details" data-toggle="modal"  data-target="#Charge_Details" onclick="cleanModalFields('Charge_Details')">
            <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
        </button>
        <button type="button" class="btn btn-danger" onclick="clearTable('charge_details')">
            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
        </button>
    </div>

    <table class="table table-bordered table-condensed" id="charge_details">
        <thead>
        <tr>
            <th data-override="charge_line" hidden></th>
            <th width="10%" data-override="charge_billing_code">Billing Code</th>
            <th width="20%" data-override="charge_description">Description</th>
            <th width="10%" data-override="charge_bill_type" >Bill type</th>
            <th width="15%" data-override="charge_bill_party">Bill party</th>
            <th width="10%" data-override="charge_quantity">Quantity</th>
            <th width="10%" data-override="charge_rate">Rate</th>
            <th width="10%" data-override="charge_amount">Amount</th>
            <th width="15%" data-override="charge_bill_to">Bill to </th>
            <th width="10%" data-override="charge_cost">Cost </th>
            <th width="12%"/>
        </tr>
        </thead>
        <tbody>


        </tbody>
    </table>
</div>


