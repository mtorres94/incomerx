<div class="btn-group btn-group-sm pull-right" role="group" style="padding-bottom: 10px;">

    <button type="button"  class="btn btn-danger" id="delete_cargo">
        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
    </button>
</div>

<table class="table table-bordered table-condensed" id="cargo_details">
    <thead>
    <tr>
        <th hidden></th>
        <th width="12%" > WR#</th>
        <th width="10%" > Date</th>
        <th width="23%" >Shipper</th>
        <th width="23%" >Consignee</th>
        <th width="10%" >Status</th>
        <th width="7%" >Pcs</th>
        <th width="10%" >Weight</th>
        <th width="10%" >Cubic</th>
        <th width="12%"></th>
    </tr>
    </thead>
    <tbody></tbody>
</table>

<div class="row">
    <div class="col-md-4"> {!! Form::bsText(null, null, 'Reference', 'reference', '') !!}</div>
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

