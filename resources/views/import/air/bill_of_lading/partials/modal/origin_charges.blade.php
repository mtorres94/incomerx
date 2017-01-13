<div id="Origin_Charges" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">New Origin Charge Details</h4>
            </div>
            <div class="modal-body">
                {!! Form::hidden('origin_charge_line', null, ['id' => 'origin_charge_line', 'class' => 'form-control input-sm']) !!}

                <div class="row">
                    <div class="col-md-3"> {!! Form::bsComplete(null, null,'Billing Code', 'origin_billing_id', 'origin_billing_code', Request::get('term'),   null, '') !!}</div>
                    <div class="col-md-3">{!! Form::bsText(null,null, 'Description', 'origin_billing_description', null, '') !!}</div>
                    <div class="col-md-3">{!! Form::bsSelect(null, null, 'Bill type', 'origin_bill_type', array('P' => 'PREPAID','C' => 'COLLECT' ), null) !!}</div>
                    <div class="col-md-3">{!! Form::bsSelect(null, null, 'Bill party', 'origin_bill_party', array('S' => 'SHIPPER','C' => 'CONSIGNEE','T' => 'THIRD PARTY','O' => 'OTHER' ), null) !!}</div>
                </div>
                <div class="row">
                    <div class="col-md-12">  {!! Form::bsMemo(null,null, 'Comments', 'origin_notes', null, 3, '') !!}</div>
                </div>
                <legend>Details</legend>
                <div id="origin-tabs" class="easyui-tabs">
                    <div title="Billing">
                        @include('import.air.bill_of_lading.partials.modal.sections.origin_charge.billing')
                    </div>
                    <div title="Cost">
                        @include('import.air.bill_of_lading.partials.modal.sections.origin_charge.cost')
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a class="btn btn-default btn-footer" data-dismiss="modal">
                    <i class="fa fa-times"></i> Close
                </a>
                <a id="origin-charge-save" class="btn btn-primary btn-footer" href="javascript:void(0)">
                    <i class="icon ion-android-done-all"></i> Save data
                </a>
            </div>
        </div>
    </div>
</div>