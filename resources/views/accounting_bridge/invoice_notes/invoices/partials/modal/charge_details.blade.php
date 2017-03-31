<div id="charge_details" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
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
                        {!! Form::hidden('charge_line', null, ['id' => 'charge_line', 'class' => 'form-control input-sm']) !!}

                        <div class="col-md-4"> {!! Form::bsComplete(null,null,  'Billing Code', 'billing_billing_id', 'billing_billing_code', Request::get('term'),null, '') !!}</div>
                        <div class="col-md-4">{!! Form::bsText(null,null, 'Description', 'billing_billing_description', null, '') !!}</div>
                        <div class="col-md-3">{!! Form::bsSelect(null, null, 'Bill type', 'billing_bill_type', array('P' => 'PREPAID','C' => 'COLLECT' ), ' ') !!}</div>

                    </div>
                    <div class="row">
                        <div class="col-md-12">{!! Form::bsText(null,null, 'Special Billing Code', 'special_billing', null, '') !!}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">  {!! Form::bsMemo(null,null, 'Comments', 'billing_notes', null, 3, '') !!}</div>
                    </div>
                    <legend>Details</legend>
                    <div id="charges-tabs" class="easyui-tabs">
                        <div title="Billing">
                            @include('accounting_bridge.invoice_notes.invoices.partials.modal.sections.charge.billing')
                        </div>
                        <div title="Cost">
                            @include('accounting_bridge.invoice_notes.invoices.partials.modal.sections.charge.cost')
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-default btn-footer" data-dismiss="modal">
                        <i class="fa fa-times"></i> Close
                    </a>
                    <a id="charge_save" class="btn btn-primary btn-footer" href="javascript:void(0)">
                        <i class="icon ion-android-done-all"></i> Save data
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>