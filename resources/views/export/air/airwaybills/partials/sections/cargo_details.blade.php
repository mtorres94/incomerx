    <div class="btn-group btn-group-sm pull-right" role="group" style="padding-bottom: 10px;">
        <div class="btn-group btn-group-sm pull-right" role="group" style="padding-bottom: 10px;">
            <button type="button" id="btn_cargo" class="btn btn-default" data-toggle="modal" data-target="#cargo_details" onclick="cleanModalFields('cargo_details')" >
                <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
            </button>
            <button type="button" class="btn btn-danger" id="delete_cargo">
                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
            </button>
        </div>
    </div>

    <table class="table table-bordered table-condensed" id="cargos">
        <thead>
        <tr>
            <th hidden></th>
            <th width="5%" >Pcs</th>
            <th width="10%" >Unit</th>
            <th width="10%" >Vol Weight</th>
            <th width="10%" >Rate</th>
            <th width="10%" >Amount</th>
            <th width="10%" >Class</th>
            <th width="12%"/>
        </tr>
        </thead>
        <tbody>
      @if(isset($airway_bill))
          @foreach($airway_bill->cargo_details as $detail)
              <tr id="{{ $detail->line }}">
                  {!! Form::bsRowTd($detail->line, 'cargo_line', $detail->line, true) !!}
                  {!! Form::bsRowTd($detail->line, 'pieces', $detail->pieces, false) !!}
                  {!! Form::bsRowTd($detail->line, 'unit_weight', $detail->unit_weight, false) !!}
                  {!! Form::bsRowTd($detail->line, 'gross_weight', $detail->gross_weight, true) !!}
                  {!! Form::bsRowTd($detail->line, 'volume_weight', $detail->volume_weight, false) !!}
                  {!! Form::bsRowTd($detail->line, 'rate', $detail->rate, false) !!}
                  {!! Form::bsRowTd($detail->line, 'total', $detail->total, false) !!}
                  {!! Form::bsRowTd($detail->line, 'rate_class', $detail->rate_class, false) !!}
                  {!! Form::bsRowTd($detail->line, 'commodity', $detail->commodity, true) !!}
                  {!! Form::bsRowTd($detail->line, 'show_rate', $detail->show_rate, true) !!}
                  {!! Form::bsRowTd($detail->line, 'show_total', $detail->show_total, true) !!}
                  {!! Form::bsRowTd($detail->line, 'comments', $detail->comments, true) !!}
                  {!! Form::bsRowTd($detail->line, 'charge_weight', $detail->charge_weight, true) !!}
                  {!! Form::bsRowBtns() !!}

              </tr>
          @endforeach
      @endif

        </tbody>
    </table>
    <div class="row">
        <div class="col-md-2">{!! Form::bsText(null, null, 'Pieces', 'sum_pieces', null, ' ') !!}</div>
        <div class="col-md-2">{!! Form::bsSelect(null, null, 'Kgs/Lbs', 'total_unit_weight', array('K' => 'KGS','L' => 'LBS'), '') !!}</div>
        <div class="col-md-2">{!! Form::bsText(null, null, 'Commodity', 'total_commodity', null, ' ') !!}</div>
        <div class="col-md-2">{!! Form::bsText(null, null, 'G. Weight', 'sum_weight', null, ' ') !!}</div>
        <div class="col-md-2">{!! Form::bsText(null, null, 'Vol. Weight', 'sum_volume_weight', null, ' ') !!}</div>
        <div class="col-md-2">{!! Form::bsText(null, null, 'Charge', 'sum_charge_weight', null, ' ') !!}</div>
    </div>
    <table class="hidden" id="hidden_houses">
        <tbody>
       @if(isset($airway_bill))
           <?php $count = 1;  ?>
           @foreach($airway_bill->receipts_entries as $receipt_entry)
                @foreach($receipt_entry->cargo_details as $detail)
                    <tr data-id="1">
                        {!! Form::bsRowTd($count, 'quantity', $detail->quantity, false) !!}
                        {!! Form::bsRowTd($count, 'unit_weight_detail', $detail->weight_unit_measurement_id, false) !!}
                        {!! Form::bsRowTd($count, 'length', $detail->length, false) !!}
                        {!! Form::bsRowTd($count, 'width', $detail->width, false) !!}
                        {!! Form::bsRowTd($count, 'height', $detail->height, false) !!}
                        {!! Form::bsRowTd($count, 'weight', $detail->total_weight, false) !!}
                        {!! Form::bsRowTd($count, 'volume_weight_detail', $detail->volume_weight, false) !!}
                    </tr>
                    <?php $count++; ?>
                @endforeach
           @endforeach
        @endif

        </tbody>
    </table>

    <table class="hidden" id="hidden_id_houses">
        <tbody>
        @if(isset($airway_bill))
            @foreach($airway_bill->houses as $key=>$house)
                <tr id="{{ $key +1 }}">
                    {!! Form::bsRowTd($key +1, 'house_id', $house->id, false) !!}
                </tr>

            @endforeach
        @endif
        </tbody>
    </table>

