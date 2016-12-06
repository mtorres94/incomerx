<fieldset>
    <legend>General info</legend>

    <div class="row">
        <div class="btn-group btn-group-sm pull-right" role="group" style="padding-bottom: 10px;">
            <a type="button" class="btn btn-default btn-sm" id="btn-pick-cargo" onclick="cleanModalFields('PickCargo'), clearTable('pick_cargo_details')" data-toggle="modal" data-target="#PickCargo"><i class="fa fa-cube" aria-hidden="true"></i><span>Pick Cargo</span></a>

        </div>
    </div>
    <div class="row">
        <div class="col-md-3">{!! Form::bsText(null, null,'P/D Number', 'code', null, '') !!}</div>
        <div class="col-md-3">{!! Form::bsComplete(null, null,'Division', 'division_id', 'division_name', Request::get('term'),
    ((isset($order_entry) and $order_entry->division_id > 0) ? $order_entry->division->name : null), 'Divisions...', 'options.maintenance.divisions.divisions', 'options.maintenance.divisions.divisions', 'maintenance.divisions_departments.divisions.index') !!}</div>
        <div class="col-md-3">{!! Form::bsText(null, null, 'User', 'user_id', ((isset($order_entry) and $order_entry->user_create_id > 0) ? $order_entry->user_create->username :  Auth::user()->username), '') !!}</div>
        <div class="col-md-3">{!! Form::bsSelect(null, null, 'P/D Status', 'pd_status', array(
            'O' => 'OPEN',
            'C' => 'CLOSED',
            'V' => 'VOID',
            'D' => 'DELIVERED',
            'P' => 'POSTED',
            'S' => 'SCHEDULED'
        ), 'Status...') !!}</div>
    </div>
    <div class="row">
        <div class="col-md-3">{!! Form::bsSelect(null, null, 'Type', 'pd_type', array(
            'P' => 'P - PICK UP',
            'D' => 'D - DELIVERY',
            'C' => 'C - XCHANGE',
            'X' => 'X - XDOCK',
            'Q' => 'Q - QUOTATION',
        ), 'Types...') !!}</div>
        <div class="col-md-3">{!! Form::bsSelect(null, null, 'Dispatch status', 'pd_dispatch_status', array(
            'O' => 'O - PENDING',
            'D' => 'D - DISPATCH',
            'E' => 'E - ENROUTE',
            'S' => 'S - SHIP TO DESTINATION',
            'A' => 'A  ARRIVED PICKED UP LOCATION',
            'P' => 'P - ARRIVED DELIVERED LOCATION',
            'B' => 'B - ON BOARD',
            'H' => 'H - ON HAND',
            'L' => 'L - DELIVERED',
            'C' => 'C - COMPLETED',
            'X' => 'X - EXCEPTIONS',
        ), 'Dispatch status') !!}</div>
        <div class="col-md-3">{!! Form::bsComplete(null, null, 'Warehouse', 'warehouse_id', 'warehouse_name', Request::get('term'),((isset($order_entry) and $order_entry->warehouse_id > 0) ? $order_entry->warehouse->name : null), 'Warehouse...') !!}</div>
        <div class="col-md-3">{!! Form::bsCheck('Create Warehouse Receipt', 'create_warehouse_receipt') !!}</div>

    </div>

</fieldset>