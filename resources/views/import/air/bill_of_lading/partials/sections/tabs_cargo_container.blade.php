<div class="row">
    <div class="col-md-12">
        <div class="easyui-tabs">
        <div title="Cargo Details">
            <div class="form-horizontal">
                <div class="btn-group btn-group-sm pull-right" role="group" style="padding-bottom: 10px;">
                    <button type="button" id="btn_cargo_details" class="btn btn-default" data-toggle="modal" data-target="#Cargo_Details" onclick="cleanModalFields('Cargo_Details')">
                        <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
                    </button>
                    <button type="button" class="btn btn-danger"  id="delete_cargo">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>

                <table class="table table-bordered table-condensed" id="cargo_details">
                    <thead>
                    <tr>
                        <th hidden></th>
                        <th width="10%" >Marks</th>
                        <th width="5%" >Pieces</th>
                        <th width="15%" >Comm. Description</th>
                        <th width="5%" >Unit</th>
                        <th width="10%" >Gross Weight</th>
                        <th width="10%" >Cubic</th>
                        <th width="10%" >Amount</th>

                        <th width="12%"/>
                    </tr>
                    </thead>
                    <tbody>

                    @if(isset($bill_of_lading))
                        @foreach($bill_of_lading->cargo as $detail)
                            <tr id="{{ $detail->line }}">
                                {!! Form::bsRowTd($detail->line, 'cargo_line', $detail->line, true) !!}
                                {!! Form::bsRowTd($detail->line, 'cargo_marks', $detail->cargo_marks, false) !!}
                                {!! Form::bsRowTd($detail->line, 'cargo_pieces', $detail->cargo_pieces, false) !!}
                                {!! Form::bsRowTd($detail->line, 'cargo_description', $detail->crago_description, false) !!}
                                {!! Form::bsRowTd($detail->line, 'cargo_container', $detail->container, true) !!}
                                {!! Form::bsRowTd($detail->line, 'cargo_type_id', $detail->cargo_type_id, true) !!}
                                {!! Form::bsRowTd($detail->line, 'cargo_type_code', ($detail->cargo_type_id >0 ? $detail->cargo_type->code : ""), true) !!}

                                {!! Form::bsRowTd($detail->line, 'cargo_weight_unit', $detail->cargo_weight_unit, false) !!}
                                {!! Form::bsRowTd($detail->line, 'cargo_gross_weight', $detail->cargo_gross_weight, false) !!}
                                {!! Form::bsRowTd($detail->line, 'cargo_cubic', $detail->cargo_cubic, false) !!}
                                {!! Form::bsRowTd($detail->line, 'cargo_comments', $detail->cargo_comments, true) !!}
                                {!! Form::bsRowTd($detail->line, 'cargo_charge_weight', $detail->cargo_charge_weight, true) !!}
                                {!! Form::bsRowTd($detail->line, 'cargo_rate', $detail->cargo_rate, true) !!}
                                {!! Form::bsRowTd($detail->line, 'cargo_amount', $detail->cargo_amount, false) !!}

                                {!! Form::bsRowBtns() !!}
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
</div>


<div class="row row-panel">

    <div class="col-md-1">{!! Form::bsText(null,null, 'Pcs', 'total_pieces', null, '0') !!}</div>
    <div class="col-md-2">{!! Form::bsSelect(null, null,'Cargo Type', 'total_cargo_type_id', Sass\CargoType::all()->lists('code', 'id'), '', 'body') !!}</div>
    <div class="col-md-2">{!! Form::bsText(null, null,'Commodity', 'total_commodity_name', null, '') !!}</div>
    <div class="col-md-1">{!! Form::bsSelect(null, null, 'Kgs/Lbs', 'total_weight_unit',  array('K' => 'KGS','L' => 'LBS' ), null)!!}</div>

    <div class="col-md-2">{!! Form::bsText(null,null, 'Gross W.', 'total_gross_weight', null, '0.000') !!}</div>
    <div class="col-md-2">{!! Form::bsText(null,null, 'Amount', 'total_amount', null, '0.000') !!}</div>
    <div class="col-md-2">{!! Form::bsText(null,null, 'Cubic', 'total_cubic', null, '0.000') !!}</div>

</div>
