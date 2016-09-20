<div class="row">
        <div class="col-md-8">{!! Form::bsComplete(null,null, 'Vendor', 'reference_vendor_code', 'reference_vendor_name', Request::get('term'), null, '') !!}</div>
    <div class="col-md-4">{!! Form::bsText(null, null, 'Final Dest.', 'reference_final_dest', null, ' ') !!}</div>
    <div class="col-md-12">
        {!! Form::bsMemo(null,null, 'Customer Reference', 'reference_customer_reference', null, 2, ' ') !!}
    </div>
</div>

