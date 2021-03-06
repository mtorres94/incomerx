<div id="charge-warehouse" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <form id="ChargeModal" method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">New Charge Details</h4>
                </div>
                <div class="modal-body">
                       <div class="row">
                           <div class="col-md-3">{!! Form::bsComplete(null, null, 'Billing Code', 'tmp_billing_billing_id', 'tmp_billing_billing_code', Request::get('term'), null, '') !!}</div>
                           <div class="col-md-3">{!! Form::bsText(null, null, 'Description', 'tmp_billing_billing_description', null, '') !!}</div>
                           <div class="col-md-3">{!! Form::bsSelect(null, null, 'Bill type', 'tmp_billing_bill_type', array('P' => 'PREPAID','C' => 'COLLECT' ), null) !!}</div>
                           <div class="col-md-3">{!! Form::bsSelect(null, null, 'Bill party', 'tmp_billing_bill_party', array('S' => 'SHIPPER','C' => 'CONSIGNEE', 'T' => 'THIRD PARTY', 'O' => 'OTHER'), null) !!}</div>
                       </div>
                    <div class="row">
                        <div class="col-md-12">{!! Form::bsMemo(null, null, 'Comments', 'tmp_billing_notes', null, 1, '') !!}</div>
                    </div>
                    <legend>Details</legend>
                    <div id="charges-tabs" class="easyui-tabs">
                        <div title="Billing">
                            @include('warehouse.receipts.receipts_entries.partials.modal.sections.charges.billing')
                        </div>
                        <div title="Cost">
                            @include('warehouse.receipts.receipts_entries.partials.modal.sections.charges.cost')
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-default btn-footer" data-dismiss="modal">
                        <i class="fa fa-times"></i> Close
                    </a>
                    <a id="charges-save" class="btn btn-primary btn-footer" href="javascript:void(0)">
                        <i class="icon ion-android-done-all"></i> Save data
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>