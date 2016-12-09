<div class="easyui-tabs">
    <div title="Handling">
        <div class="row no-padding-top">
            <div class="col-md-4">{!! Form::bsCheck('Commercial Inv', 'commercial_inv', (isset($receipt_entry)? $receipt_entry->commercial_inv : 0)) !!}</div>
            <div class="col-md-4">{!! Form::bsCheck('Extra Length', 'extra_length', (isset($receipt_entry)? $receipt_entry->extra_length : 0)) !!}</div>
            <div class="col-md-4">{!! Form::bsCheck('Pallets', 'pallets', (isset($receipt_entry)? $receipt_entry->pallets : 0)) !!}</div>
        </div>
        <div class="row no-padding-top">
            <div class="col-md-4">{!! Form::bsCheck('Packing List', 'packing_list',(isset($receipt_entry)? $receipt_entry->packing_list : 0) ) !!}</div>
            <div class="col-md-4">{!! Form::bsCheck('Extra Width', 'extra_width', (isset($receipt_entry)? $receipt_entry->extra_width : 0)) !!}</div>
            <div class="col-md-4">{!! Form::bsCheck('Improper Document', 'improper_document', (isset($receipt_entry)? $receipt_entry->improper_document : 0)) !!}</div>
        </div>
        <div class="row no-padding-top">
            <div class="col-md-4">{!! Form::bsCheck('Heat Treated', 'heat_treated', (isset($receipt_entry)? $receipt_entry->heat_treated : 0)) !!}</div>
            <div class="col-md-4">{!! Form::bsCheck('Extra Height', 'extra_height', (isset($receipt_entry)? $receipt_entry->extra_height : 0)) !!}</div>
            <div class="col-md-4">{!! Form::bsCheck('Inbond', 'inbond', (isset($receipt_entry)? $receipt_entry->inbond : 0)) !!}</div>
        </div>
        <div class="row no-padding-top">
            <div class="col-md-4">{!! Form::bsCheck('Hazardous', 'hazardous', (isset($receipt_entry)? $receipt_entry->hazardous : 0)) !!}</div>
            <div class="col-md-4">{!! Form::bsCheck('Extra Heavy', 'extra_heavy', (isset($receipt_entry)? $receipt_entry->extra_heavy : 0)) !!}</div>
            <div class="col-md-4">{!! Form::bsCheck('Glass', 'glass', (isset($receipt_entry)? $receipt_entry->glass : 0)) !!}</div>
        </div>
        <div class="row no-padding-top">
            <div class="col-md-4">{!! Form::bsCheck('Haz Documents', 'haz_documents', (isset($receipt_entry)? $receipt_entry->haz_documents : 0)) !!}</div>
            <div class="col-md-4">{!! Form::bsCheck('Driver Licenses', 'driver_licenses', (isset($receipt_entry)? $receipt_entry->driver_licenses : 0)) !!}</div>
            <div class="col-md-4">{!! Form::bsCheck('Pieces Discrepancy', 'pieces_discrepancy', (isset($receipt_entry)? $receipt_entry->pieces_discrepancy : 0)) !!}</div>
        </div>
        <div class="row no-padding-top">
            <div class="col-md-4">{!! Form::bsCheck('Hazardous Labels', 'hazardous_labels', (isset($receipt_entry)? $receipt_entry->hazardous_labels : 0)) !!}</div>
            <div class="col-md-4">{!! Form::bsCheck('Fragile', 'fragile', (isset($receipt_entry)? $receipt_entry->fragile : 0)) !!}</div>
            <div class="col-md-4">{!! Form::bsCheck('Weight Discrepancy', 'weight_discrepancy', (isset($receipt_entry)? $receipt_entry->weight_discrepancy : 0)) !!}</div>
        </div>
        <div class="row no-padding-top">
            <div class="col-md-4">{!! Form::bsCheck('Cargo Screened', 'cargo_screened', (isset($receipt_entry)? $receipt_entry->cargo_screened : 0)) !!}</div>
            <div class="col-md-4">{!! Form::bsCheck('IPPC', 'ippc', (isset($receipt_entry)? $receipt_entry->ippc : 0)) !!}</div>
            {!! Form::bsText(null, 'col-md-4', null, 'ippc_number', null, 'IPPC Number...') !!}
        </div>
    </div>
    <div title="Marks">
        {!! Form::bsMemo(null, null, null, 'marks', null, 5, 'Marks...') !!}
    </div>
</div>