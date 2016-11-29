
<legend>HBL Details</legend>
<div class="btn-group btn-group-sm pull-right" role="group" style="padding-bottom: 10px;">
    <button type="button" id="btn_create_hbl" class="btn btn-default" data-toggle="modal" data-target="#CreateHouse" onclick="cleanModalFields('CreateHouse')">
        <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
    </button>
    <button type="button"  class="btn btn-danger" onclick="clearTable('hbl_details')">
        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
    </button>
</div>

<table class="table table-bordered table-condensed" id="hbl_details">
    <thead>
    <tr>
        <th data-override="container_line" hidden></th>
        <th width="25%" data-override="marks">Marks</th>
        <th width="10%" data-override="pieces">Pieces</th>
        <th width="25%" data-override="description" >Comm. Descriptions</th>
        <th width="5%" data-override="unit" >Unit</th>
        <th width="10%" data-override="gross_weight">Gross Weight</th>
        <th width="10%" data-override="cubic">Cubic </th>
        <th width="10%" data-override="charge_weight">Charge Weight</th>
        <th width="10%"/>
    </tr>
    </thead>
    <tbody>
    @if(isset($cargo_loader))
        @foreach ($cargo_loader->hbl_details as $hbl_details)
            @foreach ($hbl_details->cargo as $detail)
                <tr id="{{ $detail->line }}">
                {!! Form::bsRowTd($detail->line, 'resume_line', $detail->line, true) !!}
                {!! Form::bsRowTd($detail->line, 'resume_marks', $detail->cargo_marks, false) !!}
                {!! Form::bsRowTd($detail->line, 'resume_pieces', $detail->cargo_pieces, false) !!}
                {!! Form::bsRowTd($detail->line, 'resume_description', $detail->cargo_description, false) !!}
                {!! Form::bsRowTd($detail->line, 'resume_weight_unit', $detail->cargo_weight_unit, false) !!}
                {!! Form::bsRowTd($detail->line, 'resume_gross_weight', $detail->cargo_weight_k, false) !!}
                {!! Form::bsRowTd($detail->line, 'resume_cubic', $detail->cargo_cubic_k, false) !!}
                {!! Form::bsRowTd($detail->line, 'resume_charge_weight', $detail->cargo_charge_weight_k, false) !!}
                {!! Form::bsRowTd($detail->line, 'resume_container_id', 0, true) !!}
                {!! Form::bsRowTd($detail->line, 'inserted_id', 0, true) !!}
                {!! Form::bsRowBtns() !!}
            @endforeach
        @endforeach
    @endif
    </tbody>
</table>
