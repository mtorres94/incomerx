<div class="row">
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-4"><p><b>Weight Charges</b></p></div>
                <div class="col-md-3">{!! Form::bsText(null,null, 'Prepaid', 'weight_charge_prepaid', null, '0.00') !!}</div>
                <div class="col-md-3">{!! Form::bsText(null,null, 'Collected', 'weight_charge_collected', null, '0.00') !!}</div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-4"><p><b>Valuation Charges</b></p></div>
                <div class="col-md-3">{!! Form::bsText(null,null, '', 'valuation_prepaid', null, '0.00') !!}</div>
                <div class="col-md-3">{!! Form::bsText(null,null, '', 'valuation_collected', null, '0.00') !!}</div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-4"><p><b>Tax</b></p></div>
                <div class="col-md-3">{!! Form::bsText(null,null, '', 'tax_prepaid', null, '0.00') !!}</div>
                <div class="col-md-3">{!! Form::bsText(null,null, '', 'tax_collected', null, '0.00') !!}</div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-4"><p><b>Total Other Charges Due Agent</b></p></div>
                <div class="col-md-3">{!! Form::bsText(null,null, '', 'other_prepaid', null, '0.00') !!}</div>
                <div class="col-md-3">{!! Form::bsText(null,null, '', 'other_collected', null, '0.00') !!}</div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-4"><p><b>Total Charges</b></p></div>
                <div class="col-md-3">{!! Form::bsText(null,null, 'Total Prepaid', 'sum_prepaid', null, '0.00') !!}</div>
                <div class="col-md-3">{!! Form::bsText(null,null, 'Total Collected', 'sum_collected', null, '0.00') !!}</div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-12">{!! Form::bsMemo('col-md-3', 'col-md-9','Signature of Shipper or his Agent', 'signature_shipper', null, 3, '') !!}</div>
        </div>
        <div class="row">
            <div class="col-md-12">{!! Form::bsMemo('col-md-3', 'col-md-9','Executed on', 'executed_on', null, 3, '') !!}</div>
        </div>
    </div>
</div>