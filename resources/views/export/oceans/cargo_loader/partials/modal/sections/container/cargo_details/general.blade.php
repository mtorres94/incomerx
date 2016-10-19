<fieldset>
    {!! Form::hidden('cargo_line', null, ['id' => 'cargo_line', 'class' => 'form-control input-sm']) !!}

    <div class="row">
        <div class="col-md-3">{!! Form::bsText(null, null, 'WR Number', 'warehouse_number', '') !!}</div>
        <div class="col-md-3">{!! Form::bsDate(null, null, 'Date in', 'warehouse_date_in', '') !!}</div>
        <div class="col-md-3">{!! Form::bsText(null, null, 'Bldg/Whse', 'bldg_number', '') !!}</div>
        <div class="col-md-3">{!! Form::bsText(null, null, 'Loaded Position', 'loaded_position', '') !!}</div>

    </div>
    <div class="row">
        <div class="col-md-3">{!! Form::bsText(null, null, 'Ship Inst. #', 'ship_inst_number', '') !!}</div>
        <div class="col-md-3"></div>
        <div class="col-md-3">{!! Form::bsText(null, null, 'Box/Plt #', 'box_number', '') !!}</div>
        <div class="col-md-3">{!! Form::bsSelect(null, null, ' Status', 'warehouse_status', array(
            'O' => 'OPEN',
            'P' => 'IN PROCESS',
            'C' => 'CLOSED',
            'V' => 'VOID',
        ), 'Status') !!}</div>

    </div>

</fieldset>