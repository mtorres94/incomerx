     <div class="row">
        <div class="col-md-1">{!! Form::bsSelect(null, null, ' BL Class', 'bl_class', array(
            '1' => 'DBL',
            '2' => 'HBL',
            '3' => 'MBL',
        ), 'Class') !!}</div>
        <div class="col-md-2">{!! Form::bsSelect(null, null, 'BL Type', 'bl_type', array(
            'C' => 'COLLECT',
            'P' => 'PREPAID',
        ), 'Type') !!}</div>
        <div class="col-md-2">{!! Form::bsComplete(null, null,'Division ', 'division_id', 'division_name', Request::get('term'),
    ((isset($bill_of_lading) and $bill_of_lading->division_id > 0) ? $bill_of_lading->division->name : null), 'Divisions...', 'options.maintenance.divisions.divisions', 'options.maintenance.divisions.divisions', 'maintenance.divisions_departments.divisions.index') !!}</div>
        <div class="col-md-2">{!! Form::bsText(null, null, 'User', 'user_id', ((isset($bill_of_lading) and $bill_of_lading->user_create_id > 0) ? $bill_of_lading->user_create->username :  Auth::user()->username), '') !!}</div>
        <div class="col-md-2">{!! Form::bsDate(null, null,'Date', 'bl_date', null, '') !!}</div>
        <div class="col-md-1">{!! Form::bsSelect(null, null, 'Currency', 'currency', Sass\Currency::all()->lists('code', 'id'), ' ') !!}</div>
        <div class="col-md-2">{!! Form::bsSelect(null, null, ' Status', 'bl_status', array(
            'O' => 'OPEN',
            'P' => 'POSTED',
            'C' => 'CLOSED',
            'H' => 'HOLD',
            'V' => 'VOID',
        ), 'Status') !!}</div>
    </div>