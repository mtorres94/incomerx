<div class="easyui-tabs">
    <div title="Handling">
        <div class="row">
            {!! Form::bsCheck('col-md-1', 'col-md-3', 'Commercial Inv', 'commercial_inv', (isset($receipt_entry) ? $receipt_entry->commercial_inv : 'off')) !!}
            {!! Form::bsCheck('col-md-1', 'col-md-3', 'Extra Length', 'extra_length', (isset($receipt_entry) ? $receipt_entry->extra_length : 'off')) !!}
            {!! Form::bsCheck('col-md-1', 'col-md-3', 'Pallets', 'pallets', (isset($receipt_entry) ? $receipt_entry->pallets : 'off')) !!}
        </div>
        <div class="row no-padding-top">
            {!! Form::bsCheck('col-md-1', 'col-md-3', 'Packing List', 'packing_list',(isset($receipt_entry) ? $receipt_entry->packing_list : 'off') ) !!}
            {!! Form::bsCheck('col-md-1', 'col-md-3', 'Extra Width', 'extra_width', (isset($receipt_entry) ? $receipt_entry->extra_width : 'off')) !!}
            {!! Form::bsCheck('col-md-1', 'col-md-3', 'Improper Document', 'improper_document', (isset($receipt_entry) ? $receipt_entry->improper_document : 'off')) !!}
        </div>
        <div class="row no-padding-top">
            {!! Form::bsCheck('col-md-1', 'col-md-3', 'Heat Treated', 'heat_treated', (isset($receipt_entry) ? $receipt_entry->heat_treated : 'off')) !!}
            {!! Form::bsCheck('col-md-1', 'col-md-3', 'Extra Height', 'extra_height', (isset($receipt_entry) ? $receipt_entry->extra_height : 'off')) !!}
            {!! Form::bsCheck('col-md-1', 'col-md-3', 'Inbond', 'inbond', (isset($receipt_entry) ? $receipt_entry->inbond : 'off')) !!}
        </div>
        <div class="row no-padding-top">
            {!! Form::bsCheck('col-md-1', 'col-md-3', 'Hazardous', 'hazardous', (isset($receipt_entry) ? $receipt_entry->hazardous : 'off')) !!}
            {!! Form::bsCheck('col-md-1', 'col-md-3', 'Extra Heavy', 'extra_heavy', (isset($receipt_entry) ? $receipt_entry->extra_heavy : 'off')) !!}
            {!! Form::bsCheck('col-md-1', 'col-md-3', 'Glass', 'glass', (isset($receipt_entry) ? $receipt_entry->glass : 'off')) !!}
        </div>
        <div class="row no-padding-top">
            {!! Form::bsCheck('col-md-1', 'col-md-3', 'Haz Documents', 'haz_documents', (isset($receipt_entry) ? $receipt_entry->haz_documents : 'off')) !!}
            {!! Form::bsCheck('col-md-1', 'col-md-3', 'Driver Licenses', 'driver_licenses', (isset($receipt_entry) ? $receipt_entry->driver_licenses : 'off')) !!}
            {!! Form::bsCheck('col-md-1', 'col-md-3', 'Pieces Discrepancy', 'pieces_discrepancy', (isset($receipt_entry) ? $receipt_entry->pieces_discrepancy : 'off')) !!}
        </div>
        <div class="row no-padding-top">
            {!! Form::bsCheck('col-md-1', 'col-md-3', 'Hazardous Labels', 'hazardous_labels', (isset($receipt_entry) ? $receipt_entry->hazardous_labels : 'off')) !!}
            {!! Form::bsCheck('col-md-1', 'col-md-3', 'Fragile', 'fragile', (isset($receipt_entry) ? $receipt_entry->fragile : 'off')) !!}
            {!! Form::bsCheck('col-md-1', 'col-md-3', 'Weight Discrepancy', 'weight_discrepancy', (isset($receipt_entry) ? $receipt_entry->weight_discrepancy : 'off')) !!}
        </div>
        <div class="row no-padding-top">
            {!! Form::bsCheck('col-md-1', 'col-md-3', 'Cargo Screened', 'cargo_screened', (isset($receipt_entry) ? $receipt_entry->cargo_screened : 'off')) !!}
            {!! Form::bsCheck('col-md-1', 'col-md-3', 'IPPC', 'ippc', (isset($receipt_entry) ? $receipt_entry->ippc : 'off')) !!}
            {!! Form::bsText(null, 'col-md-4', null, 'ippc_number', null, 'IPPC Number...') !!}
        </div>
    </div>
    <div title="Marks">
        {!! Form::bsMemo(null, null, null, 'marks', null, 5, 'Marks...') !!}
    </div>
</div>