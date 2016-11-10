<div class="btn-group btn-group-sm pull-right" role="group" style="padding-bottom: 10px;">
    <a type="button" class="btn btn-default btn-sm" id="btn-load-warehouse" onclick="cleanModalFields('LoadWarehouse'), clearTable('load_warehouse_details')" data-toggle="modal" data-target="#LoadWarehouse"><i class="fa fa-search" aria-hidden="true"></i><span>Load Warehouse Receipts</span></a>
    <button type="button" id="btn_new_warehouse"  class="btn btn-default" data-toggle="modal" data-target="#Warehouse_Details" onclick="cleanModalFields('Warehouse_Details'), clearTable('warehouse_cargo_details')">
        <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
    </button>
    <button type="button"  class="btn btn-danger" onclick="clearTable('cargo_details'), clearTable('hidden_cargo_details')">
        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
    </button>
</div>

<table class="table table-bordered table-condensed" id="cargo_details">
    <thead>
    <tr>
        <th data-override="warehouse_line" hidden></th>
        <th width="10%" data-override="warehouse_number"> WR#</th>
        <th width="10%" data-override="warehouse_date"> Date</th>
        <th width="10%" data-override="shipper_name" >Shipper</th>
        <th width="10%" data-override="consignee_name" >Consignee</th>
        <th width="10%" data-override="box_number">Box #</th>
        <th width="10%" data-override="position">Position</th>
        <th width="10%" data-override="container_loaded_weight">Ship Inst #</th>
        <th width="10%" data-override="status">Status</th>
        <th width="10%"/>
    </tr>
    </thead>
    <tbody></tbody>
</table>
<table id ="hidden_cargo_details" class="table hidden">
<tbody></tbody>
</table>

