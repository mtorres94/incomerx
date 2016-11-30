<div class="btn-group btn-group-sm pull-right" role="group" style="padding-bottom: 10px;">
    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#customerReference" onclick="cleanModalFields('customerReference')">
        <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
    </button>
    <button type="button" class="btn btn-danger" onclick="clearTable('customer_details')">
        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
    </button>
</div>
<table class="table table-bordered table-condensed" id="customer_details">
    <thead>

    <tr>
        <th data-override="cust_line" hidden>Line</th>
        <th data-override="cust_number" width="25%">Customer Reference</th>
        <th data-override="cust_details" width="40%">Details</th>
        <th width="15%"/>
    </tr>
    </thead>
    <tbody>

    </tbody>
</table>