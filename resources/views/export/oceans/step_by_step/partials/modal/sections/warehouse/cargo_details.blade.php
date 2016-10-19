<div class="btn-group btn-group-sm pull-right" role="group" style="padding-bottom: 10px;">
    <button type="button"  id="btn_warehouse" class="btn btn-default" data-toggle="modal" data-target="#Warehouse_Cargo_Details" onclick="cleanModalFields('Warehouse_Cargo_Details')">
        <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
    </button>
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
        <th width="10%"/>
    </tr>
    </thead>
    <tbody></tbody>
</table>