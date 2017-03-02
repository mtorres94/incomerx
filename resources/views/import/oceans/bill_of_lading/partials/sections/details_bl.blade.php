    <div class="col-md-6">
        <div class="row">
            <div class="col-md-6">{!! Form::bsText(null, null,'Document Number', 'document_number', null, '') !!}</div>
            <div class="col-md-6">{!! Form::bsText(null, null,'BL Number', 'bl_number', null, '') !!}</div>
        </div>

        <div class="row">
            <div class="col-md-6">{!! Form::bsText(null, null,'Pre Carriage by', 'pre_carriage_by', null, '') !!}</div>
            <div class="col-md-6">{!! Form::bsText(null, null,'Place of Receipt', 'place_receipt', null, '') !!}</div>
        </div>
        <div class="row">
            <div class="col-md-6">{!! Form::bsText(null, null,'Exporting Carrier', 'exporting_carrier', null, '') !!}</div>
            <div class="col-md-6">{!! Form::bsText(null, null,'Port of Loading', 'port_loading', null, '') !!}</div>
        </div>
        <div class="row">
            <div class="col-md-6">{!! Form::bsText(null, null,'Foreign Port of Unloading', 'port_unloading', null, '') !!}</div>
            <div class="col-md-6">{!! Form::bsText(null, null,'Place of Delivery', 'place_delivery', null, '') !!}</div>
        </div>
    </div>
    <div class="col-md-6">

        <div class="row"><div class="col-md-12">{!! Form::bsMemo(null, null,'Domestic Routing/ Export Instructions', 'export_reference', null, '') !!}</div></div>
        <div class="row"><div class="col-md-12">{!! Form::bsText(null, null,'Load Pier/ Terminal', 'load_terminal', null, '') !!}</div></div>
        <div class="row">
            <div class="col-md-6">{!! Form::bsText(null, null,'Type of Move', 'type_move', null, '') !!}</div>

                <div class="col-md-6"><p><b> Containerized (Vessel Only)</b></p>
                    <div class="col-md-4">{!! Form::bsCheck('col-md-1', 'col-md-3','Yes', 'vessel_yes', (isset($bill_of_lading)? $bill_of_lading->vessel_yes : 'off')) !!}</div>
                    <div class="col-md-4">{!! Form::bsCheck('col-md-1', 'col-md-3','No', 'vessel_no', (isset($bill_of_lading)? $bill_of_lading->vessel_no : 'off')) !!}</div>
                </div>
        </div>
</div>
