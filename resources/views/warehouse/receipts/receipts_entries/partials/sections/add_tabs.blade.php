<div class="easyui-tabs">
    <div title="Handling">
        <div class="row no-padding-top">
            <div class="col-md-4">{!! Form::bsCheck('Commercial Inv', 'commercial_inv') !!}</div>
            <div class="col-md-4">{!! Form::bsCheck('Extra Length', 'extra_length') !!}</div>
            <div class="col-md-4">{!! Form::bsCheck('Pallets', 'pallets') !!}</div>
        </div>
        <div class="row no-padding-top">
            <div class="col-md-4">{!! Form::bsCheck('Packing List', 'packing_list') !!}</div>
            <div class="col-md-4">{!! Form::bsCheck('Extra Width', 'extra_width') !!}</div>
            <div class="col-md-4">{!! Form::bsCheck('Improper Document', 'improper_document') !!}</div>
        </div>
        <div class="row no-padding-top">
            <div class="col-md-4">{!! Form::bsCheck('Heat Treated', 'heat_treated') !!}</div>
            <div class="col-md-4">{!! Form::bsCheck('Extra Height', 'extra_height') !!}</div>
            <div class="col-md-4">{!! Form::bsCheck('Inbond', 'inbond') !!}</div>
        </div>
        <div class="row no-padding-top">
            <div class="col-md-4">{!! Form::bsCheck('Hazardous', 'hazardous') !!}</div>
            <div class="col-md-4">{!! Form::bsCheck('Extra Heavy', 'extra_heavy') !!}</div>
            <div class="col-md-4">{!! Form::bsCheck('Glass', 'glass') !!}</div>
        </div>
        <div class="row no-padding-top">
            <div class="col-md-4">{!! Form::bsCheck('Haz Documents', 'haz_documents') !!}</div>
            <div class="col-md-4">{!! Form::bsCheck('Driver Licenses', 'driver_licenses') !!}</div>
            <div class="col-md-4">{!! Form::bsCheck('Pieces Discrepancy', 'pieces_discrepancy') !!}</div>
        </div>
        <div class="row no-padding-top">
            <div class="col-md-4">{!! Form::bsCheck('Hazardous Labels', 'hazardous_labels') !!}</div>
            <div class="col-md-4">{!! Form::bsCheck('Fragile', 'fragile') !!}</div>
            <div class="col-md-4">{!! Form::bsCheck('Weight Discrepancy', 'weight_discrepancy') !!}</div>
        </div>
        <div class="row no-padding-top">
            <div class="col-md-4">{!! Form::bsCheck('Cargo Screened', 'cargo_screened') !!}</div>
            <div class="col-md-4">{!! Form::bsCheck('IPPC', 'ippc') !!}</div>
            {!! Form::bsText(null, 'col-md-4', null, 'ippc_number', null, 'IPPC Number...') !!}
            <div class="checkbox">
                <label><input name="dt" id="dt" type="checkbox" value="0">Option 1</label>
            </div>
        </div>
    </div>
    <div title="Marks">
        {!! Form::bsMemo(null, null, null, 'marks', null, 5, 'Marks...') !!}
    </div>
</div>