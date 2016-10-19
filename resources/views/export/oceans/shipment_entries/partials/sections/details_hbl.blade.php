<div class="btn-group btn-group-sm pull-right" role="group" style="padding-bottom: 10px;">
    <button type="button" id="btn_cargo_details" class="btn btn-default"  onclick="addSubtab('Bill of Lading', 'http://incomerx.app/export/oceans/bill_of_lading/create')" href="#">
        <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
    </button>
    <button type="button" class="btn btn-danger"  onclick="clearTable('hbl_details')">
        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
    </button>
</div>

<table class="table table-bordered table-condensed" id="hbl_details">
    <thead>
    <tr>
        <th data-override="cargo_line" hidden></th>
        <th width="5%" data-override="hbl_code">HBL</th>
        <th width="10%" data-override="shipper_name">Shipper Name</th>
        <th width="15%" data-override="consignee_name">Consignee Name</th>
        <th width="5%" data-override="pieces">Pieces</th>
        <th width="10%" data-override="actual_weight">Actual Weight</th>
        <th width="10%" data-override="unit">Unit</th>
        <th width="10%" data-override="charge_weight">Charge Weight</th>
        <th width="12%"/>
    </tr>
    </thead>

    <tbody>
    </tbody>
</table>

<div class="row pull-right">
    <div class="col-md-12">
        <div class="col-md-3">{!! Form::bsText(null,null, 'Pieces', 'total_pieces', null, '0.000') !!}</div>
        <div class="col-md-3">{!! Form::bsText(null,null, 'Act. Weight', 'total_actual_weight', null, '0.000') !!}</div>
        <div class="col-md-3">{!! Form::bsText(null,null, 'Charge Weight', 'total_charge_weight', null, '0.000') !!}</div>
    </div>

</div>