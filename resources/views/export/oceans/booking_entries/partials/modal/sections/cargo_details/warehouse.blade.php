<div class="form-horizontal">
    <div class="pull-left" style="padding-bottom: 15px;">
        <div class="btn-group" role="group" aria-label="...">
            <a type="button" class="btn btn-default btn-sm" id="btn_box_details" onclick="cleanModalFields('Box_Details')" data-toggle="modal" data-target="#Box_Details"><i class="fa fa-cube" aria-hidden="true"></i><span>Box</span></a>
            <a type="button" class="btn btn-default btn-sm" id="btn_vehicle_details" onclick="cleanModalFields('Vehicle_Details')" data-toggle="modal" data-target="#Vehicle_Details"><i class="fa fa-car" aria-hidden="true"></i><span>Vehicle</span></a>
        </div>
    </div>

    <table class="table table-bordered table-condensed" id="cargo_vehicle_details">
        <thead>
        <tr>
            <th data-override="details_line" hidden></th>
            <th width="5%" data-override="cargo_type" ></th>
            <th width="5%" data-override="details_quantity">Qty.</th>
            <th width="10%" data-override="details_unit_code">Unit</th>
            <th width="10%" data-override="details_length">Length</th>
            <th width="10%" data-override="details_width">Width</th>
            <th width="10%" data-override="details_height">Height</th>
            <th width="10%" data-override="details_weight">Weight</th>
            <th width="10%" data-override="details_cubic">Cubic</th>
            <th width="10%"/>
        </tr>
        </thead>
        <tbody></tbody>
    </table>

</div>