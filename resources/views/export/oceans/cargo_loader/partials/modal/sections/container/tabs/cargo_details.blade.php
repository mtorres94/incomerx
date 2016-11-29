<div class="btn-group btn-group-sm pull-right" role="group" style="padding-bottom: 10px;">

    <button type="button"  class="btn btn-danger" onclick="clearTable('cargo_details')">
        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
    </button>
</div>

<table class="table table-bordered table-condensed" id="cargo_details">
    <thead>
    <tr>
        <th data-override="warehouse_line" hidden></th>
        <th width="10%" data-override="warehouse_number"> WR#</th>
        <th width="10%" data-override="warehouse_date"> Date</th>
        <th width="30%" data-override="shipper_name" >Shipper</th>
        <th width="30%" data-override="consignee_name" >Consignee</th>
        <th width="10%" data-override="status">Status</th>
    </tr>
    </thead>
    <tbody></tbody>
</table>

<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-2"></div>
    <div class="col-md-2"> {!! Form::bsText(null, null, 'Cubic Max ', 'cubic_max', '') !!}</div>
    <div class="col-md-2"> {!! Form::bsText(null, null, 'C. Loaded', 'cubic_load', '') !!}</div>
    <div class="col-md-2"> {!! Form::bsText(null, null, 'C. Loaded %', 'cubic_load_p', '') !!}</div>
    <div class="col-md-2"> {!! Form::bsText(null, null, 'C. Excess', 'cubic_excess', '') !!}</div>

</div>
<div class="row">
    <div class="col-md-2"> {!! Form::bsText(null, null, 'Pcs loaded ', 'pieces_loaded', '') !!}</div>
    <div class="col-md-2">    {!! Form::bsSelect(null, null, 'Kgs/Lbs', 'total_weight_unit', array('K' => 'KGS', 'L' => 'LBS'), null) !!}</div>
    <div class="col-md-2"> {!! Form::bsText(null, null, 'Weight', 'max_weight', '') !!}</div>
    <div class="col-md-2"> {!! Form::bsText(null, null, 'W. Loaded', 'weight_load', '') !!}</div>
    <div class="col-md-2"> {!! Form::bsText(null, null, 'W. Loaded %', 'weight_load_p', '') !!}</div>
    <div class="col-md-2"> {!! Form::bsText(null, null, 'W. Excess', 'weight_excess', '') !!}</div>

</div>

