

        <div class="col-md-6">
            <div class="row">
                <div class="col-md-6">{!! Form::bsMemo(null, null,'Accounting Information', 'accounting_information', null, 3, '') !!}</div>
                <div class="col-md-6">{!! Form::bsMemo(null, null,'Issued by', 'issued_by', null, 3, '') !!}</div>
            </div>
            <div class="row">
                <div class="col-md-3">{!! Form::bsText(null, null,'Agent IATA code#', 'agent_code', null, '') !!}</div>
                <div class="col-md-3">{!! Form::bsText(null, null,'Account No.', 'account_number', null, '') !!}</div>
                <div class="col-md-3">{!! Form::bsText(null, null,'To', 'port_unloading_code', null, '') !!}</div>
                <div class="col-md-3">{!! Form::bsText(null, null,'By first carrier', 'first_carrier', null, '') !!}</div>
            </div>
            <div class="row">
                <div class="col-md-3">{!! Form::bsText(null, null,'Airport of Departure', 'port_loading', null, '') !!}</div>
                <div class="col-md-3">{!! Form::bsText(null, null,'Airport of Destination', 'port_unloading', null, '') !!}</div>
                <div class="col-md-3">{!! Form::bsText(null, null,'Requested  flight', 'flight_number', null, '') !!}</div>
                <div class="col-md-3">{!! Form::bsDate(null, null,'Date', 'flight_date', null, '') !!}</div>
            </div>


        </div>
        <div class="col-md-6">

            <div class="row">
                <div class="col-md-3">{!! Form::bsText(null, null,'Carriage Value', 'carriage_value', null, '0.00') !!}</div>
                <div class="col-md-3">{!! Form::bsText(null, null,'Customs Value', 'customs_value', null, '0.00') !!}</div>
                <div class="col-md-3">{!! Form::bsText(null, null,'WT/VAL', 'wt_val', null, '') !!}</div>
                <div class="col-md-3">{!! Form::bsText(null, null,'Other', 'other', null, '') !!}</div>

            </div>
            <div class="row">
                <div class="col-md-3">{!! Form::bsText(null, null,'Shipping information', 'shipping_information', null, '') !!}</div>
                <div class="col-md-3">{!! Form::bsText(null, null,'SCI', 'sci_number', null, '') !!}</div>
                <div class="col-md-3">{!! Form::bsText(null, null,'Amount of Insurance', 'amount_insurance', null, '0.00') !!}</div>
                <div class="col-md-3">{!! Form::bsText(null, null,'Value Declared', 'value_declared', null, '0.00') !!}</div>

            </div>
            <div class="row">
                <div class="col-md-6">{!! Form::bsMemo(null, null,'Handling Information', 'handling_information', null, 3, '') !!}</div>
                <div class="col-md-6">{!! Form::bsMemo(null, null,'Nature and Quantity of Goods', 'goods_information', null, 3, '') !!}</div>
            </div>
        </div>



