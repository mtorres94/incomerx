<div class="btn-group btn-group-sm pull-right" role="group" style="padding-bottom: 10px;">

    <button type="button"  class="btn btn-danger" onclick="clearTable('warehouse_cargo_details')">
        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
    </button>
</div>

<table class="table table-bordered table-condensed" id="warehouse_cargo_details">
    <thead>
    <tr>
        <th data-override="warehouse_line" hidden></th>
        <th width="5%" data-override="warehouse_number">Qty</th>
        <th width="10%" data-override="warehouse_type"> Type</th>
        <th width="5%" data-override="warehouse_unit" >Unit</th>
        <th width="10%" data-override="warehouse_weight" >Weight</th>
        <th width="10%" data-override="warehouse_cubic">Cubic</th>
        <th width="10%" data-override="warehouse_volume_weight">Vol Weight</th>
        <th width="10%" data-override="warehouse_location">Location</th>
        <th width="10%" data-override="warehouse_bin">Bin</th>

    </tr>
    </thead>
    <tbody></tbody>
</table>

<div class="row ">

    <div class="col-md-2">{!! Form::bsText(null,null, 'Qty', 'sum_quantity', null, '0.000') !!}</div>
    <div class="col-md-2">{!! Form::bsText(null,null, 'Weight', 'sum_weight', null, '0.000') !!}</div>
    <div class="col-md-2">{!! Form::bsText(null,null, 'Cubic', 'sum_cubic', null, '0.000') !!}</div>
    <div class="col-md-2">{!! Form::bsText(null,null, 'Vol. Weight', 'sum_volume_weight', null, '0.000') !!}</div>
</div>