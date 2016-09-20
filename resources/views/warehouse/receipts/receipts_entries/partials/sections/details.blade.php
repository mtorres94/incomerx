<fieldset>
    <legend>Warehouse Details</legend>
    <div class="pull-left" style="padding-bottom: 15px;">
        <div class="btn-group" role="group" aria-label="...">
            <a type="button" class="btn btn-default btn-sm" id="btn-cargo" onclick="cleanModalFields('cargo-warehouse')" data-toggle="modal" data-target="#cargo-warehouse"><i class="fa fa-cube" aria-hidden="true"></i><span>Cargo</span></a>
            <a type="button" class="btn btn-default btn-sm"><i class="fa fa-car" aria-hidden="true"></i><span>Vehicle</span></a>
        </div>
    </div>
    <div class="pull-right">
        <div class="btn-group" role="group" aria-label="...">
            <a type="button" class="btn btn-default btn-sm" id="btn-cargo-multiline" onclick="cleanModalFields('cargo-multiline-warehouse')" data-toggle="modal" data-target="#cargo-multiline-warehouse"><i class="fa fa-cube" aria-hidden="true"></i><span>Package/Multi Line</span></a>
            <a type="button" class="btn btn-default btn-sm"><i class="fa fa-cube" aria-hidden="true"></i><span>Repack</span></a>
        </div>
    </div>
    <table class="table table-bordered table-condensed" id="warehouse-details" style="font-size: 11px;">
        <thead>
        <tr>
            <th data-override="warehouse_details_line" hidden></th>
            <th data-override="warehouse_details_type"></th>
            <th data-override="warehouse_details_quantity">Qty.</th>
            <th data-override="warehouse_details_cargo_type_id" hidden></th>
            <th data-override="warehouse_details_cargo_type_name">Type</th>
            <th data-override="warehouse_details_pieces">Pieces</th>
            <th data-override="warehouse_details_unit">Unit</th>
            <th data-override="warehouse_details_metric" hidden>Metric</th>
            <th data-override="warehouse_details_length">Length</th>
            <th data-override="warehouse_details_width">Width</th>
            <th data-override="warehouse_details_height">Height</th>
            <th data-override="warehouse_details_weight">Weight</th>
            <th data-override="warehouse_details_cubic">Cubic</th>
            <th data-override="warehouse_details_volume_weight" width="7%">Vol. Weight</th>
            <th data-override="warehouse_details_barcode" hidden>Barcode</th>
            <th data-override="warehouse_details_location_id" hidden></th>
            <th data-override="warehouse_details_location">Location</th>
            <th data-override="warehouse_details_location_bin_id" hidden></th>
            <th data-override="warehouse_details_location_bin">Bin</th>
            <th data-override="warehouse_details_material_description" hidden></th>
            <th data-override="warehouse_details_serial_number">Serial #</th>
            <th></th>
            <th width="12%"/>
        </tr>
        </thead>
        <tbody></tbody>
    </table>
</fieldset>