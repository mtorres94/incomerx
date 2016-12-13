<!-- Tabs -->

    <div class="easyui-tabs">
        <div title="Dates of Ship / Deliv">
            <div class="form-horizontal">
                <div class="row">
                        {!! Form::bsDate('col-md-4', 'col-md-6', 'Order Date', 'date_order', null, null) !!}
                </div>
                <div class="row">
                        {!! Form::bsDate('col-md-4', 'col-md-6', 'Schedule Date', 'date_schedule', null, null) !!}
                </div>
                <div class="row">
                        {!! Form::bsDate('col-md-4', 'col-md-6', 'Ship/ Deliv On', 'date_ship_deliv', null, null) !!}
                </div>
                <div class="row">
                        {!! Form::bsDate('col-md-4', 'col-md-6', 'Completed On', 'date_completed', null, null) !!}
                </div>
                <div class="row">
                        {!! Form::bsDate('col-md-4', 'col-md-6', 'Date_ETA', 'date_ETA', null, null) !!}
                </div>
                <div class="row">
                        {!! Form::bsText('col-md-4', 'col-md-6', 'Waiting Time', 'waiting_time', null, '0') !!}

                </div>
            </div>
        </div>
        <div title="Shipment">
            <div class="form-horizontal">
                <div class="row">
                        {!! Form::bsText('col-md-4', 'col-md-6','Quote #', 'quote_number', null, '') !!}
                </div>
                <div class="row">
                        {!! Form::bsText('col-md-4', 'col-md-6','Shipment', 'shipment_number', null, '') !!}
                </div>
                <div class="row">
                       {!! Form::bsText('col-md-4', 'col-md-6', 'Truck', 'truck_number', null, '') !!}
                </div>
                <div class="row">
                       {!! Form::bsText('col-md-4', 'col-md-6', 'Miles', 'miles', null, '') !!}
                </div>
                <div class="row">
                       {!! Form::bsText('col-md-4', 'col-md-6', 'Ship Inst#', 'ship_instruction', null, '') !!}
                </div>
                <div class="row">
                       {!! Form::bsText('col-md-4', 'col-md-6', 'Log #', 'log_number', null, '') !!}
                </div>
                <div class="row">
                        {!! Form::bsText('col-md-4', 'col-md-6','Stop#', 'shipment_stop_number', null, '') !!}
                </div>
            </div>
        </div>
    </div>
